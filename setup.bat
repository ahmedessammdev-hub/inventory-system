@echo off
title Brandology Inventory System - Setup Script
color 0A

echo ========================================
echo   Brandology Inventory System Setup
echo ========================================
echo.

REM Check if PHP is installed
php --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] PHP is not installed or not in PATH
    echo Please install PHP 8.2 or higher
    pause
    exit /b 1
)

REM Check if Composer is installed
composer --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] Composer is not installed or not in PATH
    echo Please install Composer from https://getcomposer.org/
    pause
    exit /b 1
)

REM Check if Node.js is installed
node --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] Node.js is not installed or not in PATH
    echo Please install Node.js from https://nodejs.org/
    pause
    exit /b 1
)

echo [INFO] All required tools are installed
echo.

echo [STEP 1] Installing PHP dependencies...
composer install
if %errorlevel% neq 0 (
    echo [ERROR] Failed to install PHP dependencies
    pause
    exit /b 1
)
echo [SUCCESS] PHP dependencies installed
echo.

echo [STEP 2] Setting up environment file...
if not exist .env (
    copy .env.example .env
    echo [SUCCESS] Environment file created
) else (
    echo [INFO] Environment file already exists
)
echo.

echo [STEP 3] Generating application key...
php artisan key:generate
echo [SUCCESS] Application key generated
echo.

echo [STEP 4] Setting up database...
if not exist database\database.sqlite (
    echo. > database\database.sqlite
    echo [SUCCESS] SQLite database file created
) else (
    echo [INFO] Database file already exists
)

echo [INFO] Running database migrations...
php artisan migrate --force
if %errorlevel% neq 0 (
    echo [ERROR] Failed to run migrations
    pause
    exit /b 1
)
echo [SUCCESS] Database migrations completed
echo.

echo [STEP 5] Seeding database with sample data...
php artisan db:seed --force
if %errorlevel% neq 0 (
    echo [ERROR] Failed to seed database
    pause
    exit /b 1
)
echo [SUCCESS] Database seeded with sample data
echo.

echo [STEP 6] Installing Node.js dependencies...
npm install
if %errorlevel% neq 0 (
    echo [ERROR] Failed to install Node.js dependencies
    pause
    exit /b 1
)
echo [SUCCESS] Node.js dependencies installed
echo.

echo [STEP 7] Building frontend assets...
npm run build
if %errorlevel% neq 0 (
    echo [ERROR] Failed to build frontend assets
    pause
    exit /b 1
)
echo [SUCCESS] Frontend assets built
echo.

echo ========================================
echo           SETUP COMPLETED!
echo ========================================
echo.
echo Default Login Credentials:
echo.
echo Admin Account:
echo   Email: admin@example.com
echo   Password: 123456
echo.
echo Warehouse Manager Account:
echo   Email: manager@example.com
echo   Password: 123456
echo.
echo To start the application, run:
echo   php artisan serve
echo.
echo The application will be available at:
echo   http://localhost:8000
echo.
echo ========================================

pause
