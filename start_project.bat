@echo off
REM ================================================================
REM QUICK FIX - START MYSQL & RUN PROJECT
REM ================================================================

echo.
echo ========================================
echo   PORTFOLIO PROJECT - QUICK START
echo ========================================
echo.

REM Check if MySQL is running
echo [1] Checking MySQL status...
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo     [OK] MySQL sudah berjalan!
    goto :run_app
) else (
    echo     [!] MySQL belum berjalan
    echo.
)

REM Try to start MySQL
echo [2] Mencoba start MySQL...
if exist "C:\xampp\mysql_start.bat" (
    call C:\xampp\mysql_start.bat
    timeout /t 5 /nobreak >nul
    goto :check_again
)

if exist "C:\xampp\xampp_start.exe" (
    start "" "C:\xampp\xampp_start.exe"
    timeout /t 5 /nobreak >nul
    goto :check_again
)

:check_again
tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL | find /I /N "mysqld.exe">NUL
if "%ERRORLEVEL%"=="0" (
    echo     [OK] MySQL berhasil distart!
    goto :run_app
) else (
    echo     [!] MySQL gagal start otomatis
    echo.
    goto :manual_instruction
)

:manual_instruction
echo ========================================
echo   MYSQL TIDAK BERJALAN
echo ========================================
echo.
echo Pilih opsi:
echo.
echo [1] Buka XAMPP Control Panel dan start MySQL manual
echo [2] Gunakan SQLite sebagai alternatif (tidak perlu MySQL)
echo [3] Keluar
echo.
choice /C 123 /M "Pilihan Anda"

if errorlevel 3 goto :eof
if errorlevel 2 goto :use_sqlite
if errorlevel 1 goto :open_xampp

:open_xampp
if exist "C:\xampp\xampp-control.exe" (
    start "" "C:\xampp\xampp-control.exe"
    echo.
    echo XAMPP Control Panel dibuka.
    echo Silakan klik [Start] pada MySQL, lalu jalankan script ini lagi.
    echo.
    pause
    goto :eof
) else (
    echo XAMPP tidak ditemukan!
    pause
    goto :eof
)

:use_sqlite
echo.
echo [3] Switching to SQLite...
copy /Y .env .env.backup.mysql >nul 2>&1

REM Update .env to use SQLite
powershell -Command "(Get-Content .env) -replace '^DB_CONNECTION=mysql', 'DB_CONNECTION=sqlite' -replace '^DB_HOST=', '#DB_HOST=' -replace '^DB_PORT=', '#DB_PORT=' -replace '^DB_DATABASE=portfolio_db', '#DB_DATABASE=portfolio_db' -replace '^DB_USERNAME=', '#DB_USERNAME=' -replace '^DB_PASSWORD=', '#DB_PASSWORD=' | Set-Content .env"

echo     [OK] Switched to SQLite
echo.

REM Create SQLite database if not exists
if not exist "database\database.sqlite" (
    echo [4] Creating SQLite database...
    type nul > database\database.sqlite
    echo     [OK] SQLite database created
    echo.
    
    echo [5] Running migrations...
    php artisan migrate:fresh --seed
    echo.
)

goto :run_app

:run_app
echo.
echo ========================================
echo   STARTING APPLICATION
echo ========================================
echo.
echo [*] Clearing cache...
php artisan config:clear >nul 2>&1
php artisan cache:clear >nul 2>&1
php artisan view:clear >nul 2>&1

echo [*] Testing database connection...
php test_database.php
if %errorlevel% neq 0 (
    echo.
    echo [!] Database connection failed!
    echo     Coba jalankan: php artisan migrate:fresh --seed
    echo.
    pause
    goto :eof
)

echo.
echo ========================================
echo   APPLICATION READY!
echo ========================================
echo.
echo Starting Laravel development server...
echo.
echo Open browser: http://localhost:8000
echo Press Ctrl+C to stop
echo.

php artisan serve

goto :eof
