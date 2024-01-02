<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPurchaseDetails extends Model
{
    use HasFactory;
    protected $table = 'md_customer_purchase_details';

    protected $fillable = [
          'order_id',
          'customer_id',
          'package_id',
          'transaction_id',
          'case_no',
          'case_manager_id',
          'hotel_id',
          'vehicle_id',
          'tour_id',
          'package_treatment_price',
          'package_hotel_price',
          'package_transportation_price',
          'package_total_price',
          'treatment_start_date',
          'package_payment_plan',
          'payment_percentage',
          'paid_amount',
          'pending_payment',
           'purchase_type', 
           'payment_method',
           'platform_type',
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
           'status'
    ];


    public function customer()
    {
        return $this->belongsTo(CustomerRegistration::class, 'customer_id');
    }

    public function package()
    {
        return $this->belongsTo(Packages::class, 'package_id');
    }
    
    // public function report()
    // {
    //     return $this->hasMany(MedicalProviderReports::class, 'customer_package_purchage_id', 'id');
    // }
    

    public function report()
    {
        return $this->hasMany(MedicalProviderReports::class, 'customer_package_purchage_id', 'id');
    }


    public function provider()
    {
        return $this->belongsTo(MedicalProviderRegistrater::class,'created_by');
    }


    public function paymentDetails()
    {
        return $this->belongsTo(CustomerPaymentDetails::class,'id','order_id');
    }
    



    public function provider_logo()
    {
        return $this->belongsTo(MedicalProviderLogo::class, 'provider_id','medical_provider_id')
            ->where('status', 'active');
    }





 


   
    



}
