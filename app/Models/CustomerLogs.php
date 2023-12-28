<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerLogs extends Model
{
    use HasFactory;
    protected $table = 'md_customer_login_logs';

    protected $fillable = [
        'customer_id',
        'type',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
