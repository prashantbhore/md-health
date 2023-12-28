<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'md_admin';
    protected $fillable =[
          'name',
          'role',
          'userType',
          'privileges',
          'email',
          'password',
          'otp',
          'fcm_token',
          'access_token',
           'last_login',
          'created_ip_address',
          'modified_ip_address',
           'created_by',
           'status',
    ];
}
