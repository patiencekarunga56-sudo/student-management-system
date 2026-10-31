<!-- TAB 3: COURSE MANAGEMENT  -->
<section id="tab-content-courses" class="hidden space-y-6">

  {{-- ✅ Success / error flash --}}
  @if (session('success'))
    <div class="p-3 text-sm text-green-700 bg-green-50 rounded-xl border border-green-200">
      {{ session('success') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="p-3 text-sm text-red-700 bg-red-50 rounded-xl border border-red-200">
      <ul class="list-disc list-inside space-y-0.5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <!-- Header bar -->
  <div class="bg-white p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
    <div>
      <h2 class="text-xl font-extrabold text-mubs-navy">Course Catalog Management</h2>
   
    </div>

    <div class="flex items-center space-x-3 w-full sm:w-auto">
      <!-- Search form (real GET to dashboard) -->
      <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center space-x-2 flex-1 sm:flex-none">
        <input
          type="text"
          name="search"
          value="{{ request('search') }}"
          placeholder="Filter by code/title..."
          class="px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none flex-1 sm:w-56"
        >
        <button type="submit" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold px-4 py-2.5 rounded-xl text-xs transition-all shrink-0">
          Search
        </button>
      </form>

      <button onclick="openAddCourseModal()" class="bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold px-4 py-2.5 rounded-xl text-xs shadow-md transition-all flex items-center space-x-2 shrink-0">
        <i class="fa-solid fa-book-open text-xs"></i>
        <span>Add New Course</span>
      </button>
    </div>
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
            <th class="p-4">Department</th>
            <th class="p-4">Semester / Year</th>
            <th class="p-4 text-center">Actions</th>
          </tr>
        </thead>
        <tbody id="courseTableBody" class="divide-y divide-slate-100 font-medium">

          @forelse ($courses as $course)
            <tr class="hover:bg-slate-50 transition-colors">
              <td class="p-4 font-mono font-bold text-mubs-amber">{{ $course->course_code }}</td>
              <td class="p-4 font-bold text-mubs-navy">{{ $course->course_name }}</td>
              <td class="p-4 font-semibold">{{ $course->credit_units }}</td>
              <td class="p-4 text-slate-500">{{ $course->department }}</td>
              <td class="p-4 font-semibold">{{ $course->semester }} — {{ $course->year_of_study }}</td>
              <td class="p-4 text-center space-x-1">

                <!-- Edit -->
                <button
                  type="button"
                  onclick='openEditCourseModal(@json($course))'
                  class="text-amber-600 hover:text-amber-800 p-1.5 rounded-lg hover:bg-amber-50 transition-colors"
                  title="Edit course"
                >
                  <i class="fa-solid fa-pen-to-square"></i>
                </button>

                <!-- Delete -->
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="inline-block"
                      onsubmit="return confirm('Delete this course?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="text-rose-500 hover:text-rose-700 p-1.5 rounded-lg hover:bg-rose-50 transition-colors" title="Delete course">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </form>

              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="p-8 text-center text-slate-500">
                No courses added yet. Click <strong>“Add New Course”</strong> to get started.
              </td>
            </tr>
          @endforelse

        </tbody>
      </table>
    </div>

    <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
      <span>Showing <strong>{{ $courses->count() }}</strong> course(s)</span>
    </div>
  </div>

  <!-- Add / Edit Course Modal -->
  <div id="courseModal" class="fixed inset-0 z-50 hidden bg-black/50 items-center justify-center px-4">
    <div class="bg-white rounded-3xl p-6 w-full max-w-md shadow-2xl">
      <h3 id="courseModalTitle" class="text-lg font-extrabold text-mubs-navy mb-4">Add New Course</h3>

      <form id="courseForm" method="POST" action="{{ route('courses.store') }}" class="space-y-3">
        @csrf
        <input type="hidden" name="_method" id="courseMethod" value="POST">
        <input type="hidden" name="course_id" id="course_id" value="">

        <input type="text" name="course_code" id="course_code" required placeholder="Course Code (e.g. BIST1101)"
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        <input type="text" name="course_name" id="course_name" required placeholder="Course Title"
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        <input type="text" name="department" id="department" required placeholder="Department / Lecturer"
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        <input type="number" name="credit_units" id="credit_units" required min="1" max="10" placeholder="Credit Units"
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">

        <select name="semester" id="semester" required
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">
          <option value="">Select Semester</option>
          <option value="Semester 1">Semester 1</option>
          <option value="Semester 2">Semester 2</option>
        </select>

        <select name="year_of_study" id="year_of_study" required
          class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm">
          <option value="">Select Year</option>
          <option value="Year 1">Year 1</option>
          <option value="Year 2">Year 2</option>
          <option value="Year 3">Year 3</option>
          <option value="Year 4">Year 4</option>
        </select>

        <div class="flex justify-end space-x-2 pt-2">
          <button type="button" onclick="closeCourseModal()" class="px-4 py-2 rounded-xl bg-slate-200 text-slate-700 text-sm font-bold">Cancel</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-mubs-amber text-white text-sm font-bold">Save</button>
        </div>
      </form>
    </div>
  </div>

</section>

<script>
  function openAddCourseModal() {
    document.getElementById('courseModalTitle').textContent = 'Add New Course';
    document.getElementById('courseForm').action = "{{ route('courses.store') }}";
    document.getElementById('courseMethod').value = 'POST';
    document.getElementById('courseForm').reset();
    document.getElementById('course_id').value = '';

    const m = document.getElementById('courseModal');
    m.classList.remove('hidden');
    m.classList.add('flex');
  }

  function openEditCourseModal(course) {
    document.getElementById('courseModalTitle').textContent = 'Edit Course';
    document.getElementById('courseForm').action = '/admin/courses/' + course.id;
    document.getElementById('courseMethod').value = 'PUT';

    document.getElementById('course_id').value     = course.id;
    document.getElementById('course_code').value   = course.course_code;
    document.getElementById('course_name').value   = course.course_name;
    document.getElementById('department').value    = course.department;
    document.getElementById('credit_units').value  = course.credit_units;
    document.getElementById('semester').value      = course.semester;
    document.getElementById('year_of_study').value = course.year_of_study;

    const m = document.getElementById('courseModal');
    m.classList.remove('hidden');
    m.classList.add('flex');
  }

  function closeCourseModal() {
    const m = document.getElementById('courseModal');
    m.classList.add('hidden');
    m.classList.remove('flex');
  }
</script>