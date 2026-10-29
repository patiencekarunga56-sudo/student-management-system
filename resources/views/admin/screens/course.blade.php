
      <!-- TAB 3: COURSE MANAGEMENT (CRUD) -->
      <section id="tab-content-courses" class="hidden space-y-6">
        
        <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
          <div>
            <h2 class="text-xl font-extrabold text-mubs-navy">Course Catalog Management</h2>
            <p class="text-xs text-mubs-textMuted">Manage academic course offerings and lecturer assignments (Question 4b)</p>
          </div>
          <button onclick="openAddCourseModal()" class="bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-md transition-all flex items-center space-x-2">
            <i class="fa-solid fa-book-open text-xs"></i>
            <span>Add New Course</span>
          </button>
        </div>

        <!-- Courses Grid Table -->
        <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs border-collapse">
              <thead>
                <tr class="bg-mubs-bgLight border-b border-slate-200 text-mubs-navy uppercase font-bold tracking-wider">
                  <th class="p-4">Course Code</th>
                  <th class="p-4">Course Title</th>
                  <th class="p-4">Credit Units</th>
                  <th class="p-4">Assigned Lecturer</th>
                  <th class="p-4">Semester</th>
                  <th class="p-4 text-center">Actions</th>
                </tr>
              </thead>
              <tbody id="courseTableBody" class="divide-y divide-slate-100 font-medium">
                <!-- Dynamically populated via JS -->
              </tbody>
            </table>
          </div>
        </div>

      </section>