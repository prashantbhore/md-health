<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProviderLicense extends Model
{
    use HasFactory;

    protected $table = 'md_medical_provider_license';
    protected $fillable = [
         'medical_provider_id',
          'company_licence_image_path',
          'company_licence_image_name',
           'status',
           'created_ip_address',
           'modified_ip_address',
           'created_by',
           'modified_by',
    ];

}
