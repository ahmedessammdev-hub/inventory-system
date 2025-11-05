<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate suppliers table
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Supplier::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $suppliers = [
            [
                'name' => 'Tech Solutions Egypt',
                'email' => 'contact@techsolutions.brandology.com',
                'phone' => '+20 2 1234 5678',
                'address' => '123 Nile Street, Cairo, Egypt',
            ],
            [
                'name' => 'Global Electronics Hub',
                'email' => 'info@globalelectronics.brandology.com',
                'phone' => '+20 2 9876 5432',
                'address' => '456 Tahrir Square, Cairo, Egypt',
            ],
            [
                'name' => 'Premium Office Supplies',
                'email' => 'sales@premiumoffice.brandology.com',
                'phone' => '+20 3 1111 2222',
                'address' => '789 Alexandria Road, Alexandria, Egypt',
            ],
            [
                'name' => 'Smart Gadgets Co.',
                'email' => 'support@smartgadgets.brandology.com',
                'phone' => '+20 2 3333 4444',
                'address' => '321 Heliopolis, Cairo, Egypt',
            ],
            [
                'name' => 'Digital World Trading',
                'email' => 'orders@digitalworld.brandology.com',
                'phone' => '+20 2 5555 6666',
                'address' => '654 Maadi, Cairo, Egypt',
            ],
            [
                'name' => 'Express Tech Distribution',
                'email' => 'info@expresstech.brandology.com',
                'phone' => '+20 2 7777 8888',
                'address' => '987 Nasr City, Cairo, Egypt',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        $this->command->info('✓ Created ' . count($suppliers) . ' suppliers');
    }
}
