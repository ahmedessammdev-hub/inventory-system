<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockTransaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate stock_transactions table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        StockTransaction::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = Product::all();
        $users = User::all();

        if ($products->isEmpty()) {
            $this->command->error('⚠ No products found. Please run ProductSeeder first.');
            return;
        }

        if ($users->isEmpty()) {
            $this->command->error('⚠ No users found. Please run UserSeeder first.');
            return;
        }

        $reasons = [
            'in' => [
                'Initial stock',
                'Restock from supplier',
                'New inventory arrival',
                'Returned by customer',
                'Transfer from warehouse',
                'Bulk purchase',
            ],
            'out' => [
                'Customer order',
                'Online sale',
                'Retail sale',
                'Damaged item',
                'Sample for client',
                'Internal use',
                'Return to supplier',
            ],
        ];

        $transactionCount = 0;

        foreach ($products as $product) {
            // Create 3-5 transactions per product
            $numTransactions = rand(3, 5);

            for ($i = 0; $i < $numTransactions; $i++) {
                $type = rand(0, 10) > 3 ? 'in' : 'out'; // 70% in, 30% out
                $quantity = rand(5, 20);

                // Make sure we don't go negative
                if ($type === 'out' && $quantity > $product->quantity) {
                    $quantity = max(1, floor($product->quantity / 2));
                }

                $transaction = StockTransaction::create([
                    'product_id' => $product->id,
                    'type' => $type,
                    'quantity' => $quantity,
                    'reason' => $reasons[$type][array_rand($reasons[$type])],
                    'user_id' => $users->random()->id,
                    'created_at' => now()->subDays(rand(0, 30))->subHours(rand(0, 23)),
                ]);

                // Update product quantity to reflect transaction
                if ($type === 'in') {
                    $product->quantity += $quantity;
                } else {
                    $product->quantity -= $quantity;
                }
                $product->save();

                $transactionCount++;
            }
        }

        $this->command->info('✓ Created ' . $transactionCount . ' stock transactions for ' . $products->count() . ' products');
    }
}
