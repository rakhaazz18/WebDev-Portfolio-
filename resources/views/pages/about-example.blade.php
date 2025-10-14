{{-- Extends master layout --}}
@extends('layouts.master')

{{-- Set page title --}}
@section('title', 'About - MyWebsite')

{{-- Page specific CSS --}}
@push('styles')
<style>
    .about-header {
        background-color: #f8f9fa;
        padding: 3rem 2rem;
        border-left: 5px solid #d4af37;
        margin-bottom: 2rem;
    }
    
    .profile-box {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
</style>
@endpush

{{-- Main content --}}
@section('content')
    <div class="container">
        <div class="about-header">
            <h1>👤 About Us</h1>
            <p class="lead">Ini adalah halaman About yang juga menggunakan master layout yang sama</p>
        </div>
        
        <div class="profile-box">
            <h2>Profile Saya</h2>
            <p><strong>Nama:</strong> Muhammad Rakha</p>
            <p><strong>Universitas:</strong> Universitas Ciputra Surabaya (Makassar)</p>
            <p><strong>Semester:</strong> 3 - Informatika</p>
            
            <h3 style="margin-top: 2rem;">🎯 Konsep Blade Templating</h3>
            <ul>
                <li>✅ Halaman ini menggunakan <code>@extends('layouts.master')</code></li>
                <li>✅ Navbar yang sama dengan Home tanpa perlu copy-paste</li>
                <li>✅ Footer yang sama tanpa perlu tulis ulang</li>
                <li>✅ Hanya tulis konten yang berbeda di section content</li>
            </ul>
            
            <div class="alert alert-success mt-3">
                <strong>Keuntungan:</strong> Ketika navbar berubah di master layout, 
                semua halaman (Home, About, dll) otomatis ikut berubah!
            </div>
        </div>
    </div>
@endsection

{{-- Page specific JavaScript --}}
@push('scripts')
<script>
    console.log('About page loaded!');
</script>
@endpush
