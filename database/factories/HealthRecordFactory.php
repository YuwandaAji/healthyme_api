<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class HealthRecordFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'date' => now()->toDateString(),
            'water_liter' => fake()->randomFloat(1, 0.5, 3.0),
            'steps' => fake()->numberBetween(1000, 12000),
            'blood_glucose' => fake()->numberBetween(80, 130),
            'systolic' => fake()->numberBetween(100, 140),
            'diastolic' => fake()->numberBetween(60, 90),
        ];
    }
}