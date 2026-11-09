@extends('layouts.app')

@section('content')
<div class="page-shell">
<header class="image-banner">
    <div class="image-banner-copy">
        <p class="text-sm font-bold uppercase tracking-wider text-amber-300">Account access</p>
        <h1>Pending Approvals</h1>
        <p>Approve lecturer and administrator accounts before they can access the system.</p>
        <a href="{{ route('users.index') }}" class="btn-secondary mt-5 border-white/50 bg-white/10 text-white hover:bg-white/20 hover:text-white">&larr; Back to users</a>
    </div>
    <div class="image-banner-media">
        <img src="https://images.pexels.com/photos/3184325/pexels-photo-3184325.jpeg?auto=compress&cs=tinysrgb&w=1100" alt="Colleagues reviewing information together" fetchpriority="high">
    </div>
</header>

<!-- Pending Users List -->
<div class="space-y-4">
    @forelse($users as $user)
        <article class="surface-panel flex flex-col justify-between gap-4 p-5 sm:flex-row sm:items-center sm:p-6">
            
            <!-- User Info -->
            <div class="flex items-start gap-4">
                <!-- Avatar Initial -->
                <div class="h-12 w-12 rounded-full bg-coffee-50 border border-coffee-100 flex items-center justify-center text-coffee-700 font-bold text-lg shrink-0" aria-hidden="true">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                
                <div>
                    <h2 class="font-bold text-coffee-800 text-lg">{{ $user->name }}</h2>
                    <p class="text-base text-coffee-500">{{ $user->email }}</p>
                    
                    <div class="flex items-center gap-2 mt-2">
                        <!-- Role Badge -->
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-coffee-50 text-coffee-700">
                            {{ $user->role }}
                        </span>
                        <!-- Time Badge -->
                        <span class="text-sm text-coffee-500">
                            Requested {{ $user->created_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex items-center gap-2 sm:shrink-0">
                <form method="POST" action="{{ route('users.approve', $user) }}">
                    @csrf
                    <button type="submit" class="btn-primary w-full sm:w-auto">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Approve
                    </button>
                </form>
            </div>

        </article>
    @empty
        <!-- Empty State -->
        <div class="surface-panel p-8 text-center sm:p-12">
            <div class="flex justify-center mb-4">
                <div class="h-16 w-16 rounded-full bg-coffee-50 flex items-center justify-center text-coffee-400">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <h2 class="text-lg font-bold text-coffee-800 mb-1">No pending approvals</h2>
            <p class="text-base text-coffee-500">You're all caught up. New requests will appear here.</p>
        </div>
    @endforelse
</div>
</div>
@endsection