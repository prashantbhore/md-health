<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMenus extends Model
{
    use HasFactory;
    protected $table = 'md_food_menus';
    protected $fillable = [
        'package_id',
        'days',
        'calories',
        'meal_type',
        'menu_image_path',
        'menu_image_name',
        'menu',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
