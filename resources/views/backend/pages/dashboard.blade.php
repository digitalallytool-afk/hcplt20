
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
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between hover:border-amber-400 transition-colors">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-primary p-2 bg-surface-container-low rounded-lg">group</span>
            <span class="text-label-sm font-label-sm text-secondary px-2 py-1 bg-secondary-container/20 rounded">Total</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Total Registered Players</p>
            <h3 class="text-display font-display text-on-surface">{{ number_format($totalPlayers) }}</h3>
          </div>
        </div>
        <!-- Verified Players -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between hover:border-amber-400 transition-colors">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-green-600 p-2 bg-green-50 rounded-lg">verified</span>
            <span class="text-label-sm font-label-sm text-green-600 px-2 py-1 bg-green-50 rounded">Active</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Paid / Verified Players</p>
            <h3 class="text-display font-display text-on-surface">{{ number_format($verifiedPlayers) }}</h3>
          </div>
        </div>
        <!-- Upcoming Trials -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between hover:border-amber-400 transition-colors">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-amber-600 p-2 bg-amber-50 rounded-lg">assignment_ind</span>
            <span class="text-label-sm font-label-sm text-amber-600 px-2 py-1 bg-amber-50 rounded">Upcoming</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Active Trials</p>
            <h3 class="text-display font-display text-on-surface">{{ $upcomingTrials }}</h3>
          </div>
        </div>
        <!-- Total Revenue -->
        <div class="bg-white p-6 rounded-xl border border-outline-variant shadow-sm flex flex-col justify-between hover:border-amber-400 transition-colors">
          <div class="flex justify-between items-start">
            <span class="material-symbols-outlined text-indigo-600 p-2 bg-indigo-50 rounded-lg">payments</span>
            <span class="text-label-sm font-label-sm text-indigo-600 px-2 py-1 bg-indigo-50 rounded">Actual</span>
          </div>
          <div class="mt-4">
            <p class="text-label-md font-label-md text-on-surface-variant">Total Collected Revenue</p>
            <h3 class="text-display font-display text-on-surface">₹{{ number_format($totalRevenue) }}</h3>
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
              @forelse($recentActivities as $activity)
                @if($activity->payment_status === 'completed')
                <!-- Payment Entry -->
                <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                  <div class="w-10 h-10 rounded-full bg-green-50 border border-green-100 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-green-600 text-[20px]">check_circle</span>
                  </div>
                  <div class="flex-1">
                    <div class="flex justify-between">
                      <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">{{ $activity->first_name }} {{ $activity->last_name }}</span>
                        completed payment.</p>
                      <span class="text-label-sm font-label-sm text-on-surface-variant">{{ $activity->updated_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">ID: {{ $activity->player_id ?? 'Pending' }} • {{ $activity->state }} • Role: {{ $activity->player_role }}</p>
                  </div>
                </div>
                @else
                <!-- Registration Entry -->
                <div class="p-6 flex gap-4 hover:bg-slate-50 transition-colors">
                  <div class="w-10 h-10 rounded-full bg-amber-50 border border-amber-100 flex items-center justify-center shrink-0">
                    <span class="material-symbols-outlined text-amber-600 text-[20px]">person_add</span>
                  </div>
                  <div class="flex-1">
                    <div class="flex justify-between">
                      <p class="text-body-md font-body-md text-on-surface"><span class="font-bold">{{ $activity->first_name }} {{ $activity->last_name }}</span>
                        registered (Pending Payment).</p>
                      <span class="text-label-sm font-label-sm text-on-surface-variant">{{ $activity->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-body-sm font-body-sm text-on-surface-variant mt-1">Role: {{ $activity->player_role }} • Phone: {{ $activity->phone_number }}</p>
                  </div>
                </div>
                @endif
              @empty
                <div class="p-6 text-center text-slate-500">
                  <span class="material-symbols-outlined text-3xl mb-2 opacity-50">history</span>
                  <p>No recent activities found.</p>
                </div>
              @endforelse
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
                  <span class="text-on-surface-variant">Payment Conversion Rate</span>
                  <span class="text-on-surface">{{ $paymentConversionRate }}%</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                  <div class="bg-amber-400 h-full" style="width: {{ $paymentConversionRate }}%"></div>
                </div>
              </div>
              <div>
                <div class="flex justify-between text-label-sm font-label-sm mb-2">
                  <span class="text-on-surface-variant">Trial Assignment Rate (Verified Players)</span>
                  <span class="text-on-surface">{{ $trialAssignmentRate }}%</span>
                </div>
                <div class="w-full bg-slate-100 h-2 rounded-full overflow-hidden">
                  <div class="bg-amber-400 h-full" style="width: {{ $trialAssignmentRate }}%"></div>
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
              <h4 class="text-white font-h3 text-h3 leading-tight">HCPL Season 1 Registrations Are Live!</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection