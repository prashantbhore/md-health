<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdShopFavorite extends Model
{
    use HasFactory;

    protected $table = 'md_shop_favorites';

    protected $fillable =[
           'customer_id',
           'product_id',
           'platform_type', 
           'created_by',
           'modified_by',
           'status', 
    ];
}
