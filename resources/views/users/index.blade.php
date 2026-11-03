@extends('layouts.app')

@section('content')
<!-- Header with Pending Approvals Button -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Manage User Roles</h1>
    
    <a href="{{ route('users.pending') }}" class="bg-[#6d4c41] text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-[#5d4037] transition-colors shadow-sm flex items-center gap-2">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        Pending Approvals
    </a>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 font-medium text-gray-600">Name</th>
                <th class="p-4 font-medium text-gray-600">Email</th>
                <th class="p-4 font-medium text-gray-600">Current Role</th>
                <th class="p-4 font-medium text-gray-600">Change Role</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="border-b last:border-0 hover:bg-gray-50">
                <td class="p-4">{{ $user->name }}</td>
                <td class="p-4 text-gray-500">{{ $user->email }}</td>
                <td class="p-4">
                    <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">{{ $user->role }}</span>
                    <!-- Optional: Show a red "Pending" badge if they aren't approved yet -->
                    @if(!$user->is_approved && in_array($user->role, ['Lecturer', 'Administrator']))
                        <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded ml-1">Pending</span>
                    @endif
                </td>
                <td class="p-4">
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="flex items-center space-x-2">
                        @csrf @method('PUT')
                        <select name="role" class="border p-1 text-sm rounded">
                            <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>Student</option>
                            <option value="Lecturer" {{ $user->role == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                            <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                        </select>
                        <button type="submit" class="bg-gray-800 text-white px-3 py-1 text-sm rounded hover:bg-black">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection