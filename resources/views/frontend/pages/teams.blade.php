@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')

    <style>
        :root {
            --light-bg: #fff8f0;
            --gold: #ff6600;
            --dark-bg: #0b0f16;
            --white: #ffffff;
            --dark-text: #3c3b3b;
        }


        /* Hero Section */
        .teams-hero {
            height: 350px;
            background: linear-gradient(rgba(11, 15, 22, 0.8), rgba(11, 15, 22, 0.8)), url('https://hcplt20.com//frontend/images/team.jpeg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 4rem;
            font-weight: 900;
            color: var(--white);
            text-transform: uppercase;
        }

        /* Team Cards */
        .teams-grid {
            padding: 100px 0;
        }

        .team-card-premium {
            background: linear-gradient(45deg, #0a1c3e, #0a1c3e);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            padding: 50px 30px;
            text-align: center;
            transition: all 0.4s ease;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }

        .team-card-premium:hover {
            transform: translateY(-15px);
            border-color: var(--gold);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .team-logo-wrapper {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
            margin: 0 auto 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid rgba(244, 194, 66, 0.2);
            transition: all 0.3s ease;
            font-size: 40px;
        }

        .team-card-premium:hover .team-logo-wrapper {
            background: var(--gold);
            border-color: var(--gold);
        }

        .team-logo-wrapper i {
            font-size: 4rem;
            color: var(--white);
            filter: drop-shadow(0 0 10px rgba(255, 255, 255, 0.2));
            transition: all 0.3s ease;
        }

        .team-card-premium:hover .team-logo-wrapper i {
            color: #000;
            filter: none;
        }

        .team-name {
            color: var(--white);
            font-family: 'DM Sans', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }

        .team-location {
            color: var(--gold);
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.85rem;
            text-transform: uppercase;
        }

        .view-squad-btn {
            margin-top: 25px;
            display: inline-block;
            color: #f5c518;
            text-decoration: none;
            font-weight: 500;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 8px 25px;
            border: 1px solid rgb(245 197 24);
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .view-squad-btn:hover {
            background: var(--gold);
            color: #000;
            border-color: var(--gold);
        }

        /* Section Heading */
        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .tagline {
            color: var(--gold);
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .main-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 3rem;
            font-weight: 900;
            text-transform: uppercase;
        }
    </style>

    <!-- Hero -->
    <header class="teams-hero">
        <div class="container">
            <h1 class="hero-title">Our Teams</h1>

        </div>
    </header>

    <!-- Teams Grid -->
    <section class="pad100" style="background-color: #ffffff">
        <div class="container">
            <div class="row">
                <!-- Men's Section Header -->
                <div class="col-md-12 mb-4">
                    <h2 style="font-family: 'DM Sans', sans-serif; font-weight: 800; text-transform: uppercase; color: var(--gold); border-bottom: 2px solid rgba(255,102,0,0.2); padding-bottom: 10px; letter-spacing: 1px;">Men's Teams</h2>
                </div>

                @php
                    $mens_db_teams = $teams->where('gender', 'Men');
                    $womens_db_teams = $teams->where('gender', 'Women');
                @endphp

                @if($mens_db_teams->count() > 0)
                    @foreach ($mens_db_teams as $team)
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="team-card-premium">
                                <div class="team-logo-wrapper">
                                    @if ($team->logo)
                                        <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}"
                                            style="width: 64px; height: 64px; object-fit: contain;">
                                    @else
                                        🛡️
                                    @endif
                                </div>
                                <h3 class="team-name">{{ $team->name }}</h3>
                                <p class="team-location">{{ $team->city }}</p>
                                <a href="{{route('team.details',$team->id)}}" class="view-squad-btn">View Squad</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback Men's Teams -->
                    <!-- Team 1 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">⚔️</div>
                            <h3 class="team-name">Rohtak Warriors</h3>
                            <p class="team-location">Rohtak</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 2 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🦅</div>
                            <h3 class="team-name">Hisar Titans</h3>
                            <p class="team-location">Hisar</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 3 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">👑</div>
                            <h3 class="team-name">Sirsa Royals</h3>
                            <p class="team-location">Sirsa</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 4 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🏔️</div>
                            <h3 class="team-name">Gurugram Giants</h3>
                            <p class="team-location">Gurugram</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 5 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🥊</div>
                            <h3 class="team-name">Faridabad Fighters</h3>
                            <p class="team-location">Faridabad</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 6 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🐯</div>
                            <h3 class="team-name">Sonipat Tigers</h3>
                            <p class="team-location">Sonipat</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 7 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🏆</div>
                            <h3 class="team-name">Karnal Kings</h3>
                            <p class="team-location">Karnal</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                    <!-- Team 8 -->
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="team-card-premium">
                            <div class="team-logo-wrapper">🛡️</div>
                            <h3 class="team-name">Ambala Avengers</h3>
                            <p class="team-location">Ambala</p>
                            <a href="#" class="view-squad-btn">View Squad</a>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Women's Section -->
            <div class="row mt-5 pt-4">
                <div class="col-md-12 mb-4">
                    <h2 style="font-family: 'DM Sans', sans-serif; font-weight: 800; text-transform: uppercase; color: var(--gold); border-bottom: 2px solid rgba(255,102,0,0.2); padding-bottom: 10px; letter-spacing: 1px;">Women's Teams</h2>
                </div>

                <div class="col-md-12">
                    <div class="text-center py-5" style="background: #0a1c3e; border: 1px dashed rgba(255, 102, 0, 0.3); border-radius: 20px; padding: 50px 20px; margin: 20px 0;">
                        <h3 style="color: #ffffff; font-family: 'DM Sans', sans-serif; font-weight: 700; margin-bottom: 8px; font-size: 1.8rem;">Teams Will Be Announced Soon</h3>
                        <p style="color: #cbd5e1; margin-bottom: 0; font-size: 1rem; opacity: 0.95;">Stay tuned! The official women's franchise teams will be revealed shortly.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
