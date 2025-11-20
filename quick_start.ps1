# ================================================================
# QUICK START - PORTFOLIO PROJECT
# ================================================================
# Usage: .\quick_start.ps1
# ================================================================

Write-Host "`n" -NoNewline
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Cyan
Write-Host "  PORTFOLIO PROJECT - QUICK START" -ForegroundColor Cyan
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Cyan
Write-Host ""

# Function to check if MySQL is running
function Test-MySQLRunning {
    $process = Get-Process -Name "mysqld" -ErrorAction SilentlyContinue
    return $null -ne $process
}

# Function to start MySQL
function Start-MySQL {
    Write-Host "[1] Checking MySQL status..." -ForegroundColor Yellow
    
    if (Test-MySQLRunning) {
        Write-Host "    ✓ MySQL is already running!" -ForegroundColor Green
        return $true
    }
    
    Write-Host "    ⚠ MySQL is not running" -ForegroundColor Yellow
    Write-Host ""
    Write-Host "[2] Attempting to start MySQL..." -ForegroundColor Yellow
    
    # Try to start MySQL service
    try {
        Start-Service -Name "MySQL" -ErrorAction Stop
        Start-Sleep -Seconds 3
        
        if (Test-MySQLRunning) {
            Write-Host "    ✓ MySQL started successfully!" -ForegroundColor Green
            return $true
        }
    } catch {
        Write-Host "    ⚠ Could not start MySQL service" -ForegroundColor Yellow
    }
    
    # Try XAMPP
    if (Test-Path "C:\xampp\xampp-control.exe") {
        Write-Host ""
        Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Red
        Write-Host "  MYSQL NOT RUNNING" -ForegroundColor Red
        Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Red
        Write-Host ""
        Write-Host "Choose an option:" -ForegroundColor Yellow
        Write-Host "  [1] Open XAMPP Control Panel (start MySQL manually)" -ForegroundColor White
        Write-Host "  [2] Use SQLite instead (no MySQL needed)" -ForegroundColor White
        Write-Host "  [3] Exit" -ForegroundColor White
        Write-Host ""
        
        $choice = Read-Host "Your choice (1/2/3)"
        
        switch ($choice) {
            "1" {
                Start-Process "C:\xampp\xampp-control.exe"
                Write-Host ""
                Write-Host "XAMPP Control Panel opened." -ForegroundColor Cyan
                Write-Host "Please click [Start] on MySQL, then run this script again." -ForegroundColor Cyan
                Write-Host ""
                Read-Host "Press Enter to exit"
                exit
            }
            "2" {
                return $false
            }
            default {
                exit
            }
        }
    }
    
    return $false
}

# Function to switch to SQLite
function Switch-ToSQLite {
    Write-Host ""
    Write-Host "[3] Switching to SQLite..." -ForegroundColor Yellow
    
    # Backup current .env
    Copy-Item ".env" ".env.backup.mysql" -Force
    
    # Update .env
    $envContent = Get-Content ".env"
    $envContent = $envContent -replace '^DB_CONNECTION=mysql', 'DB_CONNECTION=sqlite'
    $envContent = $envContent -replace '^DB_HOST=', '#DB_HOST='
    $envContent = $envContent -replace '^DB_PORT=', '#DB_PORT='
    $envContent = $envContent -replace '^DB_DATABASE=portfolio_db', '#DB_DATABASE=portfolio_db'
    $envContent = $envContent -replace '^DB_USERNAME=', '#DB_USERNAME='
    $envContent = $envContent -replace '^DB_PASSWORD=', '#DB_PASSWORD='
    $envContent | Set-Content ".env"
    
    Write-Host "    ✓ Switched to SQLite" -ForegroundColor Green
    Write-Host ""
    
    # Create SQLite database
    $sqliteFile = "database\database.sqlite"
    if (-not (Test-Path $sqliteFile)) {
        Write-Host "[4] Creating SQLite database..." -ForegroundColor Yellow
        New-Item -Path $sqliteFile -ItemType File -Force | Out-Null
        Write-Host "    ✓ SQLite database created" -ForegroundColor Green
        Write-Host ""
        
        Write-Host "[5] Running migrations and seeders..." -ForegroundColor Yellow
        & php artisan migrate:fresh --seed
        Write-Host ""
    }
}

# Main execution
$useMySQL = Start-MySQL

if (-not $useMySQL) {
    Switch-ToSQLite
}

# Clear cache
Write-Host ""
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Cyan
Write-Host "  PREPARING APPLICATION" -ForegroundColor Cyan
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Cyan
Write-Host ""
Write-Host "[*] Clearing cache..." -ForegroundColor Yellow
& php artisan config:clear | Out-Null
& php artisan cache:clear | Out-Null
& php artisan view:clear | Out-Null
Write-Host "    ✓ Cache cleared" -ForegroundColor Green

# Test database connection
Write-Host "[*] Testing database connection..." -ForegroundColor Yellow
& php test_database.php
if ($LASTEXITCODE -ne 0) {
    Write-Host ""
    Write-Host "⚠ Database connection failed!" -ForegroundColor Red
    Write-Host "Try running: php artisan migrate:fresh --seed" -ForegroundColor Yellow
    Write-Host ""
    Read-Host "Press Enter to exit"
    exit 1
}

# Start server
Write-Host ""
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Green
Write-Host "  APPLICATION READY!" -ForegroundColor Green
Write-Host "═══════════════════════════════════════════════════════" -ForegroundColor Green
Write-Host ""
Write-Host "Starting Laravel development server..." -ForegroundColor Cyan
Write-Host ""
Write-Host "  → Open browser: " -NoNewline -ForegroundColor White
Write-Host "http://localhost:8000" -ForegroundColor Cyan
Write-Host "  → Press Ctrl+C to stop" -ForegroundColor White
Write-Host ""

& php artisan serve
