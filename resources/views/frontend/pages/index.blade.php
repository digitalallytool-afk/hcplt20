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
                                                <h1 class="title-main">HARYANA CORPORATE<br><span>PREMIER LEAGUE</span></h1>
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
                                        <p class="tagline">From Grounds to Glory &nbsp;&nbsp;<span class="hashtag-badge-brush banner-size"><span class="lath">#Lath</span><span class="gaddiya">GadDiya</span></span></p>
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

        <!-- Home Page Registration & Benefits Section -->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Caveat+Brush&family=Dancing+Script:wght@700&family=Kaushan+Script&family=Water+Brush&family=Yellowtail&display=swap');
            .hashtag-badge-cursive {
                font-family: 'Dancing Script', cursive;
                font-size: 1.8rem;
                font-weight: 700;
                color: #ff6600;
                display: inline-block;
                letter-spacing: 1.5px;
                margin: 5px 0;
                text-shadow: 0 0 10px rgba(255, 102, 0, 0.2);
            }
            .hashtag-badge-brush {
                font-family: 'Water Brush', cursive;
                font-weight: 700;
                color: #0a1c3e; /* Navy blue matching the image */
                -webkit-text-stroke: 1.2px #0a1c3e; /* Artificially thickens the brush stroke */
                display: inline-block;
                letter-spacing: 0.5px;
                margin: 5px 0;
                text-shadow: none;
                text-transform: none !important; /* Preserves the exact case: #LathGadDiya */
                vertical-align: middle;
            }
            .hashtag-badge-brush.orange {
                color: #ff6600 !important;
                -webkit-text-stroke: 1.2px #ff6600 !important;
            }
            .hashtag-badge-brush .lath {
                color: #ff6600 !important;
                -webkit-text-stroke: 1.2px #ff6600 !important;
            }
            .hashtag-badge-brush .gaddiya {
                color: #0a1c3e;
                -webkit-text-stroke: 1.2px #0a1c3e;
            }
            /* Dark background contexts */
            .banner-caption .hashtag-badge-brush .gaddiya,
            .hashtag-badge-brush.on-dark .gaddiya,
            .hashtag-badge-brush.orange .gaddiya {
                color: #ffffff !important;
                -webkit-text-stroke: 1.2px #ffffff !important;
            }
            
            /* Sizing classes */
            .hashtag-badge-brush.banner-size {
                font-size: 3.2rem;
            }
            .hashtag-badge-brush.heading-size {
                font-size: 3rem;
            }
            .hashtag-badge-brush.normal-size {
                font-size: 2.2rem;
            }

            /* Responsive queries */
            @media (max-width: 991px) {
                .hashtag-badge-brush.banner-size {
                    font-size: 2.4rem;
                }
                .hashtag-badge-brush.heading-size {
                    font-size: 2.2rem;
                }
                .hashtag-badge-brush.normal-size {
                    font-size: 1.8rem;
                }
            }
            @media (max-width: 575px) {
                .hashtag-badge-brush.banner-size {
                    font-size: 2rem;
                    display: block;
                    margin-top: 5px;
                    margin-left: 0 !important;
                }
                .hashtag-badge-brush.heading-size {
                    font-size: 1.8rem;
                    display: block;
                    margin-top: 5px;
                    margin-left: 0 !important;
                }
                .hashtag-badge-brush.normal-size {
                    font-size: 1.5rem;
                }
            }

            .hashtag-badge-kaushan {
                font-family: 'Kaushan Script', cursive;
                font-size: 2.2rem;
                font-weight: 700;
                color: #0a1c3e;
                -webkit-text-stroke: 0.8px #0a1c3e;
                display: inline-block;
                letter-spacing: 0.5px;
                margin: 5px 0;
                text-shadow: none;
                text-transform: none !important;
            }
            .hashtag-badge-kaushan.orange {
                color: #ff6600 !important;
                -webkit-text-stroke: 0.8px #ff6600 !important;
            }
            .hashtag-badge-caveat {
                font-family: 'Caveat Brush', cursive;
                font-size: 2.4rem;
                font-weight: 700;
                color: #0a1c3e;
                -webkit-text-stroke: 0.5px #0a1c3e;
                display: inline-block;
                letter-spacing: 0.5px;
                margin: 5px 0;
                text-shadow: none;
                text-transform: none !important;
            }
            .hashtag-badge-caveat.orange {
                color: #ff6600 !important;
                -webkit-text-stroke: 0.5px #ff6600 !important;
                text-transform: none !important;
            }
            /* ===== Navy Section Text Overrides ===== */
            /* Targets headings and paragraphs inside any section with Navy bg */
            section[style*="background: #0a1c3e"] .heading,
            section[style*="background: #0a1c3e"] h1,
            section[style*="background: #0a1c3e"] h2,
            section[style*="background: #0a1c3e"] h3,
            section[style*="background: #0a1c3e"] h4 {
                /* color: #ffffff !important; */
            }
            section[style*="background: #0a1c3e"] > .container > .row > div > p,
            section[style*="background: #0a1c3e"] .col-md-12.text-center > p {
                color: #cbd5e1 !important;
            }

            /* ===== Trial Cards on Navy Background ===== */
            /* Force white card bg since --card variable was invalid */
            section[style*="background: #0a1c3e"] .trial-card {
                background: #ffffff !important;
                border: 1px solid rgba(255,255,255,0.15) !important;
                box-shadow: 0 8px 25px rgba(0,0,0,0.25) !important;
            }
            section[style*="background: #0a1c3e"] .trial-card .trial-name {
                color: #0a1c3e !important;
            }
            section[style*="background: #0a1c3e"] .trial-card .trial-meta-item {
                color: #334155 !important;
            }
            section[style*="background: #0a1c3e"] .trial-card .trial-header {
                border-bottom-color: rgba(10,28,62,0.1) !important;
            }

            .home-reg-section {
                background: #0a1c3e;
                border-bottom: 1px solid rgba(255,255,255,0.06);
                position: relative;
                overflow: hidden;
            }

            .home-reg-section > .container {
                position: relative;
                z-index: 2;
            }

            .badge-tag {
                display: inline-block;
                padding: 6px 14px;
                background: rgba(244, 194, 66, 0.15);
                border: 1px solid rgba(244, 194, 66, 0.4);
                color: #d9a82e;
                border-radius: 50px;
                font-size: 0.75rem;
                font-weight: 800;
                letter-spacing: 1.5px;
                margin-bottom: 15px;
            }

            .benefits-intro h2 {
                color: #ffffff;
                font-family: 'DM Sans', sans-serif;
                font-weight: 800;
                font-size: 2.5rem;
            }

            .benefits-intro p.lead-text {
                color: #cbd5e1;
                font-size: 1.05rem;
                line-height: 1.6;
            }

            .benefit-points-grid {
                display: flex;
                flex-direction: column;
                gap: 20px;
            }

            .benefit-point-card {
                display: flex;
                align-items: flex-start;
                gap: 20px;
                background: rgba(255, 255, 255, 0.06);
                border: 1px solid rgba(255, 255, 255, 0.12);
                padding: 20px;
                border-radius: 16px;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            }

            .benefit-point-card:hover {
                background: rgba(233, 187, 23, 0.08);
                border-color: rgba(233, 187, 23, 0.3);
                transform: translateX(8px);
                box-shadow: 0 10px 25px rgba(233, 187, 23, 0.08);
            }

            .benefit-card-icon {
                font-size: 2rem;
                background: rgba(244, 194, 66, 0.1);
                border: 1px solid rgba(244, 194, 66, 0.3);
                width: 60px;
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
                border-radius: 14px;
                flex-shrink: 0;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
                transition: all 0.3s ease;
            }

            .benefit-point-card:hover .benefit-card-icon {
                background: #f4c242;
                border-color: #f4c242;
                color: #000;
                transform: scale(1.05);
            }

            .benefit-card-content h4 {
                color: #ffffff;
                font-size: 1.15rem;
                font-weight: 700;
                margin-bottom: 6px;
                transition: color 0.3s ease;
            }

            .benefit-point-card:hover .benefit-card-content h4 {
                color: #e9bb17;
            }

            .benefit-card-content p {
                color: #94a3b8;
                margin-bottom: 0;
                font-size: 0.92rem;
                line-height: 1.5;
            }

            .home-wizard-card {
                background: #ffffff;
                border: 1px solid #eedec3;
                border-radius: 24px;
                box-shadow: 0 20px 50px rgba(10, 28, 62, 0.08);
                overflow: hidden;
            }

            .home-wizard-header {
                background: linear-gradient(135deg, #0a1c3e 0%, #06122c 100%);
                padding: 35px 40px 25px 40px;
                border-bottom: 1px solid rgba(255, 255, 255, 0.05);
                text-align: center;
            }

            .home-wizard-header h3 {
                color: #ffffff;
                font-family: 'DM Sans', sans-serif;
                font-weight: 800;
                font-size: 2.2rem;
                margin-bottom: 4px;
            }

            .home-wizard-header p {
                color: #f4c242;
                font-size: 1.05rem;
                font-weight: 700;
                letter-spacing: 2px;
                text-transform: uppercase;
                margin-bottom: 25px;
            }

            .compact-stepper {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
            }

            .compact-step {
                display: flex;
                align-items: center;
                gap: 8px;
                opacity: 0.4;
                transition: all 0.3s ease;
            }

            .compact-step.active {
                opacity: 1;
            }

            .compact-step .step-num {
                width: 34px;
                height: 34px;
                border-radius: 50%;
                border: 2px solid #f4c242;
                color: #f4c242;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.85rem;
                font-weight: 700;
            }

            .compact-step.active .step-num {
                background: #f4c242;
                color: #000000;
            }

            .compact-step .step-txt {
                color: #ffffff;
                font-size: 0.95rem;
                font-weight: 700;
                text-transform: uppercase;
            }

            .compact-step-line {
                flex-grow: 0;
                width: 30px;
                height: 2px;
                background: rgba(255, 255, 255, 0.15);
            }

            .compact-step.active + .compact-step-line {
                background: #f4c242;
            }

            .home-wizard-body {
                padding: 50px 40px;
            }

            .step-desc {
                color: #718096;
                font-size: 1.1rem;
                line-height: 1.5;
                margin-bottom: 25px;
            }

            .light-input {
                background: #fcfcfc !important;
                border: 2px solid #e2e8f0 !important;
                color: #2d3748 !important;
                padding: 16px 20px !important;
                font-size: 1.1rem !important;
                border-radius: 10px !important;
                transition: all 0.3s ease !important;
            }

            .light-input:focus {
                background: #ffffff !important;
                border-color: #f4c242 !important;
                box-shadow: 0 0 0 4px rgba(244, 194, 66, 0.15) !important;
            }

            .light-input::placeholder {
                color: #a0aec0 !important;
            }

            .form-label-dark {
                font-weight: 700;
                text-transform: uppercase;
                font-size: 0.95rem;
                letter-spacing: 1px;
                color: #4a5568;
                margin-bottom: 8px;
                display: block;
            }

            .btn-gold-neon {
                background: #f4c242;
                color: #000000;
                font-weight: 800;
                padding: 16px 30px;
                border-radius: 10px;
                border: none;
                text-transform: uppercase;
                letter-spacing: 1px;
                font-size: 1.05rem;
                transition: all 0.3s ease;
                box-shadow: 0 6px 20px rgba(244, 194, 66, 0.15);
            }

            .btn-gold-neon:hover {
                background: #0a1c3e;
                color: #ffffff;
                transform: translateY(-2px);
                box-shadow: 0 8px 25px rgba(10, 28, 62, 0.2);
            }

            .btn-gold-neon:disabled {
                opacity: 0.7;
                cursor: not-allowed;
            }

            @media (max-width: 575px) {
                .home-wizard-header {
                    padding: 30px 20px 20px 20px;
                }
                .home-wizard-body {
                    padding: 30px 20px;
                }
                .compact-step .step-txt {
                    display: none;
                }
                .benefits-intro h2 {
                    font-size: 2rem;
                }
            }

            .btn-navy-cta {
                display: inline-block;
                background: #0a1c3e !important;
                color: #ffffff !important;
                border: 2px solid #ffffff !important;
                padding: 12px 32px !important;
                font-weight: 800 !important;
                font-size: 0.95rem !important;
                text-transform: uppercase !important;
                letter-spacing: 1px !important;
                border-radius: 8px !important;
                box-shadow: 0 4px 15px rgba(10, 28, 62, 0.15) !important;
                transition: all 0.3s ease !important;
                text-decoration: none !important;
            }
            .btn-navy-cta:hover {
                background: #ff6600 !important;
                color: #ffffff !important;
                border-color: #ff6600 !important;
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(255, 102, 0, 0.25) !important;
            }

            /* Custom Styles for Home Videos Section (White Theme) */
            .home-videos-section {
                background: #ffffff !important;
                position: relative;
                border-top: 1px solid rgba(10, 28, 62, 0.06);
                border-bottom: 1px solid rgba(10, 28, 62, 0.06);
                overflow: hidden;
                padding: 100px 0;
            }
            .video-glow-accent-1 {
                position: absolute;
                top: -10%;
                left: -10%;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(10, 28, 62, 0.08) 0%, transparent 70%);
                z-index: 1;
                pointer-events: none;
            }
            .video-glow-accent-2 {
                position: absolute;
                bottom: -10%;
                right: -10%;
                width: 450px;
                height: 450px;
                background: radial-gradient(circle, rgba(255, 102, 0, 0.1) 0%, transparent 70%);
                z-index: 1;
                pointer-events: none;
            }
            .video-section-header {
                position: relative;
                z-index: 2;
                margin-bottom: 50px;
            }
            .video-section-header h2 {
                font-family: 'DM Sans', sans-serif;
                font-weight: 1000;
                font-size: 2.6rem;
                text-transform: uppercase;
                color: #0a1c3e;
            }
            .video-section-header p {
                color: #475569;
                font-size: 1.05rem;
                max-width: 700px;
                margin: 12px auto 0 auto;
            }
            .video-grid-container {
                position: relative;
                z-index: 2;
            }
            .home-video-card-v2 {
                background: #ffffff !important;
                border: 1px solid rgba(10, 28, 62, 0.08) !important;
                border-radius: 24px !important;
                overflow: hidden;
                height: 100%;
                transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
                box-shadow: 0 15px 35px rgba(10, 28, 62, 0.05) !important;
                display: flex;
                flex-direction: column;
            }
            .home-video-card-v2:hover {
                transform: translateY(-8px);
                border-color: rgba(255, 102, 0, 0.4) !important;
                box-shadow: 0 25px 50px rgba(255, 102, 0, 0.15) !important;
            }
            .video-frame-container {
                position: relative;
                width: 100%;
                aspect-ratio: 16/9;
                background: #000;
                border-bottom: 1px solid rgba(10, 28, 62, 0.08);
            }
            .video-thumbnail-overlay {
                position: absolute;
                inset: 0;
                cursor: pointer;
                overflow: hidden;
                z-index: 5;
            }
            .video-thumbnail-overlay img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            }
            .home-video-card-v2:hover .video-thumbnail-overlay img {
                transform: scale(1.05);
            }
            .video-black-gradient {
                position: absolute;
                inset: 0;
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0.5) 100%);
                transition: background 0.3s ease;
            }
            .home-video-card-v2:hover .video-black-gradient {
                background: linear-gradient(to bottom, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.65) 100%);
            }
            .video-play-btn-wrapper {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 76px;
                height: 76px;
                background: #ff6600;
                border: 3px solid #ffffff;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 25px rgba(255, 102, 0, 0.45);
                transition: all 0.35s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                z-index: 6;
            }
            .video-play-btn-wrapper svg {
                transition: all 0.3s ease;
                fill: #ffffff !important;
                transform: translateX(2px);
            }
            .home-video-card-v2:hover .video-play-btn-wrapper {
                background: #ffffff;
                border-color: #ff6600;
                box-shadow: 0 15px 35px rgba(255, 102, 0, 0.5);
                transform: translate(-50%, -50%) scale(1.15);
            }
            .home-video-card-v2:hover .video-play-btn-wrapper svg {
                fill: #ff6600 !important;
            }

            @keyframes playBtnPulse {
                0% {
                    box-shadow: 0 0 0 0 rgba(255, 102, 0, 0.5);
                }
                70% {
                    box-shadow: 0 0 0 15px rgba(255, 102, 0, 0);
                }
                100% {
                    box-shadow: 0 0 0 0 rgba(255, 102, 0, 0);
                }
            }
            .video-play-btn-wrapper {
                animation: playBtnPulse 2s infinite;
            }
            .home-video-card-v2:hover .video-play-btn-wrapper {
                animation: none;
            }

            .video-card-content-v2 {
                padding: 24px;
                display: flex;
                flex-direction: column;
                flex-grow: 1;
            }
            .video-card-title-v2 {
                color: #0a1c3e;
                font-size: 1.3rem;
                font-weight: 800;
                margin-bottom: 10px;
                font-family: 'DM Sans', sans-serif;
                display: flex;
                align-items: center;
                gap: 8px;
            }
            .video-card-desc-v2 {
                color: #475569;
                font-size: 0.95rem;
                line-height: 1.5;
                margin-bottom: 20px;
            }
            .video-topics-title {
                font-size: 0.8rem;
                font-weight: 700;
                text-transform: uppercase;
                color: #ff6600;
                letter-spacing: 0.8px;
                margin-bottom: 12px;
            }
            .video-badge-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
            .video-topic-badge {
                background: #f8fafc;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                padding: 8px 12px;
                display: flex;
                align-items: center;
                gap: 8px;
                transition: all 0.3s ease;
            }
            .video-topic-badge:hover {
                background: rgba(255, 102, 0, 0.05);
                border-color: rgba(255, 102, 0, 0.2);
            }
            .video-badge-icon {
                font-size: 1.15rem;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #ff6600;
            }
            .video-badge-text {
                font-size: 0.82rem;
                font-weight: 700;
                color: #1e293b;
            }

            @media (max-width: 575px) {
                .video-badge-grid {
                    grid-template-columns: 1fr;
                }
                .video-section-header h2 {
                    font-size: 2rem;
                }
            }

            /* Stats Section Styling */
            .league-stats-section {
                background: #ffffff !important;
                padding: 0 0 100px 0;
                position: relative;
                z-index: 10;
                clear: both;
            }
            .stats-navy-card {
                background: linear-gradient(135deg, #0a1c3e 0%, #061128 100%) !important;
                border-radius: 24px !important;
                padding: 50px 40px !important;
                box-shadow: 0 20px 45px rgba(10, 28, 62, 0.18) !important;
                position: relative;
                overflow: hidden;
                border: 1px solid rgba(255, 255, 255, 0.08);
            }
            .stats-glow-1 {
                position: absolute;
                top: -50px;
                right: -50px;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(255, 102, 0, 0.15) 0%, transparent 70%);
                pointer-events: none;
            }
            .stats-glow-2 {
                position: absolute;
                bottom: -50px;
                left: -50px;
                width: 200px;
                height: 200px;
                background: radial-gradient(circle, rgba(100, 170, 255, 0.15) 0%, transparent 70%);
                pointer-events: none;
            }
            .stat-item {
                padding: 10px;
                transition: transform 0.3s ease;
            }
            .stat-item:hover {
                transform: translateY(-5px);
            }
            .stat-divider {
                border-left: 1px solid rgba(255, 255, 255, 0.1);
            }
            @media (max-width: 991px) {
                .stat-divider {
                    border-left: none !important;
                    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
                    padding-bottom: 25px;
                    margin-bottom: 10px;
                }
                .stats-navy-card .col-md-6:last-child .stat-divider,
                .stats-navy-card .col-lg-3:last-child .stat-divider {
                    border-bottom: none !important;
                    padding-bottom: 0;
                    margin-bottom: 0;
                }
                .league-stats-section {
                    padding: 0 0 70px 0;
                }
            }

            /* Chief Mentor Section Styling */
            .chief-mentor-section {
                background: #0a1c3e !important;
                padding: 100px 0;
                position: relative;
                overflow: hidden;
                z-index: 10;
                clear: both;
            }
            .chief-mentor-watermark {
                position: absolute;
                bottom: -30px;
                right: -30px;
                width: 380px;
                height: 380px;
                opacity: 0.04;
                z-index: 1;
                pointer-events: none;
            }
            .mentor-card-v2 {
                background: #ffffff;
                border: 1px solid rgba(10, 28, 62, 0.06);
                border-radius: 28px;
                padding: 40px;
                box-shadow: 0 20px 45px rgba(10, 28, 62, 0.04);
                position: relative;
                z-index: 2;
                transition: all 0.3s ease;
            }
            .mentor-card-v2:hover {
                box-shadow: 0 30px 60px rgba(10, 28, 62, 0.08);
            }
            .mentor-image-container {
                position: relative;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 15px 35px rgba(10, 28, 62, 0.1);
                border: 3px solid #ffffff;
            }
            .mentor-image-container::after {
                content: '';
                position: absolute;
                inset: 0;
                border: 2px solid #ff6600;
                border-radius: 17px;
                pointer-events: none;
                opacity: 0.8;
            }
            .mentor-image-container img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.5s ease;
            }
            .mentor-card-v2:hover .mentor-image-container img {
                transform: scale(1.04);
            }
            .mentor-info-container {
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 100%;
                padding-left: 20px;
            }
            .mentor-name {
                font-family: 'DM Sans', sans-serif;
                font-weight: 900;
                font-size: 2.5rem;
                color: #0a1c3e;
                margin-top: 10px;
                margin-bottom: 6px;
            }
            .mentor-designation {
                font-weight: 700;
                font-size: 1.15rem;
                color: #ff6600;
                margin-bottom: 20px;
                text-transform: uppercase;
                letter-spacing: 0.5px;
            }
            .mentor-desc {
                color: #475569;
                font-size: 1.05rem;
                line-height: 1.7;
                margin-bottom: 0;
            }
            @media (max-width: 991px) {
                .mentor-info-container {
                    padding-left: 0;
                    margin-top: 30px;
                }
                .mentor-name {
                    font-size: 2rem;
                }
                .chief-mentor-section {
                    padding: 70px 0;
                }
            }
            .gender-title {
                font-family: "Bebas Neue", sans-serif;
                font-size: clamp(24px, 5vw, 36px);
                letter-spacing: 5px;
                color: #ff6600;
                text-shadow: 0 0 20px rgba(255, 102, 0, 0.45);
                margin-top: 10px;
                text-transform: uppercase;
                font-weight: normal;
            }
        </style>

        <section class="home-reg-section pad100">
            <div class="container">
                <div class="row align-items-stretch gx-lg-5">
                    <!-- Left Column: Benefits -->
                    <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                        <div class="benefits-intro">
                            <span class="badge-tag" style="background: rgba(233,187,23,0.12); border-color: rgba(233,187,23,0.4); color: #e9bb17;">HARYANA CORPORATE PREMIER LEAGUE</span>
                            <h2 class="heading mt-2 mb-3">Why Play in HCPL? <span class="hashtag-badge-brush orange heading-size" style="margin-left: 10px;">#LathGadDiya</span></h2>
                            <p class="lead-text">Take your cricket career to the next level. Show your skills, get scouted, and compete at the professional level.</p>
                        </div>
                        
                        <div class="benefit-points-grid mt-4">
                            <!-- Point 1 -->
                            <div class="benefit-point-card">
                                <div class="benefit-card-icon">🏏</div>
                                <div class="benefit-card-content">
                                    <h4>Opportunity to Play in a Professional League</h4>
                                    <p>Get the opportunity to play in a structured, professional T20 cricket league in Haryana.</p>
                                </div>
                            </div>
                            
                            <!-- Point 2 -->
                            <div class="benefit-point-card">
                                <div class="benefit-card-icon">🔍</div>
                                <div class="benefit-card-content">
                                    <h4>Professional Franchise Scouting</h4>
                                    <p>Professional selectors and franchise owners scouting talent directly from the trials.</p>
                                </div>
                            </div>
                            
                            <!-- Point 3 -->
                            <div class="benefit-point-card">
                                <div class="benefit-card-icon">📺</div>
                                <div class="benefit-card-content">
                                    <h4>Exposure and Recognition on LIVE Broadcast</h4>
                                    <p>Matches broadcasted LIVE on professional streaming networks for national recognition.</p>
                                </div>
                            </div>
                            
                            <!-- Point 4 -->
                            <div class="benefit-point-card">
                                <div class="benefit-card-icon">🏆</div>
                                <div class="benefit-card-content">
                                    <h4>Prize Pool and Rewards</h4>
                                    <p>Compete for a total prize pool of ₹1 Crore, trophies, cars, bikes, and other rewards.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Registration Form -->
                    <div class="col-lg-6 col-md-12 d-flex">
                        <div class="home-wizard-card w-100 d-flex flex-column justify-content-between">
                            <div class="home-wizard-header">
                                <h3>Player Registration</h3>
                                <p>JOIN THE LEAGUE OF CHAMPIONS</p>
                                
                                <!-- Compact Horizontal Stepper -->
                                <div class="compact-stepper">
                                    <div class="compact-step active" id="step1-nav">
                                        <div class="step-num">1</div>
                                        <div class="step-txt">Contact</div>
                                    </div>
                                    <div class="compact-step-line"></div>
                                    <div class="compact-step" id="step2-nav">
                                        <div class="step-num">2</div>
                                        <div class="step-txt">Verify</div>
                                    </div>
                                    <div class="compact-step-line"></div>
                                    <div class="compact-step" id="step3-nav">
                                        <div class="step-num">3</div>
                                        <div class="step-txt">Security</div>
                                    </div>
                                </div>
                            </div>

                            <div class="home-wizard-body d-flex flex-column justify-content-between" style="flex-grow: 1; padding: 40px 40px;">
                                {{-- <form id="playerForm">
                                    @csrf
                                    <!-- Step 1: Contact Details -->
                                    <div id="step1">
                                        <p class="step-desc">Enter your 10-digit mobile number or email address to verify your account.</p>
                                        <div id="alert-error-1" class="alert alert-danger" style="display: none;"></div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label-dark">Mobile Number or Email ID</label>
                                            <input type="text" id="contact_input" class="form-control light-input" placeholder="e.g. 9876543210 or name@email.com">
                                            <input type="hidden" id="contact_type" value="">
                                        </div>
                                        
                                        <button type="button" class="btn btn-gold-neon w-100" id="btn-send-otp">
                                            Send OTP <i class="fa fa-spinner fa-spin ms-2" id="loader-1" style="display: none;"></i>
                                        </button>
                                    </div>

                                    <!-- Step 2: Verification -->
                                    <div id="step2" style="display: none;">
                                        <p class="step-desc">Enter the 6-digit OTP sent to <strong id="sent-contact-label" class="text-warning"></strong></p>
                                        <div id="alert-error-2" class="alert alert-danger" style="display: none;"></div>
                                        <div id="alert-success-2" class="alert alert-success" style="display: none;"></div>
                                        
                                        <div class="mb-4">
                                            <label class="form-label-dark">Enter OTP</label>
                                            <input type="text" id="otp_input" class="form-control light-input text-center" placeholder="000000" maxlength="6" style="letter-spacing: 4px; font-size: 1.25rem;">
                                        </div>
                                        
                                        <button type="button" class="btn btn-gold-neon w-100" id="btn-verify-otp">
                                            Verify OTP <i class="fa fa-spinner fa-spin ms-2" id="loader-2" style="display: none;"></i>
                                        </button>
                                        
                                        <div class="text-center mt-3">
                                            <button type="button" class="btn btn-link text-decoration-none" id="btn-resend-otp" disabled style="color: #ff6600; font-weight: 700; padding: 0; background: none; border: none; font-size: 1rem;">
                                                Resend OTP <span id="resend-timer">(60s)</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Step 3: Security -->
                                    <div id="step3" style="display: none;">
                                        <p class="step-desc">Set a strong password to secure your player account.</p>
                                        <div id="alert-error-3" class="alert alert-danger" style="display: none;"></div>
                                        
                                        <div class="mb-3">
                                            <label class="form-label-dark">Create Password</label>
                                            <input type="password" id="password" class="form-control light-input" placeholder="At least 8 characters">
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label-dark">Confirm Password</label>
                                            <input type="password" id="password_confirmation" class="form-control light-input" placeholder="Repeat password">
                                        </div>
                                        
                                        <button type="button" class="btn btn-gold-neon w-100" id="btn-create-password">
                                            Complete Registration <i class="fa fa-spinner fa-spin ms-2" id="loader-3" style="display: none;"></i>
                                        </button>
                                    </div>
                                </form> --}}

                                <!-- Registration Opening Soon Notice -->
                                <div class="text-center py-1" style="background: #f8fafc; border: 2px dashed rgba(255, 102, 0, 0.2); border-radius: 16px; margin: 2px 0;">
                                    <div style="font-size: 3rem; margin-bottom: 15px; filter: drop-shadow(0 4px 10px rgba(0,0,0,0.1));">🏏</div>
                                    <h4 style="color: #0a1c3e; font-family: 'DM Sans', sans-serif; font-weight: 800; font-size: 1.6rem; margin-bottom: 8px;">Registration Opening Soon</h4>
                                    <p style="color: #475569; font-size: 0.95rem; margin-bottom: 0; max-width: 320px; margin-left: auto; margin-right: auto; line-height: 1.5;">
                                        Stay tuned! The online player registration portal will be live shortly for Season 1 trials.
                                    </p>
                                </div>

                                <!-- Trust Badges / Key Highlights -->
                                <div class="mt-4 pt-4" style="border-top: 1px dashed #e2e8f0; font-family: 'DM Sans', sans-serif;">
                                    <ul style="list-style: none; padding-left: 0; margin-bottom: 0; display: flex; flex-direction: column; gap: 16px;">
                                        <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 0.95rem; color: #4a5568;">
                                            <span style="color: #ff6600; font-weight: 800; font-size: 1.1rem; line-height: 1;">✓</span>
                                            <span><strong>Instant OTP Verification:</strong> Fast, secure account setup via SMS or Email.</span>
                                        </li>
                                        <li style="display: flex; align-items: flex-start; gap: 12px; font-size: 0.95rem; color: #4a5568;">
                                            <span style="color: #ff6600; font-weight: 800; font-size: 1.1rem; line-height: 1;">✓</span>
                                            <span><strong>Verified Profile Creation:</strong> Set up your profile to book trial slots in your respective zones.</span>
                                        </li>
                                       
                                    </ul>
                                </div>

                                <!-- Simple Support Link Banner -->
                                <div class="text-center mt-4 pt-3" style="border-top: 1px solid #edf2f7; font-family: 'DM Sans', sans-serif;">
                                    <p style="font-size: 0.95rem; color: #718096; margin-bottom: 0;">
                                        Need help? Contact support at <a href="mailto:support@hcplt20.com" style="color: #ff6600; text-decoration: none; font-weight: 700;">info@hcplt20.com</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pad100" style="background: #ffffff;">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-12">
                        <div class="about-left">
                            <!--<h6 class="sub-title pl-0">ABOUT SNIPPET</h6>-->
                            <h1 class="heading ">BUILDING THE FUTURE OF CRICKET IN HARYANA </h1>
                            <p>HCPL is a professional cricket league designed to give real platform to emerging and
                                corporate players.
                                With structured trials, player auctions, and competitive matches, we bring talent into the
                                spotlight.
                            </p>

                            <div class="about-features">
                                <div class="about-feature">
                                    <div class="about-feature-icon">🌟</div>
                                    <div>
                                        <h4>Our Vision</h4>
                                        <p>To transform Haryana into the powerhouse of Indian cricket by building a world-class grassroots ecosystem that uncovers exceptional talent, empowers both men and women cricketers, and creates a legacy of players who proudly carry the state's spirit onto national and international stages.</p>
                                    </div>
                                </div>
                                <div class="about-feature">
                                    <div class="about-feature-icon">🎯</div>
                                    <div>
                                        <h4>Our Mission</h4>
                                        <p>To pioneer Haryana's first professional cricket league as a launchpad for the state's next generation of stars. Through elite competition, structured development, and meaningful exposure, HCPL aims to bridge grassroots cricket with the professional game, enabling players to be discovered by franchises, state teams, and the broader cricketing ecosystem.</p>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="hashtag-container mt-4">
                                 <span class="hashtag-badge-brush heading-size"><span class="lath">#Lath</span><span class="gaddiya">GadDiya</span></span>
                            </div>

                            <div class="mt-4" style="margin-top: 25px; position: relative; z-index: 10;">
                                <a href="{{ route('player-registration') }}" class="btn-navy-cta">Register Now 🏏</a>
                            </div>

                            <!--  <a href="about-us.php" class="bnp-btn mt-4" style="">Know More About Us </a>-->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-thumb">
                            <img src="{{ asset('frontend') }}/images/home-page-about-us-image.jpeg" alt="bnp" class="w-100">
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <!-- League Statistics Card Section -->
        <section class="league-stats-section" style="background: #0a1c3e;">
            <div class="container">
                <div class="stats-navy-card">
                    <!-- Glow decoration -->
                    <div class="stats-glow-1"></div>
                    <div class="stats-glow-2"></div>
                    
                    <div class="row text-center align-items-center g-4">
                        <!-- Stat 1: Prize Pool -->
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item">
                                <div style="margin-bottom: 15px; display: flex; justify-content: center; align-items: center; height: 48px;">
                                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#ff6600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="filter: drop-shadow(0 0 12px rgba(255, 102, 0, 0.4));">
                                        <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
                                        <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
                                        <path d="M4 22h16"></path>
                                        <path d="M10 14.66V17c0 .55-.45 1-1 1H4v2h16v-2h-5c-.55 0-1-.45-1-1v-2.34"></path>
                                        <path d="M12 2a6 6 0 0 1 6 6v5a6 6 0 0 1-6 6 6 6 0 0 1-6-6V8a6 6 0 0 1 6-6z"></path>
                                    </svg>
                                </div>
                                <h2 style="color: #ff6600; font-weight: 800; font-size: 2.4rem; margin-bottom: 4px; font-family: 'DM Sans', sans-serif;">1 Cr</h2>
                                <p style="color: #cbd5e1; font-weight: 600; font-size: 0.9rem; margin-bottom: 0; text-transform: uppercase; letter-spacing: 0.5px;">Total Prize Pool</p>
                            </div>
                        </div>
                        
                        <!-- Stat 2: Districts and Cities -->
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item stat-divider">
                                <div style="margin-bottom: 15px; display: flex; justify-content: center; align-items: center; height: 48px;">
                                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="filter: drop-shadow(0 0 12px rgba(255, 255, 255, 0.3));">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <h2 style="color: #ffffff; font-weight: 800; font-size: 2.4rem; margin-bottom: 4px; font-family: 'DM Sans', sans-serif;">30+</h2>
                                <p style="color: #cbd5e1; font-weight: 600; font-size: 0.85rem; margin-bottom: 0; text-transform: uppercase; letter-spacing: 0.5px; line-height: 1.4;">Districts & Cities<br><span style="font-size: 0.75rem; text-transform: none; font-weight: 700; opacity: 0.95;">(Across North India)</span></p>
                            </div>
                        </div>
                        
                        <!-- Stat 3: On Ground Trials -->
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item stat-divider">
                                <div style="margin-bottom: 15px; display: flex; justify-content: center; align-items: center; height: 48px;">
                                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="filter: drop-shadow(0 0 12px rgba(255, 255, 255, 0.3));">
                                        <line x1="18" y1="2" x2="22" y2="6"></line>
                                        <path d="M18 2L6 14l4 4L22 6c.55-.55.55-1.45 0-2l-2-2c-.55-.55-1.45-.55-2 0z"></path>
                                        <line x1="6" y1="14" x2="3" y2="17"></line>
                                        <path d="M3 17c-.55.55-.55 1.45 0 2l1 1c.55.55 1.45.55 2 0l1-1"></path>
                                        <circle cx="15" cy="17" r="3" fill="#ff6600" stroke="#ff6600"></circle>
                                    </svg>
                                </div>
                                <h2 style="color: #ffffff; font-weight: 800; font-size: 2.4rem; margin-bottom: 4px; font-family: 'DM Sans', sans-serif;">100%</h2>
                                <p style="color: #cbd5e1; font-weight: 600; font-size: 0.9rem; margin-bottom: 0; text-transform: uppercase; letter-spacing: 0.5px;">On Ground Trials</p>
                            </div>
                        </div>
                        
                        <!-- Stat 4: Age Group -->
                        <div class="col-lg-3 col-md-6">
                            <div class="stat-item stat-divider">
                                <div style="margin-bottom: 15px; display: flex; justify-content: center; align-items: center; height: 48px;">
                                    <svg width="44" height="44" viewBox="0 0 24 24" fill="none" stroke="#ff6600" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="filter: drop-shadow(0 0 12px rgba(255, 102, 0, 0.4));">
                                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    </svg>
                                </div>
                                <h2 style="color: #ff6600; font-weight: 800; font-size: 1.7rem; margin-bottom: 6px; font-family: 'DM Sans', sans-serif; letter-spacing: -0.5px;">Age Eligibility</h2>
                                <p style="color: #cbd5e1; font-weight: 700; font-size: 0.82rem; margin-bottom: 0; line-height: 1.5; text-transform: none; text-align: center;">
                                    <span style="display: block; margin-bottom: 2px; color: #ffffff;"><strong style="color: #ff6600;">Men:</strong> Above 16</span>
                                    <span style="display: block; color: #ffffff;"><strong style="color: #ff6600;">Women:</strong> Above 16</span>
                                </p>
                            </div>
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
                        <div>
                            <div class="logo-name text-center">HCPL T20</div>
                            <div class="logo-sub text-center">Haryana Corporate Premier League</div>
                        </div>
                    </div>
                    <div class="h-line r"></div>
                </div>
            </div>

            <div class="title-block">
                <h1>PRIZE &nbsp;<span class="b">POOL</span> </h1> </div>
            <div class="total-row">
                <div class="td"></div>
                <div class="tv">Total Prize Pool &nbsp;·&nbsp; <strong style="white-space: nowrap;">₹1 Crore</strong></div>
                <div class="td r"></div>
            </div>

            <div class="podium-scene">
                <div class="p-col me-0">
                    <div class="name-plate">
                        <div class="np-name">Runner Up</div>
                        <div class="np-role">2nd Place</div>
                    </div>
                    <div class="prize pr2">₹21 Lakhs</div>
                    <div class="player-img-wrap">
                        <div class="glow-base" style="width:150px;height:18px;background:rgba(100,170,255,0.45);"></div>
                        <img class="player-img p2-img" src="{{ asset('frontend') }}/images/prize2.png"
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
                    <div class="prize pr1">₹51 Lakhs</div>
                    <div class="player-img-wrap">
                        <div class="glow-base" style="width:210px;height:28px;background:rgba(150,210,255,0.65);"></div>
                        <img class="player-img p1-img" src="{{ asset('frontend') }}/images/prize1.png"
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

            {{-- <div class="benefits-section">
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
            </div> --}}

            <div class="bottom">
                <div class="b-line"></div>
                <div class="b-txt">hcplt20.com &nbsp;·&nbsp; Register Now &nbsp;·&nbsp; Total Prize Pool ₹1 Crore</div>
                <div class="b-line r"></div>
            </div>
        </div>

        <!-- Live Player Registration Counter Section -->
        {{-- <section class="live-counter-section py-5">
            <div class="container">
                <div class="counter-card-outer">
                    <!-- Glow background -->
                    <div class="counter-radial-glow"></div>
                    
                    <div class="counter-header text-center">
                        <span class="warning-icon">⚠️</span> ZONES ARE NEARING CAPACITY <span class="hashtag-badge-brush normal-size on-dark" style="margin-left: 10px;"><span class="lath">#Lath</span><span class="gaddiya">GadDiya</span></span>
                    </div>
                    
                    <div class="row align-items-center justify-content-center text-center counter-stats-row">
                        <!-- Center: Live Counter digits -->
                        <div class="col-lg-8 col-md-12">
                            <div class="live-counter-wrapper">
                                <div class="digit-container" id="live-digit-container">
                                    <!-- Digits will be generated by JS -->
                                </div>
                                <div class="counter-label-center">Total Registered Players</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="counter-footer text-center mt-4">
                        <p class="footer-quote text-white opacity-75 italic">Those who hesitate fall behind.</p>
                        <h4 class="footer-cta-text fw-bold text-white uppercase tracking-wider">Those who step forward, leave their mark.</h4>
                        <a href="{{ route('player-registration') }}" class="btn-register-now">Start Your Journey - Register Now</a>
                    </div>
                </div>
            </div>
        </section> --}}

        <style>
            /* Live Registration Counter CSS */
            .live-counter-section {
                background-color: var(--dark-navy, #050e1e);
                position: relative;
                overflow: hidden;
            }
            .counter-card-outer {
                background: #0a1c3e;
                border: 2px solid rgba(255, 102, 0, 0.35);
                border-radius: 24px;
                padding: 50px 30px;
                position: relative;
                overflow: hidden;
                box-shadow: 0 20px 50px rgba(5, 14, 30, 0.5);
            }
            .counter-radial-glow {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 600px;
                height: 600px;
                background: radial-gradient(circle, rgba(255, 102, 0, 0.12) 0%, transparent 70%);
                pointer-events: none;
                z-index: 1;
            }
            .counter-header {
                color: #f4c242;
                font-size: 1.4rem;
                font-weight: 800;
                letter-spacing: 2px;
                margin-bottom: 40px;
                position: relative;
                z-index: 2;
                text-transform: uppercase;
                text-shadow: 0 0 10px rgba(244, 194, 66, 0.2);
            }
            .counter-header .warning-icon {
                margin-right: 5px;
                animation: pulseWarning 1.5s infinite ease-in-out;
                display: inline-block;
            }
            @keyframes pulseWarning {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.15); opacity: 0.8; }
            }
            .live-counter-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
            }
            .digit-container {
                display: flex;
                gap: 5px;
                justify-content: center;
                align-items: center;
                margin-bottom: 15px;
            }
            .digit-card {
                background: #050e1e;
                color: #ffffff;
                border: 2px solid rgba(255, 102, 0, 0.4);
                box-shadow: 0 0 12px rgba(255, 102, 0, 0.25);
                font-size: 2.8rem;
                font-weight: 900;
                width: 46px;
                height: 68px;
                border-radius: 8px;
                display: flex;
                align-items: center;
                justify-content: center;
                position: relative;
                font-family: 'DM Sans', sans-serif;
                overflow: hidden;
            }
            .digit-comma {
                color: #ffffff;
                font-size: 2.8rem;
                font-weight: 900;
                display: flex;
                align-items: flex-end;
                padding-bottom: 8px;
                margin: 0 1px;
            }
            .counter-label-center {
                color: #ffffff;
                font-weight: 800;
                font-size: 0.95rem;
                text-transform: uppercase;
                letter-spacing: 1.5px;
                margin-top: 5px;
            }
            .counter-footer {
                position: relative;
                z-index: 2;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
                padding-top: 30px;
                margin-top: 20px;
            }
            .footer-quote {
                font-style: italic;
                font-size: 1.1rem;
                margin-bottom: 8px;
            }
            .footer-cta-text {
                font-size: 1.3rem;
                letter-spacing: 1px;
                margin-bottom: 25px;
                color: #ffffff;
            }
            .btn-register-now {
                background: #ff6600;
                color: #ffffff !important;
                font-weight: 800;
                padding: 16px 40px;
                border-radius: 50px;
                font-size: 1rem;
                text-transform: uppercase;
                letter-spacing: 1px;
                border: 2px solid #ff6600;
                box-shadow: 0 8px 25px rgba(255, 102, 0, 0.35);
                transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                display: inline-block;
                text-decoration: none !important;
            }
            .btn-register-now:hover {
                transform: translateY(-4px);
                background: #ffffff;
                color: #ff6600 !important;
                border-color: #ffffff;
                box-shadow: 0 12px 30px rgba(255, 255, 255, 0.15);
            }
            @media (max-width: 767px) {
                .counter-card-outer {
                    padding: 35px 20px;
                }
                .side-stat-number {
                    font-size: 2.6rem;
                }
                .digit-card {
                    width: 36px;
                    height: 52px;
                    font-size: 2.2rem;
                    border-width: 1.5px;
                }
                .digit-comma {
                    font-size: 2.2rem;
                }
                .footer-cta-text {
                    font-size: 1.1rem;
                }
            }
        </style>

        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Actual DB registrations
                const dbRegistrations = {{ \App\Models\PlayerProfile::count() }};
                const countValue = dbRegistrations;
                
                const digitContainer = document.getElementById('live-digit-container');
                
                // Function to format number as digit cards
                function renderDigits(num) {
                    const numStr = num.toString();
                    digitContainer.innerHTML = '';
                    
                    // Insert digits and commas
                    for (let i = 0; i < numStr.length; i++) {
                        const digit = numStr[i];
                        
                        // Add commas for readability
                        if ((numStr.length - i) % 3 === 0 && i !== 0) {
                            const comma = document.createElement('div');
                            comma.className = 'digit-comma';
                            comma.innerText = ',';
                            digitContainer.appendChild(comma);
                        }
                        
                        const card = document.createElement('div');
                        card.className = 'digit-card';
                        card.innerText = digit;
                        digitContainer.appendChild(card);
                    }
                }
                
                // Animate count up on page load starting from 0
                let startCount = 0;
                renderDigits(startCount);
                
                if (countValue > 0) {
                    const duration = 1500; // 1.5 seconds
                    const intervalTime = 30; // 30ms interval
                    const steps = duration / intervalTime;
                    const countIncrement = countValue / steps;
                    
                    let step = 0;
                    const loadTimer = setInterval(() => {
                        step++;
                        startCount += countIncrement;
                        
                        renderDigits(Math.round(startCount));
                        
                        if (step >= steps) {
                            clearInterval(loadTimer);
                            renderDigits(countValue);
                        }
                    }, intervalTime);
                } else {
                    renderDigits(0);
                }
            });
        </script> --}}

        <!-- HCPL Overview & Testimonials Videos Section -->
        <section class="pad100 home-videos-section" style="background: #ffffff;">
            <div class="video-glow-accent-1"></div>
            <div class="video-glow-accent-2"></div>
            <div class="container">
                <div class="row text-center video-section-header">
                    <div class="col-md-8 mx-auto">
                        <span class="badge-tag" style="background: rgba(10, 28, 62, 0.06); border-color: rgba(10, 28, 62, 0.18); color: #0a1c3e;">HCPL VIDEOS</span>
                        <h2 class="mt-3" style="color: #0a1c3e;">About League & Trials Guide <span class="hashtag-badge-brush heading-size" style="margin-left: 10px;"><span class="lath">#Lath</span><span class="gaddiya">GadDiya</span></span></h2>
                        <p style="color: #475569;">Watch our official guides to understand the Haryana Corporate Premier League (HCPL) structure and step-by-step trial registration process.</p>
                    </div>
                </div>

                <div class="row g-4 video-grid-container">
                    @foreach($videoList as $index => $videoItem)
                        <div class="col-lg-6 col-md-12">
                            <div class="home-video-card-v2">
                                <div class="video-frame-container">
                                    @if($videoItem['is_youtube'] && $videoItem['yt_id'])
                                        <div class="video-thumbnail-overlay" onclick="playHomeVideo(this, '{{ $videoItem['yt_id'] }}')">
                                            <img src="https://img.youtube.com/vi/{{ $videoItem['yt_id'] }}/hqdefault.jpg" alt="{{ $videoItem['title'] }}">
                                            <div class="video-black-gradient"></div>
                                            <div class="video-play-btn-wrapper">
                                                <svg width="28" height="28" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M8 5V19L19 12L8 5Z"/>
                                                </svg>
                                            </div>
                                        </div>
                                    @else
                                        <video width="100%" height="100%" controls style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;">
                                            <source src="{{ $videoItem['video_url'] }}" type="video/mp4">
                                        </video>
                                    @endif
                                </div>
                                <div class="video-card-content-v2" style="padding-bottom: 28px;">
                                    <h4 class="video-card-title-v2">
                                        {{ $videoItem['title'] }}
                                    </h4>
                                    <p class="video-card-desc-v2" style="margin-bottom: 0;">
                                        {{ $videoItem['description'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="pad100" style="background: #0a1c3e;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="heading mb-3" style="color: #ffffff;">Upcoming Trials </h2>
                        <p style="color: #cbd5e1;">Registrations open across zones. Step up, show your talent, and earn your spot in the league.</p>
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
                                <div class="col-md-12 text-center py-12" style="color: #cbd5e1; padding: 48px 0;">
                                    Upcoming trials will be announced soon. Stay tuned!
                                </div>
                            @endforelse
                        </div>
                        <div class="text-center mt-5" style="margin-top: 40px; clear: both; position: relative; z-index: 10;">
                            <a href="{{ route('player-registration') }}" class="btn-navy-cta">Register Now 🏏</a>
                        </div>
                    </div>
        </section>

        <section class="pad100 bg-grey" style="background: #ffffff !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">


                        <h2 class="heading mb-3" style="color: #0a1c3e;">Recent & Upcoming Fixtures </h2>
                        <p style="color: #475569;">Live scores, Fixtures and results from HCPL Season 1.</p>

                        @if (!empty($matches) && count($matches) > 0)
                            <table class="schedule-table text-center" style="background: #ffffff; border-color: rgba(0,0,0,0.08);">
                                <thead style="background: rgba(10,28,62,0.06);">
                                    <tr>
                                        <th style="color: #0a1c3e;">Match</th>
                                        <th style="color: #0a1c3e;">Date</th>
                                        <th style="color: #0a1c3e;">Venue</th>
                                        <th style="color: #0a1c3e;">Score</th>
                                        <th style="color: #0a1c3e;">Status</th>
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
                                Fixtures Will Be Announced Soon
                            </div>
                        @endif


                        <!-- Dynamic Matches (Commented Out for now) -->





                        <div class="text-center mt-5" style="margin-top: 40px; clear: both; position: relative; z-index: 10;">
                            <a href="{{ route('player-registration') }}" class="btn-navy-cta">Register Now 🏏</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Chief Mentor Section -->
        @if($chiefMentors->count() > 0)
            <section class="chief-mentor-section">
                <!-- League logo watermark in background -->
                <img src="{{ $web_setting && $web_setting->logo ? asset($web_setting->logo) : asset('frontend/images/logo.png') }}" alt="Watermark" class="chief-mentor-watermark">
                
                <div class="container">
                    @foreach ($chiefMentors as $mentor)
                        <div class="mentor-card-v2 {{ !$loop->last ? 'mb-5' : '' }}">
                            <div class="row align-items-center">
                                <!-- Image Left -->
                                <div class="col-lg-4 col-md-12 text-center">
                                    <div class="mentor-image-container" style="max-width: 350px; margin: 0 auto;">
                                        <img src="{{ asset('storage/' . $mentor->image) }}" alt="{{ $mentor->name }}" class="w-100">
                                    </div>
                                </div>
                                
                                <!-- Content Right -->
                                <div class="col-lg-8 col-md-12">
                                    <div class="mentor-info-container">
                                        <span class="badge-tag" style="background: rgba(255, 102, 0, 0.08); border-color: rgba(255, 102, 0, 0.25); color: #ff6600; align-self: flex-start; margin-bottom: 15px;">
                                            {{ (str_contains(strtolower($mentor->name), 'praveen')) ? 'CHIEF MENTOR' : 'LEAGUE ICON' }}
                                        </span>
                                        <h2 class="mentor-name" style="margin-top: 0;">{{ $mentor->name }}</h2>
                                        <h5 class="mentor-designation">{{ $mentor->designation ?: 'Chief Mentor & Brand Ambassador' }}</h5>
                                        <p class="mentor-desc" style="text-align:justify">
                                            @if(str_contains(strtolower($mentor->name), 'praveen'))
                                              {{$mentor->description}}
                                            @else
                                             {{$mentor->description}}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif

        <section class="pad100" style="background: #ffffff;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="heading mb-3" style="color: #0a1c3e;">Mentors</h2>
                        <p style="color: #475569;">Cricket legends representing HCPL</p>
                    </div>

                    <style>
                        .mentor-card-premium {
                            width: 100%;
                            border-radius: 16px;
                            overflow: hidden;
                            background: #1d202b;
                            box-shadow: 0 12px 35px rgba(0,0,0,0.18);
                            transition: transform 0.3s ease;
                        }
                        .mentor-card-premium:hover {
                            transform: translateY(-8px);
                        }
                    </style>
                    @foreach ($guestAmbassadors as $ambassador)
                        <div class="col-lg-3 col-md-6 col-sm-12 mt-3 d-flex align-items-stretch">
                            <div class="mentor-card-premium w-100 h-100 d-flex flex-column justify-content-between">
                                <div class="w-100">
                                    <div class="mentor-card-img" style="width: 100%; position: relative;">
                                        <img src="{{ asset('storage/' . $ambassador->image) }}" class="w-100" style="display: block; aspect-ratio: 1/1; object-fit: cover;">
                                    </div>
                                    <div class="mentor-card-body text-center" style="padding: 24px 20px; background: #1d202b;">
                                        <h4 class="mentor-card-name" style="font-size: 20px; font-weight: 700; color: #ffffff; margin-top: 0; margin-bottom: 8px; font-family: 'DM Sans', sans-serif;">{{ $ambassador->name }}</h4>
                                        <div class="mentor-card-desig" style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.7); text-transform: uppercase; letter-spacing: 1.5px; margin-bottom: 6px; line-height: 1.4; font-family: 'DM Sans', sans-serif;">{{ $ambassador->designation ?: 'Chief Mentor & Brand Ambassador' }}</div>
                                        @if($ambassador->description)
                                            <div class="mentor-card-desc" style="font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.5); text-transform: uppercase; letter-spacing: 1.5px; line-height: 1.4; font-family: 'DM Sans', sans-serif;">( {!! e($ambassador->description) !!} )</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Our Host Section -->
        <section class="pad100" style="background: #0a1c3e;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 text-center">
                        <h2 class="heading mb-3" style="color: #ffffff;">Our League Host </h2>
                        <p style="color: #cbd5e1;">The entertaining and charismatic voice of HCPL</p>
                    </div>
                </div>
                <div class="mentor-card-v2" style="background: #ffffff; border: 1px solid rgba(0,0,0,0.06); box-shadow: 0 15px 45px rgba(0,0,0,0.05); margin-top: 40px;">
                    <div class="row align-items-center">
                        <!-- Image Left -->
                        <div class="col-lg-4 col-md-12 text-center">
                            <div class="mentor-image-container" style="max-width: 320px; margin: 0 auto; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                                <img src="{{ asset('frontend/images/vishwash.png') }}" alt="vishwash Chauhan" class="w-100" style="border-radius: 12px; object-fit: cover;">
                            </div>
                        </div>
                        
                        <!-- Content Right -->
                        <div class="col-lg-8 col-md-12">
                            <div class="mentor-info-container" style="padding: 20px;">
                                <span class="badge-tag" style="background: rgba(255, 102, 0, 0.08); border-color: rgba(255, 102, 0, 0.25); color: #ff6600; align-self: flex-start; margin-bottom: 15px; text-transform: uppercase; letter-spacing: 1px; font-weight: 700; font-size: 11px;">LEAGUE ENTERTAINER</span>
                                <h3 class="mentor-name" style="margin-top: 0;font-size: 32px; font-weight: 900;">Vishwash Chauhan</h3>
                                <h5 class="mentor-designation" style="color: #ff6600; font-weight: 700; text-transform: uppercase; margin-bottom: 20px;">Official Host of HCPL</h5>
                                <p class="mentor-desc" style="color: #475569; font-size: 15px; line-height: 1.7; margin-bottom: 0; text-align:justify" >
                                  Vishwash Chauhan is a renowned entertainer, presenter, and digital personality known for his IPL - haryanvi commentary, engaging stage presence and strong connection with audiences. His energy, charisma, and ability to captivate crowds make him a perfect fit to elevate the HCPL experience for fans and players alike.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <style>
            .nav-link.active-team-btn {
                background: #ff6600 !important;
                border-color: #ff6600 !important;
                color: #ffffff !important;
                box-shadow: 0 5px 15px rgba(255,102,0,0.4) !important;
            }
        </style>
        <section class="pad100"
            style="background:url(https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?w=1920&h=800&fit=crop&q=80
);background-attachment:fixed;min-height:750px;height:auto;background-position:center center;position:relative">
            <div class="bg-blacks" style="position:absolute;top:0;width:100%;height:100%;background:#00000052"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center" style="position:relative">
                        <h2 class="heading mb-3 text-white">Our Teams </h2>
                        <p class="text-white">8 powerful franchises representing every corner of Haryana. Choose your side.</p>
                        
                        <!-- Gender Category Selector Pills -->
                        <div class="d-flex justify-content-center gap-3 mb-5 mt-4" style="position: relative; z-index: 10;">
                            <button class="nav-link px-4 py-2" id="mens-tab-btn" onclick="switchTeams('men')" style="font-weight: 800; font-family: 'DM Sans', sans-serif; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.08); color: #ffffff; transition: all 0.3s; cursor: pointer;">Men's (8 Teams)</button>
                            <button class="nav-link px-4 py-2" id="womens-tab-btn" onclick="switchTeams('women')" style="font-weight: 800; font-family: 'DM Sans', sans-serif; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px; border-radius: 30px; border: 1px solid rgba(255,255,255,0.15); background: rgba(255,255,255,0.08); color: #ffffff; transition: all 0.3s; cursor: pointer;">Women's Teams</button>
                    </div>
                    
                    <div class="col-md-12" style="position: relative; z-index: 10;">
                        <!-- Men's Teams Block -->
                        <div id="mens-teams-block">
                            @if($mens_db_teams->count() > 0)
                                <div class="team-slider">
                                    @foreach ($mens_db_teams as $team)
                                        @if ($team->logo)
                                            <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                                <img src="{{ asset('storage/' . $team->logo) }}" alt="{{ $team->name }}"
                                                    style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="team-slider">
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Rohtak-Warriors-Logo-(1).png') }}" alt="Rohtak Warriors" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Hisar-titans-logo-(1).png') }}" alt="Hisar Titans" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Sirsa-Royals-logo-(2).png') }}" alt="Sirsa Royals" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Gurugram-giants-logo-(1).png') }}" alt="Gurugram Giants" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Sonipat-tigers-logo-(1).png') }}" alt="Sonipat Tigers" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Karnal-kings-logo-(1).png') }}" alt="Karnal Kings" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/Ambala-avengers-logo-(1).png') }}" alt="Ambala Avengers" style="width: 100%; height: auto; max-height: 180px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>
                                    <div class="team-card" style="border: none; background: transparent; backdrop-filter: none; padding: 10px; box-shadow: none;">
                                        <img src="{{ asset('frontend/images/hpcl/faridabad.png') }}" alt="Ambala Avengers" style="width: 100%; height: auto; max-height: 220px; object-fit: contain; display: block; margin: 0 auto;">
                                    </div>


                                    
                                </div>
                            @endif
                        </div>

                        <!-- Women's Teams Block -->
                        <div id="womens-teams-block" style="display: none;">
                            <div class="text-center py-5" style="background: rgba(255, 255, 255, 0.05); border: 1px dashed rgba(255, 255, 255, 0.15); border-radius: 16px; padding: 50px 20px; margin: 20px 0;">
                                <h3 style="color: #ffffff; font-family: 'DM Sans', sans-serif; font-weight: 700; margin-bottom: 8px; font-size: 1.8rem;">Teams Will Be Announced Soon</h3>
                                <p style="color: #cbd5e1; margin-bottom: 0; font-size: 1rem; opacity: 0.95;">Stay tuned! The official women's franchise teams will be revealed shortly.</p>
                            </div>
                        </div>
                    </div>

                    <script>
                        function switchTeams(category) {
                            var mensBtn = document.getElementById('mens-tab-btn');
                            var womensBtn = document.getElementById('womens-tab-btn');
                            var mensBlock = document.getElementById('mens-teams-block');
                            var womensBlock = document.getElementById('womens-teams-block');

                            if (category === 'men') {
                                if (mensBtn) mensBtn.classList.add('active-team-btn');
                                if (womensBtn) womensBtn.classList.remove('active-team-btn');
                                if (mensBlock) mensBlock.style.display = 'block';
                                if (womensBlock) womensBlock.style.display = 'none';
                            } else {
                                if (womensBtn) womensBtn.classList.add('active-team-btn');
                                if (mensBtn) mensBtn.classList.remove('active-team-btn');
                                if (mensBlock) mensBlock.style.display = 'none';
                                if (womensBlock) womensBlock.style.display = 'block';
                            }

                            // Trigger slick setPosition if jQuery and slick exist
                            if (window.jQuery && typeof window.jQuery.fn.slick === 'function') {
                                window.jQuery('.team-slider').slick('setPosition');
                            }
                        }

                        // Initialize active state on DOM load
                        document.addEventListener("DOMContentLoaded", function() {
                            switchTeams('men');
                        });
                    </script>

                    <div class="text-center mt-5" style="margin-top: 40px; clear: both; position: relative; z-index: 10;">
                        <a href="{{ route('player-registration') }}" class="btn-navy-cta">Register Now 🏏</a>
                    </div>

                </div>
            </div>
        </section>

        <section class="pad100" style="background: #0a1c3e;">
            <style>
                /* News section dark-mode overrides */
                .news-section-dark .news-card {
                    background: rgba(255, 255, 255, 0.04);
                    border: 1px solid rgba(255, 255, 255, 0.08);
                }
                .news-section-dark .news-card:hover {
                    transform: translateY(-6px);
                    box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4);
                    border-color: rgba(255, 102, 0, 0.35);
                }
                .news-section-dark .news-title {
                    color: #ffffff;
                }
                .news-section-dark .news-date {
                    color: #94a3b8;
                }
                .news-section-dark .news-read {
                    color: #f4c242;
                }
                .news-section-dark .news-read:hover {
                    color: #ff6600;
                }
            </style>
            <div class="container news-section-dark">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <h2 class="heading mb-2" style="color: #ffffff;">Latest News </h2>
                        <p style="color: #94a3b8;">Stay updated with the latest from Haryana Corporate Premier League.</p>
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

        <!-- Player Registration Wizard Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let resendTimerInterval;

                function startResendTimer() {
                    let timeLeft = 60;
                    const btnResend = document.getElementById('btn-resend-otp');
                    const timerSpan = document.getElementById('resend-timer');
                    
                    btnResend.disabled = true;
                    timerSpan.textContent = `(${timeLeft}s)`;

                    clearInterval(resendTimerInterval);
                    resendTimerInterval = setInterval(() => {
                        timeLeft--;
                        if (timeLeft <= 0) {
                            clearInterval(resendTimerInterval);
                            btnResend.disabled = false;
                            timerSpan.textContent = '';
                        } else {
                            timerSpan.textContent = `(${timeLeft}s)`;
                        }
                    }, 1000);
                }

                function detectContactType(value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    const phoneRegex = /^\d{10}$/;
                    
                    if (emailRegex.test(value)) return 'email';
                    if (phoneRegex.test(value)) return 'mobile';
                    return null;
                }

                // Step 1: Send OTP
                const btnSendOtp = document.getElementById('btn-send-otp');
                if (btnSendOtp) {
                    btnSendOtp.addEventListener('click', async function() {
                        const contact = document.getElementById('contact_input').value.trim();
                        const type = detectContactType(contact);
                        const btn = this;
                        const loader = document.getElementById('loader-1');
                        const errorBox = document.getElementById('alert-error-1');

                        if (!type) {
                            errorBox.textContent = 'Please enter a valid 10-digit mobile number or email address.';
                            errorBox.style.display = 'block';
                            return;
                        }

                        errorBox.style.display = 'none';
                        btn.disabled = true;
                        loader.style.display = 'inline-block';
                        document.getElementById('contact_type').value = type;

                        try {
                            const response = await fetch("{{ route('player-registration.send-otp') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({ contact, type })
                            });
                            
                            const data = await response.json();
                            if (response.ok) {
                                document.getElementById('sent-contact-label').textContent = contact;
                                document.getElementById('step1').style.display = 'none';
                                document.getElementById('step2').style.display = 'block';
                                document.getElementById('step1-nav').classList.remove('active');
                                document.getElementById('step2-nav').classList.add('active');
                                startResendTimer();
                                
                                if (data.message && data.message.includes('TEST MODE')) {
                                    const successBox = document.getElementById('alert-success-2');
                                    successBox.textContent = data.message;
                                    successBox.style.display = 'block';
                                }
                            } else {
                                errorBox.textContent = data.message || 'Failed to send OTP.';
                                errorBox.style.display = 'block';
                            }
                        } catch (err) {
                            errorBox.textContent = 'A network error occurred. Please try again.';
                            errorBox.style.display = 'block';
                        } finally {
                            btn.disabled = false;
                            loader.style.display = 'none';
                        }
                    });
                }

                // Step 2: Resend OTP
                const btnResendOtp = document.getElementById('btn-resend-otp');
                if (btnResendOtp) {
                    btnResendOtp.addEventListener('click', async function() {
                        const contact = document.getElementById('contact_input').value.trim();
                        const type = document.getElementById('contact_type').value;
                        const btn = this;
                        const errorBox = document.getElementById('alert-error-2');
                        const successBox = document.getElementById('alert-success-2');

                        btn.disabled = true;
                        errorBox.style.display = 'none';
                        successBox.style.display = 'none';

                        try {
                            const response = await fetch("{{ route('player-registration.resend-otp') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({ contact, type })
                            });
                            
                            const data = await response.json();
                            if (response.ok) {
                                successBox.textContent = 'OTP resent successfully.';
                                successBox.style.display = 'block';
                                startResendTimer();
                            } else {
                                errorBox.textContent = data.message || 'Failed to resend OTP.';
                                errorBox.style.display = 'block';
                                btn.disabled = false;
                            }
                        } catch (err) {
                            errorBox.textContent = 'A network error occurred. Please try again.';
                            errorBox.style.display = 'block';
                            btn.disabled = false;
                        }
                    });
                }

                // Step 2: Verify OTP
                const btnVerifyOtp = document.getElementById('btn-verify-otp');
                if (btnVerifyOtp) {
                    btnVerifyOtp.addEventListener('click', async function() {
                        const contact = document.getElementById('contact_input').value.trim();
                        const type = document.getElementById('contact_type').value;
                        const otp = document.getElementById('otp_input').value.trim();
                        const btn = this;
                        const loader = document.getElementById('loader-2');
                        const errorBox = document.getElementById('alert-error-2');

                        if (!otp || otp.length < 4) {
                            errorBox.textContent = 'Please enter a valid OTP.';
                            errorBox.style.display = 'block';
                            return;
                        }

                        errorBox.style.display = 'none';
                        document.getElementById('alert-success-2').style.display = 'none';
                        btn.disabled = true;
                        loader.style.display = 'inline-block';

                        try {
                            const response = await fetch("{{ route('player-registration.verify-otp') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({ contact, type, otp })
                            });
                            
                            const data = await response.json();
                            if (response.ok) {
                                document.getElementById('step2').style.display = 'none';
                                document.getElementById('step3').style.display = 'block';
                                document.getElementById('step2-nav').classList.remove('active');
                                document.getElementById('step3-nav').classList.add('active');
                            } else {
                                errorBox.textContent = data.message || 'Invalid OTP.';
                                errorBox.style.display = 'block';
                            }
                        } catch (err) {
                            errorBox.textContent = 'A network error occurred. Please try again.';
                            errorBox.style.display = 'block';
                        } finally {
                            btn.disabled = false;
                            loader.style.display = 'none';
                        }
                    });
                }

                // Step 3: Create Password
                const btnCreatePassword = document.getElementById('btn-create-password');
                if (btnCreatePassword) {
                    btnCreatePassword.addEventListener('click', async function() {
                        const contact = document.getElementById('contact_input').value.trim();
                        const type = document.getElementById('contact_type').value;
                        const password = document.getElementById('password').value;
                        const password_confirmation = document.getElementById('password_confirmation').value;
                        const btn = this;
                        const loader = document.getElementById('loader-3');
                        const errorBox = document.getElementById('alert-error-3');

                        if (password.length < 8) {
                            errorBox.textContent = 'Password must be at least 8 characters long.';
                            errorBox.style.display = 'block';
                            return;
                        }
                        
                        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
                        if (!strongPasswordRegex.test(password)) {
                            errorBox.textContent = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol.';
                            errorBox.style.display = 'block';
                            return;
                        }

                        if (password !== password_confirmation) {
                            errorBox.textContent = 'Passwords do not match.';
                            errorBox.style.display = 'block';
                            return;
                        }

                        errorBox.style.display = 'none';
                        btn.disabled = true;
                        loader.style.display = 'inline-block';

                        try {
                            const response = await fetch("{{ route('player-registration.create-password') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({ contact, type, password, password_confirmation })
                            });
                            
                            const text = await response.text();
                            let data;
                            try {
                                data = JSON.parse(text);
                            } catch (e) {
                                throw new Error(`Server returned status ${response.status}`);
                            }

                            if (response.ok) {
                                window.location.href = data.redirect;
                            } else {
                                errorBox.textContent = data.message || 'Failed to create password.';
                                errorBox.style.display = 'block';
                                btn.disabled = false;
                                loader.style.display = 'none';
                            }
                        } catch (err) {
                            errorBox.textContent = 'Error: ' + err.message;
                            errorBox.style.display = 'block';
                            btn.disabled = false;
                            loader.style.display = 'none';
                        }
                    });
                }
            });

            // Dynamic video player helper
            window.playHomeVideo = function(container, videoId) {
                container.parentElement.innerHTML = `<iframe width="100%" height="100%" src="https://www.youtube.com/embed/${videoId}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; border-radius: 20px;"></iframe>`;
            };
        </script>

        <!-- ===== FAQ Section ===== -->
        <section style="background: #ffffff; padding: 80px 0;">
            <style>
                .hfaq-accordion .accordion-item {
                    border: 1px solid rgba(10, 28, 62, 0.08);
                    border-radius: 12px !important;
                    margin-bottom: 20px;
                    overflow: hidden;
                    box-shadow: 0 4px 20px rgba(10, 28, 62, 0.03);
                    transition: all 0.3s ease;
                }
                .hfaq-accordion .accordion-item:hover {
                    box-shadow: 0 10px 30px rgba(10, 28, 62, 0.08);
                    border-color: rgba(255, 102, 0, 0.25);
                }
                .hfaq-accordion .accordion-button {
                    font-family: 'DM Sans', sans-serif;
                    font-weight: 700;
                    font-size: 1.1rem;
                    color: #0a1c3e;
                    padding: 22px 28px;
                    background: #ffffff;
                    border: none;
                    box-shadow: none !important;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    transition: all 0.3s ease;
                    text-align: left;
                }
                .hfaq-accordion .accordion-button:not(.collapsed) {
                    color: #ffffff;
                    background: #0a1c3e;
                }
                .hfaq-accordion .accordion-button::after {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230a1c3e'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                    transition: transform 0.3s ease;
                    width: 1.25rem;
                    height: 1.25rem;
                    background-size: 1.25rem;
                }
                .hfaq-accordion .accordion-button:not(.collapsed)::after {
                    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                    transform: rotate(-180deg);
                }
                .hfaq-accordion .accordion-body {
                    padding: 24px 28px;
                    background: #f8fafc;
                    color: #475569;
                    font-size: 1rem;
                    line-height: 1.7;
                    border-top: 1px solid rgba(10, 28, 62, 0.05);
                }
                .hfaq-accordion .accordion-body ul {
                    list-style: none;
                    padding-left: 0;
                    margin-top: 12px;
                    margin-bottom: 0;
                }
                .hfaq-accordion .accordion-body ul li {
                    position: relative;
                    padding-left: 28px;
                    margin-bottom: 10px;
                }
                .hfaq-accordion .accordion-body ul li::before {
                    content: "🏏";
                    position: absolute;
                    left: 0;
                    top: 2px;
                    font-size: 1rem;
                }
                .hfaq-accordion .accordion-body ul li:last-child {
                    margin-bottom: 0;
                }
            </style>

            <div class="container">
                <div class="row text-center justify-content-center mb-5">
                    <div class="col-lg-8">
                        <h2 class="heading" style="color: #0a1c3e;">Frequently Asked Questions <span class="hashtag-badge-brush heading-size" style="margin-left: 10px;"><span class="lath">#Lath</span><span class="gaddiya">GadDiya</span></span></h2>
                        <p style="color: #ff6600; font-weight: 700; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase; margin-top: 8px;">Everything You Need To Know</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-9 col-md-12">
                        <div class="accordion hfaq-accordion" id="hfaqAccordion">

                            <!-- Question 1 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseOne" aria-expanded="true" aria-controls="hcollapseOne">
                                        1. Is this league only for players from Haryana?
                                    </button>
                                </h2>
                                <div id="hcollapseOne" class="accordion-collapse collapse show" aria-labelledby="hheadingOne" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        No. HCPL T20 is a Pan-India league and is open to players from across the country. Trial registrations will be conducted across all 30+ Districts &amp; Cities across North India.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseTwo" aria-expanded="false" aria-controls="hcollapseTwo">
                                        2. What is the registration fee for?
                                    </button>
                                </h2>
                                <div id="hcollapseTwo" class="accordion-collapse collapse" aria-labelledby="hheadingTwo" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        The fee covers:
                                        <ul>
                                            <li>Official HCPL T20 trial registration</li>
                                            <li>Opportunity to showcase your cricketing skills in front of selectors</li>
                                            <li>One official HCPL T20 trial T-shirt</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Question 3 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseThree" aria-expanded="false" aria-controls="hcollapseThree">
                                        3. Is this a leather-ball or tennis-ball league?
                                    </button>
                                </h2>
                                <div id="hcollapseThree" class="accordion-collapse collapse" aria-labelledby="hheadingThree" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        HCPL T20 will be played with a white leather ball under professional cricketing standards.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 4 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseFour" aria-expanded="false" aria-controls="hcollapseFour">
                                        4. Do I need to upload a video for selection?
                                    </button>
                                </h2>
                                <div id="hcollapseFour" class="accordion-collapse collapse" aria-labelledby="hheadingFour" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        No. There is no requirement to upload a video. Simply register for the trials and attend the physical selection process.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 5 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseFive" aria-expanded="false" aria-controls="hcollapseFive">
                                        5. Will the matches be broadcasted?
                                    </button>
                                </h2>
                                <div id="hcollapseFive" class="accordion-collapse collapse" aria-labelledby="hheadingFive" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        Yes. HCPL T20 matches will be broadcast live on OTT platforms and television, providing players with significant visibility.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 6 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseSix" aria-expanded="false" aria-controls="hcollapseSix">
                                        6. What is the format of the league?
                                    </button>
                                </h2>
                                <div id="hcollapseSix" class="accordion-collapse collapse" aria-labelledby="hheadingSix" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        HCPL T20 is an 8-franchise T20 cricket league, featuring competitive matches in the T20 format.
                                    </div>
                                </div>
                            </div>

                            <!-- Question 7 -->
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="hheadingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#hcollapseSeven" aria-expanded="false" aria-controls="hcollapseSeven">
                                        7. What is the age limit for participation?
                                    </button>
                                </h2>
                                <div id="hcollapseSeven" class="accordion-collapse collapse" aria-labelledby="hheadingSeven" data-bs-parent="#hfaqAccordion">
                                    <div class="accordion-body">
                                        <strong>For Men's</strong> - Players 16 years of age and above are eligible to participate in the league.<br>
                                        <strong>For Women's</strong> - Players 16 years of age and above are eligible to participate in the league.
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- CTA -->
                        <div class="text-center mt-5">
                            <a href="{{ route('faq') }}" style="display: inline-block; padding: 14px 36px; background: #0a1c3e; color: #ffffff; border-radius: 50px; font-weight: 700; font-size: 0.95rem; text-decoration: none; transition: all 0.3s ease; border: 2px solid #0a1c3e;"
                                onmouseover="this.style.background='#ff6600'; this.style.borderColor='#ff6600';"
                                onmouseout="this.style.background='#0a1c3e'; this.style.borderColor='#0a1c3e';">
                                View All FAQs &nbsp;→
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ===== End FAQ Section ===== -->

    @endsection

