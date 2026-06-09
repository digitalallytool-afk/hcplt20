@extends('backend.layouts.main')

@section('title', 'Franchise Management')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Franchise Hub</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage HCPL Teams & Owners</p>
            </div>
            <button onclick="openForm()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">add_business</span>
                Register Franchise
            </button>
        </div>

        <!-- In-line Form Section -->
        <div id="formSection" class="hidden mb-12 animate-in fade-in zoom-in duration-300">
            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-slate-200 relative overflow-hidden">
                <div class="absolute top-4 right-4 sm:top-8 sm:right-8">
                    <button onclick="closeForm()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <form id="teamForm" class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10">
                    @csrf
                    <input type="hidden" id="team_id" name="team_id">
                    
                    <div class="lg:col-span-3">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Team Shield / Logo</label>
                        <div class="group relative w-full aspect-square bg-slate-50 rounded-[2rem] overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center gap-2" onclick="document.getElementById('logoInput').click()">
                            <img id="previewLogo" class="absolute inset-0 w-full h-full object-contain p-4 hidden">
                            <span class="material-symbols-outlined text-4xl text-slate-300 group-hover:text-amber-400 transition-colors">upload_file</span>
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Logo (PNG/SVG)</p>
                            <input type="file" name="logo" id="logoInput" class="hidden" onchange="previewFile(this)">
                        </div>
                    </div>

                    <div class="lg:col-span-9 space-y-8">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Franchise Name</label>
                                <input type="text" name="name" id="name" placeholder="e.g. Rohtak Royals" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all">
                            </div>
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Representing City</label>
                                <input type="text" name="city" id="city" placeholder="e.g. Rohtak" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all">
                            </div>
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Gender Category</label>
                                <select name="gender" id="gender" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-[18px] text-sm font-bold text-slate-900 focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all">
                                    <option value="Men">Men's Team</option>
                                    <option value="Women">Women's Team</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8">
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Franchise Owner</label>
                                <input type="text" name="owner_name" id="owner_name" placeholder="Owner Name" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all">
                            </div>
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Display Order</label>
                                <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all">
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" id="saveBtn" class="w-full sm:w-auto bg-slate-900 text-white px-10 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-slate-200 flex items-center justify-center gap-3 hover:bg-amber-400 hover:text-slate-900 transition-all active:scale-95">
                                <span class="material-symbols-outlined">verified</span>
                                Save Franchise Details
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Teams Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
            @forelse($teams as $team)
            <div class="group relative bg-white border border-slate-200 rounded-[2.5rem] p-6 sm:p-8 transition-all duration-500 hover:shadow-2xl hover:shadow-slate-200 hover:-translate-y-2 border-b-8 {{ $team->status ? 'border-b-amber-400' : 'border-b-slate-200' }}">
                
                <!-- Status Badge -->
                <div class="absolute top-6 right-6">
                    <button onclick="toggleStatus({{ $team->id }})" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors {{ $team->status ? 'bg-amber-100 text-amber-600' : 'bg-slate-100 text-slate-400' }}">
                        <span class="material-symbols-outlined text-sm">{{ $team->status ? 'visibility' : 'visibility_off' }}</span>
                    </button>
                </div>

                <!-- Logo Section -->
                <div class="mb-6 sm:mb-8">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-slate-50 rounded-3xl flex items-center justify-center overflow-hidden border border-slate-100 group-hover:scale-110 transition-transform duration-500">
                        @if($team->logo)
                            <img src="{{ asset('storage/' . $team->logo) }}" class="w-full h-full object-contain p-3">
                        @else
                            <span class="material-symbols-outlined text-4xl text-slate-200">shield</span>
                        @endif
                    </div>
                </div>

                <!-- Info Section -->
                <div class="mb-8 sm:mb-10">
                    <div class="flex items-center justify-between gap-2 mb-1">
                        <span class="text-[10px] font-black text-amber-500 uppercase tracking-widest">{{ $team->city }}</span>
                        <span class="text-[10px] font-black px-2 py-0.5 rounded bg-slate-100 text-slate-600 uppercase tracking-widest">{{ $team->gender }}'s</span>
                    </div>
                    <h3 class="text-lg sm:text-xl font-black text-slate-900 mb-4 tracking-tight uppercase">{{ $team->name }}</h3>
                    
                    <div class="flex items-center gap-2 py-3 px-4 bg-slate-50 rounded-xl border border-slate-100">
                        <span class="material-symbols-outlined text-sm text-slate-400">person</span>
                        <span class="text-[10px] font-black text-slate-500 uppercase tracking-widest">{{ $team->owner_name ?? 'Owner: TBA' }}</span>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex items-center gap-2 border-t border-slate-50 pt-6">
                    <button onclick="editTeam({{ $team->id }})" class="flex-1 bg-slate-900 text-white py-3 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                        Edit
                    </button>
                    <button onclick="deleteTeam({{ $team->id }})" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </button>
                </div>

            </div>
            @empty
            <div class="col-span-full py-32 bg-white border-2 border-dashed border-slate-100 rounded-[3rem] text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-6 opacity-50">groups</span>
                <h3 class="text-xl font-black text-slate-900 uppercase">No Franchises Registered</h3>
                <p class="text-slate-400 text-xs font-bold mt-2 mb-8 uppercase tracking-widest opacity-60">Start building the 8 powerful franchises of Haryana.</p>
                <button onclick="openForm()" class="bg-amber-400 text-slate-900 px-10 py-4 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-amber-300 transition-all shadow-xl shadow-amber-100">
                    Register Your First Team
                </button>
            </div>
            @endforelse
        @if($teams->hasPages())
        <div class="mt-12">
            {{ $teams->links() }}
        </div>
        @endif
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openForm() {
        $('#formSection').removeClass('hidden');
        $('#formTitle').text('Register New Franchise');
        $('#teamForm')[0].reset();
        $('#team_id').val('');
        $('#previewLogo').addClass('hidden');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function closeForm() {
        $('#formSection').addClass('hidden');
    }

    function previewFile(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#previewLogo').attr('src', e.target.result).removeClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    $('#teamForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#team_id').val();
        const url = id ? `/teams/${id}/update` : '/teams';
        const formData = new FormData(this);

        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin text-lg">sync</span> Saving...');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                location.reload();
            },
            error: function(xhr) {
                alert('Validation error. Please check your inputs.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">verified</span> Save Franchise Details');
            }
        });
    });

    function editTeam(id) {
        $.get(`/teams/${id}/edit`, function(data) {
            $('#team_id').val(data.id);
            $('#name').val(data.name);
            $('#city').val(data.city);
            $('#owner_name').val(data.owner_name);
            $('#gender').val(data.gender || 'Men');
            $('#order').val(data.order);
            if (data.logo) {
                $('#previewLogo').attr('src', `/storage/${data.logo}`).removeClass('hidden');
            }
            $('#formSection').removeClass('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    function deleteTeam(id) {
        if (confirm('Are you sure you want to delete this franchise?')) {
            $.ajax({
                url: `/teams/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    location.reload();
                }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/teams/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
