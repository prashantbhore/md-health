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
        Schema::create('md_vendor_register', function (Blueprint $table){
            $table->id();
            $table->string('vendor_unique_no')->nullable();
            $table->string('company_name')->nullable();
            $table->bigInteger('country_id')->nullable();
            $table->bigInteger('city_id')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('vendor_type')->nullable()->default('shop_vendor');
            $table->enum('vendor_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('tax_no')->nullable();
            $table->longText('company_address')->nullable();
            $table->string('password')->nullable();
            $table->string('authorisation_full_name')->nullable();
            $table->longText('company_overview')->nullable();
            $table->string('registration_otp')->nullable();
            $table->string('login_otp')->nullable();
            $table->string('access_token')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('otp_expiring_time')->nullable();
            $table->enum('verified', ['yes', 'no'])->nullable();
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
        Schema::dropIfExists('md_vendor_register');
    }
};
