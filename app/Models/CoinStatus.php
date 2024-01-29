<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinStatus extends Model
{
    use HasFactory;
    protected $table = 'md_coins_status';
    protected $fillable = [
        'customer_id',
        'invited_email',
        'reffered_customer_id',
        'wallet_status',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
