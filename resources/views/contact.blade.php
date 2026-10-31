<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MUBS - Contact & Support</title>
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
              navyDark: '#07162B',
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

  @include('includes.header')

  <!-- MAIN CONTACT CONTAINER -->
  <main class="flex-grow max-w-7xl w-full mx-auto px-4 py-8 sm:py-12 flex flex-col justify-center space-y-10">

    <!-- HERO TITLE -->
    <div class="text-center max-w-2xl mx-auto space-y-3">
      <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-3.5 py-1.5 rounded-full uppercase tracking-wider border border-amber-200">
        Support Desk & Inquiries
      </span>
      <h1 class="text-3xl sm:text-4xl font-extrabold text-mubs-navy tracking-tight">How Can We Help You Today?</h1>
      <p class="text-sm text-mubs-textMuted">
        Have questions regarding admissions, student registration, or portal authentication? Reach out directly to the Makerere University Business School team.
      </p>
    </div>

    <!-- QUICK CONTACT STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Card 1: Campus -->
      <div class="bg-white p-6 rounded-3xl border border-gray-200/80 shadow-lg flex items-start space-x-4 hover:border-mubs-amber/50 transition-all">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center text-mubs-amber text-xl shrink-0">
          <i class="fa-solid fa-building-columns"></i>
        </div>
        <div>
          <h3 class="font-bold text-mubs-navy text-sm">Main Campus</h3>
          <p class="text-xs text-mubs-textMuted mt-1 leading-relaxed">
            Plot 21A, Port Bell Road, Nakawa<br>
            P.O. Box 1337, Kampala, Uganda
          </p>
        </div>
      </div>

      <!-- Card 2: Email -->
      <div class="bg-white p-6 rounded-3xl border border-gray-200/80 shadow-lg flex items-start space-x-4 hover:border-mubs-amber/50 transition-all">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center text-mubs-amber text-xl shrink-0">
          <i class="fa-solid fa-envelope-open-text"></i>
        </div>
        <div>
          <h3 class="font-bold text-mubs-navy text-sm">Email Helpdesk</h3>
          <p class="text-xs text-mubs-textMuted mt-1 leading-relaxed">
            General: <span class="font-semibold text-mubs-navy">info@mubs.ac.ug</span><br>
            Support: <span class="font-semibold text-mubs-navy">helpdesk@mubs.ac.ug</span>
          </p>
        </div>
      </div>

      <!-- Card 3: Hotline -->
      <div class="bg-white p-6 rounded-3xl border border-gray-200/80 shadow-lg flex items-start space-x-4 hover:border-mubs-amber/50 transition-all">
        <div class="w-12 h-12 rounded-2xl bg-amber-50 border border-amber-200 flex items-center justify-center text-mubs-amber text-xl shrink-0">
          <i class="fa-solid fa-phone-volume"></i>
        </div>
        <div>
          <h3 class="font-bold text-mubs-navy text-sm">Official Hotlines</h3>
          <p class="text-xs text-mubs-textMuted mt-1 leading-relaxed">
            +256 (0) 414 338120<br>
            +256 (0) 414 223383
          </p>
        </div>
      </div>
    </div>

    <!-- FORM + FAQ CARD -->
    <div class="bg-white rounded-3xl border border-gray-200/80 shadow-2xl p-6 sm:p-10">
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">

        <!-- FORM COLUMN -->
        <div class="lg:col-span-7 space-y-6">
          <div class="space-y-1">
            <h2 class="text-xl font-extrabold text-mubs-navy">Send an Inquiry</h2>
            <p class="text-xs text-mubs-textMuted">Submit your issue below and our portal administrator will email you back.</p>
          </div>

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

          <form id="contactForm" method="POST" action="{{ route('contact.submit') }}" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Full Name</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="e.g. Sarah Namata"
                  class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy">
              </div>
              <div>
                <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="e.g. sarah@gmail.com"
                  class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy">
              </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
              <div>
                <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Student / Staff Reg No.</label>
                <input type="text" name="reg_no" value="{{ old('reg_no') }}" required placeholder="e.g. 2400724428"
                  class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy">
              </div>
              <div>
                <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Department / Inquiry Type</label>
                <select name="department" required
                  class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy appearance-none">
                  <option value="" disabled {{ old('department') ? '' : 'selected' }}>Select an option</option>
                  <option value="Portal Login / Authentication Issue" {{ old('department') === 'Portal Login / Authentication Issue' ? 'selected' : '' }}>Portal Login / Authentication Issue</option>
                  <option value="Academic Registrar & Transcripts" {{ old('department') === 'Academic Registrar & Transcripts' ? 'selected' : '' }}>Academic Registrar & Transcripts</option>
                  <option value="Bursar & Tuition Clearance" {{ old('department') === 'Bursar & Tuition Clearance' ? 'selected' : '' }}>Bursar & Tuition Clearance</option>
                  <option value="Faculty of Computing & Informatics" {{ old('department') === 'Faculty of Computing & Informatics' ? 'selected' : '' }}>Faculty of Computing & Informatics</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Subject</label>
              <input type="text" name="subject" value="{{ old('subject') }}" required placeholder="What do you need assistance with?"
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy">
            </div>

            <div>
              <label class="block text-xs font-bold text-mubs-navy uppercase tracking-wider mb-1.5">Your Message</label>
              <textarea name="message" rows="4" required placeholder="Provide clear details about your query..."
                class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-mubs-amber focus:bg-white transition-all font-medium text-mubs-navy">{{ old('message') }}</textarea>
            </div>

            <button type="submit"
              class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-3.5 px-6 rounded-xl shadow-lg shadow-amber-900/10 transition-all flex items-center justify-center space-x-2 text-base active:scale-[0.99]">
              <span>Submit Request</span>
              <i class="fa-solid fa-arrow-right text-xs"></i>
            </button>
          </form>
        </div>

        <!-- SIDEBAR / FAQ COLUMN -->
        <div class="lg:col-span-5 bg-mubs-navy text-white rounded-2xl p-6 sm:p-8 space-y-6 relative overflow-hidden">
          <div class="absolute -right-12 -bottom-12 w-48 h-48 bg-mubs-amber/20 rounded-full blur-3xl"></div>

          <div class="space-y-2 relative z-10">
            <span class="text-xs font-bold text-mubs-amber uppercase tracking-wider">Need Quick Answers?</span>
            <h3 class="text-lg font-extrabold">Frequently Asked Questions</h3>
          </div>

          <div class="space-y-4 text-xs relative z-10">
            <div class="bg-white/5 border border-white/10 rounded-xl p-3.5 space-y-1">
              <p class="font-bold text-mubs-amber">How do I reset my portal password?</p>
              <p class="text-gray-300">Click on "Forgot Password?" on the login page and follow the link sent to your registered student email.</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-3.5 space-y-1">
              <p class="font-bold text-mubs-amber">Who handles course registration errors?</p>
              <p class="text-gray-300">Contact the Academic Registrar's office or select 'Faculty of Computing & Informatics' in the support form.</p>
            </div>

            <div class="bg-white/5 border border-white/10 rounded-xl p-3.5 space-y-1">
              <p class="font-bold text-mubs-amber">What are support office hours?</p>
              <p class="text-gray-300">Monday – Friday: 8:00 AM – 5:00 PM EAT. Saturday: 9:00 AM – 1:00 PM EAT.</p>
            </div>
          </div>

          <div class="pt-4 border-t border-white/10 relative z-10 flex items-center justify-between">
            <span class="text-xs text-gray-300">Emergency Support Line:</span>
            <span class="text-xs font-bold text-mubs-amber">+256 761 448094</span>
          </div>
        </div>

      </div>
    </div>

  </main>

  <!-- TOAST NOTIFICATION -->
  <div id="toast" class="fixed bottom-6 right-6 z-50 transform translate-y-20 opacity-0 pointer-events-none max-w-sm w-full bg-mubs-navy text-white px-5 py-4 rounded-2xl shadow-2xl flex items-center space-x-3 border border-slate-700">
    <div id="toastIcon" class="text-xl text-mubs-amber">
      <i class="fa-solid fa-circle-check"></i>
    </div>
    <div class="flex-1">
      <div id="toastTitle" class="text-sm font-bold">Notification</div>
      <div id="toastMessage" class="text-xs text-gray-300">Message description.</div>
    </div>
    <button onclick="hideToast()" class="text-gray-400 hover:text-white">
      <i class="fa-solid fa-xmark text-sm"></i>
    </button>
  </div>

  @include('includes.footer')

  <script>
    // ---- Toast helpers ----
    let toastTimeout;
    function showToast(message, type = 'success', title = 'Notice') {
      const toast = document.getElementById('toast');
      const toastTitle = document.getElementById('toastTitle');
      const toastMessage = document.getElementById('toastMessage');
      const toastIcon = document.getElementById('toastIcon');

      toastTitle.textContent = title;
      toastMessage.textContent = message;

      toastIcon.innerHTML = type === 'success'
        ? `<i class="fa-solid fa-circle-check text-emerald-400"></i>`
        : `<i class="fa-solid fa-circle-info text-mubs-amber"></i>`;

      toast.classList.remove('translate-y-20', 'opacity-0', 'pointer-events-none');

      clearTimeout(toastTimeout);
      toastTimeout = setTimeout(() => { hideToast(); }, 4000);
    }

    function hideToast() {
      const toast = document.getElementById('toast');
      toast.classList.add('translate-y-20', 'opacity-0', 'pointer-events-none');
    }

    // ---- Show toast on redirect success (from session flash) ----
    @if (session('success'))
      document.addEventListener('DOMContentLoaded', () => {
        showToast(@json(session('success')), 'success', 'Request Sent');
      });
    @endif

    // ---- Safe double-submit guard (does NOT prevent the real POST) ----
    document.addEventListener('DOMContentLoaded', () => {
      const form = document.getElementById('contactForm');
      if (!form) return;

      form.addEventListener('submit', () => {
        // Let the browser validate first (HTML5 required attributes)
        if (!form.checkValidity()) return;

        const btn = form.querySelector('button[type="submit"]');
        if (btn) {
          btn.disabled = true;
          btn.innerHTML = '<i class="fa-solid fa-spinner animate-spin mr-2"></i><span>Sending...</span>';
        }
      });
    });
  </script>
</body>
</html>