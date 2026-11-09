<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Student Management System</title>
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

        .text-gradient {
            background: linear-gradient(to right, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glow-brown { box-shadow: 0 0 20px rgba(107, 68, 35, 0.4); }

        .auth-hero { isolation: isolate; background: #35200e; }

        .auth-hero-img,
        .auth-hero-shade {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .auth-hero-img {
            z-index: -2;
            object-fit: cover;
            filter: saturate(1.12) contrast(1.08);
            animation: slow-zoom 18s ease-in-out infinite alternate;
        }

        .auth-hero-shade {
            z-index: -1;
            background: linear-gradient(160deg, rgba(53, 32, 14, 0.88) 0%, rgba(74, 44, 20, 0.62) 55%, rgba(53, 32, 14, 0.4) 100%);
        }

        .auth-field {
            display: block;
            width: 100%;
            min-height: 3rem;
            border: 1px solid #e5d2cb;
            border-radius: 0.75rem;
            background: #fff;
            padding: 0.75rem 0.9rem 0.75rem 2.6rem;
            font-size: 1rem;
            color: #35200e;
            transition: border-color 180ms ease, box-shadow 180ms ease, transform 180ms ease;
        }

        .auth-field::placeholder { color: #b9a79b; }

        .auth-field:hover { border-color: #d7c4b3; }

        .auth-field:focus {
            outline: none;
            border-color: #8b5a2b;
            box-shadow: 0 0 0 3px rgba(139, 90, 43, 0.18);
        }

        .role-chip {
            transition: transform 280ms ease, background-color 280ms ease, border-color 280ms ease;
        }

        .role-chip:hover {
            transform: translateX(6px);
            background-color: rgba(255, 255, 255, 0.16);
            border-color: rgba(251, 191, 36, 0.6);
        }

        .auth-rise { animation: rise-in 700ms both; }

        .stagger > * { animation: rise-in 600ms both; }
        .stagger > *:nth-child(1) { animation-delay: 120ms; }
        .stagger > *:nth-child(2) { animation-delay: 190ms; }
        .stagger > *:nth-child(3) { animation-delay: 260ms; }
        .stagger > *:nth-child(4) { animation-delay: 330ms; }
        .stagger > *:nth-child(5) { animation-delay: 400ms; }
        .stagger > *:nth-child(6) { animation-delay: 470ms; }

        @keyframes rise-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slow-zoom {
            from { transform: scale(1); }
            to { transform: scale(1.08); }
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
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-brand-200 text-brand-700 rounded-lg font-medium text-base hover:bg-brand-50 hover:border-brand-500 transition ">Sign in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 bg-brand-600 text-white rounded-lg font-medium text-base hover:bg-brand-700 glow-brown transition">Register</a>
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
            <a href="{{ url('/') }}" class="block px-3 py-3 rounded-lg text-brand-700 font-medium hover:bg-brand-50 transition-colors">Home</a>
            <a href="{{ url('/') }}#who" class="block px-3 py-3 rounded-lg text-brand-700 font-medium hover:bg-brand-50 transition-colors">Who can use it</a>
            <a href="{{ route('login') }}" class="block px-3 py-3 rounded-lg border border-brand-200 text-center font-medium text-brand-700 hover:bg-brand-50 transition-colors">Sign in</a>
            <a href="{{ route('register') }}" class="block px-3 py-3 rounded-lg bg-brand-600 text-center font-medium text-white hover:bg-brand-700 transition-colors">Register</a>
        </nav>
    </header>
    <!-- End: Header -->

    <main class="flex-1 pt-20 grid lg:grid-cols-5">

        <!-- Left: brand panel -->
        <section class="auth-hero relative hidden lg:flex lg:col-span-2 items-center overflow-hidden text-white">
            <img class="auth-hero-img" src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=1600" alt="" aria-hidden="true">
            <div class="auth-hero-shade" aria-hidden="true"></div>
            <div class="auth-rise px-10 xl:px-14 py-16">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/30 bg-brand-800/50 mb-6">
                    <i data-lucide="calendar" class="w-5 h-5 text-gold-400"></i>
                    <span class="text-base font-medium text-white">Academic Year 2026/2027</span>
                </div>
                <h2 class="text-4xl xl:text-5xl font-bold leading-tight mb-5">
                    Join your campus.<br>
                    <span class="text-gradient">Start in minutes.</span>
                </h2>
                <p class="text-lg text-white/90 leading-relaxed mb-8">
                    Create an account to register for courses, follow your classes, or manage the portal.
                </p>

                <div class="grid gap-3">
                    <div class="role-chip flex items-center gap-4 p-4 rounded-xl border border-white/20 bg-white/10 backdrop-blur-sm">
                        <div class="w-11 h-11 rounded-lg bg-gold-400/20 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-5 h-5 text-gold-400"></i></div>
                        <div>
                            <p class="font-bold">Students</p>
                            <p class="text-sm text-white/80">Register for courses instantly</p>
                        </div>
                    </div>
                    <div class="role-chip flex items-center gap-4 p-4 rounded-xl border border-white/20 bg-white/10 backdrop-blur-sm">
                        <div class="w-11 h-11 rounded-lg bg-gold-400/20 flex items-center justify-center shrink-0"><i data-lucide="presentation" class="w-5 h-5 text-gold-400"></i></div>
                        <div>
                            <p class="font-bold">Lecturers</p>
                            <p class="text-sm text-white/80">View courses and registered students</p>
                        </div>
                    </div>
                    <div class="role-chip flex items-center gap-4 p-4 rounded-xl border border-white/20 bg-white/10 backdrop-blur-sm">
                        <div class="w-11 h-11 rounded-lg bg-gold-400/20 flex items-center justify-center shrink-0"><i data-lucide="shield" class="w-5 h-5 text-gold-400"></i></div>
                        <div>
                            <p class="font-bold">Administrators</p>
                            <p class="text-sm text-white/80">Manage students, courses and access</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Right: register card -->
        <section class="lg:col-span-3 flex items-center justify-center px-4 py-12 sm:px-8">
            <div class="auth-rise w-full max-w-lg">
                <div class="rounded-2xl border border-brand-100 bg-white p-7 sm:p-9 shadow-xl shadow-brand-100/50">

                    <div class="mb-7 text-center">
                        <div class="flex justify-center mb-4">
                            <div class="w-14 h-14 rounded-xl bg-brand-50 border border-brand-100 flex items-center justify-center">
                                <i data-lucide="user-plus" class="w-6 h-6 text-brand-600"></i>
                            </div>
                        </div>
                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold-600">Campus portal access</p>
                        <h1 class="mt-2 text-3xl font-bold text-brand-800">Create your account</h1>
                        <p class="mt-2 text-base leading-6 text-slate-600">Request access to course and registration services. Lecturer and administrator accounts need approval before sign-in.</p>
                    </div>

                    <!-- Form -->
                    <form method="POST" action="{{ route('register.store') }}" class="stagger space-y-5">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-semibold text-brand-700 mb-2">Full name <span class="text-gold-600">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-500"><i data-lucide="user" class="h-5 w-5"></i></div>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Aisha Namuli" class="auth-field">
                            </div>
                            @error('name') <span class="text-red-600 text-sm mt-1.5 block">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-brand-700 mb-2">Campus email <span class="text-gold-600">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-500"><i data-lucide="mail" class="h-5 w-5"></i></div>
                                <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="student@example.com" class="auth-field">
                            </div>
                            @error('email') <span class="text-red-600 text-sm mt-1.5 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- Role selector -->
                        <div>
                            <label for="role" class="block text-sm font-semibold text-brand-700 mb-2">Register as <span class="text-gold-600">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-500"><i data-lucide="badge-check" class="h-5 w-5"></i></div>
                                <select id="role" name="role" required class="auth-field cursor-pointer">
                                    <option value="Student" {{ old('role') === 'Student' ? 'selected' : '' }}>Student</option>
                                    <option value="Lecturer" {{ old('role') === 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                                    <option value="Administrator" {{ old('role') === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                                </select>
                            </div>
                            @error('role') <span class="text-red-600 text-sm mt-1.5 block">{{ $message }}</span> @enderror
                            <p class="mt-2 flex items-start gap-2 text-sm leading-5 text-slate-500">
                                <i data-lucide="info" class="w-4 h-4 mt-0.5 shrink-0 text-gold-600"></i>
                                Lecturer &amp; Administrator accounts require admin approval before sign-in.
                            </p>
                        </div>

                        <div class="grid gap-5 sm:grid-cols-2">
                            <div>
                                <label for="password" class="block text-sm font-semibold text-brand-700 mb-2">Password <span class="text-gold-600">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-500"><i data-lucide="lock" class="h-5 w-5"></i></div>
                                    <input type="password" id="password" name="password" required minlength="8" placeholder="Min. 8 characters" class="auth-field">
                                </div>
                                @error('password') <span class="text-red-600 text-sm mt-1.5 block">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label for="password_confirmation" class="block text-sm font-semibold text-brand-700 mb-2">Confirm password <span class="text-gold-600">*</span></label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-brand-500"><i data-lucide="lock-keyhole" class="h-5 w-5"></i></div>
                                    <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="Repeat password" class="auth-field">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="group w-full flex items-center justify-center gap-2 py-3.5 px-4 rounded-xl bg-brand-600 text-white text-base font-semibold hover:bg-brand-700 glow-brown transition-all">
                            Create Account
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>

                    <p class="mt-7 text-center text-base text-slate-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-brand-600 font-semibold hover:text-brand-800 transition">Sign in</a>
                    </p>
                </div>
            </div>
        </section>
    </main>

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