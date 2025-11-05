# 🌱 Seed Data Information

## Overview
This document provides details about the seed data generated for the Inventory Management System.

## Database Statistics

### 👥 Users (11 Total)
- **3 Admin Users**
  - ahmed.admin@inventory.com
  - sara.admin@inventory.com
  - karim.admin@inventory.com

- **8 Warehouse Managers**
  - omar.manager@inventory.com
  - lina.manager@inventory.com
  - youssef.manager@inventory.com
  - mona.manager@inventory.com
  - hossam.manager@inventory.com
  - nour.manager@inventory.com
  - tarek.manager@inventory.com
  - dina.manager@inventory.com

**All passwords:** `123456`

---

### 🏢 Suppliers (15 Companies)
Diverse suppliers from different regions:
- Tech Solutions Egypt
- Global Electronics Hub
- Premium Office Supplies Co.
- Smart Gadgets International
- Digital World Trading LLC
- Express Tech Distribution
- Mega Electronics Wholesale
- Prime Computer Systems
- Future Tech Supplies
- Alpha Office Equipment
- Innovative Solutions Ltd
- Delta Electronics Trading
- Apex Technology Partners
- Metro Office Supplies
- Universal Tech Distributors

---

### 📦 Products (122 Items)

#### Categories Breakdown:

1. **Laptops & Computers (15 products)**
   - Dell, HP, Lenovo, MacBook, ASUS, Acer
   - Desktop PCs, Workstations, Gaming PCs
   - Price range: EGP 11,000 - 58,000

2. **Monitors (12 products)**
   - Samsung, Dell, LG, BenQ, HP, ASUS, AOC, etc.
   - Sizes: 22" - 34"
   - Types: Full HD, 4K, UltraWide, Gaming
   - Price range: EGP 2,600 - 54,000

3. **Printers & Scanners (10 products)**
   - HP, Canon, Epson, Brother, Xerox, Samsung
   - LaserJet, InkJet, All-in-One, Scanners
   - Price range: EGP 2,700 - 10,000

4. **Keyboards & Mice (15 products)**
   - Logitech, Razer, Microsoft, HP, Corsair, etc.
   - Mechanical, Wireless, Gaming, Combo sets
   - Price range: EGP 280 - 3,900

5. **Storage Devices (12 products)**
   - SSDs (NVMe, SATA, Portable)
   - HDDs (Internal, External)
   - USB Flash Drives
   - Brands: Samsung, WD, Crucial, Kingston, Seagate
   - Price range: EGP 280 - 5,200

6. **Networking (10 products)**
   - Routers, Switches, Access Points, Mesh Systems
   - TP-Link, Cisco, Ubiquiti, Netgear, D-Link, etc.
   - Price range: EGP 690 - 11,500

7. **Audio & Video (12 products)**
   - Headphones, Webcams, Microphones, Speakers
   - Sony, Bose, Logitech, Razer, Blue, JBL, etc.
   - Price range: EGP 1,300 - 7,500

8. **Cables & Adapters (10 products)**
   - USB-C, HDMI, DisplayPort, Ethernet
   - Hubs, Adapters, Converters
   - Price range: EGP 230 - 1,450

9. **Power & UPS (8 products)**
   - UPS Systems, Surge Protectors, Chargers
   - APC, CyberPower, Eaton, Tripp Lite
   - Price range: EGP 590 - 8,800

10. **Furniture (8 products)**
    - Office Chairs, Standing Desks, Monitor Arms
    - Cable Management, Footrests, Desk Lamps
    - Price range: EGP 320 - 24,500

11. **Accessories & Others (10 products)**
    - Back Support, Cooling Pads, Docking Stations
    - Wrist Rests, Privacy Screens, Laptop Bags
    - Price range: EGP 280 - 4,500

---

### 📊 Stock Transactions (1,007 Total)

**Transaction History:**
- Period: Last 90 days
- Average: 8-9 transactions per product
- Distribution:
  - Stock IN: ~60% (restocks, new inventory, returns)
  - Stock OUT: ~40% (sales, damages, samples)

**Transaction Reasons:**

*Stock IN:*
- Initial stock
- Restock from supplier
- New inventory arrival
- Returned by customer
- Transfer from warehouse
- Bulk purchase

*Stock OUT:*
- Customer order
- Online sale
- Retail sale
- Damaged item
- Sample for client
- Internal use
- Return to supplier

---

## Data Characteristics

### Realistic Features:
✅ Varied product categories covering complete office/tech setup
✅ Realistic Egyptian pricing (in EGP)
✅ Multiple suppliers with proper contact information
✅ Transaction history spanning 3 months
✅ Realistic stock levels (0-140 units per product)
✅ Professional SKU naming convention
✅ Diverse user roles for testing permissions
✅ Time-distributed transactions (business hours)
✅ Proper profit margins (20-35%)

### Business Scenarios Covered:
- High-value items (laptops, workstations)
- High-volume items (cables, accessories)
- Low stock situations
- Multiple restocks over time
- Various transaction types and reasons
- Different user activities

---

## How to Use

### Re-seed the database:
```bash
php artisan migrate:fresh --seed
```

### Seed only (without migration):
```bash
php artisan db:seed
```

### Seed specific seeder:
```bash
php artisan db:seed --class=ProductSeeder
```

---

## Testing Scenarios

With this data, you can test:
1. **Dashboard Analytics** - View comprehensive statistics
2. **Low Stock Alerts** - Filter products with low inventory
3. **Transaction History** - Track stock movements over time
4. **Reports & Charts** - Generate meaningful insights
5. **Search & Filters** - Test with various categories and suppliers
6. **User Permissions** - Test admin vs warehouse manager access
7. **Stock Management** - Add/remove inventory
8. **Product Lifecycle** - View complete transaction history

---

## Notes

- All monetary values are in **Egyptian Pounds (EGP)**
- Quantities range from **0 to 140 units** per product
- Product costs and prices reflect realistic market values
- Transaction timestamps distributed across last 3 months
- Each product has 5-12 transaction records
- All user passwords are `123456` (change in production!)

---

*Generated: November 5, 2025*
*Total Records: 11 Users + 15 Suppliers + 122 Products + 1,007 Transactions*
