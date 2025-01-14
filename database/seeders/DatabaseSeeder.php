<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Driver;
use App\Models\Order;
use App\Models\OrderNextDestination;
use App\Models\OrderUpdate;
use App\Models\User;
use App\Models\Vehicle;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CompanyProfileSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            DestinationAreaSeeder::class,
            VehicleTypeSeeder::class,
            DeliveryCostSeeder::class,
        ]);

        // Vehicle::Factory()
        //     ->count(30)
        //     ->create();
        // Driver::Factory()
        //     ->count(30)
        //     ->create();
        // User::factory()
        //     ->has(Client::factory(), 'client')
        //     ->count(30)
        //     ->Create();
        // Order::factory()
        //     ->has(OrderUpdate::factory()->count(5), 'orders_updates')
        //     ->has(OrderNextDestination::factory()->count(5), 'orders_next_destinations')
        //     ->count(100)
        //     ->create();
    }
}
