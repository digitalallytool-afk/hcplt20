@extends('backend.layouts.main')

@section('title', 'Management Team Hub')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Our Team / Management Hub</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage the leadership team and structure</p>
            </div>
            <button onclick="openDrawer()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">person_add</span>
                Add New Member
            </button>
        </div>

        <!-- Management Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
            @forelse($members as $member)
            <div class="group bg-white border border-slate-200 rounded-[2.5rem] p-6 transition-all duration-500 hover:shadow-2xl hover:shadow-slate-200 hover:-translate-y-2 relative overflow-hidden text-center">
                
                <!-- Status Badge -->
                <div class="absolute top-4 right-4">
                    <button onclick="toggleStatus({{ $member->id }})" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors {{ $member->status ? 'bg-green-50 text-green-600' : 'bg-slate-100 text-slate-400' }}">
                        <span class="material-symbols-outlined text-sm">{{ $member->status ? 'check_circle' : 'block' }}</span>
                    </button>
                </div>

                <!-- Profile Image -->
                <div class="relative mx-auto w-24 h-24 sm:w-32 sm:h-32 mb-6">
                    <div class="w-full h-full rounded-full overflow-hidden border-4 border-slate-50 shadow-inner">
                        @if($member->image)
                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('frontend/images/default-avatar.png') }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                        @endif
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-8 h-8 sm:w-10 sm:h-10 bg-amber-400 border-4 border-white rounded-full flex items-center justify-center text-[10px] font-black text-slate-900 shadow-sm">
                        #{{ $member->order }}
                    </div>
                </div>

                <h3 class="text-sm sm:text-base font-black text-slate-900 mb-1 leading-tight uppercase tracking-tight">{{ $member->name }}</h3>
                <p class="text-[10px] font-black text-amber-600 uppercase tracking-widest mb-6 opacity-80">{{ $member->designation }}</p>

                <div class="flex items-center gap-2">
                    <button onclick="editMember({{ $member->id }})" class="flex-1 bg-slate-900 text-white py-3 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                        Edit Profile
                    </button>
                    <button onclick="deleteMember({{ $member->id }})" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 bg-white border-2 border-dashed border-slate-100 rounded-[2.5rem] text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-4 opacity-50">group_off</span>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest italic opacity-50">No team members added yet</p>
            </div>
            @endforelse
        </div>

        @if($members->hasPages())
        <div class="mt-12">
            {{ $members->links() }}
        </div>
        @endif
    </div>

    <!-- Slide-over Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-slate-900/60 z-[999] hidden opacity-0 transition-opacity duration-300" onclick="closeDrawer()"></div>
    <div id="drawer" class="fixed top-0 right-0 h-full w-full max-w-xl bg-white z-[1000] translate-x-full transition-transform duration-500 shadow-2xl overflow-y-auto scrollbar-hide">
        <div class="p-8 sm:p-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 id="drawerTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">Add Team Member</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest opacity-60">Enter details for the management leadership team</p>
                </div>
                <button onclick="closeDrawer()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="memberForm" class="space-y-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="member_id" name="member_id">

                <div class="relative group text-center mb-12">
                    <div class="relative w-32 h-32 sm:w-40 sm:h-40 mx-auto group">
                        <img id="imagePreview" src="{{ asset('frontend/images/default-avatar.png') }}" class="w-full h-full object-cover rounded-full border-8 border-slate-50 shadow-2xl">
                        <label class="absolute inset-0 flex items-center justify-center bg-slate-900/40 rounded-full opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                            <span class="material-symbols-outlined text-white text-3xl">photo_camera</span>
                            <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">
                        </label>
                    </div>
                    <p class="mt-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Profile Picture (Max 2MB)</p>
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Full Name</label>
                    <input type="text" name="name" id="name" placeholder="e.g. Monika" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Designation</label>
                    <input type="text" name="designation" id="designation" placeholder="e.g. Founder & Managing Director" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Display Order</label>
                        <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Status</label>
                        <select name="status" id="status" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all appearance-none">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">save_as</span>
                        Save Member Profile
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
        $('#drawerTitle').text('Add Team Member');
        $('#memberForm')[0].reset();
        $('#member_id').val('');
        $('#imagePreview').attr('src', '{{ asset('frontend/images/default-avatar.png') }}');
    }

    function closeDrawer() {
        $('#drawerOverlay').animate({opacity: 0}, 300, function() { $(this).addClass('hidden'); });
        $('#drawer').addClass('translate-x-full');
    }

    $('#imageInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) { $('#imagePreview').attr('src', e.target.result); }
            reader.readAsDataURL(file);
        }
    });

    $('#memberForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#member_id').val();
        const url = id ? `/management/${id}/update` : '/management';
        const formData = new FormData(this);
        
        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin">sync</span> Saving...');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function() { location.reload(); },
            error: function() {
                alert('Error occurred. Please check your data.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">save_as</span> Save Member Profile');
            }
        });
    });

    function editMember(id) {
        $.get(`/management/${id}/edit`, function(data) {
            openDrawer();
            $('#member_id').val(data.id);
            $('#name').val(data.name);
            $('#designation').val(data.designation);
            $('#order').val(data.order);
            $('#status').val(data.status);
            if(data.image) $('#imagePreview').attr('src', `/storage/${data.image}`);
            $('#drawerTitle').text('Edit Team Member');
        });
    }

    function deleteMember(id) {
        if(confirm('Are you sure you want to delete this member?')) {
            $.ajax({
                url: `/management/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/management/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
