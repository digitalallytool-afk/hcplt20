@extends('backend.layouts.main')

@section('title', 'Match Schedule Hub')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Match Schedule Hub</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage fixtures, scores, and results</p>
            </div>
            <button onclick="openDrawer()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">sports_cricket</span>
                Schedule New Match
            </button>
        </div>

        <!-- Matches Table/Grid -->
        <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden shadow-sm">
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full text-left border-collapse min-w-[900px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Fixture</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Venue & Date</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Score / Status</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($matches as $match)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="font-black text-slate-900 text-sm uppercase tracking-tight">{{ $match->team_a }}</div>
                                    <div class="px-2 py-0.5 bg-amber-100 text-amber-700 text-[8px] font-black rounded uppercase">VS</div>
                                    <div class="font-black text-slate-900 text-sm uppercase tracking-tight">{{ $match->team_b }}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-[11px] font-black text-slate-900 mb-0.5 uppercase tracking-tighter">{{ $match->venue }}</div>
                                <div class="text-[10px] font-bold text-slate-400 flex items-center gap-1 uppercase tracking-widest">
                                    <span class="material-symbols-outlined text-[12px]">calendar_today</span>
                                    {{ $match->date_text }}
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="text-[11px] font-black text-slate-900 uppercase tracking-tighter">{{ $match->score ?? '—' }}</div>
                                    <span class="px-2 py-1 border rounded-lg text-[8px] font-black uppercase tracking-widest {{ strtolower($match->status) == 'live' ? 'bg-red-50 text-red-600 border-red-100 animate-pulse' : 'bg-slate-50 text-slate-500 border-slate-100' }}">
                                        {{ $match->status }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="editMatch({{ $match->id }})" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-white rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button onclick="deleteMatch({{ $match->id }})" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-20 text-center">
                                <span class="material-symbols-outlined text-5xl text-slate-200 mb-4 opacity-50">event_busy</span>
                                <p class="text-slate-400 font-black uppercase tracking-widest text-[10px] italic opacity-50">No matches scheduled yet</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($matches->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $matches->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Slide-over Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-slate-900/60 z-[999] hidden opacity-0 transition-opacity duration-300" onclick="closeDrawer()"></div>
    <div id="drawer" class="fixed top-0 right-0 h-full w-full max-w-xl bg-white z-[1000] translate-x-full transition-transform duration-500 shadow-2xl overflow-y-auto scrollbar-hide">
        <div class="p-8 sm:p-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 id="drawerTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">Schedule Match</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest opacity-60">Set fixture details for teams and venue</p>
                </div>
                <button onclick="closeDrawer()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="matchForm" class="space-y-8">
                @csrf
                <input type="hidden" id="match_id" name="match_id">

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Team A</label>
                        <input type="text" name="team_a" id="team_a" placeholder="e.g. Rohtak Warriors" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Team B</label>
                        <input type="text" name="team_b" id="team_b" placeholder="e.g. Hisar Titans" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Match Venue</label>
                    <input type="text" name="venue" id="venue" placeholder="e.g. Rohtak Sports Complex" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Date & Time Text</label>
                    <input type="text" name="date_text" id="date_text" placeholder="e.g. 25 May, 2:00 PM" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Current Score</label>
                        <input type="text" name="score" id="score" placeholder="e.g. 182/6 v 176/8" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Status</label>
                        <input type="text" name="status" id="status" placeholder="e.g. LIVE / Upcoming / Final" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">stadium</span>
                        Save Match Fixture
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
        $('#drawerTitle').text('Schedule Match');
        $('#matchForm')[0].reset();
        $('#match_id').val('');
    }

    function closeDrawer() {
        $('#drawerOverlay').animate({opacity: 0}, 300, function() { $(this).addClass('hidden'); });
        $('#drawer').addClass('translate-x-full');
    }

    $('#matchForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#match_id').val();
        const url = id ? `/matches/${id}/update` : '/matches';
        
        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin">sync</span> Saving...');

        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            success: function() { location.reload(); },
            error: function() {
                alert('Error occurred. Please check your data.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">stadium</span> Save Match Fixture');
            }
        });
    });

    function editMatch(id) {
        $.get(`/matches/${id}/edit`, function(data) {
            openDrawer();
            $('#match_id').val(data.id);
            $('#team_a').val(data.team_a);
            $('#team_b').val(data.team_b);
            $('#venue').val(data.venue);
            $('#date_text').val(data.date_text);
            $('#score').val(data.score);
            $('#status').val(data.status);
            $('#drawerTitle').text('Edit Match Fixture');
        });
    }

    function deleteMatch(id) {
        if(confirm('Are you sure you want to delete this match?')) {
            $.ajax({
                url: `/matches/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }
</script>
@endsection
