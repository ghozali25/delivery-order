<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Driver>
 */
class DriverFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ktp' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'name' => fake()->name(),
            'phone' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
            'datetime_inactive' => null,
        ];
    }
}
