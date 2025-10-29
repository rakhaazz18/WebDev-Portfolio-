@extends('layouts.app')

@section('title','About — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1rem;margin-top:-1rem">
  <div class="fade-in">
    <p style="color:rgba(255,255,255,0.8);max-width:70ch;line-height:1.8;font-size:1.05rem;margin-top:0">
      Hello! My name is <strong style="color:var(--gold)">Andi Muhammad Rakha Zulkarnain</strong>, you can call me <strong>Rakha</strong>. 
      I'm a 7th semester student who is active in organizations and activities. I want to improve my communication skills and speaking style 
      to make it easier to interact with new people and facilitate networking. I easily adapt to things I haven't mastered yet, 
      and I have responsibility and initiative.
    </p>
  </div>

  <!-- Contact Info -->
  <div class="card fade-in">
    <h3 class="section-title" style="margin:0 0 1.25rem 0;text-align:center">Contact Information</h3>
    <div style="display:flex;justify-content:center;gap:3rem;flex-wrap:wrap">
      <div style="display:flex;align-items:center;gap:1rem">
        <div style="width:48px;height:48px;border-radius:50%;background:rgba(212,175,55,0.2);display:flex;align-items:center;justify-content:center;color:var(--gold)">
          <i class="fas fa-phone" style="font-size:1.2rem"></i>
        </div>
        <div>
          <div style="color:var(--muted);font-size:0.85rem">Phone</div>
          <div style="font-weight:600">0821-9494-9464</div>
        </div>
      </div>
      
      <div style="display:flex;align-items:center;gap:1rem">
        <div style="width:48px;height:48px;border-radius:50%;background:rgba(212,175,55,0.2);display:flex;align-items:center;justify-content:center;color:var(--gold)">
          <i class="fas fa-envelope" style="font-size:1.2rem"></i>
        </div>
        <div>
          <div style="color:var(--muted);font-size:0.85rem">Email</div>
          <div style="font-weight:600;font-size:0.9rem">amuhammad08@student.ciputra.ac.id</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Education & Skills -->
  <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem">
    <div class="card fade-in">
      <h3 class="gold-hover" style="margin-top:0">🎓 Education</h3>
      <div style="display:flex;flex-direction:column;gap:1rem">
        <div>
          <div style="font-weight:700;color:var(--gold)">Universitas Ciputra Makassar</div>
          <div style="color:rgba(255,255,255,0.9);margin:0.25rem 0">Information and Technology (IMT)</div>
          <div style="color:var(--muted);font-size:0.9rem">Spesialisasi Fullstack Development</div>
          <div style="color:var(--muted);font-size:0.85rem;margin-top:0.25rem">2024 - 2028</div>
        </div>
      </div>
    </div>

    <div class="card fade-in">
      <h3 class="gold-hover" style="margin-top:0">💼 Skills</h3>
      <div style="display:flex;flex-wrap:wrap;gap:0.5rem">
        <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.4rem 0.8rem;border-radius:6px;font-size:0.9rem">Public Relations</span>
        <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.4rem 0.8rem;border-radius:6px;font-size:0.9rem">Teamwork</span>
        <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.4rem 0.8rem;border-radius:6px;font-size:0.9rem">Time Management</span>
        <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.4rem 0.8rem;border-radius:6px;font-size:0.9rem">Leadership</span>
        <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.4rem 0.8rem;border-radius:6px;font-size:0.9rem">Effective Communication</span>
      </div>
    </div>
  </div>

  <!-- Profile Card -->
  <div class="card fade-in" style="background:linear-gradient(135deg, rgba(212,175,55,0.1), rgba(0,0,0,0.3));border:2px solid rgba(212,175,55,0.3)">
    <div style="display:flex;gap:2rem;align-items:center;flex-wrap:wrap">
      <div style="width:120px;height:120px;border-radius:50%;overflow:hidden;border:4px solid rgba(212,175,55,0.5);background:#f5f5f5">
        <img src="{{ asset('images/rakha-profile.jpg') }}" alt="Rakha Profile" style="width:100%;height:100%;object-fit:cover;object-position:center center">
      </div>
      <div style="flex:1;min-width:250px">
        <h3 style="margin:0 0 0.5rem 0;font-size:1.5rem;color:var(--gold)">Andi Muhammad Rakha Zulkarnain</h3>
        <p style="margin:0 0 0.5rem 0;color:rgba(255,255,255,0.9);font-size:1.1rem">Fullstack Developer & Student Activist</p>
        <p style="margin:0;color:var(--muted);line-height:1.6">
          Active in campus organizations as Student Academic at ISU and Public Relations at GDG UC. 
          Experienced in managing events, sponsorships, and marketing for various campus events.
        </p>
        <div style="margin-top:1rem">
          <a href="/contact" class="btn-gold" style="display:inline-block;padding:0.6rem 1.5rem">Let's Connect</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
