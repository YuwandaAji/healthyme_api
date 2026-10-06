<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialistFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([
                'Dokter Umum', 'Anak', 'Kulit', 'Penyakit Dalam',
                'THT', 'Kandungan', 'Paru-Paru', 'Psikologi',
            ]),
            'image_url' => null,
            'is_more' => false,
        ];
    }
}