<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'abbreviation' => 'ADMIN',
            'name' => 'Administrator',
        ]);
        Role::create([
            'abbreviation' => 'STAFF',
            'name' => 'Staff',
        ]);
        Role::create([
            'abbreviation' => 'CLN',
            'name' => 'Client',
        ]);
    }
}
