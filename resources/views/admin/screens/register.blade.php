
      <!-- TAB 2: STUDENT MANAGEMENT  -->
      <section id="tab-content-students" class="hidden space-y-6">
        
        <!-- Action Header Bar -->
        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
          <div>
            <h2 class="text-xl font-extrabold text-mubs-navy">Student Registry Management</h2>
            <p class="text-xs text-mubs-textMuted">Perform CRUD operations on enrolled students (Question 4a)</p>
          </div>
          <div class="flex items-center space-x-3 w-full sm:w-auto">
            <input 
              type="text" 
              id="studentTableSearch" 
              placeholder="Filter by name/reg no..." 
              onkeyup="filterStudentTable()"
              class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none flex-1 sm:w-64"
            >
            <button onclick="openAddStudentModal()" class="bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-md transition-all flex items-center space-x-2 shrink-0">
              <i class="fa-solid fa-plus text-xs"></i>
              <span>Add Student</span>
            </button>
          </div>
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
              <tbody id="studentTableBody" class="divide-y divide-slate-100 font-medium">
                <!-- Dynamically populated via JS -->
              </tbody>
            </table>
          </div>
          <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
            <span>Showing <strong id="student-count-visible">5</strong> students</span>
            <div class="flex space-x-2">
              <button class="px-3 py-1 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 text-xs font-semibold">Previous</button>
              <button class="px-3 py-1 bg-mubs-navy text-white rounded-lg text-xs font-semibold">1</button>
              <button class="px-3 py-1 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 text-xs font-semibold">Next</button>
            </div>
          </div>
        </div>

      </section>