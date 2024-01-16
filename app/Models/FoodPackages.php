<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPackages extends Model
{
    use HasFactory;
    protected $table = 'md_food_packages';
    protected $fillable = [
        'unique_id',
        'package_name',
        'food_type_id',
        'calories',
        'food_description',
        'breakfast_price',
        'lunch_price',
        'dinner_price',
        'package_price',
        'sales_price',
        'featured_request',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
