<?php

namespace Database\Factories;

use App\Models\Conversation;
use Illuminate\Database\Eloquent\Factories\Factory;

class MessageFactory extends Factory
{
    public function definition(): array
    {
        return [
            'conversation_id' => Conversation::factory(),
            'sender_type' => fake()->randomElement(['user', 'doctor']),
            'type' => 'text',
            'content' => fake()->sentence(8),
            'voice_url' => null,
            'voice_duration' => null,
        ];
    }
}