@extends('frontend.layouts.main')

@section('title', 'hcpl')

@section('meta_description', 'hcpl')

@section('meta_keywords', 'hcpl')

@section('canonical')
<link rel="canonical" href="{{ url()->current() }}" />
@endsection

@section('content')
    <style>
    /* VALIDATION ERROR STYLING */
    .error-text { color: #ef4444; font-size: 11px; font-weight: 700; margin-top: 5px; display: block; text-transform: none; letter-spacing: 0; }
    .input-error { border-color: #ef4444 !important; background: #fffafb !important; }

    .owner-text strong{color:#fff;font-size:22px;font-weight:700}
    .owner-text p{color:#fff;opacity:.7}
    .slots-banner{
     background:#f5c518;
    padding: 16px 40px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px
    }
    .slots-banner h3{
    font-size:22px;
    font-weight: 700;
    color: #000;
    letter-spacing: 0.5px;
    }
    .slots-banner p{font-size:14px;color:#fff;margin-bottom:0}
    /* ── FORM MAIN ── */

.form-header { margin-bottom: 40px; }
.form-header h2 {
  
  font-size: clamp(26px, 4vw, 38px);
  font-weight: 900;
  color:#19398a;
  line-height: 1.15;
  margin-bottom: 8px;
}
.form-header p { font-size: 14px; color: var(--muted); }
.heading-rule {
  display: flex; align-items: center; gap: 14px;
  margin-top: 16px;
}
.heading-rule span {
  height: 2px; flex: 1;
  background: linear-gradient(90deg,#19398a 0%, transparent 100%);
}
.heading-rule em {
  font-style: normal; font-size: 11px;
  font-weight: 600; letter-spacing: 2px;
  color: var(--muted2); text-transform: uppercase;
}

/* SECTION BLOCK */
.form-block { margin-bottom: 40px; }
.sec-head {
  display: flex; align-items: center; gap: 12px;
  margin-bottom: 20px;
}
.sec-num {
  width: 28px; height: 28px;
  background:#19398a;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-size: 12px; font-weight: 700; color: #fff;
  flex-shrink: 0;
}
.sec-title {
  
  font-size: 16px; font-weight: 700;
  color:#19398a;
  letter-spacing: 0.3px;
}
.sec-line { flex: 1; height: 1px; background: var(--border); }

/* FIELDS */
.form-block1 .field{width: 32.999%;display: inline-block;}
.form-block2 .field{width: 32.999%;display: inline-block;}
.form-block3 .field{width: 49.333%;display: inline-block;}
.field { margin-bottom: 14px; padding: 0 5px; }
.field label {
  display: block;
  font-size: 11.5px; font-weight: 600;
  letter-spacing: 0.8px; text-transform: uppercase;
  color: var(--muted); margin-bottom: 7px;
}
.field label .req { color: #ef4444; margin-left: 2px; }
.field input,
.field select,
.field textarea {
  width: 100%;
  background: #fcfcfc;
  border: 1.5px solid #eee;
  border-radius: 7px;
  padding: 12px 15px;
  color: #333;
  font-family: 'DM Sans', sans-serif;
  font-size: 14.5px;
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s, background 0.2s;
}
.field input::placeholder,
.field textarea::placeholder { color: #999; }
.field input:focus,
.field select:focus,
.field textarea:focus {
  border-color: #19398a;
  box-shadow: 0 0 0 3px rgba(25,57,138,0.1);
  background: #fff;
}
.field select {
  cursor: pointer; appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='11' height='7'%3E%3Cpath d='M1 1l4.5 4.5L10 1' stroke='%238a7a62' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat: no-repeat; background-position: right 14px center;
  background-color: #fcfcfc;
}
.field select option { background: #fff; color: #333; }
.field textarea { resize: vertical; min-height: 110px; line-height: 1.7; }

/* DECLARATION */
.decl-box {
  background: #fff8ec;
  border: 1.5px solid rgba(184,134,11,0.25);
  border-left: 4px solid #f5c518;
  border-radius: 8px;
  padding: 22px 22px;
  margin-bottom: 28px;
}
.decl-title {
  display: flex; align-items: center; gap: 8px;
  font-size: 11px; font-weight: 700;
  letter-spacing: 2px; color:#f5c518;
  text-transform: uppercase; margin-bottom: 16px;
}
.check-item {
  display: flex; align-items: flex-start;
  gap: 12px; margin-bottom: 12px; cursor: pointer;
}
.check-item:last-child { margin-bottom: 0; }
.check-item input[type="checkbox"] {
  width: 17px; height: 17px;
  accent-color:#19398a;
  margin-top: 2px; flex-shrink: 0; cursor: pointer;
}
.check-item span { font-size: 13.5px; color: #444; line-height: 1.6; }

/* SUBMIT */
.btn-submit {
  width: 100%;
  background:#f5c518;
  color: #000;
  
  font-size: 16px; font-weight: 700;
  letter-spacing: 1.5px;
  padding: 18px 32px;
  border: none; border-radius: 8px;
  cursor: pointer;
  transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
  box-shadow: 0 4px 20px rgba(26,61,43,0.25);
  position: relative; overflow: hidden;
}
.btn-submit::after {
  content: ' →';
  font-family: 'DM Sans', sans-serif;
  font-weight: 400;
}
.btn-submit:hover {
  background: #19398a;
  transform: translateY(-2px);
  box-shadow: 0 8px 32px rgba(26,61,43,0.3);
  color:#fff;
}
.btn-submit:active { transform: translateY(0); }
@media(max-width:991px){
    .form-block1 .field{width:49.555%;display: inline-block;}
.form-block2 .field{width: 49.555%;display: inline-block;}
.form-block3 .field{width: 100%;display: inline-block;}
}

@media(max-width:560px){
    .form-block1 .field{width:100%;display: inline-block;}
.form-block2 .field{width:100%;display: inline-block;}
.form-block3 .field{width: 100%;display: inline-block;}
}
    </style>


<section class="pad100 mt-78" style="background:radial-gradient(ellipse at 50% 100%, rgb(25 57 138 / 51%) 0%, transparent 65%), radial-gradient(ellipse at 50% 0%, rgba(200, 144, 10, 0.08) 0%, transparent 60%), linear-gradient(180deg, #160a0c 0%, #0a0608 100%)">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
               <div class="owner-text">
                  <h1 class="heading" style="color:#19398a">Team Ownership Opportunity</h1>
                  <strong>Own a Team in HCPL</strong>
                  <p>Haryana Cricket Premier League offers businesses and cricket enthusiasts the opportunity to own a franchise team and become part of an exciting cricket league.</p>
                  <p>With 8 franchise teams, HCPL provides owners with a platform to build their teams, participate in the player auction, and compete for the championship.</p>
                  <p>Owning a team in HCPL also provides excellent brand visibility, promotion, and engagement with cricket fans across Haryana.</p>
            </div>        

            
        </div>
    </div>
</section>   
<div class="slots-banner">
 
  <div>
    <h3>Team Owner Slots</h3>
    <p>Limited Franchise Opportunities Available — Only 8 teams will compete in HCPL Season 1.</p>
  </div>
 
</div>


<section class="pad100" >
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12 mx-auto">
              <form id="ownerForm" onsubmit="handleSubmit(event)">
                @csrf
      <!-- S1: Basic Details -->
      <div class="form-block form-block1">
        <div class="sec-head">
          <div class="sec-num">1</div>
          <div class="sec-title">Basic Details</div>
          <div class="sec-line"></div>
        </div>
        <div class="field">
          <label>Brand Name / Company Name <span class="req">*</span></label>
          <input type="text" name="brand_name" placeholder="Brand Name / Company Name" required/>
          <span class="error-text" id="error-brand_name"></span>
        </div>
        <div class="field">
          <label>Contact Person Name <span class="req">*</span></label>
          <input type="text" name="contact_person" placeholder="Full name" required/>
          <span class="error-text" id="error-contact_person"></span>
        </div>
        <div class="field">
          <label>Phone Number <span class="req">*</span></label>
          <input type="tel" name="phone_number" placeholder="Phone Number" required/>
          <span class="error-text" id="error-phone_number"></span>
        </div>
        <div class="field">
          <label>Email Address <span class="req">*</span></label>
          <input type="email" name="email" placeholder="Email" required/>
          <span class="error-text" id="error-email"></span>
        </div>
        <div class="field">
          <label>City / State <span class="req">*</span></label>
          <input type="text" name="city_state" placeholder="City/State" required/>
          <span class="error-text" id="error-city_state"></span>
        </div>
        <div class="field">
          <label>Profession / Business Type <span class="req">*</span></label>
          <input type="text" name="profession" placeholder="Business Type" required/>
          <span class="error-text" id="error-profession"></span>
        </div>
        <div class="field">
          <label>Financial Capacity for Team Ownership (in Lacs) <span class="req">*</span></label>
          <input type="number" name="financial_capacity" placeholder="Financial Capacity" required/>
          <span class="error-text" id="error-financial_capacity"></span>
        </div>
      </div>

      <!-- S2: Team Preferences -->
      <div class="form-block form-block2">
        <div class="sec-head">
          <div class="sec-num">2</div>
          <div class="sec-title">Team Preferences</div>
          <div class="sec-line"></div>
        </div>
        <div class="field">
          <label>Preferred Team Name</label>
          <select name="preferred_team_name">
                <option value="" disabled selected>Select preferred team name</option>
                <option>Rohtak Warriors</option>
                <option>Hisar Titans</option>
                <option>Sirsa Royals</option>
                <option>Gurugram Giants</option>
                <option>Faridabad Fighters</option>
                <option>Sonipat Tigers</option>
                <option>Karnal Kings</option>
                <option>Ambala Avengers</option>
            </select>
          <span class="error-text" id="error-preferred_team_name"></span>
        </div>
        <div class="field">
          <label>Preferred City / District <span class="req">*</span></label>
          <select name="preferred_district" required>
            <option value="" disabled selected>Select preferred city / district</option>
            <option>Rohtak</option>
            <option>Hisar</option>
            <option>Sirsa</option>
            <option>Gurugram</option>
            <option>Faridabad</option>
            <option>Sonipat</option>
            <option>Karnal</option>
            <option>Ambala</option>
        </select>
          <span class="error-text" id="error-preferred_district"></span>
        </div>
        <div class="field">
          <label>Prior Experience in Sports / Events?</label>
          <select name="prior_experience">
            <option value="" disabled selected>Do you have prior experience</option>
            <option>Yes — I have prior sports/events experience</option>
            <option>No — First time in sports ownership</option>
          </select>
          <span class="error-text" id="error-prior_experience"></span>
        </div>
      </div>

      <!-- S3: Vision & Intent -->
      <div class="form-block form-block3">
        <div class="sec-head">
          <div class="sec-num">3</div>
          <div class="sec-title">Vision &amp; Intent</div>
          <div class="sec-line"></div>
        </div>
        <div class="field">
          <label>Why do you want to own an HCPL team? <span class="req">*</span></label>
          <textarea name="reason_to_own" placeholder="Share your motivation." required></textarea>
          <span class="error-text" id="error-reason_to_own"></span>
        </div>
        <div class="field">
          <label>How do you plan to grow your team / brand?</label>
          <textarea name="growth_plan" placeholder="Describe your strategy for marketing."></textarea>
          <span class="error-text" id="error-growth_plan"></span>
        </div>
      </div>

      <!-- S4: Additional Information -->
      <div class="form-block">
        <div class="sec-head">
          <div class="sec-num">4</div>
          <div class="sec-title">Additional Information</div>
          <div class="sec-line"></div>
        </div>
        <div class="field">
          <label>Any Questions or Special Requirements</label>
          <textarea name="special_requirements" placeholder="Any questions or special requirements."></textarea>
          <span class="error-text" id="error-special_requirements"></span>
        </div>
      </div>

      <!-- DECLARATION -->
      <div class="decl-box">
        <div class="decl-title">⚠ Declaration</div>
        <label class="check-item">
          <input type="checkbox" name="declaration_confirmed" value="1" required/>
          <span>I confirm that the information provided is true, and I am interested in owning a franchise team in HCPL.</span>
        </label>
        <span class="error-text" id="error-declaration_confirmed"></span>
        
        <label class="check-item">
          <input type="checkbox" name="declaration_management" value="1" required/>
          <span>I understand that selection is subject to approval by HCPL management.</span>
        </label>
        <span class="error-text" id="error-declaration_management"></span>
      </div>

      <button type="submit" id="submitBtn" class="btn-submit">Apply for Team Ownership</button>

    </form>
 

           </div>

        </div>
    </div>
</section> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function handleSubmit(event) {
    event.preventDefault();
    const form = document.getElementById('ownerForm');
    const btn = document.getElementById('submitBtn');
    const originalText = btn.innerText;
    
    // Reset errors
    $('.error-text').text('');
    $('input, select, textarea').removeClass('input-error');
    
    btn.disabled = true;
    btn.innerText = 'Validating...';

    $.ajax({
        url: "{{ route('owner.registration.store') }}",
        method: 'POST',
        data: $(form).serialize(),
        success: function(response) {
            Swal.fire({
                title: 'Success!',
                text: response.message,
                icon: 'success',
                confirmButtonColor: '#19398a',
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
                    title: 'Validation Error',
                    text: 'Please check the red marked fields.',
                    icon: 'warning',
                    confirmButtonColor: '#f5c518'
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