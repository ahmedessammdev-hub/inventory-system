@echo off
echo Creating backups directory...
if not exist "backups" mkdir backups

echo Setting up log rotation...
if not exist "storage\logs\old" mkdir storage\logs\old

echo Creating maintenance log file...
echo Maintenance tools initialized on %date% %time% > maintenance.log

echo Maintenance tools setup completed!
pause
