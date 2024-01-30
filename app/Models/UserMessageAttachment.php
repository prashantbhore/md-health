<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessageAttachment extends Model
{
    use HasFactory;
    protected $table = 'md_user_message_attachments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'user_type',
        'attachment_name',
        'attachment_path',
        'conversation_id',
    ];
}
