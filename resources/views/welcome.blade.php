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
        <h2 class="section-title-left">👋 About Me</h2>
        
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
        Hello, I'm <strong style="color:var(--color-accent)">Muhammad Rakha</strong>, a 
        <strong>3rd semester Informatics student at Universitas Ciputra Surabaya (Makassar)</strong>. 
        I have a great interest in <strong>web development, UI/UX design, and interactive technology</strong>. 
        For me, technology isn't just about logic and function, but also about making something feel alive, elegant, and enjoyable to use ✨
      </p>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">💻 Interests & Skills</h3>
      <ul style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Web Development ⚙️</strong> — Using Laravel (PHP) and JavaScript to build interactive websites with clean and efficient code structure.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">UI/UX Design 🎨</strong> — Creating elegant and minimalist interfaces with a <em>white, black, and gold luxury</em> style.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Programming & Database 🧠</strong> — Applying OOP concepts (Java) and understanding data management using MySQL and ERD design.</li>
      </ul>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">🚀 Organizational Experience</h3>
      <ul style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Lead at Google Developer Groups on Campus (GDGoC) UC Makassar 👨‍💻</strong> — Leading the team to build a campus technology community and organize educational activities.</li>
        <li style="margin-bottom:0.75rem"><strong style="color:#111">Event Coordinator at Informatics Student Union (ISU) 🎯</strong> — Managing the planning and execution of various Informatics student activities.</li>
      </ul>

      <p style="color:var(--muted);line-height:1.8;margin-bottom:1.5rem">
        Through these activities, I continuously develop my <strong style="color:#111">leadership, communication, and cross-field collaboration</strong> skills, 
        which I also apply in technology development.
      </p>

      <h3 class="gold-hover" style="font-size:1.3rem;margin-top:2rem;margin-bottom:1rem">🌟 Vision</h3>
      <p style="color:var(--muted);line-height:1.8">
        I want to continue growing as a <strong style="color:#111">developer and interface designer</strong> who can combine 
        <strong style="color:#111">technology, aesthetics, and user experience</strong> in every work I create. 
        Every project is an exploration space to learn, create, and leave a positive impression on anyone who uses it.
      </p>
    </div>
  </section>

  <section class="skills card fade-in">
    <h2 class="section-title">Skills</h2>
    <ul style="list-style:none;padding:0">
      <li class="gold-hover" style="padding:0.5rem 0">✨ HTML, CSS, JavaScript</li>
      <li class="gold-hover" style="padding:0.5rem 0">✨ PHP & Laravel</li>
      <li class="gold-hover" style="padding:0.5rem 0">✨ Basic UI/UX</li>
    </ul>
  </section>

@endsection
