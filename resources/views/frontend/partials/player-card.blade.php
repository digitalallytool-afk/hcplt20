<div class="col-lg-3 col-md-6">
    <div class="p-card">
        <div class="p-top">
            <span class="p-role-tag">{{ $player->role }}</span>
            @if($player->image)
                <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}">
            @else
                <div class="w-full h-full flex items-center justify-center text-slate-200" style="font-size: 80px;">
                    <span class="material-symbols-outlined" style="font-size: 100px;">person</span>
                </div>
            @endif
            <div class="p-emoji">{{ $player->emoji ?? '🏏' }}</div>
        </div>
        <div class="p-body">
            <div class="p-name">{{ $player->name }}</div>
            <div class="p-origin">{{ $player->origin }}</div>
        </div>
    </div>
</div>
