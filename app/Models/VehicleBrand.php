<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleBrand extends Model
{
    use HasFactory;
    protected $table = 'md_master_brand';
    protected $fillable = [
        'brand_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
