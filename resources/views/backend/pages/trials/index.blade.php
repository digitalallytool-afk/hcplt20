@extends('backend.layouts.main')

@section('title', 'Trial Management Hub')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Upcoming Trials Hub</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage zones, venues, and status</p>
            </div>
            <button onclick="openDrawer()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">add_location_alt</span>
                Add New Trial
            </button>
        </div>

        <!-- Trials Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6 sm:gap-8">
            @forelse($trials as $trial)
            <div class="group bg-white border border-slate-200 rounded-[2.5rem] p-6 sm:p-8 transition-all duration-500 hover:shadow-2xl hover:shadow-slate-200 hover:-translate-y-2 relative overflow-hidden">
                <!-- Status Strip -->
                <div class="absolute top-0 left-0 w-full h-1.5 {{ $trial->is_active ? 'bg-green-500' : 'bg-slate-200' }}"></div>

                <div class="flex items-center justify-between mb-6">
                    <span class="px-3 py-1 bg-amber-50 text-amber-600 rounded-lg text-[9px] font-black uppercase tracking-widest border border-amber-100">{{ $trial->zone_name }}</span>
                    <button onclick="toggleStatus({{ $trial->id }})" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors {{ $trial->is_active ? 'bg-green-50 text-green-600' : 'bg-slate-50 text-slate-300' }}">
                        <span class="material-symbols-outlined text-sm">{{ $trial->is_active ? 'visibility' : 'visibility_off' }}</span>
                    </button>
                </div>

                <h3 class="text-lg font-black text-slate-900 mb-4 leading-tight uppercase tracking-tight">{{ $trial->title }}</h3>

                <div class="space-y-4 mb-8">
                    <div class="flex items-center gap-3 text-slate-500">
                        <span class="material-symbols-outlined text-lg text-slate-300">location_on</span>
                        <span class="text-[11px] font-black uppercase tracking-tight">{{ $trial->venue ?? 'Venue TBA' }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-slate-500">
                        <span class="material-symbols-outlined text-lg text-slate-300">calendar_today</span>
                        <span class="text-[11px] font-black uppercase tracking-tight">{{ $trial->date_text ?? 'Date TBA' }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-slate-500">
                        <span class="material-symbols-outlined text-lg text-slate-300">payments</span>
                        <span class="text-[11px] font-black text-green-600 uppercase tracking-tight">{{ $trial->fee ?? 'Free Registration' }}</span>
                    </div>
                </div>

                <div class="flex items-center gap-2 pt-6 border-t border-slate-50">
                    <button onclick="editTrial({{ $trial->id }})" class="flex-1 bg-slate-900 text-white py-3 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                        Edit Details
                    </button>
                    <button onclick="deleteTrial({{ $trial->id }})" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 bg-white border-2 border-dashed border-slate-100 rounded-[2.5rem] text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-4 opacity-50">event_busy</span>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest italic opacity-50">No trials scheduled yet</p>
            </div>
            @endforelse
        </div>

        @if($trials->hasPages())
        <div class="mt-12">
            {{ $trials->links() }}
        </div>
        @endif
    </div>

    <!-- Slide-over Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-slate-900/60 z-[999] hidden opacity-0 transition-opacity duration-300" onclick="closeDrawer()"></div>
    <div id="drawer" class="fixed top-0 right-0 h-full w-full max-w-xl bg-white z-[1000] translate-x-full transition-transform duration-500 shadow-2xl overflow-y-auto scrollbar-hide">
        <div class="p-8 sm:p-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 id="drawerTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">Schedule Trial</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest opacity-60">Set zone-wise trial details for registration</p>
                </div>
                <button onclick="closeDrawer()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="trialForm" class="space-y-8">
                @csrf
                <input type="hidden" id="trial_id" name="trial_id">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Zone Name</label>
                        <input type="text" name="zone_name" id="zone_name" placeholder="e.g. Zone A" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Status Text</label>
                        <input type="text" name="status" id="status" placeholder="e.g. Open / Filling Fast" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Trial Title</label>
                    <input type="text" name="title" id="title" placeholder="e.g. Season 1 Phase 1 Trials" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Venue Details</label>
                    <input type="text" name="venue" id="venue" placeholder="e.g. Haryana Sports Complex" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Trial Date(s)</label>
                        <input type="text" name="date_text" id="date_text" placeholder="e.g. 15-20 June" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Reg. Fee</label>
                        <input type="text" name="fee" id="fee" placeholder="e.g. ₹2999" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Registration Link (External)</label>
                    <input type="url" name="registration_link" id="registration_link" placeholder="https://..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="pt-6">
                    <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        Save Trial Schedule
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openDrawer() {
        $('#drawerOverlay').removeClass('hidden').animate({opacity: 1}, 300);
        $('#drawer').removeClass('translate-x-full');
        $('#drawerTitle').text('Schedule Trial');
        $('#trialForm')[0].reset();
        $('#trial_id').val('');
    }

    function closeDrawer() {
        $('#drawerOverlay').animate({opacity: 0}, 300, function() { $(this).addClass('hidden'); });
        $('#drawer').addClass('translate-x-full');
    }

    $('#trialForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#trial_id').val();
        const url = id ? `/trials/${id}/update` : '/trials';
        
        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin">sync</span> Saving...');

        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            success: function() { location.reload(); },
            error: function() {
                alert('Validation error. Please check your inputs.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">verified</span> Save Trial Schedule');
            }
        });
    });

    function editTrial(id) {
        $.get(`/trials/${id}/edit`, function(data) {
            openDrawer();
            $('#trial_id').val(data.id);
            $('#zone_name').val(data.zone_name);
            $('#title').val(data.title);
            $('#venue').val(data.venue);
            $('#date_text').val(data.date_text);
            $('#fee').val(data.fee);
            $('#status').val(data.status);
            $('#registration_link').val(data.registration_link);
            $('#drawerTitle').text('Edit Trial Schedule');
        });
    }

    function deleteTrial(id) {
        if(confirm('Are you sure you want to delete this trial?')) {
            $.ajax({
                url: `/trials/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/trials/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
