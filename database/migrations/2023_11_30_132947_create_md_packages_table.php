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
        Schema::create('md_packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_unique_no')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('package_name')->nullable();
            $table->bigInteger('treatment_category_id')->nullable();
            $table->bigInteger('treatment_id')->nullable();
            $table->string('other_services')->nullable();
            $table->string('treatment_period_in_days')->nullable();
            $table->string('treatment_price')->nullable();
            $table->bigInteger('hotel_id')->nullable();
            $table->string('hotel_in_time')->nullable();
            $table->string('hotel_out_time')->nullable();
            $table->string('hotel_acommodition_price')->nullable();
            $table->bigInteger('vehicle_id')->nullable();
            $table->string('vehicle_in_time')->nullable();
            $table->string('vehicle_out_time')->nullable();
            $table->string('transportation_acommodition_price')->nullable();
            $table->bigInteger('tour_id')->nullable();
            $table->string('tour_in_time')->nullable();
            $table->string('tour_out_time')->nullable();
            $table->string('tour_price')->nullable();
            $table->string('visa_details')->nullable();
            $table->string('visa_service_price')->nullable();
            $table->string('translation_price')->nullable();
            $table->string('ambulance_service_price')->nullable();
            $table->string('ticket_price')->nullable();
            $table->string('package_discount')->nullable();
            $table->string('package_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->enum('platform_type', ['android', 'ios', 'web'])->nullable();
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
        Schema::dropIfExists('md_packages');
    }
};
