@extends('layouts.app')

@section('content')
<div class="page-shell">
<header class="image-banner">
    <div class="image-banner-copy">
        <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Account access</p>
        <h1>Manage User Roles</h1>
        <p>Review accounts, check approval status, and assign access levels.</p>
        <a href="{{ route('users.pending') }}" class="btn-secondary mt-5 border-white/50 bg-white/10 text-white hover:bg-white/20 hover:text-white">Pending Approvals</a>
    </div>
    <div class="image-banner-media">
        <img src="https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Working together at a laptop on campus" fetchpriority="high">
    </div>
</header>

<div class="table-scroll">
    <table class="data-table">
        <caption class="sr-only">Portal users and assigned roles</caption>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Current Role</th>
                <th scope="col">Change Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td class="font-semibold text-coffee-800">{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="inline-flex rounded-full bg-coffee-50 px-3 py-1 text-xs font-semibold text-coffee-700">{{ $user->role }}</span>
                    @if(!$user->is_approved && in_array($user->role, ['Lecturer', 'Administrator']))
                        <span class="ml-1 inline-flex rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-800">Pending</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('users.update', $user->id) }}" method="POST" class="flex min-w-64 items-center gap-2">
                        @csrf @method('PUT')
                        <label for="role-{{ $user->id }}" class="sr-only">Role for {{ $user->name }}</label>
                        <select id="role-{{ $user->id }}" name="role" class="form-control min-h-10 py-2">
                            <option value="Student" {{ $user->role == 'Student' ? 'selected' : '' }}>Student</option>
                            <option value="Lecturer" {{ $user->role == 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                            <option value="Administrator" {{ $user->role == 'Administrator' ? 'selected' : '' }}>Administrator</option>
                        </select>
                        <button type="submit" class="btn-primary min-h-10 px-3 py-2 text-sm">Update</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="py-12 text-center">
                    <p class="font-semibold text-coffee-800">No user accounts found</p>
                    <p class="mt-1 text-sm text-coffee-500">Registered portal accounts will appear here.</p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
@endsection