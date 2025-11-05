@echo off
title Brandology Inventory System - Server
color 0B

echo ========================================
echo   Brandology Inventory System
echo ========================================
echo.
echo Starting Laravel development server...
echo.
echo Application will be available at:
echo http://localhost:8000
echo.
echo Press Ctrl+C to stop the server
echo ========================================
echo.

REM Clear caches before starting
echo [INFO] Clearing application caches...
php artisan cache:clear >nul 2>&1
php artisan config:clear >nul 2>&1
php artisan route:clear >nul 2>&1
php artisan view:clear >nul 2>&1

REM Start the Laravel server
php artisan serve

pause
