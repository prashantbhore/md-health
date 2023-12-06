<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{
    use HasFactory;

    protected $table = 'md_product_sub_category';

    protected $fillable = [
          'product_category_id',
          'product_sub_category_name',
          'status',
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
    ];
}
