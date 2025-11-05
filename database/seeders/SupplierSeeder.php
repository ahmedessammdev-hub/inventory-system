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
                'email' => 'contact@techsolutions.eg',
                'phone' => '+20 2 3854 7621',
                'address' => '15 Talaat Harb Street, Downtown, Cairo, Egypt',
            ],
            [
                'name' => 'Global Electronics Hub',
                'email' => 'info@globalelectronics.com',
                'phone' => '+20 2 2736 5489',
                'address' => '78 Tahrir Square, Cairo, Egypt',
            ],
            [
                'name' => 'Premium Office Supplies Co.',
                'email' => 'sales@premiumoffice.eg',
                'phone' => '+20 3 4921 8736',
                'address' => '234 Horreya Avenue, Alexandria, Egypt',
            ],
            [
                'name' => 'Smart Gadgets International',
                'email' => 'support@smartgadgets.com',
                'phone' => '+20 2 2645 3819',
                'address' => '42 El Nozha Street, Heliopolis, Cairo, Egypt',
            ],
            [
                'name' => 'Digital World Trading LLC',
                'email' => 'orders@digitalworld.com',
                'phone' => '+20 2 2519 7463',
                'address' => '89 Road 9, Maadi, Cairo, Egypt',
            ],
            [
                'name' => 'Express Tech Distribution',
                'email' => 'info@expresstech.eg',
                'phone' => '+20 2 2274 6381',
                'address' => '156 Makram Ebeid, Nasr City, Cairo, Egypt',
            ],
            [
                'name' => 'Mega Electronics Wholesale',
                'email' => 'wholesale@megaelectronics.com',
                'phone' => '+20 2 3384 5927',
                'address' => '67 Mohandessin Street, Giza, Egypt',
            ],
            [
                'name' => 'Prime Computer Systems',
                'email' => 'sales@primecomputers.eg',
                'phone' => '+20 2 2461 3758',
                'address' => '123 Mostafa El Nahas, Nasr City, Cairo, Egypt',
            ],
            [
                'name' => 'Future Tech Supplies',
                'email' => 'contact@futuretech.com',
                'phone' => '+20 3 5847 2193',
                'address' => '45 Smouha, Alexandria, Egypt',
            ],
            [
                'name' => 'Alpha Office Equipment',
                'email' => 'info@alphaoffice.eg',
                'phone' => '+20 2 3729 5614',
                'address' => '98 Zamalek Street, Cairo, Egypt',
            ],
            [
                'name' => 'Innovative Solutions Ltd',
                'email' => 'sales@innovativesolutions.com',
                'phone' => '+20 2 2638 4751',
                'address' => '211 El Hegaz Street, Heliopolis, Cairo, Egypt',
            ],
            [
                'name' => 'Delta Electronics Trading',
                'email' => 'orders@deltaelectronics.eg',
                'phone' => '+20 2 3947 2856',
                'address' => '56 Ahmed Orabi, Mohandessin, Giza, Egypt',
            ],
            [
                'name' => 'Apex Technology Partners',
                'email' => 'contact@apextech.com',
                'phone' => '+20 2 2584 7319',
                'address' => '134 Salah Salem Road, Cairo, Egypt',
            ],
            [
                'name' => 'Metro Office Supplies',
                'email' => 'info@metrooffice.eg',
                'phone' => '+20 2 2719 6483',
                'address' => '88 Ramses Street, Downtown, Cairo, Egypt',
            ],
            [
                'name' => 'Universal Tech Distributors',
                'email' => 'sales@universaltech.com',
                'phone' => '+20 2 3865 2947',
                'address' => '72 Mohamed Farid, Garden City, Cairo, Egypt',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }

        $this->command->info('✓ Created ' . count($suppliers) . ' suppliers');
    }
}
