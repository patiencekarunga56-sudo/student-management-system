<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">My Course Registrations</h1>
    <a href="<?php echo e(route('registrations.create')); ?>" class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700">+ Register for Course</a>
</div>

<div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50 border-b">
            <tr>
                <th class="p-4 font-medium text-gray-600">Course Name</th>
                <th class="p-4 font-medium text-gray-600">Course Code</th>
                <th class="p-4 font-medium text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr class="border-b last:border-0 hover:bg-gray-50">
                <td class="p-4"><?php echo e($reg->course->name); ?></td>
                <td class="p-4 text-gray-500"><?php echo e($reg->course->code); ?></td>
                <td class="p-4">
                    <form action="<?php echo e(route('registrations.destroy', $reg->id)); ?>" method="POST" onsubmit="return confirm('Drop this course?');">
                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-500 hover:underline text-sm">Drop Course</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="p-4 text-center text-gray-500">You are not registered for any courses yet.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/registrations/index.blade.php ENDPATH**/ ?>