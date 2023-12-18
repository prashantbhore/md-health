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
        Schema::create('md_medical_provider_system_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('medical_provider_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('role_id')->nullable();
            $table->string('password')->nullable();
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
        Schema::dropIfExists('md_medical_provider_system_users');
    }
};
