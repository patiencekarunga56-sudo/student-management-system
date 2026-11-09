@extends('layouts.app')

@section('content')
<div class="page-shell max-w-2xl">
    
    <div class="mb-6">
        <a href="{{ route('students.index') }}" class="inline-flex items-center text-sm font-semibold text-coffee-600 hover:text-coffee-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Students
        </a>
    </div>

    <div class="surface-panel overflow-hidden">
        
        <!-- Form Header -->
        <div class="grid border-b border-coffee-100 bg-coffee-50 md:grid-cols-[1fr_14rem]">
            <div class="self-center px-6 py-5">
                <h1 class="text-2xl font-bold text-coffee-800">Add New Student</h1>
                <p class="text-base text-coffee-600 mt-2">Create a student account and provide the information needed to access the portal.</p>
            </div>
            <div class="h-36 overflow-hidden md:h-full">
                <img src="https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=900" alt="A student working on a laptop" class="h-full w-full object-cover">
            </div>
        </div>

        <!-- Form Body -->
        <div class="p-6 sm:p-8">
            <form action="{{ route('students.store') }}" method="POST" class="space-y-5" aria-label="New student details">
                @csrf
                
                <div>
                    <label for="name" class="form-label">Full Name <span class="text-accent-600">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Aisha Namuli" 
                           class="form-control">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="form-label">Email Address <span class="text-accent-600">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="student@example.com" 
                           class="form-control">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password" class="form-label">Temporary Password <span class="text-accent-600">*</span></label>
                    <input type="password" id="password" name="password" required minlength="8" placeholder="Minimum 8 characters"
                           class="form-control">
                    @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Form Actions -->
                <div class="pt-4 flex flex-col-reverse gap-3 border-t border-coffee-100 mt-6 sm:flex-row sm:items-center sm:justify-end">
                    <a href="{{ route('students.index') }}" class="btn-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn-primary">
                        Save Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection