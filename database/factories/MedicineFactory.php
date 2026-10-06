<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'price' => fake()->numberBetween(5000, 150000),
            'image' => null,
            'category' => fake()->randomElement(['Respiratory', 'Heart', 'Skin', 'Children']),
            'type' => fake()->randomElement(['Medicine', 'Supplement', 'Salep']),
            'rating' => fake()->randomFloat(1, 3.0, 5.0),
            'description' => fake()->sentence(15),
        ];
    }
}