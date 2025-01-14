<?php

namespace Database\Factories;

use App\Models\VehicleType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idVehicleType = VehicleType::get('id');
        return [
            'plate' => fake()->unique()->randomNumber(5),
            'id_vehicle_type' => fake()->randomElement($idVehicleType),
            'brand' => fake()->company(),
            'model' => fake()->name(),
            'color' => fake()->colorName(),
        ];
    }
}
