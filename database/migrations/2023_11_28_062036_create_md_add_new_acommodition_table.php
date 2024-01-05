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
        Schema::create('md_add_new_acommodition', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_address')->nullable();
            $table->string('hotel_stars')->nullable();
            $table->string('hotel_image_path')->nullable();
            $table->string('hotel_image_name')->nullable();
            $table->string('hotel_per_night_price')->nullable();
            $table->string('hotel_other_services')->nullable();
            $table->string('distance_from_hospital')->nullable();
            $table->string('service_provider_id')->nullable();
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
        Schema::dropIfExists('md_add_new_acommodition');
    }
};
