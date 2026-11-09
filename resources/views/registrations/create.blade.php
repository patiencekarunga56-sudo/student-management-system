@extends('layouts.app')

@section('content')
<div class="page-shell max-w-2xl">
    <header class="image-banner">
        <div class="image-banner-copy">
            <a href="{{ route('registrations.index') }}" class="text-sm font-semibold text-white/80 hover:text-white">&larr; Back to registrations</a>
            <h1>Register for a Course</h1>
            <p>Select the course you want to add to your current registrations.</p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/5212669/pexels-photo-5212669.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Students reviewing their course materials" fetchpriority="high">
        </div>
    </header>
    <div class="surface-panel p-6 sm:p-8">
    <form action="{{ route('registrations.store') }}" method="POST" class="space-y-5">
        @csrf
        @if($canManageRegistrations)
        <div>
            <label for="user_id" class="form-label">Student</label>
            <select id="user_id" name="user_id" required class="form-control">
                <option value="">-- Select Student --</option>
                @foreach($students as $student)
                    <option value="{{ $student->id }}" {{ old('user_id') == $student->id ? 'selected' : '' }}>{{ $student->name }} ({{ $student->email }})</option>
                @endforeach
            </select>
            @error('user_id') <span class="mt-1 block text-sm text-red-700">{{ $message }}</span> @enderror
        </div>
        @endif
        <div>
            <label for="course_id" class="form-label">Select a Course</label>
            <select id="course_id" name="course_id" required class="form-control">
                <option value="">-- Choose Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>{{ $course->name }} ({{ $course->code }})</option>
                @endforeach
            </select>
            @error('course_id') <span class="mt-1 block text-sm text-red-700">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col-reverse gap-3 border-t border-coffee-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('registrations.index') }}" class="btn-secondary">Cancel</a>
            <button type="submit" class="btn-primary">Confirm Registration</button>
        </div>
    </form>
    </div>
</div>
@endsection