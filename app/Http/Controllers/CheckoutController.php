<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    private const MP_API = 'https://api.mercadopago.com';

    // Límites del carrito. MAX_UNITS_PER_ORDER también está en cart.js (MAX_UNITS).
    private const MAX_ORDERS_PER_DAY    = 4; // pedidos por fecha de entrega
    private const MAX_UNITS_PER_ORDER   = 5; // unidades en total por pedido
    private const MAX_UNITS_PER_PRODUCT = 5; // por correo, platillo y fecha de entrega

    /**
     * Fechas de entrega que ya llegaron al máximo de pedidos, para bloquearlas en el calendario.
     */
    public function fullDates()
    {
        return Order::active()
            ->selectRaw('delivery_date, count(*) as orders_count') // no "total": choca con la columna total
            ->groupBy('delivery_date')
            ->having('orders_count', '>=', self::MAX_ORDERS_PER_DAY)
            ->pluck('delivery_date');
    }

    /**
     * Para n8n (cotizaciones por WhatsApp): lugares libres por fecha de entrega.
     * GET /api/disponibilidad?fecha=05/11/2026, o sin fecha para los próximos 14 días.
     * Requiere el header X-Api-Token con el valor de N8N_API_TOKEN.
     */
    public function availability(Request $request)
    {
        $token = config('services.n8n.api_token');
        if (!$token || !hash_equals($token, (string) $request->header('X-Api-Token'))) {
            return response()->json(['message' => 'No autorizado'], 401);
        }

        $validator = Validator::make($request->query(), ['fecha' => 'nullable|date_format:d/m/Y']);
        if ($validator->fails()) {
            return response()->json(['message' => 'La fecha debe tener el formato dd/mm/aaaa, por ejemplo 05/11/2026'], 422);
        }

        $fecha = $request->query('fecha');
        $days  = $fecha
            ? [Carbon::createFromFormat('!d/m/Y', $fecha)]
            : array_map(fn ($i) => today()->addDays($i), range(0, 13));

        $taken = Order::active()
            ->selectRaw('delivery_date, count(*) as orders_count')
            ->groupBy('delivery_date')
            ->pluck('orders_count', 'delivery_date');

        $result = array_map(function (Carbon $day) use ($taken) {
            $date   = $day->format('d/m/Y');
            $orders = (int) ($taken[$date] ?? 0);
            $places = $day->lt(today()) ? 0 : max(0, self::MAX_ORDERS_PER_DAY - $orders);

            return [
                'fecha'                    => $date,
                'dia'                      => $day->locale('es')->isoFormat('dddd'),
                'pedidos'                  => $orders,
                'maximo_pedidos'           => self::MAX_ORDERS_PER_DAY,
                'lugares_disponibles'      => $places,
                'disponible'               => $places > 0,
                'max_productos_por_pedido' => self::MAX_UNITS_PER_ORDER,
            ];
        }, $days);

        return response()->json($fecha ? $result[0] : $result);
    }

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

        $email = strtolower($data['email']);
        $date  = $data['delivery_date'];

        // Unidades pedidas por platillo (suma si el mismo id viene repetido).
        $requested = [];
        foreach ($data['items'] as $row) {
            $requested[$row['id']] = ($requested[$row['id']] ?? 0) + $row['qty'];
        }

        if (array_sum($requested) > self::MAX_UNITS_PER_ORDER) {
            return response()->json(['message' => 'Cada pedido puede tener máximo ' . self::MAX_UNITS_PER_ORDER . ' productos.'], 422);
        }

        if (Order::active()->where('delivery_date', $date)->count() >= self::MAX_ORDERS_PER_DAY) {
            return response()->json(['message' => "Ya no tenemos lugar para el {$date}. Elige otra fecha de entrega."], 422);
        }

        // Lo que este correo ya pidió para la misma fecha, por platillo.
        $alreadyBought = [];
        $previous = Order::active()->where('email', $email)->where('delivery_date', $date)->pluck('items');
        foreach ($previous as $items) {
            foreach ($items as $item) {
                if (isset($item['id'])) {
                    $alreadyBought[$item['id']] = ($alreadyBought[$item['id']] ?? 0) + $item['quantity'];
                }
            }
        }

        // Los precios salen del servidor, no del navegador.
        $catalog = config('products');
        $mpItems = [];
        $total   = 0;

        foreach ($requested as $id => $qty) {
            $product = $catalog[$id] ?? null;
            if (!$product) {
                return response()->json(['message' => 'Producto no válido'], 422);
            }

            $left = self::MAX_UNITS_PER_PRODUCT - ($alreadyBought[$id] ?? 0);
            if ($qty > $left) {
                $message = $left > 0
                    ? "Solo puedes pedir {$left} más de {$product['name']} para el {$date}."
                    : "Ya pediste el máximo de {$product['name']} para el {$date}.";
                return response()->json(['message' => $message], 422);
            }

            $mpItems[] = [
                'id'          => (string) $id, // para contar el límite por platillo en pedidos futuros
                'title'       => $product['name'],
                'quantity'    => (int) $qty,
                'unit_price'  => (float) $product['price'],
                'currency_id' => 'MXN',
            ];
            $total += $product['price'] * $qty;
        }

        $order = Order::create([
            'reference'     => 'SC-' . strtoupper(Str::random(8)),
            'name'          => $data['name'],
            'email'         => $email,
            'delivery_date' => $date,
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
            // El pedido aparta lugar mientras está pendiente; si no pagan a tiempo, el pago vence y se libera.
            'expires'            => true,
            'expiration_date_to' => now()->addMinutes(Order::PAYMENT_MINUTES)->format('Y-m-d\TH:i:s.vP'),
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
