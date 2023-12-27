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
        Schema::create('md_customer_payment_details', function (Blueprint $table)
        {
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('provider_id')->nullable();
            $table->string('purchase_type')->nullable();
            $table->string('card_name')->nullable();
            $table->string('card_no')->nullable();
            $table->string('card_expiry_date')->nullable();
            $table->string('card_cvv')->nullable();
            $table->string('md_coin')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('receiver_name')->nullable();
            $table->string('iban')->nullable();
            $table->string('package_total_price')->nullable();
            $table->string('payment_percentage')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('pending_payment')->nullable();
            $table->enum('payment_status', ['pending', 'completed'])->nullable();
            $table->enum('status', ['active', 'delete', 'inactive'])->default('active');
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_customer_payment_details');
    }
};
