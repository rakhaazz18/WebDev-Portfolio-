{{-- Extends master layout --}}
@extends('layouts.master')

{{-- Set page title --}}
@section('title', 'Home - MyWebsite')

{{-- Page specific CSS --}}
@push('styles')
<style>
    .hero {
        background: linear-gradient(135deg, #d4af37, #1a1a1a);
        color: white;
        padding: 4rem 2rem;
        text-align: center;
        border-radius: 10px;
        margin-bottom: 2rem;
    }
    
    .hero h1 {
        font-size: 3rem;
        margin-bottom: 1rem;
    }
</style>
@endpush

{{-- Main content --}}
@section('content')
    <div class="container">
        <div class="hero">
            <h1>🏠 Welcome to Home Page</h1>
            <p>Ini adalah halaman Home yang menggunakan master layout</p>
            <p>Navbar dan Footer otomatis muncul tanpa perlu ditulis ulang!</p>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>📝 Feature 1</h3>
                        <p>Reusable navbar - tidak perlu tulis ulang</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>🎨 Feature 2</h3>
                        <p>Consistent design di semua halaman</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3>⚡ Feature 3</h3>
                        <p>Easy maintenance - edit sekali saja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Page specific JavaScript --}}
@push('scripts')
<script>
    console.log('Home page loaded!');
</script>
@endpush
