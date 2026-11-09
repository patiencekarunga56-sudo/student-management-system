@extends('layouts.app')

@section('content')
<div class="page-shell max-w-2xl">
    <header class="image-banner">
        <div class="image-banner-copy">
            <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-1 text-sm font-semibold text-white/80 hover:text-white">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to courses
            </a>
            <h1>Edit Course</h1>
            <p>Update the course name, code, or assigned lecturer.</p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=900" alt="A team discussing course materials" fetchpriority="high">
        </div>
    </header>

    <div class="surface-panel p-6 sm:p-8">
        <form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-5">
            @csrf @method('PUT')
            <div>
                <label for="name" class="form-label">Course Name <span class="text-gold-600">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $course->name) }}" required class="form-control">
                @error('name') <span class="mt-1.5 block text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="code" class="form-label">Course Code <span class="text-gold-600">*</span></label>
                <input type="text" id="code" name="code" value="{{ old('code', $course->code) }}" required class="form-control">
                @error('code') <span class="mt-1.5 block text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="lecturer_id" class="form-label">Assign Lecturer</label>
                <select id="lecturer_id" name="lecturer_id" class="form-control">
                    <option value="">-- Select Lecturer --</option>
                    @foreach($lecturers as $lecturer)
                        <option value="{{ $lecturer->id }}" {{ old('lecturer_id', $course->lecturer_id) == $lecturer->id ? 'selected' : '' }}>
                            {{ $lecturer->name }}
                        </option>
                    @endforeach
                </select>
                @error('lecturer_id') <span class="mt-1.5 block text-sm text-red-600">{{ $message }}</span> @enderror
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-brand-100 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('courses.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Update Course</button>
            </div>
        </form>
    </div>
</div>
@endsection