

<?php $__env->startSection('content'); ?>
<div class="max-w-lg mx-auto bg-white p-6 rounded-lg border border-gray-200 shadow-sm">
    <h1 class="text-xl font-bold mb-4">Edit Student</h1>
    <form action="<?php echo e(route('students.update', $student->id)); ?>" method="POST">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="name" value="<?php echo e($student->name); ?>" required class="w-full border p-2 rounded">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" value="<?php echo e($student->email); ?>" required class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Student</button>
        <a href="<?php echo e(route('students.index')); ?>" class="ml-2 text-gray-500 hover:underline">Cancel</a>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/students/edit.blade.php ENDPATH**/ ?>