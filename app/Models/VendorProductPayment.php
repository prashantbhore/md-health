<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProductPayment extends Model
{
    use HasFactory;

    protected $table = 'md_vendor_product_payment';

    protected $fillable =[
            'customer_id',
            'vendor_id',
            'product_id',
            'quantity',
            'cart_id',
            'amount',
            'payment_id',
            'card_number',
            'expiration_date',
            'cvv',
            'bank_account_number',
            'bank_name',
            'wallet_id',
            'order_status', 
            'platform_type', 
            'created_by',
            'modified_by',
             'status',
    ];
}
