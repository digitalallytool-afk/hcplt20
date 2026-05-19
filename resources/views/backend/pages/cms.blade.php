

 @extends('backend.layouts.main')

 @section('content')
 
  <main class="ml-[260px] pt-24 p-container-padding min-h-screen">
    <div class="max-w-7xl mx-auto space-y-gutter">
      <!-- Dashboard Intro -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
        <div>
          <span class="text-secondary font-label-md uppercase tracking-widest text-xs">Administrative Portal</span>
          <h2 class="font-h1 text-h1 text-primary mt-1">CMS Content Manager</h2>
          <p class="font-body-md text-on-surface-variant max-w-2xl">Manage your homepage banners, trial schedules, and
            media assets from this central command center.</p>
        </div>
        <div class="flex gap-3">
          <button
            class="bg-white border border-outline px-4 py-2 rounded-lg font-label-md text-slate-700 hover:bg-slate-50 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-lg" data-icon="preview">preview</span> Live View
          </button>
          <button
            class="bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md hover:opacity-90 transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-lg" data-icon="publish">publish</span> Publish Changes
          </button>
        </div>
      </div>
      <!-- Slider Manager: High-End Card Layout -->
      <section class="bg-white rounded-xl border border-outline-variant p-6 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between mb-6">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center">
              <span class="material-symbols-outlined text-primary"
                data-icon="gallery_thumbnail">gallery_thumbnail</span>
            </div>
            <h3 class="font-h3 text-h3 text-primary">Slider Manager</h3>
          </div>
          <button
            class="text-secondary hover:bg-secondary/10 px-3 py-1.5 rounded-lg flex items-center gap-2 font-label-md transition-all">
            <span class="material-symbols-outlined text-lg" data-icon="add_circle">add_circle</span> Add New Banner
          </button>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Slider Item 1 -->
          <div
            class="group relative rounded-xl border border-outline-variant overflow-hidden bg-white hover:shadow-md transition-all">
            <img alt="Banner 1" class="w-full h-48 object-cover"
              data-alt="A wide-angle, cinematic photograph of a professional cricket stadium at dusk, with bright floodlights illuminating the green grass. The atmosphere is energetic and grand, capturing the prestige of a high-stakes league match. The color palette features deep blues of the night sky and vibrant greens of the field. This image serves as a high-impact homepage banner background for a sports management platform."
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuCiVzK6epHkrHnE5A5kIlX7iuO2Mu30SewdQz9T-fvTTZMKgdsiRbtCAFdEDsZPC3Q3OiaGZ7MOE5sjaSlpz5CTQ3PCe455u281RJnKAuDBr_xe-o9ZI2IW_3742Wn847cvMJkn0eJvb-B9nTX0qiivAo1i4IZ37tZRKTl8kO0HPH1XST6iSxQbeIrT4dEO3-_fOuYCuwxHvIhvG10qOuOfV5Nid1ioIFSE60CMkRMenhdYvk9GZpdg2BNeF-N9zreoMktInfXpySpZ" />
            <div class="p-4">
              <div class="flex justify-between items-start mb-2">
                <span
                  class="bg-secondary-container text-on-secondary-fixed text-[10px] px-2 py-0.5 rounded font-bold uppercase">Active</span>
                <div class="flex gap-2">
                  <button class="p-1.5 text-slate-500 hover:text-primary transition-colors"><span
                      class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
                  <button class="p-1.5 text-slate-500 hover:text-error transition-colors"><span
                      class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
                </div>
              </div>
              <h4 class="font-h3 text-base text-primary mb-1">Season 5 Grand Registration</h4>
              <p class="text-xs text-on-surface-variant truncate">Link: /registration/season-5</p>
            </div>
          </div>
          <!-- Slider Item 2 -->
          <div
            class="group relative rounded-xl border border-outline-variant overflow-hidden bg-white hover:shadow-md transition-all opacity-80">
            <img alt="Banner 2" class="w-full h-48 object-cover grayscale hover:grayscale-0 transition-all"
              data-alt="A dynamic action shot of a cricket batsman hitting a powerful shot, with dust rising from the pitch and a clear blue sky in the background. The lighting is bright and sunny, highlighting the motion and intensity of the sport. The aesthetic is clean and professional, using a natural color palette. This is a secondary banner for a media gallery showcasing peak performance in cricket."
              src="https://lh3.googleusercontent.com/aida-public/AB6AXuDOWOgL5xFcynNZE9MsPSp4WQC3MHXVevNkzjSfRZIv2auYih1R-K3ZPW4-YJEzgm1GrYfOghZX3gHGO-WyVf5TkbPerMD7f7EpOAsx71aLeZGNHFOi2656zDXV9FFCBtg98lkpLXiBx7ISHXt3Be9hFMlWRpbyMWfw1CsCiWbsbFn_r-ca1WngYj-Fl8Elpcs1O7rJJV-9CdHM8tcBQFRC4-1HjefpESxwtNRAUuxovfAFQhn5McFYQhpssUmjGRXEpyMnN0HlJL8d" />
            <div class="p-4">
              <div class="flex justify-between items-start mb-2">
                <span
                  class="bg-surface-container-highest text-on-surface-variant text-[10px] px-2 py-0.5 rounded font-bold uppercase">Scheduled</span>
                <div class="flex gap-2">
                  <button class="p-1.5 text-slate-500 hover:text-primary transition-colors"><span
                      class="material-symbols-outlined text-lg" data-icon="edit">edit</span></button>
                  <button class="p-1.5 text-slate-500 hover:text-error transition-colors"><span
                      class="material-symbols-outlined text-lg" data-icon="delete">delete</span></button>
                </div>
              </div>
              <h4 class="font-h3 text-base text-primary mb-1">Player Auctions Live</h4>
              <p class="text-xs text-on-surface-variant truncate">Link: /auctions/live</p>
            </div>
          </div>
          <!-- Add Placeholder -->
          <div
            class="border-2 border-dashed border-outline-variant rounded-xl flex flex-col items-center justify-center p-8 hover:bg-slate-50 transition-all cursor-pointer group">
            <div
              class="w-12 h-12 rounded-full bg-surface-container-high flex items-center justify-center group-hover:bg-secondary-container transition-all">
              <span class="material-symbols-outlined text-slate-500 group-hover:text-on-secondary-container"
                data-icon="add">add</span>
            </div>
            <span class="mt-3 font-label-md text-slate-500">Upload New Banner</span>
            <span class="text-[10px] text-slate-400 mt-1">Recommended: 1920x800px</span>
          </div>
        </div>
      </section>
      <!-- Media Gallery & Trial Manager Bento Layout -->
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter">
        <!-- Media Gallery (2/3 width) -->
        <section class="lg:col-span-2 bg-white rounded-xl border border-outline-variant p-6 shadow-sm">
          <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center">
                <span class="material-symbols-outlined text-primary" data-icon="photo_library">photo_library</span>
              </div>
              <h3 class="font-h3 text-h3 text-primary">Media Gallery</h3>
            </div>
            <div class="flex gap-2">
              <select
                class="bg-surface border-outline-variant rounded-lg font-label-sm text-xs px-3 py-1.5 focus:ring-secondary focus:border-secondary">
                <option>All Categories</option>
                <option>Season 1</option>
                <option>Trials</option>
                <option>Press Events</option>
              </select>
            </div>
          </div>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            <div class="relative aspect-square rounded-lg overflow-hidden group">
              <img alt="Gallery 1" class="w-full h-full object-cover transition-transform group-hover:scale-110"
                data-alt="A close-up shot of a leather cricket ball resting on a well-manicured green field, with the stadium seating visible in the soft-focus background. The morning sunlight creates long shadows and a crisp, clean aesthetic. The focus is sharp on the red ball's stitching, conveying the heritage and quality of the HCPL league."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZNw5kOMcURzibSUvnVhxGDmlfkDjB_-rjR2lFARSAfp43ywhQKZ2mLsGDFn62y211nhq_tGnU4DpZ9h1MSzaxGiPN51oMtJfaTrrm31ngwckR6YVTtqzNAhdOtdV5ntSTMfgw7nO3cWcMKq3sysW9Zus5NyeCEA-dKacQXdROfcdMZRFvjvqgJNwJRv1E4DBJwL5aH2C87BBNvA_Zl0jcdDSOYdtetTsnrwYqwQKkiYHE1YwAaOEykeDGUUjF1sCq4Je5TLXOWi92" />
              <div
                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-secondary-fixed"
                  data-icon="visibility">visibility</span>
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-error"
                  data-icon="delete">delete</span>
              </div>
            </div>
            <div class="relative aspect-square rounded-lg overflow-hidden group">
              <img alt="Gallery 2" class="w-full h-full object-cover transition-transform group-hover:scale-110"
                data-alt="A professional cricket bat leaning against a locker in a modern, dimly lit dressing room. The scene is lit with dramatic low-key lighting, emphasizing the textures of the wood and the clean, premium environment. This image represents the behind-the-scenes professionalism of the league and trial process."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCuDrQi12FCIy9Im2DtUFhzaArX3C5XjQr97lGmw_XiHOdY1rVjLilojP7QGj8XkSWrcq9j76fpIWxphZk3_1u-nqO_tXrp2xUbDBHC5VICFZBOQXP3hts4jJ2Dm0fz2Jp-f6K-krISfTM6X4D3t75JxotO2gmyvUvS1RyDAS6YlaJJSYzGxeP-bx_rKna0HkHy9xTtVIZ8WAeb9TQwCQQlyNX0a42UHe_6Hwd9RL5aUkM8XhqCuDbGoOqbienF8EcbWRpnX5Kka1R8" />
              <div
                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-secondary-fixed"
                  data-icon="visibility">visibility</span>
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-error"
                  data-icon="delete">delete</span>
              </div>
            </div>
            <div class="relative aspect-square rounded-lg overflow-hidden group">
              <img alt="Gallery 3" class="w-full h-full object-cover transition-transform group-hover:scale-110"
                data-alt="Action photography of a young cricket player in mid-bowl, showcasing intense concentration and athletic form. The lighting is bright day-time stadium light, with high contrast and sharp details. The colors are natural and vibrant, emphasizing the energy of the trials."
                src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMbCqjpqZZGNg5YbLAA284buyF7v1-mAI-mXhVH2m-VG7boVwBPFg2pD66x-wyVxpRQAI33cJ8seUP_Wfwb641o-uo0AYsAl8uZTSjC_VOBMuouwkuF38dPtp_diOgNU1Ph8nvwwo-QXrdQCARUZsMYLUUWzd3f92mwufaJWzWNzep2lhbYTq4DkrtbgSgoqHcH-_zXPdvU9ZjLsK_2UUJyJI5Ur2VE7YchGCgNx1toqpcV5QFtjML71nIvhAjd4oWTXwqZwMaG5my" />
              <div
                class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-secondary-fixed"
                  data-icon="visibility">visibility</span>
                <span class="material-symbols-outlined text-white cursor-pointer hover:text-error"
                  data-icon="delete">delete</span>
              </div>
            </div>
            <div
              class="border-2 border-dashed border-outline-variant rounded-lg flex flex-col items-center justify-center hover:bg-slate-50 transition-all cursor-pointer">
              <span class="material-symbols-outlined text-slate-400" data-icon="upload_file">upload_file</span>
              <span class="text-[10px] font-label-sm text-slate-500 mt-1">Upload</span>
            </div>
          </div>
          <div class="mt-6 pt-6 border-t border-outline-variant flex justify-between items-center">
            <span class="text-xs text-on-surface-variant font-body-sm">Showing 1-12 of 156 assets</span>
            <div class="flex gap-2">
              <button class="p-1 rounded border border-outline-variant hover:bg-slate-50"><span
                  class="material-symbols-outlined text-sm" data-icon="chevron_left">chevron_left</span></button>
              <button class="p-1 rounded border border-outline-variant hover:bg-slate-50"><span
                  class="material-symbols-outlined text-sm" data-icon="chevron_right">chevron_right</span></button>
            </div>
          </div>
        </section>
        <!-- Trial Manager (1/3 width) -->
        <section class="bg-white rounded-xl border border-outline-variant p-6 shadow-sm">
          <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
              <div class="w-10 h-10 bg-surface-container rounded flex items-center justify-center">
                <span class="material-symbols-outlined text-primary" data-icon="assignment_ind">assignment_ind</span>
              </div>
              <h3 class="font-h3 text-h3 text-primary">Trial Manager</h3>
            </div>
          </div>
          <div class="space-y-4">
            <div class="p-4 rounded-lg bg-surface border border-outline-variant relative group">
              <div class="flex justify-between items-start mb-2">
                <span class="text-xs font-bold text-secondary">JUN 15, 2024</span>
                <span
                  class="material-symbols-outlined text-slate-400 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity"
                  data-icon="more_vert">more_vert</span>
              </div>
              <h5 class="font-label-md text-primary">Mumbai Zonal Trials</h5>
              <div class="flex items-center gap-2 mt-2 text-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-sm" data-icon="location_on">location_on</span>
                <span>Wankhede Stadium, Gate 4</span>
              </div>
              <div class="flex items-center justify-between mt-3">
                <span class="text-xs font-bold text-slate-700">Fee: $45.00</span>
                <span
                  class="bg-green-100 text-green-800 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase">Open</span>
              </div>
            </div>
            <div class="p-4 rounded-lg bg-surface border border-outline-variant relative group">
              <div class="flex justify-between items-start mb-2">
                <span class="text-xs font-bold text-secondary">JUL 02, 2024</span>
                <span
                  class="material-symbols-outlined text-slate-400 cursor-pointer opacity-0 group-hover:opacity-100 transition-opacity"
                  data-icon="more_vert">more_vert</span>
              </div>
              <h5 class="font-label-md text-primary">Delhi Regional Trials</h5>
              <div class="flex items-center gap-2 mt-2 text-xs text-on-surface-variant">
                <span class="material-symbols-outlined text-sm" data-icon="location_on">location_on</span>
                <span>Arun Jaitley Stadium</span>
              </div>
              <div class="flex items-center justify-between mt-3">
                <span class="text-xs font-bold text-slate-700">Fee: $40.00</span>
                <span
                  class="bg-slate-200 text-slate-600 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase">Full</span>
              </div>
            </div>
            <button
              class="w-full border-2 border-dashed border-outline-variant rounded-lg py-4 text-slate-500 hover:bg-slate-50 transition-all font-label-md flex items-center justify-center gap-2 mt-2">
              <span class="material-symbols-outlined text-lg" data-icon="add">add</span> Schedule Trial
            </button>
          </div>
        </section>
      </div>
      <!-- Detailed Trial Data Table -->
      <section class="bg-white rounded-xl border border-outline-variant shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-outline-variant bg-slate-50/50 flex justify-between items-center">
          <h3 class="font-h3 text-lg text-primary">Recent Trial Applications</h3>
          <div class="flex gap-4">
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"
                data-icon="search">search</span>
              <input
                class="pl-10 pr-4 py-1.5 bg-white border-outline-variant rounded-lg text-sm focus:ring-secondary focus:border-secondary w-64"
                placeholder="Search applicants..." type="text" />
            </div>
            <button
              class="bg-white border border-outline-variant p-1.5 rounded-lg text-slate-500 hover:text-primary transition-all">
              <span class="material-symbols-outlined text-lg" data-icon="filter_list">filter_list</span>
            </button>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-500 font-label-sm text-[11px] uppercase tracking-wider">
              <tr>
                <th class="px-6 py-3 font-semibold">Applicant</th>
                <th class="px-6 py-3 font-semibold">Location</th>
                <th class="px-6 py-3 font-semibold">Status</th>
                <th class="px-6 py-3 font-semibold">Reg. Date</th>
                <th class="px-6 py-3 font-semibold">Action</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-outline-variant">
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div
                      class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-primary text-xs">
                      RK</div>
                    <div>
                      <p class="font-label-md text-primary text-sm">Rahul Kapoor</p>
                      <p class="text-[10px] text-slate-500">ID: #4492</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 font-data-tabular text-sm text-slate-700">Mumbai</td>
                <td class="px-6 py-4">
                  <span
                    class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-green-100 text-green-700 border border-green-200">Confirmed</span>
                </td>
                <td class="px-6 py-4 font-data-tabular text-sm text-slate-500">12 May, 2024</td>
                <td class="px-6 py-4">
                  <button class="text-secondary font-label-sm text-xs hover:underline transition-all">View
                    Details</button>
                </td>
              </tr>
              <tr class="hover:bg-slate-50 transition-colors">
                <td class="px-6 py-4">
                  <div class="flex items-center gap-3">
                    <div
                      class="w-8 h-8 rounded-full bg-surface-container-high flex items-center justify-center font-bold text-primary text-xs">
                      AS</div>
                    <div>
                      <p class="font-label-md text-primary text-sm">Arjun Singh</p>
                      <p class="text-[10px] text-slate-500">ID: #4495</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 font-data-tabular text-sm text-slate-700">Delhi</td>
                <td class="px-6 py-4">
                  <span
                    class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase bg-amber-100 text-amber-700 border border-amber-200">Pending</span>
                </td>
                <td class="px-6 py-4 font-data-tabular text-sm text-slate-500">14 May, 2024</td>
                <td class="px-6 py-4">
                  <button class="text-secondary font-label-sm text-xs hover:underline transition-all">View
                    Details</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </section>
    </div>
  </main>

@endsection
