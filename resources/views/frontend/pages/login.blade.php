   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
 <style>
       

      
      #login .modal-dialog, #forgotPasswordModal .modal-dialog {padding:0;background:transparent; border-radius:15px;}
       #login .modal-content, #forgotPasswordModal .modal-content {border-radius:0px;border:0;background-color: transparent;}

        
 #login .login-card, #forgotPasswordModal .login-card {
      background: #ffffff;
      border-radius:15px;
      border: 2px solid #19398a;
      padding: 20px 15px 2.5rem;
      
      max-width: 390px;
      overflow: hidden;
    }
    .top-stripe {
      height: 4px;
      background: linear-gradient(90deg, #19398a, #ff6600, #19398a);
      margin-bottom: 2rem;
    }
    .logo-box {
      width: 66px;
      height: 66px;
      background: #19398a;
      border-radius: 16px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 14px;
      border: 2px solid #ff6600;
    }
    .logo-box i { font-size: 30px; color: #ff6600; }
    .login-header { text-align: center; margin-bottom: 1.75rem; }
    .league-name {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 3px;
      color: #ff6600;
      text-transform: uppercase;
      margin-bottom: 7px;
    }
    .welcome { font-size: 27px; font-weight: 700; color: #12172a; letter-spacing: 0.5px;line-height: 25px;}
    .taglines { font-size: 13px; color: #5a6b7e; margin-top: 5px; }
    .divider { height: 1px; background: rgba(0,0,0,0.06); margin-bottom: 1.5rem; }
    .field-label {
      font-size: 11px;
      font-weight: 600;
      color: #19398a;
      margin-bottom: 7px;
      letter-spacing: 1px;
      text-transform: uppercase;
      display: block;
    }
    .field { margin-bottom: 1rem; }
    .input-row {
      display: flex;
      align-items: center;
      background: #f7f8fc;
      border: 1px solid #e4e7f2;
      border-radius: 10px;
      overflow: hidden;
    }
    .input-row span {
      padding: 0 12px;
      display: flex;
      align-items: center;
      color: #19398a;
    }
    .input-row i { font-size: 17px; }
    .input-row input {
      flex: 1;
      padding: 8px 12px 8px 0;
      border: none;
      background: transparent;
      font-size: 14px;
      color: #12172a;
      outline: none;
      font-family: inherit;
    }
    .input-row input::placeholder { color: #5a6b7e; }
    .eye-btn { cursor: pointer; }
    .login-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.75rem;
      box-sizing: border-box;
    }
    .remember {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 13px;
      color: #5a6b7e;
      cursor: pointer;
    }
    .remember input { accent-color: #19398a; width: 14px; height: 14px; }
    .forgot { font-size: 13px; color: #ff6600; font-weight: 600; text-decoration: none; margin-left: 10px;}
    .forgot:hover { text-decoration: underline; }
    .btn-login {
      width: 100%;
      padding:8px;
      background: #ff6600;
      color: #fff;
      border: none;
      border-bottom: 3px solid #b07d00;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      font-family: inherit;
      transition: background 0.2s;
    }
    .btn-login:hover { background: #b07d00; }
    .login-footer { margin-top: 1.25rem; text-align: center; }
    .footer-divider { height: 1px; background: rgba(0,0,0,0.06); margin-bottom: 1rem; }
    .login-footer span { font-size: 13px; color: #5a6b7e; }
    .login-footer a { font-size: 13px; color: #ff6600; font-weight: 700; text-decoration: none; }
    .login-footer a:hover { text-decoration: underline; }
    
    </style>
    
    
  <div class="modal fade " style="display:none" id="login">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
             
                      
             
              <div class="modal-body p-0" style="background:transparent;">
    
<div class="modal-header border-0" style="position:absolute;right: 0;">
        <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
       <!--<div class="login-card">
            <img src="images/logo.png" alt="HCPL Logo" class="login-logo" onerror="this.src='images/hcpl-logo.jpeg'">
            <h1 class="login-title">Welcome Back</h1>
            <p class="login-subtitle">Haryana Corporate Premier League</p>

            <form action="#">
                <div class="mb-2">
                    <label for="email" class="form-label">Email or Mobile Number</label>
                    <input type="text" id="email" class="form-control-custom" placeholder="Enter your email or mobile" required>
                </div>

                <div class="mb-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <label for="password" class="form-label">Password</label>
                      
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" class="form-control-custom" placeholder="Enter your password" required>
                       
                    </div>
                </div>

                <div class="mb-2 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" style="cursor: pointer; accent-color: var(--gold);">
                    <label class="form-check-label text-white-50 small" for="remember" style="cursor: pointer;">Remember me for 30 days</label>
                </div>

                <button type="submit" class="login-btn">Log In</button>

               

                

                <p class="register-text">
                    Don't have an account? <a href="registration.html" class="register-link">Register Now</a>
                </p>
            </form>
        </div>-->

    <div class="login-card">
   <!-- <div class="top-stripe"></div>-->

    <div class="login-header">
      <div class="logo-box">
        <i class="ti ti-trophy"></i>
      </div>
      <div class="league-name">Haryana Corporate Premier League</div>
      <div class="welcome">Welcome Back</div>
      <div class="taglines">Sign in to your HCPL account</div>
    </div>

    <div class="divider"></div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="field">
          <label class="field-label">Email or Mobile</label>
          <div class="input-row">
            <span><i class="ti ti-user" aria-hidden="true"></i></span>
            <input type="text" name="email" value="{{ old('email') }}" placeholder="Enter email or mobile" required />
          </div>
          @error('email')
            <span style="color: #dc2626; font-size: 12px; margin-top: 5px; display: block;">{{ $message }}</span>
          @enderror
        </div>

        <div class="field" style="margin-bottom:1.25rem;">
          <label class="field-label">Password</label>
          <div class="input-row">
            <span><i class="ti ti-lock" aria-hidden="true"></i></span>
            <input type="password" name="password" id="pw" placeholder="Enter your password" required />
            <span class="eye-btn" onclick="togglePw()">
              <i class="ti ti-eye" id="eyeIcon" aria-hidden="true"></i>
            </span>
          </div>
        </div>

        <div class="login-row" >
          <label class="remember">
            <input type="checkbox" name="remember" />
            Remember me for 30 days
          </label>
          <a href="javascript:void(0)" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal" class="forgot">Forgot password?</a>
        </div>

        <button type="submit" class="btn-login">Log In</button>
    </form>

    <div class="login-footer">
      <div class="footer-divider"></div>
      <span>Don't have an account? </span>
      <a href="{{ route('player-registration') }}">Register Now</a>
    </div>
  </div>

  <script>
    function togglePw() {
      var pw = document.getElementById('pw');
      var ic = document.getElementById('eyeIcon');
      if (pw.type === 'password') {
        pw.type = 'text';
        ic.className = 'ti ti-eye-off';
      } else {
        pw.type = 'password';
        ic.className = 'ti ti-eye';
      }
    }

    @if($errors->has('email'))
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('login'));
        myModal.show();
    });
    @endif
  </script>
    
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" style="display:none" id="forgotPasswordModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body p-0" style="background:transparent;">
                <div class="modal-header border-0" style="position:absolute;right: 0;">
                    <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="login-card">
                    <div class="login-header">
                        <div class="logo-box">
                            <i class="ti ti-lock"></i>
                        </div>
                        <div class="league-name">Haryana Corporate Premier League</div>
                        <div class="welcome" id="fp-title">Reset Password</div>
                        <div class="taglines" id="fp-subtitle">Enter your registered mobile or email</div>
                    </div>
                    <div class="divider"></div>

                    <div id="fp-alert-error" class="alert alert-danger" style="display: none; font-size:12px; padding:8px;"></div>
                    <div id="fp-alert-success" class="alert alert-success" style="display: none; font-size:12px; padding:8px;"></div>

                    <!-- Step 1: Contact -->
                    <div id="fp-step1">
                        <div class="field">
                            <label class="field-label">Mobile Number or Email</label>
                            <div class="input-row">
                                <span><i class="ti ti-user" aria-hidden="true"></i></span>
                                <input type="text" id="fp_contact_input" placeholder="Enter mobile or email" required />
                                <input type="hidden" id="fp_contact_type" value="">
                            </div>
                        </div>
                        <button type="button" class="btn-login mt-3" id="fp-btn-send-otp">Send OTP <i class="fa fa-spinner fa-spin ms-2" id="fp-loader-1" style="display: none;"></i></button>
                    </div>

                    <!-- Step 2: OTP -->
                    <div id="fp-step2" style="display: none;">
                        <div class="field">
                            <label class="field-label">Enter OTP</label>
                            <div class="input-row">
                                <span><i class="ti ti-key" aria-hidden="true"></i></span>
                                <input type="text" id="fp_otp_input" placeholder="000000" maxlength="6" required />
                            </div>
                        </div>
                        <button type="button" class="btn-login mt-3" id="fp-btn-verify-otp">Verify OTP <i class="fa fa-spinner fa-spin ms-2" id="fp-loader-2" style="display: none;"></i></button>
                        <div class="text-center mt-3">
                            <button type="button" class="btn btn-link p-0" id="fp-btn-resend-otp" style="font-size:13px; color:#ff6600; text-decoration:none; font-weight:600;" disabled>Resend OTP <span id="fp-resend-timer">(60s)</span></button>
                        </div>
                    </div>

                    <!-- Step 3: New Password -->
                    <div id="fp-step3" style="display: none;">
                        <div class="field">
                            <label class="field-label">New Password</label>
                            <div class="input-row">
                                <span><i class="ti ti-lock" aria-hidden="true"></i></span>
                                <input type="password" id="fp_password" placeholder="Enter new password" required />
                            </div>
                        </div>
                        <div class="field mt-3">
                            <label class="field-label">Confirm Password</label>
                            <div class="input-row">
                                <span><i class="ti ti-lock" aria-hidden="true"></i></span>
                                <input type="password" id="fp_password_confirmation" placeholder="Confirm new password" required />
                            </div>
                        </div>
                        <button type="button" class="btn-login mt-3" id="fp-btn-reset-password">Update Password <i class="fa fa-spinner fa-spin ms-2" id="fp-loader-3" style="display: none;"></i></button>
                    </div>

                    <div class="login-footer">
                        <div class="footer-divider"></div>
                        <a href="javascript:void(0)" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login"><i class="ti ti-arrow-left"></i> Back to Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    let resendTimerInterval;

    function startResendTimer() {
        let timeLeft = 60;
        const btnResend = document.getElementById('fp-btn-resend-otp');
        const timerSpan = document.getElementById('fp-resend-timer');
        
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
    document.getElementById('fp-btn-send-otp').addEventListener('click', async function() {
        const contact = document.getElementById('fp_contact_input').value.trim();
        const type = detectContactType(contact);
        const btn = this;
        const loader = document.getElementById('fp-loader-1');
        const errorBox = document.getElementById('fp-alert-error');
        const successBox = document.getElementById('fp-alert-success');

        if (!type) {
            errorBox.textContent = 'Please enter a valid 10-digit mobile number or email address.';
            errorBox.style.display = 'block';
            successBox.style.display = 'none';
            return;
        }

        errorBox.style.display = 'none';
        successBox.style.display = 'none';
        btn.disabled = true;
        loader.style.display = 'inline-block';
        document.getElementById('fp_contact_type').value = type;

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
                document.getElementById('fp-step1').style.display = 'none';
                document.getElementById('fp-step2').style.display = 'block';
                document.getElementById('fp-subtitle').innerHTML = 'OTP sent to <strong>' + contact + '</strong>';
                startResendTimer();
                
                if (data.message && data.message.includes('TEST MODE')) {
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
    document.getElementById('fp-btn-resend-otp').addEventListener('click', async function() {
        const contact = document.getElementById('fp_contact_input').value.trim();
        const type = document.getElementById('fp_contact_type').value;
        const btn = this;
        const errorBox = document.getElementById('fp-alert-error');
        const successBox = document.getElementById('fp-alert-success');

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
    document.getElementById('fp-btn-verify-otp').addEventListener('click', async function() {
        const contact = document.getElementById('fp_contact_input').value.trim();
        const type = document.getElementById('fp_contact_type').value;
        const otp = document.getElementById('fp_otp_input').value.trim();
        const btn = this;
        const loader = document.getElementById('fp-loader-2');
        const errorBox = document.getElementById('fp-alert-error');
        const successBox = document.getElementById('fp-alert-success');

        if (!otp || otp.length < 4) {
            errorBox.textContent = 'Please enter a valid OTP.';
            errorBox.style.display = 'block';
            return;
        }

        errorBox.style.display = 'none';
        successBox.style.display = 'none';
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
                document.getElementById('fp-step2').style.display = 'none';
                document.getElementById('fp-step3').style.display = 'block';
                document.getElementById('fp-subtitle').innerHTML = 'Create a new secure password';
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
    document.getElementById('fp-btn-reset-password').addEventListener('click', async function() {
        const contact = document.getElementById('fp_contact_input').value.trim();
        const type = document.getElementById('fp_contact_type').value;
        const password = document.getElementById('fp_password').value;
        const password_confirmation = document.getElementById('fp_password_confirmation').value;
        const btn = this;
        const loader = document.getElementById('fp-loader-3');
        const errorBox = document.getElementById('fp-alert-error');
        const successBox = document.getElementById('fp-alert-success');

        if (password.length < 8) {
            errorBox.textContent = 'Password must be at least 8 characters long.';
            errorBox.style.display = 'block';
            return;
        }
        
        const strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;
        if (!strongPasswordRegex.test(password)) {
            errorBox.textContent = 'Password must contain uppercase, lowercase, number, and symbol.';
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
            
            const data = await response.json();
            if (response.ok) {
                successBox.textContent = 'Password successfully updated! Redirecting...';
                successBox.style.display = 'block';
                setTimeout(() => {
                    window.location.href = data.redirect || "{{ url('/') }}";
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
            loader.style.display = 'none';
        }
    });
});
</script>
