<!-- TAB 2: STUDENT MANAGEMENT  -->
<section id="tab-content-students" class="hidden space-y-6">
  
  <!-- Action Header Bar -->
  <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-extrabold text-mubs-navy">Student Registry Management</h2>
   
    </div>
    
    <!-- REAL SEARCH FORM (Submits to the same page) -->
    <form method="GET" action="<?php echo e(route('admin.dashboard')); ?>" class="flex items-center space-x-3 w-full sm:w-auto">
      <input 
        type="text" 
        name="search"
        value="<?php echo e(request('search')); ?>"
        placeholder="Filter by name/reg no..." 
        class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none flex-1 sm:w-64"
      >
      <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold px-4 py-2.5 rounded-xl text-xs transition-all shrink-0">
        Search
      </button>
      <button type="button" onclick="openAddStudentModal()" class="bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-md transition-all flex items-center space-x-2 shrink-0">
        <i class="fa-solid fa-plus text-xs"></i>
        <span>Add Student</span>
      </button>
    </form>
  </div>

  <!-- Student Table -->
  <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
      <table class="w-full text-left text-xs border-collapse">
        <thead>
          <tr class="bg-mubs-bgLight border-b border-slate-200 text-mubs-navy uppercase font-bold tracking-wider">
            <th class="p-4">Reg Number</th>
            <th class="p-4">Student Name</th>
            <th class="p-4">University Email</th>
            <th class="p-4">Program & Year</th>
            <th class="p-4">Status</th>
            <th class="p-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100 font-medium">
          <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
              <tr class="hover:bg-slate-50 transition-colors">
                  <td class="p-4 font-mono font-bold text-mubs-amber"><?php echo e($student->reg_number); ?></td>
                  <td class="p-4 font-bold text-mubs-navy"><?php echo e($student->name); ?></td>
                  <td class="p-4 text-slate-500"><?php echo e($student->email); ?></td>
                  <td class="p-4 font-semibold"><?php echo e($student->program); ?> - Year <?php echo e($student->year_of_study); ?></td>
                  <td class="p-4"><span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-full">Enrolled</span></td>
                  <td class="p-4 text-center">
                      
                      <!-- REAL DELETE FORM -->
                      <form action="<?php echo e(route('students.destroy', $student->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this student?');">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('DELETE'); ?>
                          <button type="submit" class="text-rose-500 hover:text-rose-700 p-1.5 rounded-lg hover:bg-rose-50 transition-colors">
                              <i class="fa-solid fa-trash-can"></i>
                          </button>
                      </form>

                  </td>
              </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
              <tr>
                  <td colspan="6" class="p-8 text-center text-slate-500">No students registered yet.</td>
              </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    
    <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
      <span>Showing <strong><?php echo e($students->count()); ?></strong> students</span>
      <div class="flex space-x-2">
        <button class="px-3 py-1 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 text-xs font-semibold">Previous</button>
        <button class="px-3 py-1 bg-mubs-navy text-white rounded-lg text-xs font-semibold">1</button>
        <button class="px-3 py-1 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 text-xs font-semibold">Next</button>
      </div>
    </div>
  </div>

</section><?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/admin/screens/register.blade.php ENDPATH**/ ?>