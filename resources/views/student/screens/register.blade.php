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
          
          <!-- Course Card 1 -->
          <div class="border border-gray-200 rounded-2xl p-5 hover:border-mubs-amber transition-all flex flex-col justify-between space-y-4 bg-gray-50/50">
            <div class="space-y-1">
              <div class="flex justify-between items-center">
                <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-2.5 py-1 rounded-lg">BUC3131</span>
                <span class="text-xs font-semibold text-mubs-textMuted">4 Credit Units</span>
              </div>
              <h3 class="font-bold text-mubs-navy text-base mt-2">Advanced Web Application Development</h3>
              <p class="text-xs text-mubs-textMuted">Lecturer: Dr. Prof. Sonny Nyeko / Assoc.</p>
            </div>
            <button onclick="registerCourse('BUC3131', 'Advanced Web Application Development')" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow-sm">
              Register Course
            </button>
          </div>

          <!-- Course Card 2 -->
          <div class="border border-gray-200 rounded-2xl p-5 hover:border-mubs-amber transition-all flex flex-col justify-between space-y-4 bg-gray-50/50">
            <div class="space-y-1">
              <div class="flex justify-between items-center">
                <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-2.5 py-1 rounded-lg">BIT3102</span>
                <span class="text-xs font-semibold text-mubs-textMuted">3 Credit Units</span>
              </div>
              <h3 class="font-bold text-mubs-navy text-base mt-2">Enterprise Systems & ERP (SAP/QuickBooks)</h3>
              <p class="text-xs text-mubs-textMuted">Lecturer: Mr. Kato John</p>
            </div>
            <button onclick="registerCourse('BIT3102', 'Enterprise Systems & ERP')" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow-sm">
              Register Course
            </button>
          </div>

          <!-- Course Card 3 -->
          <div class="border border-gray-200 rounded-2xl p-5 hover:border-mubs-amber transition-all flex flex-col justify-between space-y-4 bg-gray-50/50">
            <div class="space-y-1">
              <div class="flex justify-between items-center">
                <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-2.5 py-1 rounded-lg">BUS3105</span>
                <span class="text-xs font-semibold text-mubs-textMuted">3 Credit Units</span>
              </div>
              <h3 class="font-bold text-mubs-navy text-base mt-2">Research Methodology & Data Analytics</h3>
              <p class="text-xs text-mubs-textMuted">Lecturer: Dr. Nakalema Grace</p>
            </div>
            <button onclick="registerCourse('BUS3105', 'Research Methodology')" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow-sm">
              Register Course
            </button>
          </div>

          <!-- Course Card 4 -->
          <div class="border border-gray-200 rounded-2xl p-5 hover:border-mubs-amber transition-all flex flex-col justify-between space-y-4 bg-gray-50/50">
            <div class="space-y-1">
              <div class="flex justify-between items-center">
                <span class="bg-amber-100 text-mubs-amber font-bold text-xs px-2.5 py-1 rounded-lg">BIT3104</span>
                <span class="text-xs font-semibold text-mubs-textMuted">4 Credit Units</span>
              </div>
              <h3 class="font-bold text-mubs-navy text-base mt-2">Mobile Application Development (Flutter)</h3>
              <p class="text-xs text-mubs-textMuted">Lecturer: Mr. Musasizi Ronald</p>
            </div>
            <button onclick="registerCourse('BIT3104', 'Mobile Application Development')" class="w-full bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold py-2.5 rounded-xl text-xs transition-all shadow-sm">
              Register Course
            </button>
          </div>

        </div>
      </div>