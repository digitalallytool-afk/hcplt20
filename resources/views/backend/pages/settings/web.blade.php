@extends('backend.layouts.main')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="mb-8">
            <nav class="flex items-center gap-2 text-slate-400 font-bold text-[10px] uppercase tracking-widest mb-2">
                <span>Settings</span>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-amber-500">Web Settings</span>
            </nav>
            <h1 class="text-2xl font-black text-slate-900 uppercase tracking-tight">Global Configurations</h1>
            <p class="text-slate-500 text-[10px] font-black uppercase tracking-widest opacity-60 mt-1">Manage brand identity, contact info and social ecosystems</p>
        </div>

        <div id="alertContainer" class="mb-6"></div>

        <div class="bg-white border border-slate-200 rounded-[2.5rem] shadow-sm overflow-hidden">
            <form id="webSettingsForm" action="{{ route('settings.web.update') }}" method="POST" enctype="multipart/form-data" class="p-6 sm:p-10">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                    <!-- Site Name -->
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Site Name</label>
                        <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $setting->site_name ?? '') }}" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        @error('site_name')<span class="text-red-500 text-[9px] font-black uppercase mt-1 block tracking-tight">{{ $message }}</span>@enderror
                    </div>

                    <!-- Logo Upload -->
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Site Identity (Logo)</label>
                        <div class="flex items-center gap-4 border border-slate-200 rounded-2xl p-2 px-4 bg-slate-50/50">
                            @if(isset($setting) && $setting->logo)
                                <img id="logoPreview" src="{{ asset($setting->logo) }}" alt="Logo" class="h-10 w-auto object-contain bg-white rounded-lg p-1 border border-slate-100 shadow-sm">
                            @endif
                            <input type="file" name="logo" id="logo" class="w-full text-[10px] font-black uppercase tracking-widest text-slate-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-slate-900 file:text-white hover:file:bg-amber-400 hover:file:text-slate-900 transition-all cursor-pointer">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Contact Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $setting->email ?? '') }}" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>

                    <!-- Phone -->
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Support Hotline</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $setting->phone ?? '') }}" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>

                    <!-- Address -->
                    <div class="md:col-span-2 relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Physical Address</label>
                        <textarea name="address" id="address" rows="2" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all resize-none">{{ old('address', $setting->address ?? '') }}</textarea>
                    </div>

                    <!-- About Us Summary -->
                    <div class="md:col-span-2 relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Brand Narrative (About Us)</label>
                        <textarea name="about_us_summary" id="about_us_summary" rows="4" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-medium text-slate-700 focus:border-amber-400 outline-none transition-all resize-none leading-relaxed">{{ old('about_us_summary', $setting->about_us_summary ?? '') }}</textarea>
                    </div>
                </div>

                <div class="border-t border-slate-50 pt-12">
                    <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-10 flex items-center gap-3">
                        <span class="w-2 h-6 bg-amber-400 rounded-full"></span>
                        Social Ecosystem Links
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
                        <div class="relative group">
                            <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Facebook Profile</label>
                            <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $setting->facebook_url ?? '') }}" placeholder="https://..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>

                        <div class="relative group">
                            <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Instagram Feed</label>
                            <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $setting->instagram_url ?? '') }}" placeholder="https://..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>

                        <div class="relative group">
                            <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">YouTube Channel</label>
                            <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $setting->youtube_url ?? '') }}" placeholder="https://..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>

                        <div class="relative group">
                            <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Twitter / X Stream</label>
                            <input type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $setting->twitter_url ?? '') }}" placeholder="https://..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-8 border-t border-slate-50">
                    <button id="submitBtn" type="submit" class="w-full sm:w-auto bg-slate-900 text-white px-12 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95 flex items-center justify-center gap-3">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        Save Global Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
// Simple AJAX Form Submit
document.getElementById('webSettingsForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Stop page reload
    
    let form = this;
    let submitBtn = document.getElementById('submitBtn');
    let originalText = submitBtn.innerHTML;
    let alertContainer = document.getElementById('alertContainer');
    
    // Clear old messages
    alertContainer.innerHTML = '';
    document.querySelectorAll('.error-text').forEach(el => el.remove());
    
    // Show loading
    submitBtn.innerHTML = 'Saving...';
    submitBtn.disabled = true;

    // Send AJAX request
    fetch(form.action, {
        method: 'POST',
        headers: { 'X-Requested-With': 'XMLHttpRequest', 'Accept': 'application/json' },
        body: new FormData(form)
    })
    .then(response => response.json().then(data => ({ status: response.status, body: data })))
    .then(result => {
        let status = result.status;
        let data = result.body;

        if (status === 200) {
            // Success Message
            alertContainer.innerHTML = '<div class="bg-green-100 text-green-700 p-3 rounded mb-4">' + data.message + '</div>';
            
            // Update Logo Image if new logo uploaded
            if (data.logo_url && document.getElementById('logoPreview')) {
                document.getElementById('logoPreview').src = data.logo_url;
            }
        } 
        else if (status === 422) {
            // Validation Errors
            for (let field in data.errors) {
                let input = document.getElementById(field);
                if (input) {
                    input.insertAdjacentHTML('afterend', '<span class="text-red-500 text-sm mt-1 block error-text">' + data.errors[field][0] + '</span>');
                }
            }
        } 
        else {
            // Server Error
            alertContainer.innerHTML = '<div class="bg-red-100 text-red-700 p-3 rounded mb-4">Something went wrong!</div>';
        }
    })
    .catch(error => {
        console.error(error);
        alertContainer.innerHTML = '<div class="bg-red-100 text-red-700 p-3 rounded mb-4">Network error!</div>';
    })
    .finally(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    });
});
</script>
@endsection
