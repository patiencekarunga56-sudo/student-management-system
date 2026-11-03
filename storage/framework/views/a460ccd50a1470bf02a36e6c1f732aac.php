

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    
    <div class="mb-6">
        <a href="<?php echo e(route('students.index')); ?>" class="inline-flex items-center text-sm font-semibold text-brand-600 hover:text-brand-800 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
            Back to Students
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-brand-100 shadow-sm overflow-hidden">
        
        <!-- Form Header -->
        <div class="bg-brand-50 px-6 py-5 border-b border-brand-100">
            <h1 class="text-xl font-bold text-brand-800">Add New Student</h1>
            <p class="text-sm text-brand-600 mt-1">Create a new student account and grant them access to the portal.</p>
        </div>

        <!-- Form Body -->
        <div class="p-6 sm:p-8">
            <form action="<?php echo e(route('students.store')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Full Name <span class="text-gold-600">*</span></label>
                    <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required placeholder="e.g. Aisha Namuli" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email Address <span class="text-gold-600">*</span></label>
                    <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required placeholder="student@example.com" 
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1">Temporary Password <span class="text-gold-600">*</span></label>
                    <input type="password" id="password" name="password" required minlength="8" placeholder="Minimum 8 characters"
                           class="w-full border border-slate-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 transition-all">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-500 text-xs mt-1 block"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Form Actions -->
                <div class="pt-4 flex items-center justify-end gap-3 border-t border-brand-50 mt-6">
                    <a href="<?php echo e(route('students.index')); ?>" class="px-5 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:bg-slate-100 transition">
                        Cancel
                    </a>
                    <button type="submit" class="bg-brand-600 text-white px-6 py-2.5 rounded-lg shadow-sm hover:bg-brand-700 transition-colors text-sm font-semibold">
                        Save Student
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/students/create.blade.php ENDPATH**/ ?>