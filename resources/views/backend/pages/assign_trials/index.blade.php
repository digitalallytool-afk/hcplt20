@extends('backend.layouts.main')

@section('title', 'Assign Trials')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Assign Trials</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Allocate players to upcoming trials</p>
            </div>
        </div>

        <div class="bg-white border border-slate-200 rounded-[2.5rem] p-6 sm:p-8 mb-8 shadow-sm">
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-7 gap-6">
                <!-- Select Trial -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">Select Trial</label>
                    <select id="trial_id" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        <option value="">-- Choose Trial --</option>
                        @foreach($trials as $trial)
                            <option value="{{ $trial->id }}">{{ $trial->title }} ({{ $trial->zone_name }} - {{ $trial->date_text }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Select State -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">State Filter</label>
                    <select id="state" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        <option value="">-- Select State --</option>
                        @foreach($states as $state)
                            <option value="{{ $state }}">{{ $state }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Select District -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">District Filter</label>
                    <select id="district" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all" disabled>
                        <option value="">-- All Districts --</option>
                    </select>
                </div>

                <!-- Assignment Status -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">Status</label>
                    <select id="status_filter" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        <option value="unassigned" selected>Unassigned Only</option>
                        <option value="assigned">Assigned Only</option>
                        <option value="all">All Players</option>
                    </select>
                </div>

                <!-- Limit -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">Limit (Players)</label>
                    <input type="number" id="limit" placeholder="e.g. 50" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <!-- Search by ID -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">Search ID</label>
                    <input type="text" id="player_id_filter" placeholder="e.g. 1-HCPL-001" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <!-- Gender Filter -->
                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400">Gender</label>
                    <select id="gender_filter" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        <option value="">All</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button id="fetchPlayersBtn" class="bg-slate-900 text-white px-8 py-3 rounded-xl font-black text-[11px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all shadow-lg shadow-slate-200 flex items-center gap-2">
                    <span class="material-symbols-outlined text-[18px]">search</span>
                    Fetch Players
                </button>
            </div>
        </div>

        <!-- Players Table -->
        <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm hidden" id="playersContainer">
            <div class="p-6 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center bg-slate-50 gap-4">
                <h3 class="text-lg font-black text-slate-900 uppercase tracking-tight">Eligible Players (<span id="playerCount">0</span>)</h3>
                <div class="flex gap-2">
                    <button id="unassignBtn" class="bg-red-600 text-white px-6 py-2 rounded-xl font-black text-[11px] uppercase tracking-widest hover:bg-red-500 transition-all flex items-center gap-2" disabled>
                        <span class="material-symbols-outlined text-[16px]">cancel</span>
                        Unassign Selected
                    </button>
                    <button id="assignBtn" class="bg-green-600 text-white px-6 py-2 rounded-xl font-black text-[11px] uppercase tracking-widest hover:bg-green-500 transition-all flex items-center gap-2" disabled>
                        <span class="material-symbols-outlined text-[16px]">check_circle</span>
                        Assign Selected
                    </button>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100 text-[10px] uppercase tracking-widest text-slate-400 font-black">
                            <th class="p-4 text-center w-16">
                                <input type="checkbox" id="selectAll" class="w-4 h-4 rounded border-slate-300 text-amber-500 focus:ring-amber-500">
                            </th>
                            <th class="p-4 w-16">S.No.</th>
                            <th class="p-4">Player Name</th>
                            <th class="p-4">Location</th>
                            <th class="p-4">Role & Trial</th>
                            <th class="p-4">Trial Result</th>
                            <th class="p-4">Remark</th>
                            <th class="p-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody id="playersBody" class="text-sm font-medium text-slate-700">
                        <!-- Rows will be populated via AJAX -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination Controls -->
            <div id="paginationContainer"></div>
        </div>
    </div>
</main>

<!-- History Modal -->
<div id="historyModal" class="fixed inset-0 z-50 hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-xl w-full max-w-3xl overflow-hidden flex flex-col max-h-[90vh]">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center bg-slate-50">
            <div>
                <h3 class="text-xl font-black text-slate-900 uppercase tracking-tight">Trial History</h3>
                <p id="historyPlayerName" class="text-slate-500 text-xs font-bold uppercase tracking-widest mt-1">Player Name</p>
            </div>
            <button id="closeHistoryModal" class="text-slate-400 hover:text-red-500 transition-colors">
                <span class="material-symbols-outlined text-[24px]">close</span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto" id="historyModalBody">
            <div class="text-center py-8 hidden" id="historyLoader">
                <span class="material-symbols-outlined animate-spin text-[32px] text-amber-500">sync</span>
                <p class="text-slate-500 text-sm font-bold uppercase tracking-widest mt-2">Loading History...</p>
            </div>
            <div id="historyContent">
                <!-- History Table goes here -->
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fetch districts when state changes
        $('#state').change(function() {
            let state = $(this).val();
            let districtSelect = $('#district');
            
            districtSelect.html('<option value="">-- All Districts --</option>');
            
            if (state) {
                $.post('{{ route("assign_trials.get_districts") }}', { 
                    _token: '{{ csrf_token() }}',
                    state: state 
                }, function(data) {
                    districtSelect.prop('disabled', false);
                    data.forEach(function(dist) {
                        districtSelect.append(`<option value="${dist}">${dist}</option>`);
                    });
                });
            } else {
                districtSelect.prop('disabled', true);
            }
        });

        // Fetch players function
        window.fetchPlayers = function(page = 1) {
            let state = $('#state').val();
            let district = $('#district').val();
            let limit = $('#limit').val();
            let status = $('#status_filter').val();
            let player_id = $('#player_id_filter').val();
            let gender = $('#gender_filter').val();

            if (!state && !player_id) {
                alert('Please select a state to filter players, or enter a Player ID.');
                return;
            }

            $('#fetchPlayersBtn').html('<span class="material-symbols-outlined animate-spin text-[18px]">sync</span> Fetching...').prop('disabled', true);

            $.post('{{ route("assign_trials.get_players") }}?page=' + page, {
                _token: '{{ csrf_token() }}',
                state: state,
                district: district,
                limit: limit,
                status: status,
                player_id: player_id,
                gender: gender
            }, function(response) {
                $('#fetchPlayersBtn').html('<span class="material-symbols-outlined text-[18px]">search</span> Fetch Players').prop('disabled', false);
                
                let tbody = $('#playersBody');
                tbody.empty();
                
                let players = response.data;
                $('#playerCount').text(response.total);
                
                if (players.length > 0) {
                    $('#playersContainer').removeClass('hidden');
                    $('#assignBtn').prop('disabled', false);
                    $('#unassignBtn').prop('disabled', false);
                    
                    let startIndex = (response.current_page - 1) * response.per_page;
                    
                    players.forEach(function(player, index) {
                        let sno = startIndex + index + 1;
                        let currentTrial = player.trial ? `<span class="px-2 py-1 bg-amber-50 text-amber-600 rounded text-[10px] font-bold border border-amber-100">${player.trial.title}</span>` : '<span class="text-slate-400 text-xs italic">Unassigned</span>';
                        let trialResult = player.trial ? player.trial.trial_result : 'pending';
                        let trialRemark = player.trial ? (player.trial.trial_remark || '') : '';
                        
                        tbody.append(`
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition-colors" data-id="${player.id}">
                                <td class="p-4 text-center">
                                    <input type="checkbox" name="player_ids[]" value="${player.id}" class="player-checkbox w-4 h-4 rounded border-slate-300 text-amber-500 focus:ring-amber-500">
                                </td>
                                <td class="p-4 font-black text-slate-400">${sno}</td>
                                <td class="p-4">
                                    <div class="font-black text-slate-900 text-[13px] uppercase tracking-wide">${player.first_name} ${player.last_name}</div>
                                    <div class="mt-1.5 flex gap-2">
                                        <span class="px-2 py-0.5 bg-indigo-50 text-indigo-600 rounded text-[10px] font-black uppercase tracking-widest border border-indigo-100 shadow-sm">${player.player_id || player.id}</span>
                                        <span class="px-2 py-0.5 bg-slate-100 text-slate-600 rounded text-[10px] font-black uppercase border border-slate-200 shadow-sm">${player.gender || 'N/A'}</span>
                                    </div>
                                </td>
                                <td class="p-4 text-xs font-bold text-slate-500">${player.trial_district || '-'}, ${player.trial_state || '-'}</td>
                                <td class="p-4">
                                    <span class="px-2 py-1 bg-slate-100 text-slate-600 rounded text-[10px] font-bold uppercase tracking-wide block w-fit mb-1">${player.player_role || 'N/A'}</span>
                                    ${currentTrial}
                                </td>
                                <td class="p-4 w-32">
                                    <select class="res-status w-full bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-bold text-slate-900 focus:border-amber-400 outline-none">
                                        <option value="pending" ${trialResult === 'pending' ? 'selected' : ''}>Pending</option>
                                        <option value="success" ${trialResult === 'success' ? 'selected' : ''}>Success</option>
                                        <option value="failed" ${trialResult === 'failed' ? 'selected' : ''}>Failed</option>
                                    </select>
                                </td>
                                <td class="p-4 w-48">
                                    <input type="text" class="res-remark w-full bg-white border border-slate-200 rounded-lg px-2 py-1 text-xs font-bold text-slate-900 focus:border-amber-400 outline-none" placeholder="Remark..." value="${trialRemark}">
                                </td>
                                <td class="p-4 text-center">
                                    <div class="flex flex-col gap-2 items-center">
                                        <button class="save-result-btn bg-blue-600 text-white px-3 py-1 rounded text-[10px] font-black uppercase tracking-widest hover:bg-blue-500 transition-all flex items-center gap-1 w-full justify-center" data-id="${player.id}">
                                            <span class="material-symbols-outlined text-[14px]">save</span> Save
                                        </button>
                                        <button class="view-history-btn bg-slate-800 text-white px-3 py-1 rounded text-[10px] font-black uppercase tracking-widest hover:bg-slate-700 transition-all flex items-center gap-1 w-full justify-center" data-id="${player.id}">
                                            <span class="material-symbols-outlined text-[14px]">history</span> History
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        `);
                    });
                    
                    // Check all by default
                    $('#selectAll').prop('checked', true);
                    $('.player-checkbox').prop('checked', true);

                    // Add Pagination UI
                    let paginationHtml = '';
                    if (response.last_page > 1) {
                        paginationHtml = `
                        <div class="p-4 flex justify-between items-center bg-slate-50 text-sm border-t border-slate-100">
                            <div class="text-slate-500 font-bold">Page ${response.current_page} of ${response.last_page}</div>
                            <div class="flex gap-2">
                                <button type="button" class="px-4 py-2 bg-white border border-slate-200 rounded-lg hover:bg-slate-100 disabled:opacity-50 text-slate-700 font-bold" ${response.current_page === 1 ? 'disabled' : ''} onclick="fetchPlayers(${response.current_page - 1})">Previous</button>
                                <button type="button" class="px-4 py-2 bg-white border border-slate-200 rounded-lg hover:bg-slate-100 disabled:opacity-50 text-slate-700 font-bold" ${response.current_page === response.last_page ? 'disabled' : ''} onclick="fetchPlayers(${response.current_page + 1})">Next</button>
                            </div>
                        </div>`;
                    }
                    $('#paginationContainer').html(paginationHtml);
                    
                } else {
                    $('#playersContainer').addClass('hidden');
                    $('#assignBtn').prop('disabled', true);
                    $('#unassignBtn').prop('disabled', true);
                    alert('No eligible paid players found for this selection.');
                }
            });
        };

        $('#fetchPlayersBtn').click(function() {
            fetchPlayers(1);
        });

        // Select All toggle
        $(document).on('change', '#selectAll', function() {
            $('.player-checkbox').prop('checked', $(this).prop('checked'));
        });

        $(document).on('change', '.player-checkbox', function() {
            if (!$(this).prop('checked')) {
                $('#selectAll').prop('checked', false);
            }
        });

        // Assign Trial
        $('#assignBtn').click(function() {
            let trial_id = $('#trial_id').val();
            let selectedPlayers = [];
            
            $('.player-checkbox:checked').each(function() {
                selectedPlayers.push($(this).val());
            });

            if (!trial_id) {
                alert('Please select a Trial to assign from the dropdown.');
                return;
            }

            if (selectedPlayers.length === 0) {
                alert('Please select at least one player to assign.');
                return;
            }

            if (confirm(`Are you sure you want to assign Trial to ${selectedPlayers.length} selected players?`)) {
                let btn = $(this);
                btn.html('<span class="material-symbols-outlined animate-spin text-[16px]">sync</span> Assigning...').prop('disabled', true);

                $.post('{{ route("assign_trials.assign") }}', {
                    _token: '{{ csrf_token() }}',
                    trial_id: trial_id,
                    player_ids: selectedPlayers
                }, function(response) {
                    alert(response.message);
                    btn.html('<span class="material-symbols-outlined text-[16px]">check_circle</span> Assign Selected').prop('disabled', false);
                    $('#fetchPlayersBtn').click(); // Refresh list
                }).fail(function() {
                    alert('An error occurred. Please try again.');
                    btn.html('<span class="material-symbols-outlined text-[16px]">check_circle</span> Assign Selected').prop('disabled', false);
                });
            }
        });

        // Unassign Trial
        $('#unassignBtn').click(function() {
            let trial_id = $('#trial_id').val();
            let selectedPlayers = [];
            
            $('.player-checkbox:checked').each(function() {
                selectedPlayers.push($(this).val());
            });

            if (!trial_id) {
                alert('Please select a Trial to unassign from the dropdown (or it will unassign all if we allow it, but we require it here).');
                return;
            }

            if (selectedPlayers.length === 0) {
                alert('Please select at least one player to unassign.');
                return;
            }

            if (confirm(`Are you sure you want to UNASSIGN the selected trial from ${selectedPlayers.length} selected players?`)) {
                let btn = $(this);
                btn.html('<span class="material-symbols-outlined animate-spin text-[16px]">sync</span> Unassigning...').prop('disabled', true);

                $.post('{{ route("assign_trials.unassign") }}', {
                    _token: '{{ csrf_token() }}',
                    trial_id: trial_id,
                    player_ids: selectedPlayers
                }, function(response) {
                    alert(response.message);
                    btn.html('<span class="material-symbols-outlined text-[16px]">cancel</span> Unassign Selected').prop('disabled', false);
                    $('#fetchPlayersBtn').click(); // Refresh list
                }).fail(function() {
                    alert('An error occurred. Please try again.');
                    btn.html('<span class="material-symbols-outlined text-[16px]">cancel</span> Unassign Selected').prop('disabled', false);
                });
            }
        });

        // Save Row Result Action
        $(document).on('click', '.save-result-btn', function() {
            let btn = $(this);
            let playerId = btn.data('id');
            let tr = btn.closest('tr');
            let status = tr.find('.res-status').val();
            let remark = tr.find('.res-remark').val();

            btn.html('<span class="material-symbols-outlined animate-spin text-[14px]">sync</span>').prop('disabled', true);

            $.post('{{ route("assign_trials.update_result") }}', {
                _token: '{{ csrf_token() }}',
                player_id: playerId,
                trial_result: status,
                trial_remark: remark
            }, function(response) {
                alert(response.message);
                btn.html('<span class="material-symbols-outlined text-[14px]">save</span> Save').prop('disabled', false);
            }).fail(function() {
                alert('An error occurred. Please try again.');
                btn.html('<span class="material-symbols-outlined text-[14px]">save</span> Save').prop('disabled', false);
            });
        });

        // View History Action
        $(document).on('click', '.view-history-btn', function() {
            let playerId = $(this).data('id');
            $('#historyModal').removeClass('hidden');
            $('#historyContent').empty();
            $('#historyLoader').removeClass('hidden');
            $('#historyPlayerName').text('Loading...');

            $.get('/assign-trials/player/' + playerId + '/history', function(response) {
                $('#historyLoader').addClass('hidden');
                
                if (response.success) {
                    $('#historyPlayerName').text(response.player_name + ' (' + response.player_id_string + ')');
                    
                    if (response.history.length === 0) {
                        $('#historyContent').html('<div class="text-center py-8 text-slate-500 font-bold uppercase tracking-widest text-sm">No trial history found.</div>');
                        return;
                    }

                    let tableHtml = `
                        <div class="overflow-x-auto">
                            <table class="w-full text-left border-collapse">
                                <thead>
                                    <tr class="bg-slate-50 border-b border-slate-100 text-[10px] uppercase tracking-widest text-slate-400 font-black">
                                        <th class="p-3">Trial Details</th>
                                        <th class="p-3">Result</th>
                                        <th class="p-3">Status Date</th>
                                        <th class="p-3">Remark</th>
                                        <th class="p-3">Assigned On</th>
                                    </tr>
                                </thead>
                                <tbody class="text-sm font-medium text-slate-700">
                    `;

                    response.history.forEach(function(trial) {
                        let resultBadge = '';
                        if(trial.result === 'success') resultBadge = '<span class="px-2 py-1 bg-green-100 text-green-700 rounded text-[10px] font-black uppercase tracking-wider">Success</span>';
                        else if(trial.result === 'failed') resultBadge = '<span class="px-2 py-1 bg-red-100 text-red-700 rounded text-[10px] font-black uppercase tracking-wider">Failed</span>';
                        else resultBadge = '<span class="px-2 py-1 bg-slate-100 text-slate-600 rounded text-[10px] font-black uppercase tracking-wider">Pending</span>';

                        tableHtml += `
                            <tr class="border-b border-slate-50">
                                <td class="p-3">
                                    <div class="font-bold text-slate-900">${trial.title}</div>
                                    <div class="text-[10px] text-slate-500 uppercase tracking-wider mt-1">${trial.zone_name} • ${trial.venue}</div>
                                </td>
                                <td class="p-3">${resultBadge}</td>
                                <td class="p-3">${trial.status_date || '-'}</td>
                                <td class="p-3 text-xs">${trial.remark || '-'}</td>
                                <td class="p-3 text-[11px] text-slate-500">${trial.assigned_on}</td>
                            </tr>
                        `;
                    });

                    tableHtml += `</tbody></table></div>`;
                    $('#historyContent').html(tableHtml);
                } else {
                    $('#historyContent').html('<div class="text-center py-8 text-red-500 font-bold">Failed to load history.</div>');
                }
            }).fail(function() {
                $('#historyLoader').addClass('hidden');
                $('#historyContent').html('<div class="text-center py-8 text-red-500 font-bold">An error occurred while fetching history.</div>');
            });
        });

        // Close History Modal
        $('#closeHistoryModal').click(function() {
            $('#historyModal').addClass('hidden');
        });

        $('#historyModal').click(function(e) {
            if (e.target === this) {
                $('#historyModal').addClass('hidden');
            }
        });
    });
</script>
@endsection
