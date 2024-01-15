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
        Schema::create('md_food_menus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('days')->nullable();
            $table->bigInteger('calories')->nullable();
            $table->enum('meal_type', ['breakfast', 'lunch', 'dinner'])->nullable();
            $table->string('menu_image_path')->nullable();
            $table->string('menu_image_name')->nullable();
            $table->longText('menu')->nullable();
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
        Schema::dropIfExists('md_food_menus');
    }
};
