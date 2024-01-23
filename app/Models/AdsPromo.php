<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdsPromo extends Model
{
    use HasFactory;
    protected $table = 'md_ads_and_promo';
    protected $fillable = [
           'ads_for_page',
           'ads_url',
           'ads_image_path',
           'ads_image_name',
           'promo_status', 
           'date',
           'status', 
           'created_ip_address',
           'modified_ip_address',
            'created_by',
            'modified_by',
    ];
}
