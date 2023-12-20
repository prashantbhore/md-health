<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class MedicalProviderRegistrater extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $guard = 'md_health_medical_providers_registers';
    protected $table = 'md_medical_provider_register';
    protected $fillable = [
             'provider_unique_no',
             'company_name',
             'country_id',
             'city_id',
             'roll_id',
             'email',
             'mobile_no',
             'tax_no',
             'company_address',
             'password',
             'company_logo_image_path',
             'company_logo_image_name',
             'company_licence_image_path',
             'company_licence_image_name',
             'authorisation_full_name',
             'company_overview',
             'registration_otp',
             'login_otp',
             'access_token',
             'fcm_token',
             'otp_expiring_time',
              'verified', 
               'platform_type', 
             'status', 
             'created_ip_address',
             'modified_ip_address',
             'created_by',
             'modified_by',
    ];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function provider_logo()
    {
        return $this->belongsTo(MedicalProviderLogo::class, 'id','medical_provider_id')
            ->where('status', 'active');
    }

}
