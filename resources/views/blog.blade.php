@extends('layouts.app')

@section('title','Blog — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1rem">
  <div style="display:flex;justify-content:space-between;align-items:center">
    <h2 style="margin:0">Tulisan Terbaru</h2>
    <a class="btn" href="/blog">Semua Post</a>
  </div>

  <div class="grid grid-cols-3">
    @foreach(range(1,6) as $i)
      <article class="card">
        <div style="height:140px;border-radius:.5rem;background:linear-gradient(135deg,var(--accent),var(--accent-2));margin-bottom:.75rem"></div>
        <h3 style="margin:0">Judul Artikel #{{ $i }}</h3>
        <p style="color:var(--muted);font-size:.95rem">Ringkasan singkat artikel yang menarik dan informatif untuk membantu pembaca memutuskan untuk membaca lebih lanjut.</p>
        <div style="margin-top:.5rem;display:flex;justify-content:space-between;align-items:center">
          <small style="color:var(--muted)">Oct {{ now()->format('d, Y') }}</small>
          <a href="#" style="color:var(--accent);text-decoration:none;font-weight:600">Baca</a>
        </div>
      </article>
    @endforeach
  </div>
</section>
@endsection
