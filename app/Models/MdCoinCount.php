<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MdCoinCount extends Model
{
    use HasFactory;
    protected $table = 'md_referal_coin_count_settings';
    protected $fillable = [
        'coin_count',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
