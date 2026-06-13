
 
@extends('backend.layouts.main')
@section('content')
 <!-- Main Content Canvas -->
  <main class="ml-[260px] pt-16 min-h-screen">
    <div class="p-container-padding">
      <!-- Page Header Area -->
      <div class="flex flex-col md:flex-row md:items-end justify-between gap-gutter mb-8">
        <div>
          <nav class="flex items-center gap-2 text-slate-500 font-label-sm mb-2">
            <span>Management</span>
            <span class="material-symbols-outlined text-xs">chevron_right</span>
            <span class="text-amber-600 font-bold">Players</span>
          </nav>
          <h2 class="font-h1 text-on-background">Player Registry</h2>
          <p class="font-body-md text-on-surface-variant mt-1">Manage, verify, and track performance of all
            league-registered players.</p>
        </div>
        <div class="flex items-center gap-3">
          <a href="{{ request()->fullUrlWithQuery(['export' => 'csv']) }}"
            class="bg-slate-100 text-slate-700 px-4 py-2 font-label-md rounded flex items-center gap-2 hover:bg-slate-200 transition-colors">
            <span class="material-symbols-outlined text-lg">download</span>
            Export CSV
          </a>
        </div>
      </div>
      <!-- Bento Stats Grid -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter mb-4">
        <div class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">groups</span>
            </div>
            <span class="font-label-sm text-slate-400 px-2 py-0.5">Global</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Total Players</p>
          <p class="font-display text-slate-950">{{ number_format($totalPlayers) }}</p>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">verified</span>
            </div>
            <span class="font-label-sm text-green-600 bg-green-50 px-2 py-0.5 rounded">Active</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Completed Payments</p>
          <p class="font-display text-slate-950">{{ number_format($verifiedPlayers) }}</p>
        </div>
        <div class="bg-white border border-slate-200 p-6 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-4">
            <div class="w-10 h-10 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined">pending_actions</span>
            </div>
            <span class="font-label-sm text-red-600 bg-red-50 px-2 py-0.5 rounded">High Pri</span>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Pending Payments</p>
          <p class="font-display text-slate-950">{{ number_format($pendingPlayers) }}</p>
        </div>
      </div>

      <!-- Role Stats Grid -->
      <div class="grid grid-cols-2 md:grid-cols-4 gap-gutter mb-8">
        <div class="bg-white border border-slate-200 p-4 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-2">
            <div class="w-8 h-8 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined text-sm">sports_cricket</span>
            </div>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Batsmen</p>
          <p class="font-display text-slate-950 text-xl">{{ number_format(\App\Models\PlayerProfile::where('player_role', 'Batsman')->count()) }}</p>
        </div>
        <div class="bg-white border border-slate-200 p-4 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-2">
            <div class="w-8 h-8 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined text-sm">sports_handball</span>
            </div>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Bowlers</p>
          <p class="font-display text-slate-950 text-xl">{{ number_format(\App\Models\PlayerProfile::where('player_role', 'Bowler')->count()) }}</p>
        </div>
        <div class="bg-white border border-slate-200 p-4 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-2">
            <div class="w-8 h-8 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined text-sm">front_hand</span>
            </div>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">Wicket Keepers</p>
          <p class="font-display text-slate-950 text-xl">{{ number_format(\App\Models\PlayerProfile::where('player_role', 'Wicket Keeper')->count()) }}</p>
        </div>
        <div class="bg-white border border-slate-200 p-4 rounded shadow-sm hover:border-amber-400 transition-colors group">
          <div class="flex items-center justify-between mb-2">
            <div class="w-8 h-8 rounded bg-slate-100 flex items-center justify-center text-slate-900 group-hover:bg-amber-400 group-hover:text-white transition-all">
              <span class="material-symbols-outlined text-sm">military_tech</span>
            </div>
          </div>
          <p class="font-label-sm text-slate-500 uppercase tracking-wider mb-1">All-Rounders</p>
          <p class="font-display text-slate-950 text-xl">{{ number_format(\App\Models\PlayerProfile::where('player_role', 'All Rounder')->count()) }}</p>
        </div>
      </div>
      <!-- Main Data Canvas -->
      <div class="bg-white border border-slate-200 rounded shadow-sm overflow-hidden">
        <!-- Advanced Filter Bar -->
        <form method="GET" action="{{ route('player') }}" class="p-6 border-b border-slate-100 flex flex-col md:flex-row items-center justify-between gap-4">
          <div class="relative w-full md:w-96 flex gap-2">
            <div class="relative w-full">
              <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
              <input name="search" value="{{ request('search') }}"
                class="w-full pl-10 pr-4 py-2 border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0 transition-all"
                placeholder="Search by name, ID, or phone..." type="text" />
            </div>
            <button type="submit" class="bg-amber-400 text-slate-950 px-4 py-2 rounded font-label-md hover:bg-amber-300 transition-colors">
              Search
            </button>
          </div>
          <div class="flex items-center gap-3 w-full md:w-auto">
            <select name="gender" class="border-slate-200 rounded font-body-sm py-2 px-4 focus:border-amber-400 focus:ring-0" onchange="this.form.submit()">
              <option value="">All Genders</option>
              <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            <select name="role" class="border-slate-200 rounded font-body-sm py-2 px-4 focus:border-amber-400 focus:ring-0" onchange="this.form.submit()">
              <option value="">All Roles</option>
              <option value="Batsman" {{ request('role') == 'Batsman' ? 'selected' : '' }}>Batsman</option>
              <option value="Bowler" {{ request('role') == 'Bowler' ? 'selected' : '' }}>Bowler</option>
              <option value="All Rounder" {{ request('role') == 'All Rounder' ? 'selected' : '' }}>All-Rounder</option>
              <option value="Wicket Keeper" {{ request('role') == 'Wicket Keeper' ? 'selected' : '' }}>Wicket Keeper</option>
            </select>
            @if(request()->hasAny(['search', 'gender', 'role']))
              <a href="{{ route('player') }}" class="flex items-center gap-2 border border-slate-200 text-red-500 px-4 py-2 rounded font-body-sm hover:bg-red-50">
                <span class="material-symbols-outlined text-lg">close</span>
                Clear
              </a>
            @endif
          </div>
        </form>
        <!-- High Density Data Table -->
        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-slate-50/50 border-b border-slate-200">
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">
                  S.No
                </th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">
                  Player Name
                </th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">Gender</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">Role</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">Contact</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider">Trial Info</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">Payment Status</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">Amount Paid</th>
                <th class="px-6 py-4 font-label-md text-slate-500 uppercase tracking-wider text-center">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
              @forelse($players as $player)
              <tr class="hover:bg-slate-50 transition-colors group">
                <td class="px-6 py-4 text-center font-body-sm text-slate-500">
                  {{ ($players->currentPage() - 1) * $players->perPage() + $loop->iteration }}
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-slate-200 overflow-hidden border border-slate-300 flex items-center justify-center text-slate-500 font-bold">
                      {{ substr($player->first_name, 0, 1) }}{{ substr($player->last_name, 0, 1) }}
                    </div>
                    <div>
                      <p class="font-h3 text-slate-900 text-sm mb-0">{{ $player->first_name }} {{ $player->last_name }}</p>
                      <p class="font-body-sm text-slate-500">ID: {{ $player->player_id ?? 'N/A' }}</p>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <span class="font-body-md text-sm text-slate-700">{{ $player->gender }}</span>
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-amber-500 text-sm">
                      @if($player->player_role == 'Batsman') sports_cricket
                      @elseif($player->player_role == 'Bowler') sports_handball
                      @elseif($player->player_role == 'Wicket Keeper') front_hand
                      @else all_inclusive @endif
                    </span>
                    <span class="font-body-md text-sm text-slate-700">{{ $player->player_role ?? 'Pending' }}</span>
                  </div>
                </td>
                <td class="px-6 py-4">
                  <p class="font-body-sm text-slate-900 mb-0"><i class="fa fa-phone text-slate-400 me-1"></i> {{ $player->phone_number }}</p>
                  @if($player->alternate_phone_number)
                  <p class="font-body-sm text-slate-500 text-xs mt-1">Alt: {{ $player->alternate_phone_number }}</p>
                  @endif
                </td>
                <td class="px-6 py-4">
                  <p class="font-body-sm text-slate-900 mb-0">{{ $player->trial_state ?? 'N/A' }}</p>
                  <p class="font-body-sm text-slate-500 text-xs mt-1">{{ $player->trial_district ?? 'N/A' }}</p>
                </td>
                <td class="px-6 py-4 text-center">
                  @if($player->payment_status === 'completed')
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Completed
                  </span>
                  @else
                  <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500 mr-1.5"></span> Pending
                  </span>
                  @endif
                </td>
                <td class="px-6 py-4 text-center">
                  @if($player->payment_status === 'completed' && $player->payment_amount)
                    <span class="font-semibold text-green-700 text-sm">₹{{ number_format($player->payment_amount, 0) }}</span>
                  @else
                    <span class="text-slate-400 text-sm">—</span>
                  @endif
                </td>
                <td class="px-6 py-4">
                  <div class="flex items-center justify-center gap-2">
                    <button class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900 btn-view-player" 
                      data-player="{{ json_encode($player) }}" title="View Details">
                      <span class="material-symbols-outlined text-lg">visibility</span>
                    </button>
                    <button class="p-2 hover:bg-slate-200 rounded transition-colors text-slate-500 hover:text-slate-900 btn-edit-player" 
                      data-player="{{ json_encode($player) }}" title="Edit">
                      <span class="material-symbols-outlined text-lg">edit</span>
                    </button>
                  </div>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="9" class="px-6 py-8 text-center text-slate-500 font-body-sm">
                  <span class="material-symbols-outlined text-4xl mb-2 text-slate-300">group_off</span>
                  <p>No players registered yet.</p>
                </td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
        <!-- Modern Pagination Shell -->
        <div class="px-6 py-4 bg-slate-50/50 border-t border-slate-200">
          {{ $players->links('pagination::tailwind') }}
        </div>
      </div>
    </div>
  </main>


  <!-- View Modal -->
  <div id="viewModal" class="fixed inset-0 z-[100] hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-3xl overflow-hidden flex flex-col max-h-[90vh]">
      <div class="flex items-center justify-between p-6 border-b border-slate-100 bg-slate-50">
        <h3 class="font-h3 text-slate-900 flex items-center gap-2">
          <span class="material-symbols-outlined text-amber-500">person</span> Player Details
        </h3>
        <button class="text-slate-400 hover:text-slate-700 transition-colors close-modal">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      <div class="p-6 overflow-y-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6" id="viewModalContent">
          <!-- Filled by JS -->
        </div>
      </div>
      <div class="p-6 border-t border-slate-100 bg-slate-50 flex justify-end">
        <button class="px-4 py-2 bg-slate-200 text-slate-700 rounded hover:bg-slate-300 transition-colors close-modal font-label-md">Close</button>
      </div>
    </div>
  </div>

  <!-- Edit Modal -->
  <div id="editModal" class="fixed inset-0 z-[100] hidden bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl overflow-hidden flex flex-col max-h-[90vh]">
      <div class="flex items-center justify-between p-6 border-b border-slate-100 bg-slate-50">
        <h3 class="font-h3 text-slate-900 flex items-center gap-2">
          <span class="material-symbols-outlined text-amber-500">edit_square</span> Edit Player
        </h3>
        <button class="text-slate-400 hover:text-slate-700 transition-colors close-modal">
          <span class="material-symbols-outlined">close</span>
        </button>
      </div>
      <div class="p-6 overflow-y-auto">
        <form id="editForm" method="POST" action="">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">First Name</label>
              <input type="text" name="first_name" id="edit_first_name" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0" required>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Last Name</label>
              <input type="text" name="last_name" id="edit_last_name" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0">
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
              <input type="text" name="phone_number" id="edit_phone_number" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0" required>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">Player Role</label>
              <select name="player_role" id="edit_player_role" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0" required>
                <option value="Batsman">Batsman</option>
                <option value="Bowler">Bowler</option>
                <option value="All Rounder">All-Rounder</option>
                <option value="Wicket Keeper">Wicket Keeper</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">State</label>
              <input type="text" name="state" id="edit_state" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0" required>
            </div>
            <div>
              <label class="block text-sm font-medium text-slate-700 mb-1">District</label>
              <input type="text" name="district" id="edit_district" class="w-full border-slate-200 rounded font-body-sm focus:border-amber-400 focus:ring-0" required>
            </div>
            <!-- Gender and Payment Status are explicitly omitted from editable fields per user request -->
          </div>
        </form>
      </div>
      <div class="p-6 border-t border-slate-100 bg-slate-50 flex justify-end gap-3">
        <button type="button" class="px-4 py-2 bg-slate-200 text-slate-700 rounded hover:bg-slate-300 transition-colors close-modal font-label-md">Cancel</button>
        <button type="submit" form="editForm" class="px-6 py-2 bg-amber-400 text-slate-950 rounded hover:bg-amber-300 transition-colors font-label-md shadow-sm">Save Changes</button>
      </div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Modal Logic
      const viewModal = document.getElementById('viewModal');
      const editModal = document.getElementById('editModal');
      const closeBtns = document.querySelectorAll('.close-modal');

      closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          viewModal.classList.add('hidden');
          editModal.classList.add('hidden');
        });
      });

      // View Buttons
      document.querySelectorAll('.btn-view-player').forEach(btn => {
        btn.addEventListener('click', function() {
          const player = JSON.parse(this.getAttribute('data-player'));
          
          let content = `
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Full Name</p>
              <p class="font-medium text-slate-900">${player.first_name || ''} ${player.last_name || ''}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Player ID</p>
              <p class="font-medium text-slate-900">${player.player_id || 'N/A'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Gender</p>
              <p class="font-medium text-slate-900">${player.gender || 'N/A'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Date of Birth</p>
              <p class="font-medium text-slate-900">${player.dob ? new Date(player.dob).toLocaleDateString() : 'N/A'} (${player.age_category || 'N/A'})</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Contact</p>
              <p class="font-medium text-slate-900">${player.phone_number || 'N/A'} ${player.alternate_phone_number ? ' / ' + player.alternate_phone_number : ''}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Parents</p>
              <p class="font-medium text-slate-900">Father: ${player.father_name || 'N/A'} <br> Mother: ${player.mother_name || 'N/A'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Role / Style</p>
              <p class="font-medium text-slate-900">${player.player_role || 'N/A'}</p>
              <p class="text-sm text-slate-500">${player.batting_style ? 'Bat: ' + player.batting_style : ''} ${player.bowling_style ? '| Bowl: ' + player.bowling_style : ''}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Location</p>
              <p class="font-medium text-slate-900">${player.district || 'N/A'}, ${player.state || 'N/A'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Trial Location</p>
              <p class="font-medium text-slate-900">${player.trial_district || 'N/A'}, ${player.trial_state || 'N/A'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Payment Status</p>
              <p class="font-medium ${player.payment_status === 'completed' ? 'text-green-600' : 'text-amber-600'}">${player.payment_status || 'Pending'}</p>
            </div>
            <div>
              <p class="text-xs text-slate-500 uppercase tracking-wider mb-1">Amount Paid</p>
              <p class="font-medium text-slate-900">${player.payment_amount ? '₹' + Number(player.payment_amount).toLocaleString('en-IN') : '—'}</p>
            </div>
          `;
          
          document.getElementById('viewModalContent').innerHTML = content;
          viewModal.classList.remove('hidden');
        });
      });

      // Edit Buttons
      document.querySelectorAll('.btn-edit-player').forEach(btn => {
        btn.addEventListener('click', function() {
          const player = JSON.parse(this.getAttribute('data-player'));
          
          document.getElementById('edit_first_name').value = player.first_name || '';
          document.getElementById('edit_last_name').value = player.last_name || '';
          document.getElementById('edit_phone_number').value = player.phone_number || '';
          document.getElementById('edit_player_role').value = player.player_role || '';
          document.getElementById('edit_state').value = player.state || '';
          document.getElementById('edit_district').value = player.district || '';
          
          // Set form action dynamically
          document.getElementById('editForm').action = `/player/${player.id}/update`;
          
          editModal.classList.remove('hidden');
        });
      });
    });
  </script>
@endsection