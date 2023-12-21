<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProviderRole extends Model
{
    use HasFactory;

    protected $table = 'md_medical_provider_system_user_roles';
    protected $fillable = [
         'role_name',
         'privilege',
         'created_ip_address',
         'modified_ip_address',
         'platform_type',
         'created_by',
         'modified_by',
         'status',
    ];
}
