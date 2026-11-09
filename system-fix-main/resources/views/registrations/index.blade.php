@extends('layouts.app')

@section('content')
<div class="page-shell">
<header class="image-banner">
    <div class="image-banner-copy">
        <p class="text-sm font-bold uppercase tracking-wider text-amber-300">My study plan</p>
        <h1>My Course Registrations</h1>
        <p>Review the courses currently on your schedule or register for another available course.</p>
        <a href="{{ route('registrations.create') }}" class="btn-secondary mt-5 border-white/50 bg-white/10 text-white hover:bg-white/20 hover:text-white">Register for a Course</a>
    </div>
    <div class="image-banner-media">
        <img src="https://images.pexels.com/photos/267885/pexels-photo-267885.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Graduates celebrating the completion of their studies" fetchpriority="high">
    </div>
</header>

<div class="table-scroll">
    <table class="data-table">
        <caption class="sr-only">Courses registered to your account</caption>
        <thead>
            <tr>
                @if($canManageRegistrations)
                    <th scope="col">Student</th>
                @endif
                <th scope="col">Course Name</th>
                <th scope="col">Course Code</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations as $reg)
            <tr>
                @if($canManageRegistrations)
                    <td>
                        <span class="font-semibold text-coffee-800">{{ $reg->user->name }}</span>
                        <span class="block text-sm text-coffee-500">{{ $reg->user->email }}</span>
                    </td>
                @endif
                <td class="font-semibold text-coffee-800">{{ $reg->course->name }}</td>
                <td>{{ $reg->course->code }}</td>
                <td>
                    <form action="{{ route('registrations.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Drop this course?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-sm font-semibold text-red-700 hover:text-red-900 hover:underline">Drop Course</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="{{ $canManageRegistrations ? 4 : 3 }}" class="py-12 text-center">
                    <p class="font-semibold text-coffee-800">No course registrations yet</p>
                    <p class="mt-1 text-sm text-coffee-500">Choose an available course to get started.</p>
                    <a href="{{ route('registrations.create') }}" class="btn-primary mt-4">Find a Course</a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection