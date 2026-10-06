<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => fake()->randomElement([
                'appointment', 'schedule_change', 'medical_note', 'history_update',
            ]),
            'title' => fake()->sentence(4),
            'description' => fake()->sentence(10),
            'is_read' => fake()->boolean(30), // 30% kemungkinan true
        ];
    }
}