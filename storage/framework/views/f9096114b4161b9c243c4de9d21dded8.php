<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    
    <!-- Back Button -->
    <div class="mb-6">
        <a href="<?php echo e(route('courses.index')); ?>" class="inline-flex items-center text-sm font-semibold text-brand-600 hover:text-brand-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Courses
        </a>
    </div>

    <!-- Course Header Card -->
    <div class="bg-white rounded-2xl border border-brand-100 shadow-sm overflow-hidden mb-8">
        <div class="bg-brand-800 p-8 text-white">
            <span class="inline-block px-3 py-1 rounded-md bg-white/20 text-white text-xs font-bold uppercase tracking-wider mb-4">
                <?php echo e($course->code); ?>

            </span>
            <h1 class="text-3xl font-bold mb-3"><?php echo e($course->name); ?></h1>
            
            <div class="flex items-center gap-2 text-brand-100 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                Lecturer: <strong class="text-white"><?php echo e($course->lecturer ? $course->lecturer->name : 'Not Assigned'); ?></strong>
            </div>
        </div>

        <!-- Registered Students Section -->
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-brand-800">Registered Students</h2>
                <span class="bg-brand-50 text-brand-700 py-1 px-3 rounded-full text-sm font-bold border border-brand-100">
                    <?php echo e($course->students->count()); ?> Enrolled
                </span>
            </div>

            <div class="bg-brand-50/50 rounded-xl border border-brand-100 overflow-hidden">
                <ul class="divide-y divide-brand-100">
                    <?php $__empty_1 = true; $__currentLoopData = $course->students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <li class="p-4 flex items-center gap-4 hover:bg-white transition-colors">
                            <!-- Student Avatar Initial -->
                            <div class="w-10 h-10 rounded-full bg-brand-200 text-brand-800 flex items-center justify-center font-bold text-sm shrink-0">
                                <?php echo e(substr($student->name, 0, 1)); ?>

                            </div>
                            <div>
                                <p class="text-sm font-semibold text-brand-800"><?php echo e($student->name); ?></p>
                                <p class="text-xs text-slate-500"><?php echo e($student->email); ?></p>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <li class="p-8 text-center flex flex-col items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-brand-300 mb-3"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            <p class="text-slate-500 text-sm">No students have registered for this course yet.</p>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/courses/show.blade.php ENDPATH**/ ?>