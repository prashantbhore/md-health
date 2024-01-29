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
        'purchase_id',
        'cleanliness',
        'comfort',
        'food_quality',
        'behaviour_reviews',
        'recommended',
        'review_feedback',
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
