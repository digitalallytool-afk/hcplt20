@extends('backend.layouts.main')

@section('title', 'Brand Ambassadors Management')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Face of the League</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage Brand Ambassadors & Cricket Legends</p>
            </div>
            <button onclick="openForm()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                Add New Ambassador
            </button>
        </div>

        <!-- Quick Form Section (Initially Hidden) -->
        <div id="formSection" class="hidden mb-12 animate-in fade-in slide-in-from-top duration-500">
            <div class="bg-white border-2 border-amber-400 rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-amber-50 relative overflow-hidden">
                <div class="absolute top-4 right-4 sm:top-8 sm:right-8">
                    <button onclick="closeForm()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <h3 id="formTitle" class="text-xl font-black text-slate-900 mb-8 uppercase tracking-tight">Add Ambassador Details</h3>
                
                <form id="ambassadorForm" class="grid grid-cols-1 lg:grid-cols-12 gap-8 sm:gap-10">
                    @csrf
                    <input type="hidden" id="ambassador_id" name="ambassador_id">
                    
                    <div class="lg:col-span-3">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Portrait / Image</label>
                        <div class="group relative w-full aspect-square bg-slate-50 rounded-[2rem] overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center gap-2" onclick="document.getElementById('imageInput').click()">
                            <img id="previewImage" class="absolute inset-0 w-full h-full object-cover hidden">
                            <span class="material-symbols-outlined text-4xl text-slate-300 group-hover:text-amber-400 transition-colors">add_a_photo</span>
                            <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Upload Portrait</p>
                            <input type="file" name="image" id="imageInput" class="hidden" onchange="previewFile(this)">
                        </div>
                    </div>

                    <div class="lg:col-span-9 space-y-8">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8">
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Full Name</label>
                                <input type="text" name="name" id="name" placeholder="e.g. Kapil Dev" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Designation / Role</label>
                                <input type="text" name="designation" id="designation" placeholder="e.g. Chief Guest / Legend" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 sm:gap-8">
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Display Order</label>
                                <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" id="saveBtn" class="w-full sm:w-auto bg-slate-900 text-white px-10 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-slate-200 flex items-center justify-center gap-3 hover:bg-amber-400 hover:text-slate-900 transition-all active:scale-95">
                                <span class="material-symbols-outlined text-[18px]">how_to_reg</span>
                                Confirm & Save Profile
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Ambassadors Masonry Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
            @forelse($ambassadors as $person)
            <div class="group relative aspect-[3/4] rounded-[2.5rem] overflow-hidden bg-slate-100 border border-slate-200 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-slate-300">
                <!-- Background Image -->
                @if($person->image)
                    <img src="{{ asset('storage/' . $person->image) }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="absolute inset-0 flex items-center justify-center bg-slate-200">
                        <span class="material-symbols-outlined text-6xl text-slate-300">person</span>
                    </div>
                @endif
                
                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent opacity-80 group-hover:opacity-90 transition-opacity"></div>
                
                <!-- Content -->
                <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="w-1.5 h-1.5 bg-amber-400 rounded-full"></span>
                        <span class="text-[9px] font-black text-amber-400 uppercase tracking-widest">{{ $person->designation ?? 'AMBASSADOR' }}</span>
                    </div>
                    <h3 class="text-xl sm:text-2xl font-black text-white mb-6 leading-tight uppercase tracking-tight">{{ $person->name }}</h3>
                    
                    <!-- Hover Actions -->
                    <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                        <button onclick="editAmbassador({{ $person->id }})" class="flex-1 bg-slate-900/80 border border-white/20 text-white py-3 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                            Edit Profile
                        </button>
                        <button onclick="deleteAmbassador({{ $person->id }})" class="w-12 h-12 bg-slate-900/80 border border-white/20 text-white rounded-xl hover:bg-red-500 hover:border-red-500 transition-all flex items-center justify-center">
                            <span class="material-symbols-outlined text-lg">delete</span>
                        </button>
                        <button onclick="toggleStatus({{ $person->id }})" class="w-12 h-12 bg-slate-900/80 border border-white/20 rounded-xl transition-all flex items-center justify-center {{ $person->status ? 'text-green-400' : 'text-slate-400' }}">
                            <span class="material-symbols-outlined text-lg">{{ $person->status ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                    </div>
                </div>

                <!-- Order Badge -->
                <div class="absolute top-6 left-6 w-8 h-8 bg-slate-900/60 border border-white/20 rounded-full flex items-center justify-center text-[10px] font-black text-white">
                    #{{ $person->order }}
                </div>
            </div>
            @empty
            <div class="col-span-full py-32 bg-white border-2 border-dashed border-slate-100 rounded-[3rem] text-center">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-6">
                    <span class="material-symbols-outlined text-4xl text-slate-300 opacity-50">account_circle</span>
                </div>
                <h3 class="text-xl font-black text-slate-900 mb-2 uppercase">No Ambassadors Yet</h3>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest italic opacity-50 mb-8">Ready to showcase the faces of HCPL?</p>
                <button onclick="openForm()" class="bg-amber-400 text-slate-900 px-8 py-4 rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-amber-300 transition-all shadow-xl shadow-amber-100">
                    Register First Ambassador
                </button>
            </div>
            @endforelse
        </div>

        @if($ambassadors->hasPages())
        <div class="mt-12">
            {{ $ambassadors->links() }}
        </div>
        @endif
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openForm() {
        $('#formSection').removeClass('hidden');
        $('#formTitle').text('Register New Ambassador');
        $('#ambassadorForm')[0].reset();
        $('#ambassador_id').val('');
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

    $('#ambassadorForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#ambassador_id').val();
        const url = id ? `/ambassadors/${id}/update` : '/ambassadors';
        const formData = new FormData(this);

        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin text-lg">sync</span> Saving Profile...');

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
                alert('Something went wrong. Please check inputs.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined text-lg">how_to_reg</span> Confirm & Save Profile');
            }
        });
    });

    function editAmbassador(id) {
        $.get(`/ambassadors/${id}/edit`, function(data) {
            $('#ambassador_id').val(data.id);
            $('#name').val(data.name);
            $('#designation').val(data.designation);
            $('#order').val(data.order);
            if (data.image) {
                $('#previewImage').attr('src', `/storage/${data.image}`).removeClass('hidden');
            }
            $('#formSection').removeClass('hidden');
            $('#formTitle').text('Edit Ambassador Profile');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    function deleteAmbassador(id) {
        if (confirm('Are you sure you want to remove this ambassador?')) {
            $.ajax({
                url: `/ambassadors/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    location.reload();
                }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/ambassadors/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
