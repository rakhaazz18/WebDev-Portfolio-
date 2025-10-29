@extends('layouts.app')

@section('title','Experience — Rakha')

@section('content')
<section style="display:flex;flex-direction:column;gap:1.5rem">
  <div class="fade-in">
    <h2 style="margin:0 0 0.5rem 0;font-size:2rem">Professional Experience</h2>
    <p style="color:rgba(255,255,255,0.8);max-width:70ch">
      My professional journey and work experience across various companies and roles.
    </p>
  </div>

  <!-- Experience Timeline -->
  <div class="card fade-in">
    <div style="display:flex;flex-direction:column;gap:2.5rem">
      @forelse($experiences as $experience)
      <div style="border-left:4px solid var(--gold);padding-left:1.5rem;position:relative">
        <!-- Timeline Dot -->
        <div style="position:absolute;left:-8px;top:0;width:12px;height:12px;background:var(--gold);border-radius:50%;border:3px solid #0a0a0a"></div>
        
        <!-- Header Section -->
        <div style="margin-bottom:1rem">
          <div style="display:flex;justify-content:space-between;align-items:start;gap:1rem;flex-wrap:wrap;margin-bottom:0.5rem">
            <h3 class="gold-hover" style="margin:0;font-size:1.25rem;flex:1;min-width:250px">{{ $experience->position }}</h3>
            <div style="text-align:right;white-space:nowrap">
              <span style="color:var(--gold);font-weight:600;font-size:0.9rem">
                {{ \Carbon\Carbon::parse($experience->start_date)->format('M Y') }} - 
                @if($experience->is_current)
                  <strong>Present</strong>
                @else
                  {{ \Carbon\Carbon::parse($experience->end_date)->format('M Y') }}
                @endif
              </span>
              @if($experience->is_current)
              <div style="margin-top:0.35rem">
                <span style="background:var(--gold);color:#000;padding:0.25rem 0.6rem;border-radius:4px;font-size:0.7rem;font-weight:bold">CURRENT</span>
              </div>
              @endif
            </div>
          </div>
          
          <!-- Company & Location -->
          <div style="display:flex;flex-direction:column;gap:0.25rem">
            <p style="margin:0;color:rgba(255,255,255,0.95);font-size:1rem;font-weight:600">
              {{ $experience->company }}
            </p>
            @if($experience->location)
            <p style="margin:0;color:var(--muted);font-size:0.9rem">
              📍 {{ $experience->location }}
            </p>
            @endif
          </div>
        </div>
        
        <!-- Description -->
        <p style="color:rgba(255,255,255,0.75);margin:0;line-height:1.8;font-size:0.95rem;text-align:justify">
          {{ $experience->description }}
        </p>
      </div>
      @empty
      <p style="color:var(--muted);text-align:center;padding:3rem 0">No experience data available.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection
