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
        Schema::create('md_coins_status', function (Blueprint $table){
            $table->id();
            $table->bigInteger('customer_id')->nullable();
            $table->string('invited_email')->nullable();
            $table->enum('wallet_status', ['your_netowrk', 'pending_invite', 'invites_left'])->default('pending_invite');
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
        Schema::dropIfExists('md_coins_status');
    }
};
