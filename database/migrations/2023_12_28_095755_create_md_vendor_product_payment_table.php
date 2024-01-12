<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('md_vendor_product_payment', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->bigInteger('customer_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('product_id');
            $table->string('quantity');
            $table->bigInteger('cart_id');
            $table->string('amount');

            $table->bigInteger('payment_id')->nullable();
            $table->enum('payment_status', ['completed','pending','failed'])->default('pending');
            $table->string('card_number')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('cvv')->nullable();
            $table->string('bank_account_number')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('wallet_id')->nullable();
            $table->enum('order_status', ['completed','pending','active','cancelled'])->default('pending');
            
            $table->enum('platform_type', ['android', 'ios', 'web'])->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->enum('status', ['active', 'delete', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_vendor_product_payment');
    }
};
