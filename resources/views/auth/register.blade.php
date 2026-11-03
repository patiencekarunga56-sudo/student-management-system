<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Student Management</title>
    
    <!-- Image Path -->
    <link rel="icon" type="image/png" href="assets/img/logo.png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 
                            50: '#fdf8f6',
                            100: '#f2e8e5',
                            200: '#e5d2cb',
                            500: '#8b5a2b',
                            600: '#6b4423',
                            700: '#4a2c14',
                            800: '#35200e'
                        },
                        gold: { 
                            500: '#f59e0b', 
                            600: '#d97706' 
                        },
                    },
                    fontFamily: { sans: ['Inter', 'system-ui', 'sans-serif'] },
                }
            }
        };
    </script>
</head>
<body class="bg-brand-50 text-slate-900 font-sans antialiased min-h-screen flex flex-col justify-center items-center p-4">

    <div class="w-full max-w-md">
        
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <a href="/">
                <img src="assets/img/logo.png" alt="Logo" class="h-16 w-16 object-contain">
            </a>
        </div>

        <!-- Register Card -->
        <div class="rounded-2xl border border-brand-200 bg-white p-6 sm:p-8 shadow-lg shadow-brand-100/50">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-brand-800">Create your account</h1>
                <p class="mt-2 text-sm text-slate-500">Students and lecturers can sign up here to access the portal.</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                @csrf
                
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Full name <span class="text-gold-600">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="Aisha Namuli" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Campus email <span class="text-gold-600">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="student@example.com" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <!-- Role selector -->
                <div>
                    <label for="role" class="block text-sm font-medium text-slate-700 mb-1">Register as <span class="text-gold-600">*</span></label>
                    <select id="role" name="role" required
                            class="w-full border border-slate-300 rounded-lg p-2.5 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                        <option value="Student" {{ old('role') === 'Student' ? 'selected' : '' }}>Student</option>
                        <option value="Lecturer" {{ old('role') === 'Lecturer' ? 'selected' : '' }}>Lecturer</option>
                        <option value="Administrator" {{ old('role') === 'Administrator' ? 'selected' : '' }}>Administrator</option>
                    </select>
                    @error('role') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                    <p class="mt-1 text-xs text-slate-400">
                        Lecturer &amp; Administrator accounts require admin approval before sign-in.
                    </p>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Password <span class="text-gold-600">*</span></label>
                    <input type="password" id="password" name="password" required minlength="8" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    @error('password') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1">Confirm password <span class="text-gold-600">*</span></label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required minlength="8" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                </div>

                <!-- Brown Button -->
                <button type="submit" class="w-full py-3 px-4 mt-2 rounded-lg text-sm font-bold text-white bg-brand-600 hover:bg-brand-700 transition-colors shadow-md">
                    Create Account
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-slate-500">
                Already have an account?
                <a href="{{ route('login') }}" class="text-brand-600 font-semibold hover:text-brand-800 transition">Sign in</a>
            </p>
        </div>
    </div>

</body>
</html>