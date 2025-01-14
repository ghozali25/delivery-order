<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id_role' => Role::firstWhere('abbreviation', 'ADMIN')->id,
            'email' => 'admin@company.co.id',
            'password' => 'admin',
        ]);
        Employee::create([
            'id_user' => $user->id,
            'ktp' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'name' => 'HR (Human Resources)',
            'phone' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
        ]);

        $user = User::create([
            'id_role' => Role::firstWhere('abbreviation', 'STAFF')->id,
            'email' => 'staff@company.co.id',
            'password' => 'default',
        ]);
        Employee::create([
            'id_user' => $user->id,
            'ktp' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'name' => 'Staff (TEST)',
            'phone' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
        ]);

        $user = User::create([
            'id_role' => Role::firstWhere('abbreviation', 'CLN')->id,
            'email' => 'client@company.co.id',
            'password' => 'default',
        ]);
        Client::create([
            'id_user' => $user->id,
            'name' => 'Client (TEST)',
            'phone' => fake()->unique()->numberBetween(1000000000, 9999999999),
            'address' => fake()->address(),
        ]);
    }
}
