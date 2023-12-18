<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonUserLoginTable extends Model
{
    use HasFactory;
    protected $table = 'common_user_login';
    protected $fillable = [
        'user_id',
        'email',
        'mobile_no',
        'password',
        'registration_otp',
        'login_otp',
        'user_type',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

}
