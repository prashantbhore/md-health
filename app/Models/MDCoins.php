<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDCoins extends Model
{
    use HasFactory;
    protected $table = 'md_coins';
    protected $fillable = [
        'customer_id',
        'coins',
        'invitation_count',
        'total_invitation_count',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];


    public function customer()
    {
        return $this->belongsTo(CustomerRegistration::class, 'customer_id');
    }


    public function earner()
    {
        return $this->belongsTo(CustomerRegistration::class, 'reffered_customer_id');
    }




}
