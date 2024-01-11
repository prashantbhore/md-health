<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReviews extends Model
{
    use HasFactory;
    protected $table = 'md_customer_package_reviews';

    protected $fillable = [
        'package_id',
        'customer_id',
        'treatment_reviews',
        'acommodation_reviews',
        'transporatation_reviews',
        'behaviour_reviews',
        'provider_reviews',
        'extra_notes',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function product()
    {
        return $this->belongsTo(Packages::class,'package_id','id');
    }

    public function customer()
    {
        return $this->belongsTo(CustomerRegistration::class,'customer_id','id');
    }



    


}
