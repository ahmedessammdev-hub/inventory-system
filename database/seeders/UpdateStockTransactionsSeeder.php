<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StockTransaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UpdateStockTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get admin user
        $admin = User::where('email', 'admin@example.com')->first();

        if ($admin) {
            // Update all transactions without user_id to assign to admin
            $updated = StockTransaction::whereNull('user_id')
                ->update(['user_id' => $admin->id]);

            $this->command->info("Updated {$updated} stock transactions with admin user.");
        } else {
            $this->command->warn("Admin user not found. Please run UserSeeder first.");
        }
    }
}
