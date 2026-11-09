@extends('layouts.app')

@section('content')
<div class="page-shell">

    <!-- Welcome Banner -->
    <header class="image-banner">
        <div class="image-banner-copy">
            <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Student portal</p>
            <h1>Welcome back, {{ auth()->user()->name }}</h1>
            <p>
                This is your student portal. From here you can view the courses offered this semester and manage your course registrations.
            </p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Graduates celebrating together on campus" fetchpriority="high">
        </div>
    </header>

    <!-- Quick Actions Grid -->
    <section aria-label="Student shortcuts" class="grid grid-cols-1 gap-5 md:grid-cols-2">
        
        <!-- Action Card 1: View Courses -->
        <a href="{{ route('courses.index') }}" class="surface-panel group block p-6 hover:-translate-y-1 hover:shadow-card">
            <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-lg bg-coffee-50 flex items-center justify-center shrink-0 group-hover:bg-coffee-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-coffee-600"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-coffee-800 group-hover:text-accent-500 transition-colors">View Available Courses</h2>
                    <p class="text-base leading-6 text-coffee-500 mt-2">Browse the course catalog, review course details, and find classes to register for this semester.</p>
                </div>
            </div>
        </a>

        <!-- Action Card 2: My Registrations -->
        <a href="{{ route('registrations.index') }}" class="surface-panel group block p-6 hover:-translate-y-1 hover:shadow-card">
            <div class="flex items-start gap-4">
            <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center shrink-0 group-hover:bg-amber-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-accent-500"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-coffee-800 group-hover:text-accent-500 transition-colors">My Registrations</h2>
                    <p class="text-base leading-6 text-coffee-500 mt-2">Review your current course list or remove a course from your registrations.</p>
                </div>
            </div>
        </a>

    </section>
</div>
@endsection
