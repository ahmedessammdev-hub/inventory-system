# 🏪 Inventory Management System

[![Laravel](https://img.shields.io/badge/Laravel-12.36.1-FF2D20?style=for-the-badge\&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.12-777BB4?style=for-the-badge\&logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.4-06B6D4?style=for-the-badge\&logo=tailwindcss)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge\&logo=mysql)](https://mysql.com)

A professional, enterprise-grade inventory management system built with Laravel 12. It provides secure role-based access, real-time stock tracking, transaction management, and comprehensive analytics.

## ✨ Key Features

### 📦 Product Management

* Complete CRUD functionality with advanced search and filtering
* **Soft Delete System** preserving product records for audit integrity
* 11 product categories (Laptops, Monitors, Printers, etc.)
* SKU-based product validation and cost tracking
* Low-stock alerts and analytics dashboard
* Detailed product view with transaction history
* Realistic pricing in Egyptian Pounds (EGP)

### 🏢 Supplier Management

* 15 preloaded Egyptian suppliers with detailed contact data
* Supplier-product relationship tracking with cascade protection
* Filter and search system with analytics dashboard
* Gradient-based modern UI for supplier pages

### 📊 Stock Transactions

* Real-time inventory tracking (in/out movements)
* Immutable audit trail for all transactions
* **Reverse Transaction** feature for safe rollbacks
* Stock validation to prevent negative quantities
* Filtering by type, product, user, and date
* User tracking for all inventory actions

### 🔐 Role-Based Access

* **Admin:** full control and user management
* **Warehouse Manager:** restricted to stock operations and reports
* **Secure Registration:** admins only can create new users

### 🎨 Modern Interface

* 20+ reusable Blade components
* Fully responsive Tailwind CSS design
* Animated gradients, hover states, and transitions
* Data visualizations and analytics cards

### ⚙️ Security

* Auth middleware protection and bcrypt password hashing
* CSRF protection and role-based routing
* Email-locked user profiles for admin control

### 📈 Reporting

* Dynamic dashboard with statistics and trend insights
* Inventory valuation and stock alerts
* Transaction history summaries

## 🚀 Quick Start

### Requirements

* PHP 8.2+
* Composer
* Node.js 18+
* SQLite/MySQL/PostgreSQL

### Manual Installation

```bash
git clone https://github.com/your-username/inventory-system.git
cd inventory-system

composer install
npm install

cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

Visit `http://localhost:8000` to access the app.

## 🔐 Default Accounts

### Admins

* **Ahmed Essam** — `ahmed.admin@inventory.com` / `123456`
* **Sara Mohamed** — `sara.admin@inventory.com` / `123456`
* **Karim Hassan** — `karim.admin@inventory.com` / `123456`

### Warehouse Managers

* **Omar Khalil** — `omar.manager@inventory.com` / `123456`
* **Lina Ahmed** — `lina.manager@inventory.com` / `123456`
* **Youssef Ali** — `youssef.manager@inventory.com` / `123456`
* **Mona Samir** — `mona.manager@inventory.com` / `123456`
* **Hossam Ibrahim** — `hossam.manager@inventory.com` / `123456`
* **Nour Mahmoud** — `nour.manager@inventory.com` / `123456`
* **Tarek Fahmy** — `tarek.manager@inventory.com` / `123456`
* **Dina Farouk** — `dina.manager@inventory.com` / `123456`

> ⚠️ **Security Note:** All demo passwords are identical for testing. Update them immediately in production.

## 🧭 Project Structure

```
├── app/
│   ├── Http/Controllers/
│   ├── Models/
│   ├── Middleware/
│   └── Requests/
├── database/
│   ├── migrations/
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   ├── js/
│   └── css/
├── routes/
│   ├── web.php
│   └── auth.php
└── public/
```

## 🛠️ Tech Stack

**Backend:** Laravel 12.36.1, PHP 8.2+, Eloquent ORM, Form Request validation
**Frontend:** Blade, Tailwind CSS 3.4, Alpine.js, Vite 7.1.12
**Database:** MySQL 8.0 (with SQLite/PostgreSQL support)
**Visualization:** Chart.js for reporting
**Standards:** PSR-12, PHPUnit tests, Composer & NPM packages

## 🧪 Testing

```bash
php artisan test
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit
```

## 🧰 Deployment

### Production Setup

```bash
git clone https://github.com/your-username/inventory-system.git
cd inventory-system
composer install --optimize-autoloader --no-dev
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan db:seed --force
php artisan optimize
```

## 🤝 Contributing

1. Fork the repo
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit changes (`git commit -m 'Add AmazingFeature'`)
4. Push to branch and open a PR

Follow PSR-12, write tests, and update documentation.

## 📝 License

Licensed under the MIT License. See the [LICENSE](LICENSE) file.

## 👨‍💻 Developer

**Ahmed Essam**
💼 Full Stack Developer
📧 [ahmed.essam.dev@gmail.com](mailto:ahmed.essam.dev@gmail.com)
🌐 GitHub: [@ahmedessammdev-hub](https://github.com/ahmedessammdev-hub)

---

Built with ❤️ using Laravel & Tailwind CSS  |  Updated November 2025
