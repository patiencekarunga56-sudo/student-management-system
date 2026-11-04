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
</head>
<body class="bg-cream font-sans text-coffee-800 flex flex-col min-h-screen antialiased">

    <!-- Top Navbar -->
    <nav class="bg-white/95 backdrop-blur-sm sticky top-0 z-50 border-b border-coffee-200 shadow-soft">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5 font-bold text-lg text-coffee-700 hover:text-coffee-800 transition-colors">
                <img 
                    src="{{ asset('assets/img/logo.png') }}" 
                    alt="Student Management Logo" 
                    class="h-9 w-9 object-contain rounded-lg transition-transform hover:scale-105"
                >
                <span>Student Management</span>
            </a>
            
            <div class="flex items-center gap-1 text-sm font-medium">
                @auth
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Dashboard</a>
                    <a href="{{ route('courses.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">Courses</a>
                    
                    @if(auth()->user()->role === 'Student')
                        <a href="{{ route('registrations.index') }}" class="px-3 py-2 rounded-lg text-coffee-600 hover:text-coffee-800 hover:bg-coffee-50 transition-colors">My Registrations</a>
                    @endif

                    @if(auth()->user()->role === 'Administrator')
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
    <main class="flex-grow max-w-6xl mx-auto w-full px-6 py-10">
        
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
