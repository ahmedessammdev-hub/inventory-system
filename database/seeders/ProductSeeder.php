<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate products table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $suppliers = Supplier::all();

        if ($suppliers->isEmpty()) {
            $this->command->error('⚠ No suppliers found. Please run SupplierSeeder first.');
            return;
        }

        $products = [
            [
                'name' => 'Dell Latitude 5520 Laptop',
                'sku' => 'LAPTOP-DELL-5520',
                'category' => 'Electronics',
                'cost' => 18000.00,
                'price' => 22000.00,
                'quantity' => rand(15, 40),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'HP LaserJet Pro Printer',
                'sku' => 'PRINTER-HP-LJ',
                'category' => 'Electronics',
                'cost' => 3500.00,
                'price' => 4500.00,
                'quantity' => rand(10, 35),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Logitech MX Master 3 Mouse',
                'sku' => 'MOUSE-LOG-MX3',
                'category' => 'Accessories',
                'cost' => 1200.00,
                'price' => 1600.00,
                'quantity' => rand(20, 50),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Samsung 27" Monitor',
                'sku' => 'MONITOR-SAM-27',
                'category' => 'Electronics',
                'cost' => 4500.00,
                'price' => 5800.00,
                'quantity' => rand(8, 25),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Mechanical Keyboard RGB',
                'sku' => 'KEYBOARD-MECH-RGB',
                'category' => 'Accessories',
                'cost' => 800.00,
                'price' => 1200.00,
                'quantity' => rand(25, 45),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Office Chair Ergonomic',
                'sku' => 'CHAIR-ERGO-001',
                'category' => 'Furniture',
                'cost' => 2500.00,
                'price' => 3500.00,
                'quantity' => rand(5, 20),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'USB-C Hub 7-in-1',
                'sku' => 'HUB-USBC-7IN1',
                'category' => 'Accessories',
                'cost' => 450.00,
                'price' => 650.00,
                'quantity' => rand(30, 50),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Wireless Headphones Sony',
                'sku' => 'HEADPHONE-SONY-WH',
                'category' => 'Electronics',
                'cost' => 2800.00,
                'price' => 3600.00,
                'quantity' => rand(12, 30),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'External SSD 1TB',
                'sku' => 'SSD-EXT-1TB',
                'category' => 'Storage',
                'cost' => 1800.00,
                'price' => 2400.00,
                'quantity' => rand(15, 35),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Webcam HD 1080p',
                'sku' => 'WEBCAM-HD-1080',
                'category' => 'Electronics',
                'cost' => 600.00,
                'price' => 900.00,
                'quantity' => rand(18, 40),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'Standing Desk Adjustable',
                'sku' => 'DESK-STAND-ADJ',
                'category' => 'Furniture',
                'cost' => 5000.00,
                'price' => 7000.00,
                'quantity' => rand(5, 15),
                'supplier_id' => $suppliers->random()->id,
            ],
            [
                'name' => 'LED Desk Lamp',
                'sku' => 'LAMP-LED-DESK',
                'category' => 'Accessories',
                'cost' => 350.00,
                'price' => 550.00,
                'quantity' => rand(20, 45),
                'supplier_id' => $suppliers->random()->id,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $this->command->info('✓ Created ' . count($products) . ' products');
    }
}
