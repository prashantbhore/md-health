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
        Schema::create('md_other_patient_information', function (Blueprint $table) {
            $table->id();
            $table->string('patient_unique_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->string('patient_full_name')->nullable();
            $table->string('patient_relation')->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_contact_no')->nullable();
            $table->string('patient_country_id')->nullable();
            $table->string('patient_city_id')->nullable();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modified_by')->nullable();
            $table->enum('platform_type', ['android', 'ios', 'web'])->nullable();
            $table->enum('status', ['active', 'delete', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('md_other_patient_information');
    }
};
