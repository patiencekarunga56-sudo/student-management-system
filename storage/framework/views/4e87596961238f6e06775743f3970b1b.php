

<?php $__env->startSection('content'); ?>
<div class="flex-1 flex items-center justify-center p-4 bg-[#faf6f2]">
    <div class="w-full max-w-md">
        <!-- Brand -->
        <div class="flex justify-center mb-8">
            <a href="<?php echo e(url('/')); ?>" class="inline-flex flex-col items-center gap-3">
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" alt="Campus Service Portal" class="h-16 w-16">
                <span class="text-sm font-semibold text-[#3e2723]">Campus Service Portal</span>
            </a>
        </div>

        <!-- Pending Card -->
        <div class="rounded-2xl border border-[#e8ddd2] bg-white p-6 sm:p-8 shadow-sm text-center">
            <div class="flex justify-center mb-4">
                <div class="h-14 w-14 rounded-full bg-[#faf6f2] flex items-center justify-center text-[#8d6e63]">
                    <i data-lucide="clock" class="h-7 w-7"></i>
                </div>
            </div>

            <h1 class="text-xl font-bold text-[#3e2723]">Account Pending Approval</h1>
            <p class="mt-2 text-sm text-[#8d6e63]">
                Your account (<?php echo e(auth()->user()->role); ?>) has been created, but an Administrator must approve it before you can access the dashboard.
            </p>
            
            <form method="POST" action="<?php echo e(route('logout')); ?>" class="mt-6">
                <?php echo csrf_field(); ?>
                <button type="submit" class="w-full py-3 px-4 rounded-xl text-sm font-semibold text-white bg-[#6d4c41] hover:bg-[#5d4037] transition-colors">
                    Sign out
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/auth/pending-approval.blade.php ENDPATH**/ ?>