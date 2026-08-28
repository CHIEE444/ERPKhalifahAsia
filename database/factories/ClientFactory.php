<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'referral_code' => fake()->regexify('[A-Za-z0-9]{10}'),
            'city' => fake()->city(),
            'package' => fake()->word(),
            'duration' => fake()->randomElement(['9 Days', '12 Days']),
            'date' => fake()->date(),
            'room_type' => fake()->randomElement(['single', 'double', 'suite']),
            'note' => fake()->optional()->text(250),
            'status' => fake()->randomElement(['active', 'in_progress', 'completed', 'cancelled']),
        ];
    }
}
