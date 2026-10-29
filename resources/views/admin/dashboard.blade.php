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

    #toast {
      transition: all 0.35s cubic-bezier(0.68, -0.55, 0.27, 1.55);
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

      <!-- Global Search -->
      <div class="hidden md:flex flex-1 max-w-md mx-8">
        <div class="relative w-full">
          <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
            <i class="fa-solid fa-magnifying-glass text-xs"></i>
          </span>
          <input 
            type="text" 
            placeholder="Search students, course codes (BUC3131), lecturers..." 
            class="w-full pl-9 pr-4 py-2 bg-mubs-navyLight/80 text-white placeholder-gray-400 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-mubs-amber border border-slate-700/60"
            onkeyup="globalSearch(this.value)"
          >
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
              <a href="#" class="block p-3 hover:bg-slate-50 transition-colors">
                <p class="font-semibold text-mubs-navy">GitHub PR Merged</p>
                <p class="text-slate-500 text-[11px] mt-0.5">Branch feature/relationships merged into develop</p>
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
        </div>

      
         
      <!-- Footer Student Info Card in Sidebar -->
      <div class="p-4 bg-mubs-navyLight/60 border-t border-slate-800">
        <div class="bg-mubs-navy p-3 rounded-xl border border-slate-700/80 space-y-2">
          <div class="flex items-center justify-between text-[11px] font-bold text-amber-300">
            <span>BUC3131 GROUP PROJECT</span>
            <span class="bg-mubs-amber/30 text-amber-200 px-1.5 py-0.5 rounded text-[9px]">Year III</span>
          </div>
          <p class="text-[10px] text-gray-400 leading-tight">Advanced Web Application Development Coursework II</p>
          <div class="flex items-center text-[10px] text-emerald-400 gap-1 font-mono">
            <i class="fa-solid fa-code-branch text-[9px]"></i>
            <span>branch: develop</span>
          </div>
        </div>
      </div>

    </aside>

    <!-- MAIN DYNAMIC CONTENT AREA -->
    <main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">

      <!-- TOP METRIC CARDS (PERSISTENT OVERVIEW) -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6 mb-8">
        
        <!-- Stat Card 1 -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all flex items-center justify-between">
          <div>
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Total Enrolled</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1" id="stat-students-count">5,420</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-600 mt-1">
              <i class="fa-solid fa-arrow-up"></i> +12.5% this semester
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
            <h3 class="text-2xl font-black text-mubs-navy mt-1" id="stat-courses-count">28</h3>
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
            <p class="text-xs font-bold text-mubs-textMuted uppercase tracking-wider">Registrations</p>
            <h3 class="text-2xl font-black text-mubs-navy mt-1" id="stat-reg-count">18,240</h3>
            <span class="inline-flex items-center gap-1 text-[11px] font-bold text-slate-500 mt-1">
              <i class="fa-solid fa-shield"></i> Unique Records
            </span>
          </div>
          <div class="w-12 h-12 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 flex items-center justify-center text-xl">
            <i class="fa-solid fa-file-signature"></i>
          </div>
        </div>

      </div>


          <!-- TAB 1: OVERVIEW & ANALYTICS -->

            @include('admin/screens.overview')






      <!-- TAB 2: STUDENT MANAGEMENT  -->

           @include('admin/screens.register')
 


      <!-- TAB 3: COURSE MANAGEMENT (CRUD) -->

      
           @include('admin/screens.course')



   
   <!-- TAB 4: COURSE REGISTRATIONS -->


          

                  @include('admin/screens.students')










      <!-- TAB 8: LARAVEL CODE SPECS -->
      <section id="tab-content-code" class="hidden space-y-6">
        
        <div class="bg-slate-900 text-slate-100 p-6 rounded-3xl shadow-xl space-y-4 font-mono text-xs">
          <div class="flex items-center justify-between border-b border-slate-800 pb-3">
            <span class="text-amber-400 font-bold">Student.php Model (Question 1b Relationships)</span>
            <span class="text-slate-500">app/Models/Student.php</span>
          </div>
          <pre class="overflow-x-auto text-emerald-400"><code>&lt;?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    protected $fillable = ['reg_number', 'name', 'email', 'program', 'year_of_study'];

    // Eloquent Many-to-Many Relationship with Courses
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'course_registrations')
                    ->withTimestamps();
    }
}</code></pre>
        </div>

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

      <form onsubmit="handleCreateStudent(event)" class="space-y-4">
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Registration Number</label>
          <input type="text" id="modal-reg-no" required placeholder="e.g. 2400724428" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Full Student Name</label>
          <input type="text" id="modal-student-name" required placeholder="e.g. Sarah Namata" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">University Email</label>
          <input type="email" id="modal-student-email" required placeholder="s.namata@mubs.ac.ug" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
        </div>

        <div class="grid grid-cols-2 gap-4">
          <div>
            <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Program</label>
            <select id="modal-student-program" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
              <option value="BBC">BBC (Bachelor of Bus. Computing)</option>
              <option value="BBA">BBA (Business Admin)</option>
              <option value="BIB">BIB (International Business)</option>
            </select>
          </div>

          <div>
            <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Year of Study</label>
            <select id="modal-student-year" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs focus:ring-2 focus:ring-mubs-amber outline-none font-medium">
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




  <!-- JAVASCRIPT LOGIC -->
  <script>
    // Sample Data Sets for BUC3131 Coursework
    let students = [
      { id: 1, reg: '2400724428', name: 'Okello Alex', email: 'a.okello@mubs.ac.ug', program: 'BBC', year: 'III', status: 'Enrolled' },
      { id: 2, reg: '2400724429', name: 'Nakitto Shanitah', email: 's.nakitto@mubs.ac.ug', program: 'BBC', year: 'III', status: 'Enrolled' },
      { id: 3, reg: '2400724430', name: 'Macarthy Daniel', email: 'd.macarthy@mubs.ac.ug', program: 'BBC', year: 'III', status: 'Enrolled' },
      { id: 4, reg: '2400724431', name: 'Clive Munie', email: 'c.munie@mubs.ac.ug', program: 'BBA', year: 'II', status: 'Enrolled' },
      { id: 5, reg: '2400724432', name: 'Kato Paul', email: 'p.kato@mubs.ac.ug', program: 'BBC', year: 'I', status: 'Enrolled' }
    ];

    let courses = [
      { id: 1, code: 'BUC3131', title: 'Advanced Web Application Development', units: 4, lecturer: 'BUC Lecturer', semester: 'Semester I' },
      { id: 2, code: 'BUC3120', title: 'Database Management Systems', units: 4, lecturer: 'Dr. Nakitto', semester: 'Semester I' },
      { id: 3, code: 'BUC3115', title: 'Systems Analysis & Design', units: 3, lecturer: 'Mr. Okello', semester: 'Semester I' },
      { id: 4, code: 'BBA2105', title: 'Business Financial Accounting', units: 3, lecturer: 'Ms. Namata', semester: 'Semester II' }
    ];

    let registrations = [
      { reg: '2400724428', name: 'Okello Alex', code: 'BUC3131', date: '2026-10-20', status: 'Validated (No Dup)' },
      { reg: '2400724429', name: 'Nakitto Shanitah', code: 'BUC3131', date: '2026-10-21', status: 'Validated (No Dup)' },
      { reg: '2400724430', name: 'Macarthy Daniel', code: 'BUC3120', date: '2026-10-22', status: 'Validated (No Dup)' },
      { reg: '2400724431', name: 'Clive Munie', code: 'BBA2105', date: '2026-10-23', status: 'Validated (No Dup)' }
    ];

    // Initialize Dashboard
    window.onload = function() {
      renderStudentTable();
      renderCourseTable();
      renderRegistrationTable();
      initCharts();
    };

    // Tab Switcher
    function switchTab(tabKey) {
      const tabs = ['overview', 'students', 'courses', 'registrations', 'roles', 'seeders', 'github', 'code'];
      
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

    // Render Student Table
    function renderStudentTable(data = students) {
      const tbody = document.getElementById('studentTableBody');
      tbody.innerHTML = '';

      data.forEach(s => {
        tbody.innerHTML += `
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="p-4 font-mono font-bold text-mubs-amber">${s.reg}</td>
            <td class="p-4 font-bold text-mubs-navy">${s.name}</td>
            <td class="p-4 text-slate-500">${s.email}</td>
            <td class="p-4 font-semibold">${s.program} - Year ${s.year}</td>
            <td class="p-4"><span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2.5 py-1 rounded-full">${s.status}</span></td>
            <td class="p-4 text-center">
              <button onclick="deleteStudent(${s.id})" class="text-rose-500 hover:text-rose-700 p-1.5 rounded-lg hover:bg-rose-50" title="Delete Student">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </td>
          </tr>
        `;
      });

      document.getElementById('student-count-visible').textContent = data.length;
      document.getElementById('stat-students-count').textContent = (5415 + students.length).toLocaleString();
    }

    // Render Course Table
    function renderCourseTable() {
      const tbody = document.getElementById('courseTableBody');
      tbody.innerHTML = '';

      courses.forEach(c => {
        tbody.innerHTML += `
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="p-4 font-mono font-bold text-mubs-navy">${c.code}</td>
            <td class="p-4 font-bold text-slate-800">${c.title}</td>
            <td class="p-4 font-semibold text-mubs-amber">${c.units} CU</td>
            <td class="p-4 font-medium text-slate-600">${c.lecturer}</td>
            <td class="p-4"><span class="bg-blue-50 text-blue-800 text-[10px] font-bold px-2.5 py-1 rounded-full">${c.semester}</span></td>
            <td class="p-4 text-center">
              <button onclick="deleteCourse(${c.id})" class="text-rose-500 hover:text-rose-700 p-1.5 rounded-lg hover:bg-rose-50" title="Delete Course">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </td>
          </tr>
        `;
      });

      document.getElementById('stat-courses-count').textContent = courses.length;
    }

    // Render Registrations Table
    function renderRegistrationTable() {
      const tbody = document.getElementById('registrationTableBody');
      tbody.innerHTML = '';

      registrations.forEach(r => {
        tbody.innerHTML += `
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="p-4 font-mono font-bold text-mubs-amber">${r.reg}</td>
            <td class="p-4 font-bold text-mubs-navy">${r.name}</td>
            <td class="p-4 font-mono font-semibold text-slate-700">${r.code}</td>
            <td class="p-4 text-slate-500">${r.date}</td>
            <td class="p-4"><span class="bg-emerald-100 text-emerald-800 text-[10px] font-bold px-2 py-0.5 rounded">${r.status}</span></td>
            <td class="p-4 text-center">
              <button onclick="showToast('Course registration unlinked successfully', 'info', 'Unlink')" class="text-slate-400 hover:text-slate-600">
                <i class="fa-solid fa-link-slash"></i>
              </button>
            </td>
          </tr>
        `;
      });
    }

    // Modal Triggers
    function openAddStudentModal() {
      document.getElementById('addStudentModal').classList.remove('hidden');
    }

    function closeAddStudentModal() {
      document.getElementById('addStudentModal').classList.add('hidden');
    }

    function openAddCourseModal() {
      document.getElementById('addCourseModal').classList.remove('hidden');
    }

    function closeAddCourseModal() {
      document.getElementById('addCourseModal').classList.add('hidden');
    }

    // Form Submissions
    function handleCreateStudent(e) {
      e.preventDefault();
      const reg = document.getElementById('modal-reg-no').value;
      const name = document.getElementById('modal-student-name').value;
      const email = document.getElementById('modal-student-email').value;
      const program = document.getElementById('modal-student-program').value;
      const year = document.getElementById('modal-student-year').value;

      // Duplicate Check
      if (students.some(s => s.reg === reg)) {
        showToast(`Registration No. ${reg} already exists! Duplicate prevented.`, 'error', 'Validation Error');
        return;
      }

      students.unshift({
        id: Date.now(),
        reg,
        name,
        email,
        program,
        year,
        status: 'Enrolled'
      });

      renderStudentTable();
      closeAddStudentModal();
      e.target.reset();
      showToast(`Student ${name} (${reg}) registered successfully!`, 'success', 'Student Created');
    }

    function handleCreateCourse(e) {
      e.preventDefault();
      const code = document.getElementById('modal-course-code').value;
      const title = document.getElementById('modal-course-title').value;
      const units = document.getElementById('modal-course-units').value;
      const semester = document.getElementById('modal-course-semester').value;
      const lecturer = document.getElementById('modal-course-lecturer').value;

      courses.unshift({
        id: Date.now(),
        code,
        title,
        units,
        semester,
        lecturer
      });

      renderCourseTable();
      closeAddCourseModal();
      e.target.reset();
      showToast(`Course unit ${code} added to curriculum!`, 'success', 'Course Created');
    }

    function deleteStudent(id) {
      students = students.filter(s => s.id !== id);
      renderStudentTable();
      showToast('Student record deleted from database.', 'info', 'Record Removed');
    }

    function deleteCourse(id) {
      courses = courses.filter(c => c.id !== id);
      renderCourseTable();
      showToast('Course unit removed.', 'info', 'Record Removed');
    }

    function filterStudentTable() {
      const q = document.getElementById('studentTableSearch').value.toLowerCase();
      const filtered = students.filter(s => s.name.toLowerCase().includes(q) || s.reg.includes(q));
      renderStudentTable(filtered);
    }

    function globalSearch(q) {
      if (q.trim().length > 1) {
        switchTab('students');
        document.getElementById('studentTableSearch').value = q;
        filterStudentTable();
      }
    }

    // Chart.js Analytics
    function initCharts() {
      // Enrollment Bar Chart
      const ctx1 = document.getElementById('enrollmentChart').getContext('2d');
      new Chart(ctx1, {
        type: 'bar',
        data: {
          labels: ['BUC3131 (Adv Web)', 'BUC3120 (DBMS)', 'BUC3115 (Sys Analysis)', 'BBA2105 (Accounting)', 'BUC3100 (Networks)'],
          datasets: [{
            label: 'Registered Students',
            data: [420, 380, 310, 290, 240],
            backgroundColor: '#A05217',
            borderRadius: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } }
        }
      });

      // Department Pie Chart
      const ctx2 = document.getElementById('departmentChart').getContext('2d');
      new Chart(ctx2, {
        type: 'doughnut',
        data: {
          labels: ['Computing & Informatics', 'Business Admin', 'Marketing', 'Finance'],
          datasets: [{
            data: [48, 26, 14, 12],
            backgroundColor: ['#0C2340', '#A05217', '#3B82F6', '#10B981']
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { position: 'bottom' } }
        }
      });
    }

    // Toast Notifications System
    let toastTimeout;
    function showToast(message, type = 'success', title = 'Notice') {
      const toast = document.getElementById('toast');
      const toastTitle = document.getElementById('toastTitle');
      const toastMessage = document.getElementById('toastMessage');
      const toastIcon = document.getElementById('toastIcon');

      toastTitle.textContent = title;
      toastMessage.textContent = message;

      if (type === 'success') {
        toastIcon.innerHTML = `<i class="fa-solid fa-circle-check text-emerald-400"></i>`;
      } else if (type === 'error') {
        toastIcon.innerHTML = `<i class="fa-solid fa-circle-exclamation text-rose-400"></i>`;
      } else {
        toastIcon.innerHTML = `<i class="fa-solid fa-circle-info text-mubs-amber"></i>`;
      }

      toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');

      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => { hideToast(); }, 4000);
    }

    function hideToast() {
      const toast = document.getElementById('toast');
      toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
    }
  </script>
</body>
</html>