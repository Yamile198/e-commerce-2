<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reference', 'name', 'email', 'address', 'delivery_date', 'items',
        'total', 'status', 'mp_preference_id', 'mp_payment_id',
    ];

    protected $casts = [
        'items' => 'array',
    ];

    // Minutos que tiene el cliente para pagar; después la preferencia de Mercado Pago vence.
    public const PAYMENT_MINUTES = 30;

    /**
     * Pedidos que ocupan lugar: los pagados y los pendientes que todavía se pueden pagar.
     * Los pendientes viejos (carritos abandonados) ya no cuentan para los límites.
     */
    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('status', 'paid')
              ->orWhere(function ($q) {
                  $q->where('status', 'pending')
                    ->where('created_at', '>=', now()->subMinutes(self::PAYMENT_MINUTES));
              });
        });
    }
}
