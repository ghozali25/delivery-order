<?php

namespace Database\Seeders;

use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VehicleType::create([
            'abbreviation' => null,
            'name' => 'Engkel',
            'max_cargo_weight_kg' => 2000,
        ]);
        VehicleType::create([
            'abbreviation' => null,
            'name' => 'Double',
            'max_cargo_weight_kg' => 4000,
        ]);
    }
}
