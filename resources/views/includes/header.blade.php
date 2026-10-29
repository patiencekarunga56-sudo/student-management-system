   <nav class="bg-white border-b border-gray-100 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                
                <!-- Logo & Brand -->
                <div class="flex items-center gap-3">
                    <div class="w-20 h-10  flex items-center justify-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">

                    </div>
                    <span class="text-2xl font-bold text-[#0B2545] tracking-tight">MUBS</span>
                </div>

                <!-- Center Links -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-[#9A4D10] font-semibold text-base transition">Welcome</a>
                    <a href="#" class="text-gray-600 hover:text-[#0B2545] font-medium text-base transition">Student Portal</a>
                    <a href="#" class="text-gray-600 hover:text-[#0B2545] font-medium text-base transition">Admin Portal</a>
                    <a href="#" class="text-gray-600 hover:text-[#0B2545] font-medium text-base transition">Contact Us</a>
                </div>

                <!-- Right Side (Login / Sign Up) -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="/login" class="text-[#0B2545] font-semibold hover:text-[#9A4D10] transition">Login</a>
                    <a href="/register" class="bg-[#9A4D10] hover:bg-[#7a3c0c] text-white px-6 py-2.5 rounded-lg font-medium shadow-sm transition">
                        Sign Up
                    </a>
                    <!-- User Avatar Placeholder -->
                
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600 hover:text-[#0B2545] focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>