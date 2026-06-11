@extends('frontend.layouts.main')

@section('title', 'Player Dashboard - HCPL')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .dashboard-hero {
            margin-top: 0;
            padding: 140px 0 90px 0;
            background: linear-gradient(135deg, #19398a 0%, #0b1a42 100%);
            color: white;
            position: relative;
            overflow: hidden;
        }

        @media (max-width: 768px) {
            .dashboard-hero {
                padding: 100px 0 60px 0;
            }

            .dashboard-hero-title {
                font-size: 2rem !important;
            }

            .profile-card {
                padding: 20px !important;
                margin-top: 20px !important;
            }

            .dashboard-nav {
                margin-top: -40px;
                position: relative;
                z-index: 10;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            }
        }

        .dashboard-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(244, 194, 66, 0.15) 0%, rgba(25, 57, 138, 0) 70%);
            border-radius: 50%;
            z-index: 1;
        }

        .dashboard-hero-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 2;
        }

        .dashboard-hero-subtitle {
            font-size: 1.1rem;
            font-weight: 300;
            color: #d1d5db;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero-highlight {
            color: #f4c242;
        }

        .profile-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-top: -50px;
        }

        .form-section-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 25px;
            color: #3c3b3b;
            border-bottom: 3px solid #f4c242;
            display: inline-block;
            padding-bottom: 8px;
        }

        .dashboard-nav {
            background: #19398a;
            border-radius: 15px;
            overflow: hidden;
        }

        .dashboard-nav a {
            color: white;
            padding: 15px 25px;
            display: block;
            text-decoration: none;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .dashboard-nav a:hover,
        .dashboard-nav a.active {
            background: #f4c242;
            color: #000;
            font-weight: bold;
        }

        /* Wizard Steps */
        .wizard-steps {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            position: relative;
        }

        .wizard-steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 0;
            width: 100%;
            height: 4px;
            background: #eee;
            z-index: 1;
        }

        .step-item {
            position: relative;
            z-index: 2;
            text-align: center;
            background: #fff;
            padding: 0 10px;
            flex: 1;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            background: #eee;
            color: #999;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            border: 4px solid #fff;
            transition: all 0.3s;
        }

        .step-item.active .step-circle {
            background: #f4c242;
            color: #000;
        }

        .step-item.completed .step-circle {
            background: #28a745;
            color: #fff;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        /* Professional Form Inputs */
        .form-control,
        .form-select {
            padding: 12px 18px;
            border-radius: 8px;
            border: 2px solid #e4e7f2;
            background-color: #fcfcfc;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            box-shadow: none;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #d8571f;
            box-shadow: 0 0 0 4px rgba(216, 87, 31, 0.1);
            background-color: #fff;
        }

        .form-label {
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #19398a;
            margin-bottom: 8px;
        }

        .form-control.is-invalid,
        .form-select.is-invalid {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #dc3545;
            margin-top: 5px;
            display: none;
            font-weight: 500;
        }

        /* Select2 Custom Styling */
        .select2-container--default .select2-selection--single {
            height: 48px;
            border-radius: 8px;
            border: 2px solid #e4e7f2;
            background-color: #fcfcfc;
            display: flex;
            align-items: center;
            outline: none;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal;
            padding-left: 18px;
            font-weight: 500;
            font-size: 14px;
            color: #212529;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 44px;
            right: 10px;
        }

        .select2-container--default.select2-container--focus .select2-selection--single,
        .select2-container--default.select2-container--open .select2-selection--single {
            border-color: #d8571f;
            box-shadow: 0 0 0 4px rgba(216, 87, 31, 0.1);
            background-color: #fff;
        }

        .select2-container.is-invalid .select2-selection--single {
            border-color: #dc3545 !important;
            box-shadow: 0 0 0 4px rgba(220, 53, 69, 0.1) !important;
        }

        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: #19398a;
            color: white;
    </style>


    <div class="dashboard-hero">
        <div class="container position-relative z-3">
            <div class="row">
                <div class="col-md-8 mx-auto text-center">
                    <h2 class="dashboard-hero-title">Welcome to <span class="hero-highlight">HCPL</span></h2>
                    @if ($profile && $profile->payment_status === 'completed')
                        <p class="dashboard-hero-subtitle">Manage your athletic profile and stay updated with your
                            professional cricket journey.</p>
                    @else
                        <p class="dashboard-hero-subtitle">Complete your athletic profile to unlock your dashboard and begin
                            your journey to professional cricket.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5 pb-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mt-4">
                <div class="dashboard-nav">
                    @if ($profile && $profile->payment_status === 'completed')
                        <a href="#" class="active sidebar-tab" data-target="dashboard-section"><i
                                class="fa fa-home me-2"></i> My Account</a>
                    @else
                        <a href="#" class="active sidebar-tab" data-target="dashboard-section"><i
                                class="fa fa-user me-2"></i> Profile Setup</a>
                    @endif
                    <a href="#" class="sidebar-tab" data-target="my-trials-section"><i
                            class="fa fa-calendar-check-o me-2"></i> My Trials</a>
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a href="#" onclick="document.getElementById('logout-form').submit();"><i
                                class="fa fa-sign-out me-2"></i> Logout</a>
                    </form>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="profile-card position-relative z-3" id="dashboard-section">
                    @if ($profile && $profile->payment_status === 'completed')
                        <!-- Post-Payment "My Account" View -->
                        <div class="text-center py-4">
                            <h2 style="color: #19398a; font-weight: 800;">My Account</h2>
                            <div class="my-4">
                                <div
                                    style="background: linear-gradient(135deg, #19398a, #0b1a42); color: white; padding: 25px; border-radius: 15px; display: inline-block; text-align: center; min-width: 300px; box-shadow: 0 10px 25px rgba(25, 57, 138, 0.2);">
                                    <div
                                        style="font-size: 0.9rem; color: #f4c242; text-transform: uppercase; font-weight: bold; margin-bottom: 5px;">
                                        Player ID</div>
                                    <h3 style="margin-bottom: 0; font-weight: 800; letter-spacing: 2px;">
                                        {{ $profile->player_id }}</h3>
                                </div>
                            </div>

                            <div class="row text-center mt-4">
                                <!-- Personal Information -->
                                <div class="col-md-12 mb-4">
                                    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                                        <div class="card-header bg-primary text-white fw-bold py-3 text-start"
                                            style="font-size: 1.1rem;">
                                            <i class="fa fa-user me-2"></i> Personal Information
                                        </div>
                                        <div class="card-body p-3 p-md-4 bg-light">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Full
                                                            Name</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->first_name }} {{ $profile->last_name }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Father's
                                                            Name</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->father_name }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Mother's
                                                            Name</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->mother_name }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Gender</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->gender }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Date of
                                                            Birth</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ \Carbon\Carbon::parse($profile->dob)->format('d M, Y') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Age
                                                            Category</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->age_category }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Phone
                                                            Number</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->phone_number }}</div>
                                                    </div>
                                                </div>
                                                @if ($profile->alternate_phone_number)
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="p-3 bg-white rounded shadow-sm border"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Alt
                                                                Phone</small>
                                                            <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                                {{ $profile->alternate_phone_number }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($profile->aadhar_number)
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="p-3 bg-white rounded shadow-sm border"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Aadhar</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">{{ $profile->aadhar_number }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="col-sm-6 col-md-8">
                                                    <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Address</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->address }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Location</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->district }}, {{ $profile->state }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cricket Information -->
                                <div class="col-md-12 mb-4">
                                    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;">
                                        <div class="card-header bg-warning text-dark fw-bold py-3 text-start"
                                            style="font-size: 1.1rem;">
                                            <i class="fa fa-trophy me-2"></i> Cricket Information
                                        </div>
                                        <div class="card-body p-3 p-md-4 bg-light">
                                            <div class="row g-3">
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                        style="border-color: #eee !important; border-left: 4px solid #19398a !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Player
                                                            Role</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->player_role }}</div>
                                                    </div>
                                                </div>

                                                @if ($profile->batting_style && in_array($profile->player_role, ['Batsman', 'Wicket Keeper', 'All Rounder']))
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Batting
                                                                Style</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">{{ $profile->batting_style }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($profile->bowler_type && in_array($profile->player_role, ['Bowler', 'All Rounder']))
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Bowler
                                                                Type</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">{{ $profile->bowler_type }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($profile->bowling_style && in_array($profile->player_role, ['Bowler', 'All Rounder']))
                                                    <div class="col-sm-6 col-md-3">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Bowling
                                                                Style</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">{{ $profile->bowling_style }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="col-12 mt-4">
                                                    <h5 class="fw-bold" style="color: #19398a;">Trial Preferences</h5>
                                                </div>

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Trial
                                                            State</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->trial_state }}</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="p-3 bg-white rounded shadow-sm border"
                                                        style="border-color: #eee !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Trial
                                                            District</small>
                                                        <div class="fw-bold text-dark mt-1" style="font-size: 1.1rem;">
                                                            {{ $profile->trial_district }}</div>
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-4">
                                                    <h5 class="fw-bold" style="color: #19398a;">Payment Verification</h5>
                                                </div>

                                                <div class="col-sm-6 col-md-4">
                                                    <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                        style="border-color: #eee !important; border-left: 4px solid #28a745 !important;">
                                                        <small class="text-muted text-uppercase fw-bold"
                                                            style="font-size: 0.7rem; letter-spacing: 1px;">Payment
                                                            Status</small>
                                                        <div class="mt-2">
                                                            <span class="badge bg-success py-2 px-3 text-uppercase fs-6">
                                                                <i class="fa fa-check-circle me-1"></i>
                                                                {{ $profile->payment_status }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($profile->razorpay_payment_id)
                                                    <div class="col-sm-6 col-md-4">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Transaction
                                                                ID</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem; font-family: monospace;">
                                                                {{ $profile->razorpay_payment_id }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($profile->payment_amount)
                                                    <div class="col-sm-6 col-md-4 mt-3 mt-md-0">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Amount
                                                                Paid</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">
                                                                ₹{{ number_format($profile->payment_amount, 2) }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($profile->payment_date)
                                                    <div class="col-sm-6 col-md-6 mt-3">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Payment
                                                                Date</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem;">
                                                                {{ $profile->payment_date->format('d M Y, h:i A') }}</div>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($profile->payment_response && isset($profile->payment_response['method']))
                                                    <div class="col-sm-6 col-md-6 mt-3">
                                                        <div class="p-3 bg-white rounded shadow-sm border h-100"
                                                            style="border-color: #eee !important;">
                                                            <small class="text-muted text-uppercase fw-bold"
                                                                style="font-size: 0.7rem; letter-spacing: 1px;">Payment
                                                                Method</small>
                                                            <div class="fw-bold text-dark mt-1"
                                                                style="font-size: 1.1rem; text-transform: capitalize;">
                                                                {{ $profile->payment_response['method'] }}
                                                                @if (isset($profile->payment_response['bank']) && $profile->payment_response['bank'])
                                                                    <span
                                                                        class="text-muted fs-6">({{ $profile->payment_response['bank'] }})</span>
                                                                @elseif(isset($profile->payment_response['wallet']) && $profile->payment_response['wallet'])
                                                                    <span
                                                                        class="text-muted fs-6">({{ $profile->payment_response['wallet'] }})</span>
                                                                @elseif(isset($profile->payment_response['vpa']) && $profile->payment_response['vpa'])
                                                                    <span
                                                                        class="text-muted fs-6">({{ $profile->payment_response['vpa'] }})</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-5 p-4 bg-light rounded" style="border: 1px dashed #ccc;">
                                <h4 style="color: #333; font-weight: bold;"><i
                                        class="fa fa-calendar-alt text-primary me-2"></i> Trial Details</h4>

                                @php $currentTrial = $profile->latestTrial->first(); @endphp
                                @if ($currentTrial)
                                    <div
                                        class="mt-3 bg-white p-4 rounded border shadow-sm border-start border-4 border-primary">
                                        <h5 class="fw-bold mb-2 text-dark">{{ $currentTrial->title }}</h5>
                                        <div class="row mt-3">
                                            <div class="col-md-4 mb-2">
                                                <small class="text-muted text-uppercase fw-bold"
                                                    style="font-size: 0.7rem; letter-spacing: 1px;"><i
                                                        class="fa fa-map-marker-alt me-1"></i> Venue</small>
                                                <div class="fw-bold text-dark mt-1">{{ $currentTrial->venue ?? 'TBA' }}
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <small class="text-muted text-uppercase fw-bold"
                                                    style="font-size: 0.7rem; letter-spacing: 1px;"><i
                                                        class="fa fa-clock me-1"></i> Date & Time</small>
                                                <div class="fw-bold text-dark mt-1">
                                                    {{ $currentTrial->date_text ?? 'TBA' }}</div>
                                            </div>
                                            <div class="col-md-4 mb-2">
                                                <small class="text-muted text-uppercase fw-bold"
                                                    style="font-size: 0.7rem; letter-spacing: 1px;"><i
                                                        class="fa fa-map me-1"></i> Zone</small>
                                                <div class="fw-bold text-dark mt-1">
                                                    {{ $currentTrial->zone_name ?? 'N/A' }}</div>
                                            </div>

                                            <div class="col-md-12 mt-3 pt-3 border-top">
                                                <small class="text-muted text-uppercase fw-bold"
                                                    style="font-size: 0.7rem; letter-spacing: 1px;"><i
                                                        class="fa fa-flag-checkered me-1"></i> Trial Status</small>
                                                <div class="mt-2">
                                                    @if ($currentTrial->pivot->trial_result == 'success')
                                                        <span class="badge bg-success px-3 py-2">Success</span>
                                                    @elseif($currentTrial->pivot->trial_result == 'failed')
                                                        <span class="badge bg-danger px-3 py-2">Failed</span>
                                                    @else
                                                        <span class="badge bg-secondary px-3 py-2">Pending</span>
                                                    @endif

                                                    @if ($currentTrial->pivot->trial_remark)
                                                        <p class="text-muted mt-2 mb-0" style="font-size: 0.85rem;"><i
                                                                class="fa fa-info-circle me-1"></i>
                                                            {{ $currentTrial->pivot->trial_remark }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <p class="text-muted mt-2 mb-3" style="font-size: 1.1rem;">To be announced soon. Keep
                                        checking your dashboard, SMS, our social media handles, and email for updates.</p>
                                @endif

                                <div
                                    class="d-flex flex-column flex-md-row align-items-md-center gap-3 mt-3 pt-3 border-top">
                                    @php $web_setting = \App\Models\WebSetting::first(); @endphp
                                    <span class="fw-bold" style="color: #19398a;">Follow Us for Updates:</span>
                                    <div class="d-flex align-items-center gap-3">
                                        <a href="{{ $web_setting->instagram_url ?? '#' }}" target="_blank"
                                            class="text-decoration-none text-dark"><i class="fa fa-instagram fs-5"
                                                style="color: #E1306C;"></i></a>
                                        <a href="{{ $web_setting->facebook_url ?? '#' }}" target="_blank"
                                            class="text-decoration-none text-dark"><i class="fa fa-facebook fs-5"
                                                style="color: #1877F2;"></i></a>
                                        <a href="{{ $web_setting->youtube_url ?? '#' }}" target="_blank"
                                            class="text-decoration-none text-dark"><i class="fa fa-youtube-play fs-5"
                                                style="color: #FF0000;"></i></a>
                                        <a href="{{ $web_setting->twitter_url ?? '#' }}" target="_blank"
                                            class="text-decoration-none text-dark"
                                            style="display:inline-flex; align-items:center;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                                            </svg>
                                        </a>
                                    </div>
                                    <span class="ms-md-auto text-muted mt-2 mt-md-0">
                                        <i class="fa fa-envelope-o me-1"></i> <a
                                            href="mailto:{{ $web_setting->email ?? 'info@hcplt20.com' }}"
                                            class="text-decoration-none text-muted">{{ $web_setting->email ?? 'info@hcplt20.com' }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Profile Setup Form -->
                        <div class="wizard-steps">
                            <div class="step-item active" id="nav-step1">
                                <div class="step-circle">1</div>
                                <div>Innings 1: Personal Info</div>
                            </div>
                            <div class="step-item" id="nav-step2">
                                <div class="step-circle">2</div>
                                <div>Innings 2: Cricket Info</div>
                            </div>
                            <div class="step-item" id="nav-step3">
                                <div class="step-circle">3</div>
                                <div>Final Over: Payment</div>
                            </div>
                        </div>

                        <div id="alert-error" class="alert alert-danger" style="display:none;"></div>
                        <div id="alert-success" class="alert alert-success" style="display:none;"></div>

                        <form id="profile-form">
                            @csrf

                            <!-- STEP 1: Personal Info -->
                            <div class="step-content active" id="step1">
                                <h3 class="form-section-title">Personal Information</h3>
                                <div class="row g-4 mt-2">
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">First Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            placeholder="Enter first name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Last Name</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Enter last name">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Father Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="father_name" id="father_name" class="form-control"
                                            placeholder="Enter father name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Mother Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="mother_name" id="mother_name" class="form-control"
                                            placeholder="Enter mother name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Gender <span
                                                class="text-danger">*</span></label>
                                        <select name="gender" id="gender" class="form-select" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Date of Birth <span
                                                class="text-danger">*</span></label>
                                        <input type="date" name="dob" id="dob" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Age Category <span
                                                class="text-danger">*</span></label>
                                        <select name="age_category" id="age_category" class="form-select" required>
                                            <option value="">Select Category</option>
                                            <option value="Under 16">Under 16</option>
                                            <option value="Open Age">Open Age</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Phone Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control"
                                            placeholder="10-digit mobile number" maxlength="10"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="{{ auth()->user()->phone ?? '' }}" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Alternate Phone (Optional)</label>
                                        <input type="text" name="alternate_phone_number" id="alternate_phone_number"
                                            class="form-control" placeholder="10-digit alternate number" maxlength="10"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Address <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="address" id="address" class="form-control"
                                            placeholder="Enter full address" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">State <span class="text-danger">*</span></label>
                                        <select name="state" id="state" class="form-select" required>
                                            <option value="">Loading States...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">District <span
                                                class="text-danger">*</span></label>
                                        <select name="district" id="district" class="form-select" required disabled>
                                            <option value="">Select District</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Aadhar Number (Optional)</label>
                                        <input type="text" name="aadhar_number" id="aadhar_number"
                                            class="form-control" placeholder="Enter 12 digit Aadhar" maxlength="12"
                                            pattern="\d{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                    </div>
                                    <div class="col-12 mt-4 text-end">
                                        <button type="button" class="btn btn-primary px-5 py-3" id="btn-next-1"
                                            style="background:#f4c242; color:#000; border:none; font-weight:bold; border-radius:8px;">Next
                                            Step <i class="fa fa-arrow-right ms-2"></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 2: Cricket Info -->
                            <div class="step-content" id="step2">
                                <h3 class="form-section-title">Cricketing Details</h3>
                                <div class="row g-4 mt-2">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold">Player Role <span
                                                class="text-danger">*</span></label>
                                        <select name="player_role" id="player_role" class="form-select" required>
                                            <option value="">Select Role</option>
                                            <option value="Batsman">Batsman</option>
                                            <option value="Bowler">Bowler</option>
                                            <option value="Wicket Keeper">Wicket Keeper</option>
                                            <option value="All Rounder">All Rounder</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12" id="wrap_batting_style" style="display:none;">
                                        <label class="form-label fw-bold">Batting Style <span
                                                class="text-danger">*</span></label>
                                        <select name="batting_style" id="batting_style" class="form-select">
                                            <option value="">Select Batting Style</option>
                                            <option value="Right Handed Batsman">Right Handed Batsman</option>
                                            <option value="Left Handed Batsman">Left Handed Batsman</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12" id="wrap_bowler_type" style="display:none;">
                                        <label class="form-label fw-bold">Bowler Type <span
                                                class="text-danger">*</span></label>
                                        <select name="bowler_type" id="bowler_type" class="form-select">
                                            <option value="">Select Bowler Type</option>
                                            <option value="Right Arm Bowler">Right Arm Bowler</option>
                                            <option value="Left Arm Bowler">Left Arm Bowler</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12" id="wrap_bowling_style" style="display:none;">
                                        <label class="form-label fw-bold">Bowling Style <span
                                                class="text-danger">*</span></label>
                                        <select name="bowling_style" id="bowling_style" class="form-select">
                                            <option value="">Select Bowling Style</option>
                                            <option value="Fast">Fast</option>
                                            <option value="Medium Fast">Medium Fast</option>
                                            <option value="Off Spin">Off Spin</option>
                                            <option value="Leg Spin">Leg Spin</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <h3 class="form-section-title">Trial Preferences</h3>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Trial State <span
                                                class="text-danger">*</span></label>
                                        <select name="trial_state" id="trial_state" class="form-select" required>
                                            <option value="">Loading States...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold">Trial District <span
                                                class="text-danger">*</span></label>
                                        <select name="trial_district" id="trial_district" class="form-select" required
                                            disabled>
                                            <option value="">Select District</option>
                                        </select>
                                    </div>

                                    <div class="col-12 mt-4 d-flex justify-content-between">
                                        <button type="button" class="btn btn-secondary px-5 py-3" id="btn-prev-2"
                                            style="border-radius:8px; font-weight:bold;">Back</button>
                                        <button type="button" class="btn btn-primary px-5 py-3" id="btn-save-proceed"
                                            style="background:#f4c242; color:#000; border:none; font-weight:bold; border-radius:8px;">
                                            <span class="btn-text">Save & Proceed to Payment</span>
                                            <span class="spinner-border spinner-border-sm ms-2" style="display:none;"
                                                id="loader-save"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 3: Payment -->
                            <div class="step-content text-center py-5" id="step3">
                                <i class="fa fa-check-circle text-success mb-3" style="font-size: 60px;"></i>
                                <h3>Profile Saved Successfully!</h3>
                                <p class="text-muted">You must pay the registration fee to complete your enrollment.</p>

                                <div class="bg-light p-4 rounded-3 d-inline-block mt-3 mb-4 border">
                                    <h4 class="mb-0">Total Fee:
                                        <strong>₹{{ \App\Models\WebSetting::getCurrentRegistrationPrice() }}</strong></h4>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center gap-3">
                                    <button type="button" class="btn btn-secondary px-4 py-3" id="btn-prev-3"
                                        style="border-radius:8px; font-weight:bold;">Back</button>
                                    <button type="button" class="btn btn-primary px-5 py-3" id="btn-pay-now"
                                        style="background:#19398a; color:#fff; border:none; font-weight:bold; font-size: 1.2rem; border-radius:8px;">
                                        Pay Securely with Razorpay
                                    </button>
                                </div>
                            </div>

                        </form>
                    @endif
                </div>

                <!-- My Trials Section -->
                <div class="profile-card position-relative z-3" id="my-trials-section" style="display: none;">
                    <h2 style="color: #19398a; font-weight: 800; margin-bottom: 20px;"><i
                            class="fa fa-calendar-check-o text-primary me-2"></i> My Trial History</h2>
                    @if ($profile && $profile->trials->count() > 0)
                        <div class="table-responsive mt-4">
                            <table class="table table-bordered table-hover">
                                <thead style="background-color: #19398a; color: white;">
                                    <tr>
                                        <th>Trial Details</th>
                                        <th>Result</th>
                                        <th>Status Date</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profile->trials as $trial)
                                        <tr>
                                            <td>
                                                <div class="fw-bold text-dark">{{ $trial->title }}</div>
                                                <div class="text-muted small mt-1"><i class="fa fa-map-marker-alt"></i>
                                                    {{ $trial->venue ?? 'TBA' }} ({{ $trial->zone_name ?? 'N/A' }})</div>
                                                <div class="text-muted small"><i class="fa fa-clock-o"></i>
                                                    {{ $trial->date_text ?? 'TBA' }}</div>
                                            </td>
                                            <td class="align-middle">
                                                @if ($trial->pivot->trial_result == 'success')
                                                    <span class="badge bg-success px-3 py-2">Success</span>
                                                @elseif($trial->pivot->trial_result == 'failed')
                                                    <span class="badge bg-danger px-3 py-2">Failed</span>
                                                @else
                                                    <span class="badge bg-secondary px-3 py-2">Pending</span>
                                                @endif
                                            </td>
                                            <td class="align-middle text-muted fw-bold">
                                                {{ $trial->pivot->updated_at ? $trial->pivot->updated_at->format('M d, Y') : '-' }}
                                            </td>
                                            <td class="align-middle text-muted small">
                                                {{ $trial->pivot->trial_remark ?? '-' }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info mt-3 border-0"
                            style="background-color: #f8f9fa; border-left: 4px solid #19398a !important;">
                            <i class="fa fa-info-circle me-2 text-primary"></i> You have no trial history yet.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let s2Ready = false;
            let statesReady = false;

            function tryInitSelect2() {
                if (s2Ready && statesReady) {
                    try {
                        if (typeof $ !== 'undefined' && $.fn.select2) {
                            ['#state', '#district', '#trial_state', '#trial_district'].forEach(function(sel) {
                                var $el = $(sel);
                                if ($el.length) {
                                    // If Select2 was already initialized by another script, destroy it first so it rebuilds from the new DOM options
                                    if ($el.hasClass('select2-hidden-accessible')) {
                                        $el.select2('destroy');
                                    }
                                    $el.select2({
                                        width: '100%'
                                    });
                                }
                            });
                        }
                    } catch (e) {
                        console.error("Select2 initialization skipped due to jQuery error:", e);
                    }
                    if (typeof resumeDraft === 'function') resumeDraft();
                }
            }

            // Dynamically load Select2
            var s2Script = document.createElement('script');
            s2Script.src = 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js';
            s2Script.onload = function() {
                s2Ready = true;
                tryInitSelect2();
            };
            document.head.appendChild(s2Script);

            const trialConfig = {
                "Haryana": {
                    districts: null
                },
                "Delhi (NCT)": {
                    displayName: "Delhi",
                    districts: ["New Delhi"]
                },
                "Punjab": {
                    districts: ["Sahibzada Ajit Singh Nagar (Mohali)", "Jalandhar", "Bathinda"],
                    displayDistricts: {
                        "Sahibzada Ajit Singh Nagar (Mohali)": "Mohali",
                        "Jalandhar": "Jalandhar",
                        "Bathinda": "Bathinda"
                    }
                },
                "Himachal Pradesh": {
                    districts: ["Kangra", "Hamirpur"]
                },
                "Jammu and Kashmir": {
                    districts: ["Jammu"]
                },
                "Uttarakhand": {
                    districts: ["Dehradun", "Nainital"]
                },
                "Uttar Pradesh": {
                    districts: ["Gautam Buddha Nagar", "Lucknow", "Bareilly", "Gorakhpur", "Allahabad"],
                    displayDistricts: {
                        "Gautam Buddha Nagar": "Noida",
                        "Allahabad": "Prayagraj"
                    }
                },
                "Rajasthan": {
                    districts: ["Jaipur", "Jodhpur", "Udaipur"]
                },
                "Gujarat": {
                    districts: ["Ahmedabad"]
                },
                "Madhya Pradesh": {
                    districts: ["Bhopal"]
                },
                "Maharashtra": {
                    districts: ["Pune"]
                }
            };

            let statesData = [];

            // Load States and Districts JSON
            fetch('{{ asset('assets/states-districts.json') }}')
                .then(response => response.json())
                .then(data => {
                    statesData = data.states;
                    let stateOptions = '<option value="">Select State</option>';
                    statesData.forEach(s => {
                        stateOptions += `<option value="${s.state}">${s.state}</option>`;
                    });

                    let trialStateOptions = '<option value="">Select State</option>';
                    Object.keys(trialConfig).forEach(stateKey => {
                        const displayName = trialConfig[stateKey].displayName || stateKey;
                        trialStateOptions += `<option value="${stateKey}">${displayName}</option>`;
                    });

                    // Safely inject HTML first using Vanilla JS (immune to jQuery errors)
                    const stateEl = document.getElementById('state');
                    const trialStateEl = document.getElementById('trial_state');

                    if (stateEl) stateEl.innerHTML = stateOptions;
                    if (trialStateEl) trialStateEl.innerHTML = trialStateOptions;

                    statesReady = true;
                    tryInitSelect2();
                })
                .catch(err => {
                    console.error('Failed to load states json', err);
                    const stateEl = document.getElementById('state');
                    const trialStateEl = document.getElementById('trial_state');

                    if (stateEl) stateEl.innerHTML = '<option value="">Error loading states</option>';
                    if (trialStateEl) trialStateEl.innerHTML = '<option value="">Error loading states</option>';

                    statesReady = true;
                    tryInitSelect2();
                });

            // Handle State change for Personal Info
            if (typeof $ !== 'undefined') {
                $('#state').on('change', function() {
                    populateDistricts(this.value, document.getElementById('district'), false);
                });
            } else {
                const stateEl = document.getElementById('state');
                if (stateEl) {
                    stateEl.addEventListener('change', function() {
                        populateDistricts(this.value, document.getElementById('district'), false);
                    });
                }
            }

            // Handle State change for Trial Info
            if (typeof $ !== 'undefined') {
                $('#trial_state').on('change', function() {
                    populateDistricts(this.value, document.getElementById('trial_district'), true);
                });
            } else {
                const trialStateEl = document.getElementById('trial_state');
                if (trialStateEl) {
                    trialStateEl.addEventListener('change', function() {
                        populateDistricts(this.value, document.getElementById('trial_district'), true);
                    });
                }
            }

            function populateDistricts(stateName, districtSelect, isTrial = false) {
                if (!districtSelect) return;

                if (!stateName) {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    districtSelect.disabled = true;
                } else {
                    const stateObj = statesData.find(s => s.state === stateName);
                    if (stateObj && stateObj.districts) {
                        let options = '<option value="">Select District</option>';
                        if (isTrial && trialConfig[stateName]) {
                            const allowedDists = trialConfig[stateName].districts;
                            const displayDists = trialConfig[stateName].displayDistricts || {};
                            stateObj.districts.forEach(d => {
                                if (allowedDists === null || allowedDists.includes(d)) {
                                    const dispName = displayDists[d] || d;
                                    options += `<option value="${d}">${dispName}</option>`;
                                }
                            });
                        } else {
                            stateObj.districts.forEach(d => {
                                options += `<option value="${d}">${d}</option>`;
                            });
                        }
                        districtSelect.innerHTML = options;
                        districtSelect.disabled = false;
                    }
                }

                if (typeof $ !== 'undefined' && $(districtSelect).hasClass('select2-hidden-accessible')) {
                    $(districtSelect).select2('destroy').select2({
                        width: '100%'
                    });
                } else if (typeof $ !== 'undefined') {
                    $(districtSelect).trigger('change');
                }
            }

            // Auto-Save and Validation Helpers
            const form = document.getElementById('profile-form');

            function resumeDraft() {
                const savedState = localStorage.getItem('hcpl_profile_draft');
                if (savedState) {
                    try {
                        const data = JSON.parse(savedState);
                        Object.keys(data).forEach(key => {
                            const el = form.elements[key];
                            if (el && key !== '_token') {
                                if (el.type === 'checkbox' || el.type === 'radio') {
                                    el.checked = data[key];
                                } else {
                                    el.value = data[key];
                                }
                                const event = new Event('change', {
                                    bubbles: true
                                });
                                el.dispatchEvent(event);

                                // If it's a select2 element, trigger jQuery change
                                if ($(el).hasClass('select2-hidden-accessible')) {
                                    $(el).trigger('change');
                                }
                            }
                        });
                    } catch (e) {}
                }
            }

            function saveDraft() {
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                delete data['_token'];
                localStorage.setItem('hcpl_profile_draft', JSON.stringify(data));
            }

            function showError(el, message) {
                el.classList.add('is-invalid');
                if ($(el).hasClass('select2-hidden-accessible')) {
                    $(el).next('.select2-container').addClass('is-invalid');
                }

                let parent = el.parentNode;
                let errorSpan = parent.querySelector('.invalid-feedback');
                if (!errorSpan) {
                    errorSpan = document.createElement('div');
                    errorSpan.className = 'invalid-feedback';
                    parent.appendChild(errorSpan);
                }
                errorSpan.textContent = message;
                errorSpan.style.display = 'block';
            }

            function clearError(el) {
                el.classList.remove('is-invalid');
                if ($(el).hasClass('select2-hidden-accessible')) {
                    $(el).next('.select2-container').removeClass('is-invalid');
                }

                let parent = el.parentNode;
                let errorSpan = parent.querySelector('.invalid-feedback');
                if (errorSpan) {
                    errorSpan.style.display = 'none';
                }
            }

            form.querySelectorAll('.form-control, .form-select').forEach(el => {
                el.addEventListener('input', function() {
                    clearError(this);
                    saveDraft();
                });
                el.addEventListener('change', function() {
                    clearError(this);
                    saveDraft();
                });
            });

            // Handle Dynamic Cricket Fields
            const roleSelect = document.getElementById('player_role');
            const wrapBatting = document.getElementById('wrap_batting_style');
            const wrapBowlerType = document.getElementById('wrap_bowler_type');
            const wrapBowling = document.getElementById('wrap_bowling_style');

            // Handle Gender change for Age Category
            const genderSelect = document.getElementById('gender');
            const ageCategorySelect = document.getElementById('age_category');
            const dobSelect = document.getElementById('dob');

            function updateAgeCategory() {
                if (!genderSelect || !ageCategorySelect) return;
                
                const gender = genderSelect.value;
                const dobValue = dobSelect ? dobSelect.value : '';

                if (gender === 'Female' && dobValue) {
                    // Restrict to Open Age for females and validate DOB immediately
                    Array.from(ageCategorySelect.options).forEach(opt => {
                        if (opt.value === 'Under 16') {
                            opt.disabled = true;
                        }
                    });
                    
                    let dobDate = new Date(dobValue);
                    let limitDate = new Date('2011-01-01');
                    
                    if (dobDate >= limitDate) {
                        ageCategorySelect.value = '';
                        showError(dobSelect, 'Females must be born before 1 Jan 2011 to apply.');
                    } else {
                        ageCategorySelect.value = 'Open Age';
                        clearError(dobSelect);
                        clearError(ageCategorySelect);
                    }
                } else if (gender === 'Female') {
                    // If no DOB yet, just disable Under 16
                    Array.from(ageCategorySelect.options).forEach(opt => {
                        if (opt.value === 'Under 16') {
                            opt.disabled = true;
                        }
                    });
                    ageCategorySelect.value = '';
                } else if (gender === 'Male' && dobValue) {
                    // Restore options and calculate based on age
                    Array.from(ageCategorySelect.options).forEach(opt => {
                        opt.disabled = false;
                    });
                    
                    let dobDate = new Date(dobValue);
                    let today = new Date();
                    let age = today.getFullYear() - dobDate.getFullYear();
                    let m = today.getMonth() - dobDate.getMonth();
                    if (m < 0 || (m === 0 && today.getDate() < dobDate.getDate())) {
                        age--;
                    }
                    
                    if (age < 16) {
                        ageCategorySelect.value = 'Under 16';
                    } else {
                        ageCategorySelect.value = 'Open Age';
                    }
                    clearError(dobSelect);
                    clearError(ageCategorySelect);
                } else {
                    // Reset if male but no dob, or empty gender
                    Array.from(ageCategorySelect.options).forEach(opt => {
                        opt.disabled = false;
                    });
                    if (gender !== 'Female') {
                        ageCategorySelect.value = '';
                    }
                }
                saveDraft();
            }

            if (genderSelect) genderSelect.addEventListener('change', updateAgeCategory);
            if (dobSelect) dobSelect.addEventListener('change', updateAgeCategory);

            roleSelect.addEventListener('change', function() {
                const role = this.value;

                // Hide all first
                wrapBatting.style.display = 'none';
                wrapBowlerType.style.display = 'none';
                wrapBowling.style.display = 'none';

                document.getElementById('batting_style').required = false;
                document.getElementById('bowler_type').required = false;
                document.getElementById('bowling_style').required = false;

                if (role === 'Batsman' || role === 'Wicket Keeper') {
                    wrapBatting.style.display = 'block';
                    document.getElementById('batting_style').required = true;
                } else if (role === 'Bowler') {
                    wrapBowlerType.style.display = 'block';
                    wrapBowling.style.display = 'block';
                    document.getElementById('bowler_type').required = true;
                    document.getElementById('bowling_style').required = true;
                } else if (role === 'All Rounder') {
                    wrapBatting.style.display = 'block';
                    wrapBowlerType.style.display = 'block';
                    wrapBowling.style.display = 'block';
                    document.getElementById('batting_style').required = true;
                    document.getElementById('bowler_type').required = true;
                    document.getElementById('bowling_style').required = true;
                }
            });

            // Wizard Navigation
            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const step3 = document.getElementById('step3');
            const nav1 = document.getElementById('nav-step1');
            const nav2 = document.getElementById('nav-step2');
            const nav3 = document.getElementById('nav-step3');
            const errorBox = document.getElementById('alert-error');

            function validateStep1() {
                const requiredIds = {
                    'first_name': 'First Name is required',
                    'father_name': 'Father Name is required',
                    'mother_name': 'Mother Name is required',
                    'gender': 'Gender is required',
                    'dob': 'Date of Birth is required',
                    'age_category': 'Age Category is required',
                    'phone_number': 'Phone Number is required',
                    'address': 'Address is required',
                    'state': 'State is required',
                    'district': 'District is required'
                };
                let isValid = true;
                for (let id in requiredIds) {
                    let el = document.getElementById(id);
                    if (el && !el.value.trim()) {
                        showError(el, requiredIds[id]);
                        isValid = false;
                    } else if (el) {
                        clearError(el);
                    }
                }

                // Female DOB validation
                let genderEl = document.getElementById('gender');
                let dobEl = document.getElementById('dob');
                if (genderEl && dobEl && genderEl.value === 'Female' && dobEl.value) {
                    let dobDate = new Date(dobEl.value);
                    let limitDate = new Date('2011-01-01');
                    if (dobDate >= limitDate) {
                        showError(dobEl, 'Females must be born before 1 Jan 2011 to apply.');
                        isValid = false;
                    } else if (dobEl.value) {
                        clearError(dobEl);
                    }
                }

                // Optional Aadhar validation
                let aadharEl = document.getElementById('aadhar_number');
                let aadharVal = aadharEl.value.trim();
                if (aadharVal) {
                    if (!/^\d{12}$/.test(aadharVal)) {
                        showError(aadharEl, 'Aadhar Number must be exactly 12 numeric digits');
                        isValid = false;
                    } else {
                        clearError(aadharEl);
                    }
                } else {
                    clearError(aadharEl);
                }

                return isValid;
            }

            document.getElementById('btn-next-1').addEventListener('click', function() {
                errorBox.style.display = 'none';
                if (!validateStep1()) {
                    errorBox.textContent = "Please fill all required personal information fields.";
                    errorBox.style.display = 'block';
                    return;
                }
                step1.classList.remove('active');
                step2.classList.add('active');
                nav1.classList.remove('active');
                nav1.classList.add('completed');
                nav2.classList.add('active');
            });

            document.getElementById('btn-prev-2').addEventListener('click', function() {
                step2.classList.remove('active');
                step1.classList.add('active');
                nav2.classList.remove('active');
                nav1.classList.remove('completed');
                nav1.classList.add('active');
            });

            document.getElementById('btn-prev-3').addEventListener('click', function() {
                step3.classList.remove('active');
                step2.classList.add('active');
                nav3.classList.remove('active');
                nav2.classList.remove('completed');
                nav2.classList.add('active');
            });

            // AJAX Save Profile and Init Razorpay
            let razorpayOptions = {};

            document.getElementById('btn-save-proceed').addEventListener('click', async function() {
                // Validate Step 2
                let isValid = true;
                const requiredStep2 = {
                    'player_role': 'Player Role is required',
                    'trial_state': 'Trial State is required',
                    'trial_district': 'Trial District is required'
                };
                for (let id in requiredStep2) {
                    let el = document.getElementById(id);
                    if (!el.value.trim()) {
                        showError(el, requiredStep2[id]);
                        isValid = false;
                    } else {
                        clearError(el);
                    }
                }

                const role = document.getElementById('player_role').value;
                if (role === 'Batsman' || role === 'Wicket Keeper' || role === 'All Rounder') {
                    let el = document.getElementById('batting_style');
                    if (!el.value.trim()) {
                        showError(el, 'Batting Style is required');
                        isValid = false;
                    }
                }
                if (role === 'Bowler' || role === 'All Rounder') {
                    let el1 = document.getElementById('bowler_type');
                    if (!el1.value.trim()) {
                        showError(el1, 'Bowler Type is required');
                        isValid = false;
                    }
                    let el2 = document.getElementById('bowling_style');
                    if (!el2.value.trim()) {
                        showError(el2, 'Bowling Style is required');
                        isValid = false;
                    }
                }

                if (!isValid) {
                    errorBox.textContent = "Please resolve the highlighted errors below.";
                    errorBox.style.display = 'block';
                    return;
                }

                const btn = this;
                const loader = document.getElementById('loader-save');
                errorBox.style.display = 'none';
                btn.disabled = true;
                loader.style.display = 'inline-block';

                const formData = new FormData(document.getElementById('profile-form'));
                const payload = Object.fromEntries(formData.entries());

                try {
                    const response = await fetch("{{ route('player.profile.save') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify(payload)
                    });

                    const data = await response.json();

                    if (response.ok) {
                        // Draft will only be deleted after payment succeeds

                        // Prepare Razorpay options
                        razorpayOptions = {
                            "key": data.key,
                            "amount": data.amount,
                            "currency": "INR",
                            "name": "HCPL Registration",
                            "description": "Player Profile Registration Fee",
                            "image": "https://dummyimage.com/200x200/f4c242/000&text=HCPL",
                            "order_id": data.order_id,
                            "handler": function(response) {
                                verifyPayment(response.razorpay_payment_id, response
                                    .razorpay_order_id, response.razorpay_signature);
                            },
                            "prefill": {
                                "name": data.name,
                                "email": data.email,
                                "contact": data.contact
                            },
                            "theme": {
                                "color": "#19398a"
                            }
                        };

                        // Move to step 3
                        step2.classList.remove('active');
                        step3.classList.add('active');
                        nav2.classList.remove('active');
                        nav2.classList.add('completed');
                        nav3.classList.add('active');
                    } else {
                        errorBox.textContent = data.message || "Failed to save profile.";
                        errorBox.style.display = 'block';
                    }
                } catch (err) {
                    errorBox.textContent = "A network error occurred. " + err.message;
                    errorBox.style.display = 'block';
                } finally {
                    btn.disabled = false;
                    loader.style.display = 'none';
                }
            });

            document.getElementById('btn-pay-now').addEventListener('click', function(e) {
                if (!razorpayOptions.key) return;
                const rzp = new Razorpay(razorpayOptions);
                rzp.on('payment.failed', function(response) {
                    alert("Payment Failed. Reason: " + response.error.description);
                });
                rzp.open();
                e.preventDefault();
            });

            async function verifyPayment(payment_id, order_id, signature) {
                document.getElementById('btn-pay-now').disabled = true;
                document.getElementById('btn-pay-now').textContent = "Verifying Payment...";

                // Collect entire form payload
                const formData = new FormData(document.getElementById('profile-form'));
                const payload = Object.fromEntries(formData.entries());
                
                payload.razorpay_payment_id = payment_id;
                payload.razorpay_order_id = order_id;
                payload.razorpay_signature = signature;

                try {
                    const response = await fetch("{{ route('player.profile.verify-payment') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                        },
                        body: JSON.stringify(payload)
                    });

                    const data = await response.json();
                    if (response.ok) {
                        document.getElementById('step3').innerHTML = `
                    <i class="fa fa-check-circle text-success mb-3" style="font-size: 80px;"></i>
                    <h3>Payment Successful!</h3>
                    <p class="text-muted">Welcome to HCPL. Your profile and registration are now complete.</p>
                    <a href="{{ route('player.dashboard') }}" class="btn btn-primary mt-4 py-2 px-4" style="background:#f4c242; color:#000; border:none; font-weight:bold;">Go to Dashboard</a>
                `;
                        nav3.classList.add('completed');
                        localStorage.removeItem('hcpl_profile_draft');
                    } else {
                        alert("Payment verification failed: " + data.message);
                        document.getElementById('btn-pay-now').disabled = false;
                        document.getElementById('btn-pay-now').textContent = "Pay Securely with Razorpay";
                    }
                } catch (err) {
                    alert("Network error during verification.");
                    document.getElementById('btn-pay-now').disabled = false;
                    document.getElementById('btn-pay-now').textContent = "Pay Securely with Razorpay";
                }
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sidebar Tabs Logic (Isolated to prevent breaking if profile form is missing)
            const sidebarTabs = document.querySelectorAll('.sidebar-tab');
            sidebarTabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Remove active from all tabs
                    sidebarTabs.forEach(t => t.classList.remove('active'));
                    this.classList.add('active');

                    // Hide all sections
                    document.getElementById('dashboard-section').style.display = 'none';
                    document.getElementById('my-trials-section').style.display = 'none';

                    // Show target section
                    const target = this.getAttribute('data-target');
                    document.getElementById(target).style.display = 'block';
                });
            });
        });
    </script>
@endsection
