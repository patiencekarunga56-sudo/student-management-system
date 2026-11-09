<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Pending Approval | Student Management System</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logo.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            200: '#e5d2cb',
                            500: '#8b5a2b',
                            600: '#6b4423',
                            700: '#4a2c14',
                            800: '#35200e'
                        },
                        gold: {
                            400: '#fbbf24',
                            500: '#f59e0b',
                            600: '#d97706'
                        },
                    },
                    fontFamily: { sans: ['Inter', 'system-ui', '-apple-system', 'sans-serif'] },
                }
            }
        };
    </script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        html { scroll-behavior: smooth; }

        .glow-brown { box-shadow: 0 0 20px rgba(107, 68, 35, 0.4); }

        .pending-bg { isolation: isolate; background: #35200e; }

        .pending-bg-img,
        .pending-bg-shade {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .pending-bg-img {
            z-index: -2;
            object-fit: cover;
            filter: saturate(1.1) contrast(1.05);
            animation: slow-zoom 18s ease-in-out infinite alternate;
        }

        .pending-bg-shade {
            z-index: -1;
            background: linear-gradient(160deg, rgba(53, 32, 14, 0.9) 0%, rgba(74, 44, 20, 0.72) 55%, rgba(53, 32, 14, 0.55) 100%);
        }

        .pending-card { animation: rise-in 750ms both; }

        .step { animation: rise-in 600ms both; }
        .step:nth-child(1) { animation-delay: 350ms; }
        .step:nth-child(2) { animation-delay: 480ms; }
        .step:nth-child(3) { animation-delay: 610ms; }

        .clock-spin { animation: clock-tick 6s linear infinite; transform-origin: center; }

        @keyframes rise-in {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slow-zoom {
            from { transform: scale(1); }
            to { transform: scale(1.08); }
        }

        @keyframes clock-tick {
            0%, 90% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="bg-brand-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col">

    <!-- Start: Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="flex items-center gap-3">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Makerere University Business School logo" class="h-14 w-14 object-contain">
                    <div class="hidden sm:block">
                        <p class="text-base font-bold text-brand-700 leading-tight">Student Management</p>
                        <p class="text-xs text-brand-500">Courses and registrations</p>
                    </div>
                </a>

                <!-- Desktop navigation -->
                <nav class="hidden md:flex items-center gap-8" aria-label="Main navigation">
                    <a href="{{ url('/') }}" class="text-brand-500 hover:text-brand-700 transition-colors text-base font-medium">Home</a>
                    <a href="{{ url('/') }}#who" class="text-brand-500 hover:text-brand-700 transition-colors text-base font-medium">Who can use it</a>
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-brand-50 border border-brand-200 text-sm font-semibold text-brand-700">
                        <i data-lucide="user-round" class="w-4 h-4 text-gold-600"></i>
                        {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-5 py-2.5 bg-brand-600 text-white rounded-lg font-medium text-base hover:bg-brand-700 glow-brown transition">Sign out</button>
                    </form>
                </nav>

                <!-- Mobile menu button -->
                <label for="nav-toggle" class="md:hidden flex h-11 w-11 cursor-pointer items-center justify-center rounded-lg border border-brand-200 text-brand-700 hover:bg-brand-50 transition" aria-label="Toggle menu">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </label>
            </div>
        </div>

        <!-- Mobile navigation (CSS-only toggle) -->
        <input type="checkbox" id="nav-toggle" class="peer sr-only">
        <nav class="hidden peer-checked:block md:hidden border-t border-brand-100 bg-white px-4 py-4 space-y-2" aria-label="Mobile navigation">
            <p class="flex items-center gap-2 px-3 py-2 text-sm font-semibold text-brand-700">
                <i data-lucide="user-round" class="w-4 h-4 text-gold-600"></i>
                {{ auth()->user()->name }}
            </p>
            <a href="{{ url('/') }}" class="block px-3 py-3 rounded-lg text-brand-700 font-medium hover:bg-brand-50 transition-colors">Home</a>
            <a href="{{ url('/') }}#who" class="block px-3 py-3 rounded-lg text-brand-700 font-medium hover:bg-brand-50 transition-colors">Who can use it</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block w-full px-3 py-3 rounded-lg bg-brand-600 text-center font-medium text-white hover:bg-brand-700 transition-colors">Sign out</button>
            </form>
        </nav>
    </header>
    <!-- End: Header -->

    <!-- Start: Pending section -->
    <main class="pending-bg relative flex-1 pt-20 flex items-center justify-center overflow-hidden">
        <img class="pending-bg-img" src="https://images.pexels.com/photos/5212669/pexels-photo-5212669.jpeg?auto=compress&cs=tinysrgb&w=1800" alt="" aria-hidden="true">
        <div class="pending-bg-shade" aria-hidden="true"></div>

        <div class="w-full max-w-lg px-4 py-12">
            <div class="pending-card rounded-2xl border border-brand-100 bg-white shadow-2xl shadow-brand-800/40 overflow-hidden text-center">

                <!-- Photo banner -->
                <div class="relative h-40 overflow-hidden">
                    <img src="https://images.pexels.com/photos/5212669/pexels-photo-5212669.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Students learning together on campus" class="h-full w-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-800/70 to-transparent"></div>
                </div>

                <div class="px-6 pb-8 sm:px-9">
                    <!-- Clock badge overlapping the photo -->
                    <div class="-mt-9 relative flex justify-center mb-4">
                        <span class="absolute h-[4.5rem] w-[4.5rem] rounded-full bg-gold-400/40 animate-ping"></span>
                        <div class="relative h-[4.5rem] w-[4.5rem] rounded-full bg-white border-4 border-white shadow-lg flex items-center justify-center text-gold-600 ring-1 ring-brand-100">
                            <i data-lucide="clock" class="h-8 w-8 clock-spin"></i>
                        </div>
                    </div>

                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold-600">Almost there</p>
                    <h1 class="mt-2 text-3xl font-bold text-brand-800">Account Pending Approval</h1>
                    <p class="mt-3 text-base leading-7 text-slate-600">
                        Your {{ auth()->user()->role }} account has been created. An administrator must approve it before you can access the dashboard.
                    </p>

                    <!-- Progress steps -->
                    <ol class="mt-7 space-y-3 text-left">
                        <li class="step flex items-center gap-4 p-3.5 rounded-xl border border-brand-100 bg-brand-50/60">
                            <span class="w-9 h-9 rounded-full bg-brand-600 text-white flex items-center justify-center shrink-0"><i data-lucide="check" class="w-5 h-5"></i></span>
                            <div>
                                <p class="text-sm font-bold text-brand-800">Account created</p>
                                <p class="text-sm text-slate-500">Your details have been saved.</p>
                            </div>
                        </li>
                        <li class="step flex items-center gap-4 p-3.5 rounded-xl border border-gold-500/40 bg-gold-400/10">
                            <span class="w-9 h-9 rounded-full bg-gold-500 text-white flex items-center justify-center shrink-0"><i data-lucide="hourglass" class="w-5 h-5"></i></span>
                            <div>
                                <p class="text-sm font-bold text-brand-800">Waiting for admin review</p>
                                <p class="text-sm text-slate-500">An administrator will approve your account.</p>
                            </div>
                        </li>
                        <li class="step flex items-center gap-4 p-3.5 rounded-xl border border-brand-100 bg-white opacity-70">
                            <span class="w-9 h-9 rounded-full bg-brand-100 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="layout-dashboard" class="w-5 h-5"></i></span>
                            <div>
                                <p class="text-sm font-bold text-brand-800">Dashboard access</p>
                                <p class="text-sm text-slate-500">Sign in again once you are approved.</p>
                            </div>
                        </li>
                    </ol>

                    <form method="POST" action="{{ route('logout') }}" class="mt-8">
                        @csrf
                        <button type="submit" class="group w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-brand-600 text-white text-base font-semibold hover:bg-brand-700 glow-brown transition-all">
                            <i data-lucide="log-out" class="w-5 h-5 group-hover:-translate-x-1 transition-transform"></i>
                            Sign out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- End: Pending section -->

    <!-- Start: Footer -->
    <footer class="bg-brand-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <p class="text-sm text-brand-100 text-center sm:text-left">&copy; {{ date('Y') }} Makerere University Business School.</p>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html>