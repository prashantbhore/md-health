<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientInformation extends Model
{
    use HasFactory;
    protected $table = 'md_other_patient_information';

    protected $fillable = [
        'patient_unique_id',
        'customer_id',
        'package_id',
        'patient_full_name',
        'patient_relation',
        'patient_email',
        'patient_contact_no',
        'patient_country_id',
        'patient_city_id',
        'package_buy_for',
        'address',
        'birth_date',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
