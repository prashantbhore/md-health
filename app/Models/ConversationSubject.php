<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConversationSubject extends Model
{
    use HasFactory;

    protected $table = 'md_conversation_subject';
    protected $fillable = [
        'conversation_subject','','','','','','',
    ];
}
