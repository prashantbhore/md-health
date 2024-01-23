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
        Schema::create('md_food_packages', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('package_name')->nullable();
            $table->bigInteger('food_type_id')->nullable();
            $table->bigInteger('calories')->nullable();
            $table->longText('food_description')->nullable();
            $table->string('breakfast_price')->nullable();
            $table->string('lunch_price')->nullable();
            $table->string('dinner_price')->nullable();
            $table->string('package_price')->nullable();
            $table->string('sales_price')->nullable();
            $table->enum('featured_request', ['yes', 'no'])->default('yes');
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
        Schema::dropIfExists('md_food_packages');
    }
};
