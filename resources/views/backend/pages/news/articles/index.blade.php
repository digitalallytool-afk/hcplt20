@extends('backend.layouts.main')

@section('title', 'News Articles')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">Latest News & Blog</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Publish updates and stories for the community</p>
            </div>
            <button onclick="openDrawer()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">post_add</span>
                Create Article
            </button>
        </div>

        <!-- Articles Table -->
        <div class="bg-white border border-slate-200 rounded-[2rem] overflow-hidden shadow-sm">
            <div class="overflow-x-auto scrollbar-hide">
                <table class="w-full text-left border-collapse min-w-[900px]">
                    <thead>
                        <tr class="bg-slate-50 border-b border-slate-100">
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest w-24">Image</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Article Title</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest">Category</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                            <th class="px-6 py-4 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($articles as $article)
                        <tr class="hover:bg-slate-50/30 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-16 h-12 bg-slate-100 rounded-lg overflow-hidden border border-slate-200 shadow-sm">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-slate-300">
                                            <span class="material-symbols-outlined text-sm">image</span>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span class="text-[11px] font-black text-slate-900 uppercase tracking-tight line-clamp-1 mb-0.5">{{ $article->title }}</span>
                                    <span class="text-[9px] font-black text-slate-400 uppercase tracking-widest">{{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d M, Y') : 'Draft' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 bg-amber-50 text-amber-600 rounded-lg text-[9px] font-black uppercase tracking-widest border border-amber-100">
                                    {{ $article->category->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center whitespace-nowrap">
                                <button onclick="toggleStatus({{ $article->id }})" class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-[9px] font-black uppercase tracking-widest transition-all {{ $article->status ? 'bg-green-50 text-green-600' : 'bg-slate-50 text-slate-400' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $article->status ? 'bg-green-500 animate-pulse' : 'bg-slate-400' }}"></span>
                                    {{ $article->status ? 'Published' : 'Hidden' }}
                                </button>
                            </td>
                            <td class="px-6 py-4 text-right whitespace-nowrap">
                                <div class="flex items-center justify-end gap-1">
                                    <button onclick="editArticle({{ $article->id }})" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-white rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">edit</span>
                                    </button>
                                    <button onclick="deleteArticle({{ $article->id }})" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-6 py-20 text-center">
                                <span class="material-symbols-outlined text-5xl text-slate-200 mb-4 opacity-50">article</span>
                                <p class="text-slate-400 font-black uppercase tracking-widest text-[10px] italic opacity-50">Start your first news story</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($articles->hasPages())
            <div class="px-8 py-6 bg-slate-50/50 border-t border-slate-100">
                {{ $articles->links() }}
            </div>
            @endif
        </div>
    </div>

    <!-- Side Drawer Form -->
    <div id="drawerOverlay" class="fixed inset-0 bg-slate-900/60 z-[999] hidden opacity-0 transition-opacity duration-300" onclick="closeDrawer()"></div>
    <div id="drawer" class="fixed top-0 right-0 h-full w-full max-w-xl bg-white z-[1000] translate-x-full transition-transform duration-500 shadow-2xl overflow-y-auto scrollbar-hide">
        <div class="p-8 sm:p-12">
            <div class="flex items-center justify-between mb-10">
                <div>
                    <h3 id="drawerTitle" class="text-2xl font-black text-slate-900 uppercase tracking-tight">New Article</h3>
                    <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest opacity-60">Fill in the details to publish news</p>
                </div>
                <button onclick="closeDrawer()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <form id="articleForm" class="space-y-8">
                @csrf
                <input type="hidden" id="article_id" name="article_id">

                <!-- Image Upload -->
                <div class="space-y-4">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400">Featured Image</label>
                    <div class="group relative w-full aspect-video bg-slate-50 rounded-[2rem] overflow-hidden border-2 border-dashed border-slate-200 hover:border-amber-400 transition-all cursor-pointer flex flex-col items-center justify-center gap-3" onclick="document.getElementById('imageInput').click()">
                        <img id="previewImage" class="absolute inset-0 w-full h-full object-cover hidden">
                        <span class="material-symbols-outlined text-4xl text-slate-300 group-hover:text-amber-400 transition-colors">add_photo_alternate</span>
                        <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Click to Upload (16:9)</p>
                        <input type="file" name="image" id="imageInput" class="hidden" onchange="previewFile(this)">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Category</label>
                        <select name="category_id" id="category_id" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all appearance-none">
                            <option value="">Select Category</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="relative group">
                        <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Display Order</label>
                        <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                    </div>
                </div>

                <div class="relative group">
                    <label class="absolute -top-2 left-4 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors">Article Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter headline..." class="w-full bg-white border border-slate-200 rounded-2xl px-5 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                </div>

                <div class="relative group">
                    <label class="block text-[10px] font-black uppercase tracking-widest text-slate-400 mb-4">Content</label>
                    <textarea name="content" id="content" rows="6" placeholder="Write article content here..." class="w-full bg-white border border-slate-200 rounded-[2rem] px-5 py-4 text-sm font-medium text-slate-700 focus:border-amber-400 outline-none transition-all"></textarea>
                </div>

                <div class="pt-6">
                    <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-2xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                        <span class="material-symbols-outlined text-[18px]">send</span>
                        Publish Article
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
        $('#drawerTitle').text('New Article');
        $('#articleForm')[0].reset();
        $('#article_id').val('');
        $('#previewImage').addClass('hidden');
    }

    function closeDrawer() {
        $('#drawerOverlay').animate({opacity: 0}, 300, function() { $(this).addClass('hidden'); });
        $('#drawer').addClass('translate-x-full');
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

    $('#articleForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#article_id').val();
        const url = id ? `/news/articles/${id}/update` : '/news/articles';
        const formData = new FormData(this);

        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin">sync</span> Processing...');

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function() { location.reload(); },
            error: function() {
                alert('Error publishing article. Check required fields.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined">send</span> Publish Article');
            }
        });
    });

    function editArticle(id) {
        $.get(`/news/articles/${id}/edit`, function(data) {
            openDrawer();
            $('#article_id').val(data.id);
            $('#title').val(data.title);
            $('#category_id').val(data.category_id);
            $('#order').val(data.order);
            $('#content').val(data.content);
            if (data.image) {
                $('#previewImage').attr('src', `/storage/${data.image}`).removeClass('hidden');
            }
            $('#drawerTitle').text('Edit Article');
        });
    }

    function deleteArticle(id) {
        if(confirm('Delete this article forever?')) {
            $.ajax({
                url: `/news/articles/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/news/articles/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
