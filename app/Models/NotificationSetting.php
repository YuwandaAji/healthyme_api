<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'push_enabled', 'email_enabled', 'appointment_reminder',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}