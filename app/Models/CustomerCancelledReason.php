<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCancelledReason extends Model
{
    use HasFactory;
    protected $table = 'customer_cancellation_reason';

    protected $fillable = [
        'purchase_id',
        'customer_id',
        'package_id',
        'cancellation_reason',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
