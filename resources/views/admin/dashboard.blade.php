<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MUBS Admin Dashboard - BUC3131 Student Management System</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <!-- Chart.js for Analytics -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
          },
          colors: {
            mubs: {
              navy: '#0C2340',
              navyHover: '#08172C',
              navyLight: '#143358',
              amber: '#A05217',
              amberHover: '#874211',
              amberLight: '#FDF6ED',
              bgLight: '#F8FAFC',
              borderLight: '#E2E8F0',
              textDark: '#0F172A',
              textMuted: '#64748B'
            }
          }
        }
      }
    }
  </script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #F8FAFC;
    }
    
    /* Custom Scrollbars */
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
    }
    ::-webkit-scrollbar-track {
      background: #F1F5F9;
    }
    ::-webkit-scrollbar-thumb {
      background: #CBD5E1;
      border-radius: 9999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94A3B8;
    }

    .active-nav-link {
      background-color: #A05217 !important;
      color: #FFFFFF !important;
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(160, 82, 23, 0.25);
    }

    .modal-backdrop {
      background-color: rgba(12, 35, 64, 0.6);
      backdrop-filter: blur(4px);
    }
  </style>
</head>
<body class="h-full text-slate-800 antialiased flex flex-col">

  <!-- TOP HEADER BAR -->
  <header class="bg-mubs-navy text-white sticky top-0 z-30 shadow-lg border-b border-mubs-navyLight">
    <div class="px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
      
      <!-- Brand & Mobile Toggle -->
      <div class="flex items-center space-x-4">
        <button onclick="toggleSidebar()" class="lg:hidden text-gray-300 hover:text-white focus:outline-none p-1.5 rounded-lg hover:bg-mubs-navyLight">
          <i class="fa-solid fa-bars text-xl"></i>
        </button>

        <div class="flex items-center space-x-3 cursor-pointer" onclick="switchTab('overview')">
          <div class=" text-white flex items-center justify-center font-bold shadow-md ">
              <img id="portal-header-icon" class="w-10 h-8 object-contain" src="{{ asset('images/logo.png') }}" alt="User Graduate">
          </div>

          <div class="flex flex-col">
            <span class="text-lg font-black tracking-wider leading-none text-white">MUBS ADMIN</span>
            <span class="text-[10px] text-amber-300 font-semibold tracking-wider uppercase mt-0.5"> System Portal</span>
          </div>
        </div>
      </div>

      <!-- Right Action Items -->
      <div class="flex items-center space-x-3">
        <!-- Academic Year Badge -->
        <span class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 border border-amber-500/30 text-amber-300 text-xs font-semibold">
          <i class="fa-solid fa-calendar-days text-[10px]"></i>
          <span>AY 2026/2027</span>
        </span>

        <!-- Notification Bell -->
        <div class="relative">
          <button onclick="toggleNotifications()" class="p-2 rounded-xl bg-mubs-navyLight text-gray-300 hover:text-white hover:bg-slate-700 transition-colors relative">
            <i class="fa-solid fa-bell text-sm"></i>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-mubs-amber animate-ping"></span>
            <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-mubs-amber"></span>
          </button>

          <!-- Notification Dropdown -->
          <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-80 bg-white text-slate-800 rounded-2xl shadow-2xl border border-slate-200 py-3 z-50">
            <div class="px-4 py-2 border-b border-slate-100 flex items-center justify-between">
              <span class="font-bold text-xs text-mubs-navy uppercase tracking-wider">System Alerts</span>
              <span class="text-[10px] bg-amber-100 text-mubs-amber font-bold px-2 py-0.5 rounded-full">3 New</span>
            </div>
            <div class="divide-y divide-slate-100 text-xs max-h-64 overflow-y-auto">
              <a href="#" class="block p-3 hover:bg-slate-50 transition-colors">
                <p class="font-semibold text-mubs-navy">Coursework Submission Deadline</p>
                <p class="text-slate-500 text-[11px] mt-0.5">BUC3131 Coursework 2 due Nov 2, 2026</p>
              </a>
              <a href="#" class="block p-3 hover:bg-slate-50 transition-colors">
                <p class="font-semibold text-mubs-navy">New Registration Detected</p>
                <p class="text-slate-500 text-[11px] mt-0.5">Student 2400724428 registered for BUC3131</p>
              </a>
            </div>
          </div>
        </div>

        <!-- User Profile Dropdown -->
        <div class="flex items-center space-x-3 pl-2 border-l border-slate-700">
          <div class="w-9 h-9 rounded-xl bg-mubs-amber text-white font-bold text-xs flex items-center justify-center shadow-inner">
            AD
          </div>
          <div class="hidden md:flex flex-col">
            <span class="text-xs font-bold leading-tight">Academic Registrar</span>
            <span class="text-[10px] text-amber-300 font-medium">Administrator</span>
          </div>
        </div>

      </div>
    </div>
  </header>

  <!-- MAIN WRAPPER -->
  <div class="flex flex-1 overflow-hidden">

    <!-- SIDEBAR NAVIGATION -->
    <aside id="sidebar" class="w-64 bg-mubs-navy text-gray-300 flex-shrink-0 hidden lg:flex flex-col border-r border-slate-800 transition-all duration-300">
      
      <div class="p-4 space-y-6 flex-1 overflow-y-auto">
        <!-- Navigation Menu -->
        <div class="space-y-1">
          <p class="px-3 text-[10px] font-bold text-amber-400 uppercase tracking-widest mb-2">Main Dashboard</p>
          
          <button id="nav-overview" onclick="switchTab('overview')" class="active-nav-link w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold hover:bg-mubs-navyLight hover:text-white transition-all text-left">
            <i class="fa-solid fa-chart-pie w-5 text-center text-sm"></i>
            <span>Overview & Analytics</span>
          </button>

          <button id="nav-students" onclick="switchTab('students')" class="w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold hover:bg-mubs-navyLight hover:text-white transition-all text-left">
            <i class="fa-solid fa-user-graduate w-5 text-center text-sm"></i>
            <span>Students Registry</span>
          </button>

          <button id="nav-courses" onclick="switchTab('courses')" class="w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold hover:bg-mubs-navyLight hover:text-white transition-all text-left">
            <i class="fa-solid fa-book-bookmark w-5 text-center text-sm"></i>
            <span>Course Management</span>
          </button>

          <button id="nav-registrations" onclick="switchTab('registrations')" class="w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold hover:bg-mubs-navyLight hover:text-white transition-all text-left">
            <i class="fa-solid fa-clipboard-list w-5 text-center text-sm"></i>
            <span>Course Registrations</span>
          </button>

          <button id="nav-messages" onclick="switchTab('messages')" class="w-full flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold hover:bg-mubs-navyLight hover:text-white transition-all text-left">
            <i class="fa-solid fa-comment-dots w-5 text-center text-sm"></i>
            <span>Messages</span>
          </button>
        </div>
      </div>
         
      <!-- Footer Student Info Card in Sidebar -->


    </aside>

    <!-- MAIN DYNAMIC CONTENT AREA -->
    <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

      <!-- TOP METRIC CARDS -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        
        <!-- Stat Card 1 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
          <div>
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Total Enrolled</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1" id="stat-students-count">{{ $students->count() }}</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 mt-1">
              <i class="fa-solid fa-arrow-up"></i> Active Students
            </span>
          </div>
          <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-200 text-mubs-amber flex items-center justify-center text-xl">
            <i class="fa-solid fa-users font-bold"></i>
          </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
          <div>
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Active Courses</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1">28</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-mubs-amber mt-1">
              <i class="fa-solid fa-book-open"></i> BBC & BBA Programs
            </span>
          </div>
          <div class="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-200 text-mubs-navy flex items-center justify-center text-xl">
            <i class="fa-solid fa-book-bookmark"></i>
          </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
          <div>
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Lecturers Assigned</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1">42</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 mt-1">
              <i class="fa-solid fa-circle-check"></i> 100% Allocated
            </span>
          </div>
          <div class="w-12 h-12 rounded-2xl bg-indigo-50 border border-indigo-200 text-indigo-700 flex items-center justify-center text-xl">
            <i class="fa-solid fa-chalkboard-user"></i>
          </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
          <div>
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Contact Messages</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1">{{ number_format($messageCount) }}</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-500 mt-1">
              <i class="fa-solid fa-envelope"></i> Total Inquiries
            </span>
          </div>
          <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 flex items-center justify-center text-xl">
            <i class="fa-solid fa-file-signature"></i>
          </div>
        </div>

      </div>

      <!-- INCLUDED TABS -->
      @include('admin/screens.overview')
      @include('admin/screens.register')
      @include('admin/screens.course')
      @include('admin/screens.students')

      <!-- TAB 5: messages -->
      <section id="tab-content-messages" class="hidden space-y-6">
          @include('admin/screens.messages')
      </section>

    </main>

  </div>


  <!-- MODAL: ADD NEW STUDENT -->
  <div id="addStudentModal" class="fixed inset-0 modal-backdrop z-50 flex items-center justify-center p-4 hidden">
    <div class="bg-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-100 space-y-6">
      <div class="flex items-center justify-between border-b border-slate-100 pb-4">
        <div>
          <h3 class="text-lg font-extrabold text-mubs-navy">Add New Student Record</h3>
          <p class="text-xs text-mubs-textMuted">Enter student details with reg number validation</p>
        </div>
        <button onclick="closeAddStudentModal()" class="w-8 h-8 rounded-full bg-slate-100 text-slate-500 hover:bg-slate-200 flex items-center justify-center">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>

      <!-- REAL LARAVEL FORM -->
      <form method="POST" action="{{ route('students.store') }}" class="space-y-4">
        @csrf
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Registration Number</label>
          <input type="text" name="reg_number" required placeholder="e.g. 2400724428" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Full Student Name</label>
          <input type="text" name="name" required placeholder="e.g. Sarah Namata" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">University Email</label>
          <input type="email" name="email" required placeholder="s.namata@mubs.ac.ug" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Program</label>
            <select name="program" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
              <option value="BBC">BBC (Bachelor of Bus. Computing)</option>
              <option value="BBA">BBA (Business Admin)</option>
              <option value="BIB">BIB (International Business)</option>
            </select>
          </div>

          <div>
            <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Year of Study</label>
            <select name="year_of_study" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
              <option value="III">Year III</option>
              <option value="II">Year II</option>
              <option value="I">Year I</option>
            </select>
          </div>
        </div>

        <div class="pt-2 flex space-x-3">
          <button type="button" onclick="closeAddStudentModal()" class="flex-1 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-3 rounded-xl text-xs transition-all">Cancel</button>
          <button type="submit" class="flex-1 bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-3 rounded-xl text-xs shadow-md transition-all">Save Student</button>
        </div>
      </form>
    </div>
  </div>

  <!-- CLEAN JAVASCRIPT LOGIC -->
  <script>
    // Tab Switcher
    function switchTab(tabKey) {
      const tabs = ['overview', 'students', 'courses', 'registrations', 'messages'];
      
      tabs.forEach(t => {
        const content = document.getElementById(`tab-content-${t}`);
        const navBtn = document.getElementById(`nav-${t}`);
        
        if (content) content.classList.add('hidden');
        if (navBtn) navBtn.classList.remove('active-nav-link');
      });

      const activeContent = document.getElementById(`tab-content-${tabKey}`);
      const activeNav = document.getElementById(`nav-${tabKey}`);

      if (activeContent) activeContent.classList.remove('hidden');
      if (activeNav) activeNav.classList.add('active-nav-link');
    }

    // Toggle Sidebar for Mobile
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
    }

    // Toggle Notification Dropdown
    function toggleNotifications() {
      const dropdown = document.getElementById('notificationDropdown');
      dropdown.classList.toggle('hidden');
    }

    // STUDENT MODAL
    function openAddStudentModal() {
      document.getElementById('addStudentModal').classList.remove('hidden');
    }

    function closeAddStudentModal() {
      document.getElementById('addStudentModal').classList.add('hidden');
    }

    // COURSE MODAL (These match the IDs in course.blade.php)
    function openAddCourseModal() {
      document.getElementById('courseModalTitle').textContent = 'Add New Course';
      document.getElementById('courseForm').action = "/admin/courses";
      document.getElementById('courseMethod').value = 'POST';
      document.getElementById('courseForm').reset();
      document.getElementById('course_id').value = '';

      const modal = document.getElementById('courseModal');
      if(modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
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

      const modal = document.getElementById('courseModal');
      if(modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
      }
    }

    function closeCourseModal() {
      const modal = document.getElementById('courseModal');
      if(modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
      }
    }

    // Chart.js Analytics (Runs safely only if elements exist)
    window.addEventListener('load', function() {
      const ctx1 = document.getElementById('enrollmentChart');
      if (ctx1) {
        new Chart(ctx1.getContext('2d'), {
          type: 'bar',
          data: {
            labels: ['BUC3131', 'BUC3120', 'BUC3115', 'BBA2105', 'BUC3100'],
            datasets: [{
              label: 'Registered Students',
              data: [420, 380, 310, 290, 240],
              backgroundColor: '#A05217',
              borderRadius: 8
            }]
          },
          options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: false } } }
        });
      }

      const ctx2 = document.getElementById('departmentChart');
      if (ctx2) {
        new Chart(ctx2.getContext('2d'), {
          type: 'doughnut',
          data: {
            labels: ['Computing & Informatics', 'Business Admin', 'Marketing', 'Finance'],
            datasets: [{
              data: [48, 26, 14, 12],
              backgroundColor: ['#0C2340', '#A05217', '#3B82F6', '#10B981']
            }]
          },
          options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
        });
      }
    });
  </script>
</body>
</html>