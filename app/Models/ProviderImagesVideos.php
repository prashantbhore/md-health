<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class ProviderImagesVideos extends Model
{
    use HasFactory;
    protected $table = 'medical_provider_account_multiple_images_videos';
    protected $fillable = [
        'provider_id',
        'provider_image_path',
        'provider_image_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

}
