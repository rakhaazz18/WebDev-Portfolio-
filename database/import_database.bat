@echo off
REM ================================================================
REM PORTFOLIO DATABASE - QUICK IMPORT (BATCH SCRIPT)
REM ================================================================
REM File: import_database.bat
REM Usage: Double click this file or run from CMD
REM ================================================================

echo ========================================
echo   PORTFOLIO DATABASE IMPORT SCRIPT
echo ========================================
echo.

REM Configuration
set MYSQL_USER=root
set MYSQL_PASS=
set DATABASE_NAME=portfolio_db

REM Try to find MySQL
set MYSQL_EXE=
if exist "C:\xampp\mysql\bin\mysql.exe" (
    set MYSQL_EXE=C:\xampp\mysql\bin\mysql.exe
    echo MySQL found: XAMPP
) else if exist "C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe" (
    set MYSQL_EXE=C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe
    echo MySQL found: WAMP64
) else (
    echo ERROR: MySQL not found!
    echo Please install XAMPP or WAMP
    pause
    exit /b 1
)

echo.
echo [1] Importing database schema...
"%MYSQL_EXE%" -u%MYSQL_USER% < portfolio_database.sql
if %errorlevel% neq 0 (
    echo ERROR: Failed to import schema
    pause
    exit /b 1
)
echo     SUCCESS: Schema imported!

echo.
echo [2] Importing sample data...
"%MYSQL_EXE%" -u%MYSQL_USER% %DATABASE_NAME% < sample_data.sql
if %errorlevel% neq 0 (
    echo WARNING: Sample data import failed
) else (
    echo     SUCCESS: Sample data imported!
)

echo.
echo ========================================
echo   DATABASE IMPORT COMPLETED!
echo ========================================
echo.
echo Open phpMyAdmin: http://localhost/phpmyadmin
echo Database name: %DATABASE_NAME%
echo.
echo Default login:
echo   Email: rakha@example.com
echo   Password: password
echo.
pause
