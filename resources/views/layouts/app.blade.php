<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Portal Berita Terkini">
    <title>Portal Berita - @yield('title')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        :root {
            --primary-color: #000000;
            --secondary-color: #ffffff;
            --accent-color: #ff4757;
            --highlight-color: #fffa65;
            --shadow-color: 4px 4px 0px 0px var(--primary-color);
            --border-thick: 3px solid var(--primary-color);
        }
        
        body {
            padding-top: 70px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
            font-family: 'Courier New', monospace;
        }
        
        /* Neo Brutalism Typography */
        h1, h2, h3, h4, h5, h6 {
            font-weight: 800;
            letter-spacing: -0.05em;
            text-transform: uppercase;
        }
        
        .navbar {
            background-color: var(--secondary-color) !important;
            border-bottom: var(--border-thick);
            box-shadow: var(--shadow-color);
        }
        
        .navbar-brand {
            font-weight: 900;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }
        
        .nav-link {
            font-weight: 700;
            color: var(--primary-color) !important;
            padding: 0.5rem 1rem;
            margin: 0 0.2rem;
            border: 2px solid transparent;
            transition: all 0.2s;
        }
        
        .nav-link:hover, .nav-link:focus {
            color: var(--primary-color) !important;
            border-bottom: 2px solid var(--primary-color);
            background-color: transparent;
        }
        
        .nav-link.active {
            background-color: var(--primary-color) !important;
            color: var(--secondary-color) !important;
            box-shadow: var(--shadow-color);
        }
        
        .btn {
            font-weight: 700;
            border: var(--border-thick);
            box-shadow: var(--shadow-color);
            transition: all 0.2s;
            border-radius: 0 !important;
            padding: 0.5rem 1.5rem;
        }
        
        .btn:hover {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px 0px var(--primary-color);
        }
        
        .btn-primary {
            background-color: var(--accent-color) !important;
            color: var(--secondary-color) !important;
        }
        
        .btn-outline-light {
            background-color: transparent !important;
            color: var(--primary-color) !important;
            border-color: var(--primary-color) !important;
        }
        
        .btn-outline-light:hover {
            background-color: var(--primary-color) !important;
            color: var(--secondary-color) !important;
        }
        
        .card {
            border: var(--border-thick);
            box-shadow: var(--shadow-color);
            transition: all 0.2s;
            border-radius: 0 !important;
            background-color: var(--secondary-color);
            margin-bottom: 2rem;
        }
        
        .card:hover {
            transform: translate(4px, 4px);
            box-shadow: 0px 0px 0px 0px var(--primary-color);
        }
        
        .article-image {
            height: 200px;
            object-fit: cover;
            border-bottom: var(--border-thick);
        }
        
        .dropdown-menu {
            border: var(--border-thick);
            box-shadow: var(--shadow-color);
            border-radius: 0 !important;
        }
        
        .dropdown-item {
            font-weight: 600;
        }
        
        .dropdown-item:hover, .dropdown-item:focus {
            background-color: var(--highlight-color);
            color: var(--primary-color);
        }
        
        .alert {
            border: var(--border-thick);
            box-shadow: var(--shadow-color);
            border-radius: 0 !important;
            font-weight: 600;
        }
        
        .alert-success {
            background-color: #55efc4;
            color: var(--primary-color);
        }
        
        .alert-danger {
            background-color: #ff7675;
            color: var(--primary-color);
        }
        
        footer {
            background-color: var(--primary-color);
            color: var(--secondary-color);
            border-top: var(--border-thick);
            box-shadow: 0 -4px 0px 0px var(--primary-color);
        }
        
        footer a {
            color: var(--highlight-color);
            text-decoration: none;
            font-weight: 600;
        }
        
        footer a:hover {
            text-decoration: underline;
        }
        
        /* Hero Section Neo Brutalism */
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('https://source.unsplash.com/random/1200x400/?news');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 40px;
            border: var(--border-thick);
            box-shadow: var(--shadow-color);
            position: relative;
        }
        
        .hero-section::after {
            content: "";
            position: absolute;
            top: 8px;
            left: 8px;
            right: -8px;
            bottom: -8px;
            border: var(--border-thick);
            z-index: -1;
        }
        
        /* Form Elements */
        .form-control, .form-select {
            border: var(--border-thick);
            border-radius: 0 !important;
            padding: 0.75rem 1rem;
            font-weight: 600;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(0, 0, 0, 0.25);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('berita.index') }}">
                <i class="bi bi-newspaper me-2"></i>
                <span>PORTAL BERITA</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('berita.index') }}">
                            <i class="bi bi-house-door me-1"></i> BERANDA
                        </a>
                    </li>
                </ul>
                
                <ul class="navbar-nav ms-auto">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-light me-2" href="{{ route('berita.create') }}">
                                    <i class="bi bi-plus-circle me-1"></i> BUAT BERITA
                                </a>
                            </li>
                        @endif
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                <div class="me-2 d-none d-sm-inline">{{ strtoupper(Auth::user()->name) }}</div>
                                <i class="bi bi-person-circle fs-5"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person me-2"></i> PROFIL
                                    </a>
                                </li>
                                @if(auth()->user()->role === 'admin')
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bi bi-gear me-2"></i> ADMIN PANEL
                                        </a>
                                    </li>
                                @endif
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i> LOGOUT
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i> LOGIN
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i> REGISTER
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                <div>
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                <div>
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        
        @yield('content')
    </main>

    <footer class="py-4 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <h5>TENTANG KAMI</h5>
                    <p>Portal berita terkini yang menyajikan informasi akurat dan ngawuwor loh cik.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>KONTAK</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-envelope me-2"></i> INFO@PORTALBERITA.COM</li>
                        <li><i class="bi bi-telephone me-2"></i> +62 123 4567 890</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>SOSIAL MEDIA</h5>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="" class="text-white"><i class="bi bi-twitter fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
                    </div>
                </div>
            </div>
            <hr class="my-4 bg-secondary">
            <div class="text-center">
                <p class="mb-0">&copy; Punya Paill x Deepsek</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Scripts -->
    <script>
        // Enable tooltips
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
            
            // Enable popovers
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>