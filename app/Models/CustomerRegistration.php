<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Storage;


class CustomerRegistration extends Authenticatable
{
    // use HasFactory;
    // protected $table = 'md_customer_registration';
    use HasFactory, Notifiable, HasApiTokens;
    protected $guard = 'md_customer_registration';
    protected $table = 'md_customer_registration';

    protected $fillable = [
        'customer_unique_no',
        'first_name',
        'last_name',
        'full_name',
        'email',
        'phone',
        'gender',
        'country_id',
        'date_of_birth',
        'city_id',
        'address',
        'password',
        'user_type',
        'platform_type',
        'registration_otp',
        'login_otp',
        'access_token',
        'fcm_token',
        'otp_expiring_time',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }


    

            public function customerOrders()
            {
                return $this->hasMany(CustomerPurchaseDetails::class, 'customer_id');
            }



    

}
