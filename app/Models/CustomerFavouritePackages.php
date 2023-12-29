<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerFavouritePackages extends Model
{
    use HasFactory;

    protected $table = 'md_customer_favourite_packages';

    protected $fillable = [
        'customer_id',
        'package_id',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
