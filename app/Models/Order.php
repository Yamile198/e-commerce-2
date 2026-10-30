<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'reference', 'name', 'email', 'delivery_date', 'items',
        'total', 'status', 'mp_preference_id', 'mp_payment_id',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
