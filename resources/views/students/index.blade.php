@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Manage Students</h1>
    <a href="{{ route('students.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Add Student</a>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 font-medium text-gray-600">Name</th>
                <th class="p-4 font-medium text-gray-600">Email</th>
                <th class="p-4 font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="border-b last:border-0 hover:bg-gray-50">
                <td class="p-4">{{ $student->name }}</td>
                <td class="p-4 text-gray-500">{{ $student->email }}</td>
                <td class="p-4 flex space-x-3">
                    <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:underline">Edit</a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('Delete student?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection