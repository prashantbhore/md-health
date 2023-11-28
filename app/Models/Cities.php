<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    use HasFactory;
    protected $table = 'md_master_cities';

    protected $fillable = [
        'country_id',
        'state_id',
        'city_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }




}
