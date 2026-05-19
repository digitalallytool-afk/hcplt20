<!DOCTYPE html>
<html class="light" lang="en">
<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>HCPL Admin - League Management Hub</title>
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />

  <script id="tailwind-config">
    tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            "colors": {
                    "surface": "#f8f9ff",
                    "on-tertiary": "#ffffff",
                    "on-surface-variant": "#46464b",
                    "on-secondary": "#ffffff",
                    "inverse-surface": "#213145",
                    "surface-container-high": "#dce9ff",
                    "on-secondary-container": "#705300",
                    "on-tertiary-fixed": "#3f0205",
                    "on-tertiary-fixed-variant": "#7a2d2a",
                    "on-error": "#ffffff",
                    "surface-tint": "#5c5e68",
                    "on-surface": "#0b1c30",
                    "outline-variant": "#c7c6cc",
                    "outline": "#77767c",
                    "surface-dim": "#cbdbf5",
                    "secondary-container": "#fdc743",
                    "on-primary-fixed-variant": "#454650",
                    "error-container": "#ffdad6",
                    "inverse-primary": "#c5c6d1",
                    "secondary-fixed": "#ffdf9d",
                    "primary-fixed-dim": "#c5c6d1",
                    "on-primary-fixed": "#191b24",
                    "surface-container-low": "#eff4ff",
                    "error": "#ba1a1a",
                    "on-error-container": "#93000a",
                    "primary-container": "#191b24",
                    "primary": "#000000",
                    "tertiary": "#000000",
                    "surface-container-highest": "#d3e4fe",
                    "secondary-fixed-dim": "#f4bf3b",
                    "on-primary-container": "#82838e",
                    "inverse-on-surface": "#eaf1ff",
                    "surface-container-lowest": "#ffffff",
                    "surface-variant": "#d3e4fe",
                    "background": "#f8f9ff",
                    "on-primary": "#ffffff",
                    "on-background": "#0b1c30",
                    "tertiary-fixed": "#ffdad6",
                    "secondary": "#785a00",
                    "surface-container": "#e5eeff",
                    "primary-fixed": "#e2e1ed",
                    "on-tertiary-container": "#c76862",
                    "on-secondary-fixed": "#251a00",
                    "tertiary-container": "#3f0205",
                    "surface-bright": "#f8f9ff",
                    "tertiary-fixed-dim": "#ffb3ad",
                    "on-secondary-fixed-variant": "#5b4300"
            },
            "borderRadius": {
                    "DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "0.75rem"
            },
            "spacing": {
                    "sidebar-width": "260px", "gutter": "1.5rem", "stack-lg": "1.5rem", "stack-md": "1rem", "stack-sm": "0.5rem", "container-padding": "2rem"
            },
            "fontFamily": {
                    "h1": ["Inter"], "h2": ["Inter"], "label-md": ["Inter"], "display": ["Inter"],
                    "body-lg": ["Inter"], "h3": ["Inter"], "data-tabular": ["Inter"],
                    "label-sm": ["Inter"], "body-sm": ["Inter"], "body-md": ["Inter"]
            },
            "fontSize": {
                    "h1": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "h2": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                    "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}],
                    "display": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                    "h3": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                    "data-tabular": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                    "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                    "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}]
            }
          },
        },
      }
  </script>
  <style>
    .sidebar-scroll::-webkit-scrollbar { width: 4px; }
    .sidebar-scroll::-webkit-scrollbar-track { background: transparent; }
    .sidebar-scroll::-webkit-scrollbar-thumb { background: #334155; border-radius: 10px; }
    
    @media (max-width: 1024px) {
        .sidebar-active #sidebar { transform: translateX(0); }
        .sidebar-active #sidebar-overlay { display: block; }
        main { margin-left: 0 !important; }
        header { width: 100% !important; }
    }
  </style>
</head>

<body class="bg-surface text-on-surface font-inter overflow-x-hidden">
  
  <!-- Sidebar Overlay (Mobile) -->
  <div id="sidebar-overlay" class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

  <!-- Navigation Drawer -->
  <aside id="sidebar"
    class="bg-slate-950 w-[260px] h-full fixed left-0 top-0 z-50 border-r border-slate-800 shadow-2xl flex flex-col transition-transform duration-300 -translate-x-full lg:translate-x-0">
    
    <div class="p-6 flex items-center justify-between">
      <h1 class="text-2xl font-black tracking-tighter text-white">HCPL Admin</h1>
      <button onclick="toggleSidebar()" class="lg:hidden text-slate-400 hover:text-white">
        <span class="material-symbols-outlined">close</span>
      </button>
    </div>

    <!-- Scrollable Menu -->
    <nav class="flex-1 px-3 space-y-1 overflow-y-auto sidebar-scroll pb-10">
      
      <a class="flex items-center px-3 py-3 rounded-xl transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('dashboard') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('dashboard') ? 'text-amber-400' : '' }}">dashboard</span>
        <span class="text-sm font-medium tracking-tight">Dashboard</span>
      </a>

      <div class="px-4 py-2 mt-4 text-[10px] font-black uppercase tracking-widest text-slate-500">League Central</div>
      
      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('teams.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('teams.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('teams.index') ? 'text-amber-400' : '' }}">shield</span>
        <span class="text-sm font-medium tracking-tight">Our Teams</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('team-members.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('team-members.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('team-members.index') ? 'text-amber-400' : '' }}">sports_cricket</span>
        <span class="text-sm font-medium tracking-tight">Team Squad</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('owner-leads.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('owner-leads.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('owner-leads.index') ? 'text-amber-400' : '' }}">person_add</span>
        <span class="text-sm font-medium tracking-tight">Owner Leads</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('sponsor-leads.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('sponsor-leads.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('sponsor-leads.index') ? 'text-amber-400' : '' }}">handshake</span>
        <span class="text-sm font-medium tracking-tight">Sponsor Leads</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('contacts.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('contacts.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('contacts.index') ? 'text-amber-400' : '' }}">mail</span>
        <span class="text-sm font-medium tracking-tight">Enquiries</span>
      </a>

      <div class="px-4 py-2 mt-4 text-[10px] font-black uppercase tracking-widest text-slate-500">Match Operations</div>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('matches.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('matches.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('matches.index') ? 'text-amber-400' : '' }}">sports_cricket</span>
        <span class="text-sm font-medium tracking-tight">Match Schedule</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('trials.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('trials.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('trials.index') ? 'text-amber-400' : '' }}">assignment_ind</span>
        <span class="text-sm font-medium tracking-tight">Trial Management</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('management.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('management.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('management.index') ? 'text-amber-400' : '' }}">groups</span>
        <span class="text-sm font-medium tracking-tight">Management Team</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('ambassadors.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('ambassadors.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('ambassadors.index') ? 'text-amber-400' : '' }}">face</span>
        <span class="text-sm font-medium tracking-tight">Ambassadors</span>
      </a>

      <div class="px-4 py-2 mt-4 text-[10px] font-black uppercase tracking-widest text-slate-500">Media & Content</div>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('media.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('media.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('media.index') ? 'text-amber-400' : '' }}">photo_library</span>
        <span class="text-sm font-medium tracking-tight">Media Gallery</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('news.categories.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('news.categories.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('news.categories.index') ? 'text-amber-400' : '' }}">category</span>
        <span class="text-sm font-medium tracking-tight">News Categories</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('news.articles.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('news.articles.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('news.articles.index') ? 'text-amber-400' : '' }}">newspaper</span>
        <span class="text-sm font-medium tracking-tight">News Articles</span>
      </a>

      <div class="px-4 py-2 mt-4 text-[10px] font-black uppercase tracking-widest text-slate-500">Settings</div>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('settings.web') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('settings.web') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('settings.web') ? 'text-amber-400' : '' }}">settings</span>
        <span class="text-sm font-medium tracking-tight">Web Settings</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('settings.sliders') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('settings.sliders') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('settings.sliders') ? 'text-amber-400' : '' }}">gallery_thumbnail</span>
        <span class="text-sm font-medium tracking-tight">Home Sliders</span>
      </a>

      <a class="flex items-center px-3 py-3 rounded-xl transition-all {{ request()->routeIs('registration-sliders.index') ? 'bg-slate-900 text-white border-l-4 border-amber-400 font-bold' : 'text-slate-400 hover:text-slate-100 hover:bg-slate-900/50' }}"
        href="{{ route('registration-sliders.index') }}">
        <span class="material-symbols-outlined mr-3 {{ request()->routeIs('registration-sliders.index') ? 'text-amber-400' : '' }}">collections_bookmark</span>
        <span class="text-sm font-medium tracking-tight">Reg. Sliders</span>
      </a>

    </nav>

    <!-- Sidebar Footer (Logout) -->
    <div class="p-4 border-t border-slate-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-3 text-red-400 hover:bg-red-500/10 rounded-xl transition-all group">
                <span class="material-symbols-outlined mr-3 group-hover:rotate-12 transition-transform">logout</span>
                <span class="text-sm font-black uppercase tracking-widest">Logout</span>
            </button>
        </form>
    </div>
  </aside>

  <!-- Top Bar -->
  <header
    class="fixed top-0 right-0 w-full lg:w-[calc(100%-260px)] h-16 z-30 bg-white border-b border-slate-200 flex items-center justify-between px-4 lg:px-8 shadow-sm">
    <div class="flex items-center gap-4">
      <button onclick="toggleSidebar()" class="lg:hidden p-2 text-slate-900 hover:bg-slate-50 rounded-full transition-colors">
        <span class="material-symbols-outlined">menu</span>
      </button>
      <h2 class="font-black text-sm lg:text-lg text-slate-900 tracking-tight uppercase lg:normal-case">HCPL Command Hub</h2>
    </div>

    <div class="flex items-center gap-4">
        <div class="hidden sm:flex items-center gap-3 pr-4 border-r border-slate-100">
            <div class="text-right">
                <p class="text-[10px] font-black text-slate-900 uppercase tracking-tighter">{{ Auth::user()->name }}</p>
                <p class="text-[8px] font-black text-slate-400 uppercase tracking-widest">Administrator</p>
            </div>
            <div class="w-10 h-10 rounded-xl bg-amber-400 flex items-center justify-center font-black text-slate-900">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        </div>
        
        <!-- Mobile Logout Shortcut -->
        <form method="POST" action="{{ route('logout') }}" class="sm:hidden">
            @csrf
            <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-full">
                <span class="material-symbols-outlined">logout</span>
            </button>
        </form>
    </div>
  </header>

  <script>
    function toggleSidebar() {
        document.body.classList.toggle('sidebar-active');
    }
  </script>