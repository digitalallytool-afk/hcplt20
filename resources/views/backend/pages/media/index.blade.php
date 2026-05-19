@extends('backend.layouts.main')

@section('title', 'Media Gallery')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Media Vault</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Manage Images & Video Highlights</p>
            </div>
            <button onclick="openForm()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">add_photo_alternate</span>
                Add New Media
            </button>
        </div>

        <!-- Media Form -->
        <div id="formSection" class="hidden mb-12 animate-in fade-in zoom-in duration-300">
            <div class="bg-white border border-slate-200 rounded-[2.5rem] p-6 sm:p-10 shadow-2xl shadow-slate-200 relative overflow-hidden">
                <div class="absolute top-4 right-4 sm:top-8 sm:right-8">
                    <button onclick="closeForm()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                
                <form id="mediaForm" class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                    @csrf
                    <input type="hidden" id="media_id" name="media_id">
                    
                    <div class="lg:col-span-4">
                        <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Media Type</label>
                        <div class="flex gap-4 mb-6">
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="type" value="image" class="hidden peer" checked onchange="toggleFields('image')">
                                <div class="p-4 rounded-2xl border-2 border-slate-100 text-center peer-checked:border-amber-400 peer-checked:bg-amber-50 transition-all">
                                    <span class="material-symbols-outlined block mb-1">image</span>
                                    <span class="text-[10px] font-black uppercase">Image</span>
                                </div>
                            </label>
                            <label class="flex-1 cursor-pointer">
                                <input type="radio" name="type" value="video" class="hidden peer" onchange="toggleFields('video')">
                                <div class="p-4 rounded-2xl border-2 border-slate-100 text-center peer-checked:border-amber-400 peer-checked:bg-amber-50 transition-all">
                                    <span class="material-symbols-outlined block mb-1">movie</span>
                                    <span class="text-[10px] font-black uppercase">Video</span>
                                </div>
                            </label>
                        </div>

                        <!-- Image Upload Field -->
                        <div id="imageField" class="space-y-4">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400">Select Image</label>
                            <div class="group relative w-full aspect-video bg-slate-50 rounded-2xl overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center gap-2" onclick="document.getElementById('fileInput').click()">
                                <img id="previewImg" class="absolute inset-0 w-full h-full object-cover hidden">
                                <span class="material-symbols-outlined text-4xl text-slate-300">upload</span>
                                <input type="file" name="file" id="fileInput" class="hidden" onchange="previewFile(this, '#previewImg')">
                            </div>
                        </div>

                        <!-- Video Thumbnail Field -->
                        <div id="videoField" class="hidden space-y-4">
                            <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400">Video Thumbnail</label>
                            <div class="group relative w-full aspect-video bg-slate-50 rounded-2xl overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center gap-2" onclick="document.getElementById('thumbInput').click()">
                                <img id="previewThumb" class="absolute inset-0 w-full h-full object-cover hidden">
                                <span class="material-symbols-outlined text-4xl text-slate-300">add_photo_alternate</span>
                                <input type="file" name="thumbnail" id="thumbInput" class="hidden" onchange="previewFile(this, '#previewThumb')">
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-span-8 space-y-8">
                        <div class="grid grid-cols-1 gap-8">
                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Media Title / Caption</label>
                                <input type="text" name="title" id="title" placeholder="e.g. Opening Ceremony 2026" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>
                            
                            <div id="urlField" class="hidden relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Video URL (YouTube/Vimeo)</label>
                                <input type="text" name="video_url" id="video_url" placeholder="https://youtube.com/watch?v=..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>

                            <div class="relative group">
                                <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Display Order</label>
                                <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                            </div>
                        </div>
                        
                        <div class="pt-4">
                            <button type="submit" id="saveBtn" class="w-full sm:w-auto bg-slate-900 text-white px-10 py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-slate-200 flex items-center justify-center gap-3 hover:bg-amber-400 hover:text-slate-900 transition-all active:scale-95">
                                <span class="material-symbols-outlined text-lg">cloud_upload</span>
                                Publish to Gallery
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Media Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 sm:gap-8">
            @forelse($media as $item)
            <div class="group bg-white border border-slate-200 rounded-[2rem] overflow-hidden transition-all hover:shadow-xl hover:-translate-y-1">
                <div class="relative aspect-video overflow-hidden">
                    @if($item->type == 'image')
                        <img src="{{ asset('storage/' . $item->file_path) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    @else
                        @if($item->thumbnail)
                            <img src="{{ asset('storage/' . $item->thumbnail) }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-slate-900 flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-white">play_circle</span>
                            </div>
                        @endif
                        <div class="absolute inset-0 flex items-center justify-center">
                            <div class="w-12 h-12 bg-white/20 backdrop-blur rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-white">play_arrow</span>
                            </div>
                        </div>
                    @endif
                    
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-[8px] font-black uppercase tracking-widest text-slate-900 shadow-sm">
                            {{ $item->type }}
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xs font-black text-slate-900 uppercase tracking-tight truncate pr-4">{{ $item->title ?? 'Untitled Media' }}</h3>
                        <button onclick="toggleStatus({{ $item->id }})" class="w-8 h-8 rounded-full flex items-center justify-center {{ $item->status ? 'bg-green-50 text-green-500' : 'bg-slate-50 text-slate-300' }}">
                            <span class="material-symbols-outlined text-xs">{{ $item->status ? 'visibility' : 'visibility_off' }}</span>
                        </button>
                    </div>

                    <div class="flex items-center gap-2">
                        <button onclick="editMedia({{ $item->id }})" class="flex-1 bg-slate-900 text-white py-3 rounded-xl font-black text-[9px] uppercase tracking-widest hover:bg-amber-400 hover:text-slate-900 transition-all">
                            Edit
                        </button>
                        <button onclick="deleteMedia({{ $item->id }})" class="w-12 h-12 bg-slate-50 text-slate-400 rounded-xl hover:bg-red-50 hover:text-red-600 transition-all flex items-center justify-center">
                            <span class="material-symbols-outlined text-sm">delete</span>
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center text-[10px] font-black uppercase tracking-widest text-slate-300 italic">No media found.</div>
            @endforelse
        </div>

        @if($media->hasPages())
        <div class="mt-12">
            {{ $media->links() }}
        </div>
        @endif
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function toggleFields(type) {
        if(type === 'image') {
            $('#imageField').removeClass('hidden');
            $('#videoField, #urlField').addClass('hidden');
        } else {
            $('#imageField').addClass('hidden');
            $('#videoField, #urlField').removeClass('hidden');
        }
    }

    function openForm() {
        $('#formSection').removeClass('hidden');
        $('#mediaForm')[0].reset();
        $('#media_id').val('');
        $('#previewImg, #previewThumb').addClass('hidden');
        toggleFields('image');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function closeForm() {
        $('#formSection').addClass('hidden');
    }

    function previewFile(input, target) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $(target).attr('src', e.target.result).removeClass('hidden');
            }
            reader.readAsDataURL(file);
        }
    }

    $('#mediaForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#media_id').val();
        const url = id ? `/media/${id}/update` : '/media';
        const formData = new FormData(this);

        $('#saveBtn').prop('disabled', true).html('Publishing...');

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
                alert('Validation error. Please check your inputs.');
                $('#saveBtn').prop('disabled', false).html('Publish to Gallery');
            }
        });
    });

    function editMedia(id) {
        $.get(`/media/${id}/edit`, function(data) {
            $('#media_id').val(data.id);
            $(`input[name="type"][value="${data.type}"]`).prop('checked', true).trigger('change');
            $('#title').val(data.title);
            $('#video_url').val(data.video_url);
            $('#order').val(data.order);
            
            if (data.file_path) {
                $('#previewImg').attr('src', `/storage/${data.file_path}`).removeClass('hidden');
            }
            if (data.thumbnail) {
                $('#previewThumb').attr('src', `/storage/${data.thumbnail}`).removeClass('hidden');
            }
            
            $('#formSection').removeClass('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    function deleteMedia(id) {
        if (confirm('Delete this media permanently?')) {
            $.ajax({
                url: `/media/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    location.reload();
                }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/media/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
