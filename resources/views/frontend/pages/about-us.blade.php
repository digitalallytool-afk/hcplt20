@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
    <!--
                <div class="inner-banner about-banner" >
                   <img src="images/about us page.jpg.jpeg" class="w-100" alt="about images">
                </div>
                    -->

    <section class="pad100 mt-78">
        <div class="container">
            <div class="row">

                <div class="col-lg-7">
                    <div class="about-text mb-3">

                        <h1 class="heading ">About HCPL</h1>

                        <p>Haryana Cricket Premier League (HCPL) is a professional cricket platform created to discover and
                            promote cricket talent across Haryana. The league is designed to provide players with
                            opportunities to showcase their skills through player trials, team auctions, and competitive
                            franchise matches.</p>

                        <p>HCPL is not just a tournament—it is a mission to support cricket dreams at every stage of life.
                            Our vision is to create a platform where senior players can continue pursuing their cricket
                            dreams beyond a certain age, while young players can start their journey and build their future
                            in the sport.</p>
                        <p>With HCPL Senior League and HCPL Junior League running together, we aim to build a cricket
                            ecosystem where experience and young talent grow side by side. </p>

                        <p>At HCPL, we believe that every player at any age deserves a chance to step onto the field, prove
                            their talent, and chase their cricket dreams.

                        </p>
                    </div>


                </div>
                <div class="col-lg-5">
                    <img src="{{ asset('frontend') }}/images/about-inner.webp" alt="" class="w-100">
                </div>

            </div>



        </div>
        </div>
    </section>


    <section class="pad100 stats-section-light">
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
                        <div class="stat-number" data-target="1" data-prefix="₹" data-suffix="Cr"
                            style="text-transform:capitalize">0</div>
                        <div class="stat-label">PRIZE POOL</div>
                    </div>
                </div>
                <!-- <div class="col-md-3 col-6">
                                    <div class="stat-item">
                                        <div class="stat-number" data-target="30" data-suffix="+">0</div>
                                        <div class="stat-label">MATCHES PLANNED</div>
                                    </div>
                                </div>-->


            </div>
        </div>
    </section>



    <!-- Mission & Vision -->
    <section class="pad100 bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mision-thumb">


                        <h3>Our Mission</h3>
                        <p>
                            To provide every aspiring cricketer in Haryana with top-tier coaching, professional facilities,
                            and a competitive platform to showcase their skills to scouts and franchises across the country.


                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mision-thumb">
                        <h3>Our Vision</h3>
                        <p>
                            To create a sustainable ecosystem for cricket in Haryana where talent is the only currency. We
                            aim to be the most professional domestic league in India, nurturing future stars for the
                            national team.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="pad100">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 text-center">
                    <h3 class="heading ">OUR VALUES</h3>
                </div>

                <div class="col-md-12 mt-4">
                    <div class="value-grid">
                        <div class="value-cards">
                            <div class="value-icon">◈</div>
                            <h4>Excellence</h4>
                            <p>We strive for the highest standards in cricket training and competition.</p>
                        </div>
                        <div class="value-cards">
                            <div class="value-icon">⬡</div>
                            <h4>Transparency</h4>
                            <p>Fair selection and equal opportunities for all aspiring cricketers.</p>
                        </div>
                        <div class="value-cards">
                            <div class="value-icon">◎</div>
                            <h4>Development</h4>
                            <p>Focused on nurturing raw talent into world-class cricket professionals.</p>
                        </div>

                        <div class="value-cards">
                            <div class="value-icon">◎</div>
                            <h4>Innovation</h4>
                            <p>Building scalable sports properties with digital-first approach.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Why Choose Us -->
    <section class="pad100 pt-0">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="heading">Our Team</h2>
                </div>

                <div class="col-lg-9 col-md-12 mx-auto">
                    <div class="row">


                        @foreach ($members as $member)
                            <div class="col-md-4 mb-4">
                                <div class="team-thumbnail">
                                    <div class="profile-img">
                                        @if ($member->image)
                                            <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->name }}"
                                                class="w-100" style="height: 100%;object-fit: cover;">
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


                        {{-- <div class="col-md-4">
                            <div class="team-thumbnail">
                                <div class="profile-img">
                                    <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80"
                                        class="w-100">
                                </div>
                                <div class="profile-details">
                                    <h5>Monika</h5>
                                    <p>Founder & Managing Director</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="team-thumbnail">
                                <div class="profile-img">
                                    <img src="{{ asset('frontend') }}/images/ravi-Dp2Ppmv.jpeg" class="w-100">
                                </div>
                                <div class="profile-details">
                                    <h5>Ravi Goyal</h5>
                                    <p>Co-Founder, Marketing Director</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="team-thumbnail">
                                <div class="profile-img">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&q=80"
                                        class="w-100" style="height: 100%;object-fit: cover;">
                                </div>
                                <div class="profile-details">
                                    <h5>Vijay Khokhar</h5>
                                    <p>Co-Founder, Operations Director</p>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>



    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const statsSection = document.querySelector('.stats-section-light');
            const stats = document.querySelectorAll('.stat-number');
            let animated = false;

            const animateCounters = () => {
                stats.forEach(stat => {
                    const target = parseInt(stat.getAttribute('data-target'));
                    const suffix = stat.getAttribute('data-suffix') || '';
                    const prefix = stat.getAttribute('data-prefix') || '';
                    let count = 0;
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps

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
            }, {
                threshold: 0.5
            });

            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>


@endsection
