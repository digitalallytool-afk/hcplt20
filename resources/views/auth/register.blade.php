<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HCPL | Admin Registration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(20px); }
        .bg-pattern { background-image: radial-gradient(#1e293b 0.5px, transparent 0.5px); background-size: 24px 24px; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-6 bg-pattern">
    <div class="w-full max-w-[1100px] grid grid-cols-1 lg:grid-cols-2 bg-white rounded-[3rem] shadow-2xl overflow-hidden min-h-[700px]">
        
        <!-- Branding Side (Left) -->
        <div class="hidden lg:flex flex-col justify-between p-16 bg-slate-900 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-[-10%] left-[-10%] w-full h-full border-[1px] border-amber-400 rounded-full"></div>
                <div class="absolute bottom-[-20%] right-[-20%] w-full h-full border-[1px] border-amber-400 rounded-full"></div>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-12">
                    <div class="w-12 h-12 bg-amber-400 rounded-xl flex items-center justify-center">
                        <span class="material-symbols-outlined text-slate-900 font-bold">shield</span>
                    </div>
                    <span class="text-white font-black text-2xl tracking-tighter uppercase">HCPL<span class="text-amber-400">T20</span></span>
                </div>
                
                <h1 class="text-white text-5xl font-black leading-tight mb-6">
                    Join the <br>
                    <span class="text-amber-400">Command Center</span>
                </h1>
                <p class="text-slate-400 text-lg leading-relaxed max-w-sm">
                    Establish your administrative credentials and start managing the future of cricket.
                </p>
            </div>

            <div class="relative z-10 flex items-center gap-4">
                <div class="flex -space-x-4">
                    <div class="w-10 h-10 rounded-full border-2 border-slate-900 bg-slate-800"></div>
                    <div class="w-10 h-10 rounded-full border-2 border-slate-900 bg-slate-700"></div>
                    <div class="w-10 h-10 rounded-full border-2 border-slate-900 bg-slate-600"></div>
                </div>
                <p class="text-slate-400 text-xs font-bold uppercase tracking-widest">Elite Access Enrollment</p>
            </div>
        </div>

        <!-- Registration Side (Right) -->
        <div class="p-12 sm:p-20 flex flex-col justify-center">
            <div class="mb-10">
                <h2 class="text-3xl font-black text-slate-900 mb-2">Create Account</h2>
                <p class="text-slate-500 font-medium">Set up your elite administrative profile.</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Full Name -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-2">Official Name</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-amber-500 transition-colors">person</span>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="John Doe" 
                            class="w-full bg-slate-50 border border-slate-100 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-slate-900 outline-none focus:border-amber-400 focus:bg-white transition-all">
                    </div>
                    @error('name')
                        <p class="text-red-500 text-[10px] font-black uppercase mt-2 ml-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-2">Identity Email</label>
                    <div class="relative group">
                        <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-amber-500 transition-colors">mail</span>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="admin@hcplt20.com" 
                            class="w-full bg-slate-50 border border-slate-100 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-slate-900 outline-none focus:border-amber-400 focus:bg-white transition-all">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-[10px] font-black uppercase mt-2 ml-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Row -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-2">Passkey</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-amber-500 transition-colors">lock</span>
                            <input type="password" name="password" required placeholder="••••••••" 
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-slate-900 outline-none focus:border-amber-400 focus:bg-white transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 ml-2">Confirm</label>
                        <div class="relative group">
                            <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 group-focus-within:text-amber-500 transition-colors">lock_reset</span>
                            <input type="password" name="password_confirmation" required placeholder="••••••••" 
                                class="w-full bg-slate-50 border border-slate-100 rounded-2xl pl-14 pr-6 py-4 text-sm font-bold text-slate-900 outline-none focus:border-amber-400 focus:bg-white transition-all">
                        </div>
                    </div>
                </div>
                @error('password')
                    <p class="text-red-500 text-[10px] font-black uppercase ml-2">{{ $message }}</p>
                @enderror

                <!-- Actions -->
                <div class="pt-6 flex flex-col gap-6">
                    <button type="submit" class="w-full bg-slate-900 text-white py-5 rounded-3xl font-black text-sm uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all active:scale-95 flex items-center justify-center gap-3">
                        Initialize Account
                        <span class="material-symbols-outlined">person_add</span>
                    </button>

                    <p class="text-center text-xs font-bold text-slate-400 uppercase tracking-widest">
                        Already Registered? <a href="{{ route('login') }}" class="text-slate-900 hover:text-amber-500 transition-colors underline underline-offset-4">Log in here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
