<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComfortLevels extends Model
{
    use HasFactory;
    protected $table = 'md_master_vehicle_comfort_levels';
    protected $fillable = [
        'vehicle_level_name',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
