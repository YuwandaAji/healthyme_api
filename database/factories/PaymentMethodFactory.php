<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type' => fake()->randomElement(['Credit Card', 'Bank Transfer', 'E-Wallet']),
            'provider' => fake()->randomElement(['Visa', 'Mastercard', 'BCA', 'GoPay', 'OVO']),
            'account_name' => fake()->name(),
            'last_digits' => fake()->numerify('####'),
            'is_default' => false,
        ];
    }
}