<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "on-tertiary": "#ffffff",
                        "inverse-on-surface": "#eaf1ff",
                        "on-primary-fixed": "#191b24",
                        "secondary-fixed": "#ffdf9d",
                        "background": "#f8f9ff",
                        "primary-fixed-dim": "#c5c6d1",
                        "surface-container-lowest": "#ffffff",
                        "secondary-fixed-dim": "#f4bf3b",
                        "surface-dim": "#cbdbf5",
                        "outline": "#77767c",
                        "on-error-container": "#93000a",
                        "on-primary": "#ffffff",
                        "surface-container-low": "#eff4ff",
                        "on-primary-fixed-variant": "#454650",
                        "surface-variant": "#d3e4fe",
                        "primary-container": "#191b24",
                        "on-secondary": "#ffffff",
                        "on-background": "#0b1c30",
                        "surface-container": "#e5eeff",
                        "surface": "#f8f9ff",
                        "tertiary-container": "#3f0205",
                        "on-tertiary-container": "#c76862",
                        "tertiary": "#000000",
                        "surface-tint": "#5c5e68",
                        "primary": "#000000",
                        "error-container": "#ffdad6",
                        "outline-variant": "#c7c6cc",
                        "on-surface": "#0b1c30",
                        "on-secondary-fixed": "#251a00",
                        "surface-container-highest": "#d3e4fe",
                        "inverse-primary": "#c5c6d1",
                        "surface-bright": "#f8f9ff",
                        "on-secondary-fixed-variant": "#5b4300",
                        "tertiary-fixed-dim": "#ffb3ad",
                        "primary-fixed": "#e2e1ed",
                        "on-surface-variant": "#46464b",
                        "on-error": "#ffffff",
                        "inverse-surface": "#213145",
                        "tertiary-fixed": "#ffdad6",
                        "on-tertiary-fixed-variant": "#7a2d2a",
                        "on-tertiary-fixed": "#3f0205",
                        "on-primary-container": "#82838e",
                        "on-secondary-container": "#705300",
                        "secondary-container": "#fdc743",
                        "secondary": "#785a00",
                        "surface-container-high": "#dce9ff",
                        "error": "#ba1a1a"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "stack-md": "1rem",
                        "container-padding": "2rem",
                        "gutter": "1.5rem",
                        "stack-lg": "1.5rem",
                        "stack-sm": "0.5rem",
                        "sidebar-width": "260px"
                    },
                    "fontFamily": {
                        "data-tabular": ["Inter"],
                        "body-md": ["Inter"],
                        "body-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "h1": ["Inter"],
                        "h2": ["Inter"],
                        "body-sm": ["Inter"],
                        "h3": ["Inter"],
                        "display": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "data-tabular": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "body-md": ["16px", {"lineHeight": "24px", "fontWeight": "400"}],
                        "body-lg": ["18px", {"lineHeight": "28px", "fontWeight": "400"}],
                        "label-sm": ["12px", {"lineHeight": "16px", "fontWeight": "500"}],
                        "h1": ["30px", {"lineHeight": "38px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "h2": ["24px", {"lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "600"}],
                        "body-sm": ["14px", {"lineHeight": "20px", "fontWeight": "400"}],
                        "h3": ["20px", {"lineHeight": "28px", "fontWeight": "600"}],
                        "display": ["36px", {"lineHeight": "44px", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                        "label-md": ["14px", {"lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600"}]
                    }
                },
            },
        }
    </script>
<style>.material-symbols-outlined {
    font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
    display: inline-block;
    line-height: 1;
    text-transform: none;
    letter-spacing: normal;
    word-wrap: normal;
    white-space: nowrap;
    direction: ltr
    }
.stadium-bg {
    background-image: linear-gradient(rgba(15, 17, 25, 0.85), rgba(15, 17, 25, 0.95)), url(https://lh3.googleusercontent.com/aida-public/AB6AXuBDDaYSZqZGLPuLvJlZpQBOvNpiQDFFdMmIhDkr6JtdVfwrEFcMH63ooDT8ql3KV-r5uPHS4t62VQWN_-B-03JTIwvUGHpm-UlWP7dmf6lgRZxm3QIIZevK-S2JwmTjCUbsZwCJ4HKqHq96MhgYZYlYIL1n0f26fnr0OUWhFjs4f2Voo707VMnpY_IJdX6i67oEIE1r4PWHimYxfYtU8f3JGifsd2650sPfY1U6Z59dAWGchB344fUId1bkQ5fmYxXsqsl1Un7FbDMy);
    background-size: cover;
    background-position: center
    }</style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background text-on-background font-body-md antialiased min-h-screen flex items-center justify-center stadium-bg" data-alt="A wide cinematic shot of a modern cricket stadium at dusk, viewed through a dark indigo and slate blue translucent overlay. The stadium floodlights create a soft, ethereal glow and long shadows across the pristine green pitch. The atmosphere is professional and prestigious, using a color palette of deep navy, charcoal, and subtle metallic gold highlights to evoke a sense of high-stakes sports management.">
<div class="w-full max-w-md px-6 py-12">
<div class="bg-white rounded-lg shadow-2xl border border-outline-variant overflow-hidden flex flex-col">
<div class="p-8 pb-4 text-center">
<div class="mb-6 inline-flex items-center justify-center">
<div class="w-12 h-12 bg-primary-container rounded flex items-center justify-center">
<span class="material-symbols-outlined text-secondary-container text-3xl" data-icon="sports_cricket">sports_cricket</span>
</div>
</div>
<h1 class="font-display text-display text-on-background tracking-tighter mb-2">HCPL Admin</h1>
<p class="font-body-sm text-body-sm text-on-surface-variant">League Management Console Login</p>
</div>
<div class="px-8 pb-10">
<form class="space-y-6">
<div class="space-y-2">
<label class="font-label-md text-label-md text-on-surface uppercase tracking-widest" for="email">Email or Username</label>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline text-xl group-focus-within:text-secondary" data-icon="person">person</span>
</div>
<input class="block w-full pl-10 pr-3 py-2.5 border border-outline-variant rounded bg-surface focus:ring-1 focus:ring-secondary focus:border-secondary text-on-background font-body-sm transition-all outline-none" id="email" name="email" placeholder="admin@hcpl.com" required="" type="text"/>
</div>
</div>
<div class="space-y-2">
<div class="flex items-center justify-between">
<label class="font-label-md text-label-md text-on-surface uppercase tracking-widest" for="password">Password</label>
<a class="font-label-sm text-label-sm text-secondary hover:underline" href="#">Forgot Password?</a>
</div>
<div class="relative group">
<div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
<span class="material-symbols-outlined text-outline text-xl group-focus-within:text-secondary" data-icon="lock">lock</span>
</div>
<input class="block w-full pl-10 pr-3 py-2.5 border border-outline-variant rounded bg-surface focus:ring-1 focus:ring-secondary focus:border-secondary text-on-background font-body-sm transition-all outline-none" id="password" name="password" placeholder="••••••••" required="" type="password"/>
</div>
</div>
<div class="flex items-center">
<input class="h-4 w-4 text-secondary focus:ring-secondary border-outline-variant rounded cursor-pointer" id="remember" name="remember" type="checkbox"/>
<label class="ml-2 block font-body-sm text-body-sm text-on-surface-variant cursor-pointer" for="remember">
                            Keep me logged in for 30 days
                        </label>
</div>
<button class="w-full bg-primary-container hover:bg-black text-white font-label-md text-label-md py-3 rounded shadow-sm hover:shadow-md transition-all active:scale-[0.98] uppercase tracking-widest border border-transparent flex items-center justify-center gap-2" type="submit">
                        Login to Dashboard
                        <span class="material-symbols-outlined text-xl" data-icon="arrow_forward">arrow_forward</span>
</button>
</form>
<div class="mt-8 pt-6 border-t border-outline-variant text-center">
<p class="font-body-sm text-body-sm text-on-surface-variant">
                        Trouble accessing your account? <br/>
<a class="text-secondary font-medium hover:underline" href="#">Contact System Administrator</a>
</p>
</div>
</div>
</div>
<div class="mt-8 text-center">
<p class="text-on-primary-container font-label-sm text-label-sm opacity-60">
                © 2024 HCPL League Operations. All Rights Reserved.
            </p>
</div>
</div>
</body></html>