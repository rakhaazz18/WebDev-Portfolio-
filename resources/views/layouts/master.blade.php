<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Website')</title>
    
    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        /* Navbar Styles */
        .navbar-custom {
            background-color: #d4af37;
            padding: 1rem 2rem;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar-custom a {
            color: #1a1a1a;
            text-decoration: none;
            margin: 0 1rem;
            font-weight: 600;
            transition: color 0.3s;
        }
        
        .navbar-custom a:hover {
            color: #ffffff;
        }
        
        /* Footer Styles */
        .footer-custom {
            background-color: #1a1a1a;
            color: #d4af37;
            padding: 2rem;
            text-align: center;
            margin-top: 3rem;
        }
        
        /* Content Area */
        .content-area {
            min-height: 70vh;
            padding: 2rem;
        }
    </style>
    
    <!-- Custom CSS dari child pages -->
    @stack('styles')
</head>
<body>
    
    <!-- NAVBAR/TOOLBAR - Ditulis SEKALI, dipakai SEMUA halaman -->
    <nav class="navbar-custom">
        <div class="container">
            <a href="/" class="brand">🏠 MyWebsite</a>
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/services">Services</a>
            <a href="/portfolio">Portfolio</a>
            <a href="/contact">Contact</a>
        </div>
    </nav>
    
    <!-- MAIN CONTENT - Konten dari child pages akan muncul di sini -->
    <main class="content-area">
        @yield('content')
    </main>
    
    <!-- FOOTER - Ditulis SEKALI, dipakai SEMUA halaman -->
    <footer class="footer-custom">
        <p>&copy; {{ date('Y') }} MyWebsite. All rights reserved.</p>
        <p>Created by: Rakha</p>
    </footer>
    
    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts dari child pages -->
    @stack('scripts')
</body>
</html>
