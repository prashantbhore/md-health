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
        Schema::create('customer_cancellation_reason', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('package_id')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->string('cancellation_detail')->nullable();
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
        Schema::dropIfExists('customer_cancellation_reason');
    }
};
