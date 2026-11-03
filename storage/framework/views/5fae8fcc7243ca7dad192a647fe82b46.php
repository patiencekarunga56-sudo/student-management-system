<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-2xl font-bold mb-2">Admin Dashboard</h1>
    <p class="text-gray-600">Welcome back, <?php echo e(auth()->user()->name); ?>. You can manage students, courses, and user roles here.</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>