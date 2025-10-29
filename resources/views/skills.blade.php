@extends('layouts.app')

@section('title','Skills — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1.5rem">
  <div class="fade-in">
    <h2 style="margin:0 0 0.5rem 0;font-size:2rem">My Skills</h2>
    <p style="color:rgba(255,255,255,0.8);max-width:70ch">
      A comprehensive overview of my technical skills and proficiencies across various technologies and tools.
    </p>
  </div>

  <!-- Skills by Category -->
  @php
    $groupedSkills = $skills->groupBy('category');
  @endphp

  @foreach($groupedSkills as $category => $categorySkills)
  <div class="card fade-in">
    <h3 class="section-title" style="margin-bottom:1.25rem">{{ $category }}</h3>
    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:1rem">
      @foreach($categorySkills as $skill)
      <div style="padding:0.75rem">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:0.5rem">
          <h4 class="gold-hover" style="margin:0;font-size:1rem">{{ $skill->name }}</h4>
          <span style="color:var(--gold);font-weight:bold">{{ $skill->proficiency }}%</span>
        </div>
        
        <!-- Progress Bar -->
        <div style="background:rgba(255,255,255,0.1);height:8px;border-radius:4px;overflow:hidden">
          <div class="skill-progress" style="background:linear-gradient(90deg, var(--gold), #ffd700);height:100%;width:0;transition:width 0.3s ease" data-width="{{ $skill->proficiency }}"></div>
        </div>
        
        @if($skill->description)
        <p style="color:var(--muted);font-size:0.875rem;margin:0.5rem 0 0 0">{{ $skill->description }}</p>
        @endif
      </div>
      @endforeach
    </div>
  </div>
  @endforeach

  @if($skills->isEmpty())
  <div class="card fade-in">
    <p style="color:var(--muted);text-align:center;padding:2rem 0">No skills data available.</p>
  </div>
  @endif
</section>

@push('scripts')
<script>
// Animate skill progress bars
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.skill-progress').forEach(function(bar) {
    const width = bar.getAttribute('data-width');
    setTimeout(function() {
      bar.style.width = width + '%';
    }, 100);
  });
});
</script>
@endpush
@endsection
