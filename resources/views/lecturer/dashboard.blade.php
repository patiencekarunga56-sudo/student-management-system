@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm mb-6">
    <h1 class="text-2xl font-bold mb-2">Lecturer Dashboard</h1>
    <p class="text-gray-600">Welcome, {{ auth()->user()->name }}.</p>
</div>

<h2 class="text-xl font-bold mb-4">My Assigned Courses</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    @forelse($courses as $course)
        <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
            <h3 class="font-bold text-lg text-blue-600">{{ $course->name }}</h3>
            <p class="text-sm text-gray-500 mb-2">Code: {{ $course->code }}</p>
            <p class="text-sm">Students Registered: <strong>{{ $course->students->count() }}</strong></p>
        </div>
    @empty
        <p class="text-gray-500">No courses assigned yet.</p>
    @endforelse
</div>
@endsection