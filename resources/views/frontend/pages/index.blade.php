@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')


    <div class="banner">
        <!--<img src="https://hcplt20.com/assets/01%20Hero%20banner-CQtwH0Zf.png" class="w-100"> -->


        <div class="hero-slider">

            @if (isset($sliders) && $sliders->isNotEmpty())
                @foreach ($sliders as $slider)
                    <a href="{{ $slider->link }}">
                        <div class="item">
                            <div class="hero-thumnail">
                                <img src="{{ asset($slider->image) }}" class="w-100"
                                    alt="{{ $slider->title ?? 'HCPL Banner' }}">

                                @if ($loop->first)
                                    <div class="banner-caption">
                                        <div class="container">
                                            <div class="content-left">
                                                <div class="join-tag">Join HCPL</div>
                                                <h1 class="title-main">HARYANA CRICKET<br><span>PREMIER LEAGUE</span></h1>
                                                <p class="tagline">From Grounds to Glory</p>
                                                <div class="season-pill">
                                                    <span class="dot-live"></span>
                                                    Season 1 &nbsp;·&nbsp; Coming Soon
                                                </div><br>
                                                <div class="season-badge">REGISTRATIONS<br>OPENING SOON</div>
                                                <!-- <div class="reg-text">REGISTRATIONS<br>OPENING SOON</div>-->
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <a href="{{ $slider->link }}">
                    <div class="item">
                        <div class="hero-thumnail">
                            <img src="{{ asset('frontend') }}/images/hcpl-bnnar1.webp" class="w-100">

                            <div class="banner-caption">
                                <div class="container">
                                    <div class="content-left">
                                        <div class="join-tag">Join HCPL</div>
                                        <h1 class="title-main">HARYANA CRICKET<br><span>PREMIER LEAGUE</span></h1>
                                        <p class="tagline">From Grounds to Glory</p>
                                        <div class="season-pill">
                                            <span class="dot-live"></span>
                                            Season 1 &nbsp;·&nbsp; Coming Soon
                                        </div><br>
                                        <div class="season-badge">REGISTRATIONS<br>OPENING SOON</div>
                                        <!-- <div class="reg-text">REGISTRATIONS<br>OPENING SOON</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="item">
                    <div class="hero-thumnail">
                        <img src="{{ asset('frontend') }}/images/hcpl-banner2.webp" class="w-100">
                    </div>
                </div>
                <div class="item">
                    <div class="hero-thumnail">
                        <img src="{{ asset('frontend') }}/images/hcpl-banner3.webp" class="w-100">
                    </div>
                </div>
            @endif

        </div>


        <section class="pad100">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="about-left">
                            <!--<h6 class="sub-title pl-0">ABOUT SNIPPET</h6>-->
                            <h1 class="heading ">BUILDING THE FUTURE OF CRICKET IN HARYANA</h1>
                            <p>HCPL is a professional cricket league designed to give real platform to emerging and
                                corporate players.
                                With structured trials, player auctions, and competitive matches, we bring talent into the
                                spotlight.
                            </p>

                            <div class="about-features">
                                <div class="about-feature">
                                    <div class="about-feature-icon">🏏</div>
                                    <div>
                                        <h4>Structured Trials</h4>
                                        <p>Zone-wise trials across Haryana with professional selectors evaluating every
                                            player fairly.</p>
                                    </div>
                                </div>
                                <div class="about-feature">
                                    <div class="about-feature-icon">💰</div>
                                    <div>
                                        <h4>Mega Player Auction</h4>
                                        <p>Get drafted by franchise owners in a professional IPL-style auction with real bid
                                            value.</p>
                                    </div>
                                </div>
                                <div class="about-feature">
                                    <div class="about-feature-icon">📺</div>
                                    <div>
                                        <h4>Broadcasting Partners</h4>
                                        <p>Matches to be broadcasted across India — bringing Haryana cricket into living
                                            rooms.</p>
                                    </div>
                                </div>
                            </div>

                            <!--  <a href="about-us.php" class="bnp-btn mt-4" style="">Know More About Us </a>-->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-thumb">
                            <img src="{{ asset('frontend') }}/images/about-home.webp" alt="bnp" class="w-100">
                        </div>
                    </div>


                </div>
            </div>
        </section>



        <div class="wrap">
            <div class="bg-glow"></div>
            <div class="grid-bg"></div>
            <div class="stars" id="stars"></div>
            <div class="corner tl"></div>
            <div class="corner tr"></div>
            <div class="corner bl"></div>
            <div class="corner br"></div>

            <div class="header">
                <div class="hdr-row">
                    <div class="h-line"></div>
                    <div class="logo-pill">
                        <div class="logo-ico">🏏</div>
                        <div>
                            <div class="logo-name">HCPL T20</div>
                            <div class="logo-sub">Haryana Cricket Premier League</div>
                        </div>
                    </div>
                    <div class="h-line r"></div>
                </div>
                <div class="sub-tag">Official Prize Distribution &nbsp;·&nbsp; Season 2026</div>
            </div>

            <div class="title-block">
                <h1>PRIZE &nbsp;<span class="b">POOL</span></h1>
            </div>
            <div class="total-row">
                <div class="td"></div>
                <div class="tv">Total Prize Pool &nbsp;·&nbsp; <strong>₹1 Crore</strong></div>
                <div class="td r"></div>
            </div>

            <div class="podium-scene">
                <div class="p-col me-0">
                    <div class="name-plate">
                        <div class="np-name">Runner Up</div>
                        <div class="np-role">2nd Place</div>
                    </div>
                    <div class="place-badge pb2">🥈 Runner Up</div>
                    <div class="prize pr2">₹21 Lakhs</div>
                    <div class="player-img-wrap">
                        <div class="glow-base" style="width:150px;height:18px;background:rgba(100,170,255,0.45);"></div>
                        <img class="player-img p2-img" src="{{ asset('frontend') }}/images/png 2 (1).png"
                            alt="Runner Up" />
                    </div>
                    <div class="pod pd2">
                        <div class="pod-face">
                            <div class="pod-shine"></div>
                            <div class="pod-bignum">2</div>
                        </div>
                        <div class="pod-side"></div>
                        <div class="pod-base"></div>
                    </div>
                </div>

                <div class="p-col ms-0">
                    <div class="name-plate" style="border-color:rgba(255,255,255,0.28);">
                        <div class="np-name" style="font-size:17px;">Champion 🏆</div>
                        <div class="np-role" style="color:rgba(200,230,255,0.65);">1st Place</div>
                    </div>
                    <div class="place-badge pb1">🥇 Champion</div>
                    <div class="prize pr1">₹51 Lakhs</div>
                    <div class="player-img-wrap">
                        <div class="glow-base" style="width:210px;height:28px;background:rgba(150,210,255,0.65);"></div>
                        <img class="player-img p1-img" src="{{ asset('frontend') }}/images/png 1 (1).png"
                            alt="Champion" />
                    </div>
                    <div class="pod pd1">
                        <div class="pod-face">
                            <div class="pod-shine"></div>
                            <div class="pod-bignum">1</div>
                        </div>
                        <div class="pod-side"></div>
                        <div class="pod-base"></div>
                    </div>
                </div>
            </div>

            <div class="awards-section">
                <div class="awards-title">Special Awards</div>
                <div class="awards-grid">

                    <div class="award-card ac-gold me-0">
                        <div class="vehicle-area">
                            <div class="vglow" style="width:180px;background:rgba(255,195,40,0.4);"></div>
                            <img src="{{ asset('frontend') }}/images/png cars-01.png" viewBox="0 0 200 100">



                        </div>
                        <div class="award-label al-gold">Player of Tournament</div>
                        <div class="award-title-txt">SUV Car</div>
                        <div class="award-prize-txt ap-gold">Prize Car</div>
                        <div class="award-sub">Trophy + Certificate</div>
                    </div>

                    <div class="award-card ac-blue">
                        <div class="vehicle-area">
                            <div class="vglow" style="width:140px;background:rgba(100,180,255,0.4);"></div>
                            <img src="{{ asset('frontend') }}/images/png cars-02.png" viewBox="0 0 200 100">
                        </div>
                        <div class="award-label al-blue">Best Batsman</div>
                        <div class="award-title-txt">Motorcycle</div>
                        <div class="award-prize-txt ap-blue">Prize Bike</div>
                        <div class="award-sub">Trophy + Certificate</div>
                    </div>

                    <div class="award-card ac-white ms-0">
                        <div class="vehicle-area">
                            <div class="vglow" style="width:140px;background:rgba(200,225,255,0.35);"></div>
                            <img src="{{ asset('frontend') }}/images/png cars-03.png" viewBox="0 0 200 100">
                        </div>
                        <div class="award-label al-white">Best Bowler</div>
                        <div class="award-title-txt">Motorcycle</div>
                        <div class="award-prize-txt ap-white">Prize Bike</div>
                        <div class="award-sub">Trophy + Certificate</div>
                    </div>

                </div>
            </div>

            <div class="benefits-section">
                <div class="awards-title">Additional Benefits</div>
                <div class="benefits-outer">
                    <div class="benefits-side">
                        <div class="bs-dot"></div>
                        <div class="bs-line"></div>
                        <div class="bs-diamond"></div>
                        <div class="bs-line"></div>
                        <div class="bs-dot"></div>
                    </div>
                    <div class="benefits-grid">
                        <div class="benefit-card">
                            <div class="benefit-icon">🏆</div>
                            <div class="benefit-label">Winner Trophy</div>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">📜</div>
                            <div class="benefit-label">Certificates</div>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">⭐</div>
                            <div class="benefit-label">Best Player Award</div>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">📺</div>
                            <div class="benefit-label">Media Coverage</div>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">🎖️</div>
                            <div class="benefit-label">Medals for All</div>
                        </div>
                        <div class="benefit-card">
                            <div class="benefit-icon">🏏</div>
                            <div class="benefit-label">Professional Exposure</div>
                        </div>
                    </div>
                    <div class="benefits-side">
                        <div class="bs-dot"></div>
                        <div class="bs-line"></div>
                        <div class="bs-diamond"></div>
                        <div class="bs-line"></div>
                        <div class="bs-dot"></div>
                    </div>
                </div>
            </div>

            <div class="bottom">
                <div class="b-line"></div>
                <div class="b-txt">hcplt20.com &nbsp;·&nbsp; Register Now &nbsp;·&nbsp; Total Prize Pool ₹1 Crore</div>
                <div class="b-line r"></div>
            </div>
        </div>

        <section class="pad100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="heading mb-3">Upcoming Trials</h2>
                        <p>Registrations open across zones. Step up, show your talent, and earn your spot in the league.</p>
                    </div>

                    <div class="col-md-8 mx-auto">
                        <div class="trials-grid">
                            @forelse($trials as $trial)
                                <div class="trial-card">
                                    <div class="trial-header">
                                        <span class="trial-zone">{{ $trial->zone_name }}</span>
                                        <span
                                            class="trial-status {{ strtolower($trial->status) == 'full' ? 'status-soon' : 'status-open' }}">{{ $trial->status }}</span>
                                    </div>
                                    <div class="trial-body">
                                        <div class="trial-name">{{ $trial->title }}</div>
                                        <div class="trial-meta">
                                            <div class="trial-meta-item">
                                                <span
                                                    class="trial-meta-icon">📍</span>{{ $trial->venue ?? 'Venue Will Be Announced Soon' }}
                                            </div>
                                            <div class="trial-meta-item">
                                                <span
                                                    class="trial-meta-icon">📅</span>{{ $trial->date_text ?? 'Registrations Will Open Soon' }}
                                            </div>
                                            @if ($trial->fee)
                                                <div class="trial-meta-item">
                                                    <span class="trial-meta-icon">👤</span> Registration Fee
                                                    ₹{{ $trial->fee }}
                                                </div>
                                            @endif
                                        </div>
                                        @if ($trial->registration_link)
                                            <a href="{{ $trial->registration_link }}" target="_blank"
                                                class="btn btn-green" style="width:100%;justify-content:center;">Register
                                                Now</a>
                                        @else
                                            <button class="btn btn-outline" style="width:100%;justify-content:center;"
                                                disabled>Opening Soon</button>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-12 text-center text-slate-500 font-body-md py-12">
                                    Upcoming trials will be announced soon. Stay tuned!
                                </div>
                            @endforelse
                        </div>
                    </div>
        </section>

        <section class="pad100 bg-grey">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">


                        <h2 class="heading mb-3">Recent & Upcoming Matches</h2>
                        <p>Live scores, fixtures and results from HCPL Season 1.</p>

                        @if (!empty($matches) && count($matches) > 0)
                            <table class="schedule-table text-center">
                                <thead>
                                    <tr>
                                        <th>Match</th>
                                        <th>Date</th>
                                        <th>Venue</th>
                                        <th>Score</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matches as $match)
                                        <tr>
                                            <td class="match-teams">
                                                {{ $match->team_a }}
                                                <span class="match-vs">VS</span>
                                                {{ $match->team_b }}
                                            </td>

                                            <td>{{ $match->date_text }}</td>

                                            <td>{{ $match->venue }}</td>

                                            <td>
                                                <strong>{{ $match->score ?? '—' }}</strong>
                                            </td>

                                            <td>
                                                @if (strtolower($match->status ?? '') == 'live')
                                                    <span class="badge-live">
                                                        <span class="live-dot"></span> LIVE
                                                    </span>
                                                @else
                                                    <span class="badge-upcoming">
                                                        {{ $match->status ?? 'Upcoming' }}
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="upcomming">
                                Upcoming Matches Will Be Announced Soon
                            </div>
                        @endif


                        <!-- Dynamic Matches (Commented Out for now) -->





                    </div>
                </div>
            </div>
        </section>





        <section class="pad100 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="heading mb-3">Chief Guest / Mentors</h2>
                        <p>Cricket legends representing HCPL</p>
                    </div>

                    @foreach ($ambassadors as $ambassador)
                        @if ($loop->iteration <= 2)
                            <div class="col-md-6 text-align center">
                                <div class="praveen-kumar" style="max-width:300px;border-radius:15px;overflow:hidden">


                                    <img src="{{ asset('storage/' . $ambassador->image) }}" class="w-100">
                                </div>
                            </div>
                        @else
                            <div class="col-lg-3 col-md-4">
                                <div class="brand-ambass">
                                    <div class="brand-img">
                                        <img src="{{ asset('storage/' . $ambassador->image) }}">

                                    </div>
                                    <div class="ambass-details">
                                        <h5>{{ $ambassador->name }}</h5>
                                        <div class="divider-gold"></div>
                                        <p>{{ $ambassador->designation }}</p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pad100"
            style="background:url(https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?w=1920&h=800&fit=crop&q=80
);background-attachment:fixed;height:750px;background-attachment:fixed;background-position:center center;position:relative">
            <div class="bg-blacks" style="position:absolute;top:0;width:100%;height:100%;background:#00000052"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center" style="position:relative">
                        <h2 class="heading mb-3 text-white">Our Teams</h2>
                        <p class="text-white">8 powerful franchises representing every corner of Haryana. Choose your side.
                        </p>
                    </div>
                    <div class="col-md-12">
                        <!-- Dynamic Teams (Hidden for now as requested) -->

                        <div class="team-slider">
                            @foreach ($teams as $team)
                                <div class="team-card">
                                    <div class="team-logo">
                                        @if ($team->logo)
                                            <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}"
                                                style="width: 64px; height: 64px; object-fit: contain;">
                                        @else
                                            🛡️
                                        @endif
                                    </div>
                                    <div class="team-name">{{ $team->name }}</div>
                                    <div class="team-city">{{ $team->city }}</div>
                                </div>
                            @endforeach
                        </div>



                        <div class="team-slider">
                            <div class="team-card">
                                <!--<a jref="rohtak-warriors.php"> </a>-->
                                <div class="team-logo">⚔️</div>
                                <div class="team-name">Rohtak Warriors</div>
                                <div class="team-city">Rohtak</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🦅</div>
                                <div class="team-name">Hisar Titans</div>
                                <div class="team-city">Hisar</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">👑</div>
                                <div class="team-name">Sirsa Royals</div>
                                <div class="team-city">Sirsa</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🏔️</div>
                                <div class="team-name">Gurugram Giants</div>
                                <div class="team-city">Gurugram</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🐆</div>
                                <div class="team-name">Sonipat Tigers</div>
                                <div class="team-city">Sonipat</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🦁</div>
                                <div class="team-name">Karnal Kings</div>
                                <div class="team-city">Karnal</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🦈</div>
                                <div class="team-name">Faridabad Fighters</div>
                                <div class="team-city">Faridabad</div>
                            </div>
                            <div class="team-card">
                                <div class="team-logo">🦊</div>
                                <div class="team-name">Ambala Avengers</div>
                                <div class="team-city">Ambala</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="pad100">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <h2 class="heading mb-2">Latest News</h2>
                        <p>Stay updated with the latest from Haryana Cricket Premier League.</p>
                    </div>

                    <div class="col-md-12">
                        <div class="news-grid">
                            @foreach ($news as $article)
                                <div class="news-card" onclick="openNewsModal({{ $article->id }})">
                                    @if ($article->image)
                                        <img class="news-img" src="{{ asset('storage/' . $article->image) }}"
                                            alt="{{ $article->title }}" id="news_img_{{ $article->id }}">
                                    @else
                                        <img class="news-img"
                                            src="https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?w=600&q=80"
                                            alt="{{ $article->title }}" id="news_img_{{ $article->id }}">
                                    @endif
                                    <div class="news-body">
                                        <div class="news-tag" id="news_tag_{{ $article->id }}">
                                            {{ $article->category->name }}</div>
                                        <div class="news-date" id="news_date_{{ $article->id }}">
                                            {{ \Carbon\Carbon::parse($article->published_at)->format('d M Y') }}</div>
                                        <div class="news-title" id="news_title_{{ $article->id }}">
                                            {{ $article->title }}</div>
                                        <div class="hidden" id="news_content_{{ $article->id }}">{!! nl2br(e($article->content)) !!}
                                        </div>
                                        <button class="news-read"
                                            style="background:none; border:none; padding:0; cursor:pointer;">Read More
                                            →</button>
                                    </div>
                                </div>
                            @endforeach

                            {{-- ... static content ... --}}
                        </div>
                    </div>

        </section>

        <!-- Premium News Modal -->
        <div id="newsModal"
            style="display:none; position:fixed; inset:0; z-index:99999; align-items:center; justify-content:center; padding:1.5rem;">
            <div class="absolute inset-0 bg-slate-950/95" onclick="closeNewsModal()"
                style="position:absolute; inset:0; background:rgba(2, 6, 23, 0.95);"></div>

            <div class="relative bg-white w-full max-w-3xl max-h-[85vh] overflow-hidden rounded-[2.5rem] shadow-[0_32px_64px_-12px_rgba(0,0,0,0.5)] animate-in zoom-in duration-500"
                style="position:relative; background:white; width:100%; max-width:48rem; max-height:85vh; border-radius:2.5rem; display:flex; flex-direction:column;">

                <!-- Elegant Cross Button -->
                <button onclick="closeNewsModal()"
                    style="position:absolute; top:1.5rem; right:1.5rem; width:2.5rem; height:2.5rem; background:rgba(15, 23, 42, 0.05); border:none; border-radius:12px; cursor:pointer; display:flex; align-items:center; justify-content:center; z-index:10; transition:all 0.4s ease;"
                    onmouseover="this.style.background='#fbbf24'; this.style.transform='rotate(90deg)';"
                    onmouseout="this.style.background='rgba(15, 23, 42, 0.05)'; this.style.transform='rotate(0deg)';">
                    <span class="material-symbols-outlined"
                        style="font-size:20px; font-weight:bold; color:#0f172a;">close</span>
                </button>

                <!-- Scrollable Content -->
                <div style="overflow-y:auto; flex:1; scrollbar-width: thin;">
                    <!-- Header Image with Gradient -->
                    <div style="position:relative; width:100%; aspect-ratio:21/9; overflow:hidden; background:#0f172a;">
                        <img id="modal_img" src="" style="width:100%; height:100%; object-fit:cover;">
                        <div
                            style="position:absolute; inset:0; background:linear-gradient(to top, #fff 0%, transparent 80%);">
                        </div>
                    </div>

                    <div style="padding:2.5rem 3.5rem;">
                        <div id="modal_tag"
                            style="display:inline-flex; align-items:center; gap:0.5rem; padding:0.4rem 1rem; background:#fbbf24; color:#000; border-radius:0.75rem; font-size:11px; font-weight:900; text-transform:uppercase; letter-spacing:0.15em; margin-bottom:1.5rem;">
                            <span class="material-symbols-outlined" style="font-size:16px;">stars</span>
                            <span id="modal_tag_text">CATEGORY</span>
                        </div>

                        <h2 id="modal_title"
                            style="font-size:2.5rem; font-weight:900; color:#0f172a; margin-bottom:1rem; line-height:1.1; letter-spacing:-0.02em;">
                            Article Title</h2>

                        <div
                            style="display:flex; flex-wrap:wrap; align-items:center; gap:1.5rem; margin-bottom:2.5rem; padding-bottom:1.5rem; border-bottom:1px solid #f1f5f9;">
                            <div
                                style="display:flex; align-items:center; gap:0.5rem; color:#64748b; font-size:13px; font-weight:700;">
                                <span class="material-symbols-outlined"
                                    style="font-size:18px; color:#fbbf24;">calendar_today</span>
                                <span id="modal_date">15 May 2026</span>
                            </div>
                        </div>

                        <div id="modal_content"
                            style="color:#334155; line-height:1.8; font-weight:500; font-size:17px; text-align:justify;">
                            <!-- Content -->
                        </div>

                        <div
                            style="margin-top:4rem; padding-top:2.5rem; border-top:2px solid #f8fafc; display:flex; justify-content:center;">
                            <button onclick="closeNewsModal()"
                                style="padding:1rem 2.5rem; background:#0f172a; color:white; border-radius:1.25rem; font-weight:900; font-size:12px; text-transform:uppercase; letter-spacing:0.1em; border:none; cursor:pointer; transition:all 0.3s; box-shadow:0 10px 15px -3px rgba(15,23,42,0.2);"
                                onmouseover="this.style.transform='scale(1.05)'"
                                onmouseout="this.style.transform='scale(1)'">
                                Back to News Feed
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function openNewsModal(id) {
                try {
                    const title = document.getElementById('news_title_' + id).innerText;
                    const tag = document.getElementById('news_tag_' + id).innerText;
                    const date = document.getElementById('news_date_' + id).innerText;
                    const img = document.getElementById('news_img_' + id).src;
                    const content = document.getElementById('news_content_' + id).innerHTML;

                    document.getElementById('modal_title').innerText = title;
                    document.getElementById('modal_tag_text').innerText = tag;
                    document.getElementById('modal_date').innerText = date;
                    document.getElementById('modal_img').src = img;
                    document.getElementById('modal_content').innerHTML = content;

                    const modal = document.getElementById('newsModal');
                    modal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                } catch (err) {
                    console.error("Popup Error:", err);
                }
            }

            function closeNewsModal() {
                const modal = document.getElementById('newsModal');
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        </script>



        <script>
            const sc = document.getElementById('stars');
            for (let i = 0; i < 90; i++) {
                const s = document.createElement('div');
                s.className = 'star';
                const sz = Math.random() < 0.2 ? 3 : Math.random() < 0.55 ? 2 : 1;
                s.style.cssText =
                    `width:${sz}px;height:${sz}px;background:${Math.random()>0.45?'#b0d0ff':'#ffffff'};left:${Math.random()*100}%;top:${Math.random()*100}%;animation-delay:${Math.random()*4}s;animation-duration:${1.8+Math.random()*3}s;`;
                sc.appendChild(s);
            }
        </script>


    @endsection
