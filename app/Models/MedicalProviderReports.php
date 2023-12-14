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
      'customer_package_purchage_id',
       'custome_id',
        'purchage_id',
       'report_path',
       'report_name',
        'medical_provider_id',
       'created_ip_address',
       'modified_ip_address',
      'platform_type', 
        'created_by',
        'modified_by',
        'status',
    ];

    public function provider()
    {
        return $this->belongsTo(MedicalProviderRegistrater::class,'created_by');
    }

    // public function customerPurchagedPackage()
    // {
    //     return $this->belongsTo(CustomerPurchaseDetails::class,'customer_package_purchage_id');
    // }


    
    // public function customer()
    // {
    //     return $this->belongsTo(CustomerRegistration::class, 'customer_id');
    // }


    public function customerPackagePurchase()
    {
        return $this->belongsTo(CustomerPurchaseDetails::class, 'customer_package_purchage_id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerRegistration::class, 'customer_id');
    }

    public function provider_logo()
    {
        return $this->belongsTo(MedicalProviderLogo::class, 'created_by','medical_provider_id')
            ->where('status', 'active');
    }
   
    
}
