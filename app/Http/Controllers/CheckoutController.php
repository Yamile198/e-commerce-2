<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    private const MP_API = 'https://api.mercadopago.com';

    /**
     * Recibe el carrito del navegador, crea el pedido y devuelve la URL de pago de Mercado Pago.
     */
    public function create(Request $request)
    {
        $data = $request->validate([
            'name'          => 'required|string|max:120',
            'email'         => 'required|email|max:120',
            'delivery_date' => 'required|string|max:30',
            'items'         => 'required|array|min:1',
            'items.*.id'    => 'required|integer',
            'items.*.qty'   => 'required|integer|min:1|max:50',
        ]);

        // Los precios salen del servidor, no del navegador.
        $catalog = config('products');
        $mpItems = [];
        $total   = 0;

        foreach ($data['items'] as $row) {
            $product = $catalog[$row['id']] ?? null;
            if (!$product) {
                return response()->json(['message' => 'Producto no válido'], 422);
            }

            $mpItems[] = [
                'title'       => $product['name'],
                'quantity'    => (int) $row['qty'],
                'unit_price'  => (float) $product['price'],
                'currency_id' => 'MXN',
            ];
            $total += $product['price'] * $row['qty'];
        }

        $order = Order::create([
            'reference'     => 'SC-' . strtoupper(Str::random(8)),
            'name'          => $data['name'],
            'email'         => $data['email'],
            'delivery_date' => $data['delivery_date'],
            'items'         => $mpItems,
            'total'         => $total,
        ]);

        $preference = [
            // Sin 'payer': si el correo del formulario no coincide con la cuenta que paga
            // (p. ej. un comprador de prueba), Mercado Pago bloquea el pago. Su checkout lo pide.
            'items'              => $mpItems,
            'external_reference' => $order->reference,
            'back_urls'          => [
                'success' => route('gracias'),
                'pending' => route('gracias'),
                'failure' => route('cart'),
            ],
        ];

        // Mercado Pago rechaza auto_return y no puede llamar al webhook si la URL es localhost.
        // Solo se envían cuando el sitio tiene una URL pública con https (producción o ngrok).
        if (str_starts_with(route('gracias'), 'https://')) {
            $preference['auto_return']      = 'approved';
            $preference['notification_url'] = route('mp.webhook');
        }

        $response = Http::withToken(config('services.mercadopago.token'))
            ->post(self::MP_API . '/checkout/preferences', $preference);

        if ($response->failed()) {
            Log::error('Mercado Pago: no se pudo crear la preferencia', [
                'order'  => $order->reference,
                'status' => $response->status(),
                'body'   => $response->body(),
            ]);
            return response()->json(['message' => 'No se pudo iniciar el pago'], 502);
        }

        $order->update(['mp_preference_id' => $response['id']]);

        return response()->json(['url' => $response['init_point']]);
    }

    /**
     * Mercado Pago avisa aquí cuando cambia un pago. Se verifica el pago contra su API
     * (así nadie puede inventar una notificación) y, si está aprobado, se avisa a n8n.
     */
    public function webhook(Request $request)
    {
        $type      = $request->input('type', $request->input('topic'));
        $paymentId = $request->input('data.id', $request->input('id'));

        if ($type !== 'payment' || !$paymentId) {
            return response()->json(['ok' => true]);
        }

        $payment = Http::withToken(config('services.mercadopago.token'))
            ->get(self::MP_API . "/v1/payments/{$paymentId}");

        if ($payment->failed()) {
            // 500 para que Mercado Pago reintente la notificación más tarde.
            Log::warning('Mercado Pago: no se pudo consultar el pago', ['payment' => $paymentId]);
            return response()->json(['ok' => false], 500);
        }

        $order = Order::where('reference', $payment['external_reference'])->first();
        if (!$order) {
            return response()->json(['ok' => true]);
        }

        $status = $payment['status'];

        if ($status === 'approved') {
            // Update atómico: solo la primera notificación cambia el estado y dispara a n8n,
            // aunque Mercado Pago mande la misma notificación varias veces.
            $changed = Order::where('id', $order->id)
                ->where('status', '!=', 'paid')
                ->update(['status' => 'paid', 'mp_payment_id' => $paymentId]);

            if ($changed) {
                $this->notifyN8n($order->fresh());
            }
        } elseif (in_array($status, ['rejected', 'cancelled'], true)) {
            Order::where('id', $order->id)->where('status', 'pending')->update(['status' => 'rejected']);
        }

        return response()->json(['ok' => true]);
    }

    private function notifyN8n(Order $order): void
    {
        $url = config('services.n8n.webhook_url');
        if (!$url) {
            return;
        }

        try {
            Http::timeout(10)->post($url, [
                'reference'     => $order->reference,
                'name'          => $order->name,
                'email'         => $order->email,
                'delivery_date' => $order->delivery_date,
                'total'         => (float) $order->total,
                'items'         => $order->items,
            ]);
        } catch (\Throwable $e) {
            Log::error('No se pudo avisar a n8n', ['order' => $order->reference, 'error' => $e->getMessage()]);
        }
    }
}
