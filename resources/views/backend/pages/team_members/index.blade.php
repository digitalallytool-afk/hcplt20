@extends('backend.layouts.main')

@section('title', 'Squad Central')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-10 gap-6">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Squad Central</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                    Manage HCPL Elite Players & Rosters
                </p>
            </div>
            <div class="flex items-center gap-3 w-full lg:w-auto">
                <button onclick="openForm()" class="flex-1 lg:flex-none bg-slate-900 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-3 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                    <span class="material-symbols-outlined text-[18px]">person_add</span>
                    Recruit Player
                </button>
            </div>
        </div>

        <!-- Team Selector / Filter Tabs -->
        <div class="mb-10 overflow-x-auto pb-4 scrollbar-hide">
            <div class="flex items-center gap-3">
                <button onclick="filterTeam('all')" class="team-tab active" data-team="all">All Squads</button>
                @foreach($teams as $team)
                    <button onclick="filterTeam({{ $team->id }})" class="team-tab" data-team="{{ $team->id }}">
                        {{ $team->name }}
                    </button>
                @endforeach
            </div>
        </div>

        <!-- Recruit Form (Modernized) -->
        <div id="formSection" class="hidden mb-12 animate-in slide-in-from-top-4 duration-500">
            <div class="bg-white border-2 border-amber-400/20 rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-amber-900/5 relative overflow-hidden">
                <div class="absolute top-4 right-4 sm:top-8 sm:right-8">
                    <button onclick="closeForm()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-all hover:rotate-90">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <form id="memberForm" class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-12">
                    @csrf
                    <input type="hidden" id="member_id" name="member_id">
                    
                    <!-- Profile Upload -->
                    <div class="lg:col-span-3">
                        <label class="block text-[10px] font-black uppercase tracking-[0.2em] text-slate-400 mb-4">Player Identity</label>
                        <div class="group relative w-full aspect-[4/5] bg-slate-50 rounded-[2rem] overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center" onclick="document.getElementById('imageInput').click()">
                            <img id="previewImage" class="absolute inset-0 w-full h-full object-cover hidden">
                            <div class="text-center group-hover:scale-110 transition-transform">
                                <span class="material-symbols-outlined text-4xl text-slate-200 group-hover:text-amber-400 mb-2">add_a_photo</span>
                                <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Profile Photo</p>
                            </div>
                            <input type="file" name="image" id="imageInput" class="hidden" onchange="previewFile(this)">
                        </div>
                    </div>

                    <!-- Details Input -->
                    <div class="lg:col-span-9 space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Assigned Team</label>
                                <select name="team_id" id="team_id" class="custom-input">
                                    <option value="" disabled selected>Select Franchise</option>
                                    @foreach($teams as $team)
                                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Full Name</label>
                                <input type="text" name="name" id="name" placeholder="Player Name" class="custom-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Strategic Role</label>
                                <select name="role" id="role" class="custom-input">
                                    <option value="" disabled selected>Select Role</option>
                                    <option>Batsman</option>
                                    <option>Bowler</option>
                                    <option>All Rounder</option>
                                    <option>Wicket Keeper</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 sm:gap-8">
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Native Origin</label>
                                <input type="text" name="origin" id="origin" placeholder="City, State" class="custom-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Player Emoji</label>
                                <input type="text" name="emoji" id="emoji" value="🏏" class="custom-input">
                            </div>
                            <div class="space-y-2">
                                <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 ml-2">Display Rank</label>
                                <input type="number" name="order" id="order" value="0" class="custom-input">
                            </div>
                        </div>
                        
                        <div class="flex justify-end pt-4">
                            <button type="submit" id="saveBtn" class="w-full sm:w-auto bg-slate-900 text-white px-12 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 flex items-center justify-center gap-3 hover:bg-amber-400 hover:text-slate-900 transition-all active:scale-95">
                                <span class="material-symbols-outlined">check_circle</span>
                                Finalize Recruitment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Squad Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8" id="squadGrid">
            @forelse($members as $member)
            <div class="member-card group" data-team-id="{{ $member->team_id }}">
                <div class="relative aspect-[4/5] overflow-hidden rounded-[2rem] mb-4 shadow-xl group-hover:shadow-amber-400/20 transition-all duration-500">
                    @if($member->image)
                        <img src="{{ asset('storage/' . $member->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-6xl text-slate-200">person</span>
                        </div>
                    @endif
                    
                    <!-- Team Badge Over Image -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1.5 bg-white/90 backdrop-blur text-[9px] font-black uppercase tracking-widest rounded-lg shadow-sm">{{ $member->team->name }}</span>
                    </div>

                    <!-- Role Badge Over Image -->
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="flex items-center gap-2 px-3 py-2 bg-slate-900/80 backdrop-blur text-white rounded-xl border border-white/10">
                            <span class="text-base">{{ $member->emoji }}</span>
                            <span class="text-[9px] font-black uppercase tracking-widest truncate">{{ $member->role }}</span>
                        </div>
                    </div>

                    <!-- Quick Actions Overlay -->
                    <div class="absolute inset-0 bg-slate-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-3">
                        <button onclick="editMember({{ $member->id }})" class="w-12 h-12 bg-white text-slate-900 rounded-xl flex items-center justify-center hover:bg-amber-400 transition-all translate-y-6 group-hover:translate-y-0 duration-500">
                            <span class="material-symbols-outlined text-xl">edit</span>
                        </button>
                        <button onclick="deleteMember({{ $member->id }})" class="w-12 h-12 bg-white text-red-500 rounded-xl flex items-center justify-center hover:bg-red-500 hover:text-white transition-all translate-y-6 group-hover:translate-y-0 duration-500 delay-75">
                            <span class="material-symbols-outlined text-xl">delete</span>
                        </button>
                    </div>
                </div>

                <div class="px-2">
                    <div class="flex items-center justify-between mb-1">
                        <h3 class="text-sm font-black text-slate-900 tracking-tight uppercase">{{ $member->name }}</h3>
                        <button onclick="toggleStatus({{ $member->id }})" class="status-indicator {{ $member->status ? 'active' : '' }}"></button>
                    </div>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">{{ $member->origin }}</p>
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 bg-white rounded-[2rem] border-2 border-dashed border-slate-100 text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-6 opacity-50">sports_kabaddi</span>
                <h3 class="text-xl font-black text-slate-900 uppercase">No Players Recruited</h3>
                <p class="text-slate-400 text-xs font-bold mt-2 mb-8 uppercase tracking-widest opacity-60">Start building your squads by recruiting players.</p>
                <button onclick="openForm()" class="bg-amber-400 text-slate-900 px-8 py-4 rounded-xl font-black text-[10px] uppercase tracking-widest shadow-xl shadow-amber-100 hover:bg-amber-300 transition-all">Recruit Your First Player</button>
            </div>
            @endforelse
        </div>

        @if($members->hasPages())
        <div class="mt-12">
            {{ $members->links() }}
        </div>
        @endif
    </div>
</main>

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    .team-tab {
        white-space: nowrap;
        padding: 14px 28px;
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #64748b;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .team-tab:hover { border-color: #f59e0b; color: #f59e0b; }
    .team-tab.active { background: #0f172a; border-color: #0f172a; color: #fff; box-shadow: 0 10px 20px rgba(15, 23, 42, 0.1); }

    .custom-input {
        width: 100%;
        background: #f8fafc;
        border: 1.5px solid #e2e8f0;
        border-radius: 1.25rem;
        padding: 1.1rem 1.5rem;
        font-size: 0.875rem;
        font-weight: 700;
        color: #1e293b;
        transition: all 0.3s;
        outline: none;
    }

    .custom-input:focus { border-color: #f59e0b; background: #fff; box-shadow: 0 0 0 5px rgba(245, 158, 11, 0.05); }

    .status-indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: #cbd5e1;
        border: 3px solid #fff;
        box-shadow: 0 0 0 1px #cbd5e1;
        transition: all 0.3s;
    }

    .status-indicator.active { background: #10b981; box-shadow: 0 0 0 1px #10b981; }

    .member-card { animation: fadeInUp 0.5s ease backwards; }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openForm() {
        $('#formSection').removeClass('hidden');
        $('#memberForm')[0].reset();
        $('#member_id').val('');
        $('#previewImage').addClass('hidden');
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
                $('#previewImage').attr('src', e.target.result).removeClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    $('#memberForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#member_id').val();
        const url = id ? `/team-members/${id}/update` : '/team-members';
        const formData = new FormData(this);

        $('#saveBtn').prop('disabled', true).html('Finalizing...');

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
                alert('Error occurred. Please try again.');
                $('#saveBtn').prop('disabled', false).html('Finalize Recruitment');
            }
        });
    });

    function filterTeam(teamId) {
        $('.team-tab').removeClass('active');
        $(`.team-tab[data-team="${teamId}"]`).addClass('active');

        if(teamId === 'all') {
            $('.member-card').show();
        } else {
            $('.member-card').hide();
            $(`.member-card[data-team-id="${teamId}"]`).show();
        }
    }

    function editMember(id) {
        $.get(`/team-members/${id}/edit`, function(data) {
            $('#member_id').val(data.id);
            $('#team_id').val(data.team_id);
            $('#name').val(data.name);
            $('#role').val(data.role);
            $('#origin').val(data.origin);
            $('#emoji').val(data.emoji);
            $('#order').val(data.order);
            if (data.image) {
                $('#previewImage').attr('src', `/storage/${data.image}`).removeClass('hidden');
            }
            $('#formSection').removeClass('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    function deleteMember(id) {
        if (confirm('De-list this player from the squad?')) {
            $.ajax({
                url: `/team-members/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    location.reload();
                }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/team-members/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
