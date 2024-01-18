<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Provider;

class Packages extends Model
{
    use HasFactory;
    protected $table = 'md_packages';
    protected $fillable = [
        'package_unique_no',
        'city_id',
        'package_name',
        'treatment_category_id',
        'treatment_id',
        'other_services',
        'treatment_period_in_days',
        'treatment_price',
        'hotel_id',
        'hotel_in_time',
        'hotel_out_time',
        'hotel_acommodition_price',
        'vehicle_id',
        'vehicle_in_time',
        'vehicle_out_time',
        'tour_id',
        'tour_in_time',
        'tour_price',
        'transportation_acommodition_price',
        'visa_details',
        'visa_service_price',
        'translation_price',
        'ambulance_service_price',
        'ticket_price',
        'package_discount',
        'package_price',
        'sale_price',
        'featured_product',
        'platform_type',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function provider()
    {
        return $this->belongsTo(MedicalProviderRegistrater::class,'created_by');
    }

    public function provider_logo()
    {
       return $this->belongsTo(MedicalProviderLogo::class, 'created_by','medical_provider_id')
                ->where('status','active');
    }


    public function product_category()
    {
       return $this->belongsTo(ProductCategory::class,'treatment_id');
            
    }

    public function providerGallery()
    {
        return $this->hasMany(ProviderImagesVideos::class, 'provider_id', 'created_by')
                    ->where('status', 'active');
    }

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id');
    }

    public function salesDetails()
    {
        return $this->hasMany(CustomerPurchaseDetails::class, 'package_id')->where('status','active');
    }

    

    public function salesCount()
    {
        return $this->salesDetails()->count();
    }


    


}
