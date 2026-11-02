@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">

    <!-- Welcome Banner -->
    <div class="bg-brand-800 rounded-2xl p-8 mb-8 text-brown shadow-md relative overflow-hidden">
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2 text-black">Welcome back, {{ auth()->user()->name }}</h1>
            <p class="text-brand-100 text-sm max-w-2xl">
                This is your student portal. From here you can view the courses offered this semester and manage your course registrations.
            </p>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Action Card 1: View Courses -->
        <a href="{{ route('courses.index') }}" class="group block bg-white rounded-xl border border-brand-200 p-6 shadow-sm hover:shadow-md hover:border-brand-500 transition-all">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-lg bg-brand-50 flex items-center justify-center shrink-0 group-hover:bg-brand-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-brand-600"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-brand-800 group-hover:text-brand-600 transition-colors">View Available Courses</h2>
                    <p class="text-sm text-slate-500 mt-1">Browse the course catalog to see what classes you can register for this semester.</p>
                </div>
            </div>
        </a>

        <!-- Action Card 2: My Registrations -->
        <a href="{{ route('registrations.index') }}" class="group block bg-white rounded-xl border border-brand-200 p-6 shadow-sm hover:shadow-md hover:border-gold-600 transition-all">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-lg bg-amber-50 flex items-center justify-center shrink-0 group-hover:bg-amber-100 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gold-600"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-brand-800 group-hover:text-gold-600 transition-colors">My Registrations</h2>
                    <p class="text-sm text-slate-500 mt-1">Check which courses you are currently enrolled in, or drop a course.</p>
                </div>
            </div>
        </a>

    </div>
</div>
@endsection