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

            // Data customer
            $table->string('billing_name');
            $table->string('billing_email')->nullable();
            $table->string('billing_phone')->nullable();

            // Total harga
            $table->integer('total_price');

            // Status pembayaran: paid/unpaid/pending
            $table->enum('payment_status', ['paid', 'unpaid', 'pending'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
