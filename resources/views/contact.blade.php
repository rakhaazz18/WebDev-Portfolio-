@extends('layouts.app')

@section('title','Kontak — Rakha')

@section('content')
<div style="display:flex;flex-direction:column;gap:1rem">
  <section class="card" style="display:flex;flex-direction:column;gap:1rem">
    <div style="display:flex;justify-content:space-between;align-items:center;gap:1rem;flex-wrap:wrap">
      <div>
        <h2 style="margin:0;font-size:1.6rem">Hubungi Kami</h2>
        <p style="color:var(--muted);margin-top:.25rem">Punya ide atau butuh bantuan teknis? Kirim pesan dan tim kami akan merespons dalam 1-2 hari kerja.</p>
      </div>
      <div style="display:flex;gap:.5rem">
        <a href="/" class="btn-ghost">Kembali</a>
        <a href="/home" class="btn">Lihat Layanan</a>
      </div>
    </div>
  </section>

  <div class="grid grid-cols-2">
    <div class="card" style="display:flex;flex-direction:column;gap:1rem">
      <div style="display:flex;gap:1rem;align-items:center">
        <div style="width:56px;height:56px;border-radius:.5rem;background:linear-gradient(135deg,var(--accent),var(--accent-2));display:flex;align-items:center;justify-content:center;color:white;font-weight:700">EN</div>
        <div>
          <div style="font-weight:700">Email &amp; Support</div>
          <div style="color:var(--muted)">hello@webdev-buelza.id<br/>support@webdev-buelza.id</div>
        </div>
      </div>

      <div style="display:flex;gap:1rem;flex-wrap:wrap">
        <div style="flex:1;min-width:180px">
          <strong>Jam Kerja</strong>
          <div style="color:var(--muted)">Sen–Jum 09:00–17:00</div>
        </div>
        <div style="flex:1;min-width:180px">
          <strong>Telepon</strong>
          <div style="color:var(--muted)">+62 812-3456-7890</div>
        </div>
      </div>

      <div>
        <strong>Akun Sosial</strong>
        <div style="display:flex;gap:.5rem;margin-top:.5rem">
          <a class="btn-ghost" href="#">Twitter</a>
          <a class="btn-ghost" href="#">LinkedIn</a>
          <a class="btn-ghost" href="#">GitHub</a>
        </div>
      </div>
    </div>

    <div class="card" style="position:relative">
      <form id="contact-form" action="/contact-send" method="POST" style="display:flex;flex-direction:column;gap:.75rem">
        @csrf
        <label style="display:flex;flex-direction:column">
          <span style="font-weight:600">Nama</span>
          <input name="name" required type="text" placeholder="Nama kamu" style="padding:.6rem;border-radius:.5rem;border:1px solid #e6e9ee" />
        </label>

        <label style="display:flex;flex-direction:column">
          <span style="font-weight:600">Email</span>
          <input name="email" required type="email" placeholder="email@contoh.com" style="padding:.6rem;border-radius:.5rem;border:1px solid #e6e9ee" />
        </label>

        <label style="display:flex;flex-direction:column">
          <span style="font-weight:600">Topik</span>
          <select name="topic" style="padding:.6rem;border-radius:.5rem;border:1px solid #e6e9ee">
            <option value="general">Umum / Pertanyaan</option>
            <option value="quote">Permintaan Penawaran</option>
            <option value="support">Dukungan Teknis</option>
            <option value="other">Lainnya</option>
          </select>
        </label>

        <label style="display:flex;flex-direction:column">
          <span style="font-weight:600">Pesan</span>
          <textarea name="message" required rows="5" placeholder="Ceritakan kebutuhan atau pertanyaanmu" style="padding:.6rem;border-radius:.5rem;border:1px solid #e6e9ee"></textarea>
        </label>

        <div style="display:flex;justify-content:space-between;align-items:center">
          <div class="form-message" style="color:var(--muted)"></div>
          <button type="submit" class="btn">Kirim Pesan</button>
        </div>
      </form>

      <div style="position:absolute;right:1rem;top:1rem;color:var(--muted);font-size:.85rem">Fast reply &amp; friendly :)</div>
    </div>
  </div>

  <div class="card" style="margin-top:1rem">
    <h3 style="margin:0 0 .5rem 0">Lokasi Kantor</h3>
    <div style="height:220px;background:linear-gradient(135deg,rgba(124,58,237,.06),rgba(6,182,212,.03));display:flex;align-items:center;justify-content:center;border-radius:.5rem;color:var(--muted)">Peta / Embed (placeholder)</div>
  </div>
  
</div>

@endsection
