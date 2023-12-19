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
        Schema::create('md_customer_package_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->string('treatment_reviews')->nullable();
            $table->string('acommodation_reviews')->nullable();
            $table->string('transporatation_reviews')->nullable();
            $table->string('behaviour_reviews')->nullable();
            $table->string('provider_reviews')->nullable();
            $table->string('extra_notes')->nullable();
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
        Schema::dropIfExists('md_customer_package_reviews');
    }
};
