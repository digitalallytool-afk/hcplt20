
  
  @extends('backend.layouts.main')
@section('content')
  <main class="flex-1 ml-[260px] min-h-screen flex flex-col">
   
    <!-- Page Content Canvas -->
    <div class="mt-16 p-8 flex flex-col gap-8">
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
          <h1 class="font-h1 text-h1 text-on-surface">Trial Management</h1>
          <p class="font-body-md text-body-md text-on-primary-container">Orchestrate regional talent identification and
            scouting events.</p>
        </div>
        <div class="flex items-center gap-3">
          <button
            class="flex items-center gap-2 px-4 py-2 border border-outline-variant bg-surface-container-lowest text-on-surface rounded-lg font-label-md text-label-md hover:bg-slate-50 transition-all active:scale-95">
            <span class="material-symbols-outlined text-lg">file_download</span> Export Data
          </button>
          <button
            class="flex items-center gap-2 px-6 py-2.5 bg-secondary-container text-on-secondary-fixed-variant rounded-lg font-label-md text-label-md hover:brightness-95 transition-all active:scale-95 shadow-sm">
            <span class="material-symbols-outlined text-lg">add_circle</span> Create New Trial
          </button>
        </div>
      </div>
      <!-- Dashboard Stats & Quick View -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
        <div class="bg-surface-container-lowest p-6 border border-outline-variant rounded-xl shadow-sm">
          <div class="flex justify-between items-start mb-4">
            <span class="material-symbols-outlined text-slate-400 bg-slate-50 p-2 rounded-lg">event_available</span>
            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+12%</span>
          </div>
          <p class="text-label-sm font-medium text-on-primary-container mb-1 uppercase tracking-wider">Active Trials</p>
          <h3 class="text-h2 font-h2 text-primary">08</h3>
        </div>
        <div class="bg-surface-container-lowest p-6 border border-outline-variant rounded-xl shadow-sm">
          <div class="flex justify-between items-start mb-4">
            <span class="material-symbols-outlined text-slate-400 bg-slate-50 p-2 rounded-lg">groups</span>
            <span class="text-xs font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full">+2.4k</span>
          </div>
          <p class="text-label-sm font-medium text-on-primary-container mb-1 uppercase tracking-wider">Total Applicants
          </p>
          <h3 class="text-h2 font-h2 text-primary">12,482</h3>
        </div>
        <div class="bg-surface-container-lowest p-6 border border-outline-variant rounded-xl shadow-sm">
          <div class="flex justify-between items-start mb-4">
            <span class="material-symbols-outlined text-slate-400 bg-slate-50 p-2 rounded-lg">payments</span>
            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">Pending</span>
          </div>
          <p class="text-label-sm font-medium text-on-primary-container mb-1 uppercase tracking-wider">Revenue Collected
          </p>
          <h3 class="text-h2 font-h2 text-primary">₹4.2M</h3>
        </div>
        <div class="bg-surface-container-lowest p-6 border border-outline-variant rounded-xl shadow-sm">
          <div class="flex justify-between items-start mb-4">
            <span class="material-symbols-outlined text-slate-400 bg-slate-50 p-2 rounded-lg">map</span>
          </div>
          <p class="text-label-sm font-medium text-on-primary-container mb-1 uppercase tracking-wider">Active Locations
          </p>
          <h3 class="text-h2 font-h2 text-primary">14</h3>
        </div>
      </div>
      <!-- Search and Filters Bar -->
      <div
        class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex flex-wrap items-center gap-4 shadow-sm">
        <div class="flex-1 relative min-w-[300px]">
          <span
            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-primary-container">search</span>
          <input
            class="w-full pl-10 pr-4 py-2 border border-outline-variant rounded-lg font-body-sm text-body-sm focus:ring-2 focus:ring-secondary-container focus:border-secondary-container outline-none bg-surface-bright"
            placeholder="Search trials by name, ID, or location..." type="text" />
        </div>
        <div class="flex items-center gap-2">
          <select
            class="px-4 py-2 border border-outline-variant rounded-lg font-label-md text-label-md bg-surface-bright text-on-surface-variant focus:outline-none">
            <option>All Statuses</option>
            <option>Upcoming</option>
            <option>Live</option>
            <option>Completed</option>
          </select>
          <select
            class="px-4 py-2 border border-outline-variant rounded-lg font-label-md text-label-md bg-surface-bright text-on-surface-variant focus:outline-none">
            <option>All Locations</option>
            <option>Mumbai</option>
            <option>Delhi</option>
            <option>Bangalore</option>
          </select>
          <select
            class="px-4 py-2 border border-outline-variant rounded-lg font-label-md text-label-md bg-surface-bright text-on-surface-variant focus:outline-none">
            <option>Age Group</option>
            <option>U-16</option>
            <option>U-19</option>
            <option>Senior</option>
          </select>
          <button class="p-2 border border-outline-variant rounded-lg hover:bg-slate-50">
            <span class="material-symbols-outlined text-on-surface-variant">view_module</span>
          </button>
          <button class="p-2 border border-outline-variant rounded-lg bg-primary text-white">
            <span class="material-symbols-outlined">view_list</span>
          </button>
        </div>
      </div>
      <!-- Main Content Grid -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Trial Listings Table -->
        <div class="lg:col-span-2 flex flex-col gap-6">
          <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
            <table class="w-full text-left border-collapse">
              <thead>
                <tr class="bg-slate-50 border-b border-outline-variant">
                  <th class="px-6 py-4 font-label-md text-label-md text-on-primary-container">Trial Details</th>
                  <th class="px-6 py-4 font-label-md text-label-md text-on-primary-container">Location/Time</th>
                  <th class="px-6 py-4 font-label-md text-label-md text-on-primary-container">Applicants</th>
                  <th class="px-6 py-4 font-label-md text-label-md text-on-primary-container">Status</th>
                  <th class="px-6 py-4 font-label-md text-label-md text-on-primary-container"></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-outline-variant">
                <!-- Trial Row 1 -->
                <tr class="hover:bg-slate-50 transition-colors group">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-body-md text-on-surface font-semibold">HCPL North Zone U-19 Trials</p>
                      <div class="flex items-center gap-2 mt-1">
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">U-19</span>
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">₹1,500</span>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">location_on</span> Mumbai Cricket Academy
                      </div>
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">calendar_today</span> 15 Oct, 09:00 AM
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col">
                      <span class="font-data-tabular text-body-md font-bold text-on-surface">1,240</span>
                      <span class="text-[11px] text-emerald-600 font-semibold uppercase tracking-tight">85%
                        Capacity</span>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <span
                      class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                      <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Live
                    </span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button
                      class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">more_vert</button>
                  </td>
                </tr>
                <!-- Trial Row 2 -->
                <tr class="hover:bg-slate-50 transition-colors group">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-body-md text-on-surface font-semibold">Regional Scouting - Karnataka</p>
                      <div class="flex items-center gap-2 mt-1">
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">Senior</span>
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">₹2,000</span>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">location_on</span> Chinnaswamy Stadium
                      </div>
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">calendar_today</span> 22 Oct, 10:30 AM
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col">
                      <span class="font-data-tabular text-body-md font-bold text-on-surface">458</span>
                      <span class="text-[11px] text-amber-600 font-semibold uppercase tracking-tight">Open Reg</span>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <span
                      class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                      <span class="w-1.5 h-1.5 rounded-full bg-amber-400"></span> Upcoming
                    </span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button
                      class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">more_vert</button>
                  </td>
                </tr>
                <!-- Trial Row 3 -->
                <tr class="hover:bg-slate-50 transition-colors group">
                  <td class="px-6 py-4">
                    <div>
                      <p class="font-body-md text-on-surface font-semibold">U-16 Talent Search - Delhi</p>
                      <div class="flex items-center gap-2 mt-1">
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">U-16</span>
                        <span class="text-xs px-2 py-0.5 bg-slate-100 text-slate-600 rounded">₹1,200</span>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col gap-1">
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">location_on</span> Arun Jaitley Stadium
                      </div>
                      <div class="flex items-center gap-1.5 text-on-primary-container font-body-sm text-body-sm">
                        <span class="material-symbols-outlined text-base">calendar_today</span> 05 Oct, 08:30 AM
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <div class="flex flex-col">
                      <span class="font-data-tabular text-body-md font-bold text-on-surface">2,850</span>
                      <span class="text-[11px] text-slate-500 font-semibold uppercase tracking-tight">Closed</span>
                    </div>
                  </td>
                  <td class="px-6 py-4">
                    <span
                      class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                      <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Completed
                    </span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button
                      class="material-symbols-outlined text-slate-400 group-hover:text-primary transition-colors">more_vert</button>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="bg-slate-50 px-6 py-4 border-t border-outline-variant flex items-center justify-between">
              <span class="font-body-sm text-body-sm text-on-primary-container">Showing 3 of 24 trials</span>
              <div class="flex items-center gap-2">
                <button
                  class="p-1 border border-outline-variant rounded bg-white text-on-surface hover:bg-slate-50"><span
                    class="material-symbols-outlined text-lg">chevron_left</span></button>
                <span class="px-3 py-1 bg-primary text-white rounded text-xs font-bold">1</span>
                <button
                  class="px-3 py-1 border border-outline-variant rounded bg-white text-on-surface hover:bg-slate-50 text-xs font-bold">2</button>
                <button
                  class="px-3 py-1 border border-outline-variant rounded bg-white text-on-surface hover:bg-slate-50 text-xs font-bold">3</button>
                <button
                  class="p-1 border border-outline-variant rounded bg-white text-on-surface hover:bg-slate-50"><span
                    class="material-symbols-outlined text-lg">chevron_right</span></button>
              </div>
            </div>
          </div>
        </div>
        <!-- Recent Applicants Sidebar -->
        <div class="flex flex-col gap-6">
          <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
              <h3 class="font-h3 text-h3 text-on-surface">Recent Applicants</h3>
              <button class="text-label-sm text-secondary font-bold hover:underline">View All</button>
            </div>
            <div class="flex flex-col gap-4">
              <!-- Applicant 1 -->
              <div
                class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-all border border-transparent hover:border-outline-variant">
                <img alt="Applicant" class="w-10 h-10 rounded-full object-cover"
                  data-alt="A portrait of a young, athletic Indian male cricketer wearing a white jersey. He has a determined expression and is captured in a professional headshot style. The background is a vibrant green cricket field under bright, afternoon sunlight. The image quality is high with sharp details and balanced colors suited for a premium admin interface."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuCXUxirxge9dFchTGhDrJJeuvk7P4J4MHsvAU6Kwpp_iD-tRPy2TPXErQWryzQBt3gKOuYuINOm2ILDN506oWreW76KKBajRRZJ6pOaZNU4mM14tgzFOQSZ19yLt5e9Gztote8xJ8sS4AGDO3Of4YPHOvHR6M7zZnmj5y8jdCwwKF-RxKeK7mHAdZQs6R43WS3Vof5WWBD11v08fJnV2OxPyOAgnknT5Sqyl7Mb3W697eNNcL5TXhFl3OC4K4nLD9PejI7_zQzUBXAn" />
                <div class="flex-1 overflow-hidden">
                  <p class="font-body-sm text-on-surface font-bold truncate">Arjun Sharma</p>
                  <p class="text-[11px] text-on-primary-container uppercase tracking-tight">Mumbai • U-19 • Fast Bowler
                  </p>
                </div>
                <div class="text-right">
                  <p class="text-[10px] text-on-primary-container font-medium">2 mins ago</p>
                  <span class="text-[10px] px-1.5 py-0.5 bg-emerald-50 text-emerald-600 rounded font-bold">PAID</span>
                </div>
              </div>
              <!-- Applicant 2 -->
              <div
                class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-all border border-transparent hover:border-outline-variant">
                <img alt="Applicant" class="w-10 h-10 rounded-full object-cover"
                  data-alt="A studio portrait of a young male athlete with sharp features and a focused gaze. He is wearing a modern sports training shirt in a dark charcoal color. The lighting is dramatic and crisp, emphasizing the texture of his skin and the quality of the image. The style is professional and fits the 'Modern Commissioner' brand identity."
                  src="https://lh3.googleusercontent.com/aida-public/AB6AXuBvZxhJpKKQ82xIyUe7JfTFdv6vT325P-PD25CIf83ZBem54WW_aEw2WDUIxp9rT_ewQvPLkbRsDVO0PFFkJW2kVvkxp8ws2ltC0RBINKEAySu5Gl8z_3-cWCU3oxx3UTywD3pF5eea8eZwIGB0BrMoTIbIZQ8dUgWQqGZTY_EJY4t0plvh-KNWwsI63u6g0k6QN5nFEPr76KBgcTRgn-dDbVVyy0QC3Qzm9J4EsJAwxXPCLnRc2KqT3HWoUs4kqcDwb53m7M3QXF70" />
                <div class="flex-1 overflow-hidden">
                  <p class="font-body-sm text-on-surface font-bold truncate">Rahul Dravid Jr.</p>
                  <p class="text-[11px] text-on-primary-container uppercase tracking-tight">Karnataka • Senior • Wicket
                    Keeper</p>
                </div>
                <div class="text-right">
                  <p class="text-[10px] text-on-primary-container font-medium">15 mins ago</p>
                  <span class="text-[10px] px-1.5 py-0.5 bg-emerald-50 text-emerald-600 rounded font-bold">PAID</span>
                </div>
              </div>
              <!-- Applicant 3 -->
              <div
                class="flex items-center gap-4 p-3 rounded-lg hover:bg-slate-50 transition-all border border-transparent hover:border-outline-variant">
                <div
                  class="w-10 h-10 rounded-full bg-slate-200 flex items-center justify-center text-slate-500 font-bold">
                  VK</div>
                <div class="flex-1 overflow-hidden">
                  <p class="font-body-sm text-on-surface font-bold truncate">Vikas Khanna</p>
                  <p class="text-[11px] text-on-primary-container uppercase tracking-tight">Delhi • U-16 • All Rounder
                  </p>
                </div>
                <div class="text-right">
                  <p class="text-[10px] text-on-primary-container font-medium">1 hour ago</p>
                  <span class="text-[10px] px-1.5 py-0.5 bg-amber-50 text-amber-600 rounded font-bold">PENDING</span>
                </div>
              </div>
            </div>
          </div>
          <!-- Map Preview Card -->
          <div
            class="bg-slate-900 border border-slate-800 rounded-xl overflow-hidden relative shadow-lg min-h-[200px] flex flex-col justify-end p-6">
            <div class="absolute inset-0 opacity-40 grayscale contrast-125">
              <img alt="Mumbai Map" class="w-full h-full object-cover"
                data-alt="A stylized, high-contrast digital map of Mumbai, India, featuring glowing transit lines and highlighted urban zones. The aesthetic is clean and modern, utilizing a monochromatic blue and gold color scheme to indicate population density and cricket trial locations. The mood is sophisticated and data-driven, reflecting a professional administrative command center."
                data-location="Mumbai"
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCA164g7MpcwfLTtjx__AaggvyKBfgAAQzJzFQLs_0zQmO9m91IeAXBThJAv7XFNKRjtIhKNqiUoJK__9NJf9_TiaeKAqfw52IBkyaA9FgDKrVZZiRV67QcVVgpv-9u4Okjiwc_7JHArFlB1uvWvshNqUH0QV1CAns7yLRgaNSS0R0yxP95SnhVi6xH812GKs1Cy-zh4g-GkxtR12ACZdXrkV2_WPJ4lMFYaeNnpSgzvz-QA4Dg5bkbCeFgfx7LpArbvAh-51uwaOXZ" />
            </div>
            <div class="relative z-10">
              <h4 class="text-white font-h3 text-h3 mb-1">Trial Locations</h4>
              <p class="text-slate-400 text-body-sm font-body-sm mb-4">View geographic distribution of scouting hubs
                across India.</p>
              <button
                class="w-full py-2 bg-amber-400 text-slate-950 rounded font-bold text-label-md hover:bg-amber-300 transition-colors">Launch
                Geographic Console</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- FAB for Create New Trial -->
  <div class="fixed bottom-8 right-8 z-50">
    <button
      class="w-14 h-14 bg-primary text-white rounded-full shadow-2xl flex items-center justify-center hover:scale-105 active:scale-95 transition-all">
      <span class="material-symbols-outlined text-2xl" data-weight="fill">add</span>
    </button>
  </div>
@endsection