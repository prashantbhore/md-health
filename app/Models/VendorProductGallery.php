<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProductGallery extends Model
{
    use HasFactory;
    protected $table = 'md_vendor_product_gallery';

    protected $fillable =[
          'vendor_product_id',
          'vendor_product_image_path',
          'vendor_product_image_name',
          'vndor_product_file_type',
          'status', 
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
    ];
}
