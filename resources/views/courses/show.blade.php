@extends('layouts.app')

@section('content')
<div class="page-shell max-w-4xl">

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-brand-600 hover:text-brand-800">
            <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Courses
        </a>
    </div>

    <!-- Course Header Card -->
    <article class="surface-panel overflow-hidden mb-8">
        <div class="image-banner image-banner--contained">
            <div class="image-banner-copy">
                <p class="text-sm font-bold uppercase tracking-wider text-gold-400">Course details</p>
                <span class="mt-3 inline-block rounded-md bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-wider text-white">
                    {{ $course->code }}
                </span>
                <h1>{{ $course->name }}</h1>
                <div class="mt-4 flex items-center gap-2 text-base text-white/85">
                    <i data-lucide="user-round" class="w-4 h-4"></i>
                    Lecturer: <strong class="text-white">{{ $course->lecturer ? $course->lecturer->name : 'Not Assigned' }}</strong>
                </div>
            </div>
            <div class="image-banner-media">
                <img src="https://images.pexels.com/photos/5212669/pexels-photo-5212669.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Students working together in a classroom" fetchpriority="high">
            </div>
        </div>

        @if($canViewRoster)
        <!-- Registered Students Section -->
        <div class="p-5 sm:p-8">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold text-brand-800">Registered Students</h2>
                    <p class="mt-1 text-sm text-slate-600">Students currently enrolled in this course.</p>
                </div>
                <span class="rounded-full border border-brand-100 bg-brand-50 px-3 py-1 text-sm font-bold text-brand-700">
                    {{ $course->students->count() }} Enrolled
                </span>
            </div>

            <div class="overflow-hidden rounded-xl border border-brand-100 bg-brand-50/50">
                <ul class="divide-y divide-brand-100">
                    @forelse($course->students as $student)
                        <li class="flex items-center gap-4 p-4 transition-colors hover:bg-white">
                            <!-- Student Avatar Initial -->
                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-brand-600 text-sm font-bold text-white" aria-hidden="true">
                                {{ strtoupper(substr($student->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-base font-semibold text-brand-800">{{ $student->name }}</p>
                                <p class="text-sm text-slate-500">{{ $student->email }}</p>
                            </div>
                        </li>
                    @empty
                        <li class="flex flex-col items-center justify-center p-8 text-center">
                            <span class="mb-3 flex h-12 w-12 items-center justify-center rounded-full bg-white text-brand-500" aria-hidden="true">
                                <i data-lucide="users" class="w-6 h-6"></i>
                            </span>
                            <p class="text-base text-slate-600">No students have registered for this course yet.</p>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
        @else
            <div class="p-5 sm:p-8">
                <div class="flex items-start gap-4 rounded-xl border border-brand-100 bg-brand-50/60 p-5">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-gold-400/20 text-gold-600" aria-hidden="true">
                        <i data-lucide="info" class="w-5 h-5"></i>
                    </span>
                    <div>
                        <h2 class="text-lg font-bold text-brand-800">Course overview</h2>
                        <p class="mt-1 text-base text-slate-600">Contact the assigned lecturer for course-specific information.</p>
                    </div>
                </div>
            </div>
        @endif
    </article>

</div>
@endsection