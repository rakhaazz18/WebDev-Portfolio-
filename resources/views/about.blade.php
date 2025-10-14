@extends('layouts.app')

@section('title','About — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1rem">
  <h2 class="section-title fade-in">Tentang Kami</h2>
  <p class="fade-in" style="color:var(--muted);max-width:70ch">Kami adalah tim kecil pengembang dan desainer yang berfokus membantu usaha kecil dan menengah membuat pengalaman digital yang efektif dan indah. Kombinasi teknik, desain, dan strategi bisnis membantu pelanggan kami mencapai tujuan mereka.</p>

  <div class="grid grid-cols-3">
    <div class="card fade-in">
      <h4 class="gold-hover" style="margin-top:0">Misi</h4>
      <p style="color:var(--muted)">Membangun produk yang memudahkan hidup pengguna dan membantu bisnis tumbuh.</p>
    </div>
    <div class="card fade-in">
      <h4 class="gold-hover" style="margin-top:0">Nilai</h4>
      <p style="color:var(--muted)">Keterbukaan, kualitas, dan fokus pada pelanggan.</p>
    </div>
    <div class="card fade-in">
      <h4 class="gold-hover" style="margin-top:0">Pendekatan</h4>
      <p style="color:var(--muted)">Iteratif: desain cepat, uji, dan perbaiki dengan data nyata.</p>
    </div>
  </div>

  <div style="display:flex;gap:1rem;align-items:center">
    <div class="card fade-in" style="flex:1">
      <h3 class="gold-hover" style="margin-top:0">Tim Kami</h3>
      <div style="display:flex;gap:1rem;align-items:center">
        <div style="width:56px;height:56px;border-radius:50%;background:#d4af37;display:flex;align-items:center;justify-content:center;color:#1a1a1a;font-weight:700;border:2px solid #111111">RS</div>
        <div>
          <div style="font-weight:700">Rakha Santoso</div>
          <div style="color:var(--muted)">Founder & Lead Developer</div>
        </div>
      </div>
    </div>
    <div class="card fade-in" style="width:260px">
      <h4 class="gold-hover" style="margin-top:0">Bergabung</h4>
      <p style="color:var(--muted)">Kami selalu mencari talenta bersemangat. Kirimkan portofolio ke <a href="mailto:hello@webdev.com" class="gold-hover">hello@webdev.com</a>.</p>
    </div>
  </div>
</section>
@endsection
