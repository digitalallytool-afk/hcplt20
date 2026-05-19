@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('content')
<style>
/* Keeping your original styles for player cards if any were in-page, 
   otherwise it will pick from style.css */
</style>

<section class="team-details-header pad100 mt-78" style="background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('{{ asset('storage/' . $team->logo) }}') center/cover no-repeat;">
    <div class="container text-center">
        <div class="team-logo-main mb-4">
            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}" style="width: 120px; height: 120px; object-fit: contain;">
        </div>
        <h1 class="text-white fw-bold text-uppercase display-4">{{ $team->name }}</h1>
        <p class="text-warning fw-bold tracking-widest">{{ $team->city }}</p>
        <div class="mt-3">
            <span class="badge bg-warning text-dark px-4 py-2">OWNER: {{ $team->owner_name ?? 'TBA' }}</span>
        </div>
    </div>
</section>

<section class="squad-section pad100">
    <div class="container">
        <div class="squad-tabs-wrapper mb-5">
            <ul class="nav nav-tabs border-0 justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="batsmen-tab" data-bs-toggle="tab" data-bs-target="#batsmen" type="button" role="tab">Batsmen</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="bowlers-tab" data-bs-toggle="tab" data-bs-target="#bowlers" type="button" role="tab">Bowlers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="keepers-tab" data-bs-toggle="tab" data-bs-target="#keepers" type="button" role="tab">Wicket Keepers</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="all-rounders-tab" data-bs-toggle="tab" data-bs-target="#all-rounders" type="button" role="tab">All Rounders</button>
                </li>
            </ul>
        </div>

        <div class="tab-content" id="myTabContent">
            <!-- Batsmen -->
            <div class="tab-pane fade show active" id="batsmen" role="tabpanel">
                <div class="squad-grid">
                    @forelse($batsmen as $player)
                        <div class="p-card">
                            <div class="p-top">
                                <span class="p-role-tag rt-bat">Batsman</span>
                                @if($player->image)
                                    <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                <div class="p-emoji">{{ $player->emoji ?? '🏏' }}</div>
                            </div>
                            <div class="p-body">
                                <div class="p-name">{{ $player->name }}</div>
                                <div class="p-origin">{{ $player->origin }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">No Batsmen added yet.</div>
                    @endforelse
                </div>
            </div>

            <!-- Bowlers -->
            <div class="tab-pane fade" id="bowlers" role="tabpanel">
                <div class="squad-grid">
                    @forelse($bowlers as $player)
                        <div class="p-card">
                            <div class="p-top">
                                <span class="p-role-tag rt-bat">Bowler</span>
                                @if($player->image)
                                    <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                <div class="p-emoji">{{ $player->emoji ?? '🏏' }}</div>
                            </div>
                            <div class="p-body">
                                <div class="p-name">{{ $player->name }}</div>
                                <div class="p-origin">{{ $player->origin }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">No Bowlers added yet.</div>
                    @endforelse
                </div>
            </div>

            <!-- Wicket Keepers -->
            <div class="tab-pane fade" id="keepers" role="tabpanel">
                <div class="squad-grid">
                    @forelse($wicket_keepers as $player)
                        <div class="p-card">
                            <div class="p-top">
                                <span class="p-role-tag rt-bat">Wicket Keeper</span>
                                @if($player->image)
                                    <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                <div class="p-emoji">{{ $player->emoji ?? '🏏' }}</div>
                            </div>
                            <div class="p-body">
                                <div class="p-name">{{ $player->name }}</div>
                                <div class="p-origin">{{ $player->origin }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">No Wicket Keepers added yet.</div>
                    @endforelse
                </div>
            </div>

            <!-- All Rounders -->
            <div class="tab-pane fade" id="all-rounders" role="tabpanel">
                <div class="squad-grid">
                    @forelse($all_rounders as $player)
                        <div class="p-card">
                            <div class="p-top">
                                <span class="p-role-tag rt-bat">All Rounder</span>
                                @if($player->image)
                                    <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                                @endif
                                <div class="p-emoji">{{ $player->emoji ?? '🏏' }}</div>
                            </div>
                            <div class="p-body">
                                <div class="p-name">{{ $player->name }}</div>
                                <div class="p-origin">{{ $player->origin }}</div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5">No All Rounders added yet.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Squad Grid Layout Fix */
    .squad-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
        padding: 20px 0;
    }
    
    .nav-tabs .nav-link {
        color: #19398a;
        font-weight: 700;
        text-transform: uppercase;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        margin: 0 5px;
        font-size: 13px;
    }
    
    .nav-tabs .nav-link.active {
        background: #19398a;
        color: #fff;
    }

    /* Ensuring your style.css classes are respected */
    .p-card { background: #fff; border-radius: 15px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
    .p-top { height: 280px; position: relative; background: #f8f9fa; }
    .p-role-tag { position: absolute; top: 15px; left: 15px; background: #19398a; color: #fff; padding: 4px 12px; border-radius: 5px; font-size: 10px; font-weight: 700; z-index: 1; }
    .p-emoji { position: absolute; bottom: 15px; right: 15px; font-size: 24px; z-index: 1; }
    .p-body { padding: 15px; text-align: center; }
    .p-name { font-weight: 800; font-size: 18px; color: #19398a; }
    .p-origin { font-size: 12px; color: #888; font-weight: 600; }
</style>
@endsection