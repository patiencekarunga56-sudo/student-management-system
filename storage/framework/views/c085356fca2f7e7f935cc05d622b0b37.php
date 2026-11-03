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
        /* Brown Gradient for text */
        .text-gradient {
            background: linear-gradient(to right, #6b4423, #d97706);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Brown Glow for buttons */
        .glow-brown {
            box-shadow: 0 0 20px rgba(107, 68, 35, 0.4);
        }
    </style>
</head>
<body class="bg-brand-50 text-slate-900 font-sans antialiased">
    
    <!-- Start: Header -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-brand-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="/" class="flex items-center gap-3">
              <!-- Increase the height and width classes (e.g., changing h-11 w-20 to h-16 w-28 or larger depending on your needs) -->
<!-- Extra-large size option -->
<img src="assets/img/logo.png" alt="Logo" class="h-32 w-30 object-contain">

                    <div class="hidden sm:block">
                        <p class="text-sm font-bold text-brand-700 leading-tight">Student Management</p>
                        <p class="text-[11px] text-brand-500">Courses and registrations</p>
                    </div>
                </a>
                <div class="hidden md:flex items-center gap-8">
                    <a href="/" class="text-brand-700 text-sm font-semibold">Home</a>
                    <a href="#how-it-works" class="text-brand-500 hover:text-brand-700 transition-colors text-sm font-medium">How it works</a>
                    <a href="#services" class="text-brand-500 hover:text-brand-700 transition-colors text-sm font-medium">Services</a>
                    <a href="#who" class="text-brand-500 hover:text-brand-700 transition-colors text-sm font-medium">Who can use it</a>
                    
                    <!-- Laravel Auth Routes -->
                    <a href="<?php echo e(route('login')); ?>" class="px-5 py-2.5 border border-brand-200 text-brand-700 rounded-lg font-medium text-sm hover:bg-brand-50 hover:border-brand-500 transition">Sign in</a>
                    <a href="<?php echo e(route('register')); ?>" class="px-5 py-2.5 bg-brand-600 text-white rounded-lg font-medium text-sm hover:bg-brand-700 glow-brown transition">Register</a>
                </div>
            </div>
        </div>
    </header>
    <!-- End: Header -->

    <!-- Start: Hero -->
    <section class="relative pt-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center py-16 lg:py-20">
                <div class="text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-brand-100 bg-brand-50 mb-6">
                        <i data-lucide="calendar" class="w-4 h-4 text-gold-600"></i>
                        <span class="text-sm font-medium text-brand-700">Academic Year 2026/2027</span>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-5 leading-tight text-brand-800">
                        Manage your courses.<br>
                        <span class="text-gradient">Track your progress.</span>
                    </h1>
                    <p class="text-sm sm:text-base text-slate-600 max-w-xl mx-auto lg:mx-0 mb-6 leading-relaxed">
                        A unified portal for Makerere University Business School. Students register for courses, Lecturers view their classes, and Admins manage the system.
                    </p>
                    <div class="grid gap-2 text-left max-w-xl mx-auto lg:mx-0 mb-8">
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-brand-500 mt-0.5 shrink-0"></i>
                            <span>Register for a course in one click.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-brand-500 mt-0.5 shrink-0"></i>
                            <span>No duplicate registrations for the same course.</span>
                        </div>
                        <div class="flex items-start gap-2 text-sm text-slate-600">
                            <i data-lucide="check-circle-2" class="w-4 h-4 text-brand-500 mt-0.5 shrink-0"></i>
                            <span>Each person only sees what their role allows.</span>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                        <a href="<?php echo e(route('register')); ?>" class="group flex items-center gap-2 px-8 py-4 bg-brand-600 text-white rounded-xl font-semibold text-sm hover:bg-brand-700 glow-brown w-full sm:w-auto justify-center transition-all">
                            Create student account
                            <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                        <a href="<?php echo e(route('login')); ?>" class="flex items-center justify-center gap-2 px-8 py-4 border border-brand-200 bg-white rounded-xl font-semibold text-sm text-brand-700 hover:border-brand-500 w-full sm:w-auto transition-all">
                            I already have an account
                        </a>
                    </div>
                </div>

                <div class="relative">
                    <div class="rounded-2xl border border-brand-100 bg-white p-5 sm:p-6 shadow-xl shadow-brand-100/50">
                        <div class="flex items-center justify-between mb-5">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-gold-600 font-bold">Today</p>
                                <p class="text-lg font-bold text-brand-800 mt-1">Available Courses</p>
                            </div>
                            <span class="text-xs px-2.5 py-1 rounded-full bg-brand-50 text-brand-700 border border-brand-200 font-medium">4 active</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="code" class="w-4 h-4 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">Advanced Web Development</p>
                                    <p class="text-xs text-slate-500 mt-0.5">BUC3131 · 2026/2027</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="database" class="w-4 h-4 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">Database Systems</p>
                                    <p class="text-xs text-slate-500 mt-0.5">BIT2201 · 2026/2027</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
                            </div>
                            <div class="flex items-start gap-3 p-3 rounded-xl bg-white border border-slate-100 hover:border-brand-200 transition">
                                <div class="w-9 h-9 rounded-lg bg-brand-50 flex items-center justify-center shrink-0">
                                    <i data-lucide="layers" class="w-4 h-4 text-brand-600"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold text-slate-800 truncate">Information Systems</p>
                                    <p class="text-xs text-slate-500 mt-0.5">BIS2104 · 2026/2027</p>
                                </div>
                                <span class="text-[11px] px-2 py-1 rounded-full bg-brand-50 text-brand-700 border border-brand-100 shrink-0">Available</span>
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
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-gold-600 mb-3">Roles</p>
                <h2 class="text-2xl sm:text-3xl font-bold mb-3 text-brand-800">Three roles, three views</h2>
                <p class="text-sm text-brand-600">Students sign up themselves. Lecturers and administrators are added by an admin.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="p-6 rounded-xl bg-white border border-brand-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center"><i data-lucide="graduation-cap" class="w-5 h-5 text-brand-600"></i></div>
                        <h3 class="font-bold text-brand-800">Students</h3>
                    </div>
                    <p class="text-sm text-slate-600 mb-4">View available courses and manage your registrations.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Register for new courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>Drop a registered course</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-brand-500 mt-0.5"></i>View your own records only</li>
                    </ul>
                </div>
                <div class="p-6 rounded-xl bg-white border border-brand-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-gold-400/20 flex items-center justify-center"><i data-lucide="presentation" class="w-5 h-5 text-gold-600"></i></div>
                        <h3 class="font-bold text-brand-800">Lecturers</h3>
                    </div>
                    <p class="text-sm text-slate-600 mb-4">View your assigned courses and the students taking them.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>See assigned courses</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>View registered students</li>
                        <li class="flex gap-2"><i data-lucide="check" class="w-4 h-4 text-gold-600 mt-0.5"></i>Cannot edit admin settings</li>
                    </ul>
                </div>
                <div class="p-6 rounded-xl bg-white border border-brand-100 shadow-sm hover:shadow-md transition">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-11 h-11 rounded-lg bg-brand-50 flex items-center justify-center"><i data-lucide="shield" class="w-5 h-5 text-brand-600"></i></div>
                        <h3 class="font-bold text-brand-800">Administrators</h3>
                    </div>
                    <p class="text-sm text-slate-600 mb-4">Manage the entire system and assign roles.</p>
                    <ul class="space-y-2 text-sm text-slate-600">
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
                <p>© <?php echo e(date('Y')); ?> Makerere University Business School.</p>
                
            </div>
        </div>
    </footer>
    <!-- End: Footer -->

    <script>lucide.createIcons();</script>
</body>
</html><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/welcome.blade.php ENDPATH**/ ?>