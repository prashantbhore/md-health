<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorLogo extends Model
{
    use HasFactory;
    
    protected $table = 'vendor_logo';
    protected $fillable = [
         'vendor_id',
          'company_logo_image_path',
          'company_logo_image_name',
           'status', 
          'created_ip_address',
          'modified_ip_address',
         'created_by',
         'modified_by',
    ];

}
