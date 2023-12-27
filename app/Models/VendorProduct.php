<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;

    protected $table = 'md_vendor_product';

    protected $fillable =[
           'vendor_id',
           'product_name',
           'product_unique_id',
           'product_category_id',
           'product_subcategory_id',
           'product_description',
           'product_price',
           'shipping_fee',
           'free_shipping',
           'discount_price',
           'sale_price',
           'featured',
           'status',
           'created_ip_address',
           'modified_ip_address',
           'created_by',
           'modified_by',
    ];
}
