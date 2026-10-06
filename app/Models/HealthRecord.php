<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'date', 'water_liter', 'steps',
        'blood_glucose', 'systolic', 'diastolic',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}