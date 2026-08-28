<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'referral_code' => $this->faker->regexify('[A-Z0-9]{10}'),
            'city' => $this->faker->city(),
            'package' => $this->faker->word(),
            'duration' => $this->faker->randomElement(['1 month', '3 months', '6 months', '1 year']),
            'date' => $this->faker->date(),
            'room_type' => $this->faker->randomElement(['single', 'double', 'suite']),
            'notes' => $this->faker->optional()->text(255),
            'status' => $this->faker->randomElement(['new', 'contacted', 'confirmed', 'cancelled']),
        ];
    }
}
