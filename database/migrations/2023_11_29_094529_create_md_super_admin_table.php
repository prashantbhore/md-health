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
        Schema::create('md_super_admin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('userType')->nullable();
            $table->string('privileges')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->integer('otp')->nullable();
            $table->string('fcm_token')->nullable();
            $table->string('access_token')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->rememberToken();
            $table->string('created_ip_address')->nullable();
            $table->string('modified_ip_address')->nullable();
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
        Schema::dropIfExists('md_super_admin');
    }
};
