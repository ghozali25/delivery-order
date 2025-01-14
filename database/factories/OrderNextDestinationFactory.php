<?php

namespace Database\Factories;

use App\Models\DestinationArea;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderNextDestination>
 */
class OrderNextDestinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idDestinationArea = DestinationArea::pluck('id');
        return [
            'id_destination_area' => fake()->randomElement($idDestinationArea),
            'cost' => fake()->numberBetween(100000, 999999),
        ];
    }
}
