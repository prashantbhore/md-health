<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $table = 'md_user_message_interaction';
    protected $fillable = [
            'sender_id',
            'sender_type',
            'conversation_id',
            'room_id',
            'last_read_message',
            'latest_message',
            'conversation_subject',
            'conversation_for',
            'created_by',
            'modified_by',
    ];
}
