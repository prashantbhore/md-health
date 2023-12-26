<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorLicense extends Model
{
    use HasFactory;
    
    protected $table = 'md_vendor_license';
    protected $fillable = [
           'vendor_id',
            'company_licence_image_path',
            'company_licence_image_name',
            'status', 
            'created_ip_address',
            'modified_ip_address',
            'created_by',
            'modified_by',
    ];
}
