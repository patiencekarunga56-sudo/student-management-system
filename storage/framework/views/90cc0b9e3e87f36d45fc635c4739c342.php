   <!-- TAB 4: COURSE REGISTRATIONS -->
      <section id="tab-content-registrations" class="hidden space-y-6">
        
        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
          <div>
            <h2 class="text-xl font-extrabold text-mubs-navy">Student Course Registrations</h2>
      
          </div>
          <button onclick="openRegisterCourseModal()" class="bg-mubs-navy hover:bg-mubs-navyHover text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-md transition-all flex items-center space-x-2">
            <i class="fa-solid fa-link text-xs"></i>
            <span>Register Student to Course</span>
          </button>
        </div>

        <!-- Registration Mapping Table -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
              <thead>
                <tr class="bg-mubs-bgLight border-b border-slate-200 text-mubs-navy uppercase font-bold tracking-wider">
                  <th class="p-4">Reg No.</th>
                  <th class="p-4">Student Name</th>
                  <th class="p-4">Course Enrolled</th>
                  <th class="p-4">Registration Date</th>
                  <th class="p-4">Validation Status</th>
                  <th class="p-4 text-center">Action</th>
                </tr>
              </thead>
              <tbody id="registrationTableBody" class="divide-y divide-slate-100 font-medium">
                <!-- Dynamically populated via JS -->
              </tbody>
            </table>
          </div>
        </div>

      </section>
<?php /**PATH C:\Users\DELL\Desktop\student-management-system-main\resources\views/admin/screens/students.blade.php ENDPATH**/ ?>