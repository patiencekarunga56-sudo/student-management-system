<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
        <div>
            <h1 class="text-2xl font-bold text-brand-800">Available Courses</h1>
            <p class="text-sm text-slate-500 mt-1">Browse the catalog of courses offered this semester.</p>
        </div>
        
        <?php if(auth()->user()->role === 'Administrator'): ?>
            <a href="<?php echo e(route('courses.create')); ?>" class="inline-flex items-center gap-2 bg-brand-600 text-white px-5 py-2.5 rounded-lg shadow-sm hover:bg-brand-700 transition-colors text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add Course
            </a>
        <?php endif; ?>
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white p-6 rounded-xl border border-brand-100 shadow-sm hover:shadow-md transition-shadow flex flex-col h-full">
                
                <!-- Card Header -->
                <div class="mb-4">
                    <span class="inline-block px-2.5 py-1 rounded-md bg-brand-50 text-brand-700 text-xs font-bold uppercase tracking-wider mb-3">
                        <?php echo e($course->code); ?>

                    </span>
                    <h3 class="font-bold text-xl text-brand-800 leading-tight"><?php echo e($course->name); ?></h3>
                </div>
                
                <!-- Lecturer Info -->
                <div class="flex items-center gap-2 mb-6 text-sm text-slate-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-brand-500"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    <span><?php echo e($course->lecturer ? $course->lecturer->name : 'Lecturer Not Assigned'); ?></span>
                </div>
                
                <!-- Actions (Pushed to the bottom) -->
                <div class="mt-auto pt-4 border-t border-brand-50 flex items-center justify-between">
                    <a href="<?php echo e(route('courses.show', $course->id)); ?>" class="text-brand-600 font-semibold text-sm hover:text-brand-800 transition">
                        View Details &rarr;
                    </a>
                    
                    <?php if(auth()->user()->role === 'Administrator'): ?>
                        <div class="flex items-center space-x-3">
                            <a href="<?php echo e(route('courses.edit', $course->id)); ?>" class="text-gold-600 font-medium text-sm hover:text-gold-500 transition">
                                Edit
                            </a>
                            <form action="<?php echo e(route('courses.destroy', $course->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?');" class="inline">
                                <?php echo csrf_field(); ?> 
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-500 font-medium text-sm hover:text-red-700 transition">
                                    Delete
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Empty State -->
            <div class="col-span-full py-12 text-center bg-white rounded-xl border border-brand-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto text-brand-300 mb-4"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                <h3 class="text-lg font-bold text-brand-800 mb-1">No courses available</h3>
                <p class="text-slate-500 text-sm">There are currently no courses in the system.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/courses/index.blade.php ENDPATH**/ ?>