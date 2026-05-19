

 @extends('backend.layouts.main')

 @section('content')
    <main class="ml-[260px] pt-16 p-container-padding min-h-screen">
        <div class="max-w-7xl mx-auto space-y-gutter">
            <!-- Page Header -->
            <div class="flex justify-between items-end">
                <div>
                    <p class="font-label-sm text-secondary uppercase tracking-widest mb-1">Current Operations</p>
                    <h1 class="font-h1 text-on-surface">Live Match Control Center</h1>
                </div>
                <div class="flex gap-stack-sm">
                    <button
                        class="bg-surface-container-high text-primary px-4 py-2 rounded-lg font-label-md flex items-center gap-2 hover:bg-surface-variant transition-all border border-outline-variant">
                        <span class="material-symbols-outlined text-[20px]">filter_list</span>
                        Filters
                    </button>
                    <button
                        class="bg-primary text-on-primary px-4 py-2 rounded-lg font-label-md flex items-center gap-2 hover:opacity-90 transition-all">
                        <span class="material-symbols-outlined text-[20px]">add</span>
                        New Match
                    </button>
                </div>
            </div>
            <!-- Bento Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-gutter">
                <div class="bg-white border border-outline-variant rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-blue-50 rounded-lg">
                            <span class="material-symbols-outlined text-blue-600">sports_cricket</span>
                        </div>
                        <span class="text-green-600 text-xs font-bold flex items-center">+2 Ongoing</span>
                    </div>
                    <p class="font-label-sm text-on-surface-variant mb-1">Live Matches</p>
                    <h3 class="font-display text-primary">04</h3>
                </div>
                <div class="bg-white border border-outline-variant rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-amber-50 rounded-lg">
                            <span class="material-symbols-outlined text-amber-600">pending_actions</span>
                        </div>
                        <span class="text-on-surface-variant text-xs font-bold">Today</span>
                    </div>
                    <p class="font-label-sm text-on-surface-variant mb-1">Scheduled</p>
                    <h3 class="font-display text-primary">12</h3>
                </div>
                <div class="bg-white border border-outline-variant rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-red-50 rounded-lg">
                            <span class="material-symbols-outlined text-red-600">warning</span>
                        </div>
                        <span class="text-red-600 text-xs font-bold">Critical</span>
                    </div>
                    <p class="font-label-sm text-on-surface-variant mb-1">Review Required</p>
                    <h3 class="font-display text-primary">01</h3>
                </div>
                <div class="bg-white border border-outline-variant rounded-xl p-5 shadow-sm">
                    <div class="flex justify-between items-start mb-4">
                        <div class="p-2 bg-slate-50 rounded-lg">
                            <span class="material-symbols-outlined text-slate-600">group</span>
                        </div>
                        <span class="text-green-600 text-xs font-bold">98% Presence</span>
                    </div>
                    <p class="font-label-sm text-on-surface-variant mb-1">Players Logged</p>
                    <h3 class="font-display text-primary">144</h3>
                </div>
            </div>
            <!-- Main Layout: Table + Side Panel -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter items-start">
                <!-- Match Management Table -->
                <div class="lg:col-span-2 bg-white border border-outline-variant rounded-xl shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-outline-variant flex justify-between items-center bg-slate-50/50">
                        <h3 class="font-h3 text-on-surface">Ongoing &amp; Upcoming Matches</h3>
                        <div class="flex gap-2">
                            <span
                                class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded text-xs font-bold">LIVE
                                SYNC ON</span>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-white border-b border-outline-variant">
                                    <th class="p-4 font-label-md text-on-surface-variant">Match Details</th>
                                    <th class="p-4 font-label-md text-on-surface-variant">Status</th>
                                    <th class="p-4 font-label-md text-on-surface-variant text-center">Score</th>
                                    <th class="p-4 font-label-md text-on-surface-variant text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4">
                                        <div class="flex flex-col">
                                            <span class="font-h3 text-sm mb-1">Warriors XI vs Titans CC</span>
                                            <span class="font-body-sm text-on-surface-variant">HCPL Ground A • 20
                                                Overs</span>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold animate-pulse">
                                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                                            LIVE - 1st Innings
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="font-data-tabular font-bold text-lg">142/4 (16.2)</div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <button
                                            class="bg-secondary text-on-secondary px-3 py-1.5 rounded font-label-sm hover:opacity-90 active:scale-95 transition-all">Update
                                            Score</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4">
                                        <div class="flex flex-col">
                                            <span class="font-h3 text-sm mb-1">Royal Kings vs Power Hitters</span>
                                            <span class="font-body-sm text-on-surface-variant">HCPL Ground B • 20
                                                Overs</span>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-bold">
                                            UPCOMING - 14:30
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="font-data-tabular text-on-surface-variant">- / -</div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <button
                                            class="bg-surface-container-high text-primary border border-outline-variant px-3 py-1.5 rounded font-label-sm hover:bg-surface-variant transition-all">Pre-Match</button>
                                    </td>
                                </tr>
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4">
                                        <div class="flex flex-col">
                                            <span class="font-h3 text-sm mb-1">Strikers United vs Lions CC</span>
                                            <span class="font-body-sm text-on-surface-variant">HCPL Ground C • 20
                                                Overs</span>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-red-100 text-red-700 rounded-full text-xs font-bold animate-pulse">
                                            <span class="w-1.5 h-1.5 bg-red-600 rounded-full"></span>
                                            LIVE - 2nd Innings
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <div class="font-data-tabular font-bold text-lg">98/2 (12.4)</div>
                                    </td>
                                    <td class="p-4 text-right">
                                        <button
                                            class="bg-secondary text-on-secondary px-3 py-1.5 rounded font-label-sm hover:opacity-90 active:scale-95 transition-all">Update
                                            Score</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Scoring Interface Panel (Simulated Detailed View) -->
                <div
                    class="bg-white border border-outline-variant rounded-xl shadow-md overflow-hidden ring-2 ring-secondary/20">
                    <div class="p-5 bg-primary text-on-primary">
                        <div class="flex justify-between items-center mb-2">
                            <span class="font-label-sm opacity-80">ACTIVE SCORING</span>
                            <span class="material-symbols-outlined text-amber-400">offline_bolt</span>
                        </div>
                        <h2 class="font-h2 mb-1">Warriors XI</h2>
                        <div class="flex items-baseline gap-2">
                            <span class="font-display text-4xl">142/4</span>
                            <span class="font-body-md opacity-80">(16.2 Ov)</span>
                        </div>
                    </div>
                    <div class="p-5 space-y-6">
                        <!-- Quick Stats Inputs -->
                        <div class="grid grid-cols-3 gap-3">
                            <div class="flex flex-col gap-1">
                                <label class="font-label-sm text-on-surface-variant">Runs</label>
                                <input
                                    class="w-full border-outline-variant focus:ring-secondary focus:border-secondary rounded bg-slate-50 font-data-tabular"
                                    type="number" value="142" />
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-label-sm text-on-surface-variant">Wickets</label>
                                <input
                                    class="w-full border-outline-variant focus:ring-secondary focus:border-secondary rounded bg-slate-50 font-data-tabular"
                                    type="number" value="4" />
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="font-label-sm text-on-surface-variant">Overs</label>
                                <input
                                    class="w-full border-outline-variant focus:ring-secondary focus:border-secondary rounded bg-slate-50 font-data-tabular"
                                    type="text" value="16.2" />
                            </div>
                        </div>
                        <!-- Player In-Bat Stats -->
                        <div class="space-y-4">
                            <h4 class="font-label-md text-primary flex items-center justify-between">
                                ON STRIKE
                                <span class="material-symbols-outlined text-sm text-secondary"
                                    style="font-variation-settings: 'FILL' 1;">star</span>
                            </h4>
                            <div class="p-4 bg-slate-50 border border-outline-variant rounded-lg space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="font-h3 text-sm">R. Sharma</span>
                                    <span class="font-data-tabular font-bold text-amber-600">54* (32)</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">4s</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="6" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">6s</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="3" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">B</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="32" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">SR</span>
                                        <div
                                            class="p-1 text-[10px] bg-white border border-outline-variant rounded text-center leading-tight">
                                            168.7</div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 bg-white border border-outline-variant rounded-lg space-y-3 opacity-70">
                                <div class="flex justify-between items-center">
                                    <span class="font-h3 text-sm">V. Kohli</span>
                                    <span class="font-data-tabular font-bold text-on-surface">22 (18)</span>
                                </div>
                                <div class="grid grid-cols-4 gap-2">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">4s</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="2" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">6s</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="0" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">B</span>
                                        <input class="p-1 text-xs border-outline-variant rounded text-center"
                                            type="number" value="18" />
                                    </div>
                                    <div class="flex flex-col gap-1">
                                        <span class="text-[10px] text-on-surface-variant font-bold">SR</span>
                                        <div
                                            class="p-1 text-[10px] bg-white border border-outline-variant rounded text-center leading-tight">
                                            122.2</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex flex-col gap-2 pt-4">
                            <button
                                class="w-full bg-secondary text-on-secondary py-3 rounded-lg font-h3 text-sm hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-secondary/10">Push
                                Update to Live</button>
                            <button
                                class="w-full bg-surface-container text-primary py-2 rounded-lg font-label-md text-xs hover:bg-surface-container-high transition-all">Undo
                                Last Action</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Recently Updated / Log -->
            <div class="bg-white border border-outline-variant rounded-xl shadow-sm p-6">
                <h4 class="font-label-md text-on-surface-variant mb-4 uppercase tracking-wider">Operational Audit Log
                </h4>
                <div class="space-y-4">
                    <div class="flex items-center gap-4 text-sm">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span class="font-data-tabular text-on-surface-variant">14:02:11</span>
                        <span class="font-body-sm"><span class="font-bold">Match ID #882</span>: Warriors XI score
                            updated to 142/4.</span>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                        <span class="font-data-tabular text-on-surface-variant">13:58:45</span>
                        <span class="font-body-sm"><span class="font-bold">System</span>: Auto-sync completed for all 4
                            live matches.</span>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <span class="w-2 h-2 bg-amber-500 rounded-full"></span>
                        <span class="font-data-tabular text-on-surface-variant">13:55:20</span>
                        <span class="font-body-sm"><span class="font-bold">R. Sharma</span> reaching 50 runs milestone
                            logged.</span>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Contextual FAB for Rapid Log -->
    <button
        class="fixed bottom-8 right-8 bg-primary text-on-primary w-14 h-14 rounded-full shadow-2xl flex items-center justify-center hover:scale-110 active:scale-95 transition-all z-50">
        <span class="material-symbols-outlined text-3xl">add_chart</span>
    </button>
@endsection