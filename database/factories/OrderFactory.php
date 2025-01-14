<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\DestinationArea;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idClient = Client::pluck('id');
        $idEmployee = Employee::whereHas('user.role', function ($query) {
            $query->where('abbreviation', 'STAFF');
        })->pluck('id');
        $idDriver = Driver::pluck('id');
        $idVehicle = Vehicle::pluck('id');
        $idDestinationArea = DestinationArea::pluck('id');
        return [
            'id_client' => fake()->randomElement($idClient),
            'id_employee' => fake()->randomElement($idEmployee),
            'id_driver' => fake()->randomElement($idDriver),
            'id_vehicle' => fake()->randomElement($idVehicle),
            'cargo_name' => fake()->words(3, true),
            'cargo_weight_kg' => fake()->numberBetween(0, 9999),
            'cargo_note' => fake()->paragraphs(3, true),
            'recipient_name' => fake()->company(),
            'recipient_phone' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'recipient_address' => fake()->address(),
            'id_destination_area' => fake()->randomElement($idDestinationArea),
            'cost' => fake()->unique()->numberBetween(1000000, 9999999),
            'datetime_ordered' => fake()->dateTime(),
            'datetime_confirmed' => null,
            'datetime_assigned' => null,
            'datetime_closed' => null,
        ];
    }
}
