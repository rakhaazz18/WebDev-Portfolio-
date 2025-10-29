<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Rakha')</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}">
    <link rel="alternate icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/luxury-theme.css') }}">
    <style>
      /* Luxury Black White Gold Theme - No other colors allowed */
      :root{--accent:#d4af37;--accent-2:#e0c068;--muted:#666666;--border:#e0e0e0}
      body{font-family:'Poppins',ui-sans-serif,system-ui,-apple-system,"Segoe UI",Roboto,"Helvetica Neue",Arial;line-height:1.5;color:#111111;background:#ffffff}
      .container{max-width:1100px;margin:0 auto;padding:2rem}
      nav a{color:#666666;text-decoration:none;padding:.5rem 1rem;border-radius:.375rem;transition:color .3s ease}
      nav a:hover{color:#d4af37}
      .btn{display:inline-block;background:#d4af37;color:#1a1a1a;padding:.6rem 1rem;border-radius:.5rem;text-decoration:none;font-weight:600;transition:all .3s ease}
      .btn:hover{background:#1a1a1a;color:#d4af37}
      .btn-ghost{background:transparent;border:2px solid #d4af37;color:#d4af37;padding:.6rem 1rem;border-radius:.5rem;text-decoration:none;font-weight:600;transition:all .3s ease}
      .btn-ghost:hover{background:#d4af37;color:#1a1a1a}
      .card{background:white;border:1px solid #f0f0f0;border-radius:.75rem;box-shadow:0 4px 12px rgba(0,0,0,.06);padding:1.25rem}
      .grid{display:grid;gap:1rem}
      @media(min-width:768px){.grid-cols-2{grid-template-columns:repeat(2,1fr)}.grid-cols-3{grid-template-columns:repeat(3,1fr)}}
    </style>
    @stack('head')
  </head>
  <body>
    <header id="site-header" style="border-bottom:2px solid #d4af37;background:rgba(255,255,255,0.95);backdrop-filter:blur(8px);transition:all .28s ease">
      <div class="container" style="display:flex;align-items:center;justify-content:space-between">
        <a href="/" style="display:flex;align-items:center;gap:.6rem;text-decoration:none">
          <div style="width:42px;height:42px;border-radius:50%;overflow:hidden;border:2px solid #d4af37;background:#f5f5f5">
            <img src="{{ asset('images/rakha-profile.jpg') }}" alt="Rakha" style="width:100%;height:100%;object-fit:cover;object-position:center center">
          </div>
          <div>
            <div id="brand-full" style="font-weight:700;color:#111111">Rakha</div>
            <div id="brand-sub" style="font-size:.8rem;color:#666666;margin-top:2px">Figma Boyz</div>
          </div>
        </a>
        <nav>
          <a href="/">Welcome</a>
          <a href="/home">Home</a>
          <a href="/about">About</a>
          <a href="/experience">Experience</a>
          <a href="/projects">Projects</a>
          <a href="/contact">Contact</a>
        </nav>
      </div>
    </header>

    <main class="container" style="padding-top:2.25rem;padding-bottom:5rem">
      <div id="main-content" style="transition:opacity .35s ease, transform .35s ease">
        @yield('content')
      </div>
    </main>

    <footer style="border-top:1px solid rgba(17,24,39,.04);padding:2rem 0;background:transparent">
      <div class="container" style="display:flex;flex-direction:column;gap:1rem;align-items:center">
        <div style="display:flex;gap:.5rem"><a class="btn-ghost" href="#">Privacy</a><a class="btn-ghost" href="#">Terms</a></div>
        <div style="color:var(--muted);font-size:0.95rem;text-align:center">© {{ date('Y') }} Rakha — Yeahh.</div>
      </div>
    </footer>

    @stack('scripts')

    <script src="{{ asset('js/luxury-theme.js') }}"></script>

    <script>
      // Minimal client-side navigation + page transition script
      (function(){
        // Header scroll behaviour: compact header when user scrolls down,
        // restore full header when near top. Smooth animated transitions.
        const header = document.getElementById('site-header');
        let lastScroll = window.scrollY;
        let ticking = false;

        function onScroll(){
          const y = window.scrollY;
          if(!ticking){
            window.requestAnimationFrame(()=>{
              if(y > 80){
                header.classList.add('scrolled');
              } else {
                header.classList.remove('scrolled');
              }
              lastScroll = y;
              ticking = false;
            });
            ticking = true;
          }
        }

        // Add small CSS rules for the scrolled state
        const css = `
          #site-header.scrolled{padding:6px 0 !important;box-shadow:0 6px 20px rgba(2,6,23,0.08)}
          #site-header.scrolled .container{padding:0 0.75rem}
          #site-header.scrolled #brand-sub{opacity:0;transform:translateY(-6px);transition:opacity .18s, transform .18s}
          #site-header.scrolled #brand-full{font-size:0.95rem;transition:font-size .18s}
          #site-header{padding:1rem 0}
          #site-header .container{transition:padding .28s}
        `;
        const style = document.createElement('style'); style.appendChild(document.createTextNode(css)); document.head.appendChild(style);

        window.addEventListener('scroll', onScroll, {passive:true});

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
          if(!html || html.trim() === '') {
            console.error('Empty HTML received');
            return null;
          }
          
          try {
            // Parse the HTML string into a document
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            // Check for parser errors
            const parserError = doc.querySelector('parsererror');
            if(parserError) {
              console.error('Parser error:', parserError.textContent);
              return null;
            }
            
            // Try to find the main-content div
            const mainContent = doc.querySelector('#main-content');
            if(mainContent && mainContent.innerHTML.trim()){
              console.log('Found #main-content');
              return mainContent.innerHTML;
            }
            
            // Fallback: try to extract content between <main>...</main>
            const main = doc.querySelector('main');
            if(main){
              const innerContent = main.querySelector('#main-content');
              if(innerContent && innerContent.innerHTML.trim()){
                console.log('Found main > #main-content');
                return innerContent.innerHTML;
              }
              // Return main content without wrapper
              if(main.innerHTML.trim()){
                console.log('Found main element');
                // Extract just the content inside main, excluding the wrapper divs
                const contentDiv = main.querySelector('div[id="main-content"]');
                if(contentDiv){
                  return contentDiv.innerHTML;
                }
              }
            }
            
            console.error('Could not find content in expected locations');
            return null;
          } catch(e) {
            console.error('Error extracting content:', e);
            return null;
          }
        }

        async function navigate(e){
          const a = e.currentTarget; 
          const href = a.getAttribute('href');
          if(!href || href.indexOf('http')===0 || href.startsWith('#')) return;
          
          e.preventDefault();
          
          // Update URL and active state immediately
          history.pushState(null,'',href);
          setActive(href);

          // Animate out current content
          content.style.opacity = '0';
          content.style.transform = 'translateY(6px)';
          
          // Fetch new page content
          const html = await fetchPage(href);
          
          // Wait for animation to complete before updating content
          setTimeout(()=>{
            if(html){
              const newInner = extractContent(html);
              console.log('Extracted content length:', newInner ? newInner.length : 0);
              
              if(newInner && newInner.trim().length > 0){
                // Update content
                content.innerHTML = newInner;
                
                // Update page title
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newTitle = doc.querySelector('title');
                if(newTitle) document.title = newTitle.textContent;
                
                // Execute any inline scripts from the new content
                const scripts = content.querySelectorAll('script');
                scripts.forEach(oldScript => {
                  const newScript = document.createElement('script');
                  Array.from(oldScript.attributes).forEach(attr => {
                    newScript.setAttribute(attr.name, attr.value);
                  });
                  newScript.textContent = oldScript.textContent;
                  oldScript.parentNode.replaceChild(newScript, oldScript);
                });
                
                // Animate in new content
                content.style.opacity = '1';
                content.style.transform = 'translateY(0)';
                
                // Scroll to top smoothly
                window.scrollTo({top: 0, behavior: 'smooth'});
                
                // Re-initialize all animations and effects
                if (typeof window.initFadeInAnimation === 'function') {
                  window.initFadeInAnimation();
                }
                if (typeof window.initCursorEffect === 'function') {
                  window.initCursorEffect();
                }
                
                // Rebind form handlers (if any)
                bindContactForm();
              } else {
                console.error('No content extracted, falling back to full page load');
                window.location = href;
              }
            } else {
              console.error('Failed to fetch page, falling back to full page load');
              window.location = href;
            }
          }, 280);
        }

        function bindNav(){
          nav.forEach(a=>a.addEventListener('click', navigate));
        }

        // Simple contact form AJAX binding
        function bindContactForm(){
          const form = document.querySelector('#contact-form');
          if(!form) {
            console.log('No contact form found on this page');
            return;
          }
          
          // Remove existing listener if any
          const newForm = form.cloneNode(true);
          form.parentNode.replaceChild(newForm, form);
          
          newForm.addEventListener('submit', async function(ev){
            ev.preventDefault();
            const submit = newForm.querySelector('button[type=submit]');
            const data = new FormData(newForm);
            const originalText = submit.textContent;
            
            submit.disabled = true; 
            submit.textContent = 'Mengirim...';
            
            try {
              const res = await fetch(newForm.action, {
                method:'POST', 
                body:data, 
                headers:{
                  'X-Requested-With':'XMLHttpRequest',
                  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                }
              });
              
              submit.disabled = false; 
              submit.textContent = originalText;
              
              if(res && res.ok){
                const json = await res.json();
                let msg = newForm.querySelector('.form-message');
                if(!msg){
                  msg = document.createElement('div');
                  msg.className = 'form-message';
                  newForm.appendChild(msg);
                }
                msg.style.display = 'block';
                msg.style.marginTop = '1rem';
                msg.style.padding = '0.75rem';
                msg.style.borderRadius = '0.5rem';
                msg.style.fontWeight = '600';
                msg.textContent = json.message || 'Terkirim — terima kasih!';
                msg.style.color = '#10b981';
                msg.style.backgroundColor = '#d1fae5';
                newForm.reset();
              } else {
                throw new Error('Server error');
              }
            } catch(e) {
              submit.disabled = false; 
              submit.textContent = originalText;
              
              let msg = newForm.querySelector('.form-message');
              if(!msg){
                msg = document.createElement('div');
                msg.className = 'form-message';
                newForm.appendChild(msg);
              }
              msg.style.display = 'block';
              msg.style.marginTop = '1rem';
              msg.style.padding = '0.75rem';
              msg.style.borderRadius = '0.5rem';
              msg.style.fontWeight = '600';
              msg.textContent = 'Terjadi kesalahan. Silakan coba lagi.';
              msg.style.color = '#dc2626';
              msg.style.backgroundColor = '#fee2e2';
            }
          });
          
          console.log('Contact form bound successfully');
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
