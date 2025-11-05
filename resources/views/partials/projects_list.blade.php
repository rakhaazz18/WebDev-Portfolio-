@php
    /**
     * Usage: include this partial and pass $projects = \App\Models\Project::with('user','skills')->get();
     */
@endphp

@if($projects->isEmpty())
    <p style="color:var(--muted);text-align:center;padding:2rem 0">Tidak ada project.</p>
@else
    <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.25rem">
        @foreach($projects as $project)
        <article class="card fade-in" style="border:1px solid rgba(212,175,55,0.18);padding:1.15rem;border-radius:8px;display:flex;flex-direction:column;gap:0.6rem">
            <div style="display:flex;justify-content:space-between;align-items:start;gap:0.5rem">
                <h4 class="gold-hover" style="margin:0;font-size:1.05rem">{{ $project->title }}</h4>
                @if($project->is_featured)
                    <span style="background:var(--gold);color:#000;padding:0.25rem 0.5rem;border-radius:4px;font-size:0.75rem;font-weight:700">FEATURED</span>
                @endif
            </div>

            <div style="color:var(--muted);font-size:0.9rem">Owner: <strong style="color:var(--gold)">{{ $project->user->name ?? '—' }}</strong></div>

            <p style="margin:0;color:rgba(0,0,0,0.75);line-height:1.5">{{ \Illuminate\Support\Str::limit($project->description, 140) }}</p>

            @if($project->technologies && is_array($project->technologies))
            <div style="display:flex;flex-wrap:wrap;gap:0.4rem;margin-top:0.4rem">
                @foreach(array_slice($project->technologies, 0, 4) as $tech)
                <span style="background:rgba(212,175,55,0.12);color:var(--gold);padding:0.2rem 0.5rem;border-radius:4px;font-size:0.8rem">{{ $tech }}</span>
                @endforeach
            </div>
            @endif

            <div style="margin-top:0.5rem;display:flex;flex-wrap:wrap;gap:0.45rem;align-items:center">
                @foreach($project->skills as $skill)
                    <span style="background:rgba(0,0,0,0.06);color:rgba(0,0,0,0.8);padding:0.25rem 0.5rem;border-radius:999px;font-size:0.78rem">{{ $skill->name }}</span>
                @endforeach
            </div>

            <div style="margin-top:auto;display:flex;gap:0.6rem;align-items:center">
                @if($project->demo_url)
                    <a href="{{ $project->demo_url }}" target="_blank" style="color:var(--gold);text-decoration:none;font-weight:600">Live demo</a>
                @endif
                @if($project->github_url)
                    <a href="{{ $project->github_url }}" target="_blank" style="color:var(--muted);text-decoration:none">GitHub</a>
                @endif
                <a href="/projects" style="margin-left:auto;color:var(--gold);text-decoration:none;font-size:0.9rem">View all →</a>
            </div>
        </article>
        @endforeach
    </div>
@endif
