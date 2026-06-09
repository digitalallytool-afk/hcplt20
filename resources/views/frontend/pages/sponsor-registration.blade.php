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

        /* Error Styling (keeping it minimal to not affect UI) */
        .error-text {
            color: #ef4444;
            font-size: 11px;
            font-weight: bold;
            margin-top: 5px;
            display: block;
        }

        .input-error {
            border-color: #ef4444 !important;
        }

        /* Hero Section */
        .sponsor-hero {
            height: 500px;
            background: linear-gradient(rgba(11, 15, 22, 0.8), rgba(11, 15, 22, 0.8)), url('https://hcplt20.com/frontend/images/handhshake.jpg (1).jpeg') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .hero-subtitle {
            color: var(--gold);
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 10px;
            display: block;
        }

        /* Content Sections */
        .section-padding {
            padding: 100px 0;
        }

        .benefit-card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            height: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            margin-top: 30px;
        }

        .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(244, 194, 66, 0.2);
            border-color: #f5c518;
        }

        .benefit-icon {
            width: 60px;
            height: 60px;
            background: #0a1c3e;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #f5c518;
            margin: 0 auto 25px auto;
        }

        .benefit-card h4 {
            color: #0a1c3e;
            font-size: 20px;
            font-weight: 700;
        }

        .benefit-card p {
            color: #5a6b7e;
        }

        /* Form Container */
        .form-container {
            background: var(--white);
            border-radius: 30px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
            padding: 60px;
            margin-top: -175px;
            position: relative;
            z-index: 10;
        }

        .form-label {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            margin-bottom: 10px;
            color: #000;
        }

        .form-control,
        .form-select {
            padding: 15px 20px;
            border-radius: 12px;
            border: 2px solid #eee;
            background: #fcfcfc;
            font-weight: 500;
        }

        .form-control:focus {
            border-color: #f5c518;
            box-shadow: 0 0 0 5px rgba(244, 194, 66, 0.1);
            background: #fff;
        }

        .submit-btn {
            background: var(--nav-bg);
            color: #fff;
            padding: 10px 40px;
            border-radius: 8px;
            font-weight: 500;
            border: none;
            width: 100%;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 20px;
        }

        .submit-btn:hover {
            background: #f5c518;
            color: #000;
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(244, 194, 66, 0.3);
        }

        .section-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 2.5rem;
            font-weight: 900;
            text-transform: uppercase;
            margin-bottom: 40px;
            text-align: center;
        }

        .section-title span {
            color: var(--gold);
        }

        @media (max-width: 768px) {
            .form-container {
                padding: 30px;
                margin-top: -50px;
            }

            .hero-title {
                font-size: 2.5rem;
            }
        }
    </style>

    <!-- Hero -->
    <!-- Hero -->
    <header class="sponsor-hero">
        <div class="container">
            <div class="col-lg-10 mx-auto" <span class="hero-subtitle" style="color:#f4c242">PARTNER WITH THE BEST</span>
                <h1 class="hero-title">Sponsor Registration</h1>
                <h5 class="text-center" style="color:#f4c242">JOIN US IN BUILDING HARYANA’S BIGGEST CRICKET PLATFORM</h5>
                <p class="text-center text-white">At HCPL – Haryana Cricket Premier League, we are committed to discovering
                    and promoting cricket talent from across all 22 districts of Haryana. We believe strong partnerships
                    create powerful impact. If your brand wants to connect with sports enthusiasts and growing audiences,
                    HCPL offers the perfect platform.</p>
                <p class="text-center text-white">Partner with us and grow your brand with cricket.</p>
            </div>
    </header>

    <!-- Registration Section -->
    <section class="section-padding" style="background-color: #ffffff;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9">
                    <div class="form-container">
                        <form id="sponsorForm" onsubmit="handleSponsorSubmit(event)">
                            @csrf
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <label class="form-label">Company / Brand Name *</label>
                                    <input type="text" name="company_name" class="form-control"
                                        placeholder="Enter company name">
                                    <span class="error-text" id="error-company_name"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Contact Person Name *</label>
                                    <input type="text" name="contact_person" class="form-control"
                                        placeholder="Full name">
                                    <span class="error-text" id="error-contact_person"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Phone Number *</label>
                                    <input type="tel" name="phone_number" class="form-control"
                                        placeholder="10-digit mobile">
                                    <span class="error-text" id="error-phone_number"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email Address *</label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="corporate@email.com">
                                    <span class="error-text" id="error-email"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">City / Region</label>
                                    <input type="text" name="city_region" class="form-control"
                                        placeholder="Headquarters location">
                                    <span class="error-text" id="error-city_region"></span>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Sponsorship Category *</label>
                                  <select name="category" class="form-select">
                                        <option value="" disabled selected>Select Category</option>
                                        <option>Title Sponsor</option>
                                        <option>Powered By Sponsor</option>
                                        <option>Co-Sponsor</option>
                                        <option>Associate Sponsor</option>
                                        <option>Team Sponsor</option>
                                        <option>Local Sponsor</option>
                                        <option>Match Sponsor</option>
                                        <option>Awards Sponsor</option>
                                        <option>Official Partners</option>
                                        <option>Ground Partners</option>
                                        <option>Digital Partners</option>
                                        <option>Other</option>
                                    </select>
                                    <span class="error-text" id="error-category"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Estimated Budget (in Lakhs ₹)</label>
                                    <input type="number" name="budget" class="form-control" placeholder="Budget amount">
                                    <span class="error-text" id="error-budget"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">How did you hear about us?</label>
                                    <input type="text" name="hear_about_us" class="form-control"
                                        placeholder="Social Media, News, etc.">
                                    <span class="error-text" id="error-hear_about_us"></span>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Additional Comments / Requirements</label>
                                    <textarea name="comments" class="form-control" rows="4" placeholder="Tell us about your brand goals..."></textarea>
                                    <span class="error-text" id="error-comments"></span>
                                </div>
                                <div class="col-12">
                                    <button type="submit" id="submitBtn" class="submit-btn">Submit Sponsorship
                                        Inquiry</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Partner Section -->
    <section class="section-padding" style="background-color: #0a1c3e;">
        <div class="container">
            <h2 class="heading text-center" style="color: #ffffff;">Why Partner with <span style="color: #f5c518;">HCPL?</span></h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon"><i class="fa fa-bullhorn"></i></div>
                        <h4 class="fw-bold mb-3">Brand Visibility</h4>
                        <p class="small  mb-0">Get exposed to millions of cricket fans across Haryana through on-ground and
                            digital media.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon"><i class="fa fa-users"></i></div>
                        <h4 class="fw-bold mb-3">Wide Reach</h4>
                        <p class="small  mb-0">Connect with a diverse audience from grassroots to urban cities of 22
                            districts.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon"><i class="fa fa-handshake"></i></div>
                        <h4 class="fw-bold mb-3">B2B Networking</h4>
                        <p class="small  mb-0">Connect with other corporate giants and influential stakeholders in the
                            sports industry.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="benefit-card">
                        <div class="benefit-icon"><i class="fa fa-trophy"></i></div>
                        <h4 class="fw-bold mb-3">Impactful Image</h4>
                        <p class="small  mb-0">Be part of a movement that empowers hidden talent and promotes sports
                            excellence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function handleSponsorSubmit(event) {
            event.preventDefault();
            const form = document.getElementById('sponsorForm');
            const btn = document.getElementById('submitBtn');
            const originalText = btn.innerText;

            $('.error-text').text('');
            $('.form-control, .form-select').removeClass('input-error');

            btn.disabled = true;
            btn.innerText = 'Submitting...';

            $.ajax({
                url: "{{ route('sponsor.registration.store') }}",
                method: 'POST',
                data: $(form).serialize(),
                success: function(response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonColor: '#0b0f16',
                    });
                    form.reset();
                    btn.disabled = false;
                    btn.innerText = originalText;
                },
                error: function(xhr) {
                    btn.disabled = false;
                    btn.innerText = originalText;

                    if (xhr.status === 422) {
                        const errors = xhr.responseJSON.errors;
                        Object.keys(errors).forEach(key => {
                            $(`#error-${key}`).text(errors[key][0]);
                            $(`[name="${key}"]`).addClass('input-error');
                        });

                        Swal.fire({
                            title: 'Validation Failed',
                            text: 'Please check the red marked fields.',
                            icon: 'warning',
                            confirmButtonColor: '#f4c242'
                        });
                    } else {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            confirmButtonColor: '#ef4444'
                        });
                    }
                }
            });
        }
    </script>
@endsection
