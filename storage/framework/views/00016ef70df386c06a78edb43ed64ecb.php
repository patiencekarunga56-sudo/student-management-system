<?php $__env->startSection('content'); ?>
<div class="bg-white p-6 rounded-lg border border-gray-200 shadow-sm mb-6">
    <h1 class="text-2xl font-bold mb-2">Lecturer Dashboard</h1>
    <p class="text-gray-600">Welcome, <?php echo e(auth()->user()->name); ?>.</p>
</div>

<h2 class="text-xl font-bold mb-4">My Assigned Courses</h2>
<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="bg-white p-4 rounded-lg border border-gray-200 shadow-sm">
            <h3 class="font-bold text-lg text-blue-600"><?php echo e($course->name); ?></h3>
            <p class="text-sm text-gray-500 mb-2">Code: <?php echo e($course->code); ?></p>
            <p class="text-sm">Students Registered: <strong><?php echo e($course->students->count()); ?></strong></p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-gray-500">No courses assigned yet.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/lecturer/dashboard.blade.php ENDPATH**/ ?>