<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        cream: '#faf6f2',
                        coffee: {
                            50: '#faf6f2',
                            100: '#f0e6dc',
                            200: '#e8ddd2',
                            300: '#d7c4b3',
                            400: '#b89b83',
                            500: '#8d6e63',
                            600: '#6d4c41',
                            700: '#5d4037',
                            800: '#3e2723',
                            900: '#2b1b16',
                        },
                        accent: {
                            500: '#a0522d',
                            600: '#8b4513',
                        }
                    },
                    boxShadow: {
                        'soft': '0 1px 3px rgba(62, 39, 35, 0.06), 0 1px 2px rgba(62, 39, 35, 0.04)',
                        'card': '0 4px 12px rgba(62, 39, 35, 0.08)',
                    }
                }
            }
        }
    </script>
    <style>
        :root {
            color-scheme: light;
            --page-bg: #faf6f2;
            --surface: #ffffff;
            --ink: #2b1b16;
            --coffee: #3e2723;
            --coffee-mid: #6d4c41;
            --coffee-muted: #8d6e63;
            --line: #e8ddd2;
            --accent: #a0522d;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            background: var(--page-bg);
            color: var(--ink);
        }

        ::selection {
            color: #fff;
            background: var(--coffee-mid);
        }

        a,
        button,
        input,
        select {
            transition: color 180ms ease, background-color 180ms ease, border-color 180ms ease, box-shadow 180ms ease, transform 180ms ease;
        }

        :focus-visible {
            outline: 3px solid rgba(160, 82, 45, 0.35);
            outline-offset: 2px;
        }

        .site-nav-inner {
            max-width: 80rem;
            gap: 1.25rem;
        }

        .site-nav-links {
            min-width: 0;
            overflow-x: auto;
            scrollbar-width: none;
        }

        .site-nav-links::-webkit-scrollbar {
            display: none;
        }

        .app-main {
            max-width: 80rem;
            padding-top: 2.5rem;
            padding-bottom: 3.5rem;
        }

        .page-shell {
            width: 100%;
            max-width: 80rem;
            margin-inline: auto;
        }

        .page-heading {
            margin-bottom: 2rem;
        }

        .page-heading h1 {
            color: var(--coffee);
            font-size: 2rem;
            font-weight: 750;
            line-height: 1.15;
        }

        .page-heading p {
            max-width: 46rem;
            margin-top: 0.5rem;
            color: var(--coffee-muted);
            font-size: 1rem;
            line-height: 1.65;
        }

        .image-banner {
            display: grid;
            grid-template-columns: minmax(0, 1.25fr) minmax(16rem, 0.75fr);
            overflow: hidden;
            margin-bottom: 2rem;
            border: 1px solid rgba(232, 221, 210, 0.8);
            border-radius: 0.875rem;
            background: var(--coffee);
            box-shadow: 0 8px 24px rgba(62, 39, 35, 0.12);
            color: #fff;
        }

        .image-banner--contained {
            margin: 0;
            border: 0;
            border-radius: 0;
            box-shadow: none;
        }

        .image-banner-copy {
            align-self: center;
            padding: 2.25rem;
        }

        .image-banner-copy h1 {
            margin-top: 0.5rem;
            color: #fff;
            font-size: 2rem;
            font-weight: 750;
            line-height: 1.15;
        }

        .image-banner-copy p {
            max-width: 42rem;
            margin-top: 0.75rem;
            color: rgba(255, 255, 255, 0.88);
            font-size: 1rem;
            line-height: 1.7;
        }

        .image-banner-media {
            min-height: 15rem;
            overflow: hidden;
        }

        .image-banner-media img,
        .account-photo img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .image-banner-media img {
            min-height: 15rem;
        }

        .account-photo {
            height: 10rem;
            overflow: hidden;
            margin-bottom: 1rem;
            border: 1px solid var(--line);
            border-radius: 0.75rem;
        }

        .surface-panel {
            border: 1px solid var(--line);
            border-radius: 0.75rem;
            background: var(--surface);
            box-shadow: 0 4px 16px rgba(62, 39, 35, 0.06);
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 2.9rem;
            border: 1px solid #d7c4b3;
            border-radius: 0.5rem;
            background: #fff;
            padding: 0.7rem 0.85rem;
            color: var(--ink);
        }

        .form-control:focus {
            border-color: var(--coffee-mid);
            box-shadow: 0 0 0 3px rgba(109, 76, 65, 0.12);
            outline: none;
        }

        .form-label {
            display: block;
            margin-bottom: 0.45rem;
            color: var(--coffee);
            font-size: 0.9rem;
            font-weight: 650;
        }

        .table-scroll {
            overflow-x: auto;
            border: 1px solid var(--line);
            border-radius: 0.75rem;
            background: #fff;
            box-shadow: 0 4px 16px rgba(62, 39, 35, 0.05);
        }

        .data-table {
            width: 100%;
            min-width: 38rem;
            border-collapse: collapse;
            text-align: left;
        }

        .data-table thead {
            background: #f5eee8;
        }

        .data-table th {
            padding: 1rem 1.25rem;
            color: var(--coffee-mid);
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }

        .data-table td {
            padding: 1rem 1.25rem;
            border-top: 1px solid #f0e6dc;
            color: #51403a;
            font-size: 0.95rem;
            vertical-align: middle;
        }

        .data-table tbody tr:hover {
            background: #fcfaf8;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            min-height: 2.75rem;
            border: 1px solid var(--coffee-mid);
            border-radius: 0.5rem;
            background: var(--coffee-mid);
            padding: 0.65rem 1rem;
            color: #fff;
            font-size: 0.92rem;
            font-weight: 650;
        }

        .btn-primary:hover {
            transform: translateY(-1px);
            border-color: var(--coffee);
            background: var(--coffee);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 2.75rem;
            border: 1px solid var(--line);
            border-radius: 0.5rem;
            background: #fff;
            padding: 0.65rem 1rem;
            color: var(--coffee-mid);
            font-size: 0.92rem;
            font-weight: 600;
        }

        .btn-secondary:hover {
            border-color: var(--coffee-muted);
            background: #faf6f2;
        }

        @media (max-width: 640px) {
            .site-nav-inner {
                min-height: 4.5rem;
                padding-inline: 1rem;
            }

            .site-nav-links {
                gap: 0.15rem;
            }

            .app-main {
                padding: 1.5rem 1rem 2.5rem;
            }

            .page-heading {
                margin-bottom: 1.5rem;
            }

            .page-heading h1 {
                font-size: 1.75rem;
            }

            .image-banner {
                grid-template-columns: 1fr;
                margin-bottom: 1.5rem;
            }

            .image-banner-media {
                min-height: 11rem;
                grid-row: 1;
            }

            .image-banner-media img {
                min-height: 11rem;
                max-height: 11rem;
            }

            .image-banner-copy {
                padding: 1.5rem;
            }

            .image-banner-copy h1 {
                font-size: 1.75rem;
            }

            .account-photo {
                height: 8rem;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="bg-cream font-sans text-coffee-800 flex flex-col min-h-screen antialiased">

    <!-- Top Navbar -->
    <nav aria-label="Main navigation" class="bg-white/95 backdrop-blur-sm sticky top-0 z-50 border-b border-coffee-200 shadow-soft">
        <div class="site-nav-inner mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5 font-bold text-lg text-coffee-700 hover:text-coffee-800 transition-colors">
                <img 
                    src="{{ asset('assets/img/logo.png') }}" 
                    alt="Student Management Logo" 
                    class="h-9 w-9 object-contain rounded-lg transition-transform hover:scale-105"
                >
                <span>Student Management</span>
            </a>
            
            <div class="site-nav-links flex items-center gap-1 text-sm font-medium">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Dashboard</a>
                    <a href="{{ route('courses.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Courses</a>
                    
                    @if(auth()->user()->role === 'Student')
                        <a href="{{ route('registrations.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">My Registrations</a>
                    @endif

                    @if(auth()->user()->role === 'Administrator')
                        <a href="{{ route('registrations.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Registrations</a>
                        <a href="{{ route('students.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Students</a>
                        <a href="{{ route('users.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Users</a>
                    @endif

                    <div class="border-l border-coffee-200 pl-4 ml-3 flex items-center gap-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-coffee-500 to-coffee-700 text-white flex items-center justify-center text-xs font-bold shadow-soft">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                            <span class="font-semibold text-coffee-800 hidden sm:inline">{{ auth()->user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="px-3 py-1.5 text-xs font-semibold rounded-lg text-accent-500 border border-coffee-200 hover:bg-accent-500 hover:text-white hover:border-accent-500 transition-all">
                                Logout
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="app-main flex-grow w-full mx-auto px-6">
        
        <!-- Success Message -->
        @if(session('success'))
            <div class="flex items-start gap-3 bg-green-50 text-green-800 p-4 rounded-xl mb-6 text-sm border border-green-200 shadow-soft" role="alert">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="flex items-start gap-3 bg-red-50 text-red-800 p-4 rounded-xl mb-6 text-sm border border-red-200 shadow-soft" role="alert">
                <svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-white border-t border-coffee-200 py-5 text-center text-sm text-coffee-500">
        &copy; {{ date('Y') }} Student Management System · All rights reserved.
    </footer>

</body>
</html>
