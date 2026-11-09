@extends('layouts.app')

@section('content')
<div class="page-shell">
    <header class="image-banner">
        <div class="image-banner-copy">
            <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Administration</p>
            <h1>Welcome back, {{ auth()->user()->name }}</h1>
            <p>Manage the people, courses, and access settings that keep the student portal running.</p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="A team planning together around a table" fetchpriority="high">
        </div>
    </header>

    <section aria-label="Administration tools" class="grid gap-5 md:grid-cols-3">
        <a href="{{ route('students.index') }}" class="surface-panel group p-6 hover:-translate-y-1 hover:shadow-card">
            <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-coffee-50 text-coffee-600" aria-hidden="true">01</span>
            <h2 class="text-lg font-bold text-coffee-800 group-hover:text-accent-500">Manage students</h2>
            <p class="mt-2 text-sm leading-6 text-coffee-500">Review student accounts and maintain their contact details.</p>
        </a>
        <a href="{{ route('courses.index') }}" class="surface-panel group p-6 hover:-translate-y-1 hover:shadow-card">
            <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-coffee-50 text-coffee-600" aria-hidden="true">02</span>
            <h2 class="text-lg font-bold text-coffee-800 group-hover:text-accent-500">Course catalog</h2>
            <p class="mt-2 text-sm leading-6 text-coffee-500">Add, update, and review courses offered through the portal.</p>
        </a>
        <a href="{{ route('users.index') }}" class="surface-panel group p-6 hover:-translate-y-1 hover:shadow-card">
            <span class="mb-4 flex h-12 w-12 items-center justify-center rounded-lg bg-coffee-50 text-coffee-600" aria-hidden="true">03</span>
            <h2 class="text-lg font-bold text-coffee-800 group-hover:text-accent-500">User access</h2>
            <p class="mt-2 text-sm leading-6 text-coffee-500">Review account roles and pending access approvals.</p>
        </a>
    </section>
</div>
@endsection
