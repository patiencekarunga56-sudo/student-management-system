@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-xl font-bold mb-4">Register for a Course</h1>
    <form action="{{ route('registrations.store') }}" method="POST">
        @csrf
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Select a Course</label>
            <select name="course_id" required class="w-full border p-2 rounded">
                <option value="">-- Choose Course --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->code }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Confirm Registration</button>
        <div class="text-center mt-4">
            <a href="{{ route('registrations.index') }}" class="text-sm text-gray-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection