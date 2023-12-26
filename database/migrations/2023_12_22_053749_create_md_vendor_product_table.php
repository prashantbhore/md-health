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
        Schema::create('md_vendor_product', function (Blueprint $table){
            $table->id();
            $table->bigInteger('vendor_id')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_unique_id')->nullable();
            $table->bigInteger('product_category_id')->nullable();
            $table->bigInteger('product_subcategory_id')->nullable();
            $table->longText('product_description');
            $table->string('product_price');
            $table->string('shipping_fee');
            $table->enum('free_shipping', ['yes', 'no'])->default('no');
            $table->string('discount_price')->nullable();
            $table->string('sale_price')->nullable();
            $table->enum('featured', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('md_vendor_product');
    }
};
