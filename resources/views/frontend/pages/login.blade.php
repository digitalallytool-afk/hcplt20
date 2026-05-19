   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css"/>
 <style>
       

      
      #login .modal-dialog{padding:0;background:transparent; border-radius:15px;}
       #login .modal-content{border-radius:0px;border:0;background-color: transparent;}

        
 #login .login-card {
      background: #1a2540;
      border-radius:0px;
      border: 2px solid;
      border-image: linear-gradient(180deg, #1d4ed8, #facc15, #1d4ed8) 1;
      padding: 20px 15px 2.5rem;
      
      max-width: 390px;
      overflow: hidden;
    }
    .top-stripe {
      height: 4px;
      background: linear-gradient(90deg, #1d4ed8, #facc15, #1d4ed8);
      margin-bottom: 2rem;
    }
    .logo-box {
      width: 66px;
      height: 66px;
      background: #1d4ed8;
      border-radius: 16px;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 14px;
      border: 2px solid #facc15;
    }
    .logo-box i { font-size: 30px; color: #facc15; }
    .login-header { text-align: center; margin-bottom: 1.75rem; }
    .league-name {
      font-size: 10px;
      font-weight: 700;
      letter-spacing: 3px;
      color: #facc15;
      text-transform: uppercase;
      margin-bottom: 7px;
    }
    .welcome { font-size: 27px; font-weight: 700; color: #f1f5f9; letter-spacing: 0.5px;line-height: 25px;}
    .taglines { font-size: 13px; color: #4e6a8a; margin-top: 5px; }
    .divider { height: 1px; background: rgba(255,255,255,0.06); margin-bottom: 1.5rem; }
    .field-label {
      font-size: 11px;
      font-weight: 600;
      color: #7a96b2;
      margin-bottom: 7px;
      letter-spacing: 1px;
      text-transform: uppercase;
      display: block;
    }
    .field { margin-bottom: 1rem; }
    .input-row {
      display: flex;
      align-items: center;
      background: #111e33;
      border: 1px solid #2a4060;
      border-radius: 10px;
      overflow: hidden;
    }
    .input-row span {
      padding: 0 12px;
      display: flex;
      align-items: center;
      color: #4a6a8a;
    }
    .input-row i { font-size: 17px; }
    .input-row input {
      flex: 1;
      padding: 8px 12px 8px 0;
      border: none;
      background: transparent;
      font-size: 14px;
      color: #e2e8f0;
      outline: none;
      font-family: inherit;
    }
    .input-row input::placeholder { color: #3a5070; }
    .eye-btn { cursor: pointer; }
    .login-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.75rem;
      margin:0;
      box-sizing: border-box;
    }
    .remember {
      display: flex;
      align-items: center;
      gap: 7px;
      font-size: 13px;
      color: #4e6a8a;
      cursor: pointer;
    }
    .remember input { accent-color: #1d4ed8; width: 14px; height: 14px; }
    .forgot { font-size: 13px; color: #facc15; font-weight: 600; text-decoration: none; margin-left: 10px;}
    .forgot:hover { text-decoration: underline; }
    .btn-login {
      width: 100%;
      padding:8px;
      background: #1d4ed8;
      color: #fff;
      border: none;
      border-bottom: 3px solid #b8920a;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      cursor: pointer;
      font-family: inherit;
      transition: background 0.2s;
    }
    .btn-login:hover { background: #1e40af; }
    .login-footer { margin-top: 1.25rem; text-align: center; }
    .footer-divider { height: 1px; background: rgba(255,255,255,0.05); margin-bottom: 1rem; }
    .login-footer span { font-size: 13px; color: #4e6a8a; }
    .login-footer a { font-size: 13px; color: #facc15; font-weight: 700; text-decoration: none; }
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
            <p class="login-subtitle">Haryana Cricket Premier League</p>

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
      <div class="league-name">Haryana Cricket Premier League</div>
      <div class="welcome">Welcome Back</div>
      <div class="taglines">Sign in to your HCPL account</div>
    </div>

    <div class="divider"></div>

    <div class="field">
      <label class="field-label">Email or Mobile</label>
      <div class="input-row">
        <span><i class="ti ti-user" aria-hidden="true"></i></span>
        <input type="text" placeholder="Enter email or mobile" />
      </div>
    </div>

    <div class="field" style="margin-bottom:1.25rem;">
      <label class="field-label">Password</label>
      <div class="input-row">
        <span><i class="ti ti-lock" aria-hidden="true"></i></span>
        <input type="password" id="pw" placeholder="Enter your password" />
        <span class="eye-btn" onclick="togglePw()">
          <i class="ti ti-eye" id="eyeIcon" aria-hidden="true"></i>
        </span>
      </div>
    </div>

    <div class="login-row" >
      <label class="remember">
        <input type="checkbox" />
        Remember me for 30 days
      </label>
      <a href="#" class="forgot">Forgot password?</a>
    </div>

    <button class="btn-login">Log In</button>

    <div class="login-footer">
      <div class="footer-divider"></div>
      <span>Don't have an account? </span>
      <a href="#">Register Now</a>
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
  </script>
    
               </div>
            </div>
        </div>
    </div>
</div>
