@extends('layouts.app')

@push('head')
  <link rel="stylesheet" href="{{ asset('css/cv-style.css') }}">
@endpush

@push('scripts')
  <script src="{{ asset('js/cv-script.js') }}"></script>
@endpush

@section('title','Welcome — Rakha')

@section('content')
  <div class="hero-section fade-in">
    <h1>{{ $name ?? 'Andi Muhammad Rakha Zulkarnain' }}</h1>
    <p>Web Developer | Creative Thinker | Tech Enthusiast</p>
  </div>

  <section class="about-section card fade-in">
    <div style="display:flex;align-items:center;gap:2rem;flex-wrap:wrap;margin-bottom:2rem">
      <img src="{{ file_exists(public_path('images/rakha.png')) ? asset('images/rakha.png') : asset('images/rakhaplaceholder.svg') }}" alt="Profile Picture" class="profile-img">
      <div style="flex:1;min-width:300px">
        <h2 class="section-title-left">👋 Tentang Saya</h2>
        
        <!-- Social Media Icons -->
        <div style="display:flex;gap:1rem;margin-bottom:1.5rem;flex-wrap:wrap">
          <a href="https://www.instagram.com/rakhaazz/" target="_blank" rel="noopener noreferrer" class="social-icon" title="Instagram">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="https://www.linkedin.com/in/muhammad-rakha-11743633b" target="_blank" rel="noopener noreferrer" class="social-icon" title="LinkedIn">
            <i class="fab fa-linkedin-in"></i>
          </a>
          <a href="https://github.com/rakhaazz18" target="_blank" rel="noopener noreferrer" class="social-icon" title="GitHub">
            <i class="fab fa-github"></i>
          </a>
          <a href="https://web.facebook.com/rakhazz.rakhazz.7" target="_blank" rel="noopener noreferrer" class="social-icon" title="Facebook">
            <i class="fab fa-facebook-f"></i>
          </a>
        </div>
      </div>
    </div>

    <div class="about-container">
      <p style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        Halo, saya <strong style="color:var(--color-accent)">Muhammad Rakha</strong>, mahasiswa 
        <strong>semester 3 Program Studi Informatika di Universitas Ciputra Surabaya (Makassar)</strong>. 
        Saya punya ketertarikan besar pada dunia <strong>pengembangan web, desain antarmuka (UI/UX), dan teknologi interaktif</strong>. 
        Bagi saya, teknologi bukan cuma tentang logika dan fungsi, tapi juga tentang bagaimana membuat sesuatu terasa hidup, elegan, dan menyenangkan untuk digunakan ✨
      </p>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">💻 Minat dan Keahlian</h3>
      <ul style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Web Development ⚙️</strong> — Menggunakan Laravel (PHP) dan JavaScript untuk membangun website interaktif dengan struktur kode yang bersih dan efisien.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">UI/UX Design 🎨</strong> — Menciptakan tampilan elegan dan minimalis dengan gaya <em>white, black, and gold luxury</em>.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Pemrograman dan Database 🧠</strong> — Menerapkan konsep OOP (Java) dan memahami manajemen data menggunakan MySQL serta desain ERD.</li>
      </ul>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">🚀 Pengalaman Organisasi</h3>
      <ul style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Lead di Google Developer Groups on Campus (GDGoC) UC Makassar 👨‍💻</strong> — Memimpin tim untuk membangun komunitas teknologi kampus dan menyelenggarakan kegiatan edukatif.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Koordinator Event di Informatics Student Union (ISU) 🎯</strong> — Mengatur perencanaan dan pelaksanaan berbagai kegiatan mahasiswa Informatika.</li>
      </ul>

      <p style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        Melalui kegiatan tersebut, saya terus mengasah kemampuan <strong style="color:#111">leadership, komunikasi, dan kolaborasi lintas bidang</strong>, 
        yang juga saya terapkan dalam dunia pengembangan teknologi.
      </p>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">🌟 Visi</h3>
      <p style="color:var(--muted);line-height:1.8">
        Saya ingin terus berkembang sebagai <strong style="color:#111">developer dan desainer antarmuka</strong> yang mampu memadukan 
        <strong style="color:#111">teknologi, estetika, dan pengalaman pengguna</strong> dalam setiap karya yang saya buat. 
        Setiap proyek adalah ruang eksplorasi untuk belajar, berkreasi, dan meninggalkan kesan positif bagi siapa pun yang menggunakannya.
      </p>
    </div>
  </section>

  <section class="skills card fade-in">
    <h2 class="section-title">Keahlian</h2>
    <ul style="list-style:none;padding:0">
      <li class="gold-hover" style="padding:0.5rem 0">✨ HTML, CSS, JavaScript</li>
      <li class="gold-hover" style="padding:0.5rem 0">✨ PHP & Laravel</li>
      <li class="gold-hover" style="padding:0.5rem 0">✨ UI/UX dasar</li>
    </ul>
  </section>

@endsection
