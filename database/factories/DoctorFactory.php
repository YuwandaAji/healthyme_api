<?php

namespace Database\Factories;

use App\Models\Specialist;
use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specialist_id' => Specialist::factory(),
            'name' => 'Dr. ' . fake()->name() . ', Ph.D.',
            'experience_years' => fake()->numberBetween(2, 20),
            'price' => fake()->randomElement([15000, 20000, 25000, 30000]),
            'rating' => fake()->randomFloat(1, 4.0, 5.0),
            'review_count' => fake()->numberBetween(1, 5) . 'k+ Ulasan',
            'photo' => null,
        ];
    }
}