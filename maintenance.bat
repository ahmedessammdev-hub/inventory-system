@echo off
title Brandology Inventory System - Maintenance Tools
color 0D

:MENU
cls
echo ========================================
echo   Brandology Inventory System
echo         Maintenance Tools
echo ========================================
echo.
echo Choose an option:
echo.
echo 1. Clear All Caches
echo 2. Reset Database (Fresh Migration + Seed)
echo 3. Update Dependencies (Composer + NPM)
echo 4. Run Tests
echo 5. Generate Application Key
echo 6. Check System Status
echo 7. Create Database Backup
echo 8. Open Laravel Tinker
echo 9. View System Logs
echo 0. Exit
echo.
echo ========================================

set /p choice="Enter your choice (0-9): "

if "%choice%"=="1" goto CLEAR_CACHE
if "%choice%"=="2" goto RESET_DB
if "%choice%"=="3" goto UPDATE_DEPS
if "%choice%"=="4" goto RUN_TESTS
if "%choice%"=="5" goto GEN_KEY
if "%choice%"=="6" goto SYSTEM_STATUS
if "%choice%"=="7" goto BACKUP_DB
if "%choice%"=="8" goto TINKER
if "%choice%"=="9" goto VIEW_LOGS
if "%choice%"=="0" goto EXIT

echo Invalid choice. Please try again.
pause
goto MENU

:CLEAR_CACHE
echo.
echo [INFO] Clearing all caches...
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo [SUCCESS] All caches cleared!
pause
goto MENU

:RESET_DB
echo.
echo [WARNING] This will delete all existing data!
set /p confirm="Are you sure? (y/N): "
if /i "%confirm%"=="y" (
    echo [INFO] Resetting database...
    php artisan migrate:fresh --seed
    echo [SUCCESS] Database reset completed!
) else (
    echo [INFO] Operation cancelled.
)
pause
goto MENU

:UPDATE_DEPS
echo.
echo [INFO] Updating Composer dependencies...
composer update
echo.
echo [INFO] Updating NPM dependencies...
npm update
echo.
echo [INFO] Rebuilding assets...
npm run build
echo [SUCCESS] Dependencies updated!
pause
goto MENU

:RUN_TESTS
echo.
echo [INFO] Running tests...
php artisan test
pause
goto MENU

:GEN_KEY
echo.
echo [INFO] Generating new application key...
php artisan key:generate
echo [SUCCESS] Application key generated!
pause
goto MENU

:SYSTEM_STATUS
echo.
echo [INFO] System Status Check
echo ========================================
echo.
echo PHP Version:
php --version
echo.
echo Laravel Version:
php artisan --version
echo.
echo Database Connection:
php artisan tinker --execute="try { DB::connection()->getPdo(); echo 'Database: Connected'; } catch(Exception $e) { echo 'Database: Connection Failed'; }"
echo.
echo Application Status:
php artisan about
pause
goto MENU

:BACKUP_DB
echo.
echo [INFO] Creating database backup...
set timestamp=%date:~-4,4%%date:~-10,2%%date:~-7,2%_%time:~0,2%%time:~3,2%%time:~6,2%
set timestamp=%timestamp: =0%
copy database\database.sqlite backups\database_backup_%timestamp%.sqlite
echo [SUCCESS] Database backup created: backups\database_backup_%timestamp%.sqlite
pause
goto MENU

:TINKER
echo.
echo [INFO] Opening Laravel Tinker...
echo Type 'exit' to return to main menu
echo.
php artisan tinker
goto MENU

:VIEW_LOGS
echo.
echo [INFO] Recent Laravel Logs:
echo ========================================
type storage\logs\laravel.log | more
pause
goto MENU

:EXIT
echo.
echo Thank you for using Brandology Inventory System!
echo.
pause
exit
