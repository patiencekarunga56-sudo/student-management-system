<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MUBS - Portal Login</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome Icons CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Google Font: Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
              amber: '#A05217',
              amberHover: '#874211',
              bgLight: '#F7F5F0',
              cardBg: '#FFFFFF',
              textDark: '#122338',
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
      background-color: #F7F5F0;
      color: #122338;
    }

    #toast {
      transition: all 0.35s cubic-bezier(0.68, -0.55, 0.27, 1.55);
    }
  </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-mubs-amber selection:text-white">



  <!-- CENTERED MAIN LOGIN CONTAINER -->
  <main class="flex-grow flex items-center justify-center px-4 py-8 sm:py-12">
    
    <!-- DEDICATED CENTERED CARD -->
    <div class="w-full max-w-md bg-white rounded-3xl border border-gray-200/80 shadow-2xl p-6 sm:p-10 space-y-6">
      
      <!-- Header / Logo Accent -->
      <div class="text-center space-y-2">
        <div class="inline-flex items-center justify-center   border-amber-200 text-mubs-amber shadow-inner mb-1">

     <!-- Displayed using an <img> tag with your specific styling classes -->
<img id="portal-header-icon" class="text-xl" src="{{ asset('images/logo.png') }}" alt="User Graduate" style="width: 100px; height: 100px;">

          


          
        </div>
        <h1 id="portal-title" class="text-2xl font-extrabold text-mubs-navy tracking-tight">Student Portal Login</h1>
        <p id="portal-subtitle" class="text-xs text-mubs-textMuted max-w-xs mx-auto">
          Enter your student credentials to access academic records & portal services.
        </p>
      </div>

      <!-- PORTAL TYPE TOGGLE TABS -->
      <div class="bg-mubs-bgLight p-1.5 rounded-2xl flex items-center border border-gray-200/80 shadow-inner">
        <button 
          id="tab-student-btn" 
          type="button"
          onclick="switchPortal('student')" 
          class="flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-bold transition-all shadow-sm bg-white text-mubs-navy border border-gray-200/60 flex items-center justify-center gap-2"
        >
          <i class="fa-solid fa-user-graduate text-mubs-amber"></i>
          <span>Student</span>
        </button>
        <button 
          id="tab-admin-btn" 
          type="button"
          onclick="switchPortal('admin')" 
          class="flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-semibold transition-all text-mubs-textMuted hover:text-mubs-navy flex items-center justify-center gap-2"
        >
          <i class="fa-solid fa-user-shield"></i>
          <span>Administrator</span>
        </button>
      </div>

      <!-- DYNAMIC LOGIN FORM -->
      <form id="loginForm" onsubmit="handleLogin(event)" class="space-y-4">
        
        <!-- Field 1: Reg No. or Email -->
        <div>
          <label id="id-label" class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">
            Registration No. / Student Email
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
              <i id="id-icon" class="fa-solid fa-id-card"></i>
            </span>
            <input 
              type="text" 
              id="userInput" 
              required
              placeholder="e.g. 2400724428 or student@mubs.ac.ug" 
              class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy"
            >
          </div>
        </div>

        <!-- ADMIN SPECIFIC FIELD 1: Staff ID (Hidden by default in student mode) -->
        <div id="staff-id-group" class="hidden">
          <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">
            Staff Employee ID
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
              <i class="fa-solid fa-id-badge"></i>
            </span>
            <input 
              type="text" 
              id="staffIdInput" 
              placeholder="e.g. STF-88902" 
              class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy"
            >
          </div>
        </div>

        <!-- ADMIN SPECIFIC FIELD 2: System Role Dropdown (Hidden by default in student mode) -->
        <div id="role-group" class="hidden">
          <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">
            Administrative Role
          </label>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
              <i class="fa-solid fa-user-gear"></i>
            </span>
            <select 
              id="roleInput" 
              class="w-full pl-10 pr-8 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy appearance-none"
            >
              <option value="faculty">Faculty Administrator</option>
              <option value="registrar">Academic Registrar</option>
              <option value="head">Department Head</option>
              <option value="sysadmin">System Administrator</option>
            </select>
            <span class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none text-gray-400">
              <i class="fa-solid fa-chevron-down text-xs"></i>
            </span>
          </div>
        </div>

        <!-- Field: Password -->
        <div>
          <div class="flex justify-between items-center mb-1.5">
            <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider">
              Password
            </label>
            <a href="#" onclick="forgotPassword(event)" class="text-xs font-semibold text-mubs-amber hover:underline">
              Forgot Password?
            </a>
          </div>
          <div class="relative">
            <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400">
              <i class="fa-solid fa-lock"></i>
            </span>
            <input 
              type="password" 
              id="passwordInput" 
              required
              placeholder="••••••••••••" 
              class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy"
            >
            <button 
              type="button" 
              onclick="togglePassword()" 
              class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-mubs-navy"
            >
              <i id="eyeIcon" class="fa-solid fa-eye"></i>
            </button>
          </div>
        </div>

        <!-- Remember Me Checkbox -->
        <div class="flex items-center justify-between pt-1">
          <label class="flex items-center space-x-2.5 cursor-pointer">
            <input type="checkbox" class="w-4 h-4 rounded text-mubs-amber focus:ring-mubs-amber border-gray-300">
            <span class="text-xs font-semibold text-mubs-textMuted">Remember this session</span>
          </label>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
          <button 
            type="submit" 
            id="submitBtn" 
            class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-amber-900/10 transition-all flex items-center justify-center space-x-2 text-base active:scale-[0.99]"
          >
            <span id="btnText">Sign In to Student Portal</span>
            <i class="fa-solid fa-arrow-right text-xs"></i>
          </button>
        </div>
      </form>

      <!-- Footer Info Link inside Card -->
      <div class="pt-4 border-t border-gray-100 text-center">
        <p class="text-xs text-mubs-textMuted">
          Don't have an account? 
          <button type="button" onclick="openSignUpModal()" class="font-bold text-mubs-navy hover:text-mubs-amber transition-colors underline">
            Register Here
          </button>
        </p>
      </div>

    </div>

  </main>

  <!-- MODAL: ACCOUNT REGISTRATION -->
  <div id="signUpModal" class="fixed inset-0 bg-mubs-navy/60 backdrop-blur-sm z-50 flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300">
    <div class="bg-white rounded-3xl max-w-md w-full p-6 sm:p-8 shadow-2xl border border-gray-100 transform scale-95 transition-transform duration-300">
      <div class="flex justify-between items-center mb-6">
        <div>
          <h3 class="text-xl font-bold text-mubs-navy">Student Account Signup</h3>
          <p class="text-xs text-mubs-textMuted">Request access to MUBS Student Portal</p>
        </div>
        <button onclick="closeSignUpModal()" class="w-8 h-8 rounded-full bg-gray-100 text-gray-500 hover:bg-gray-200 flex items-center justify-center">
          <i class="fa-solid fa-xmark"></i>
        </button>
      </div>
      
      <form onsubmit="handleSignUp(event)" class="space-y-4">
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Full Name</label>
          <input type="text" required placeholder="e.g. Sarah Namata" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-mubs-amber outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Student Registration No.</label>
          <input type="text" required placeholder="e.g. 2400724428" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-mubs-amber outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">University Email</label>
          <input type="email" required placeholder="student@mubs.ac.ug" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-mubs-amber outline-none">
        </div>
        <div>
          <label class="block text-xs font-bold text-mubs-navy uppercase mb-1">Set Password</label>
          <input type="password" required placeholder="••••••••" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:ring-2 focus:ring-mubs-amber outline-none">
        </div>
        <button type="submit" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-3 rounded-xl shadow-md transition-all text-sm mt-2">
          Create Account Request
        </button>
      </form>
    </div>
  </div>

  <!-- TOAST NOTIFICATION -->
  <div id="toast" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 pointer-events-none max-w-sm w-full bg-mubs-navy text-white px-5 py-4 rounded-2xl shadow-2xl flex items-center space-x-3 border border-slate-700">
    <div id="toastIcon" class="text-xl text-mubs-amber">
      <i class="fa-solid fa-circle-check"></i>
    </div>
    <div class="flex-1">
      <div id="toastTitle" class="text-sm font-bold">Notification</div>
      <div id="toastMessage" class="text-xs text-gray-300">Message description goes here.</div>
    </div>
    <button onclick="hideToast()" class="text-gray-400 hover:text-white">
      <i class="fa-solid fa-xmark text-sm"></i>
    </button>
  </div>

  <!-- INTERACTIVE LOGIC -->
  <script>
    let currentPortal = 'student';

    function switchPortal(type) {
      currentPortal = type;

      const studentTab = document.getElementById('tab-student-btn');
      const adminTab = document.getElementById('tab-admin-btn');

      const headerIcon = document.getElementById('portal-header-icon');
      const portalTitle = document.getElementById('portal-title');
      const portalSubtitle = document.getElementById('portal-subtitle');
      const idLabel = document.getElementById('id-label');
      const idIcon = document.getElementById('id-icon');
      const userInput = document.getElementById('userInput');
      const staffIdGroup = document.getElementById('staff-id-group');
      const staffIdInput = document.getElementById('staffIdInput');
      const roleGroup = document.getElementById('role-group');
      const btnText = document.getElementById('btnText');

      if (type === 'student') {
        studentTab.className = 'flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-bold transition-all shadow-sm bg-white text-mubs-navy border border-gray-200/60 flex items-center justify-center gap-2';
        adminTab.className = 'flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-semibold transition-all text-mubs-textMuted hover:text-mubs-navy flex items-center justify-center gap-2';

        headerIcon.className = 'fa-solid fa-user-graduate text-xl';
        portalTitle.textContent = 'Student Portal Login';
        portalSubtitle.textContent = 'Enter your student credentials to access academic records & portal services.';
        idLabel.textContent = 'Registration No. / Student Email';
        idIcon.className = 'fa-solid fa-id-card';
        userInput.placeholder = 'e.g. 2400724428 or student@mubs.ac.ug';

        staffIdGroup.classList.add('hidden');
        roleGroup.classList.add('hidden');
        staffIdInput.required = false;

        btnText.textContent = 'Sign In to Student Portal';

      } else if (type === 'admin') {
        adminTab.className = 'flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-bold transition-all shadow-sm bg-white text-mubs-navy border border-gray-200/60 flex items-center justify-center gap-2';
        studentTab.className = 'flex-1 py-2.5 px-3 rounded-xl text-xs sm:text-sm font-semibold transition-all text-mubs-textMuted hover:text-mubs-navy flex items-center justify-center gap-2';

        headerIcon.className = 'fa-solid fa-user-shield text-xl';
        portalTitle.textContent = 'Admin Portal Login';
        portalSubtitle.textContent = 'Authorized staff and system administration access portal.';
        idLabel.textContent = 'Admin Email / Username';
        idIcon.className = 'fa-solid fa-envelope';
        userInput.placeholder = 'e.g. admin@mubs.ac.ug';

        staffIdGroup.classList.remove('hidden');
        roleGroup.classList.remove('hidden');
        staffIdInput.required = true;

        btnText.textContent = 'Sign In to Admin Portal';
      }
    }

    function togglePassword() {
      const passwordInput = document.getElementById('passwordInput');
      const eyeIcon = document.getElementById('eyeIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.className = 'fa-solid fa-eye-slash';
      } else {
        passwordInput.type = 'password';
        eyeIcon.className = 'fa-solid fa-eye';
      }
    }

    function handleLogin(e) {
      e.preventDefault();
      const submitBtn = document.getElementById('submitBtn');

      submitBtn.innerHTML = `<i class="fa-solid fa-spinner animate-spin"></i><span>Authenticating...</span>`;
      submitBtn.disabled = true;

      setTimeout(() => {
        submitBtn.innerHTML = `<span id="btnText">Sign In to ${currentPortal === 'student' ? 'Student' : 'Admin'} Portal</span><i class="fa-solid fa-arrow-right text-xs"></i>`;
        submitBtn.disabled = false;

        showToast(
          `Logged into ${currentPortal === 'student' ? 'Student Portal' : 'Admin Dashboard'} successfully! Redirecting...`, 
          'success', 
          'Authentication Success'
        );
      }, 1200);
    }

    function forgotPassword(e) {
      e.preventDefault();
      const userInput = document.getElementById('userInput').value;
      if (!userInput) {
        showToast('Please enter your Registration No. or Email first.', 'info', 'Password Reset');
      } else {
        showToast(`Instructions sent to email associated with ${userInput}`, 'success', 'Reset Link Sent');
      }
    }

    function openSignUpModal() {
      const modal = document.getElementById('signUpModal');
      modal.classList.remove('hidden');
      setTimeout(() => {
        modal.classList.remove('opacity-0');
        modal.querySelector('div').classList.remove('scale-95');
      }, 10);
    }

    function closeSignUpModal() {
      const modal = document.getElementById('signUpModal');
      modal.querySelector('div').classList.add('scale-95');
      modal.classList.add('opacity-0');
      setTimeout(() => {
        modal.classList.add('hidden');
      }, 300);
    }

    function handleSignUp(e) {
      e.preventDefault();
      closeSignUpModal();
      showToast('Registration request sent! You will receive confirmation via email.', 'success', 'Registration Pending');
    }

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
      } else if (type === 'info') {
        toastIcon.innerHTML = `<i class="fa-solid fa-circle-info text-mubs-amber"></i>`;
      } else {
        toastIcon.innerHTML = `<i class="fa-solid fa-circle-exclamation text-rose-400"></i>`;
      }

      toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');

      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => {
        hideToast();
      }, 4000);
    }

    function hideToast() {
      const toast = document.getElementById('toast');
      toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
    }
  </script>
</body>
</html>