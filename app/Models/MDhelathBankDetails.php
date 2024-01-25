<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MDhelathBankDetails extends Model
{
    use HasFactory;

    protected $table = 'md_health_account_details';

    protected $fillable =[
          'bank_name',
          'account_holder_name',
          'account_number',
          'status', 
          'created_ip_address',
          'modified_ip_address',
          'created_by',
          'modified_by',
    ];
}
