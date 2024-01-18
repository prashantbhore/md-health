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
        Schema::create('md_ads_and_promo', function (Blueprint $table) {
            $table->id();
            $table->longText('ads_for_page')->nullable();
            $table->longText('ads_url')->nullable();
            $table->string('ads_image_path')->nullable();
            $table->string('ads_image_name')->nullable();
            $table->enum('promo_status', ['publish','schedule'])->default('schedule');
            $table->string('date')->nullable();
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
        Schema::dropIfExists('md_ads_and_promo');
    }
};
