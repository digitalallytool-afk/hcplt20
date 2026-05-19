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
            background: #19398a;
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
                                            <h6>Personal Details</h6>
                                            <span>Basics & Identity</span>
                                        </div>
                                    </div>
                                    <!--<div class="step-item" id="step2-nav">
                                                                                    <div class="step-number">02</div>
                                                                                    <div class="step-label">
                                                                                        <h6>Cricketing Info</h6>
                                                                                        <span>Roles & Experience</span>
                                                                                    </div>
                                                                                </div>-->


                                    <div class="mt-auto pt-5 round-box">
                                        <div class="p-4 rounded-4"
                                            style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1);">
                                            <small class="text-white-50 d-block mb-2">Need help?</small>
                                            <h6 class="mb-0 text-white">Call: +91 9211335612</h6>
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
                                    <!-- Step 1: Personal Details -->
                                    <div id="step1">
                                        <h3 class="form-section-title">Personal Details</h3>


                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">First Name</label>
                                                <input type="text" class="form-control" placeholder="Enter first name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Last Name</label>
                                                <input type="text" class="form-control" placeholder="Enter last name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Father Name</label>
                                                <input type="text" class="form-control" placeholder="Enter father name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mother Name</label>
                                                <input type="text" class="form-control" placeholder="Enter mother name">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Age Category</label>
                                                <select class="form-select">
                                                    <option>Under 16</option>
                                                    <option>Open Age 16</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Gender</label>
                                                <select class="form-select">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Mobile Number</label>
                                                <input type="tel" class="form-control" placeholder="10-digit number">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Email Address</label>
                                                <input type="email" class="form-control" placeholder="email@example.com">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">City</label>
                                                <input type="City" class="form-control" placeholder="City">
                                            </div>

                                            <div class="col-md-6">
                                                <label class="form-label">Player Role</label>
                                                <select class="form-select">
                                                    <option>Batsman</option>
                                                    <option>Bowler</option>
                                                    <option>All Rounder</option>
                                                    <option>Wicket Keeper</option>
                                                    <option>Wicket Keeper/Batsman</option>
                                                </select>
                                            </div>


                                            <div class="col-md-6">
                                                <label class="form-label">Tial District</label>
                                                <select class="form-select">
                                                    <option value="">Select District</option>
                                                    <option value="Ambala">Ambala</option>
                                                    <option value="Bhiwani">Bhiwani</option>
                                                    <option value="Charkhi Dadri">Charkhi Dadri</option>
                                                    <option value="Faridabad">Faridabad</option>
                                                    <option value="Fatehabad">Fatehabad</option>
                                                    <option value="Gurugram">Gurugram</option>
                                                    <option value="Hisar">Hisar</option>
                                                    <option value="Jhajjar">Jhajjar</option>
                                                    <option value="Jind">Jind</option>
                                                    <option value="Kaithal">Kaithal</option>
                                                    <option value="Karnal">Karnal</option>
                                                    <option value="Kurukshetra">Kurukshetra</option>
                                                    <option value="Mahendragarh">Mahendragarh</option>
                                                    <option value="Nuh">Nuh</option>
                                                    <option value="Palwal">Palwal</option>
                                                    <option value="Panchkula">Panchkula</option>
                                                    <option value="Panipat">Panipat</option>
                                                    <option value="Rewari">Rewari</option>
                                                    <option value="Rohtak">Rohtak</option>
                                                    <option value="Sirsa">Sirsa</option>
                                                    <option value="Sonipat">Sonipat</option>
                                                    <option value="Yamunanagar">Yamunanagar</option>
                                                </select>
                                            </div>

                                            <div class="col-md-12">
                                                <label class="form-label">Create Password</label>
                                                <input type="create password" class="form-control"
                                                    placeholder="create password">
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <button type="button" class="btn btn-next">Submit </button>
                                        </div>
                                    </div>

                                    <!-- Step 2: Cricketing Details -->
                                    <!--<div id="step2" style="display: none;">
                                                                                    <h3 class="form-section-title">Cricketing Details</h3>
                                                                                    
                                                                                    <div class="row g-3">
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Primary Role</label>
                                                                                            <select class="form-select">
                                                                                                <option>Batsman</option>
                                                                                                <option>Bowler</option>
                                                                                                <option>All-Rounder</option>
                                                                                                <option>Wicket-Keeper</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Batting Style</label>
                                                                                            <select class="form-select">
                                                                                                <option>Right Hand</option>
                                                                                                <option>Left Hand</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Bowling Style</label>
                                                                                            <select class="form-select">
                                                                                                <option>Fast / Medium</option>
                                                                                                <option>Spin</option>
                                                                                                <option>Slow</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Highest Level Played</label>
                                                                                            <select class="form-select">
                                                                                                <option>School/College</option>
                                                                                                <option>Club Cricket</option>
                                                                                                <option>District Level</option>
                                                                                                <option>State Level</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Preferred Trial Location</label>
                                                                                            <select class="form-select">
                                                                                                <option>Gurugram</option>
                                                                                                <option>Rohtak</option>
                                                                                                <option>Faridabad</option>
                                                                                                <option>Hisar</option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label class="form-label">Past Performance (Optional)</label>
                                                                                            <input type="text" class="form-control" placeholder="Best score or wickets">
                                                                                        </div>
                                                                                    </div>

                                                                                    <div class="mt-5 text-end">
                                                                                        <button type="button" class="btn btn-prev" onclick="prevStep(1)">Back</button>
                                                                                       <button type="button" class="btn btn-next" onclick="nextStep(3)">Next Step <i class="fa fa-angle-right ms-2"></i></button>
                                                                                    </div>
                                                                                </div>-->


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Wizard Script -->
    <script>
        function nextStep(step) {
            // Hide all steps
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'none';
            // document.getElementById('step3').style.display = 'none';

            // Show requested step
            document.getElementById('step' + step).style.display = 'block';

            // Update sidebar nav
            document.querySelectorAll('.step-item').forEach(item => item.classList.remove('active'));
            document.getElementById('step' + step + '-nav').classList.add('active');

            // Scroll to top of form
            window.scrollTo({
                top: 200,
                behavior: 'smooth'
            });
        }

        function prevStep(step) {
            nextStep(step);
        }
    </script>
@endsection
