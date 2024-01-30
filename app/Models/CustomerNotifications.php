<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerNotifications extends Model
{
    use HasFactory;
    protected $table = 'md_customer_notifications';
    protected $fillable = [
        'customer_id',
        'convrsation_id',
        'package_id',
        'purchase_id',
        'notification_for',
        'provider_id',
        'notification_description',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
