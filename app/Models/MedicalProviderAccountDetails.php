<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProviderAccountDetails extends Model
{
    use HasFactory;

    protected $table = 'md_medical_provider_account_details';

    protected $fillable = [
          'medical_provider_id',
          'account_number',
          'bank_name',
          'created_ip_address',
          'modified_ip_address',
           'platform_type', 
          'created_by',
          'modified_by',
          'status',
    ];
}
