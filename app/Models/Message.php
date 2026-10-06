<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id', 'sender_type', 'type',
        'content', 'voice_url', 'voice_duration',
    ];

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}