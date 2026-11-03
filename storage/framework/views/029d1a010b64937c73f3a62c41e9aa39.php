<header class="fixed top-0 z-50 w-full bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <a href="<?php echo e(route('home')); ?>" class="flex items-center">
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Student Management System" class="h-10 w-10 me-3">
                <div class="flex flex-col">
                    <span class="font-semibold text-slate-900 text-base">Student Management</span>
                    <span class="text-xs text-slate-500">Courses and registrations</span>
                </div>
            </a>
            <div class="flex items-center gap-3">
                <a href="<?php echo e(route('login')); ?>" class="text-sm font-medium text-slate-600 hover:text-slate-900">Sign in</a>
                <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-[#2563eb] hover:bg-[#1d4ed8] rounded-lg text-sm font-medium text-white">Register</a>
            </div>
        </div>
    </div>
</header>
<?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/includes/public-header.blade.php ENDPATH**/ ?>