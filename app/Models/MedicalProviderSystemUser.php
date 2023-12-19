<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProviderSystemUser extends Model
{
    use HasFactory;

    protected $table = 'md_medical_provider_system_users';
    protected $fillable = [
           'medical_provider_id',
           'name',
           'email',
           'role_id',
           'password',
           'created_ip_address',
           'modified_ip_address',
           'platform_type', 
           'created_by',
           'modified_by',
           'status', 
    ];
}
