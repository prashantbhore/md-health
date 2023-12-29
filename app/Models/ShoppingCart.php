<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'md_shopping_cart';

    protected $fillable =[
           'customer_id',
           'product_id',
           'quantity',
           'platform_type', 
           'created_by',
           'modified_by',
           'status',
    ];


    public function product()
    {
        return $this->belongsTo(VendorProduct::class,'product_id','id');
    }
    





}
