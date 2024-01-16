<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackagesMultipleImages extends Model
{
    use HasFactory;
    protected $table = 'md_food_multiple_images';
    protected $fillable = [
        'package_id',
        'food_image_path',
        'food_image_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
