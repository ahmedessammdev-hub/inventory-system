# 🏪 Inventory Management System

[![Laravel](https://img.shields.io/badge/Laravel-12.36.1-FF2D20?style=for-the-badge&logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2.12-777BB4?style=for-the-badge&logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind%20CSS-3.4-06B6D4?style=for-the-badge&logo=tailwindcss)](https://tailwindcss.com)
[![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql)](https://mysql.com)

A modern, enterprise-grade inventory management system built with Laravel 12, featuring role-based access control, real-time stock tracking, advanced transaction management, and comprehensive reporting capabilities.

## ✨ Key Features

### 📦 Product Management
- Complete CRUD operations with advanced filtering and search
- **Soft Delete System** - Deleted products preserved for transaction history integrity
- 11 product categories: Laptops, Monitors, Printers, Storage, Networking, Audio/Video, Cables, Power/UPS, Furniture, Accessories
- SKU management with unique validation and cost/price tracking
- Low stock alerts and out-of-stock indicators
- Detailed product pages with full transaction history
- Stock level visualization and analytics
- Realistic pricing in Egyptian Pounds (EGP)

### 🏢 Supplier Management
- 15 pre-loaded realistic Egyptian suppliers with complete contact information
- Comprehensive supplier database with email, phone, and physical addresses
- Supplier-product relationship tracking
- Cascade deletion protection (products remain when supplier deleted)
- Advanced filtering and search capabilities
- Beautiful gradient-based UI components
- Statistics dashboard for supplier analytics

### 📊 Advanced Stock Transaction Management
- Real-time inventory tracking with in/out transactions
- **Transaction History Preservation** - Deletion disabled to maintain complete audit trail
- **Reverse Transaction Feature** - Undo transactions without deleting history
- Stock validation to prevent negative inventory
- Transaction filtering by type, product, user, and date range
- Automatic quantity calculations
- User tracking for all stock movements
- **Soft Delete Protection** - Products use soft deletes to preserve transaction history

### � Role-Based Access Control
- **Admin** - Full system access, user management, and configuration
- **Warehouse Manager** - Inventory operations and reporting access
- **No Public Registration** - Only admins can create new users
- Profile-based password management for all users

### 🎨 Modern Component-Based UI
- 20+ reusable Blade components
- Responsive design with Tailwind CSS
- Advanced gradient effects and animations
- Interactive hover states and transitions
- Mobile-optimized navigation
- Beautiful statistics cards and data visualization

### 🔐 Security Features
- Secure authentication with middleware protection
- Password hashing with bcrypt
- CSRF protection on all forms
- Role-based route middleware
- Email-locked user profiles (admin-only email changes)

### 📈 Analytics & Reporting
- Real-time dashboard statistics
- Low stock and out-of-stock alerts
- Transaction summaries and trends
- Recent activity tracking
- Inventory value calculations

## 🚀 Quick Start

### Prerequisites

Before you begin, ensure you have the following installed:
- **PHP** 8.2 or higher
- **Composer** (PHP dependency manager)
- **Node.js** 18+ and npm
- **SQLite** (or MySQL/PostgreSQL)

### Option 1: Automated Setup (Windows)

```bash
# 1. Clone the repository
git clone https://github.com/your-username/inventory-system.git
cd inventory-system

# 2. Run automated setup
setup.bat

# 3. Start the server
start.bat
```

### Option 2: Manual Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/inventory-system.git
cd inventory-system

# 2. Install PHP dependencies
composer install

# 3. Install Node.js dependencies
npm install

# 4. Environment setup
cp .env.example .env
php artisan key:generate

# 5. Database setup
php artisan migrate --seed

# 6. Build assets
npm run build

# 7. Start the development server
php artisan serve
```

Visit `http://localhost:8000` to access the application.

## 🔐 Default Credentials

The system comes pre-seeded with realistic demo accounts for testing:

### Admin Accounts

- **Email:** `ahmed.admin@inventory.com` / **Password:** `123456`
- **Email:** `sara.admin@inventory.com` / **Password:** `123456`
- **Email:** `karim.admin@inventory.com` / **Password:** `123456`
- **Role:** Administrator
- **Permissions:** Full system access including user management

### Warehouse Manager Accounts

- **Email:** `omar.manager@inventory.com` / **Password:** `123456`
- **Email:** `lina.manager@inventory.com` / **Password:** `123456`
- **Email:** `youssef.manager@inventory.com` / **Password:** `123456`
- Plus 5 more warehouse managers available
- **Role:** Warehouse Manager
- **Permissions:** Inventory operations and reporting

> ⚠️ **Security Notice:** Change these default passwords immediately after first login in production environments! Public registration is disabled - only admins can create new users.

## � Available Scripts

### Development Scripts

| Script | Command | Description |
|--------|---------|-------------|
| Setup | `setup.bat` | Complete first-time installation |
| Start | `start.bat` | Start development server |
| Dev Mode | `dev.bat` | Start with hot reloading |
| Maintenance | `maintenance.bat` | System maintenance tools |

### Laravel Artisan Commands

```bash
# Database operations
php artisan migrate              # Run migrations
php artisan migrate:fresh --seed # Fresh database with sample data
php artisan db:seed             # Seed database with sample data

# Cache management
php artisan cache:clear         # Clear application cache
php artisan config:clear        # Clear configuration cache
php artisan route:clear         # Clear route cache
php artisan view:clear          # Clear view cache

# Development
php artisan serve               # Start development server
php artisan tinker             # Interactive shell
php artisan test               # Run tests
```

## 🏗️ Project Structure

```
├── app/
│   ├── Http/Controllers/       # Application controllers
│   ├── Models/                 # Eloquent models
│   ├── Middleware/             # Custom middleware
│   └── Requests/               # Form request validation
├── database/
│   ├── migrations/             # Database migrations
│   ├── seeders/                # Database seeders
│   └── factories/              # Model factories
├── resources/
│   ├── views/                  # Blade templates
│   ├── js/                     # JavaScript files
│   └── css/                    # Stylesheets
├── routes/
│   ├── web.php                 # Web routes
│   └── auth.php                # Authentication routes
└── public/                     # Public assets
```

## 🎯 System Modules

### 1. Dashboard Module

- Comprehensive system overview with 9 statistics cards
- Real-time low stock alerts (≤10 units)
- Recent transaction tracking (last 5 transactions)
- Quick action buttons for common operations
- Responsive grid layout

### 2. Products Module

- Full CRUD operations with validation
- Advanced filtering: stock level, category, supplier
- Real-time search across products and SKUs
- Product details page with transaction history
- Stock level badges (In Stock, Low Stock, Out of Stock)
- Profit margin calculations
- 6 product categories support

### 3. Suppliers Module

- Comprehensive supplier management
- Contact information tracking (email, phone, address)
- Supplier statistics dashboard
- Advanced gradient-based filters UI
- Safe deletion (products remain with null supplier)

### 4. Stock Transactions Module

- Stock In/Out transaction recording
- **History preservation** - deletion disabled for audit compliance
- **Reverse transaction feature** - undo without deleting history
- Advanced filtering: type, product, user, date range
- Stock validation (prevents negative inventory)
- Transaction statistics (total in/out, recent activity)
- User attribution for all transactions

### 5. Users Module (Admin Only)

- User creation and management
- Role assignment (Admin, Warehouse Manager)
- Profile editing with password management
- User activity tracking
- No public registration (secure environment)

### 6. Profile Module

- Personal information editing
- Password change functionality
- Email locked for security (admin-only changes)
- Activity summary

## 🛠️ Technology Stack

### Backend

- **Framework:** Laravel 12.36.1
- **PHP:** 8.2.12+
- **Authentication:** Custom middleware with role-based access
- **ORM:** Eloquent with relationships and eager loading
- **Validation:** Form Request classes

### Frontend

- **Templating:** Blade Components (20+ reusable components)
- **CSS Framework:** Tailwind CSS 3.4
- **JavaScript:** Alpine.js for reactive components
- **Build Tool:** Vite 7.1.12
- **Charts:** Chart.js for data visualization

### Database

- **Primary:** MySQL 8.0
- **Alternative Support:** SQLite, PostgreSQL
- **Migrations:** Version-controlled schema
- **Seeders:** Realistic sample data (11 users, 15 suppliers, 122 products, 1,007 transactions over 90 days)

### Development Tools

- **Package Manager:** Composer, NPM
- **Code Style:** PSR-12 standards
- **Version Control:** Git
- **Testing:** PHPUnit (Feature & Unit tests)

## 🔧 Configuration

### Environment Variables

Key environment variables in `.env`:

```env
APP_NAME="Brandology Inventory System"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database.sqlite

MAIL_MAILER=smtp
# Configure mail settings for notifications
```

### Database Configuration

The system uses SQLite by default. To use MySQL or PostgreSQL:

1. Update `.env` file with database credentials
2. Run `php artisan migrate --seed`

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit

# Run with coverage
php artisan test --coverage
```

## 📊 Database Schema

### Main Tables

- **users** - System users with role-based access
- **products** - Product inventory with categories, pricing, and soft deletes (`deleted_at`)
- **suppliers** - Supplier information and contacts
- **stock_transactions** - Complete history of stock movements
- **cache** - Application caching
- **jobs** - Background job queue

### Key Relationships

- Products belong to Suppliers (nullable with cascade protection)
- Stock Transactions belong to Products
- Stock Transactions belong to Users (tracking)
- Suppliers have many Products

## 🎯 Controllers Architecture

The system follows the MVC pattern with specialized controllers for each domain. All controllers implement best practices including validation, eager loading, and proper error handling.

### 1. DashboardController

**Purpose:** Central hub for system overview and quick statistics

**Key Methods:**
- `index()` - Displays comprehensive dashboard with real-time metrics

**Features:**
- Calculates total products, suppliers, and inventory value
- Identifies low stock items (quantity < 5)
- Shows 5 most recent stock transactions with eager loading
- Uses raw SQL for performance optimization in value calculations

**Business Logic:**
- Real-time inventory value: `SUM(quantity × cost)`
- Low stock alert threshold: < 5 units
- Transaction history: Latest 5 with product relationships

---

### 2. ProductController

**Purpose:** Complete product lifecycle management with advanced filtering

**Key Methods:**
- `index()` - List products with search, filters, and statistics
- `create()` - Display product creation form
- `store()` - Validate and save new product
- `edit()` - Display product editing form
- `update()` - Validate and update product
- `destroy()` - Delete product
- `showDetails()` - Detailed product view with transaction history

**Advanced Features:**

**Search Capabilities:**
- Multi-field search: name, SKU, category, supplier name
- Supports partial matching with LIKE queries

**Filtering System:**
- Stock levels: low (≤10), medium (11-50), high (>50), out of stock (0)
- Categories: Electronics, Clothing, Food, Furniture, etc.
- Supplier-based filtering

**Statistics Calculation:**
- Total products count
- Inventory value: `SUM(price × quantity)`
- Stock distribution: low, medium, high, out of stock
- Category-wise analysis

**Product Details Page:**
- Complete transaction history with user tracking
- Statistics: total stock in/out, transaction count
- Inventory value calculation
- Chart.js integration for visual data (optional)
- Reverse chronological transaction display

**Validation Rules:**
- SKU uniqueness across all products
- Non-negative costs and prices
- Positive or zero quantity
- Required supplier relationship

**Soft Delete Features:**
- Products marked as deleted retain `deleted_at` timestamp
- Transaction history preserved when product is deleted
- Deleted products excluded from default queries
- Can be restored or permanently deleted via `forceDelete()`
- Prevents data loss and maintains audit trail integrity

---

### 3. SupplierController

**Purpose:** Supplier relationship and contact management

**Key Methods:**
- `index()` - List suppliers with filtering and statistics
- `create()` - Supplier creation form
- `store()` - Create new supplier with validation
- `edit()` - Supplier editing form
- `update()` - Update supplier information
- `destroy()` - Safe deletion with cascade protection

**Search & Filter Features:**
- Multi-field search: name, email, phone, address
- Contact info filters:
  - Suppliers with email
  - Suppliers with phone
  - Suppliers with complete information (all fields filled)

**Statistics Dashboard:**
- Total suppliers count
- Suppliers with email contact
- Suppliers with phone contact
- Suppliers with complete contact information

**Safety Features:**
- Cascade protection: Products remain when supplier deleted (set to null)
- Nullable foreign key implementation
- Data integrity preservation

**Validation:**
- Email format validation
- Phone number max length: 20 characters
- All contact fields optional (flexibility)

---

### 4. StockTransactionController

**Purpose:** Inventory movement tracking with audit trail preservation

**Key Methods:**
- `index()` - Transaction history with advanced filtering
- `create()` - Transaction entry form
- `store()` - Record new transaction with validation
- `destroy()` - Disabled for audit compliance
- `reverse()` - Create reverse transaction to undo effects

**Advanced Filtering:**
- Transaction type: Stock In / Stock Out
- Product-based filtering
- User-based tracking
- Date range selection
- Sorting by date, quantity, or type

**Business Logic:**

**Stock In Transaction:**
- Adds quantity to product inventory
- Records user who performed action
- Optional reason/reference field
- Automatic product quantity update

**Stock Out Transaction:**
- Validates available stock before processing
- Prevents negative inventory
- Deducts from product quantity
- User attribution and timestamp

**Reverse Transaction Feature:**
- Creates opposite transaction type (In → Out, Out → In)
- Validates reverse won't cause negative stock
- Maintains complete audit trail
- Links to original transaction in notes
- User tracking for reversal action

**Statistics Dashboard:**
- Total transactions count
- Stock in/out counts separately
- Total quantities in/out
- Recent activity (last 7 days)
- Transaction volume analysis

**Data Integrity:**
- Deletion disabled to preserve history
- Immutable transaction records
- Complete audit trail maintenance
- Regulatory compliance support

---

### 5. UserController (Admin Only)

**Purpose:** User management and role assignment

**Key Methods:**
- `index()` - List all users with pagination
- `create()` - User creation form (admin only)
- `store()` - Create user with role assignment
- `edit()` - User editing form
- `update()` - Update user information
- `destroy()` - Delete user account

**Role-Based Access:**
- **Admin:** Full system access, user management
- **Warehouse Manager:** Inventory operations only

**Security Features:**
- Password hashing with bcrypt
- Email uniqueness validation
- Minimum password length: 6 characters
- Optional password update (empty = keep current)
- No public registration (admin-only creation)

**Validation Rules:**
- Unique email addresses
- Valid email format
- Strong password requirements
- Role restriction to defined values
- Required name field

---

### 6. ProfileController

**Purpose:** Personal profile management for authenticated users

**Key Methods:**
- `show()` - Display user profile
- `edit()` - Profile editing form
- `updateProfile()` - Update name and password
- `update()` - Advanced profile update
- `destroy()` - Account deletion

**User Capabilities:**
- Update personal name
- Change password (optional)
- View account information
- Email locked (admin-only changes for security)

**Security Measures:**
- Email modification restricted to admins
- Password change requires authentication
- CSRF protection on all forms
- Session-based verification

**Profile Features:**
- Activity summary display
- Role and permissions visibility
- Account creation date
- Last login tracking (if implemented)

---

### 7. ReportController

**Purpose:** Business intelligence and analytics generation

**Key Methods:**
- `index()` - Comprehensive reports dashboard

**Report Types:**

**Inventory Reports:**
- Product quantities analysis
- Stock level distribution (low/medium/high)
- Inventory value calculations
- Category-wise breakdown

**Filtering Options:**
- Period selection (7, 30, 90 days)
- Stock level filters
- Sorting by quantity, value, or name

**Statistical Analysis:**
- Total products and stock levels
- Value calculations: `SUM(quantity × cost)`
- Low/medium/high stock counts
- Trend analysis over time

**Data Visualization:**
- Chart.js integration for graphs
- Product quantity charts
- Stock distribution pie charts
- Transaction trend analysis

---

### Common Patterns Across Controllers

**Pagination:**
- 10 items per page default
- Maintains filter state across pages
- Uses `appends($request->all())` for URL parameters

**Eager Loading:**
- Prevents N+1 query problems
- Uses `with()` for relationships
- Optimized database queries

**Validation:**
- Form Request validation
- Server-side validation rules
- User-friendly error messages
- XSS prevention

**Security:**
- CSRF token verification
- Role-based middleware protection
- Input sanitization
- SQL injection prevention via Eloquent

**Performance Optimization:**
- Query result caching where appropriate
- Efficient relationship loading
- Raw SQL for complex calculations
- Index usage in database queries

## 🚀 Deployment

### Production Deployment

1. **Server Requirements:**
   - PHP 8.2+ with required extensions
   - Composer
   - Web server (Apache/Nginx)
   - Database server

2. **Deployment Steps:**
   ```bash
   # Clone and setup
   git clone https://github.com/your-username/inventory-system.git
   cd inventory-system
   composer install --optimize-autoloader --no-dev
   npm install && npm run build
   
   # Configure environment
   cp .env.example .env
   php artisan key:generate
   
   # Database setup
   php artisan migrate --force
   php artisan db:seed --force
   
   # Optimize for production
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

### Development Guidelines

- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation as needed
- Use meaningful commit messages

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Laravel Framework for the robust foundation
- Tailwind CSS for the beautiful styling
- Alpine.js for reactive components
- The open-source community for inspiration

## 📧 Support & Contact

For support, questions, or feature requests:

- Create an issue on GitHub
- Check the documentation in `/docs` folder
- Review the inline code comments

---

## � Recent Updates

### Version 2.0 (November 2025)

**Major Features:**
- ✅ **Soft Delete System** - Products now use soft deletes to preserve transaction history
- ✅ **Enhanced Seed Data** - 122 realistic products across 11 categories with 1,007 transactions
- ✅ **Dynamic Page Titles** - Each page now has a unique, descriptive browser title
- ✅ **Quantity Lock on Edit** - Product quantities can only be changed through Stock Transactions
- ✅ **Realistic Data** - Egyptian-focused suppliers, pricing in EGP, and 90-day transaction history

**Data Improvements:**
- 11 diverse product categories (Laptops, Monitors, Storage, Networking, etc.)
- 15 Egyptian suppliers with realistic contact information
- 11 user accounts (3 admins + 8 warehouse managers)
- Transaction history spanning 3 months with realistic patterns

**Technical Enhancements:**
- Added `deleted_at` column to products table via migration
- Implemented SoftDeletes trait in Product model
- Enhanced seeder files with comprehensive, realistic data
- Improved validation and business logic across controllers

### Migration Notes

If updating from an earlier version:

```bash
# Run new migrations
php artisan migrate

# Optionally refresh with new seed data
php artisan migrate:fresh --seed
```

---

## 📚 Additional Documentation

For detailed information about the seed data, see [`SEED_DATA_INFO.md`](SEED_DATA_INFO.md) which includes:
- Complete list of all 11 users with credentials
- 15 supplier details with contact information
- 122 products categorized by type
- Transaction patterns and statistics
- Testing scenarios and use cases

---

## �👨‍💻 Developer

**Ahmed Essam**

- 📧 Email: ahmed.essam.dev@gmail.com
- 💼 Full Stack Developer
- 🌐 GitHub: [@ahmedessammdev-hub](https://github.com/ahmedessammdev-hub)

---

Made with ❤️ using Laravel & Tailwind CSS | Updated November 2025
