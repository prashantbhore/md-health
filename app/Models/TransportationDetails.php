<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportationDetails extends Model
{
    use HasFactory;
    protected $table = 'md_add_transportation_details';
    protected $fillable = [
        'vehicle_brand_id',
        'vehicle_model_id',
        'comfort_level_id',
        'vehicle_per_day_price',
        'other_services',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
