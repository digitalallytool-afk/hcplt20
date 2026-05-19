
 @extends('backend.layouts.main')

 @section('content')
 
 <!-- Main Canvas -->
  <main class="ml-[260px] min-h-screen">
    <!-- TopAppBar -->

    <!-- Page Content -->
    <div class="pt-24 px-8 pb-12">
      <!-- Bento Grid Header Stats -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Total Registered Players -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-primary p-2 bg-surface-container-low rounded-lg">group</span>
            <span
              class="text-label-sm font-label-sm text-secondary px-2 py-1 bg-secondary-container/20 rounded">+12%</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Total Registered Players</p>
            <h3 class="text-display font-display text-on-surface">14,282</h3>
          </div>
        </div>
        <!-- Upcoming Trials -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between">
          <div class="flex justify-between items-start">
            <span
              class="material-symbols-outlined text-primary p-2 bg-surface-container-low rounded-lg">assignment_ind</span>
            <span class="text-label-sm font-label-sm text-on-surface-variant">Next: 48h</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Upcoming Trials</p>
            <h3 class="text-display font-display text-on-surface">24</h3>
          </div>
        </div>
        <!-- Matches Today -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between">
          <div class="flex justify-between items-start">
            <span
              class="material-symbols-outlined text-primary p-2 bg-surface-container-low rounded-lg">sports_cricket</span>
            <span class="text-label-sm font-label-sm text-error px-2 py-1 bg-error-container/30 rounded">Live Now</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Matches Today</p>
            <h3 class="text-display font-display text-on-surface">08</h3>
          </div>
        </div>
        <!-- Recent Revenue -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-primary p-2 bg-surface-container-low rounded-lg">payments</span>
            <span class="text-label-sm font-label-sm text-secondary px-2 py-1 bg-secondary-container/20 rounded">Record
              Day</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Recent Revenue (24h)</p>
            <h3 class="text-display font-display text-on-surface">₹4.2L</h3>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Activity Feed (2/3 width) -->
        <div class="lg:col-span-2 space-y-6">
          <div class="bg-white rounded-xl border border-outline-variant shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-outline-variant flex justify-between items-center bg-slate-50/50">
              <h3 class="font-h3 text-h3 text-on-surface">Recent Activity Feed</h3>
              <button class="text-label-sm font-label-sm text-secondary hover:underline">View All Activity</button>
            </div>
            <div class="divide-y divide-outline-variant">
              <!-- Registration Entry -->
              <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                  <span class="material-symbols-outlined text-blue-600 text-[20px]">person_add</span>
                </div>
                <div class="flex-1">
                  <div class="flex justify-between">
                    <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">Rahul Sharma</span>
                      registered for U-19 League Trials</p>
                    <span class="text-label-sm font-label-sm text-on-surface-variant">2 mins ago</span>
                  </div>
                  <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Zone: Mumbai North • All-rounder •
                    Right Arm Pace</p>
                </div>
              </div>
              <!-- Payment Entry -->
              <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center shrink-0">
                  <span class="material-symbols-outlined text-green-600 text-[20px]">check_circle</span>
                </div>
                <div class="flex-1">
                  <div class="flex justify-between">
                    <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">Payment
                        Confirmed</span> for Team Titans Registration</p>
                    <span class="text-label-sm font-label-sm text-on-surface-variant">14 mins ago</span>
                  </div>
                  <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Ref ID: #HCPL-99283 • Amount:
                    ₹25,000 • Status: Settled</p>
                </div>
              </div>
              <!-- Registration Entry -->
              <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center shrink-0">
                  <span class="material-symbols-outlined text-blue-600 text-[20px]">person_add</span>
                </div>
                <div class="flex-1">
                  <div class="flex justify-between">
                    <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">Ananya Patel</span>
                      registered for Women's Premier League</p>
                    <span class="text-label-sm font-label-sm text-on-surface-variant">45 mins ago</span>
                  </div>
                  <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Zone: Gujarat East • Wicketkeeper
                    Batter</p>
                </div>
              </div>
              <!-- Payment Entry -->
              <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                <div class="w-10 h-10 rounded-full bg-green-50 flex items-center justify-center shrink-0">
                  <span class="material-symbols-outlined text-green-600 text-[20px]">check_circle</span>
                </div>
                <div class="flex-1">
                  <div class="flex justify-between">
                    <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">Trial Fee
                        Received</span> from 12 New Players</p>
                    <span class="text-label-sm font-label-sm text-on-surface-variant">1 hour ago</span>
                  </div>
                  <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Bulk Processing • Batch #B-404 •
                    Total: ₹18,000</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Sidebar Content (Quick Links & Performance) -->
        <div class="space-y-6">
          <!-- Quick Links Card -->
          <div class="bg-primary-container text-white rounded-xl shadow-xl p-6">
            <h3 class="text-h3 font-h3 mb-6">Quick Actions</h3>
            <div class="grid grid-cols-1 gap-3">
              <button
                class="flex items-center gap-3 w-full p-4 bg-slate-800 hover:bg-slate-700 rounded-lg transition-all border border-slate-700">
                <span class="material-symbols-outlined text-amber-400">add_task</span>
                <span class="font-label-md font-label-md">Trial Management</span>
              </button>
              <button
                class="flex items-center gap-3 w-full p-4 bg-slate-800 hover:bg-slate-700 rounded-lg transition-all border border-slate-700">
                <span class="material-symbols-outlined text-amber-400">edit_note</span>
                <span class="font-label-md font-label-md">Score Card Updates</span>
              </button>
              <button
                class="flex items-center gap-3 w-full p-4 bg-slate-800 hover:bg-slate-700 rounded-lg transition-all border border-slate-700">
                <span class="material-symbols-outlined text-amber-400">campaign</span>
                <span class="font-label-md font-label-md">Broadcast Announcement</span>
              </button>
            </div>
          </div>
          <!-- League Health Card -->
          <div class="bg-white rounded-xl border border-outline-variant shadow-sm p-6">
            <div class="flex justify-between items-center mb-6">
              <h3 class="font-h3 text-h3 text-on-surface">League Health</h3>
              <span class="material-symbols-outlined text-on-surface-variant">monitoring</span>
            </div>
            <div class="space-y-4">
              <div>
                <div class="flex justify-between text-label-sm font-label-sm mb-2">
                  <span class="text-on-surface-variant">Venue Utilization</span>
                  <span class="text-on-surface">92%</span>
                </div>
                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                  <div class="bg-secondary h-full" style="width: 92%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-label-sm font-label-sm mb-2">
                  <span class="text-on-surface-variant">Trial Completion</span>
                  <span class="text-on-surface">64%</span>
                </div>
                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                  <div class="bg-secondary h-full" style="width: 64%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-label-sm font-label-sm mb-2">
                  <span class="text-on-surface-variant">Player Verification</span>
                  <span class="text-on-surface">88%</span>
                </div>
                <div class="w-full bg-surface-container h-2 rounded-full overflow-hidden">
                  <div class="bg-secondary h-full" style="width: 88%"></div>
                </div>
              </div>
            </div>
          </div>
          <!-- Upcoming Promo Banner -->
          <div class="relative h-48 rounded-xl overflow-hidden group">
            <img alt="Season Launch"
              class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
              data-alt="A high-intensity cinematic shot of a professional cricket stadium at twilight. The floodlights are beaming down, creating dramatic lens flares and a deep navy and golden orange sky. A sleek, metallic league trophy stands in the foreground, sharp and focused, symbolizing the upcoming championship. The overall mood is epic, prestigious, and highly professional."
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDA6QTcXBcZHBf8ZOf9xGVCJNPUBn0fPwgl3LrwlQaRm1-SRsTMaLj6vyap5cWafk2RXimmKNMnamNX_Z8O5S9KQmOQt8exbbb9MqsKPRTZvDcZDENhmWf2-LFrG23KjX1mby10qfnDy57ZqWMQ9mcRsxq1-H6SBuAIqdY_fLXZzBlQllLJrojjeHdZTp-a_s_EUiOSJIinGQLjecmbsYOtDo19Yhr5PAbhb7QAHh0WVVe-M1Dm7ka7BQs3Or7PwqqS6d8rECpl2Cfa" />
            <div class="absolute inset-0 bg-gradient-to-t from-slate-950 to-transparent flex flex-col justify-end p-6">
              <p class="text-amber-400 font-label-sm text-label-sm mb-1 uppercase tracking-widest">Global Event</p>
              <h4 class="text-white font-h3 text-h3 leading-tight">Season 6 Registrations Opening Soon</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection