@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-xl font-bold mb-4">Add New Course</h1>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Name</label>
            <input type="text" name="name" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Code</label>
            <input type="text" name="code" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Assign Lecturer</label>
            <select name="lecturer_id" class="w-full border p-2 rounded">
                <option value="">-- Select Lecturer --</option>
                @foreach($lecturers as $lecturer)
                    <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Course</button>
        <a href="{{ route('courses.index') }}" class="ml-2 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
@endsection