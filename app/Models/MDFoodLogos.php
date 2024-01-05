<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDFoodLogos extends Model
{
    use HasFactory;
    protected $table = 'md_food_logo';
    protected $fillable = [
        'food_id',
        'company_logo_image_path',
        'company_logo_image_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
