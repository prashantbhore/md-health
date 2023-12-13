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
        Schema::create('md_medical_provider_reports', function (Blueprint $table) {
            $table->id();
            $table->string('report_title')->nullable();
            $table->bigInteger('customer_package_purchage_id')->nullable();
            $table->bigInteger('custome_id')->nullable();
            $table->bigInteger('purchage_id')->nullable();
            $table->string('report_path')->nullable();
            $table->string('report_name')->nullable();
            $table->bigInteger('medical_provider_id')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->enum('platform_type', ['android', 'ios', 'web'])->nullable();
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
        Schema::dropIfExists('md_medical_provider_reports');
    }
};
