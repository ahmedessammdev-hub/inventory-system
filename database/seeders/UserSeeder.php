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

        // Create Admin Users
        $admins = [
            ['name' => 'Ahmed Essam', 'email' => 'ahmed.admin@inventory.com'],
            ['name' => 'Sara Mohamed', 'email' => 'sara.admin@inventory.com'],
            ['name' => 'Karim Hassan', 'email' => 'karim.admin@inventory.com'],
        ];

        foreach ($admins as $admin) {
            User::create([
                'name' => $admin['name'],
                'email' => $admin['email'],
                'password' => Hash::make('123456'),
                'role' => 'admin',
            ]);
        }

        // Create Warehouse Managers
        $managers = [
            ['name' => 'Omar Khalil', 'email' => 'omar.manager@inventory.com'],
            ['name' => 'Lina Ahmed', 'email' => 'lina.manager@inventory.com'],
            ['name' => 'Youssef Ali', 'email' => 'youssef.manager@inventory.com'],
            ['name' => 'Mona Samir', 'email' => 'mona.manager@inventory.com'],
            ['name' => 'Hossam Ibrahim', 'email' => 'hossam.manager@inventory.com'],
            ['name' => 'Nour Mahmoud', 'email' => 'nour.manager@inventory.com'],
            ['name' => 'Tarek Fahmy', 'email' => 'tarek.manager@inventory.com'],
            ['name' => 'Dina Farouk', 'email' => 'dina.manager@inventory.com'],
        ];

        foreach ($managers as $manager) {
            User::create([
                'name' => $manager['name'],
                'email' => $manager['email'],
                'password' => Hash::make('123456'),
                'role' => 'warehouse_manager',
            ]);
        }

        $totalUsers = count($admins) + count($managers);
        $this->command->info("✓ Created {$totalUsers} users (" . count($admins) . " admins, " . count($managers) . " warehouse managers)");
    }
}
