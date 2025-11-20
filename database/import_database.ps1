# ================================================================
# PORTFOLIO DATABASE - QUICK IMPORT SCRIPT FOR WINDOWS
# ================================================================
# File: import_database.ps1
# Description: Script otomatis untuk import database ke phpMyAdmin
# Usage: .\import_database.ps1
# ================================================================

Write-Host "========================================" -ForegroundColor Cyan
Write-Host "  PORTFOLIO DATABASE IMPORT SCRIPT" -ForegroundColor Cyan
Write-Host "========================================" -ForegroundColor Cyan
Write-Host ""

# ================================================================
# CONFIGURATION
# ================================================================

# MySQL Configuration
$MYSQL_USER = "root"
$MYSQL_PASSWORD = ""  # Kosongkan jika tidak ada password (default XAMPP)
$DATABASE_NAME = "portfolio_db"

# Path Configuration (Auto detect)
$CURRENT_DIR = Get-Location
$SCHEMA_FILE = Join-Path $CURRENT_DIR "portfolio_database.sql"
$SAMPLE_FILE = Join-Path $CURRENT_DIR "sample_data.sql"

# MySQL Binary Paths (Common locations)
$MYSQL_PATHS = @(
    "C:\xampp\mysql\bin\mysql.exe",
    "C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe",
    "C:\wamp\bin\mysql\mysql8.0.31\bin\mysql.exe",
    "C:\Program Files\MySQL\MySQL Server 8.0\bin\mysql.exe",
    "C:\Program Files\MariaDB 10.6\bin\mysql.exe"
)

# ================================================================
# FIND MYSQL EXECUTABLE
# ================================================================

Write-Host "[1] Mencari MySQL executable..." -ForegroundColor Yellow
$MYSQL_EXE = $null

foreach ($path in $MYSQL_PATHS) {
    if (Test-Path $path) {
        $MYSQL_EXE = $path
        Write-Host "    ✓ Ditemukan: $path" -ForegroundColor Green
        break
    }
}

if (-not $MYSQL_EXE) {
    Write-Host "    ✗ MySQL tidak ditemukan!" -ForegroundColor Red
    Write-Host ""
    Write-Host "Silakan install XAMPP/WAMP atau set PATH manual" -ForegroundColor Yellow
    Write-Host "Atau edit script ini dan tambahkan path MySQL Anda" -ForegroundColor Yellow
    exit 1
}

# ================================================================
# CHECK FILES
# ================================================================

Write-Host ""
Write-Host "[2] Memeriksa file SQL..." -ForegroundColor Yellow

if (-not (Test-Path $SCHEMA_FILE)) {
    Write-Host "    ✗ File tidak ditemukan: portfolio_database.sql" -ForegroundColor Red
    exit 1
}
Write-Host "    ✓ Schema file: OK" -ForegroundColor Green

if (-not (Test-Path $SAMPLE_FILE)) {
    Write-Host "    ⚠ Sample data file tidak ditemukan (opsional)" -ForegroundColor Yellow
    $IMPORT_SAMPLE = $false
} else {
    Write-Host "    ✓ Sample data file: OK" -ForegroundColor Green
    $IMPORT_SAMPLE = $true
}

# ================================================================
# USER CONFIRMATION
# ================================================================

Write-Host ""
Write-Host "[3] Konfigurasi:" -ForegroundColor Yellow
Write-Host "    MySQL User     : $MYSQL_USER" -ForegroundColor Cyan
Write-Host "    Database Name  : $DATABASE_NAME" -ForegroundColor Cyan
Write-Host "    MySQL Path     : $MYSQL_EXE" -ForegroundColor Cyan
Write-Host "    Schema File    : $SCHEMA_FILE" -ForegroundColor Cyan
if ($IMPORT_SAMPLE) {
    Write-Host "    Sample Data    : $SAMPLE_FILE" -ForegroundColor Cyan
}

Write-Host ""
$confirmation = Read-Host "Lanjutkan import? (Y/N)"
if ($confirmation -ne 'Y' -and $confirmation -ne 'y') {
    Write-Host "Import dibatalkan." -ForegroundColor Yellow
    exit 0
}

# ================================================================
# IMPORT DATABASE SCHEMA
# ================================================================

Write-Host ""
Write-Host "[4] Importing database schema..." -ForegroundColor Yellow

try {
    if ($MYSQL_PASSWORD -eq "") {
        # Without password
        $process = Start-Process -FilePath $MYSQL_EXE `
            -ArgumentList "-u$MYSQL_USER" `
            -RedirectStandardInput $SCHEMA_FILE `
            -NoNewWindow -Wait -PassThru
    } else {
        # With password
        $process = Start-Process -FilePath $MYSQL_EXE `
            -ArgumentList "-u$MYSQL_USER", "-p$MYSQL_PASSWORD" `
            -RedirectStandardInput $SCHEMA_FILE `
            -NoNewWindow -Wait -PassThru
    }

    if ($process.ExitCode -eq 0) {
        Write-Host "    ✓ Schema imported successfully!" -ForegroundColor Green
    } else {
        Write-Host "    ✗ Schema import failed (Exit code: $($process.ExitCode))" -ForegroundColor Red
        exit 1
    }
} catch {
    Write-Host "    ✗ Error: $_" -ForegroundColor Red
    exit 1
}

# ================================================================
# IMPORT SAMPLE DATA
# ================================================================

if ($IMPORT_SAMPLE) {
    Write-Host ""
    Write-Host "[5] Importing sample data..." -ForegroundColor Yellow
    
    try {
        if ($MYSQL_PASSWORD -eq "") {
            # Without password
            $process = Start-Process -FilePath $MYSQL_EXE `
                -ArgumentList "-u$MYSQL_USER", $DATABASE_NAME `
                -RedirectStandardInput $SAMPLE_FILE `
                -NoNewWindow -Wait -PassThru
        } else {
            # With password
            $process = Start-Process -FilePath $MYSQL_EXE `
                -ArgumentList "-u$MYSQL_USER", "-p$MYSQL_PASSWORD", $DATABASE_NAME `
                -RedirectStandardInput $SAMPLE_FILE `
                -NoNewWindow -Wait -PassThru
        }

        if ($process.ExitCode -eq 0) {
            Write-Host "    ✓ Sample data imported successfully!" -ForegroundColor Green
        } else {
            Write-Host "    ⚠ Sample data import failed (Exit code: $($process.ExitCode))" -ForegroundColor Yellow
        }
    } catch {
        Write-Host "    ⚠ Error: $_" -ForegroundColor Yellow
    }
}

# ================================================================
# VERIFICATION
# ================================================================

Write-Host ""
Write-Host "[6] Verifying installation..." -ForegroundColor Yellow

try {
    $query = "USE $DATABASE_NAME; SHOW TABLES;"
    $queryFile = [System.IO.Path]::GetTempFileName()
    $query | Out-File -FilePath $queryFile -Encoding utf8
    
    if ($MYSQL_PASSWORD -eq "") {
        $output = & $MYSQL_EXE -u$MYSQL_USER -e $query 2>&1
    } else {
        $output = & $MYSQL_EXE -u$MYSQL_USER -p$MYSQL_PASSWORD -e $query 2>&1
    }
    
    Remove-Item $queryFile -ErrorAction SilentlyContinue
    
    if ($output) {
        $tableCount = ($output | Measure-Object -Line).Lines
        Write-Host "    ✓ Database verified: $tableCount tables found" -ForegroundColor Green
    }
} catch {
    Write-Host "    ⚠ Could not verify (non-critical)" -ForegroundColor Yellow
}

# ================================================================
# SUCCESS MESSAGE
# ================================================================

Write-Host ""
Write-Host "========================================" -ForegroundColor Green
Write-Host "  DATABASE IMPORT COMPLETED!" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""
Write-Host "Next steps:" -ForegroundColor Cyan
Write-Host "  1. Buka phpMyAdmin: http://localhost/phpmyadmin" -ForegroundColor White
Write-Host "  2. Pilih database: $DATABASE_NAME" -ForegroundColor White
Write-Host "  3. Periksa struktur tabel" -ForegroundColor White
Write-Host ""
Write-Host "Laravel Integration:" -ForegroundColor Cyan
Write-Host "  1. Update .env file:" -ForegroundColor White
Write-Host "     DB_DATABASE=$DATABASE_NAME" -ForegroundColor Gray
Write-Host "     DB_USERNAME=$MYSQL_USER" -ForegroundColor Gray
Write-Host "  2. Test connection: php artisan migrate:status" -ForegroundColor White
Write-Host ""

if ($IMPORT_SAMPLE) {
    Write-Host "Default Login (Sample Data):" -ForegroundColor Cyan
    Write-Host "  Email    : rakha@example.com" -ForegroundColor White
    Write-Host "  Password : password" -ForegroundColor White
    Write-Host ""
}

Write-Host "Press any key to exit..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
