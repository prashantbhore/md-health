<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCustomerFollower extends Model
{
    use HasFactory;

    protected $table = 'md_vendor_followers';

    protected $fillable =[
          'customer_id',
          'vendor_id',
          'platform_type',
          'created_by',
          'modified_by',
           'status',
    ];
}
