# 📚 PANDUAN SETUP DATABASE PORTFOLIO DI PHPMYADMIN

## 📋 DAFTAR ISI
1. [Persiapan](#persiapan)
2. [Cara 1: Import via phpMyAdmin (GUI)](#cara-1-import-via-phpmyadmin-gui)
3. [Cara 2: Import via Command Line](#cara-2-import-via-command-line)
4. [Cara 3: Import via Laravel Artisan](#cara-3-import-via-laravel-artisan)
5. [Verifikasi Database](#verifikasi-database)
6. [Troubleshooting](#troubleshooting)

---

## 🔧 PERSIAPAN

### File yang Tersedia:
- `portfolio_database.sql` - Schema database (struktur tabel)
- `sample_data.sql` - Data sample untuk testing
- `ERD_Portfolio.drawio` - Diagram ERD

### Pastikan:
✅ XAMPP/WAMP/MAMP sudah terinstall dan berjalan  
✅ MySQL/MariaDB service aktif  
✅ phpMyAdmin dapat diakses (biasanya: http://localhost/phpmyadmin)

---

## 📥 CARA 1: IMPORT VIA PHPMYADMIN (GUI)

### Langkah-langkah:

#### Step 1: Buka phpMyAdmin
```
Buka browser → http://localhost/phpmyadmin
Login dengan credentials MySQL Anda
```

#### Step 2: Create Database (Opsional)
```
1. Klik tab "Databases"
2. Masukkan nama: portfolio_db
3. Collation: utf8mb4_unicode_ci
4. Klik "Create"
```
**ATAU** skip step ini karena file SQL sudah include perintah CREATE DATABASE

#### Step 3: Import Schema Database
```
1. Klik database "portfolio_db" (atau New jika belum ada)
2. Klik tab "Import"
3. Klik "Choose File"
4. Pilih file: portfolio_database.sql
5. Format: SQL
6. Klik "Go"
7. Tunggu hingga selesai ✅
```

#### Step 4: Import Sample Data (Opsional)
```
1. Pastikan masih di database "portfolio_db"
2. Klik tab "Import"
3. Klik "Choose File"
4. Pilih file: sample_data.sql
5. Klik "Go"
6. Tunggu hingga selesai ✅
```

#### Step 5: Verifikasi
```
1. Klik database "portfolio_db"
2. Lihat daftar tabel, seharusnya ada:
   ✓ users
   ✓ posts
   ✓ experiences
   ✓ skills
   ✓ projects
   ✓ project_skill
   ✓ sessions
   ✓ cache
   ✓ jobs
   ✓ migrations
   ✓ dan tabel lainnya
```

---

## 💻 CARA 2: IMPORT VIA COMMAND LINE

### Windows (PowerShell/CMD):

#### Step 1: Buka Terminal/CMD
```powershell
# Navigasi ke folder MySQL
cd "C:\xampp\mysql\bin"
# atau
cd "C:\wamp64\bin\mysql\mysql8.0.x\bin"
```

#### Step 2: Import Database Schema
```powershell
# Import schema (struktur database)
.\mysql.exe -u root -p < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\portfolio_database.sql"

# Masukkan password MySQL (biasanya kosong untuk XAMPP)
# Tekan Enter
```

#### Step 3: Import Sample Data
```powershell
# Import sample data
.\mysql.exe -u root -p portfolio_db < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\sample_data.sql"

# Masukkan password MySQL
# Tekan Enter
```

### Satu Perintah Lengkap:
```powershell
# Import keduanya sekaligus
cd "C:\xampp\mysql\bin"
.\mysql.exe -u root -p < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\portfolio_database.sql"
.\mysql.exe -u root -p portfolio_db < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\sample_data.sql"
```

### Tanpa Password (XAMPP Default):
```powershell
.\mysql.exe -u root < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\portfolio_database.sql"
.\mysql.exe -u root portfolio_db < "C:\Users\Rakha\Documents\WebDev_BuElza\WebDev Portfolio\database\sample_data.sql"
```

---

## 🎯 CARA 3: IMPORT VIA LARAVEL ARTISAN

### Jika Menggunakan Laravel Migration:

#### Step 1: Konfigurasi .env
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=portfolio_db
DB_USERNAME=root
DB_PASSWORD=
```

#### Step 2: Buat Database Manual
```sql
-- Jalankan di phpMyAdmin atau MySQL command line
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

#### Step 3: Jalankan Migration
```powershell
# Di folder project Laravel
php artisan migrate

# Atau fresh migration (drop all tables dan re-create)
php artisan migrate:fresh
```

#### Step 4: Jalankan Seeder
```powershell
# Seed semua data
php artisan db:seed

# Atau seed specific seeder
php artisan db:seed --class=PortfolioSeeder
php artisan db:seed --class=RealExperienceSeeder
php artisan db:seed --class=RealProjectSeeder
php artisan db:seed --class=ProjectSkillSeeder
```

#### Step 5: Fresh Migration + Seed (All in One)
```powershell
# Drop semua tabel, re-create, dan seed data
php artisan migrate:fresh --seed
```

---

## ✅ VERIFIKASI DATABASE

### Via phpMyAdmin:
```
1. Buka phpMyAdmin
2. Klik database "portfolio_db"
3. Periksa jumlah tabel (seharusnya 13+ tabel)
4. Klik setiap tabel dan lihat data
```

### Via MySQL Command Line:
```sql
-- Login ke MySQL
mysql -u root -p

-- Gunakan database
USE portfolio_db;

-- Lihat semua tabel
SHOW TABLES;

-- Lihat struktur tabel
DESCRIBE users;
DESCRIBE projects;
DESCRIBE skills;

-- Lihat data
SELECT * FROM users;
SELECT * FROM projects;
SELECT * FROM skills LIMIT 5;
SELECT * FROM experiences;

-- Lihat relasi
SELECT p.title, GROUP_CONCAT(s.name) as skills
FROM projects p
LEFT JOIN project_skill ps ON p.id = ps.project_id
LEFT JOIN skills s ON ps.skill_id = s.id
GROUP BY p.id;

-- Count records
SELECT 
  (SELECT COUNT(*) FROM users) as users,
  (SELECT COUNT(*) FROM posts) as posts,
  (SELECT COUNT(*) FROM projects) as projects,
  (SELECT COUNT(*) FROM skills) as skills,
  (SELECT COUNT(*) FROM experiences) as experiences;
```

### Via Laravel Tinker:
```powershell
# Masuk ke tinker
php artisan tinker

# Test queries
>>> User::count()
>>> Project::count()
>>> Skill::count()
>>> Project::with('skills')->first()
>>> Project::where('is_featured', 1)->get()
```

---

## 🚨 TROUBLESHOOTING

### Error: "Access denied for user"
```powershell
# Cek username dan password di .env
# Pastikan MySQL service berjalan
# Untuk XAMPP default: username=root, password=(kosong)
```

### Error: "Database does not exist"
```sql
-- Buat database manual dulu
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### Error: "Foreign key constraint fails"
```sql
-- Disable foreign key check sementara
SET FOREIGN_KEY_CHECKS = 0;

-- Import SQL file

-- Enable kembali
SET FOREIGN_KEY_CHECKS = 1;
```

### Error: "Table already exists"
```sql
-- Drop database dan buat ulang
DROP DATABASE IF EXISTS portfolio_db;
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Atau gunakan migrate:fresh
php artisan migrate:fresh --seed
```

### Error: "Maximum execution time exceeded"
```
Solusi di phpMyAdmin:
1. Edit php.ini
2. Cari: max_execution_time
3. Ubah jadi: max_execution_time = 300
4. Restart Apache/MySQL
```

### Error: "Packet too large"
```
Solusi:
1. Edit my.ini atau my.cnf
2. Tambahkan:
   max_allowed_packet = 64M
3. Restart MySQL
```

---

## 📊 QUICK COMMANDS CHEAT SHEET

### PowerShell (Dari folder project):
```powershell
# Navigasi ke folder database
cd database

# Import schema
C:\xampp\mysql\bin\mysql.exe -u root < portfolio_database.sql

# Import sample data
C:\xampp\mysql\bin\mysql.exe -u root portfolio_db < sample_data.sql

# Laravel commands
php artisan migrate:fresh --seed
php artisan db:seed --class=PortfolioSeeder
```

### MySQL Command Line:
```sql
-- Login
mysql -u root -p

-- Create database
CREATE DATABASE portfolio_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Import dari MySQL prompt
USE portfolio_db;
SOURCE C:/Users/Rakha/Documents/WebDev_BuElza/WebDev Portfolio/database/portfolio_database.sql;
SOURCE C:/Users/Rakha/Documents/WebDev_BuElza/WebDev Portfolio/database/sample_data.sql;

-- Show databases
SHOW DATABASES;

-- Show tables
SHOW TABLES;
```

---

## 🎓 INFORMASI TAMBAHAN

### Default User Credentials (Sample Data):
```
Email: rakha@example.com
Password: password

Email: admin@portfolio.com
Password: password
```

### Struktur Database:
- **13+ Tables** (users, projects, skills, dll)
- **3 Foreign Keys** (projects.user_id, project_skill.project_id, project_skill.skill_id)
- **1 Many-to-Many Relationship** (Projects ↔ Skills via project_skill)
- **Timestamps** pada semua tabel utama
- **JSON field** untuk technologies di tabel projects

### Tools Recommended:
- 📱 phpMyAdmin (GUI web-based)
- 💻 MySQL Workbench (Desktop GUI)
- 🔧 TablePlus (Modern database client)
- 📊 DBeaver (Universal database tool)

---

## 📞 SUPPORT

Jika mengalami masalah:
1. Cek error log di XAMPP Control Panel
2. Lihat MySQL error log
3. Periksa konfigurasi .env Laravel
4. Pastikan port 3306 tidak digunakan aplikasi lain

---

**Created by:** Portfolio Project  
**Date:** November 10, 2025  
**Version:** 1.0
