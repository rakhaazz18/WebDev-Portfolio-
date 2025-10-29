@extends('layouts.app')

@section('title','Projects — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1.5rem">
  <div class="fade-in">
    <h2 style="margin:0 0 0.5rem 0;font-size:2rem">My Projects</h2>
    <p style="color:rgba(255,255,255,0.8);max-width:70ch">
      A showcase of my recent work and projects that demonstrate my skills and expertise.
    </p>
  </div>

  <!-- Projects Grid -->
  <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(350px,1fr));gap:1.5rem">
    @forelse($projects as $project)
    <div class="card fade-in" style="display:flex;flex-direction:column">
      @if($project->image_url)
      @php
        $imageFile = basename($project->image_url);
        // Adjust position for specific photos to show people clearly
        if ($imageFile === 'google-roadshow.jpg') {
            $objectPosition = 'center 55%';
            $height = '280px';
        } elseif ($imageFile === 'devfest.jpg') {
            $objectPosition = 'center 60%';
            $height = '280px';
        } else {
            $objectPosition = 'center center';
            $height = '240px';
        }
      @endphp
      <div style="width:100%;height:240px;background:linear-gradient(135deg, rgba(212,175,55,0.2), rgba(0,0,0,0.3));border-radius:8px;margin-bottom:1rem;overflow:hidden">
        <img src="{{ $project->image_url }}" 
             alt="{{ $project->title }}" 
             data-object-position="{{ $objectPosition }}"
             data-height="{{ $height }}"
             style="width:100%;height:100%;object-fit:cover">
      </div>
      @endif
      
      <div style="flex:1">
        <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:0.75rem">
          <h3 class="gold-hover" style="margin:0;font-size:1.25rem">{{ $project->title }}</h3>
          @if($project->is_featured)
          <span style="background:var(--gold);color:#000;padding:0.25rem 0.5rem;border-radius:4px;font-size:0.75rem;font-weight:bold">Featured</span>
          @endif
        </div>
        
        <p style="color:rgba(255,255,255,0.7);margin-bottom:1rem;line-height:1.6">
          {{ $project->description }}
        </p>
        
        <!-- Technologies -->
        @if($project->technologies && is_array($project->technologies))
        <div style="margin-bottom:1rem">
          <div style="display:flex;flex-wrap:wrap;gap:0.5rem">
            @foreach($project->technologies as $tech)
            <span style="background:rgba(212,175,55,0.2);color:var(--gold);padding:0.25rem 0.75rem;border-radius:4px;font-size:0.875rem">{{ $tech }}</span>
            @endforeach
          </div>
        </div>
        @endif
        
        <!-- Links -->
        <div style="display:flex;gap:1rem;margin-top:auto">
          @if($project->demo_url)
          <a href="{{ $project->demo_url }}" target="_blank" class="btn-gold" style="font-size:0.875rem;padding:0.5rem 1rem">View Demo</a>
          @endif
          @if($project->github_url)
          <a href="{{ $project->github_url }}" target="_blank" style="color:var(--gold);text-decoration:none;padding:0.5rem 1rem;border:1px solid var(--gold);border-radius:4px;font-size:0.875rem;transition:all 0.3s">GitHub</a>
          @endif
        </div>
        
        @if($project->completed_date)
        <p style="color:var(--muted);font-size:0.875rem;margin-top:1rem">
          Completed: {{ $project->completed_date->format('M Y') }}
        </p>
        @endif
      </div>
    </div>
    @empty
    <div class="card fade-in" style="grid-column: 1 / -1">
      <p style="color:var(--muted);text-align:center;padding:2rem 0">No projects available.</p>
    </div>
    @endforelse
  </div>
</section>

<script>
// Set object-position and height for project images
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('[data-object-position]').forEach(function(img) {
    const position = img.getAttribute('data-object-position');
    const height = img.getAttribute('data-height');
    if (position) {
      img.style.objectPosition = position;
    }
    if (height && img.parentElement) {
      img.parentElement.style.height = height;
    }
  });
});
</script>
@endsection
