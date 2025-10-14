# 📚 DOKUMENTASI BLADE TEMPLATING - TUGAS LAYOUTING

## 🎯 Tujuan Tugas
Memahami konsep **reusability** dan **inheritance** dalam Blade Templating Laravel, 
mirip dengan konsep OOP (Object-Oriented Programming).

---

## 📂 Struktur File

```
resources/views/
├── layouts/
│   ├── app.blade.php         # Layout utama project
│   └── master.blade.php      # Layout example untuk tugas
├── pages/
│   ├── home-example.blade.php    # Halaman Home (example)
│   └── about-example.blade.php   # Halaman About (example)
├── welcome.blade.php
├── home.blade.php
├── about.blade.php
├── blog.blade.php
└── contact.blade.php
```

---

## 🔧 Konsep OOP dalam Blade

| Konsep OOP | Blade Templating | Penjelasan |
|------------|------------------|------------|
| **Class (Parent)** | `layouts/master.blade.php` | Template utama dengan navbar & footer |
| **Inheritance** | `@extends('layouts.master')` | Child mewarisi struktur parent |
| **Method Override** | `@section('content')` | Override bagian tertentu |
| **Properties** | `@yield('title')` | Placeholder yang bisa diisi |
| **Reusability** | Navbar ditulis sekali | Dipakai di semua halaman |

---

## 📝 Cara Kerja

### 1️⃣ Master Layout (Parent Class)
**File:** `layouts/master.blade.php`

```php
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Default Title')</title>
    @stack('styles')  <!-- Untuk CSS khusus halaman -->
</head>
<body>
    <!-- NAVBAR - Ditulis SEKALI -->
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
    </nav>
    
    <!-- CONTENT - Berbeda tiap halaman -->
    <main>
        @yield('content')
    </main>
    
    <!-- FOOTER - Ditulis SEKALI -->
    <footer>
        © 2025 MyWebsite
    </footer>
    
    @stack('scripts')  <!-- Untuk JS khusus halaman -->
</body>
</html>
```

**Penjelasan:**
- `@yield('content')` = Placeholder untuk konten dari child
- `@stack('styles')` = Tempat untuk CSS tambahan dari child
- Navbar & Footer ditulis sekali, otomatis ada di semua halaman

---

### 2️⃣ Child Pages (Extends Parent)
**File:** `pages/home-example.blade.php`

```php
{{-- 1. EXTENDS parent layout --}}
@extends('layouts.master')

{{-- 2. SET title khusus halaman ini --}}
@section('title', 'Home Page')

{{-- 3. PUSH CSS khusus halaman ini --}}
@push('styles')
<style>
    .hero { background: gold; }
</style>
@endpush

{{-- 4. ISI konten khusus halaman ini --}}
@section('content')
    <h1>Welcome to Home Page</h1>
    <p>Navbar dan footer otomatis muncul!</p>
@endsection

{{-- 5. PUSH JavaScript khusus halaman ini --}}
@push('scripts')
<script>
    console.log('Home loaded');
</script>
@endpush
```

**Penjelasan:**
- `@extends` = Mewarisi layout dari master
- `@section('content')` = Isi konten unik halaman ini
- `@push('styles')` = Tambahkan CSS khusus halaman ini
- Navbar & Footer tidak perlu ditulis lagi!

---

## ✅ Keuntungan Blade Templating

### 1. **DRY Principle** (Don't Repeat Yourself)
```php
// ❌ TANPA Blade Templating (Jelek!)
// home.blade.php
<nav>...</nav>
<h1>Home</h1>
<footer>...</footer>

// about.blade.php
<nav>...</nav>  // COPY-PASTE navbar lagi!
<h1>About</h1>
<footer>...</footer>  // COPY-PASTE footer lagi!

// ✅ DENGAN Blade Templating (Bagus!)
// master.blade.php
<nav>...</nav>
@yield('content')
<footer>...</footer>

// home.blade.php
@extends('layouts.master')
@section('content')
    <h1>Home</h1>
@endsection

// about.blade.php
@extends('layouts.master')
@section('content')
    <h1>About</h1>
@endsection
```

### 2. **Easy Maintenance**
- Ubah navbar? Edit sekali di `master.blade.php`
- Otomatis berubah di SEMUA halaman!

### 3. **Consistent Design**
- Semua halaman punya struktur yang sama
- Tidak ada halaman yang "lupa" navbar/footer

---

## 🚀 Cara Testing

1. **Jalankan Laravel Server**
   ```bash
   php artisan serve
   ```

2. **Buka browser:**
   - Home Example: http://localhost:8000/example-home
   - About Example: http://localhost:8000/example-about

3. **Perhatikan:**
   - ✅ Navbar sama di kedua halaman
   - ✅ Footer sama di kedua halaman
   - ✅ Hanya konten yang berbeda
   - ✅ Title browser berbeda tiap halaman

4. **Coba Edit Navbar:**
   - Buka `layouts/master.blade.php`
   - Ubah navbar (tambah menu "Contact")
   - Refresh browser
   - ✅ Navbar berubah di SEMUA halaman!

---

## 📊 Perbandingan: Tanpa vs Dengan Blade Templating

| Aspek | Tanpa Templating | Dengan Templating |
|-------|------------------|-------------------|
| **Navbar** | Ditulis di 10 halaman | Ditulis sekali |
| **Maintenance** | Edit 10 file | Edit 1 file |
| **Consistency** | Rawan berbeda | Selalu konsisten |
| **Code Lines** | ~1000 baris | ~200 baris |
| **Error Prone** | Tinggi | Rendah |

---

## 💡 Tips untuk Tugas

1. **Buat Master Layout Dulu**
   - Definisikan struktur dasar (navbar, footer)
   - Tentukan sections (`@yield`)

2. **Buat Child Pages**
   - Extends master layout
   - Isi section content
   - Tambahkan CSS/JS khusus jika perlu

3. **Testing**
   - Test di browser
   - Pastikan navbar/footer muncul di semua halaman

4. **Dokumentasi**
   - Jelaskan konsep inheritance
   - Tunjukkan keuntungan reusability
   - Screenshot hasil

---

## 📸 Screenshot yang Perlu Diambil untuk Tugas

1. **Struktur File** (seperti di atas)
2. **Code Master Layout** (layouts/master.blade.php)
3. **Code Child Page** (pages/home-example.blade.php)
4. **Browser - Home Page** (dengan navbar & footer)
5. **Browser - About Page** (dengan navbar & footer yang sama)
6. **Perbandingan** (sebelum vs sesudah edit navbar di master)

---

## 🎓 Kesimpulan

Blade Templating menggunakan konsep **inheritance** dan **reusability** seperti OOP:
- **Master Layout** = Parent Class
- **Child Pages** = Child Classes yang extends parent
- **@yield/@section** = Method override
- **Keuntungan** = DRY, Easy Maintenance, Consistency

Dengan Blade, navbar/footer cukup ditulis SEKALI di master layout, 
lalu semua halaman otomatis punya navbar/footer yang sama!

---

**Dibuat oleh: Muhammad Rakha**  
**Mata Kuliah: Web Development**  
**Universitas Ciputra Surabaya (Makassar)**

