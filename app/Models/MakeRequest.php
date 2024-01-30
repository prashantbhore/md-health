<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeRequest extends Model
{
    use HasFactory;
    protected $table = 'md_make_request_form';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'contact_no',
        'treatment_name',
        'details',
        'treatment_image_path',
        'treatment_image_name',
        'why_do_you_need_treatment',
        'travel_visa',
        'status',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
