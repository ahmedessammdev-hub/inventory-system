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

        $this->command->info('Creating products...');

        $products = [
            // Laptops & Computers (15 products)
            ['name' => 'Dell Latitude 5520 i7 16GB', 'sku' => 'LAPTOP-DELL-5520', 'category' => 'Laptops', 'cost' => 18000, 'price' => 24500, 'quantity' => rand(12, 35)],
            ['name' => 'HP EliteBook 840 G8', 'sku' => 'LAPTOP-HP-840', 'category' => 'Laptops', 'cost' => 19500, 'price' => 26000, 'quantity' => rand(10, 28)],
            ['name' => 'Lenovo ThinkPad X1 Carbon', 'sku' => 'LAPTOP-LEN-X1C', 'category' => 'Laptops', 'cost' => 22000, 'price' => 29500, 'quantity' => rand(8, 20)],
            ['name' => 'MacBook Pro 13" M2', 'sku' => 'LAPTOP-MAC-PRO13', 'category' => 'Laptops', 'cost' => 35000, 'price' => 45000, 'quantity' => rand(5, 15)],
            ['name' => 'ASUS ROG Gaming Laptop', 'sku' => 'LAPTOP-ASUS-ROG', 'category' => 'Laptops', 'cost' => 28000, 'price' => 36000, 'quantity' => rand(6, 18)],
            ['name' => 'Acer Aspire 5 i5 8GB', 'sku' => 'LAPTOP-ACER-A5', 'category' => 'Laptops', 'cost' => 12000, 'price' => 16500, 'quantity' => rand(20, 45)],
            ['name' => 'Dell Desktop OptiPlex 7090', 'sku' => 'DESKTOP-DELL-7090', 'category' => 'Desktops', 'cost' => 15000, 'price' => 20000, 'quantity' => rand(8, 22)],
            ['name' => 'HP ProDesk 600 G6', 'sku' => 'DESKTOP-HP-600', 'category' => 'Desktops', 'cost' => 14500, 'price' => 19500, 'quantity' => rand(10, 25)],
            ['name' => 'iMac 24" M1 8GB', 'sku' => 'DESKTOP-IMAC-24', 'category' => 'Desktops', 'cost' => 40000, 'price' => 52000, 'quantity' => rand(3, 10)],
            ['name' => 'Lenovo IdeaCentre AIO', 'sku' => 'DESKTOP-LEN-AIO', 'category' => 'Desktops', 'cost' => 16000, 'price' => 21500, 'quantity' => rand(7, 18)],
            ['name' => 'Custom Gaming PC i7 RTX3060', 'sku' => 'DESKTOP-CUSTOM-G1', 'category' => 'Desktops', 'cost' => 32000, 'price' => 42000, 'quantity' => rand(4, 12)],
            ['name' => 'HP Workstation Z2 G9', 'sku' => 'WORKST-HP-Z2', 'category' => 'Workstations', 'cost' => 45000, 'price' => 58000, 'quantity' => rand(2, 8)],
            ['name' => 'Dell Precision 3660', 'sku' => 'WORKST-DELL-3660', 'category' => 'Workstations', 'cost' => 42000, 'price' => 55000, 'quantity' => rand(3, 10)],
            ['name' => 'Microsoft Surface Laptop 5', 'sku' => 'LAPTOP-MS-SL5', 'category' => 'Laptops', 'cost' => 24000, 'price' => 31500, 'quantity' => rand(8, 20)],
            ['name' => 'Huawei MateBook D15', 'sku' => 'LAPTOP-HW-D15', 'category' => 'Laptops', 'cost' => 11000, 'price' => 15500, 'quantity' => rand(15, 35)],

            // Monitors (12 products)
            ['name' => 'Samsung 27" 4K Monitor', 'sku' => 'MON-SAM-27-4K', 'category' => 'Monitors', 'cost' => 5500, 'price' => 7500, 'quantity' => rand(15, 40)],
            ['name' => 'Dell UltraSharp 24"', 'sku' => 'MON-DELL-US24', 'category' => 'Monitors', 'cost' => 4200, 'price' => 5800, 'quantity' => rand(18, 45)],
            ['name' => 'LG 34" UltraWide Curved', 'sku' => 'MON-LG-34UW', 'category' => 'Monitors', 'cost' => 8500, 'price' => 11500, 'quantity' => rand(8, 20)],
            ['name' => 'BenQ 27" Gaming 144Hz', 'sku' => 'MON-BENQ-27G', 'category' => 'Monitors', 'cost' => 6000, 'price' => 8200, 'quantity' => rand(10, 28)],
            ['name' => 'HP 22" Full HD Monitor', 'sku' => 'MON-HP-22FHD', 'category' => 'Monitors', 'cost' => 2500, 'price' => 3500, 'quantity' => rand(25, 55)],
            ['name' => 'ASUS 32" 4K Professional', 'sku' => 'MON-ASUS-32-4K', 'category' => 'Monitors', 'cost' => 9500, 'price' => 12800, 'quantity' => rand(6, 18)],
            ['name' => 'AOC 24" Budget Monitor', 'sku' => 'MON-AOC-24', 'category' => 'Monitors', 'cost' => 1800, 'price' => 2600, 'quantity' => rand(30, 60)],
            ['name' => 'ViewSonic 27" IPS', 'sku' => 'MON-VS-27IPS', 'category' => 'Monitors', 'cost' => 3800, 'price' => 5200, 'quantity' => rand(12, 32)],
            ['name' => 'MSI Optix 27" Curved Gaming', 'sku' => 'MON-MSI-27C', 'category' => 'Monitors', 'cost' => 5800, 'price' => 7900, 'quantity' => rand(9, 24)],
            ['name' => 'Philips 24" FHD LED', 'sku' => 'MON-PHIL-24', 'category' => 'Monitors', 'cost' => 2200, 'price' => 3200, 'quantity' => rand(20, 45)],
            ['name' => 'Apple Studio Display 27"', 'sku' => 'MON-APPLE-STD', 'category' => 'Monitors', 'cost' => 42000, 'price' => 54000, 'quantity' => rand(2, 8)],
            ['name' => 'Lenovo 23.8" ThinkVision', 'sku' => 'MON-LEN-TV24', 'category' => 'Monitors', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(15, 38)],

            // Printers & Scanners (10 products)
            ['name' => 'HP LaserJet Pro M404dn', 'sku' => 'PRINT-HP-M404', 'category' => 'Printers', 'cost' => 4500, 'price' => 6200, 'quantity' => rand(10, 28)],
            ['name' => 'Canon PIXMA G6020', 'sku' => 'PRINT-CAN-G6020', 'category' => 'Printers', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(12, 30)],
            ['name' => 'Epson EcoTank L3250', 'sku' => 'PRINT-EPS-L3250', 'category' => 'Printers', 'cost' => 2800, 'price' => 3900, 'quantity' => rand(18, 40)],
            ['name' => 'Brother MFC-L2750DW', 'sku' => 'PRINT-BRO-L2750', 'category' => 'Printers', 'cost' => 5200, 'price' => 7000, 'quantity' => rand(8, 22)],
            ['name' => 'HP OfficeJet Pro 9025e', 'sku' => 'PRINT-HP-9025', 'category' => 'Printers', 'cost' => 6800, 'price' => 9200, 'quantity' => rand(7, 18)],
            ['name' => 'Xerox WorkCentre 3335', 'sku' => 'PRINT-XER-3335', 'category' => 'Printers', 'cost' => 7500, 'price' => 10000, 'quantity' => rand(5, 15)],
            ['name' => 'Samsung Xpress M2020W', 'sku' => 'PRINT-SAM-M2020', 'category' => 'Printers', 'cost' => 1800, 'price' => 2700, 'quantity' => rand(20, 45)],
            ['name' => 'Canon imageFORMULA Scanner', 'sku' => 'SCAN-CAN-IF200', 'category' => 'Scanners', 'cost' => 3500, 'price' => 4900, 'quantity' => rand(10, 25)],
            ['name' => 'Epson Perfection V600', 'sku' => 'SCAN-EPS-V600', 'category' => 'Scanners', 'cost' => 4200, 'price' => 5800, 'quantity' => rand(8, 20)],
            ['name' => 'Fujitsu ScanSnap iX1600', 'sku' => 'SCAN-FUJ-IX1600', 'category' => 'Scanners', 'cost' => 6500, 'price' => 8800, 'quantity' => rand(6, 16)],

            // Keyboards & Mice (15 products)
            ['name' => 'Logitech MX Master 3S', 'sku' => 'MOUSE-LOG-MX3S', 'category' => 'Accessories', 'cost' => 1400, 'price' => 1950, 'quantity' => rand(25, 60)],
            ['name' => 'Razer DeathAdder V3', 'sku' => 'MOUSE-RAZ-DAV3', 'category' => 'Accessories', 'cost' => 950, 'price' => 1400, 'quantity' => rand(30, 65)],
            ['name' => 'Microsoft Sculpt Ergonomic', 'sku' => 'MOUSE-MS-SCULPT', 'category' => 'Accessories', 'cost' => 650, 'price' => 950, 'quantity' => rand(35, 70)],
            ['name' => 'HP X1000 Wireless Mouse', 'sku' => 'MOUSE-HP-X1000', 'category' => 'Accessories', 'cost' => 180, 'price' => 320, 'quantity' => rand(50, 100)],
            ['name' => 'Logitech G502 Gaming', 'sku' => 'MOUSE-LOG-G502', 'category' => 'Accessories', 'cost' => 850, 'price' => 1250, 'quantity' => rand(28, 55)],
            ['name' => 'Corsair K95 RGB Mechanical', 'sku' => 'KB-CORS-K95', 'category' => 'Accessories', 'cost' => 2200, 'price' => 3100, 'quantity' => rand(15, 35)],
            ['name' => 'Logitech MX Keys', 'sku' => 'KB-LOG-MXKEY', 'category' => 'Accessories', 'cost' => 1600, 'price' => 2300, 'quantity' => rand(20, 45)],
            ['name' => 'Razer BlackWidow V3', 'sku' => 'KB-RAZ-BWV3', 'category' => 'Accessories', 'cost' => 1800, 'price' => 2600, 'quantity' => rand(18, 40)],
            ['name' => 'Keychron K2 Mechanical', 'sku' => 'KB-KEY-K2', 'category' => 'Accessories', 'cost' => 1200, 'price' => 1750, 'quantity' => rand(22, 48)],
            ['name' => 'Microsoft Wired Keyboard 600', 'sku' => 'KB-MS-600', 'category' => 'Accessories', 'cost' => 220, 'price' => 380, 'quantity' => rand(45, 90)],
            ['name' => 'HP Wireless Combo KB+Mouse', 'sku' => 'COMBO-HP-WL', 'category' => 'Accessories', 'cost' => 450, 'price' => 690, 'quantity' => rand(35, 70)],
            ['name' => 'Logitech MK270 Combo', 'sku' => 'COMBO-LOG-MK270', 'category' => 'Accessories', 'cost' => 380, 'price' => 590, 'quantity' => rand(40, 80)],
            ['name' => 'Dell KM636 Wireless Combo', 'sku' => 'COMBO-DELL-KM636', 'category' => 'Accessories', 'cost' => 420, 'price' => 650, 'quantity' => rand(32, 65)],
            ['name' => 'SteelSeries Apex Pro', 'sku' => 'KB-STEEL-APEXPRO', 'category' => 'Accessories', 'cost' => 2800, 'price' => 3900, 'quantity' => rand(10, 25)],
            ['name' => 'Ducky One 3 RGB', 'sku' => 'KB-DUCKY-ONE3', 'category' => 'Accessories', 'cost' => 1900, 'price' => 2700, 'quantity' => rand(12, 30)],

            // Storage Devices (12 products)
            ['name' => 'Samsung 970 EVO Plus 1TB SSD', 'sku' => 'SSD-SAM-970-1TB', 'category' => 'Storage', 'cost' => 1800, 'price' => 2600, 'quantity' => rand(20, 50)],
            ['name' => 'WD Black SN850X 2TB NVMe', 'sku' => 'SSD-WD-SN850-2TB', 'category' => 'Storage', 'cost' => 3800, 'price' => 5200, 'quantity' => rand(12, 30)],
            ['name' => 'Crucial MX500 500GB SATA', 'sku' => 'SSD-CRUC-MX500', 'category' => 'Storage', 'cost' => 950, 'price' => 1450, 'quantity' => rand(25, 55)],
            ['name' => 'Kingston A400 240GB SSD', 'sku' => 'SSD-KING-A400', 'category' => 'Storage', 'cost' => 550, 'price' => 850, 'quantity' => rand(35, 70)],
            ['name' => 'Seagate Barracuda 2TB HDD', 'sku' => 'HDD-SEA-2TB', 'category' => 'Storage', 'cost' => 850, 'price' => 1250, 'quantity' => rand(28, 60)],
            ['name' => 'WD Blue 4TB HDD', 'sku' => 'HDD-WD-4TB', 'category' => 'Storage', 'cost' => 1450, 'price' => 2100, 'quantity' => rand(20, 45)],
            ['name' => 'Sandisk Extreme Pro 1TB USB', 'sku' => 'USB-SAND-1TB', 'category' => 'Storage', 'cost' => 2200, 'price' => 3100, 'quantity' => rand(15, 38)],
            ['name' => 'Samsung T7 Portable SSD 500GB', 'sku' => 'SSD-SAM-T7-500', 'category' => 'Storage', 'cost' => 1200, 'price' => 1750, 'quantity' => rand(22, 48)],
            ['name' => 'Transcend USB 3.1 64GB Flash', 'sku' => 'USB-TRANS-64GB', 'category' => 'Storage', 'cost' => 150, 'price' => 280, 'quantity' => rand(60, 120)],
            ['name' => 'Kingston 128GB USB 3.0', 'sku' => 'USB-KING-128GB', 'category' => 'Storage', 'cost' => 220, 'price' => 380, 'quantity' => rand(50, 100)],
            ['name' => 'Seagate Expansion 8TB External', 'sku' => 'HDD-SEA-EXT-8TB', 'category' => 'Storage', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(10, 25)],
            ['name' => 'WD My Passport 5TB External', 'sku' => 'HDD-WD-PASS-5TB', 'category' => 'Storage', 'cost' => 2400, 'price' => 3400, 'quantity' => rand(15, 35)],

            // Networking (10 products)
            ['name' => 'TP-Link Archer AX73 Router', 'sku' => 'NET-TPL-AX73', 'category' => 'Networking', 'cost' => 1600, 'price' => 2300, 'quantity' => rand(15, 40)],
            ['name' => 'Cisco SG350-28P Switch', 'sku' => 'NET-CISCO-SG350', 'category' => 'Networking', 'cost' => 8500, 'price' => 11500, 'quantity' => rand(5, 15)],
            ['name' => 'Ubiquiti UniFi AP AC Pro', 'sku' => 'NET-UBI-UAP', 'category' => 'Networking', 'cost' => 2400, 'price' => 3400, 'quantity' => rand(12, 30)],
            ['name' => 'Netgear Nighthawk AX12', 'sku' => 'NET-NETG-AX12', 'category' => 'Networking', 'cost' => 6800, 'price' => 9200, 'quantity' => rand(8, 20)],
            ['name' => 'D-Link 24-Port Gigabit Switch', 'sku' => 'NET-DLINK-24P', 'category' => 'Networking', 'cost' => 2800, 'price' => 3900, 'quantity' => rand(10, 25)],
            ['name' => 'TP-Link TL-SG108 8-Port Switch', 'sku' => 'NET-TPL-SG108', 'category' => 'Networking', 'cost' => 450, 'price' => 690, 'quantity' => rand(25, 55)],
            ['name' => 'Linksys Velop Mesh WiFi 3-Pack', 'sku' => 'NET-LINK-VELOP3', 'category' => 'Networking', 'cost' => 4200, 'price' => 5900, 'quantity' => rand(8, 20)],
            ['name' => 'MikroTik RB4011 Router', 'sku' => 'NET-MIKRO-RB4011', 'category' => 'Networking', 'cost' => 3800, 'price' => 5300, 'quantity' => rand(6, 18)],
            ['name' => 'Asus RT-AX86U Gaming Router', 'sku' => 'NET-ASUS-AX86U', 'category' => 'Networking', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(10, 28)],
            ['name' => 'TP-Link Deco M5 Mesh System', 'sku' => 'NET-TPL-DECOM5', 'category' => 'Networking', 'cost' => 2200, 'price' => 3200, 'quantity' => rand(12, 32)],

            // Audio & Video (12 products)
            ['name' => 'Sony WH-1000XM5 Headphones', 'sku' => 'AUDIO-SONY-XM5', 'category' => 'Audio', 'cost' => 5500, 'price' => 7500, 'quantity' => rand(15, 35)],
            ['name' => 'Bose QuietComfort 45', 'sku' => 'AUDIO-BOSE-QC45', 'category' => 'Audio', 'cost' => 5200, 'price' => 7100, 'quantity' => rand(12, 30)],
            ['name' => 'Logitech C920 HD Webcam', 'sku' => 'WEB-LOG-C920', 'category' => 'Video', 'cost' => 850, 'price' => 1300, 'quantity' => rand(25, 55)],
            ['name' => 'Razer Kiyo Pro Webcam', 'sku' => 'WEB-RAZ-KIYOPRO', 'category' => 'Video', 'cost' => 1800, 'price' => 2600, 'quantity' => rand(15, 35)],
            ['name' => 'Blue Yeti USB Microphone', 'sku' => 'MIC-BLUE-YETI', 'category' => 'Audio', 'cost' => 1600, 'price' => 2300, 'quantity' => rand(18, 40)],
            ['name' => 'HyperX Cloud II Gaming Headset', 'sku' => 'AUDIO-HYP-C2', 'category' => 'Audio', 'cost' => 1200, 'price' => 1750, 'quantity' => rand(22, 48)],
            ['name' => 'JBL Charge 5 Speaker', 'sku' => 'AUDIO-JBL-CH5', 'category' => 'Audio', 'cost' => 2400, 'price' => 3400, 'quantity' => rand(15, 38)],
            ['name' => 'Anker Soundcore Liberty Pro', 'sku' => 'AUDIO-ANK-LIBPRO', 'category' => 'Audio', 'cost' => 950, 'price' => 1450, 'quantity' => rand(28, 60)],
            ['name' => 'Creative Sound Blaster X3', 'sku' => 'AUDIO-CRTV-SBX3', 'category' => 'Audio', 'cost' => 1800, 'price' => 2600, 'quantity' => rand(12, 28)],
            ['name' => 'Elgato Wave:3 Microphone', 'sku' => 'MIC-ELG-WAVE3', 'category' => 'Audio', 'cost' => 2200, 'price' => 3100, 'quantity' => rand(10, 25)],
            ['name' => 'Logitech Brio 4K Webcam', 'sku' => 'WEB-LOG-BRIO', 'category' => 'Video', 'cost' => 2800, 'price' => 3900, 'quantity' => rand(10, 25)],
            ['name' => 'Jabra Evolve2 65 Headset', 'sku' => 'AUDIO-JAB-EV265', 'category' => 'Audio', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(12, 30)],

            // Cables & Adapters (10 products)
            ['name' => 'Anker USB-C to USB-C Cable 2m', 'sku' => 'CABLE-ANK-USBC2M', 'category' => 'Cables', 'cost' => 180, 'price' => 320, 'quantity' => rand(60, 120)],
            ['name' => 'Belkin HDMI 2.1 Cable 2m', 'sku' => 'CABLE-BEL-HDMI2M', 'category' => 'Cables', 'cost' => 280, 'price' => 450, 'quantity' => rand(45, 90)],
            ['name' => 'StarTech USB-C Hub 7-in-1', 'sku' => 'HUB-STAR-7IN1', 'category' => 'Adapters', 'cost' => 850, 'price' => 1300, 'quantity' => rand(30, 65)],
            ['name' => 'Anker PowerExpand 8-in-1', 'sku' => 'HUB-ANK-8IN1', 'category' => 'Adapters', 'cost' => 950, 'price' => 1450, 'quantity' => rand(28, 58)],
            ['name' => 'DP to HDMI Adapter', 'sku' => 'ADP-DP-HDMI', 'category' => 'Adapters', 'cost' => 220, 'price' => 380, 'quantity' => rand(50, 100)],
            ['name' => 'USB 3.0 Extension Cable 3m', 'sku' => 'CABLE-USB30-3M', 'category' => 'Cables', 'cost' => 150, 'price' => 280, 'quantity' => rand(55, 110)],
            ['name' => 'Ethernet Cat6 Cable 10m', 'sku' => 'CABLE-ETH-CAT6-10M', 'category' => 'Cables', 'cost' => 120, 'price' => 230, 'quantity' => rand(70, 140)],
            ['name' => 'Ugreen USB-C to HDMI Adapter', 'sku' => 'ADP-UGR-USBC-HDMI', 'category' => 'Adapters', 'cost' => 320, 'price' => 520, 'quantity' => rand(40, 80)],
            ['name' => 'VGA to HDMI Converter', 'sku' => 'ADP-VGA-HDMI', 'category' => 'Adapters', 'cost' => 280, 'price' => 450, 'quantity' => rand(35, 70)],
            ['name' => 'Lightning to USB Cable 1m', 'sku' => 'CABLE-LIGHT-USB1M', 'category' => 'Cables', 'cost' => 150, 'price' => 280, 'quantity' => rand(60, 120)],

            // Power & UPS (8 products)
            ['name' => 'APC Back-UPS 850VA', 'sku' => 'UPS-APC-850', 'category' => 'Power', 'cost' => 2200, 'price' => 3100, 'quantity' => rand(15, 35)],
            ['name' => 'CyberPower CP1500 UPS', 'sku' => 'UPS-CYB-1500', 'category' => 'Power', 'cost' => 2800, 'price' => 3900, 'quantity' => rand(12, 28)],
            ['name' => 'Eaton 5E 1100VA UPS', 'sku' => 'UPS-EATON-1100', 'category' => 'Power', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(10, 25)],
            ['name' => 'Belkin 12-Outlet Surge Protector', 'sku' => 'POWER-BEL-12OUT', 'category' => 'Power', 'cost' => 450, 'price' => 690, 'quantity' => rand(30, 65)],
            ['name' => 'Anker PowerPort 6-Port USB Charger', 'sku' => 'POWER-ANK-6PORT', 'category' => 'Power', 'cost' => 380, 'price' => 590, 'quantity' => rand(35, 70)],
            ['name' => 'Tripp Lite 3000VA UPS', 'sku' => 'UPS-TRIP-3000', 'category' => 'Power', 'cost' => 6500, 'price' => 8800, 'quantity' => rand(6, 16)],
            ['name' => 'APC Smart-UPS 1500VA', 'sku' => 'UPS-APC-SMART1500', 'category' => 'Power', 'cost' => 5200, 'price' => 7100, 'quantity' => rand(8, 20)],
            ['name' => 'USB-C PD 100W Wall Charger', 'sku' => 'POWER-USBC-100W', 'category' => 'Power', 'cost' => 550, 'price' => 850, 'quantity' => rand(40, 80)],

            // Furniture (8 products)
            ['name' => 'Herman Miller Aeron Chair', 'sku' => 'FURN-HM-AERON', 'category' => 'Furniture', 'cost' => 18000, 'price' => 24500, 'quantity' => rand(3, 10)],
            ['name' => 'Ergonomic Office Chair Pro', 'sku' => 'FURN-CHAIR-ERGO', 'category' => 'Furniture', 'cost' => 3500, 'price' => 4900, 'quantity' => rand(15, 35)],
            ['name' => 'Standing Desk Electric 160x80', 'sku' => 'FURN-DESK-STAND', 'category' => 'Furniture', 'cost' => 6800, 'price' => 9200, 'quantity' => rand(8, 20)],
            ['name' => 'Executive Office Desk L-Shape', 'sku' => 'FURN-DESK-LSHAPE', 'category' => 'Furniture', 'cost' => 4500, 'price' => 6200, 'quantity' => rand(10, 25)],
            ['name' => 'Monitor Arm Dual Mount', 'sku' => 'FURN-ARM-DUAL', 'category' => 'Furniture', 'cost' => 850, 'price' => 1300, 'quantity' => rand(20, 45)],
            ['name' => 'Cable Management Tray', 'sku' => 'FURN-CABLE-TRAY', 'category' => 'Furniture', 'cost' => 180, 'price' => 320, 'quantity' => rand(40, 80)],
            ['name' => 'Footrest Ergonomic Adjustable', 'sku' => 'FURN-FOOTREST', 'category' => 'Furniture', 'cost' => 320, 'price' => 520, 'quantity' => rand(25, 55)],
            ['name' => 'LED Desk Lamp with USB', 'sku' => 'FURN-LAMP-LED-USB', 'category' => 'Furniture', 'cost' => 450, 'price' => 690, 'quantity' => rand(30, 65)],

            // Accessories & Others (10 products)
            ['name' => 'Fellowes Back Support Cushion', 'sku' => 'ACC-FELL-BACK', 'category' => 'Accessories', 'cost' => 380, 'price' => 590, 'quantity' => rand(25, 55)],
            ['name' => 'Laptop Cooling Pad RGB', 'sku' => 'ACC-COOL-PAD-RGB', 'category' => 'Accessories', 'cost' => 450, 'price' => 690, 'quantity' => rand(28, 60)],
            ['name' => 'Docking Station USB-C Triple Monitor', 'sku' => 'ACC-DOCK-USBC-3MON', 'category' => 'Accessories', 'cost' => 3200, 'price' => 4500, 'quantity' => rand(10, 25)],
            ['name' => 'Wrist Rest Keyboard Mouse Combo', 'sku' => 'ACC-WRIST-COMBO', 'category' => 'Accessories', 'cost' => 220, 'price' => 380, 'quantity' => rand(35, 70)],
            ['name' => 'Screen Cleaning Kit Pro', 'sku' => 'ACC-CLEAN-KIT', 'category' => 'Accessories', 'cost' => 150, 'price' => 280, 'quantity' => rand(50, 100)],
            ['name' => 'Privacy Screen Filter 24"', 'sku' => 'ACC-PRIVACY-24', 'category' => 'Accessories', 'cost' => 550, 'price' => 850, 'quantity' => rand(20, 45)],
            ['name' => 'Document Holder Adjustable', 'sku' => 'ACC-DOC-HOLDER', 'category' => 'Accessories', 'cost' => 180, 'price' => 320, 'quantity' => rand(30, 65)],
            ['name' => 'Laptop Backpack Business 17"', 'sku' => 'ACC-BACKPACK-17', 'category' => 'Accessories', 'cost' => 650, 'price' => 950, 'quantity' => rand(25, 55)],
            ['name' => 'USB Port Hub 10-Port Powered', 'sku' => 'ACC-USB-HUB-10P', 'category' => 'Accessories', 'cost' => 550, 'price' => 850, 'quantity' => rand(22, 48)],
            ['name' => 'Wireless Presenter with Laser', 'sku' => 'ACC-PRESENT-LASER', 'category' => 'Accessories', 'cost' => 380, 'price' => 590, 'quantity' => rand(28, 60)],
        ];

        foreach ($products as $productData) {
            $productData['supplier_id'] = $suppliers->random()->id;
            Product::create($productData);
        }

        $this->command->info('✓ Created ' . count($products) . ' products across multiple categories');
    }
}
