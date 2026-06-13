@extends('frontend.layouts.main')

@section('title', 'Forgot Password - HCPL')

@section('content')
    <style>
        :root {
            --gold: #d8571f;
            --white: #ffffff;
            --dark-text: #12172a;
        }

        .hero-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 3.5rem;
            font-weight: 900;
            color: #000;
            text-transform: uppercase;
        }

        .registration-container {
            padding: 150px 0 100px 0; /* Extra top padding to clear header */
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
            color: #fff;
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

        .form-control {
            padding: 15px 20px;
            border-radius: 8px;
            border: 2px solid #eee;
            background: #fcfcfc;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold);
            box-shadow: 0 0 0 5px rgba(216, 87, 31, 0.1);
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

        .btn-next {
            background: var(--gold) !important;
            color: #fff;
            padding: 15px 40px;
            border-radius: 8px;
            font-weight: 800;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-next:hover {
            background: #b07d00 !important;
            transform: translateY(-3px);
            color: var(--white);
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
        }
    </style>

    <div class="container registration-container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <h1 class="hero-title text-center">Reset Password</h1>
                <p class="fw-bold text-center" style="color:#d8571f">HARYANA CORPORATE PREMIER LEAGUE</p>

                <div class="form-wizard">
                    <div class="row g-0">
                        <!-- Sidebar Navigation -->
                        <div class="col-lg-4">
                            <div class="wizard-sidebar h-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="step-item active" id="step1-nav">
                                        <div class="step-number">01</div>
                                        <div class="step-label">
                                            <h6>Identity Verification</h6>
                                            <span>Mobile or Email</span>
                                        </div>
                                    </div>
                                    <div class="step-item" id="step2-nav">
                                        <div class="step-number">02</div>
                                        <div class="step-label">
                                            <h6>Secure Access</h6>
                                            <span>Enter OTP</span>
                                        </div>
                                    </div>
                                    <div class="step-item" id="step3-nav">
                                        <div class="step-number">03</div>
                                        <div class="step-label">
                                            <h6>Security</h6>
                                            <span>New Password</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Content -->
                        <div class="col-lg-8">
                            <div class="form-content">
                                <form id="forgotPasswordForm">
                                    @csrf
                                    <!-- Step 1: Contact Details -->
                                    <div id="step1">
                                        <h3 class="form-section-title">Find Your Account</h3>
                                        <p class="text-muted mb-4">Enter your registered mobile number or email address.</p>

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
                                        <h3 class="form-section-title">Create New Password</h3>
                                        <p class="text-muted mb-4">Set a strong new password for your account.</p>

                                        <div id="alert-error-3" class="alert alert-danger" style="display: none;"></div>
                                        <div id="alert-success-3" class="alert alert-success" style="display: none;"></div>

                                        <div class="row g-3">
                                            <div class="col-md-12">
                                                <label class="form-label">New Password</label>
                                                <div class="input-group">
                                                    <input type="password" id="password" class="form-control" placeholder="Enter new password">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password" style="border-top-right-radius: 8px; border-bottom-right-radius: 8px; border: 2px solid #eee; border-left: none;">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                                <small class="text-muted d-block mt-2" style="font-size: 0.78rem; line-height: 1.4;">
                                                    <i class="fa fa-info-circle me-1 text-primary"></i> Must be at least 8 characters with 1 uppercase (A-Z), 1 lowercase (a-z), 1 number (0-9) & 1 special character (e.g. @, #, $, %).
                                                </small>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="form-label">Confirm Password</label>
                                                <div class="input-group">
                                                    <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm new password">
                                                    <button class="btn btn-outline-secondary toggle-password" type="button" data-target="password_confirmation" style="border-top-right-radius: 8px; border-bottom-right-radius: 8px; border: 2px solid #eee; border-left: none;">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="button" class="btn btn-next" id="btn-reset-password">Update Password <i class="fa fa-spinner fa-spin ms-2" id="loader-3" style="display: none;"></i></button>
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
                    const response = await fetch("{{ route('forgot-password-otp.send-otp') }}", {
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
                    const response = await fetch("{{ route('forgot-password-otp.resend-otp') }}", {
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
                    const response = await fetch("{{ route('forgot-password-otp.verify-otp') }}", {
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

            // Step 3: Reset Password
            document.getElementById('btn-reset-password').addEventListener('click', async function() {
                const contact = document.getElementById('contact_input').value.trim();
                const type = document.getElementById('contact_type').value;
                const password = document.getElementById('password').value;
                const password_confirmation = document.getElementById('password_confirmation').value;
                const btn = this;
                const loader = document.getElementById('loader-3');
                const errorBox = document.getElementById('alert-error-3');
                const successBox = document.getElementById('alert-success-3');

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
                successBox.style.display = 'none';
                btn.disabled = true;
                loader.style.display = 'inline-block';

                try {
                    const response = await fetch("{{ route('forgot-password-otp.reset-password') }}", {
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
                        successBox.textContent = data.message || 'Password successfully updated! Redirecting...';
                        successBox.style.display = 'block';
                        setTimeout(() => {
                            window.location.href = data.redirect;
                        }, 2000);
                    } else {
                        errorBox.textContent = data.message || 'Failed to update password.';
                        errorBox.style.display = 'block';
                        btn.disabled = false;
                        loader.style.display = 'none';
                    }
                } catch (err) {
                    errorBox.textContent = 'Error: ' + err.message;
                    errorBox.style.display = 'block';
                    btn.disabled = false;
                }
            });

            // Toggle Password View
            document.querySelectorAll('.toggle-password').forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = this.querySelector('i');
                    if (input && icon) {
                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.classList.remove('fa-eye');
                            icon.classList.add('fa-eye-slash');
                        } else {
                            input.type = 'password';
                            icon.classList.remove('fa-eye-slash');
                            icon.classList.add('fa-eye');
                        }
                    }
                });
            });
        });
    </script>
@endsection
