@extends('layouts.app')

@section('title','Home — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1.25rem">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <div>
      <h2 style="margin:0;font-size:1.5rem">Solusi Web untuk Bisnis Anda</h2>
      <p style="color:var(--muted);max-width:60ch">Kami menggabungkan riset UX, engineering modern, dan desain estetis untuk menghasilkan produk yang berdampak.</p>
    </div>
    <div>
      <a class="btn" href="/contact">Minta Penawaran</a>
    </div>
  </div>

  <div class="grid grid-cols-3">
    <div class="card">
      <h3 style="margin-top:0">Desain UX</h3>
      <p style="color:var(--muted)">Riset pengguna, wireframe, prototyping, dan pengujian untuk memastikan produk yang intuitif.</p>
    </div>
    <div class="card">
      <h3 style="margin-top:0">Pengembangan</h3>
      <p style="color:var(--muted)">Pengembangan frontend & backend menggunakan praktik terbaik untuk performa dan skalabilitas.</p>
    </div>
    <div class="card">
      <h3 style="margin-top:0">Optimasi & SEO</h3>
      <p style="color:var(--muted)">Optimisasi kecepatan, aksesibilitas, dan konten untuk hasil pencarian yang lebih baik.</p>
    </div>
  </div>

  <div style="display:flex;gap:1rem;align-items:center">
    <div class="card" style="flex:1">
      <h3>Case Study: Startup Retail</h3>
      <p style="color:var(--muted)">Meningkatkan konversi 28% setelah redesign checkout dan optimasi performa.</p>
    </div>
    <div class="card" style="width:260px">
      <h3 style="margin-top:0">What customers say</h3>
      <blockquote style="color:var(--muted);margin:0">"Tim BuElza mengubah cara pelanggan kami berinteraksi — hasil nyata dalam 3 bulan."</blockquote>
    </div>
  </div>
</section>
@endsection
