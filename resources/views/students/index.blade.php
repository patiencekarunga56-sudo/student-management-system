@extends('layouts.app')

@section('content')
<div class="page-shell">
<header class="image-banner">
    <div class="image-banner-copy">
        <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Student directory</p>
        <h1>Manage Students</h1>
        <p>Review student accounts and update their contact details.</p>
        <a href="{{ route('students.create') }}" class="btn-secondary mt-5 border-white/50 bg-white/10 text-white hover:bg-white/20 hover:text-white">Add Student</a>
    </div>
    <div class="image-banner-media">
        <img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Graduates gathered on campus" fetchpriority="high">
    </div>
</header>

<div class="table-scroll">
    <table class="data-table">
        <caption class="sr-only">Student accounts</caption>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td class="font-semibold text-coffee-800">{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>
                        <div class="flex items-center gap-4">
                            <a href="{{ route('students.edit', $student->id) }}" class="font-semibold text-accent-600 hover:text-coffee-800 hover:underline">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Delete student?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="font-semibold text-red-700 hover:text-red-900 hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="py-12 text-center">
                        <p class="font-semibold text-coffee-800">No student accounts found</p>
                        <p class="mt-1 text-sm text-coffee-500">Add a student to start building the student directory.</p>
                        <a href="{{ route('students.create') }}" class="btn-primary mt-4">Add Student</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection