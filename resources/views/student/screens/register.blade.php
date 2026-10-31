<!-- TAB 1: COURSE REGISTRATION (Question 4c) -->
<div id="tab-register" class="space-y-4">
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
    <div>
      <h2 class="text-lg font-bold text-mubs-navy">Available Courses for Semester I (2026/2027)</h2>
      <p class="text-xs text-mubs-textMuted">Select available courses to register. System prevents duplicate registrations automatically.</p>
    </div>
    <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-bold px-3 py-1 rounded-full">
      Registration Open
    </span>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-4 pt-2">
    
    {{-- 🔄 Dynamic Loop: Shows real courses from the database --}}
    @forelse ($courses as $course)
      <div class="border border-gray-200 rounded-2xl p-5 hover:border-mubs-amber transition-all flex flex-col justify-between space-y-4 bg-gray-50/50">
        <div class="space-y-1">
          <div class="flex justify-between items-center">
            <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-2.5 py-1 rounded-lg">
              {{ $course->course_code }}
            </span>
            <span class="text-xs font-semibold text-mubs-textMuted">
              {{ $course->credit_units }} Credit Units
            </span>
          </div>
          <h3 class="font-bold text-mubs-navy text-base mt-2">{{ $course->course_name }}</h3>
          <p class="text-xs text-mubs-textMuted">Department: {{ $course->department }}</p>
        </div>
        
        <button onclick="registerCourse('{{ $course->id }}', '{{ $course->course_code }}')" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow-sm">
          Register Course
        </button>
      </div>
    @empty
      <div class="col-span-1 md:col-span-2 text-center p-8 bg-slate-50 border border-slate-200 rounded-2xl">
        <p class="text-slate-500 font-medium text-sm">No courses are currently available for registration.</p>
      </div>
    @endforelse

  </div>
</div>