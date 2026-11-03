<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-xl font-bold mb-4">Edit Course</h1>
    <form action="<?php echo e(route('courses.update', $course->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Name</label>
            <input type="text" name="name" value="<?php echo e($course->name); ?>" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Course Code</label>
            <input type="text" name="code" value="<?php echo e($course->code); ?>" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Assign Lecturer</label>
            <select name="lecturer_id" class="w-full border p-2 rounded">
                <option value="">-- Select Lecturer --</option>
                <?php $__currentLoopData = $lecturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lecturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($lecturer->id); ?>" <?php echo e($course->lecturer_id == $lecturer->id ? 'selected' : ''); ?>>
                        <?php echo e($lecturer->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Course</button>
        <a href="<?php echo e(route('courses.index')); ?>" class="ml-2 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/courses/edit.blade.php ENDPATH**/ ?>