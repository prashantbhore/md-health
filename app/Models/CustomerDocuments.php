<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDocuments extends Model
{
    use HasFactory;
    protected $table = 'md_customer_documents';
    protected $fillable = [
        'package_id',
        'customer_id',
        'customer_document_image_path',
        'customer_document_image_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
