<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipSettings extends Model
{
    use HasFactory;

    protected $table = 'membership_settings';
    protected $fillable = [
            'membership_type',
            'vendor_type',
            'membership_amount',
            'commission_percent',
            'facility',
            'status',
            'created_ip_address',
            'modified_ip_address',
            'created_by',
            'modified_by',
    ];
}
