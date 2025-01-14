<?php

namespace Database\Seeders;

use App\Models\DeliveryCost;
use App\Models\DestinationArea;
use App\Models\VehicleType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tangerang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tangerang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 600000,
            'cost_second' => 100000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tangerang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 680000,
            'cost_second' => 100000,
        ]);





        // Jakarta
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Jakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 680000,
            'cost_second' => 100000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Jakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 780000,
            'cost_second' => 100000,
        ]);





        // Bogor
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bogor')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 730000,
            'cost_second' => 100000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bogor')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 900000,
            'cost_second' => 100000,
        ]);





        // Bekasi
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bekasi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 730000,
            'cost_second' => 100000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bekasi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 900000,
            'cost_second' => 100000,
        ]);





        // Serang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Serang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 730000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Serang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 900000,
            'cost_second' => 200000,
        ]);





        // Cikarang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cikarang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 825000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cikarang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1000000,
            'cost_second' => 200000,
        ]);





        // Ciawi
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Ciawi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 825000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Ciawi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1000000,
            'cost_second' => 200000,
        ]);





        // Sentul
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sentul')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 825000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sentul')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1000000,
            'cost_second' => 200000,
        ]);





        // Karawang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Karawang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 875000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Karawang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1050000,
            'cost_second' => 200000,
        ]);





        // Cikampek
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cikampek')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1050000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cikampek')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1275000,
            'cost_second' => 200000,
        ]);





        // Purwakarta
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Purwakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1150000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Purwakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1300000,
            'cost_second' => 200000,
        ]);





        // Subang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Subang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1150000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Subang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1300000,
            'cost_second' => 200000,
        ]);





        // Sukabumi
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sukabumi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1200000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sukabumi')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1350000,
            'cost_second' => 200000,
        ]);





        // Bandung
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bandung')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1500000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Bandung')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1650000,
            'cost_second' => 200000,
        ]);





        // Sumedang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sumedang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1750000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Sumedang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1850000,
            'cost_second' => 200000,
        ]);





        // Garut
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Garut')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1890000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Garut')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2200000,
            'cost_second' => 200000,
        ]);





        // Cirebon
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cirebon')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1750000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Cirebon')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1850000,
            'cost_second' => 200000,
        ]);





        // Indramayu
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Indramayu')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1750000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Indramayu')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 1850000,
            'cost_second' => 200000,
        ]);





        // Tasik
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tasik')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 2125000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tasik')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2350000,
            'cost_second' => 200000,
        ]);





        // Tegal
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tegal')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1125000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Tegal')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2350000,
            'cost_second' => 200000,
        ]);





        // Brebes
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Brebes')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 1125000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Brebes')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2350000,
            'cost_second' => 200000,
        ]);





        // Pekalongan
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Pekalongan')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 2250000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Pekalongan')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2500000,
            'cost_second' => 200000,
        ]);





        // Puwakerto
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Puwakerto')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 2600000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Puwakerto')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2800000,
            'cost_second' => 200000,
        ]);





        // Semarang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Semarang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 2700000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Semarang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 2900000,
            'cost_second' => 200000,
        ]);





        // Yogyakarta
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Yogyakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 3100000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Yogyakarta')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 3400000,
            'cost_second' => 200000,
        ]);





        // Magelang
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Magelang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 3100000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Magelang')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 3400000,
            'cost_second' => 200000,
        ]);





        // Solo
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Solo')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 3300000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Solo')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 3450000,
            'cost_second' => 200000,
        ]);





        // Pati
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Pati')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Engkel')->id,
            'cost_first' => 3300000,
            'cost_second' => 200000,
        ]);
        DeliveryCost::create([
            'id_destination_area' => DestinationArea::firstWhere('name', 'Pati')->id,
            'id_vehicle_type' => VehicleType::firstWhere('name', 'Double')->id,
            'cost_first' => 3450000,
            'cost_second' => 200000,
        ]);
    }
}
