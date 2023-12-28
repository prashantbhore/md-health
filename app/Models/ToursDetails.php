<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToursDetails extends Model
{
    use HasFactory;
    protected $table = 'md_tours';
    protected $fillable = [
        'tour_name',
        'tour_description',
        'tour_days',
        'tour_image_path',
        'tour_image_name',
        'tour_price',
        'tour_other_services',
        'platform_type',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
