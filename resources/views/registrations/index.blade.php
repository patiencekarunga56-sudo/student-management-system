@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">My Course Registrations</h1>
    <a href="{{ route('registrations.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Register for Course</a>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 font-medium text-gray-600">Course Name</th>
                <th class="p-4 font-medium text-gray-600">Course Code</th>
                <th class="p-4 font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($registrations as $reg)
            <tr class="border-b last:border-0 hover:bg-gray-50">
                <td class="p-4">{{ $reg->course->name }}</td>
                <td class="p-4 text-gray-500">{{ $reg->course->code }}</td>
                <td class="p-4">
                    <form action="{{ route('registrations.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Drop this course?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline text-sm">Drop Course</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="p-4 text-center text-gray-500">You are not registered for any courses yet.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection