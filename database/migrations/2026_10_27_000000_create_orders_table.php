<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();      // lo que mandamos a Mercado Pago como external_reference
            $table->string('name');
            $table->string('email');
            $table->string('delivery_date')->nullable(); // texto tal como lo manda el calendario
            $table->json('items');
            $table->decimal('total', 10, 2);
            $table->string('status')->default('pending'); // pending | paid | rejected
            $table->string('mp_preference_id')->nullable();
            $table->string('mp_payment_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
