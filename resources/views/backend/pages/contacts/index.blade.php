@extends('backend.layouts.main')

@section('title', 'Contact Messages')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="mb-8">
            <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Enquiries</h1>
            <p class="text-slate-500 text-xs font-bold flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                Direct messages from the Contact Us page
            </p>
        </div>

        <div class="bg-white rounded-[2rem] border border-slate-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full text-left border-collapse min-w-[800px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Date</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Sender</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400">Contact Info</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 text-center">Status</th>
                            <th class="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-slate-400 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($messages as $msg)
                        <tr class="hover:bg-slate-50/30 transition-colors {{ !$msg->is_read ? 'bg-amber-50/30' : '' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-[10px] font-black text-slate-500 uppercase">{{ $msg->created_at->format('d M, Y') }}</span>
                                <br>
                                <span class="text-[9px] font-bold text-slate-400 uppercase">{{ $msg->created_at->format('h:i A') }}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-lg bg-slate-100 flex items-center justify-center text-slate-500 font-black text-xs uppercase">
                                        {{ substr($msg->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-xs font-black text-slate-900 uppercase tracking-tight">{{ $msg->name }}</p>
                                        @if(!$msg->is_read)
                                            <span class="inline-block px-1.5 py-0.5 bg-amber-400 text-[7px] font-black text-slate-900 uppercase rounded mt-1">New</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <p class="text-[10px] font-bold text-slate-600 mb-0.5 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[12px]">mail</span>
                                    {{ $msg->email }}
                                </p>
                                <p class="text-[9px] font-bold text-slate-400 flex items-center gap-2">
                                    <span class="material-symbols-outlined text-[12px]">call</span>
                                    {{ $msg->phone ?? 'N/A' }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <span class="px-3 py-1 rounded-full text-[9px] font-black uppercase tracking-widest border {{ $msg->status == 'Completed' ? 'bg-green-50 text-green-600 border-green-100' : ($msg->status == 'In Progress' ? 'bg-amber-50 text-amber-600 border-amber-100' : 'bg-slate-50 text-slate-500 border-slate-100') }}">
                                    {{ $msg->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="viewMessage({{ $msg->id }})" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-white rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">edit_note</span>
                                    </button>
                                    <button onclick="deleteMessage({{ $msg->id }})" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center text-[10px] font-black uppercase tracking-widest text-slate-300 italic">No messages found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($messages->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $messages->links() }}
            </div>
            @endif
        </div>
    </div>
</main>

<!-- Message Modal -->
<div id="messageModal" class="hidden fixed inset-0 z-[100] flex items-center justify-center p-4">
    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeModal()"></div>
    <div class="relative w-full max-w-2xl bg-white rounded-[2.5rem] shadow-2xl overflow-hidden animate-in zoom-in duration-300">
        <div class="p-8 border-b border-slate-100 flex items-center justify-between">
            <h3 class="text-xl font-black text-slate-900">Enquiry Management</h3>
            <button onclick="closeModal()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="updateLeadForm">
            @csrf
            @method('PATCH')
            <input type="hidden" id="modalMessageId">
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-2 gap-8">
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">From</label>
                        <p id="modalName" class="text-lg font-black text-slate-900"></p>
                        <p id="modalEmail" class="text-sm font-bold text-slate-500"></p>
                        <p id="modalPhone" class="text-sm font-bold text-slate-500"></p>
                    </div>
                    <div>
                        <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Lead Status</label>
                        <select name="status" id="modalStatus" class="w-full bg-slate-50 border border-slate-100 rounded-xl px-4 py-3 text-xs font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            <option value="Pending">Pending</option>
                            <option value="In Progress">In Progress</option>
                            <option value="Completed">Completed</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Customer Message</label>
                    <div id="modalMessage" class="bg-slate-50 rounded-2xl p-6 text-sm leading-relaxed text-slate-600 font-medium italic"></div>
                </div>
                <div>
                    <label class="text-[10px] font-black uppercase tracking-widest text-slate-400 block mb-2">Internal Remarks</label>
                    <textarea name="remarks" id="modalRemarks" rows="3" class="w-full bg-white border border-slate-200 rounded-2xl px-4 py-3 text-xs font-bold text-slate-900 focus:border-amber-400 outline-none transition-all" placeholder="Enter follow-up notes..."></textarea>
                </div>
            </div>
            <div class="p-8 bg-slate-50 border-t border-slate-100 flex justify-between items-center">
                <p class="text-[9px] font-bold text-slate-400 uppercase">Received: <span id="modalDate"></span></p>
                <div class="flex gap-3">
                    <button type="button" onclick="closeModal()" class="px-6 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest text-slate-400 hover:text-slate-900 transition-all">Cancel</button>
                    <button type="submit" id="updateBtn" class="bg-slate-900 text-white px-8 py-3 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all shadow-lg shadow-slate-200">Update Lead</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function viewMessage(id) {
        $.get(`/contacts/${id}`, function(data) {
            $('#modalMessageId').val(data.id);
            $('#modalName').text(data.name);
            $('#modalEmail').text(data.email);
            $('#modalPhone').text(data.phone || 'N/A');
            $('#modalDate').text(new Date(data.created_at).toLocaleString());
            $('#modalMessage').text(data.message);
            $('#modalStatus').val(data.status || 'Pending');
            $('#modalRemarks').val(data.remarks || '');
            $('#messageModal').removeClass('hidden');
        });
    }

    $('#updateLeadForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#modalMessageId').val();
        
        $('#updateBtn').prop('disabled', true).html('Updating...');

        $.ajax({
            url: `/contacts/${id}/update`,
            method: 'PATCH',
            data: $(this).serialize(),
            success: function(res) {
                location.reload();
            },
            error: function() {
                alert('Error updating lead.');
                $('#updateBtn').prop('disabled', false).html('Update Lead');
            }
        });
    });

    function closeModal() {
        $('#messageModal').addClass('hidden');
    }

    function deleteMessage(id) {
        if (confirm('Are you sure you want to delete this message?')) {
            $.ajax({
                url: `/contacts/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    location.reload();
                }
            });
        }
    }
</script>
@endsection
