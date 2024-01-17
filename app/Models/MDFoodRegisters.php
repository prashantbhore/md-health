<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;

class MDFoodRegisters extends Authenticatable
{
    use HasFactory;
    use HasFactory, Notifiable, HasApiTokens;
    protected $guard = 'md_health_food_registers';
    protected $table = 'md_food_register';
    protected $fillable = [
        'food_unique_no',
        'company_name',
        'country_id',
        'city_id',
        'roll_id',
        'email',
        'mobile_no',
        'membership_type',
        'vendor_type',
        'vendor_status',
        'approved_by',
           'approved_date',
           'rejected_by',
           'rejected_date',
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
}
