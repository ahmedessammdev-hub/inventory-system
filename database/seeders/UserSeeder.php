<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate users table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create 2 Admin Users
        User::create([
            'name' => 'Ahmed Admin',
            'email' => 'ahmed.admin@brandology.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Sara Admin',
            'email' => 'sara.admin@brandology.com',
            'password' => Hash::make('123456'),
            'role' => 'admin',
        ]);

        // Create 2 Warehouse Managers
        User::create([
            'name' => 'Omar Manager',
            'email' => 'omar.manager@brandology.com',
            'password' => Hash::make('123456'),
            'role' => 'warehouse_manager',
        ]);

        User::create([
            'name' => 'Lina Manager',
            'email' => 'lina.manager@brandology.com',
            'password' => Hash::make('123456'),
            'role' => 'warehouse_manager',
        ]);

        $this->command->info('✓ Created 4 users (2 admins, 2 warehouse managers)');
    }
}
