<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packages extends Model
{
    use HasFactory;
    protected $table = 'md_packages';
    protected $fillable = [
        'package_unique_no',
        'city_id',
        'package_name',
        'treatment_category_id',
        'treatment_id',
        'other_services',
        'treatment_period_in_days',
        'treatment_price',
        'hotel_id',
        'hotel_in_time',
        'hotel_out_time',
        'hotel_acommodition_price',
        'vehicle_id',
        'vehicle_in_time',
        'vehicle_out_time',
        'transportation_acommodition_price',
        'visa_details',
        'visa_service_price',
        'package_discount',
        'package_price',
        'sale_price',
        'platform_type',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
