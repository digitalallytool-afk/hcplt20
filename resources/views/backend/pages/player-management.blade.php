
 
@extends('backend.layouts.main')
@section('content')
 <!-- Main Content Canvas -->
  <main class="ml-[260px] pt-16 min-h-screen">
    <div class="p-container-padding">
      <!-- Page Header Area -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-gutter mb-8">
        <div>
          <nav class="flex items-center gap-2 text-slate-500 font-label-sm mb-2">
            <span>Management</span>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-amber-600 font-bold">Players</span>
          </nav>
          <h2 class="font-h1 text-on-background">Player Registry</h2>
          <p class="font-body-md text-on-surface-variant mt-1">Manage, verify, and track performance of all
            league-registered players.</p>
        </div>
        <div class="flex items-center gap-3">
          <button
            class="bg-slate-100 text-slate-700 px-4 py-2 font-label-md rounded flex items-center gap-2 hover:bg-slate-200 transition-colors">
            <span class="material-symbols-outlined text-lg">download</span>
            Export CSV
          </button>
          <button
            class="bg-slate-950 text-white px-5 py-2 font-label-md rounded flex items-center gap-2 hover:bg-slate-900 transition-all active:scale-95 shadow-lg shadow-slate-200">
            <span class="material-symbols-outlined text-lg">person_add</span>
            Register Player
          </button>
        </div>
      </div>
      <!-- Bento Stats Grid -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter mb-8">
        <div
          class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div
              class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">groups</span>
            </div>
            <span class="font-label-sm text-green-600 bg-green-50 px-2 py-0.5 rounded">+12%</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Total Players</p>
          <p class="font-display text-slate-950">1,284</p>
        </div>
        <div
          class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div
              class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">verified</span>
            </div>
            <span class="font-label-sm text-amber-600 bg-amber-50 px-2 py-0.5 rounded">Active</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Verified Status</p>
          <p class="font-display text-slate-950">942</p>
        </div>
        <div
          class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div
              class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">military_tech</span>
            </div>
            <span class="font-label-sm text-slate-400 px-2 py-0.5">Top Tier</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Star Performers</p>
          <p class="font-display text-slate-950">48</p>
        </div>
        <div
          class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div
              class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">pending_actions</span>
            </div>
            <span class="font-label-sm text-red-600 bg-red-50 px-2 py-0.5 rounded">High Pri</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Pending Reviews</p>
          <p class="font-display text-slate-950">14</p>
        </div>
      </div>
      <!-- Main Data Canvas -->
      <div class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden">
        <!-- Advanced Filter Bar -->
        <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
          <div class="relative w-full md:w-96">
            <span
              class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
            <input
              class="w-full pl-10 pr-4 py-2 border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0 transition-all"
              placeholder="Search by name, team, or player ID..." type="text" />
          </div>
          <div class="flex items-center gap-3 w-full md:w-auto">
            <select class="border-slate-200 rounded font-body-sm py-2 px-4 focus:border-amber-400 focus:ring-0">
              <option>All Teams</option>
              <option>Royal Challengers</option>
              <option>Mumbai Titans</option>
              <option>Chennai Kings</option>
            </select>
            <select class="border-slate-200 rounded font-body-sm py-2 px-4 focus:border-amber-400 focus:ring-0">
              <option>All Roles</option>
              <option>Batsman</option>
              <option>Bowler</option>
              <option>All-Rounder</option>
              <option>Wicket Keeper</option>
            </select>
            <button
              class="flex items-center gap-2 border border-slate-200 px-4 py-2 rounded font-body-sm hover:bg-slate-50">
              <span class="material-symbols-outlined text-lg">filter_list</span>
              More
            </button>
          </div>
        </div>
        <!-- High Density Data Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-slate-50/50 border-b border-slate-200">
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">
                  <div class="flex items-center gap-1 cursor-pointer hover:text-slate-900 transition-colors">
                    Player Name <span class="material-symbols-outlined text-sm text-amber-500">arrow_downward</span>
                  </div>
                </th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">Status</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-right">Total Runs</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-right">Wickets</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              <!-- Row 1 -->
              <tr class="hover:bg-slate-50 transition-colors group">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300">
                      <img class="w-full h-full object-cover"
                        data-alt="A close-up portrait of a professional cricket player in his late 20s. He is wearing a dark navy blue team jersey with subtle gold piping. His expression is confident and determined, with soft daylight coming from the side to highlight facial features. Professional studio lighting with a clean, high-end commercial feel."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCI-JzsxGRboN7PDX9IPF5niacCAJyqFcjfVEk7vauKa7LfPo04NBOUC-zIMyltZgzc_UGQYlT5IW4U-_F5ToZNk5NJAEpFMGFNd56hP3tEcYQSIQRiA7MzZ9UlYrP9MPVztIvTfoPRHOO1ctgjDLbP4FOdV_lir1RSBi_J_IzmZ2fDTcbBgMar08ECn1gltpANca5UDq65klQ78xbR7BOcPSet6Muej6VKdMeg93DKOVB60HTtar5dzel2r7G2QumDmKNWJ-GvgBQr" />
                    </div>
                    <div>
                      <p class="font-h3 text-slate-900 text-sm mb-0">Arjun Sharma</p>
                      <p class="font-body-sm text-slate-500">ID: #PL-89421</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-sm">sports_cricket</span>
                    <span class="font-body-md text-sm text-slate-700">Batsman</span>
                  </div>
                </td>
                <td class="px-6 py-4 text-center">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Active
                  </span>
                </td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">4,120</td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">2</td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">visibility</span></button>
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">edit</span></button>
                    <button
                      class="p-2 hover:bg-red-50 rounded transition-colors text-slate-500 hover:text-red-600"><span
                        class="material-symbols-outlined text-lg">delete</span></button>
                  </div>
                </td>
              </tr>
              <!-- Row 2 -->
              <tr class="hover:bg-slate-50 transition-colors group">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300">
                      <img class="w-full h-full object-cover"
                        data-alt="Portrait of a young athletic male cricketer with a short beard, wearing a professional athletic polo shirt. The background is a vibrant green cricket stadium during a sunny day, with soft bokeh effect. High-contrast lighting and sharp focus on the player's face, conveying a sense of energy and sportsmanship."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuD6Cnxgyz0LwkZjWbd3rt_XQWtbTqdGn8VueLmjEFCxW8J4V75m_-_lcgwE3RsQcuO3v5SqFyqLPu0mOLOc_YzVVZaKxI2VfscaTumH2zP-46-Or-or03IMmR0M6wri1_-RDL4-UnPlcKCrkiQbmQn3RHSHP9I-G182qXTRQO64cPZ-Y1IH0_Bq_shWmAAL3SiI0OZMuVUbiFL87CS-x8YRu3c9Vhb5qGzKflZqqDty9aq-RCOO1mKTUsZgDH26uRlCfAPORNDq1k2t" />
                    </div>
                    <div>
                      <p class="font-h3 text-slate-900 text-sm mb-0">Vikram Singh</p>
                      <p class="font-body-sm text-slate-500">ID: #PL-89422</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 text-sm">sports_handball</span>
                    <span class="font-body-md text-sm text-slate-700">Bowler</span>
                  </div>
                </td>
                <td class="px-6 py-4 text-center">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Active
                  </span>
                </td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">145</td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">212</td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">visibility</span></button>
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">edit</span></button>
                    <button
                      class="p-2 hover:bg-red-50 rounded transition-colors text-slate-500 hover:text-red-600"><span
                        class="material-symbols-outlined text-lg">delete</span></button>
                  </div>
                </td>
              </tr>
              <!-- Row 3 -->
              <tr class="hover:bg-slate-50 transition-colors group">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300">
                      <img class="w-full h-full object-cover"
                        data-alt="A portrait of a female sports professional in her 30s. She is wearing a modern athletic performance top in charcoal grey. Her hair is tied back cleanly. The lighting is bright and even, like a high-end gym or training center. The overall mood is focused and professional, suitable for an elite sports management interface."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcETBAnuEai0MVQSK7wevGcrum78rKe1zjDuscv19pceh71eHoUqorQ2ZgrdG1rPD18lZ3WX12qH3H6Ojh1vLDaz8Cl77qslJdagiBhVvQJatRk6smvIDzDWwoIgl6W-teTRzs5nZ5XB2OgUwYakSYdi86mjqitTstKqjJFsiRw6NUQi96CD9-ssSTua-af0ETvtEohG0WA_HTZJyme0sN2FymVt63foQdosoXmxKgEzJXPSJRDAZC3o57j1rJi6F7DLd7Y7BvMGCz" />
                    </div>
                    <div>
                      <p class="font-h3 text-slate-900 text-sm mb-0">Rohan Dasgupta</p>
                      <p class="font-body-sm text-slate-500">ID: #PL-89423</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-sm">all_inclusive</span>
                    <span class="font-body-md text-sm text-slate-700">All-Rounder</span>
                  </div>
                </td>
                <td class="px-6 py-4 text-center">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-400 mr-1.5"></span> Inactive
                  </span>
                </td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">2,850</td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">88</td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">visibility</span></button>
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">edit</span></button>
                    <button
                      class="p-2 hover:bg-red-50 rounded transition-colors text-slate-500 hover:text-red-600"><span
                        class="material-symbols-outlined text-lg">delete</span></button>
                  </div>
                </td>
              </tr>
              <!-- Row 4 -->
              <tr class="hover:bg-slate-50 transition-colors group">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300">
                      <img class="w-full h-full object-cover"
                        data-alt="A portrait of a male professional athlete in his mid-20s, featuring a crisp white sports uniform. He has a determined look and is set against a vibrant stadium backdrop under bright stadium lights. The aesthetic is clean and modern, highlighting the professional standards of the league."
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIjOYHu31_5c0UJBuKDGVx6D2IQOcz2-v6BvQv1ylpuLOISsBVOiiDiOu4bI-nD6h01shsUxVXmqqVUzsg0C3Lvl2pm7GJE3E3OcLsXlVZBcziVErdsTWQUjxdFh8-KyLi6A8YKu7Eg-8e-K4q_E0dGTY3EbH0sKG4a4n_H7zupMtvMSQex9kz07Z3p5XRfy_rtEPi5IHYY1dVzpAup6ePcaAC0AX8latE7fhyuaNiSv-Jx15LXcsfZh5CzcT_Ni3H9pi8UKqF8URj" />
                    </div>
                    <div>
                      <p class="font-h3 text-slate-900 text-sm mb-0">Kabir Mehta</p>
                      <p class="font-body-sm text-slate-500">ID: #PL-89424</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-sm">front_hand</span>
                    <span class="font-body-md text-sm text-slate-700">Wicket Keeper</span>
                  </div>
                </td>
                <td class="px-6 py-4 text-center">
                  <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Active
                  </span>
                </td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">1,890</td>
                <td class="px-6 py-4 text-right font-data-tabular font-medium text-slate-900">0</td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">visibility</span></button>
                    <button
                      class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900"><span
                        class="material-symbols-outlined text-lg">edit</span></button>
                    <button
                      class="p-2 hover:bg-red-50 rounded transition-colors text-slate-500 hover:text-red-600"><span
                        class="material-symbols-outlined text-lg">delete</span></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- Modern Pagination Shell -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-200 flex items-center justify-between">
          <p class="font-body-sm text-slate-500">Showing <span class="font-medium text-slate-900">1</span> to <span
              class="font-medium text-slate-900">10</span> of <span class="font-medium text-slate-900">1,284</span>
            players</p>
          <div class="flex items-center gap-1">
            <button class="p-2 rounded border border-slate-200 bg-white text-slate-400 cursor-not-allowed">
              <span class="material-symbols-outlined text-lg">chevron_left</span>
            </button>
            <button class="px-3 py-1.5 rounded bg-slate-900 text-white font-label-sm">1</button>
            <button
              class="px-3 py-1.5 rounded bg-white border border-slate-200 text-slate-600 font-label-sm hover:bg-slate-50">2</button>
            <button
              class="px-3 py-1.5 rounded bg-white border border-slate-200 text-slate-600 font-label-sm hover:bg-slate-50">3</button>
            <span class="px-2 text-slate-400">...</span>
            <button
              class="px-3 py-1.5 rounded bg-white border border-slate-200 text-slate-600 font-label-sm hover:bg-slate-50">128</button>
            <button
              class="p-2 rounded border border-slate-200 bg-white text-slate-600 hover:bg-slate-50 transition-colors">
              <span class="material-symbols-outlined text-lg">chevron_right</span>
            </button>
          </div>
        </div>
      </div>
      <!-- Contextual Help / Status -->
      <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-gutter">
        <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-r">
          <div class="flex">
            <span class="material-symbols-outlined text-amber-600 mr-3">info</span>
            <div>
              <p class="font-label-md text-amber-900">Compliance Warning</p>
              <p class="font-body-sm text-amber-700">There are 14 players with expired medical certificates. These
                players will be automatically set to 'Inactive' status in 48 hours if no action is taken.</p>
            </div>
          </div>
        </div>
        <div class="bg-slate-900 text-white p-6 rounded flex items-center justify-between shadow-lg">
          <div>
            <h4 class="font-h3 text-white mb-1">Need specialized reports?</h4>
            <p class="font-body-sm text-slate-400">Generate deep-dive analytics for scout reviews or draft preparation.
            </p>
          </div>
          <button
            class="bg-amber-400 text-slate-950 px-4 py-2 font-label-md rounded hover:bg-amber-300 transition-colors whitespace-nowrap">
            Open Analytics
          </button>
        </div>
      </div>
    </div>
  </main>
  <!-- Floating Quick Action (Only on Dashboard/Management) -->
  <div class="fixed bottom-8 right-8 z-50">
    <button
      class="w-14 h-14 bg-amber-400 text-slate-950 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all group">
      <span class="material-symbols-outlined text-2xl" data-weight="fill">add</span>
      <span
        class="absolute right-full mr-4 bg-slate-900 text-white px-3 py-1.5 rounded text-sm font-medium whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none">Quick
        Register</span>
    </button>
  </div>
@endsection