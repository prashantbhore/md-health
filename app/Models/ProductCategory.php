<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $table = 'md_product_category';

    protected $fillable = [
          'main_product_category_id',
          'product_unique_id',
          'product_category_name',
           'status',
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
    ];


    public function subcategories()
    {
        return $this->hasMany(ProductSubCategory::class);
    }




}
