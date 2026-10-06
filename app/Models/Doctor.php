<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialist_id', 'name', 'experience_years',
        'price', 'rating', 'review_count', 'photo',
    ];

    public function specialist()
    {
        return $this->belongsTo(Specialist::class);
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}