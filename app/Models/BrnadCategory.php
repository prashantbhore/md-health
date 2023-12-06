<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrnadCategory extends Model
{
    use HasFactory;

    protected $table = 'md_master_brand_category';
    protected $fillable = [
             'brand_unique_id',
             'category_name',
             'status', 
             'created_ip_address',
             'modified_ip_address',
             'created_by',
             'modified_by',
    ];
}
