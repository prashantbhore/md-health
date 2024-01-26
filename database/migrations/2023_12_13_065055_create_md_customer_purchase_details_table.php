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
        Schema::create('md_customer_purchase_details', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('conversation_id')->nullable();
            $table->string('case_no')->nullable();
            $table->bigInteger('case_manager_id')->nullable();
            $table->bigInteger('hotel_id')->nullable();
            $table->bigInteger('vehicle_id')->nullable();
            $table->bigInteger('tour_id')->nullable();
            $table->bigInteger('provider_id')->nullable();
            $table->longText('other_services')->nullable();
            $table->enum('type', ['myself', 'other'])->nullable();
            $table->string('package_treatment_price')->nullable();
            $table->string('package_hotel_price')->nullable();
            $table->string('package_transportation_price')->nullable();
            $table->string('treatment_start_date')->nullable();
            $table->string('package_total_price')->nullable();
            $table->string('payment_percentage')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('pending_payment')->nullable();
            $table->enum('purchase_type', ['pending','in_progress','active', 'completed', 'cancelled'])->nullable();
            $table->enum('purchase_status', ['purchased', 'not_purchased'])->default('not_purchased');
            $table->enum('payment_method', ['card', 'bank', 'md_coin'])->nullable();
            $table->enum('platform_type', ['android', 'ios', 'web'])->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
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
        Schema::dropIfExists('md_customer_purchase_details');
    }
};
