<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProductSubCategory extends Model
{
    use HasFactory;

    protected $table = 'md_vendor_product_sub_category';

    protected $fillable =[
          'sub_category_name',
           'sub_category_name',
           'status',
           'created_ip_address',
           'modified_ip_address',
           'created_by',
           'modified_by',
    ];
}
