@extends('frontend.layouts.main')

@section('title', 'Sponsorship Opportunities - HCPL')
@section('meta_description', 'Partner with Haryana Corporate Premier League (HCPL T20). Explore sponsorship tiers, projected reach, and tournament campaign timelines for Men\'s & Women\'s seasons.')
@section('meta_keywords', 'hcpl sponsors, cricket sponsorship India, title partner, umpire partner, digital reach')
@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
<style>
    /* Premium Sponsors Page Styles */
    :root {
        --dark-navy: #050e1e;
        --navy: #0a1c3e;
        --navy-light: #162a52;
        --orange: #ff6600;
        --gold: #f4c242;
        --white: #ffffff;
        --gray-light: #f8fafc;
        --gray-border: rgba(10, 28, 62, 0.08);
        --gray-text: #475569;
        --slate-text: #cbd5e1;
    }

    .sponsors-wrapper {
        font-family: 'DM Sans', sans-serif;
        margin-top: 78px;
        overflow: hidden;
    }

    /* Common Section Titles */
    .sponsor-section-title {
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }
    .sponsor-section-title h2 {
        font-weight: 800;
        font-size: 2.2rem;
        text-transform: uppercase;
        font-family: 'DM Sans', sans-serif;
    }
    .sponsor-section-title p {
        font-size: 1.05rem;
        margin-top: 10px;
    }

    /* Section Padding */
    .section-padding {
        padding: 90px 0;
    }

    /* Alternating Theme Classes */
    
    /* 1. Dark Sections (Navy Blue Background) */
    .section-dark {
        background-color: var(--dark-navy);
        color: var(--white);
    }
    .section-dark .sponsor-section-title h2 {
        color: var(--white);
    }
    .section-dark .sponsor-section-title h2 span {
        color: var(--gold);
    }
    .section-dark .sponsor-section-title p {
        color: var(--slate-text);
    }

    /* 2. Light Sections (White or Off-White Background) */
    .section-light {
        background-color: var(--white);
        color: var(--navy);
    }
    .section-light .sponsor-section-title h2 {
        color: var(--navy);
    }
    .section-light .sponsor-section-title h2 span {
        color: var(--orange);
    }
    .section-light .sponsor-section-title p {
        color: var(--gray-text);
    }
    .section-light-grey {
        background-color: var(--gray-light);
        color: var(--navy);
    }
    .section-light-grey .sponsor-section-title h2 {
        color: var(--navy);
    }
    .section-light-grey .sponsor-section-title h2 span {
        color: var(--orange);
    }
    .section-light-grey .sponsor-section-title p {
        color: var(--gray-text);
    }

    /* Hero Banner (Always Dark Navy) */
    .sponsors-hero {
        background: linear-gradient(rgba(5, 14, 30, 0.88), rgba(5, 14, 30, 0.96)), 
                    url('{{ asset("frontend/images/handhshake.jpg (1).jpeg") }}') center/cover no-repeat;
        padding: 110px 0 90px 0;
        text-align: center;
        border-bottom: 2px solid rgba(255, 102, 0, 0.2);
        position: relative;
    }
    
    .sponsors-hero::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 150px;
        height: 3px;
        background: var(--orange);
    }

    .tagline-accent {
        color: var(--orange);
        font-weight: 800;
        letter-spacing: 2px;
        font-size: 0.9rem;
        text-transform: uppercase;
        margin-bottom: 15px;
        display: block;
    }

    .sponsors-hero h1 {
        font-weight: 900;
        font-size: clamp(2.5rem, 6vw, 4rem);
        color: var(--white);
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .sponsors-hero h1 span {
        color: var(--gold);
        background: linear-gradient(to right, var(--gold), #ffaa00);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .sponsors-hero p {
        color: var(--slate-text);
        font-size: 1.15rem;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.7;
    }

    /* Stats Section (Light Theme) */
    .stat-card-light {
        background: var(--white);
        border: 1px solid var(--gray-border);
        border-radius: 16px;
        padding: 35px 25px;
        text-align: center;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 25px rgba(10, 28, 62, 0.03);
    }

    .stat-card-light::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 4px;
        background: transparent;
        transition: background 0.3s ease;
    }

    .stat-card-light:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 35px rgba(10, 28, 62, 0.1);
        border-color: rgba(255, 102, 0, 0.2);
    }

    .stat-card-light:hover::before {
        background: linear-gradient(90deg, var(--orange), var(--gold));
    }

    .stat-card-light .stat-icon-wrapper {
        font-size: 2.2rem;
        color: var(--orange);
        margin-bottom: 5px;
    }

    .stat-card-light .stat-number {
        font-size: 2.8rem;
        font-weight: 900;
        color: var(--navy);
        line-height: 1.1;
        margin-bottom: 5px;
    }

    .stat-card-light .stat-label {
        font-weight: 800;
        color: var(--orange);
        font-size: 0.95rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 5px;
    }

    .stat-card-light .stat-desc {
        color: var(--gray-text);
        font-size: 0.9rem;
        line-height: 1.5;
        margin-bottom: 0;
    }

    /* Tiers Section (Dark Theme) */
    .tier-badge {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy) 100%);
        color: var(--slate-text);
        padding: 5px 20px;
        font-size: 0.75rem;
        font-weight: 800;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 1px solid rgba(255, 255, 255, 0.15);
    }

    .tier-card.featured .tier-badge {
        background: linear-gradient(135deg, var(--gold) 0%, var(--orange) 100%);
        color: var(--white);
        border: none;
        box-shadow: 0 4px 15px rgba(255, 102, 0, 0.3);
    }

    .tier-card {
        background: rgba(22, 42, 82, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 20px;
        padding: 40px 30px 30px 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        position: relative;
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        margin-top: 25px;
    }

    .tier-card.featured {
        border: 2px solid var(--orange);
        box-shadow: 0 10px 40px rgba(255, 102, 0, 0.15);
        background: rgba(22, 42, 82, 0.65);
    }

    .tier-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(5, 14, 30, 0.5);
        border-color: var(--gold);
    }

    .tier-card.featured:hover {
        border-color: var(--orange);
        box-shadow: 0 20px 50px rgba(255, 102, 0, 0.25);
    }

    .tier-name {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--white);
        margin-bottom: 8px;
        text-align: center;
    }

    .tier-card.featured .tier-name {
        color: var(--gold);
    }

    .tier-desc {
        color: var(--slate-text);
        font-size: 0.95rem;
        text-align: center;
        margin-bottom: 25px;
        min-height: 48px;
    }

    .tier-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.15), transparent);
        margin-bottom: 25px;
    }

    .tier-features {
        list-style: none;
        padding-left: 0;
        margin-bottom: 30px;
        flex-grow: 1;
    }

    .tier-features li {
        position: relative;
        padding-left: 30px;
        margin-bottom: 14px;
        font-size: 0.95rem;
        color: var(--white);
        line-height: 1.5;
    }

    .tier-features li i {
        position: absolute;
        left: 0;
        top: 3px;
        color: var(--gold);
        font-size: 1.1rem;
    }

    .tier-card.featured .tier-features li i {
        color: var(--orange);
    }

    .tier-btn {
        display: block;
        width: 100%;
        padding: 12px;
        text-align: center;
        border-radius: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
        transition: all 0.3s ease;
        text-decoration: none !important;
    }

    .btn-outline-gold {
        border: 2px solid var(--gold);
        color: var(--gold);
        background: transparent;
    }

    .btn-outline-gold:hover {
        background: var(--gold);
        color: var(--dark-navy);
        box-shadow: 0 5px 15px rgba(244, 194, 66, 0.3);
    }

    .btn-solid-orange {
        background: var(--orange);
        color: var(--white);
        border: 2px solid var(--orange);
    }

    .btn-solid-orange:hover {
        background: var(--white);
        color: var(--orange);
        border-color: var(--white);
        box-shadow: 0 5px 20px rgba(255, 102, 0, 0.4);
    }

    .btn-outline-white {
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: var(--white);
        background: transparent;
    }

    .btn-outline-white:hover {
        border-color: var(--white);
        background: rgba(255, 255, 255, 0.05);
    }

    /* Timeline Section (Light Grey Theme) */
    .timeline-container {
        position: relative;
        padding: 40px 0;
    }

    .timeline-line {
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        height: 4px;
        background: rgba(10, 28, 62, 0.1);
        z-index: 1;
    }

    .timeline-progress {
        position: absolute;
        top: 60px;
        left: 0;
        width: 100%;
        height: 4px;
        background: linear-gradient(90deg, var(--orange), var(--gold));
        z-index: 2;
    }

    .timeline-node {
        position: relative;
        z-index: 3;
        text-align: center;
        margin-bottom: 30px;
    }

    .timeline-dot {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: var(--white);
        border: 4px solid var(--navy);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px auto;
        color: var(--navy);
        font-weight: 800;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(10, 28, 62, 0.1);
    }

    .timeline-node:hover .timeline-dot {
        transform: scale(1.2);
        background: var(--navy);
        border-color: var(--orange);
        color: var(--white);
        box-shadow: 0 0 25px rgba(255, 102, 0, 0.3);
    }

    .timeline-date {
        color: var(--orange);
        font-weight: 800;
        font-size: 0.95rem;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .timeline-title {
        color: var(--navy);
        font-weight: 850;
        font-size: 1.15rem;
        margin-bottom: 8px;
    }

    .timeline-desc {
        color: var(--gray-text);
        font-size: 0.85rem;
        line-height: 1.4;
    }

    /* Extra Branding Sections (Dark Theme) */
    .benefit-panel {
        background: rgba(22, 42, 82, 0.35);
        border: 1px solid rgba(255, 255, 255, 0.05);
        border-radius: 20px;
        padding: 40px;
        height: 100%;
    }

    .benefit-panel h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: var(--gold);
        margin-bottom: 15px;
        display: block !important;
    }

    .benefit-panel h3 i {
        margin-right: 10px !important;
        display: inline-block !important;
        float: none !important;
        vertical-align: middle !important;
    }

    .benefit-list {
        list-style: none;
        padding-left: 0;
        margin-bottom: 0;
    }

    .benefit-list li {
        position: relative;
        padding-left: 28px;
        margin-bottom: 16px;
        color: var(--white);
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .benefit-list li::before {
        content: "\f058";
        font-family: "FontAwesome";
        position: absolute;
        left: 0;
        top: 2px;
        color: var(--orange);
        font-size: 1.1rem;
    }

    .benefit-highlight-box {
        background: linear-gradient(135deg, var(--navy-light) 0%, rgba(22, 42, 82, 0.1) 100%);
        border: 1px solid rgba(255, 102, 0, 0.2);
        padding: 20px;
        border-radius: 12px;
        margin-top: 30px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .benefit-highlight-icon {
        font-size: 2.2rem;
        color: var(--orange);
    }

    .benefit-highlight-text h4 {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 3px;
        color: var(--white);
    }

    .benefit-highlight-text p {
        color: var(--slate-text);
        font-size: 0.85rem;
        margin-bottom: 0;
    }

    /* Access Grid */
    .access-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .access-item {
        background: rgba(10, 28, 62, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.05);
        padding: 20px;
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .access-item:hover {
        border-color: rgba(255, 102, 0, 0.25);
        background: rgba(10, 28, 62, 0.7);
    }

    .access-item h5 {
        color: var(--gold);
        font-weight: 700;
        font-size: 1rem;
        margin-bottom: 8px;
    }

    .access-item p {
        color: var(--slate-text);
        font-size: 0.85rem;
        margin-bottom: 0;
        line-height: 1.4;
    }

    /* CTA Section (Light Theme) */
    .cta-container-block {
        background-color: var(--white);
        padding: 80px 0;
    }

    .cta-banner {
        background: linear-gradient(135deg, var(--navy) 0%, var(--navy-light) 100%);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 24px;
        padding: 60px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
        color: var(--white);
        box-shadow: 0 10px 45px rgba(10, 28, 62, 0.15);
    }

    .cta-banner::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -30%;
        width: 70%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 102, 0, 0.08) 0%, transparent 60%);
        pointer-events: none;
    }

    .cta-banner h3 {
        font-weight: 900;
        font-size: 2.2rem;
        margin-bottom: 15px;
    }

    .cta-banner p {
        color: var(--slate-text);
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 35px auto;
    }

    .cta-actions {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .btn-cta-main {
        background: var(--orange);
        color: var(--white) !important;
        font-weight: 800;
        padding: 16px 35px;
        border-radius: 50px;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 2px solid var(--orange);
        box-shadow: 0 10px 25px rgba(255, 102, 0, 0.3);
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none !important;
    }

    .btn-cta-main:hover {
        transform: translateY(-4px);
        background: var(--white);
        color: var(--orange) !important;
        border-color: var(--white);
        box-shadow: 0 15px 30px rgba(255, 255, 255, 0.15);
    }

    .btn-cta-secondary {
        background: transparent;
        color: var(--white) !important;
        font-weight: 800;
        padding: 16px 35px;
        border-radius: 50px;
        font-size: 1rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none !important;
    }

    .btn-cta-secondary:hover {
        border-color: var(--gold);
        color: var(--gold) !important;
        background: rgba(244, 194, 66, 0.05);
        transform: translateY(-4px);
    }

    /* Responsive Timeline Adjustments */
    @media (max-width: 991px) {
        .timeline-line, .timeline-progress {
            display: none;
        }

        .timeline-container {
            display: flex;
            flex-direction: column;
            gap: 40px;
            padding-left: 30px;
            border-left: 3px solid rgba(10, 28, 62, 0.15);
            margin-left: 15px;
        }

        .timeline-node {
            text-align: left;
            margin-bottom: 0;
            position: relative;
        }

        .timeline-dot {
            position: absolute;
            left: -54px;
            top: 0;
            width: 38px;
            height: 38px;
            margin: 0;
        }
    }

    @media (max-width: 767px) {
        .access-grid {
            grid-template-columns: 1fr;
        }
        
        .cta-banner {
            padding: 40px 20px;
        }

        .cta-actions {
            flex-direction: column;
            gap: 15px;
        }

        .btn-cta-main, .btn-cta-secondary {
            width: 100%;
            justify-content: center;
        }
    }
</style>

<div class="sponsors-wrapper">
    <!-- Hero Header (Navy background) -->
    <header class="sponsors-hero">
        <div class="container">
            <span class="tagline-accent">Partner With Us</span>
            <h1>Sponsorship <span>Opportunities</span></h1>
            <p>
                Connect with millions of passionate cricket fans across Haryana and India. 
                Partner with HCPL T20 to boost your brand visibility on the ground, 
                via live television and digital broadcasts, and across localized community networks.
            </p>
        </div>
    </header>

    <!-- 1. Stats Section (White Background) -->
    <section class="section-padding section-light">
        <div class="container">
            <div class="sponsor-section-title">
                <h2>Audience <span>Reach & Engagement</span></h2>
                <p>Establishing massive visibility across multiple media layers</p>
            </div>
            <div class="row g-4 justify-content-center">
                <!-- 150M+ Projected Reach -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card-light">
                        <div class="stat-icon-wrapper"><i class="fa fa-users"></i></div>
                        <div class="stat-number">150M+</div>
                        <div class="stat-label">Projected Reach</div>
                        <p class="stat-desc">Unified visibility covering On-Ground, Digital networks, TV Broadcasts, and Creator partnerships.</p>
                    </div>
                </div>

                <!-- 60M+ Digital Reach -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card-light">
                        <div class="stat-icon-wrapper"><i class="fa fa-tablet"></i></div>
                        <div class="stat-number">60M+</div>
                        <div class="stat-label">Digital Reach</div>
                        <p class="stat-desc">High-engagement live streaming, social media reels, clips, and short-form digital coverage.</p>
                    </div>
                </div>

                <!-- 50M+ Broadcast Reach -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card-light">
                        <div class="stat-icon-wrapper"><i class="fa fa-television"></i></div>
                        <div class="stat-number">50M+</div>
                        <div class="stat-label">Broadcast Reach</div>
                        <p class="stat-desc">Prime television coverage targeting Haryana, Uttar Pradesh, Rajasthan, Punjab, Himachal Pradesh, and Uttarakhand.</p>
                    </div>
                </div>

                <!-- 20M+ Community & Creators -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card-light">
                        <div class="stat-icon-wrapper"><i class="fa fa-bullhorn"></i></div>
                        <div class="stat-number">20M+</div>
                        <div class="stat-label">Community & Creators</div>
                        <p class="stat-desc">Engaging cricket communities, grassroots clubs, localized handles, and leading sports content creators.</p>
                    </div>
                </div>

                <!-- 2M+ On Ground & Trials -->
                <div class="col-lg-4 col-md-6">
                    <div class="stat-card-light">
                        <div class="stat-icon-wrapper"><i class="fa fa-map-marker"></i></div>
                        <div class="stat-number">2M+</div>
                        <div class="stat-label">On Ground & Trials</div>
                        <p class="stat-desc">Direct physical connection with players and spectators across trial districts and cities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. Sponsorship Tiers Section (Navy Blue Background) -->
    <section class="section-padding section-dark">
        <div class="container">
            <div class="sponsor-section-title">
                <h2>Sponsorship <span>Tiers</span></h2>
                <p>Exclusive deliverables structured for impactful brand association without commercial boundaries</p>
            </div>
            
            <!-- Row 1: Title, Powered By, Co-Powered By -->
            <div class="row g-4 justify-content-center">
                <!-- Title Sponsor -->
                <div class="col-lg-4 col-md-6">
                    <div class="tier-card featured">
                        <span class="tier-badge">Title Partner</span>
                        <h3 class="tier-name">Title Sponsor</h3>
                        <p class="tier-desc">Premium naming rights and ultimate brand integration across all HCPL platforms.</p>
                        <div class="tier-divider"></div>
                        <ul class="tier-features">
                            <li><i class="fa fa-check-circle"></i>Main Title Sponsor naming rights</li>
                            <li><i class="fa fa-check-circle"></i>Logo integrated in main HCPL logo lockup</li>
                            <li><i class="fa fa-check-circle"></i>Primary branding slot on front of match jerseys</li>
                            <li><i class="fa fa-check-circle"></i>Consistent logo presence on TV & OTT broadcasts</li>
                            <li><i class="fa fa-check-circle"></i>Premium on-ground boards & pitch branding</li>
                            <li><i class="fa fa-check-circle"></i>Dedicated digital & social campaign inclusion</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="tier-btn btn-solid-orange">Talk to our Team</a>
                    </div>
                </div>

                <!-- Powered By Sponsor -->
                <div class="col-lg-4 col-md-6">
                    <div class="tier-card">
                        <span class="tier-badge">Powered By</span>
                        <h3 class="tier-name">Powered By</h3>
                        <p class="tier-desc">Highly visible co-branding and primary partner placement on jerseys.</p>
                        <div class="tier-divider"></div>
                        <ul class="tier-features">
                            <li><i class="fa fa-check-circle"></i>"Powered By" status in tournament title</li>
                            <li><i class="fa fa-check-circle"></i>Lead branding position on jersey sleeve / back</li>
                            <li><i class="fa fa-check-circle"></i>Dedicated TV/OTT broadcast integration slots</li>
                            <li><i class="fa fa-check-circle"></i>Prominent ground boards visibility</li>
                            <li><i class="fa fa-check-circle"></i>Co-branded digital campaigns and promotions</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="tier-btn btn-outline-gold">Request Proposal</a>
                    </div>
                </div>

                <!-- Co-Powered By Sponsor -->
                <div class="col-lg-4 col-md-6">
                    <div class="tier-card">
                        <span class="tier-badge">Co-Powered By</span>
                        <h3 class="tier-name">Co-Powered By</h3>
                        <p class="tier-desc">Strong secondary broadcast rotation and team training wear presence.</p>
                        <div class="tier-divider"></div>
                        <ul class="tier-features">
                            <li><i class="fa fa-check-circle"></i>Co-Powered status on main branding banners</li>
                            <li><i class="fa fa-check-circle"></i>Branding on player training kit & team wear</li>
                            <li><i class="fa fa-check-circle"></i>Logo rotations during TV & OTT broadcasts</li>
                            <li><i class="fa fa-check-circle"></i>Dedicated signage on outfield ground boards</li>
                            <li><i class="fa fa-check-circle"></i>Branding on media press conference backdrops</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="tier-btn btn-outline-white">Request Proposal</a>
                    </div>
                </div>
            </div>

            <!-- Row 2: Official Partner, Umpire Partner -->
            <div class="row g-4 justify-content-center mt-4">
                <!-- Official Partner -->
                <div class="col-lg-4 col-md-6">
                    <div class="tier-card">
                        <span class="tier-badge">Official Partner</span>
                        <h3 class="tier-name">Official Partner</h3>
                        <p class="tier-desc">Category exclusivity (Beverage, Car, Gear, etc.) and in-stadia visibility.</p>
                        <div class="tier-divider"></div>
                        <ul class="tier-features">
                            <li><i class="fa fa-check-circle"></i>Category-exclusive "Official Partner" rights</li>
                            <li><i class="fa fa-check-circle"></i>Logo on tournament partner board rollups</li>
                            <li><i class="fa fa-check-circle"></i>On-field boundary rope brand placement</li>
                            <li><i class="fa fa-check-circle"></i>Logo in website footer & official app listing</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="tier-btn btn-outline-white">Talk to our Team</a>
                    </div>
                </div>

                <!-- Official Umpire Partner -->
                <div class="col-lg-4 col-md-6">
                    <div class="tier-card featured">
                        <span class="tier-badge">Umpire Partner</span>
                        <h3 class="tier-name">Umpire Partner</h3>
                        <p class="tier-desc">High-frequency visual ownership during critical match review moments.</p>
                        <div class="tier-divider"></div>
                        <ul class="tier-features">
                            <li><i class="fa fa-check-circle"></i>Branding on umpire uniforms (jersey chest, back, cap)</li>
                            <li><i class="fa fa-check-circle"></i><strong>70% Visibility During Umpire Review</strong></li>
                            <li><i class="fa fa-check-circle"></i>Logo placement on third umpire review screens</li>
                            <li><i class="fa fa-check-circle"></i>Logo on strategic timeout countdown graphic cards</li>
                            <li><i class="fa fa-check-circle"></i>Mid-roll commercials during live broadcasts</li>
                        </ul>
                        <a href="{{ route('contact') }}" class="tier-btn btn-solid-orange">Request Proposal</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. Tournament Schedule Timeline Section (Light Grey Background) -->
    <section class="section-padding section-light-grey">
        <div class="container">
            <div class="sponsor-section-title">
                <h2>Campaign <span>Timeline</span> (Men's & Women's)</h2>
                <p>Key tournament milestones leading to Season 1 Kick-off for both Men's & Women's leagues</p>
            </div>
            
            <div class="timeline-container">
                <!-- Desktop timeline background lines -->
                <div class="timeline-line"></div>
                <div class="timeline-progress" style="width: 100%;"></div>

                <div class="row g-4 justify-content-between">
                    <!-- Pre-launch -->
                    <div class="col-lg-2 col-md-12">
                        <div class="timeline-node">
                            <div class="timeline-dot">1</div>
                            <div class="timeline-date">June 2026</div>
                            <div class="timeline-title">Pre-launch</div>
                            <p class="timeline-desc">Initial campaigns, logo launches, and mentor announcements.</p>
                        </div>
                    </div>

                    <!-- Registrations -->
                    <div class="col-lg-2 col-md-12">
                        <div class="timeline-node">
                            <div class="timeline-dot">2</div>
                            <div class="timeline-date">June & July 2026</div>
                            <div class="timeline-title">Registrations</div>
                            <p class="timeline-desc">Official portal opens for player and team registrations.</p>
                        </div>
                    </div>

                    <!-- Trials -->
                    <div class="col-lg-2 col-md-12">
                        <div class="timeline-node">
                            <div class="timeline-dot">3</div>
                            <div class="timeline-date">Aug - Oct 2026</div>
                            <div class="timeline-title">Trials</div>
                            <p class="timeline-desc">Physical player trials conducted across 22 districts of Haryana.</p>
                        </div>
                    </div>

                    <!-- Auction -->
                    <div class="col-lg-2 col-md-12">
                        <div class="timeline-node">
                            <div class="timeline-dot">4</div>
                            <div class="timeline-date">October 2026</div>
                            <div class="timeline-title">Player Auction</div>
                            <p class="timeline-desc">Franchises pick the best talent in a live broadcast auction event.</p>
                        </div>
                    </div>

                    <!-- Season Kick Off -->
                    <div class="col-lg-2 col-md-12">
                        <div class="timeline-node">
                            <div class="timeline-dot">5</div>
                            <div class="timeline-date">November 2026</div>
                            <div class="timeline-title">Season Kick-off</div>
                            <p class="timeline-desc">Grand league matches start (Men's & Women's tournaments).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Additional Branding Deliverables (Navy Blue Background) -->
    <section class="section-padding section-dark">
        <div class="container">
            <div class="sponsor-section-title">
                <h2>Branding <span>Deliverables & Assets</span></h2>
                <p>Tangible assets designed to guarantee consistent exposure</p>
            </div>

            <div class="row g-4">
                <!-- Player Kit Branding -->
                <div class="col-lg-6">
                    <div class="benefit-panel">
                        <h3><i class="fa fa-tags"></i> Player Kit Branding</h3>
                        <ul class="benefit-list">
                            <li>Primary front-chest placement on player jerseys</li>
                            <li>Logo placement on match jersey back and sleeve slots</li>
                            <li>Branding on official team training shirts & tracksuits</li>
                            <li>Official match umpire shirts and caps branding</li>
                            <li>Logo placement on team kit bags and luggage accessories</li>
                            <li>Coaching & support staff uniforms branding</li>
                            <li>Official replica shirts and merchandise branding</li>
                        </ul>
                        
                        <div class="benefit-highlight-box">
                            <div class="benefit-highlight-icon"><i class="fa fa-television"></i></div>
                            <div class="benefit-highlight-text">
                                <h4>High-Frequency Media Visibility</h4>
                                <p>Guaranteeing maximum cumulative hours of kit branding exposure during broadcasts.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Co-Branded & Content Access -->
                <div class="col-lg-6">
                    <div class="d-flex flex-column h-100 justify-content-between gap-4">
                        <!-- Ticketing Panel -->
                        <div class="benefit-panel p-4">
                            <h3><i class="fa fa-ticket"></i> Co-Branded Ticketing</h3>
                            <ul class="benefit-list">
                                <li>Exclusive logo positioning on match-day physical tickets</li>
                                <li>Branding on online ticketing layouts and platform pages</li>
                                <li>Sponsor signage on stadium gates & registration kiosks</li>
                                <li>VIP and corporate hospitality box naming rights</li>
                            </ul>
                        </div>

                        <!-- Content Panel -->
                        <div class="benefit-panel p-4">
                            <h3><i class="fa fa-share-alt"></i> Direct Player & Content Access</h3>
                            <div class="access-grid mt-2">
                                <div class="access-item">
                                    <h5>Player Social Media</h5>
                                    <p>Co-branded campaigns and direct tags on official player handles.</p>
                                </div>
                                <div class="access-item">
                                    <h5>Press Backdrops</h5>
                                    <p>Immediate visibility on interview & press conference panels.</p>
                                </div>
                                <div class="access-item">
                                    <h5>Meet & Greets</h5>
                                    <p>Exclusive corporate activations and player interactions.</p>
                                </div>
                                <div class="access-item">
                                    <h5>Live Broadcasts</h5>
                                    <p>Dedicated graphics watermarks and logo overlays during matches.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Final CTA Banner Section (White Background) -->
    <section class="cta-container-block">
        <div class="container">
            <div class="cta-banner">
                <h3>Ready to Lock Your Season 1 Exclusivity?</h3>
                <p>Download our detailed sponsorship proposal deck or connect with our marketing team immediately to secure exclusive category rights.</p>
                <div class="cta-actions">
                    <!-- Deck Download Button -->
                    <a href="{{ asset('frontend/documents/hcpl_sponsorship_deck.pdf') }}" class="btn-cta-main" download>
                        <i class="fa fa-download"></i> Download Deck
                    </a>
                    <!-- Contact Us Redirection -->
                    <a href="{{ route('contact') }}" class="btn-cta-secondary">
                        <i class="fa fa-envelope-o"></i> Contact Us
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
