@extends('backend.layouts.main')

@section('title', 'News Categories')

@section('content')
<main class="lg:ml-[260px] pt-24 min-h-screen bg-slate-50/50 transition-all duration-300">
    <div class="p-4 sm:p-8">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-black text-slate-900 mb-1 uppercase tracking-tight">News Categories</h1>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-widest opacity-60">Organize your blog posts and announcements</p>
            </div>
            <button onclick="openForm()" class="w-full sm:w-auto bg-slate-900 text-white px-6 py-4 rounded-2xl font-black text-[11px] uppercase tracking-widest flex items-center justify-center gap-2 hover:bg-amber-400 hover:text-slate-900 transition-all shadow-xl shadow-slate-200 active:scale-95">
                <span class="material-symbols-outlined text-[18px]">add_circle</span>
                New Category
            </button>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <!-- Form Card (Left/Top) -->
            <div id="formSection" class="lg:col-span-4 hidden animate-in slide-in-from-left duration-300">
                <div class="bg-white border border-slate-200 rounded-[2.5rem] p-8 shadow-xl shadow-slate-200/50 sticky top-24">
                    <div class="flex items-center justify-between mb-8">
                        <h3 id="formTitle" class="text-lg font-black text-slate-900 uppercase tracking-tight">Add Category</h3>
                        <button onclick="closeForm()" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center hover:bg-slate-100 transition-colors">
                            <span class="material-symbols-outlined">close</span>
                        </button>
                    </div>
                    
                    <form id="categoryForm" class="space-y-8">
                        @csrf
                        <input type="hidden" id="category_id">
                        
                        <div class="relative group">
                            <label class="absolute -top-2 left-3 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Category Name</label>
                            <input type="text" name="name" id="name" placeholder="e.g. Announcements" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>

                        <div class="relative group">
                            <label class="absolute -top-2 left-3 px-1 bg-white text-[10px] font-black text-slate-400 group-focus-within:text-amber-500 transition-colors uppercase tracking-widest">Display Order</label>
                            <input type="number" name="order" id="order" value="0" class="w-full bg-white border border-slate-200 rounded-xl px-4 py-4 text-sm font-bold text-slate-900 focus:border-amber-400 outline-none transition-all">
                        </div>
                        
                        <button type="submit" id="saveBtn" class="w-full bg-slate-900 text-white py-5 rounded-2xl font-black text-[11px] uppercase tracking-widest shadow-xl shadow-slate-200 hover:bg-amber-400 hover:text-slate-900 transition-all flex items-center justify-center gap-3 active:scale-95">
                            <span class="material-symbols-outlined text-[18px]">verified</span>
                            Save Category
                        </button>
                    </form>
                </div>
            </div>

            <!-- List Card (Right/Bottom) -->
            <div id="listSection" class="lg:col-span-12 transition-all duration-300">
                <div class="bg-white border border-slate-200 rounded-[2.5rem] overflow-hidden shadow-sm">
                    <div class="overflow-x-auto scrollbar-hide">
                        <table class="w-full text-left border-collapse min-w-[800px]">
                            <thead>
                                <tr class="bg-slate-50 border-b border-slate-100">
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Order</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Category Name</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest">Slug</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-center">Status</th>
                                    <th class="px-8 py-5 text-[10px] font-black text-slate-400 uppercase tracking-widest text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-50">
                                @forelse($categories as $cat)
                                <tr class="hover:bg-slate-50/30 transition-colors">
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span class="inline-flex items-center justify-center w-8 h-8 bg-slate-100 rounded-lg text-[10px] font-black text-slate-500">#{{ $cat->order }}</span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <span class="text-sm font-black text-slate-900 uppercase tracking-tight">{{ $cat->name }}</span>
                                    </td>
                                    <td class="px-8 py-5 whitespace-nowrap">
                                        <code class="text-[10px] font-bold bg-slate-50 text-slate-400 px-2 py-1 rounded-md">{{ $cat->slug }}</code>
                                    </td>
                                    <td class="px-8 py-5 text-center whitespace-nowrap">
                                        <button onclick="toggleStatus({{ $cat->id }})" class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border text-[9px] font-black uppercase tracking-widest transition-all {{ $cat->status ? 'bg-green-50 text-green-600 border-green-100' : 'bg-slate-50 text-slate-400 border-slate-100' }}">
                                            {{ $cat->status ? 'Active' : 'Draft' }}
                                        </button>
                                    </td>
                                    <td class="px-8 py-5 text-right whitespace-nowrap">
                                        <div class="flex items-center justify-end gap-1">
                                            <button onclick="editCategory({{ $cat->id }})" class="p-2 text-slate-400 hover:text-slate-900 hover:bg-white rounded-lg transition-all">
                                                <span class="material-symbols-outlined text-[20px]">edit_note</span>
                                            </button>
                                            <button onclick="deleteCategory({{ $cat->id }})" class="p-2 text-slate-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-all">
                                                <span class="material-symbols-outlined text-[20px]">delete</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-8 py-20 text-center text-[10px] font-black uppercase tracking-widest text-slate-300 italic">No categories found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                @if($categories->hasPages())
                <div class="mt-8">
                    {{ $categories->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openForm() {
        $('#listSection').removeClass('lg:col-span-12').addClass('lg:col-span-8');
        $('#formSection').removeClass('hidden');
        $('#formTitle').text('Add Category');
        $('#categoryForm')[0].reset();
        $('#category_id').val('');
    }

    function closeForm() {
        $('#formSection').addClass('hidden');
        $('#listSection').removeClass('lg:col-span-8').addClass('lg:col-span-12');
    }

    $('#categoryForm').on('submit', function(e) {
        e.preventDefault();
        const id = $('#category_id').val();
        const url = id ? `/news/categories/${id}/update` : '/news/categories';
        
        $('#saveBtn').prop('disabled', true).html('<span class="material-symbols-outlined animate-spin text-sm">sync</span>');

        $.ajax({
            url: url,
            method: 'POST',
            data: $(this).serialize(),
            success: function() { location.reload(); },
            error: function() { 
                alert('Error! Check name unique constraints.');
                $('#saveBtn').prop('disabled', false).html('<span class="material-symbols-outlined text-sm">check_circle</span> Save Category');
            }
        });
    });

    function editCategory(id) {
        $.get(`/news/categories/${id}/edit`, function(data) {
            openForm();
            $('#category_id').val(data.id);
            $('#name').val(data.name);
            $('#order').val(data.order);
            $('#formTitle').text('Edit Category');
        });
    }

    function deleteCategory(id) {
        if(confirm('Delete this category? All related news will be removed.')) {
            $.ajax({
                url: `/news/categories/${id}`,
                method: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() { location.reload(); }
            });
        }
    }

    function toggleStatus(id) {
        $.post(`/news/categories/${id}/toggle`, { _token: '{{ csrf_token() }}' }, function() {
            location.reload();
        });
    }
</script>
@endsection
