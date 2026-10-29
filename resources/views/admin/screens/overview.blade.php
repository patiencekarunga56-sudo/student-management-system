
      <!-- TAB 1: OVERVIEW & ANALYTICS -->
      <section id="tab-content-overview" class="space-y-6">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
          <!-- Main Enrollment Chart -->
          <div class="lg:col-span-2 bg-white p-6 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
              <div>
                <h3 class="font-extrabold text-mubs-navy text-lg">Course Enrollment Trends (AY 2026/2027)</h3>
                <p class="text-xs text-mubs-textMuted">Student registration volume across Bachelor of Business Computing core units</p>
              </div>
              <span class="bg-amber-100 text-mubs-amber text-xs font-bold px-3 py-1 rounded-full border border-amber-200">
                BUC3131 Leading
              </span>
            </div>
            <div class="h-64 sm:h-80 w-full relative">
              <canvas id="enrollmentChart"></canvas>
            </div>
          </div>

          <!-- Departmental Distribution Pie -->
          <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm space-y-4 flex flex-col justify-between">
            <div class="border-b border-slate-100 pb-4">
              <h3 class="font-extrabold text-mubs-navy text-lg">Student Distribution</h3>
              <p class="text-xs text-mubs-textMuted">By Academic Department</p>
            </div>
            <div class="h-60 relative flex items-center justify-center">
              <canvas id="departmentChart"></canvas>
            </div>
            <div class="pt-2 text-center">
              <p class="text-xs text-slate-500 font-medium">Faculty of Computing & Informatics: <span class="font-bold text-mubs-navy">48%</span></p>
            </div>
          </div>
        </div>

        <!-- Coursework Quick Summary Banner -->
        <div class="bg-mubs-navy text-white rounded-3xl p-6 shadow-xl border border-mubs-navyLight flex flex-col md:flex-row items-center justify-between gap-6 relative overflow-hidden">
          <div class="space-y-2 relative z-10 max-w-2xl">
            <span class="bg-mubs-amber text-white font-bold text-[10px] uppercase px-3 py-1 rounded-full tracking-wider">
              Coursework Requirements Verification
            </span>
            <h3 class="text-xl font-black">BUC3131 Student Management System Architecture</h3>
            <p class="text-xs text-gray-300 leading-relaxed">
              Fully compliant with Question 1 to 5 specifications: Migrations, Seeds, Spatie RBAC Authorization Middleware, Eloquent Relationships (<code class="text-amber-300">belongsToMany</code>), and Blade UI layouts.
            </p>
          </div>
          <div class="flex items-center space-x-3 shrink-0 relative z-10">
            <button onclick="switchTab('code')" class="bg-mubs-amber hover:bg-mubs-amberHover text-white font-bold px-5 py-3 rounded-xl text-xs shadow-lg transition-all">
              Inspect Code Specs
            </button>
            <button onclick="switchTab('github')" class="bg-mubs-navyLight hover:bg-slate-700 text-white font-bold px-5 py-3 rounded-xl text-xs border border-slate-600 transition-all">
              View Git Contributions
            </button>
          </div>
        </div>

      </section>