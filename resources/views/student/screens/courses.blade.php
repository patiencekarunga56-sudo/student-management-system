<!-- TAB 2: MY REGISTERED COURSES -->
<div id="tab-my-courses" class="space-y-4 hidden">
  <h2 class="text-lg font-bold text-mubs-navy">Available Courses / Your Registrations</h2>
  <div class="overflow-x-auto bg-white rounded-2xl border border-slate-200 shadow-sm p-4">
    <table class="w-full text-left text-xs sm:text-sm">
      <thead class="bg-gray-100 text-mubs-navy uppercase font-bold">
        <tr>
          <th class="p-3.5 rounded-l-xl">Course Code</th>
          <th class="p-3.5">Course Name</th>
          <th class="p-3.5">Credit Units</th>
          <th class="p-3.5">Status</th>
          <th class="p-3.5 rounded-r-xl text-right">Action</th>
        </tr>
      </thead>
      <tbody id="registered-courses-list" class="divide-y divide-gray-100">
        
        {{-- Loop through the courses passed from the controller --}}
        @forelse ($courses as $course)
          <tr>
            <td class="p-3.5 font-bold text-mubs-amber">{{ $course->course_code }}</td>
            <td class="p-3.5 font-medium text-mubs-navy">{{ $course->course_name }}</td>
            <td class="p-3.5">{{ $course->credit_units }} CU</td>
            <td class="p-3.5">
              <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-full text-xs font-bold">Available</span>
            </td>
            <td class="p-3.5 text-right">
              <button class="bg-mubs-amber text-white px-3 py-1.5 rounded-lg font-semibold text-xs hover:bg-mubs-amberHover transition-all">
                Register
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="p-8 text-center text-slate-500">
              No courses available in the system yet.
            </td>
          </tr>
        @endforelse

      </tbody>
    </table>
  </div>
</div>