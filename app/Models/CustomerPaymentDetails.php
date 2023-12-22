<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPaymentDetails extends Model
{
    use HasFactory;
    protected $table = 'md_customer_payment_details';

    protected $fillable = [
        'order_id',
        'customer_id',
        'purchase_type',
        'card_name',
        'card_no',
        'card_expiry_date',
        'card_cvv',
        'md_coin',
        'payment_percentage',
        'paid_amount',
        'pending_payment',
        'payment_status',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];


    public function provider_logo()
    {
        return $this->belongsTo(MedicalProviderLogo::class, 'provider_id','medical_provider_id')
            ->where('status', 'active');
    }


    public function purchage()
    {
        return $this->belongsTo(CustomerPurchaseDetails::class, 'order_id','id')
            ->where('status', 'active');
    }



    




}
