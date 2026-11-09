@extends('layouts.app')

@section('content')
<div class="page-shell">
    <header class="image-banner">
        <div class="image-banner-copy">
            <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Teaching overview</p>
            <h1>Welcome, {{ auth()->user()->name }}</h1>
            <p>Review your assigned courses and the students registered in each one.</p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/5212669/pexels-photo-5212669.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Students collaborating during a learning session" fetchpriority="high">
        </div>
    </header>

    <section aria-labelledby="assigned-courses-title">
        <div class="mb-5 flex flex-wrap items-end justify-between gap-3">
            <div>
                <h2 id="assigned-courses-title" class="text-xl font-bold text-coffee-800">My Assigned Courses</h2>
                <p class="mt-1 text-sm text-coffee-500">Your course roster and current registration totals.</p>
            </div>
            <a href="{{ route('courses.index') }}" class="text-sm font-semibold text-accent-600 hover:text-coffee-800">View course catalog &rarr;</a>
        </div>
        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            @forelse($courses as $course)
                <article class="surface-panel p-6">
                    <p class="text-xs font-bold uppercase tracking-wider text-accent-600">{{ $course->code }}</p>
                    <h3 class="mt-2 text-xl font-bold text-coffee-800">{{ $course->name }}</h3>
                    <p class="mt-5 border-t border-coffee-100 pt-4 text-sm text-coffee-600">
                        Students registered: <strong class="text-coffee-800">{{ $course->students->count() }}</strong>
                    </p>
                </article>
            @empty
                <div class="surface-panel p-8 md:col-span-2">
                    <h3 class="text-lg font-bold text-coffee-800">No courses assigned yet</h3>
                    <p class="mt-2 text-base text-coffee-500">Assigned courses will appear here with their current student registration totals.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection