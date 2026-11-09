<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System | Campus Portal</title>
    <meta name="description" content="Manage your courses, registrations, and university records.">
    
    <!-- Real Image Path -->
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    
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
                            500: '#8b5a2b', // Medium Brown
                            600: '#6b4423', // Deep Brown
                            700: '#4a2c14', // Darkest Brown
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
        html {
            scroll-behavior: smooth;
        }

        .text-gradient {
            background: linear-gradient(to right, #fbbf24, #f59e0b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .glow-brown {
            box-shadow: 0 0 20px rgba(107, 68, 35, 0.4);
        }

        .hero-section {
            isolation: isolate;
            min-height: 690px;
            background: #35200e;
        }

        .hero-video,
        .hero-shade {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        .hero-video {
            z-index: -2;
            object-fit: cover;
            filter: saturate(1.12) contrast(1.08);
        }

        .hero-shade {
            z-index: -1;
            background: linear-gradient(90deg, rgba(53, 32, 14, 0.72) 0%, rgba(74, 44, 20, 0.46) 48%, rgba(53, 32, 14, 0.22) 100%);
        }

        .hero-content {
            animation: rise-in 850ms both;
        }

        .course-panel {
            animation: rise-in 850ms 160ms both;
        }

        .role-card {
            transition: transform 280ms ease, box-shadow 280ms ease;
        }

        .role-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 34px rgba(74, 44, 20, 0.12);
        }

        .role-photo img {
            transition: transform 500ms ease;
        }

        .role-card:hover .role-photo img {
            transform: scale(1.05);
        }

        @keyframes rise-in {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 640px) {
            .hero-section {
                min-height: auto;
            }

            .hero-shade {
                background: rgba(53, 32, 14, 0.62);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            html {
                scroll-behavior: auto;
            }

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="bg-brand-50 text-slate-900 font-sans antialiased">
    
    <!-- Start: Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex items-center gap-3">
                    <img src="assets/img/logo.png" alt="Makerere University Business School logo" class="h-14 w-14 object-contain">

                    <div class="hidden sm:block">
                        <p class="text-base font-bold text-brand-700 leading-tight">Student Management</p>
                        <p class="text-xs text-brand-500">Courses and registrations</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-brand-700 text-base font-semibold">Home</a>
                    <a href="#how-it-works" class="text-brand-500 hover:text-brand-700 transition-colors text-base font-medium">How it works</a>
                    <a href="#services" class="text-brand-500 hover:text-brand-700 transition-colors text-base font-medium">Services</a>
                    <a href="#who" class="text-brand-500 hover:text-brand-700 transition-colors text-base font-medium">Who can use it</a>
                    
                    <!-- Laravel Auth Routes -->
                    <a href="{{ route('login') }}" class="px-5 py-2.5 border border-brand-200 text-brand-700 rounded-lg font-medium text-base hover:bg-brand-50 hover:border-brand-500 transition">Sign in</a>
                    <a href="{{ route('register') }}" class="px-5 py-2.5 bg-brand-600 text-white rounded-lg font-medium text-base hover:bg-brand-700 glow-brown transition">Register</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Hero -->
    <section class="hero-section relative pt-20 text-white">
        <video class="hero-video" autoplay muted loop playsinline preload="metadata" poster="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=2000" aria-hidden="true">
            <source src="https://videos.pexels.com/video-files/3195394/3195394-hd_1920_1080_25fps.mp4" type="video/mp4">
        </video>
        <div class="hero-shade" aria-hidden="true"></div>
        <div class="hero-content max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center py-16 lg:py-24">
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/30 bg-brand-800/50 mb-6">
                        <i data-lucide="calendar" class="w-5 h-5 text-gold-400"></i>
                        <span class="text-base font-medium text-white">Academic Year 2026/2027</span>
                    </div>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight text-white">
                        Manage your courses.<br>
                        <span class="text-gradient">Track your progress.</span>
                    </h1>
                    <p class="text-base sm:text-lg text-white/90 max-w-xl mx-auto lg:mx-0 mb-7 leading-relaxed">
                        Your academic journey, organized in one place. At Makerere University Business School, students can register for courses, lecturers can follow their classes, and administrators can keep everything running smoothly.
                    </p>
                    <div class="grid gap-3 text-left max-w-xl mx-auto lg:mx-0 mb-9">
                        <div class="flex items-start gap-3 text-base text-white/90">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-gold-400 mt-0.5 shrink-0"></i>
                            <span>Register for a course in one click.</span>
                        </div>
                        <div class="flex items-start gap-3 text-base text-white/90">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-gold-400 mt-0.5 shrink-0"></i>
                            <span>No duplicate registrations for the same course.</span>
                        </div>
                        <div class="flex items-start gap-3 text-base text-white/90">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-gold-400 mt-0.5 shrink-0"></i>
                            <span>Each person only sees what their role allows.</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="{{ route('register') }}" class="group flex items-center gap-2 px-8 py-4 bg-brand-600 text-white rounded-xl font-semibold text-base hover:bg-brand-700 glow-brown w-full sm:w-auto justify-center transition-all">
                            Create student account
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 px-8 py-4 border border-white/50 bg-white/10 rounded-xl font-semibold text-base text-white hover:bg-white/20 w-full sm:w-auto transition-all">
                            I already have an account
                        </a>
                    </div>
                </div>

                <div class="course-panel relative">
                    <div class="rounded-2xl border border-gold-500/50 bg-brand-800 p-7 sm:p-9 shadow-2xl shadow-brand-800/40">
                        <div class="flex items-center justify-between mb-7">
                            <div>
                                <p class="text-sm uppercase tracking-wider text-gold-400 font-bold">Today</p>
                                <p class="text-2xl font-bold text-white mt-1">Available Courses</p>
                            </div>
                            <span class="text-sm px-3 py-1.5 rounded-full bg-brand-700 text-gold-400 border border-brand-500 font-semibold">4 active</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="code" class="w-5 h-5 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-bold text-slate-800 truncate">Advanced Web Development</p>
                                    <p class="text-sm text-slate-500 mt-1">BUC3131 · 2026/2027</p>
                                </div>
                                <span class="text-xs px-2.5 py-1.5 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
                            </div>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="database" class="w-5 h-5 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-bold text-slate-800 truncate">Database Systems</p>
                                    <p class="text-sm text-slate-500 mt-1">BIT2201 · 2026/2027</p>
                                </div>
                                <span class="text-xs px-2.5 py-1.5 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
                            </div>
                            <div class="flex items-start gap-3 p-4 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="layers" class="w-5 h-5 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-base font-bold text-slate-800 truncate">Information Systems</p>
                                    <p class="text-sm text-slate-500 mt-1">BIS2104 · 2026/2027</p>
                                </div>
                                <span class="text-xs px-2.5 py-1.5 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Hero -->

    <!-- Start: Roles Section -->
    <section id="who" class="py-24 bg-brand-50 border-t border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-14">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-gold-600 mb-3">Roles</p>
                <h2 class="text-3xl sm:text-4xl font-bold mb-4 text-brand-800">Three roles, three views</h2>
                <p class="text-base text-brand-600">Students sign up themselves. Lecturers and administrators are added by an admin, with each person seeing the tools and records relevant to their work.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="role-card p-6 rounded-xl bg-white border border-brand-100 shadow-sm overflow-hidden">
                    <div class="role-photo -mx-6 -mt-6 mb-5 h-44 overflow-hidden"><img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=900" alt="University students celebrating at graduation" class="h-full w-full object-cover" loading="lazy"></div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center"><i data-lucide="graduation-cap" class="w-5 h-5 text-brand-600"></i></div>
                        <h3 class="font-bold text-brand-800">Students</h3>
                    </div>
                    <p class="text-base text-slate-600 mb-4">Find available courses, plan your semester, and manage your registrations from one simple student view.</p>
                    <ul class="space-y-2 text-base text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Register for new courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Drop a registered course</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>View your own records only</li>
                    </ul>
                </div>
                <div class="role-card p-6 rounded-xl bg-white border border-brand-100 shadow-sm overflow-hidden">
                    <div class="role-photo -mx-6 -mt-6 mb-5 h-44 overflow-hidden"><img src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Colleagues collaborating around a table" class="h-full w-full object-cover" loading="lazy"></div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-gold-400/20 flex items-center justify-center"><i data-lucide="presentation" class="w-5 h-5 text-gold-600"></i></div>
                        <h3 class="font-bold text-brand-800">Lecturers</h3>
                    </div>
                    <p class="text-base text-slate-600 mb-4">Keep your teaching organized with a clear view of assigned courses and the students taking them.</p>
                    <ul class="space-y-2 text-base text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>See assigned courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>View registered students</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>Cannot edit admin settings</li>
                    </ul>
                </div>
                <div class="role-card p-6 rounded-xl bg-white border border-brand-100 shadow-sm overflow-hidden">
                    <div class="role-photo -mx-6 -mt-6 mb-5 h-44 overflow-hidden"><img src="https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Student working on coursework at a laptop" class="h-full w-full object-cover" loading="lazy"></div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center"><i data-lucide="shield" class="w-5 h-5 text-brand-600"></i></div>
                        <h3 class="font-bold text-brand-800">Administrators</h3>
                    </div>
                    <p class="text-base text-slate-600 mb-4">Support the whole campus community by managing courses, student records, and access roles.</p>
                    <ul class="space-y-2 text-base text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Full Student CRUD</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Full Course CRUD</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Change user roles</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Roles Section -->

    <!-- Start: Footer -->
    <footer class="bg-brand-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-sm text-brand-100 border-t border-brand-700 pt-8">
                <p>© {{ date('Y') }} Makerere University Business School.</p>
                
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html>