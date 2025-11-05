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
        $daysBack = 90; // Create transactions for the last 3 months

        foreach ($products as $product) {
            // Create 5-12 transactions per product for more realistic history
            $numTransactions = rand(5, 12);

            // Reset product quantity to track from zero
            $currentQuantity = 0;

            for ($i = 0; $i < $numTransactions; $i++) {
                // First few transactions are usually stock IN
                if ($i < 2) {
                    $type = 'in';
                } else {
                    // 60% in, 40% out for realistic inventory movement
                    $type = rand(0, 10) > 4 ? 'in' : 'out';
                }

                // Vary quantity based on transaction type
                if ($type === 'in') {
                    $quantity = rand(10, 50); // Larger batches for incoming stock
                } else {
                    $quantity = rand(2, 15); // Smaller amounts for outgoing
                }

                // Make sure we don't go negative
                if ($type === 'out' && $quantity > $currentQuantity) {
                    if ($currentQuantity > 0) {
                        $quantity = rand(1, max(1, floor($currentQuantity / 2)));
                    } else {
                        continue; // Skip this transaction if no stock
                    }
                }

                // Create transaction with varied dates over the past 90 days
                $daysAgo = $daysBack - ($i * ($daysBack / $numTransactions));
                $createdAt = now()->subDays((int)$daysAgo)->subHours(rand(8, 18))->subMinutes(rand(0, 59));

                StockTransaction::create([
                    'product_id' => $product->id,
                    'type' => $type,
                    'quantity' => $quantity,
                    'reason' => $reasons[$type][array_rand($reasons[$type])],
                    'user_id' => $users->random()->id,
                    'created_at' => $createdAt,
                    'updated_at' => $createdAt,
                ]);

                // Update current quantity tracking
                if ($type === 'in') {
                    $currentQuantity += $quantity;
                } else {
                    $currentQuantity -= $quantity;
                }

                $transactionCount++;
            }

            // Update product with final quantity
            $product->quantity = $currentQuantity;
            $product->save();
        }

        $this->command->info('✓ Created ' . $transactionCount . ' stock transactions for ' . $products->count() . ' products over the last ' . $daysBack . ' days');
    }
}
