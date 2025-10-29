@extends('layouts.app')

@section('title','Home — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1.5rem">
  <!-- Hero Section -->
  <div class="hero-section fade-in" style="text-align:center;padding:2rem 0">
    <h1 style="margin:0 0 1rem 0;font-size:2.5rem;background:linear-gradient(135deg, #d4af37, #ffd700);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text">
      Hi! I'm Rakha 👋
    </h1>
    <p style="color:rgba(255,255,255,0.9);max-width:80ch;margin:0 auto;font-size:1.15rem;line-height:1.8">
      A <strong style="color:var(--gold)">Developer and Web Designer</strong> who loves creating cool, functional, and user-friendly digital experiences.
      For me, technology isn't just about code, but also about how something can feel natural and help many people.
    </p>
    <div style="margin-top:1.5rem">
      <a class="btn-gold" href="/contact" style="margin-right:1rem">Let's Connect</a>
      <a href="/projects" style="color:var(--gold);text-decoration:none;padding:0.6rem 1.5rem;border:2px solid var(--gold);border-radius:0.5rem;display:inline-block;transition:all 0.3s">
        View Projects
      </a>
    </div>
  </div>

  <!-- Mission, Values, Approach -->
  <div class="grid grid-cols-3">
    <div class="card fade-in">
      <h3 style="margin-top:0;font-size:1.3rem;color:#1a1a1a">🎯 Mission</h3>
      <p style="color:rgba(0,0,0,0.75);line-height:1.7">
        Create digital experiences that make people's lives easier and more exciting. Whether through websites, interactive UI, or small products that boost productivity, I always want the results to have a real impact.
      </p>
    </div>
    <div class="card fade-in">
      <h3 style="margin-top:0;font-size:1.3rem;color:#1a1a1a">💎 Values</h3>
      <p style="color:rgba(0,0,0,0.75);line-height:1.7">
        Transparent, detail-oriented, and always curious to learn new things. I believe the best projects are born from open communication and relaxed yet focused collaboration.
      </p>
    </div>
    <div class="card fade-in">
      <h3 style="margin-top:0;font-size:1.3rem;color:#1a1a1a">🧭 Approach</h3>
      <p style="color:rgba(0,0,0,0.75);line-height:1.7">
        I love working with a <strong style="color:var(--gold)">build fast – learn faster</strong> style. Starting from raw ideas, creating prototypes, testing with users, then iterating until it feels just right.
      </p>
    </div>
  </div>

  <!-- About Me -->
  <div class="card fade-in" style="background:linear-gradient(135deg, rgba(212,175,55,0.15), rgba(240,240,240,0.95));border:2px solid rgba(212,175,55,0.3)">
    <div style="display:flex;gap:2rem;align-items:center;flex-wrap:wrap">
      <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;border:4px solid rgba(212,175,55,0.5);background:#f5f5f5">
        <img src="{{ asset('images/rakha-profile.jpg') }}" alt="Rakha Profile" style="width:100%;height:100%;object-fit:cover;object-position:center center">
      </div>
      <div style="flex:1;min-width:300px">
        <h3 style="margin:0 0 0.5rem 0;font-size:1.5rem;color:#1a1a1a">👨‍💻 About Me</h3>
        <p style="margin:0 0 0.5rem 0;color:var(--gold);font-size:1.1rem;font-weight:600">Muhammad Rakha</p>
        <p style="margin:0 0 0.75rem 0;color:rgba(0,0,0,0.6);font-style:italic">Web Developer & UI Enthusiast</p>
        <p style="margin:0;color:rgba(0,0,0,0.75);line-height:1.7">
          I love creating lively and interactive interfaces, from elegant designs to small animations that make users smile.
          Outside of coding, I usually explore new ideas, play music, or grab coffee while searching for inspiration for my next project ☕💡
        </p>
      </div>
    </div>
  </div>

  <!-- Collaboration -->
  <div class="card fade-in" style="text-align:center;background:rgba(255,250,240,0.95);border:2px solid rgba(212,175,55,0.3)">
    <h3 style="margin:0 0 1rem 0;font-size:1.5rem;color:#1a1a1a">🤝 Collaboration</h3>
    <p style="color:rgba(0,0,0,0.75);max-width:70ch;margin:0 auto 1.5rem auto;line-height:1.7;font-size:1.05rem">
      Have an interesting project idea or want to chat about web, design, or technology?<br>
      <strong style="color:var(--gold)">Let's connect!</strong>
    </p>
    <div style="margin-bottom:1rem">
      <a href="mailto:amuhammad08@student.ciputra.ac.id" style="color:var(--gold);text-decoration:none;font-size:1.1rem;font-weight:600">
        📩 amuhammad08@student.ciputra.ac.id
      </a>
    </div>
    <p style="color:rgba(0,0,0,0.65);margin:0;font-size:0.95rem">
      or find me on social media — always happy to meet creative people with the same passion 🚀
    </p>
  </div>

  <!-- Experience Section -->
  <div class="card fade-in" style="margin-top:2rem">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
      <h3 class="section-title" style="margin:0">Recent Experience</h3>
      <a href="/experience" style="color:var(--gold);text-decoration:none;font-size:0.9rem">View All →</a>
    </div>
    <div style="display:flex;flex-direction:column;gap:2rem">
      @forelse($experiences as $experience)
      <div style="border-left:3px solid var(--gold);padding-left:1.25rem">
        <!-- Header -->
        <div style="margin-bottom:0.75rem">
          <div style="display:flex;justify-content:space-between;align-items:start;gap:1rem;flex-wrap:wrap;margin-bottom:0.5rem">
            <h4 class="gold-hover" style="margin:0;font-size:1.1rem;flex:1;min-width:200px">{{ $experience->position }}</h4>
            <div style="text-align:right;white-space:nowrap">
              <span style="color:var(--gold);font-size:0.85rem;font-weight:600">
                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                @if($experience->is_current)
                  <strong>Present</strong>
                @else
                  {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                @endif
              </span>
              @if($experience->is_current)
              <div style="margin-top:0.25rem">
                <span style="background:var(--gold);color:#000;padding:0.2rem 0.5rem;border-radius:3px;font-size:0.65rem;font-weight:bold">CURRENT</span>
              </div>
              @endif
            </div>
          </div>
          
          <!-- Company & Location -->
          <div>
            <p style="margin:0;color:rgba(255,255,255,0.9);font-size:0.95rem;font-weight:600">
              {{ $experience->company }}
            </p>
            @if($experience->location)
            <p style="margin:0.15rem 0 0 0;color:var(--muted);font-size:0.85rem">
              📍 {{ $experience->location }}
            </p>
            @endif
          </div>
        </div>
        
        <!-- Description -->
        <p style="color:rgba(255,255,255,0.7);margin:0;line-height:1.6;font-size:0.9rem">
          {{ Str::limit($experience->description, 150) }}
        </p>
      </div>
      @empty
      <p style="color:var(--muted);text-align:center;padding:2rem 0">No experience data available.</p>
      @endforelse
    </div>
  </div>

  <!-- Top Skills Section -->
  <div class="card fade-in">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
      <h3 class="section-title" style="margin:0">Top Skills</h3>
      <a href="/skills" style="color:var(--gold);text-decoration:none;font-size:0.9rem">View All →</a>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:1.25rem">
      @forelse($skills as $skill)
      <div>
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem">
          <h4 class="gold-hover" style="margin:0;font-size:0.95rem">{{ $skill->name }}</h4>
          <span style="color:var(--gold);font-weight:bold;font-size:0.875rem">{{ $skill->proficiency }}%</span>
        </div>
        <div style="background:rgba(255,255,255,0.1);height:6px;border-radius:3px;overflow:hidden">
          <div class="skill-progress" style="background:var(--gold);height:100%;width:0;transition:width 0.3s ease" data-width="{{ $skill->proficiency }}"></div>
        </div>
        <p style="color:var(--muted);font-size:0.8rem;margin:0.25rem 0 0 0">{{ $skill->category }}</p>
      </div>
      @empty
      <p style="color:var(--muted);text-align:center;padding:2rem 0;grid-column:1/-1">No skills data available.</p>
      @endforelse
    </div>
  </div>

  <!-- Featured Projects Section -->
  <div class="card fade-in">
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1.5rem">
      <h3 class="section-title" style="margin:0">Featured Projects</h3>
      <a href="/projects" style="color:var(--gold);text-decoration:none;font-size:0.9rem">View All →</a>
    </div>
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem">
      @forelse($projects as $project)
      <div style="border:1px solid rgba(212,175,55,0.3);padding:1.25rem;border-radius:8px">
        <h4 class="gold-hover" style="margin:0 0 0.75rem 0;font-size:1.125rem">{{ $project->title }}</h4>
        <p style="color:rgba(255,255,255,0.7);margin-bottom:1rem;line-height:1.6">
          {{ Str::limit($project->description, 120) }}
        </p>
        @if($project->technologies && is_array($project->technologies))
        <div style="display:flex;flex-wrap:wrap;gap:0.5rem;margin-bottom:1rem">
          @foreach(array_slice($project->technologies, 0, 3) as $tech)
          <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.2rem 0.6rem;border-radius:4px;font-size:0.8rem">{{ $tech }}</span>
          @endforeach
        </div>
        @endif
        <a href="/projects" style="color:var(--gold);text-decoration:none;font-size:0.9rem">Learn More →</a>
      </div>
      @empty
      <p style="color:var(--muted);text-align:center;padding:2rem 0;grid-column:1/-1">No featured projects available.</p>
      @endforelse
    </div>
  </div>
</section>

@push('scripts')
<script>
// Animate skill progress bars
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.skill-progress').forEach(function(bar) {
    const width = bar.getAttribute('data-width');
    bar.style.width = width + '%';
  });
});
</script>
@endpush
@endsection
