<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-xl font-bold mb-4">Register for a Course</h1>
    <form action="<?php echo e(route('registrations.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Select a Course</label>
            <select name="course_id" required class="w-full border p-2 rounded">
                <option value="">-- Choose Course --</option>
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($course->id); ?>"><?php echo e($course->name); ?> (<?php echo e($course->code); ?>)</option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Confirm Registration</button>
        <div class="text-center mt-4">
            <a href="<?php echo e(route('registrations.index')); ?>" class="text-sm text-gray-500 hover:underline">Cancel</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/registrations/create.blade.php ENDPATH**/ ?>