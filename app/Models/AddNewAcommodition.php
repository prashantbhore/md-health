<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddNewAcommodition extends Model
{
    use HasFactory;
    protected $table = 'md_add_new_acommodition';
    protected $fillable = [
        'hotel_name',
        'hotel_address',
        'hotel_stars',
        'hotel_image_path',
        'distance_from_hospital',
        'hotel_image_name',
        'hotel_per_night_price',
        'hotel_other_services',
        'service_provider_id',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
