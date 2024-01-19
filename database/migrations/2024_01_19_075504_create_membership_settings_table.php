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
        Schema::create('membership_settings', function (Blueprint $table){
            $table->id();
            $table->enum('membership_type', ['silver', 'gold', 'platinum'])->unique();
            $table->enum('vendor_type', ['medical_service_provider','food_vendor','shop_vendor','home_service'])->nullable();
            $table->string('membership_amount')->nullable();
            $table->string('commission_percent')->nullable();
            $table->bigInteger('facility')->nullable();
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
        Schema::dropIfExists('membership_settings');
    }
};
