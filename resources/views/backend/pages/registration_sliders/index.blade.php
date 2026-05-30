@extends('backend.layouts.main')

@section('title', 'Registration Sliders Hub')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Registration Sliders</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage banners for the Player Registration page</p>
            </div>
            <button onclick="openDrawer()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">add_photo_alternate</span>
                Add New Slider
            </button>
        </div>

        <!-- Sliders Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @forelse($sliders as $slider)
            <div class="group bg-white border border-slate-200 rounded-[2.5rem] p-4 sm:p-5 transition-all duration-500 hover:shadow-2xl hover:shadow-slate-200 hover:-translate-y-2 relative overflow-hidden">
                
                <!-- Status Badge -->
                <div class="absolute top-6 right-6 z-10">
                    <button onclick="toggleStatus({{ $slider->id }})" class="w-8 h-8 rounded-full flex items-center justify-center transition-colors {{ $slider->status ? 'bg-green-50 text-green-600' : 'bg-slate-50 text-slate-300' }}">
                        <span class="material-symbols-outlined text-sm">{{ $slider->status ? 'visibility' : 'visibility_off' }}</span>
                    </button>
                </div>

                <!-- Slider Image -->
                <div class="relative aspect-[16/9] rounded-[2rem] overflow-hidden mb-6 shadow-inner bg-slate-100 border border-slate-100">
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" class="w-full h-full object-cover">
                    <div class="absolute bottom-4 left-4 px-3 py-1 bg-black/60 backdrop-blur-md text-white text-[9px] font-black rounded-lg border border-white/10 uppercase tracking-widest">
                        SEQ #{{ $slider->order }}
                    </div>
                </div>

                <div class="flex items-center gap-2 px-1">
                    <button onclick="editSlider({{ $slider->id }})" class="flex-1 bg-slate-900 text-white py-3.5 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                        Edit Slider
                    </button>
                    <button onclick="deleteSlider({{ $slider->id }})" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all flex items-center justify-center">
                        <span class="material-symbols-outlined text-sm">delete</span>
                    </button>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 bg-white border-2 border-dashed border-slate-100 rounded-[2.5rem] text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-4 opacity-50">no_photography</span>
                <p class="text-slate-400 text-[10px] font-black uppercase tracking-widest italic opacity-50">No registration banners added yet</p>
            </div>
            @endforelse
        </div>

        @if($sliders->hasPages())
        <div class="mt-12">
            {{ $sliders->links() }}
        </div>
        @endif
    </div>

    <!-- Slide-over Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-slate-900/60 z-[999] hidden opacity-0 transition-opacity duration-300" onclick="closeDrawer()"></div>
    <div id="drawer" class="fixed top-0 right-0 h-full w-full max-w-xl bg-white z-[1000] translate-x-full transition-transform duration-500 shadow-2xl overflow-y-auto scrollbar-hide">
        <div class="p-8 sm:p-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 id="drawerTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">Add Banner</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest opacity-60">Upload high-quality banner for player registration</p>
                </div>
                <button onclick="closeDrawer()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="sliderForm" class="space-y-8" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="slider_id" name="slider_id">

                <div class="relative group">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Banner Asset</label>
                    <div id="imagePlaceholder" class="w-full aspect-[16/9] bg-slate-50 rounded-[2rem] border-2 border-dashed border-slate-200 flex flex-col items-center justify-center gap-4 transition-all hover:bg-slate-100 cursor-pointer overflow-hidden relative group">
                        <img id="imagePreview" src="" class="absolute inset-0 w-full h-full object-cover hidden">
                        <div id="placeholderContent" class="text-center group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-4xl text-slate-300 group-hover:text-amber-400 transition-colors">cloud_upload</span>
                            <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest mt-2">Click to upload banner</p>
                            <p class="text-[8px] text-slate-300 font-bold mt-1 uppercase tracking-tighter italic">Recommended: 16:9 Aspect Ratio</p>
                        </div>
                        <input type="file" name="image" id="imageInput" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Sequence Order</label>
                        <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Visibility</label>
                        <select name="status" id="status" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all appearance-none">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">verified</span>
                        Save Slider Banner
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
        $('#drawerTitle').text('Add Registration Slider');
        $('#sliderForm')[0].reset();
        $('#slider_id').val('');
        $('#imagePreview').addClass('hidden').attr('src', '');
        $('#placeholderContent').removeClass('hidden');
    }

    function closeDrawer() {
        $('#drawerOverlay').animate({opacity: 0}, 300, function() { $(this).addClass('hidden'); });
        $('#drawer').addClass('translate-x-full');
    }

    $('#imageInput').on('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) { 
                $('#imagePreview').removeClass('hidden').attr('src', e.target.result); 
                $('#placeholderContent').addClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    });

    $('#sliderForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#slider_id').val();
        const url = id ? `/registration-sliders/${id}/update` : '/registration-sliders';
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
                alert('Error occurred. Please check your image size (max 5MB).');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">publish</span> Save Slider Banner');
            }
        });
    });

    function editSlider(id) {
        $.get(`/registration-sliders/${id}/edit`, function(data) {
            console.log(data)
            openDrawer();
            $('#slider_id').val(data.id);
            $('#order').val(data.order);
            $('#status').val(data.status);
            if(data.image) {
                $('#imagePreview').removeClass('hidden').attr('src', `/storage/${data.image}`);
                $('#placeholderContent').addClass('hidden');
            }
            $('#drawerTitle').text('Edit Registration Slider');
        });
    }

    function deleteSlider(id) {
        if(confirm('Are you sure you want to delete this slider?')) {
            $.ajax({
                url: `/registration-sliders/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/registration-sliders/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
