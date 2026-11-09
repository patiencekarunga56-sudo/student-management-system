@extends('layouts.app')

@section('content')
<div class="page-shell max-w-2xl">
    <header class="image-banner">
        <div class="image-banner-copy">
            <a href="{{ route('students.index') }}" class="text-sm font-semibold text-white/80 hover:text-white">&larr; Back to students</a>
            <h1>Edit Student</h1>
            <p>Update this student's name and email address.</p>
        </div>
        <div class="image-banner-media">
            <img src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=900" alt="Students and staff working together" fetchpriority="high">
        </div>
    </header>
    <div class="surface-panel p-6 sm:p-8">
    <form action="{{ route('students.update', $student->id) }}" method="POST" class="space-y-5">
        @csrf @method('PUT')
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}" required class="form-control">
        </div>
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}" required class="form-control">
        </div>
        <div class="flex flex-col-reverse gap-3 border-t border-coffee-100 pt-5 sm:flex-row sm:justify-end">
            <a href="{{ route('students.index') }}" class="btn-secondary">Cancel</a>
            <button type="submit" class="btn-primary">Update Student</button>
        </div>
    </form>
    </div>
</div>
@endsection