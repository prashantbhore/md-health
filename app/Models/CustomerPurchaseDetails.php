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
        'package_treatment_price',
        'package_hotel_price',
        'package_transportation_price',
        'package_total_price',
        'package_payment_plan',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
