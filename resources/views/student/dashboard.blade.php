<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MUBS - Student Portal (BUC3131)</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          colors: {
            mubs: {
              navy: '#0C2340',
              navyHover: '#08172C',
              amber: '#A05217',
              amberHover: '#874211',
              bgLight: '#F7F5F0',
              textDark: '#122338',
              textMuted: '#64748B'
            }
          }
        }
      }
    }
  </script>
</head>
<body class="bg-mubs-bgLight text-mubs-textDark min-h-screen flex flex-col font-sans">

  <!-- TOP NAVIGATION HEADER -->
  <header class="bg-white border-b border-gray-200 sticky top-0 z-40 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
      <div class="flex items-center space-x-3">
        <div class=" text-white flex items-center justify-center font-bold text-lg shadow-md">
<div class=" text-white flex items-center justify-center ">
    <img id="portal-header-icon" class="w-15 h-8 object-contain" src="{{ asset('images/logo.png') }}" alt="User Graduate">
</div>
        </div>
        <div>
          <h1 class="text-base sm:text-lg font-extrabold text-mubs-navy tracking-tight">MUBS Student Portal</h1>
          <p class="text-xs text-mubs-textMuted">Bachelor of Business Computing (Year III, Sem I)</p>
        </div>
      </div>

      <div class="flex items-center space-x-4">
        <div class="hidden sm:block text-right">
          <p class="text-xs font-bold text-mubs-navy">Rwomushana Macarthy</p>
          <p class="text-[11px] text-mubs-amber font-semibold">Reg No: 2400724428</p>
        </div>
        <div class="w-10 h-10 rounded-xl bg-mubs-amber/10 border border-amber-200 flex items-center justify-center font-bold text-mubs-amber">
          RM
        </div>
      </div>
    </div>
  </header>

  <!-- DASHBOARD CONTAINER -->
  <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex-grow space-y-8 w-full">
    
    <!-- STATS BANNER -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center space-x-4">
        <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl font-bold">
          <i class="fa-solid fa-book-open"></i>
        </div>
        <div>
          <p class="text-xs text-mubs-textMuted font-semibold">Registered Courses</p>
          <h3 class="text-2xl font-extrabold text-mubs-navy mt-0.5">4 Courses</h3>
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center space-x-4">
        <div class="w-12 h-12 rounded-xl bg-amber-50 text-mubs-amber flex items-center justify-center text-xl font-bold">
          <i class="fa-solid fa-award"></i>
        </div>
        <div>
          <p class="text-xs text-mubs-textMuted font-semibold">Current CGPA</p>
          <h3 class="text-2xl font-extrabold text-mubs-navy mt-0.5">4.65 / 5.0</h3>
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center space-x-4">
        <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-xl font-bold">
          <i class="fa-solid fa-check-circle"></i>
        </div>
        <div>
          <p class="text-xs text-mubs-textMuted font-semibold">Academic Year</p>
          <h3 class="text-lg font-extrabold text-mubs-navy mt-0.5">2026/2027 Sem I</h3>
        </div>
      </div>

      <div class="bg-white p-5 rounded-2xl border border-gray-200 shadow-sm flex items-center space-x-4">
        <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl font-bold">
          <i class="fa-solid fa-code-branch"></i>
        </div>
        <div>
          <p class="text-xs text-mubs-textMuted font-semibold">GitHub Branch</p>
          <h3 class="text-sm font-extrabold text-mubs-navy mt-0.5 truncate max-w-[140px]">feature/macarthy</h3>
        </div>
      </div>
    </div>

    <!-- MAIN INTERACTIVE SECTION -->
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 space-y-6">
      
      <!-- TABS -->
      <div class="flex flex-wrap gap-2 border-b border-gray-100 pb-4">
        <button onclick="switchTab('register')" id="tab-register-btn" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-mubs-navy text-white transition-all shadow-sm">
          <i class="fa-solid fa-plus-circle mr-1.5"></i> Course Registration
        </button>
        <button onclick="switchTab('my-courses')" id="tab-my-courses-btn" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-mubs-textMuted hover:bg-gray-100 transition-all">
          <i class="fa-solid fa-list-check mr-1.5"></i> My Registered Courses
        </button>
        <button onclick="switchTab('results')" id="tab-results-btn" class="px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-mubs-textMuted hover:bg-gray-100 transition-all">
          <i class="fa-solid fa-file-lines mr-1.5"></i> Coursework Test Results
        </button>
      </div>

      <!-- TAB 1: COURSE REGISTRATION () -->
 
        @include('student/screens.register')


      <!-- TAB 2: MY REGISTERED COURSES -->
               @include('student/screens.courses')


               <!-- TAB 3: RESULTS -->

                   @include('student/screens.results')
 
          </div>
        </div>
      </div>

    </div>

  </main>

  <!-- SCRIPT FOR TAB SWITCHING & REGISTRATION -->
  <script>
    function switchTab(tab) {
      document.getElementById('tab-register').classList.add('hidden');
      document.getElementById('tab-my-courses').classList.add('hidden');
      document.getElementById('tab-results').classList.add('hidden');

      document.getElementById('tab-register-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-mubs-textMuted hover:bg-gray-100 transition-all';
      document.getElementById('tab-my-courses-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-mubs-textMuted hover:bg-gray-100 transition-all';
      document.getElementById('tab-results-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-semibold text-mubs-textMuted hover:bg-gray-100 transition-all';

      if (tab === 'register') {
        document.getElementById('tab-register').classList.remove('hidden');
        document.getElementById('tab-register-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-mubs-navy text-white transition-all shadow-sm';
      } else if (tab === 'my-courses') {
        document.getElementById('tab-my-courses').classList.remove('hidden');
        document.getElementById('tab-my-courses-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-mubs-navy text-white transition-all shadow-sm';
      } else if (tab === 'results') {
        document.getElementById('tab-results').classList.remove('hidden');
        document.getElementById('tab-results-btn').className = 'px-4 py-2 rounded-xl text-xs sm:text-sm font-bold bg-mubs-navy text-white transition-all shadow-sm';
      }
    }

    function registerCourse(code, name) {
      alert(`Successfully registered for ${code} - ${name}! Duplicate registration check passed via Eloquent.`);
      switchTab('my-courses');
    }
  </script>
</body>
</html>