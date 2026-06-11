@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
    <style>
        body {
            background: #ffffff !important;
        }
        :root {
            --light-bg: #fff8f0;
            --gold: #f4c242;
            --gold-hover: #d9a82e;
            --dark-text: #3c3b3b;
            --muted-text: #666;
            --white: #ffffff;
            --nav-bg: #0b0f16;
        }



        /* Hero Section */
        /* .registration-hero {
                                                        height: 300px;
                                                        background: linear-gradient(rgba(11, 15, 22, 0.7), rgba(11, 15, 22, 0.7)), url('https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?w=1600&q=80') center/cover no-repeat;
                                                        display: flex;
                                                        align-items: center;
                                                        justify-content: center;
                                                        text-align: center;
                                                        margin-top:79px;
                                                    }*/

        .hero-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            color: #000;
            text-transform: uppercase;

        }

        /* Form Wizard Styling */
        .registration-container {

            padding: 100px 0;
            position: relative;
            z-index: 10;
        }

        .form-wizard {
            background: var(--white);
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .wizard-sidebar {
            background: #0a1c3e;
            padding: 50px 40px;
            color: var(--white);
            height: 100%;
        }

        .step-item {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .step-item.active {
            opacity: 1;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border: 2px solid var(--gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            margin-right: 20px;
            color: var(--gold);
        }

        .step-item.active .step-number {
            background: var(--gold);
            color: #000;
        }

        .step-label h6 {
            margin: 0;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9rem;
        }

        .step-label span {
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }

        /* Form Controls */
        .form-content {
            padding: 60px;
        }

        .form-label {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--dark-text);
        }

        .form-control,
        .form-select {
            padding: 15px 20px;
            border-radius: 8px;
            border: 2px solid #eee;
            background: #fcfcfc;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 5px rgba(244, 194, 66, 0.1);
            background: #fff;
        }

        .form-section-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 30px;
            color: var(--dark-text);
            border-bottom: 3px solid var(--gold);
            display: inline-block;
            padding-bottom: 10px;
        }

        .photo-upload-box {
            width: 150px;
            height: 150px;
            border: 3px dashed #ddd;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }

        .photo-upload-box:hover {
            border-color: var(--gold);
            background: rgba(244, 194, 66, 0.05);
        }

        .photo-upload-box i {
            font-size: 2rem;
            color: #ddd;
            margin-bottom: 10px;
        }

        /* Buttons */
        .btn-next {
            background: #f5c518 !important;
            color: #000;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 800;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-next:hover {
            background: #1a222e;
            transform: translateY(-3px);
            color: var(--white);
        }

        .btn-prev {
            background: #19398a !important;
            color: #fff !important;
            padding: 15px 40px;
            border-radius: 50px;
            font-weight: 800;
            border: none;
            transition: all 0.3s ease;
            margin-right: 15px;
        }

        @media (max-width: 991px) {
            .wizard-sidebar {
                height: auto;
                padding: 30px;
            }

            .form-content {
                padding: 30px;
            }

            .step-item {
                margin-bottom: 0;
                margin-right: 20px;
            }

            .step-label {
                display: none;
            }

            .wizard-sidebar .d-flex {
                flex-direction: row !important;
                overflow-x: auto;
            }

            .hero-title {
                font-size: 40px;
            }
        }

        /* Why Register Section */
        .why-register-section {
            background: #0a1c3e;
            padding: 80px 0;
            position: relative;
            z-index: 10;
        }
        
        .why-register-section .section-title {
            color: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-weight: 800;
            font-size: 2.5rem;
            text-transform: uppercase;
        }

        .why-register-section .section-subtitle {
            color: #f4c242;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 50px;
        }

        .why-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 35px 25px;
            border-radius: 20px;
            text-align: center;
            height: 100%;
            transition: all 0.3s ease;
        }

        .why-card:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(244, 194, 66, 0.3);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .why-icon {
            font-size: 2.5rem;
            background: rgba(244, 194, 66, 0.1);
            border: 1px solid rgba(244, 194, 66, 0.25);
            width: 70px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 auto 20px auto;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .why-card:hover .why-icon {
            background: #f4c242;
            color: #000000;
            transform: scale(1.05);
        }

        .why-card h4 {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 12px;
            line-height: 1.4;
        }

        .why-card p {
            color: #a0aec0;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 0;
        }

        /* Player Journey / Roadmap Styling */
        .roadmap-section {
            background: #ffffff;
            padding: 100px 0;
            position: relative;
            z-index: 10;
            border-top: 1px solid rgba(10, 28, 62, 0.05);
        }
        .roadmap-section .section-title {
            color: #0a1c3e;
            font-family: 'DM Sans', sans-serif;
            font-weight: 800;
            font-size: 2.6rem;
            text-transform: uppercase;
        }
        .roadmap-section .section-subtitle {
            color: #ff6600;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 50px;
        }
        .roadmap-container-flow {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: stretch;
            flex-wrap: wrap;
            margin-top: 40px;
        }
        /* Connection line for desktop */
        .roadmap-line {
            position: absolute;
            top: 55px;
            left: 10%;
            right: 10%;
            height: 3px;
            background: repeating-linear-gradient(to right, #cbd5e1, #cbd5e1 8px, transparent 8px, transparent 16px);
            z-index: 1;
        }
        .roadmap-card {
            background: #0a1c3e;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 30px 24px;
            text-align: center;
            width: 23%;
            min-width: 240px;
            position: relative;
            z-index: 2;
            box-shadow: 0 12px 30px rgba(10, 28, 62, 0.08);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .roadmap-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.3);
            border-color: rgba(255, 102, 0, 0.4);
            background: #0d224b;
        }
        .roadmap-step-badge {
            background: #ff6600;
            color: #ffffff;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.25rem;
            margin-bottom: 20px;
            box-shadow: 0 6px 15px rgba(255, 102, 0, 0.25);
            border: 3px solid #0a1c3e;
            transition: all 0.3s ease;
        }
        .roadmap-card:hover .roadmap-step-badge {
            background: #f4c242;
            color: #0a1c3e;
            box-shadow: 0 6px 15px rgba(244, 194, 66, 0.4);
            transform: scale(1.05);
            border-color: #0d224b;
        }
        .roadmap-card h3 {
            color: #ffffff;
            font-size: 1.25rem;
            font-weight: 800;
            margin-bottom: 12px;
            font-family: 'DM Sans', sans-serif;
        }
        .roadmap-card p {
            color: #cbd5e1;
            font-size: 0.88rem;
            line-height: 1.5;
            margin-bottom: 0;
        }
        .fee-badge-dynamic {
            background: rgba(255, 102, 0, 0.12);
            border: 1px dashed #ff6600;
            color: #ff6600;
            font-weight: 800;
            font-size: 0.95rem;
            padding: 8px 12px;
            border-radius: 8px;
            margin-top: 15px;
            display: inline-block;
        }
        .fee-badge-strike {
            text-decoration: line-through;
            font-size: 0.78rem;
            color: #94a3b8;
            margin-right: 6px;
        }
        .criteria-box-v2 {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 12px 14px;
            margin-top: 15px;
            text-align: left;
            width: 100%;
        }
        .criteria-box-v2 div {
            font-size: 0.8rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .criteria-box-v2 div:last-child {
            margin-bottom: 0;
        }
        .criteria-box-v2 span {
            font-size: 0.72rem;
            font-weight: 500;
            color: #a0aec0;
        }

        .roadmap-card-footer {
            margin-top: auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding-top: 20px;
        }
        .highlight-badge-static {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            font-weight: 800;
            font-size: 0.88rem;
            padding: 8px 14px;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
        }
        .roadmap-card:hover .highlight-badge-static {
            background: rgba(255, 102, 0, 0.15);
            border-color: rgba(255, 102, 0, 0.4);
            color: #ff6600;
        }

        @media (max-width: 991px) {
            .roadmap-container-flow {
                flex-direction: column;
                align-items: center;
                gap: 40px;
            }
            .roadmap-card {
                width: 80%;
                max-width: 450px;
            }
            .roadmap-line {
                display: none;
            }
        }
    </style>


    <div class="registration-section mt-78">



        <div class="registration-slider">




            @forelse ($sliders as $slider)
                <div class="item">
                    <div class="hero-thumnail">
                        <img src="{{ 'storage/' . $slider->image }}" class="w-100">

                    </div>
                </div>

            @empty

                <div class="item">
                    <div class="hero-thumnail">
                        <img src="{{ asset('frontend') }}/images/Player-Registration1.web" class="w-100">

                    </div>
                </div>
            @endforelse





        </div>
    </div>



    <!-- Hero -->
    <!--<header class="registration-hero">
                                                    <div class="container">
                                                      
                                                    </div>
                                                </header>-->

    <!-- Registration Form Wizard -->
    <div class="container registration-container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <h1 class="hero-title text-center">Player Registration</h1>
                <p class="fw-bold text-center" style="color:#f5c518">JOIN THE LEAGUE OF CHAMPIONS</p>

                <div class="form-wizard">
                    <div class="row g-0">
                        <!-- Sidebar Navigation -->
                        <div class="col-lg-4">
                            <div class="wizard-sidebar h-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="step-item active" id="step1-nav">
                                        <div class="step-number">01</div>
                                        <div class="step-label">
                                            <h6>Contact Details</h6>
                                            <span>Mobile or Email</span>
                                        </div>
                                    </div>
                                    <div class="step-item" id="step2-nav">
                                        <div class="step-number">02</div>
                                        <div class="step-label">
                                            <h6>Verification</h6>
                                            <span>Enter OTP</span>
                                        </div>
                                    </div>
                                    <div class="step-item" id="step3-nav">
                                        <div class="step-number">03</div>
                                        <div class="step-label">
                                            <h6>Security</h6>
                                            <span>Create Password</span>
                                        </div>
                                    </div>

                                    <div class="mt-auto pt-5 round-box">
                                        <div class="p-4 rounded-4"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                            <small class="text-white-50 d-block mb-2">Need help?</small>
                                            <h6 class="mb-0 text-white">Call: +91 9211335613</h6>
                                            <small class="text-white-50">Support available 10AM - 6PM</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Content -->
                        <div class="col-lg-8">
                            <div class="form-content">
                                <form id="playerForm">
                                    @csrf
                                    <!-- Step 1: Contact Details -->
                                    <div id="step1">
                                        <h3 class="form-section-title">Player Registration</h3>
                                        <p class="text-muted mb-4">Enter your mobile number or email address to get started.</p>

                                        <div id="alert-error-1" class="alert alert-danger" style="display: none;"></div>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Mobile Number or Email ID</label>
                                                <input type="text" id="contact_input" class="form-control" placeholder="Enter 10-digit number or Email">
                                                <input type="hidden" id="contact_type" value="">
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-next" id="btn-send-otp">Send OTP <i class="fa fa-spinner fa-spin ms-2" id="loader-1" style="display: none;"></i></button>
                                        </div>
                                    </div>

                                    <!-- Step 2: Verification -->
                                    <div id="step2" style="display: none;">
                                        <h3 class="form-section-title">Verify OTP</h3>
                                        <p class="text-muted mb-4">Please enter the 6-digit OTP sent to <strong id="sent-contact-label"></strong></p>

                                        <div id="alert-error-2" class="alert alert-danger" style="display: none;"></div>
                                        <div id="alert-success-2" class="alert alert-success" style="display: none;"></div>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Enter OTP</label>
                                                <input type="text" id="otp_input" class="form-control" placeholder="000000" maxlength="6">
                                            </div>
                                        </div>

                                        <div class="mt-4 d-flex align-items-center">
                                            <button type="button" class="btn btn-next me-3" id="btn-verify-otp">Verify OTP <i class="fa fa-spinner fa-spin ms-2" id="loader-2" style="display: none;"></i></button>
                                            <button type="button" class="btn btn-outline-secondary" id="btn-resend-otp" disabled>Resend OTP <span id="resend-timer">(60s)</span></button>
                                        </div>
                                    </div>

                                    <!-- Step 3: Security -->
                                    <div id="step3" style="display: none;">
                                        <h3 class="form-section-title">Create Password</h3>
                                        <p class="text-muted mb-4">Set a strong password for your account.</p>

                                        <div id="alert-error-3" class="alert alert-danger" style="display: none;"></div>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label">Create Password</label>
                                                <input type="password" id="password" class="form-control" placeholder="Enter password">
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Confirm Password</label>
                                                <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm password">
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-next" id="btn-create-password">Complete Registration <i class="fa fa-spinner fa-spin ms-2" id="loader-3" style="display: none;"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Register Section -->
    <section class="why-register-section">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Why Register?</h2>
                    <p class="section-subtitle">Benefits of joining the Haryana Corporate Premier League</p>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">🏏</div>
                        <h4>Opportunity to play in a professional league</h4>
                        <p>Compete in a professional domestic structure modeled after top global sports leagues.</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">🔍</div>
                        <h4>Professional Franchise Scouting</h4>
                        <p>Get noticed by scouts, franchise owners, and senior coaches during trials and matches.</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">📺</div>
                        <h4>Exposure and recognition on LIVE broadcast</h4>
                        <p>Every match broadcasted LIVE across media networks, bringing your talent to national light.</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="why-icon">🏆</div>
                        <h4>Prize pool and rewards</h4>
                        <p>Compete for a total prize pool of ₹1 Crore, championship trophies, cars, bikes, and certificates.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Player Journey / Roadmap Section -->
    <section class="roadmap-section">
        <div class="container">
            <div class="row text-center justify-content-center">
                <div class="col-lg-8">
                    <h2 class="section-title">Player Journey</h2>
                    <p class="section-subtitle">Your Roadmap to Professional Cricket</p>
                </div>
            </div>

            <div class="roadmap-container-flow">
                <div class="roadmap-line"></div>

                <!-- Step 1 -->
                <div class="roadmap-card">
                    <div class="roadmap-step-badge">1</div>
                    <h3>Register & Pay</h3>
                    <p>Fill out your player details online, verify your contact number, and pay the dynamic trial registration fee to secure your official slot.</p>
                    <div class="roadmap-card-footer">
                        <div class="fee-badge-dynamic" style="margin-top: 0;">
                            @if(isset($web_setting) && $web_setting->registration_discounted_price)
                                <span class="fee-badge-strike">₹{{ $web_setting->registration_actual_price }}</span>
                                <span>₹{{ $web_setting->registration_discounted_price }} Only</span>
                            @else
                                <span>₹1499 Only</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="roadmap-card">
                    <div class="roadmap-step-badge">2</div>
                    <h3>Selection Trials</h3>
                    <p>Attend zone-wise physical selection trials across Haryana. Selectors will evaluate your skills based on age groups.</p>
                    <div class="roadmap-card-footer">
                        <div class="criteria-box-v2" style="margin-top: 0; padding: 10px 12px; display: flex; flex-direction: column; gap: 6px; width: 100%;">
                            <div style="display: flex; align-items: center; justify-content: space-between; border-bottom: 1px solid rgba(255, 255, 255, 0.1); padding-bottom: 4px; margin-bottom: 0;">
                                <span style="font-weight: 700; color: #ffffff; font-size: 0.8rem;">👦 Men:</span>
                                <span style="color: #ff6600; font-weight: 700; font-size: 0.78rem;">Open Age</span>
                            </div>
                            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0; padding-top: 2px;">
                                <span style="font-weight: 700; color: #ffffff; font-size: 0.8rem;">👧 Women:</span>
                                <span style="color: #ff6600; font-weight: 700; font-size: 0.78rem;">Open Age</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="roadmap-card">
                    <div class="roadmap-step-badge">3</div>
                    <h3>Franchise Auction</h3>
                    <p>Shortlisted players enter the official draft auction pool, where franchise owners bid to secure the best talent for their squads.</p>
                    <div class="roadmap-card-footer">
                        <span class="highlight-badge-static">💰 Franchise Bids</span>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="roadmap-card">
                    <div class="roadmap-step-badge">4</div>
                    <h3>League Glory</h3>
                    <p>Play matches under professional franchise jerseys with live television coverage, massive cash rewards, and championship glory.</p>
                    <div class="roadmap-card-footer">
                        <span class="highlight-badge-static">🏆 ₹1 Crore Pool</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wizard Script -->
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
            document.getElementById('btn-send-otp').addEventListener('click', async function() {
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

            // Step 2: Resend OTP
            document.getElementById('btn-resend-otp').addEventListener('click', async function() {
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

            // Step 2: Verify OTP
            document.getElementById('btn-verify-otp').addEventListener('click', async function() {
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

            // Step 3: Create Password
            document.getElementById('btn-create-password').addEventListener('click', async function() {
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
        });
    </script>
@endsection
