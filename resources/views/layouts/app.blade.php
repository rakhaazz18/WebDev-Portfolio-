<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Rakha')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
      /* Small, self-contained styles to ensure an eye-catching look even without Tailwind */
      :root{--accent:#7c3aed;--accent-2:#06b6d4;--muted:#6b7280}
      body{font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;line-height:1.5;color:#111827;background:linear-gradient(180deg,#f8fafc,white)}
      .container{max-width:1100px;margin:0 auto;padding:2rem}
      nav a{color:var(--muted);text-decoration:none;padding:.5rem 1rem;border-radius:.375rem}
      nav a:hover{color:var(--accent)}
      .btn{display:inline-block;background:var(--accent);color:white;padding:.6rem 1rem;border-radius:.5rem;text-decoration:none;font-weight:600}
      .btn-ghost{background:transparent;border:2px solid rgba(124,58,237,.12);color:var(--accent)}
      .card{background:white;border-radius:.75rem;box-shadow:0 6px 18px rgba(17,24,39,.08);padding:1.25rem}
      .grid{display:grid;gap:1rem}
      @media(min-width:768px){.grid-cols-2{grid-template-columns:repeat(2,1fr)}.grid-cols-3{grid-template-columns:repeat(3,1fr)}}
    </style>
    @stack('head')
  </head>
  <body>
    <header style="border-bottom:1px solid rgba(17,24,39,.04);background:linear-gradient(90deg, rgba(255,255,255,.8), rgba(250,250,255,.6));backdrop-filter:blur(6px)">
      <div class="container" style="display:flex;align-items:center;justify-content:space-between">
        <a href="/" style="display:flex;align-items:center;gap:.6rem;text-decoration:none">
          <div style="width:42px;height:42px;border-radius:.6rem;background:linear-gradient(135deg,var(--accent),var(--accent-2));display:flex;align-items:center;justify-content:center;color:white;font-weight:700">RK</div>
          <div>
            <div style="font-weight:700">Rakha</div>
            <div style="font-size:.8rem;color:var(--muted);margin-top:2px">Creative web solutions</div>
          </div>
        </a>
        <nav>
          <a href="/">Welcome</a>
          <a href="/home">Home</a>
          <a href="/about">About</a>
          <a href="/blog">Blog</a>
          <a href="/contact">Contact</a>
        </nav>
      </div>
    </header>

    <main class="container" style="padding-top:2.25rem;padding-bottom:3rem">
      <div id="main-content" style="transition:opacity .35s ease, transform .35s ease">
        @yield('content')
      </div>
    </main>

    <footer style="border-top:1px solid rgba(17,24,39,.04);padding:2rem 0;background:transparent">
      <div class="container" style="display:flex;flex-direction:column;gap:1rem;align-items:center">
  <div style="color:var(--muted)">© {{ date('Y') }} Rakha — Built with care.</div>
        <div style="display:flex;gap:.5rem"><a class="btn-ghost" href="#">Privacy</a><a class="btn-ghost" href="#">Terms</a></div>
      </div>
    </footer>

    @stack('scripts')

    <script>
      // Minimal client-side navigation + page transition script
      (function(){
        const nav = document.querySelectorAll('nav a');
        const content = document.getElementById('main-content');

        function setActive(href){
          nav.forEach(a=>{
            a.style.color = a.getAttribute('href') === href ? 'var(--accent)' : 'var(--muted)';
            a.style.fontWeight = a.getAttribute('href') === href ? '700' : '400';
          });
        }

        async function fetchPage(href){
          try{
            const res = await fetch(href, {headers:{'X-Requested-With':'XMLHttpRequest'}});
            if(!res.ok) throw new Error('Network error');
            const text = await res.text();
            return text;
          }catch(e){
            return null;
          }
        }

        function extractContent(html){
          // crude extraction: find <main id="main-content"> or fallback to body inner
          const marker = '<div id="main-content"';
          const i = html.indexOf(marker);
          if(i>-1){
            const start = html.indexOf('>', i) + 1;
            const end = html.indexOf('\n</div>', start);
            if(end>-1) return html.slice(start, end);
          }
          // fallback: try to extract content between <main>...</main>
          const m1 = html.match(/<main[\s\S]*?>([\s\S]*?)<\/main>/i);
          return m1 ? m1[1] : html;
        }

        async function navigate(e){
          const a = e.currentTarget; const href = a.getAttribute('href');
          if(!href || href.indexOf('http')===0 || href.startsWith('#')) return;
          e.preventDefault();
          history.pushState(null,'',href);
          setActive(href);

          // animate out
          content.style.opacity = '0';
          content.style.transform = 'translateY(6px)';
          const html = await fetchPage(href);
          setTimeout(()=>{
            if(html){
              const newInner = extractContent(html);
              if(newInner) content.innerHTML = newInner;
            } else {
              // fallback full load
              window.location = href;
              return;
            }
            content.style.opacity = '1';
            content.style.transform = 'translateY(0)';
            // rebind form handlers (if any)
            bindContactForm();
          }, 260);
        }

        function bindNav(){
          nav.forEach(a=>a.addEventListener('click', navigate));
        }

        // Simple contact form AJAX binding
        function bindContactForm(){
          const form = document.querySelector('#contact-form');
          if(!form) return;
          form.addEventListener('submit', async function(ev){
            ev.preventDefault();
            const submit = form.querySelector('button[type=submit]');
            const data = new FormData(form);
            submit.disabled = true; submit.textContent = 'Mengirim...';
            const res = await fetch(form.action, {method:'POST', body:data, headers:{'X-Requested-With':'XMLHttpRequest','X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''}});
            submit.disabled = false; submit.textContent = 'Kirim Pesan';
            if(res && res.ok){
              const json = await res.json();
              const msg = form.querySelector('.form-message');
              msg.textContent = json.message || 'Terkirim — terima kasih!';
              msg.style.color = 'green';
              form.reset();
            } else {
              const msg = form.querySelector('.form-message');
              msg.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
              msg.style.color = 'red';
            }
          });
        }

        window.addEventListener('popstate', ()=>{
          // reload the page content when user uses back/forward
          location.reload();
        });

        // initial
        setActive(location.pathname);
        bindNav();
        bindContactForm();
      })();
    </script>
  </body>
</html>
