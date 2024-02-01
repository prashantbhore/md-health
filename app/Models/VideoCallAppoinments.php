<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCallAppoinments extends Model
{
    use HasFactory;

    protected $table = 'md_user_video_call_appointments';
    protected $fillable = [
        'user_id',
        'provider_id',
        'provider_type',
        'conversation_subject',
        'conversation_date',
        'package_id',
        'conversation_id',
        'selected_time',
        'room_id',
        'created_ip_address',
        'modified_ip_address',
        'created_by',
        'modified_by',
    ];
}
