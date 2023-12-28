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
        Schema::create('md_vendor_followers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('vendor_id');
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
        Schema::dropIfExists('md_vendor_followers');
    }
};
