<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🌱 Starting database seeding...');
        $this->command->newLine();

        // Disable foreign key checks to allow truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Call seeders in correct order (respecting foreign key relationships)
        $this->call([
            UserSeeder::class,           // 1. Users first (no dependencies)
            SupplierSeeder::class,       // 2. Suppliers (no dependencies)
            ProductSeeder::class,        // 3. Products (depends on Suppliers)
            StockTransactionSeeder::class, // 4. Transactions (depends on Products and Users)
        ]);

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->newLine();
        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->newLine();

        // Display login credentials
        $this->command->info('📋 Sample Login Credentials:');
        $this->command->line('');
        $this->command->line('Admin Users:');
        $this->command->line('  • ahmed.admin@inventory.com / 123456');
        $this->command->line('  • sara.admin@inventory.com / 123456');
        $this->command->line('  • karim.admin@inventory.com / 123456');
        $this->command->line('');
        $this->command->line('Warehouse Managers:');
        $this->command->line('  • omar.manager@inventory.com / 123456');
        $this->command->line('  • lina.manager@inventory.com / 123456');
        $this->command->line('  • (+ 6 more managers available)');
        $this->command->newLine();
        $this->command->info('💡 All passwords are: 123456');
        $this->command->newLine();
    }
}
