@extends('layouts.app')

@section('title','About — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1rem">
  <h2 style="margin:0">Tentang Kami</h2>
  <p style="color:var(--muted);max-width:70ch">Kami adalah tim kecil pengembang dan desainer yang berfokus membantu usaha kecil dan menengah membuat pengalaman digital yang efektif dan indah. Kombinasi teknik, desain, dan strategi bisnis membantu pelanggan kami mencapai tujuan mereka.</p>

  <div class="grid grid-cols-3">
    <div class="card">
      <h4 style="margin-top:0">Misi</h4>
      <p style="color:var(--muted)">Membangun produk yang memudahkan hidup pengguna dan membantu bisnis tumbuh.</p>
    </div>
    <div class="card">
      <h4 style="margin-top:0">Nilai</h4>
      <p style="color:var(--muted)">Keterbukaan, kualitas, dan fokus pada pelanggan.</p>
    </div>
    <div class="card">
      <h4 style="margin-top:0">Pendekatan</h4>
      <p style="color:var(--muted)">Iteratif: desain cepat, uji, dan perbaiki dengan data nyata.</p>
    </div>
  </div>

  <div style="display:flex;gap:1rem;align-items:center">
    <div class="card" style="flex:1">
      <h3 style="margin-top:0">Tim Kami</h3>
      <div style="display:flex;gap:1rem;align-items:center">
        <div style="width:56px;height:56px;border-radius:50%;background:linear-gradient(135deg,var(--accent),var(--accent-2));display:flex;align-items:center;justify-content:center;color:white;font-weight:700">RS</div>
        <div>
          <div style="font-weight:700">Rakha Santoso</div>
          <div style="color:var(--muted)">Founder & Lead Developer</div>
        </div>
      </div>
    </div>
    <div class="card" style="width:260px">
      <h4 style="margin-top:0">Bergabung</h4>
      <p style="color:var(--muted)">Kami selalu mencari talenta bersemangat. Kirimkan portofolio ke <a href="mailto:hello@webdev.com">hello@webdev.com</a>.</p>
    </div>
  </div>
</section>
@endsection
