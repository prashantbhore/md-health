<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalProviderReports extends Model
{
    use HasFactory;

    protected $table = 'md_medical_provider_reports';
    protected $fillable = [
          'report_title',
          'patient_id',
          'report_path',
          'report_name',
          'medical_provider_id',
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
           'status', 
    ];
}
