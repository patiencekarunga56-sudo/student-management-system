@extends('layouts.app')

@section('content')
<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Pending Approvals</h1>
        <p class="text-sm text-gray-500 mt-1">Approve new Lecturers and Administrators before they can access the system.</p>
    </div>
    
    <!-- Back Button -->
    <a href="{{ route('users.index') }}" class="text-sm font-medium text-[#6d4c41] hover:text-[#5d4037] hover:underline transition">
        &larr; Back to Users
    </a>
</div>

<!-- Success Message -->
@if(session('success'))
    <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 flex items-center gap-3">
        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="text-sm font-medium text-green-700">{{ session('success') }}</span>
    </div>
@endif

<!-- Pending Users List -->
<div class="space-y-4">
    @forelse($users as $user)
        <div class="flex flex-col sm:flex-row sm:items-center justify-between p-5 rounded-lg border border-gray-200 bg-white shadow-sm gap-4">
            
            <!-- User Info -->
            <div class="flex items-start gap-4">
                <!-- Avatar Initial -->
                <div class="h-12 w-12 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center text-gray-700 font-bold text-lg shrink-0">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                
                <div>
                    <p class="font-bold text-gray-800 text-lg">{{ $user->name }}</p>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    
                    <div class="flex items-center gap-2 mt-2">
                        <!-- Role Badge -->
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $user->role }}
                        </span>
                        <!-- Time Badge -->
                        <span class="text-xs text-gray-400">
                            Requested {{ $user->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-2 shrink-0">
                <form method="POST" action="{{ route('users.approve', $user) }}">
                    @csrf
                    <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold text-white bg-[#6d4c41] hover:bg-[#5d4037] transition-colors shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Approve
                    </button>
                </form>
            </div>

        </div>
    @empty
        <!-- Empty State -->
        <div class="p-12 rounded-lg border border-gray-200 bg-white text-center shadow-sm">
            <div class="flex justify-center mb-4">
                <div class="h-16 w-16 rounded-full bg-gray-50 flex items-center justify-center text-gray-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-1">No pending approvals 🎉</h3>
            <p class="text-sm text-gray-500">You're all caught up. New requests will appear here.</p>
        </div>
    @endforelse
</div>
@endsection