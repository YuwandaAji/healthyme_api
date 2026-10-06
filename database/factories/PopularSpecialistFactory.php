<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PopularSpecialistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement([
                'Infeksi Pernapasan', 'Bapil Anak', 'Eksim', 'Infeksi Mata',
            ]),
            'image_url' => null,
        ];
    }
}