@extends('layouts.app')

@section('title','Blog — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1rem">
  <div class="fade-in" style="display:flex;justify-content:space-between;align-items:center">
    <h2 class="section-title" style="margin:0">Tulisan Terbaru</h2>
    <a class="btn-gold" href="/blog">Semua Post</a>
  </div>

  <div class="grid grid-cols-3">
    @foreach(range(1,6) as $i)
      <article class="card fade-in">
        <div style="height:140px;border-radius:.5rem;background:#1a1a1a;border:3px solid #d4af37;margin-bottom:.75rem;display:flex;align-items:center;justify-content:center;color:#d4af37;font-size:2rem;font-weight:700">#{{ $i }}</div>
        <h3 class="gold-hover" style="margin:0">Judul Artikel #{{ $i }}</h3>
        <p style="color:var(--muted);font-size:.95rem">Ringkasan singkat artikel yang menarik dan informatif untuk membantu pembaca memutuskan untuk membaca lebih lanjut.</p>
        <div style="margin-top:.5rem;display:flex;justify-content:space-between;align-items:center">
          <small style="color:var(--muted)">Oct {{ now()->format('d, Y') }}</small>
          <a href="#" class="gold-hover" style="color:var(--color-accent);text-decoration:none;font-weight:600">Baca</a>
        </div>
      </article>
    @endforeach
  </div>
</section>
@endsection
