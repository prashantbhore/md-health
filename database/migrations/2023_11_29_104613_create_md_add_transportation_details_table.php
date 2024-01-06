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
        Schema::create('md_add_transportation_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('vehicle_brand_id')->nullable();
            $table->string('vehicle_model_id')->nullable();
            $table->bigInteger('comfort_level_id')->nullable();
            $table->string('vehicle_per_day_price')->nullable();
            $table->string('vehicle_image_path')->nullable();
            $table->string('vehicle_image_name')->nullable();
            $table->string('other_services')->nullable();
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
        Schema::dropIfExists('md_add_transportation_details');
    }
};
