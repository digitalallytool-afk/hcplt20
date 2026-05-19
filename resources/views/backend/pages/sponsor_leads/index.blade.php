@extends('backend.layouts.main')

@section('title', 'Sponsor Registration Leads')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="mb-8 text-center sm:text-left">
            <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Sponsor Leads Hub</h1>
            <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Review brand partnerships and inquiries</p>
        </div>

        <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden shadow-sm">
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full text-left border-collapse min-w-[900px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Brand / Category</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Contact Info</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Budget</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400">Status</th>
                            <th class="px-6 py-4 font-black text-[10px] uppercase tracking-widest text-slate-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($leads as $lead)
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-black text-slate-900 text-sm uppercase tracking-tight mb-0.5">{{ $lead->company_name }}</div>
                                <div class="text-[9px] font-bold text-amber-600 uppercase tracking-widest">{{ $lead->category }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-[11px] font-black text-slate-900 mb-0.5 uppercase tracking-tighter">{{ $lead->contact_person }}</div>
                                <div class="text-[10px] font-bold text-slate-400">{{ $lead->phone_number }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-[11px] font-black text-green-600 mb-0.5 uppercase tracking-tighter">₹ {{ number_format($lead->budget) }}</div>
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-tight">{{ $lead->city_region ?? 'N/A' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @php
                                    $statusClasses = [
                                        'Pending' => 'bg-amber-50 text-amber-600 border-amber-100',
                                        'Contacted' => 'bg-blue-50 text-blue-600 border-blue-100',
                                        'Interested' => 'bg-green-50 text-green-600 border-green-100',
                                        'Rejected' => 'bg-red-50 text-red-600 border-red-100',
                                    ];
                                    $class = $statusClasses[$lead->status] ?? 'bg-slate-50 text-slate-600 border-slate-100';
                                @endphp
                                <span class="px-3 py-1 border rounded-lg text-[9px] font-black uppercase tracking-widest {{ $class }}">
                                    {{ $lead->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="viewLead({{ $lead->id }})" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-white rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                    <button onclick="deleteLead({{ $lead->id }})" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <span class="material-symbols-outlined text-5xl text-slate-200 mb-4 opacity-50">handshake</span>
                                <p class="text-slate-400 font-black uppercase tracking-widest text-[10px] italic opacity-50">No sponsorship inquiries received yet</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($leads->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $leads->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Details Modal -->
    <div id="leadModal" class="fixed inset-0 bg-slate-900/60 z-[999] hidden flex items-start justify-center p-6 overflow-y-auto pt-10">
        <div class="bg-white w-full max-w-5xl rounded-[3rem] shadow-2xl relative mb-10 animate-in zoom-in duration-300">
            <button onclick="closeModal()" class="absolute top-8 right-8 w-12 h-12 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center hover:bg-slate-100 transition-all">
                <span class="material-symbols-outlined">close</span>
            </button>
            
            <div class="p-10 sm:p-14">
                <div class="flex items-center gap-6 mb-12 border-b border-slate-50 pb-8">
                    <div class="w-20 h-20 bg-amber-400 rounded-[2rem] flex items-center justify-center text-slate-900">
                        <span class="material-symbols-outlined text-4xl">loyalty</span>
                    </div>
                    <div>
                        <h3 id="modalCompanyName" class="text-3xl font-black text-slate-900 uppercase tracking-tight mb-1">Company Name</h3>
                        <div class="flex items-center gap-3">
                            <span id="modalCategory" class="text-xs font-bold text-amber-500 uppercase tracking-widest">Sponsorship Category</span>
                            <span class="text-slate-200">|</span>
                            <span id="modalCreatedAt" class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Received on ---</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-10">
                    <div class="col-span-12 lg:col-span-8 space-y-12">
                        <!-- Info Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-6">
                            <div class="bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 block">Contact Person</label>
                                <div id="modalContact" class="font-bold text-slate-900 truncate">---</div>
                            </div>
                            <div class="bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 block">Phone</label>
                                <div id="modalPhone" class="font-bold text-slate-900 truncate">---</div>
                            </div>
                            <div class="bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 block">Email</label>
                                <div id="modalEmail" class="font-bold text-slate-900 truncate">---</div>
                            </div>
                            <div class="bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 block">Location</label>
                                <div id="modalLocation" class="font-bold text-slate-900">---</div>
                            </div>
                            <div class="bg-green-50/50 p-5 rounded-2xl border border-green-100/50">
                                <label class="text-[9px] font-black text-green-600 uppercase tracking-widest mb-1 block">Budget</label>
                                <div id="modalBudget" class="font-black text-green-700 text-lg">---</div>
                            </div>
                            <div class="bg-slate-50/50 p-5 rounded-2xl border border-slate-100">
                                <label class="text-[9px] font-black text-slate-400 uppercase tracking-widest mb-1 block">Lead Source</label>
                                <div id="modalSource" class="font-bold text-slate-900 truncate">---</div>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="bg-slate-50/50 p-8 rounded-[2.5rem]">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest mb-4 block underline decoration-amber-400 decoration-2 underline-offset-4">Comments & Requirements</label>
                            <div id="modalComments" class="text-slate-600 leading-relaxed font-medium">---</div>
                        </div>
                    </div>

                    <!-- Sidebar Admin -->
                    <div class="col-span-12 lg:col-span-4 lg:border-l lg:border-slate-100 lg:pl-10">
                        <div class="sticky top-0 space-y-8">
                            <div class="p-8 bg-slate-950 rounded-[2.5rem] shadow-2xl">
                                <h5 class="text-white font-black text-sm uppercase tracking-widest mb-8 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-amber-400">shield_person</span>
                                    Sponsor Status
                                </h5>
                                
                                <form id="updateStatusForm" class="space-y-6">
                                    @csrf
                                    <input type="hidden" id="modalLeadId" name="lead_id">
                                    
                                    <div class="space-y-2">
                                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Process Step</label>
                                        <select name="status" id="modalStatus" class="w-full bg-slate-900 border border-slate-800 rounded-2xl px-5 py-4 text-sm font-black text-white focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all appearance-none cursor-pointer">
                                            <option value="Pending">Pending Review</option>
                                            <option value="Contacted">Contacted</option>
                                            <option value="Interested">High Potential</option>
                                            <option value="Rejected">Rejected</option>
                                        </select>
                                    </div>

                                    <div class="space-y-2">
                                        <label class="text-[10px] font-black text-slate-500 uppercase tracking-widest ml-1">Admin Remarks</label>
                                        <textarea name="remarks" id="modalRemarks" rows="6" placeholder="Internal notes here..." class="w-full bg-slate-900 border border-slate-800 rounded-2xl px-5 py-4 text-sm font-medium text-white focus:border-amber-400 focus:ring-4 focus:ring-amber-400/10 outline-none transition-all resize-none"></textarea>
                                    </div>

                                    <button type="submit" id="updateBtn" class="w-full bg-amber-400 text-slate-950 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-amber-400/10 hover:bg-amber-300 transition-all flex items-center justify-center gap-3">
                                        <span class="material-symbols-outlined text-sm">save_as</span>
                                        Save Changes
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function viewLead(id) {
        $.get(`/sponsor-leads/${id}`, function(data) {
            $('#modalLeadId').val(data.id);
            $('#modalCompanyName').text(data.company_name || 'N/A');
            $('#modalCategory').text(data.category || 'N/A');
            $('#modalContact').text(data.contact_person || 'N/A');
            $('#modalPhone').text(data.phone_number || 'N/A');
            $('#modalEmail').text(data.email || 'N/A');
            $('#modalLocation').text(data.city_region || 'N/A');
            $('#modalBudget').text('₹ ' + (parseInt(data.budget).toLocaleString() || '0'));
            $('#modalSource').text(data.hear_about_us || 'N/A');
            $('#modalComments').text(data.comments || 'No comments provided');
            $('#modalStatus').val(data.status);
            $('#modalRemarks').val(data.remarks);
            
            const date = new Date(data.created_at);
            $('#modalCreatedAt').text('Received on ' + date.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }));

            $('#leadModal').removeClass('hidden');
            $('body').addClass('overflow-hidden');
        });
    }

    function closeModal() {
        $('#leadModal').addClass('hidden');
        $('body').removeClass('overflow-hidden');
    }

    $('#updateStatusForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#modalLeadId').val();
        const btn = $('#updateBtn');
        const originalHtml = btn.html();

        btn.prop('disabled', true).html('<span class="material-symbols-outlined animate-spin">sync</span> Updating...');

        $.ajax({
            url: `/sponsor-leads/${id}/update`,
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                location.reload();
            },
            error: function() {
                alert('Update failed. Please try again.');
                btn.prop('disabled', false).html(originalHtml);
            }
        });
    });

    function deleteLead(id) {
        if(confirm('Are you sure you want to remove this inquiry?')) {
            $.ajax({
                url: `/sponsor-leads/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }
</script>
@endsection
