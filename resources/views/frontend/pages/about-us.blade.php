@extends('frontend.layouts.main')

@section('title', 'About HCPL T20 - Haryana Cricket Premier League')

@section('meta_description', 'Learn about Haryana Cricket Premier League (HCPL T20) – a professional cricket platform built to discover and promote cricket talent across North India.')

@section('meta_keywords', 'about hcpl, haryana cricket premier league, cricket trials, hcpl t20')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
<style>
    /* ── About Page Scoped Styles ── */
    body { background: #ffffff !important; }

    /* Section 1 – About intro (White) */
    .about-intro-section {
        background: #ffffff;
        padding: 100px 0;
        margin-top: 78px;
    }
    .about-intro-section .heading {
        color: #0a1c3e;
    }
    .about-intro-section p {
        color: #475569;
        line-height: 1.8;
        margin-bottom: 16px;
    }

    /* Section 2 – Stats (Navy) */
    .about-stats-section {
        background: #0a1c3e;
        padding: 80px 0;
        border-top: 3px solid #f4c242;
        border-bottom: 3px solid #f4c242;
    }

    /* Section 3 – Mission & Vision (White) */
    .about-mission-section {
        background: #ffffff;
        padding: 100px 0;
    }
    .about-mission-card {
        background: #ffffff;
        border: 1px solid rgba(10, 28, 62, 0.08);
        border-bottom: 3px solid #f4c242;
        border-radius: 16px;
        padding: 36px 32px;
        min-height: 240px;
        box-shadow: 0 8px 30px rgba(10, 28, 62, 0.05);
        transition: all 0.3s ease;
    }
    .about-mission-card:hover {
        box-shadow: 0 16px 40px rgba(10, 28, 62, 0.1);
        transform: translateY(-4px);
    }
    .about-mission-card h3 {
        font-size: 1.6rem;
        font-weight: 800;
        color: #0a1c3e;
        margin-bottom: 16px;
        font-family: 'DM Sans', sans-serif;
    }
    .about-mission-card p {
        color: #475569;
        line-height: 1.75;
        margin-bottom: 0;
    }

    /* Section 4 – Our Values (Navy) */
    .about-values-section {
        background: #0a1c3e;
        padding: 100px 0;
    }
    .about-values-section .heading {
        color: #ffffff;
    }
    .about-value-card {
        background: rgba(255, 255, 255, 0.04);
        border: 1px solid rgba(255, 255, 255, 0.08);
        border-radius: 16px;
        padding: 32px 28px;
        height: 100%;
        transition: all 0.3s ease;
    }
    .about-value-card:hover {
        background: rgba(255, 255, 255, 0.07);
        border-color: rgba(244, 194, 66, 0.35);
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
    }
    .about-value-icon {
        width: 48px;
        height: 48px;
        background: rgba(244, 194, 66, 0.12);
        border: 1px solid rgba(244, 194, 66, 0.25);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        color: #f4c242;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }
    .about-value-card:hover .about-value-icon {
        background: #f4c242;
        color: #0a1c3e;
    }
    .about-value-card h4 {
        font-size: 1.15rem;
        font-weight: 800;
        color: #ffffff;
        margin-bottom: 12px;
        font-family: 'DM Sans', sans-serif;
    }
    .about-value-card p {
        color: #94a3b8;
        font-size: 0.92rem;
        line-height: 1.7;
        margin-bottom: 0;
    }

    /* Section 5 – Our Team (White) */
    .about-team-section {
        background: #ffffff;
        padding: 100px 0 80px;
    }
    .about-team-section .heading {
        color: #0a1c3e;
    }
    .about-team-section .team-thumbnail {
        background: #ffffff;
        border: 1px solid rgba(10, 28, 62, 0.08);
        box-shadow: 0 8px 25px rgba(10, 28, 62, 0.06);
    }
    .about-team-section .team-thumbnail:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 45px rgba(10, 28, 62, 0.12);
        border-color: rgba(255, 102, 0, 0.3);
    }
</style>

    <!-- ── Section 1: About Intro (White) ── -->
    <section class="about-intro-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="about-text mb-3">
                        <h1 class="heading">About HCPL</h1>
                        <p>Haryana Cricket Premier League (HCPL) is a professional cricket platform created to discover and
                            promote cricket talent across Haryana. The league is designed to provide players with
                            opportunities to showcase their skills through player trials, team auctions, and competitive
                            franchise matches.</p>
                        <p>HCPL is not just a tournament—it is a mission to support cricket dreams at every stage of life.
                            Our vision is to create a platform where senior players can continue pursuing their cricket
                            dreams beyond a certain age, while young players can start their journey and build their future
                            in the sport.</p>
                        <p>With HCPL Senior League and HCPL Junior League running together, we aim to build a cricket
                            ecosystem where experience and young talent grow side by side.</p>
                        <p>At HCPL, we believe that every player at any age deserves a chance to step onto the field, prove
                            their talent, and chase their cricket dreams.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('frontend') }}/images/about-inner.webp" alt="About HCPL" class="w-100" style="border-radius: 20px;">
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section 2: Stats (Navy) ── -->
    <section class="about-stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-target="8" data-suffix="">0</div>
                        <div class="stat-label">DISTRICT TEAMS</div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-target="5000" data-suffix="+">0</div>
                        <div class="stat-label">PLAYERS IN TRIALS</div>
                    </div>
                </div>
                <div class="col-md-4 col-6">
                    <div class="stat-item">
                        <div class="stat-number" data-target="1" data-prefix="₹" data-suffix="Cr" style="text-transform:capitalize">0</div>
                        <div class="stat-label">PRIZE POOL</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section 3: Mission & Vision (White) ── -->
    <section class="about-mission-section">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7">
                    <h2 class="heading" style="color: #0a1c3e;">Our Purpose</h2>
                    <p style="color: #ff6600; font-weight: 700; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase; margin-top: 8px;">Mission & Vision</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="about-mission-card">
                        <h3>Our Vision</h3>
                        <p>To transform Haryana into the powerhouse of Indian cricket by building a world-class grassroots ecosystem that uncovers exceptional talent, empowers both men and women cricketers, and creates a legacy of players who proudly carry the state's spirit onto national and international stages.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-mission-card">
                        <h3>Our Mission</h3>
                        <p>To pioneer Haryana's first professional cricket league as a launchpad for the state's next generation of stars. Through elite competition, structured development, and meaningful exposure, HCPL aims to bridge grassroots cricket with the professional game, enabling players to be discovered by franchises.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <!-- ── Section 4: Our Values (Navy) ── -->
    <section class="about-values-section">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7">
                    <h2 class="heading">Our Values</h2>
                    <p style="color: #f4c242; font-weight: 700; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase; margin-top: 8px;">What We Stand For</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="about-value-card">
                        <div class="about-value-icon">◈</div>
                        <h4>Excellence</h4>
                        <p>We strive for the highest standards in cricket training and competition.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-value-card">
                        <div class="about-value-icon">⬡</div>
                        <h4>Transparency</h4>
                        <p>Fair selection and equal opportunities for all aspiring cricketers.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-value-card">
                        <div class="about-value-icon">◎</div>
                        <h4>Development</h4>
                        <p>Focused on nurturing raw talent into world-class cricket professionals.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="about-value-card">
                        <div class="about-value-icon">◎</div>
                        <h4>Innovation</h4>
                        <p>Building scalable sports properties with a digital-first approach.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── Section 5: Our Team (White) ── -->
    <section class="about-team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="heading">Our Team</h2>
                    <p style="color: #ff6600; font-weight: 700; font-size: 0.85rem; letter-spacing: 2px; text-transform: uppercase; margin-top: 8px;">The People Behind HCPL</p>
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach ($members as $member)
                            <div class="col-md-3 mb-4">
                                <div class="team-thumbnail">
                                    <div class="profile-img">
                                        @if ($member->image)
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                                class="w-100" style="height: 100%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('frontend/images/default-avatar.png') }}"
                                                alt="{{ $member->name }}" class="w-100">
                                        @endif
                                    </div>
                                    <div class="profile-details">
                                        <h5>{{ $member->name }}</h5>
                                        <p>{{ $member->designation }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statsSection = document.querySelector('.about-stats-section');
            const stats = document.querySelectorAll('.stat-number');
            let animated = false;

            const animateCounters = () => {
                stats.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-target'));
                    const suffix = stat.getAttribute('data-suffix') || '';
                    const prefix = stat.getAttribute('data-prefix') || '';
                    let count = 0;
                    const duration = 2000;
                    const increment = target / (duration / 16);

                    const updateCount = () => {
                        count += increment;
                        if (count < target) {
                            stat.innerText = prefix + Math.floor(count) + suffix;
                            requestAnimationFrame(updateCount);
                        } else {
                            stat.innerText = prefix + target + suffix;
                        }
                    };
                    updateCount();
                });
            };

            const observer = new IntersectionObserver((entries) => {
                if (entries[0].isIntersecting && !animated) {
                    animateCounters();
                    animated = true;
                }
            }, { threshold: 0.5 });

            if (statsSection) observer.observe(statsSection);
        });
    </script>

@endsection

