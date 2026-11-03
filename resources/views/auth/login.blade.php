@extends('layouts.app')

@section('content')
<div class="flex-1 flex items-center justify-center p-4 bg-[#faf6f2]">
    <div class="w-full max-w-md">
        <!-- Start: Brand -->
        <div class="flex justify-center mb-8">
            <a href="{{ url('/') }}" class="inline-flex flex-col items-center gap-3">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Campus Service Portal" class="h-16 w-16">
                <span class="text-sm font-semibold text-[#3e2723]">Campus Service Portal</span>
            </a>
        </div>
        <!-- End: Brand -->

        <!-- Start: Sign in card -->
        <div class="rounded-2xl border border-[#e8ddd2] bg-white p-6 sm:p-8 shadow-sm">
            <div class="mb-6">
                <h1 class="text-xl font-bold text-[#3e2723]">Sign in</h1>
                <p class="mt-1 text-sm text-[#8d6e63]">Use your campus email to sign in .</p>
            </div>

            <!-- Start: Sign in form -->
            <form method="POST" action="{{ route('login.store') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-[#5d4037] mb-2">Campus email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#a1887f]">
                            <i data-lucide="mail" class="h-5 w-5"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                            placeholder="you@campus.ac.ug"
                            class="block w-full pl-10 pr-3 py-3 rounded-xl bg-white border border-[#d7c4b5] text-[#3e2723] placeholder-[#bcaaa4] focus:outline-none focus:border-[#795548] focus:ring-1 focus:ring-[#795548]">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-[#5d4037] mb-2">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-[#a1887f]">
                            <i data-lucide="lock" class="h-5 w-5"></i>
                        </div>
                        <input type="password" id="password" name="password" required placeholder="••••••••"
                            class="block w-full pl-10 pr-3 py-3 rounded-xl bg-white border border-[#d7c4b5] text-[#3e2723] placeholder-[#bcaaa4] focus:outline-none focus:border-[#795548] focus:ring-1 focus:ring-[#795548]">
                    </div>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#6d4c41] hover:bg-[#5d4037] transition-colors">Sign in</button>
            </form>
            <!-- End: Sign in form -->

            <p class="mt-6 text-center text-sm text-[#8d6e63]">
                New here?
                <a href="{{ route('register') }}" class="text-[#6d4c41] hover:text-[#5d4037] font-medium">Create an account</a>
            </p>
        </div>
        <!-- End: Sign in card -->
    </div>
</div>
@endsection