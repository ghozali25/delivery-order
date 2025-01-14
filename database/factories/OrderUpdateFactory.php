<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderUpdate>
 */
class OrderUpdateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'datetime_updated' => Carbon::now(),
            'note' => fake()->paragraphs(2, true),
            'cost' => fake()->numberBetween(100000, 999999),
        ];
    }
}
