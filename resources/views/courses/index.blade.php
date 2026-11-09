@extends('layouts.app')

@section('content')
<div class="page-shell">

    <!-- Page Header -->
    <header class="image-banner">
        <div class="image-banner-copy">
            <p class="text-sm font-bold uppercase tracking-wider text-gold-400">Course catalog</p>
            <h1>Available Courses</h1>
            <p>Browse course details, find your lecturer, and explore the classes offered this semester.</p>
            @can('manage courses')
                <a href="{{ route('courses.create') }}" class="btn-secondary mt-5 border-white/50 bg-white/10 text-white hover:bg-white/20 hover:text-white">
                    <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add a course
                </a>
            @endcan
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=1200" alt="A university library and study space" fetchpriority="high">
        </div>
    </header>

    <div class="mb-5 flex items-center justify-between">
        <h2 class="text-xl font-bold text-brand-800">All courses</h2>
        <span class="rounded-full border border-brand-100 bg-white px-3 py-1 text-sm font-semibold text-brand-700">{{ $courses->count() }} {{ \Illuminate\Support\Str::plural('course', $courses->count()) }}</span>
    </div>

    <!-- Courses Grid -->
    <section aria-label="Course catalog" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @forelse($courses as $course)
            <article class="surface-panel group flex h-full flex-col p-6 hover:-translate-y-1 hover:shadow-card">

                <!-- Card Header -->
                <div class="mb-4">
                    <div class="mb-3 flex items-center justify-between">
                        <span class="inline-block rounded-md bg-brand-50 px-2.5 py-1 text-xs font-bold uppercase tracking-wider text-brand-700">
                            {{ $course->code }}
                        </span>
                        <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-gold-400/20 text-gold-600" aria-hidden="true">
                            <i data-lucide="book-open" class="w-4 h-4"></i>
                        </span>
                    </div>
                    <h3 class="text-xl font-bold leading-tight text-brand-800 group-hover:text-gold-600">{{ $course->name }}</h3>
                </div>

                <!-- Lecturer Info -->
                <div class="mb-6 flex items-center gap-2 text-base text-slate-600">
                    <i data-lucide="user-round" class="w-4 h-4 text-brand-500"></i>
                    <span>{{ $course->lecturer ? $course->lecturer->name : 'Lecturer Not Assigned' }}</span>
                </div>

                <!-- Actions (pushed to the bottom) -->
                <div class="mt-auto flex flex-wrap items-center justify-between gap-3 border-t border-brand-100 pt-4">
                    <a href="{{ route('courses.show', $course->id) }}" class="inline-flex items-center gap-1 text-sm font-semibold text-brand-600 hover:text-brand-800">
                        View Details <i data-lucide="arrow-right" class="w-4 h-4 group-hover:translate-x-1 transition-transform"></i>
                    </a>

                    @can('manage courses')
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('courses.edit', $course->id) }}" class="text-sm font-semibold text-gold-600 hover:text-brand-800">Edit</a>
                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    @endcan
                </div>
            </article>
        @empty
            <!-- Empty State -->
            <div class="surface-panel col-span-full py-12 text-center">
                <span class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-brand-50 text-brand-500" aria-hidden="true">
                    <i data-lucide="book-open" class="w-7 h-7"></i>
                </span>
                <h3 class="mb-1 text-lg font-bold text-brand-800">No courses available</h3>
                <p class="text-base text-slate-600">There are currently no courses to show.</p>
                @can('manage courses')
                    <a href="{{ route('courses.create') }}" class="btn-primary mt-5">Add the first course</a>
                @endcan
            </div>
        @endforelse
    </section>
</div>
@endsection