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
            $table->bigInteger('purchase_id')->nullable();
            $table->bigInteger('package_id')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->bigInteger('cleanliness')->nullable();
            $table->bigInteger('comfort')->nullable();
            $table->bigInteger('food_quality')->nullable();
            $table->bigInteger('behaviour_reviews')->nullable();
            $table->bigInteger('recommended')->nullable();
            $table->string('review_feedback')->nullable();
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
