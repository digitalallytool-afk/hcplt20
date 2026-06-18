<div class="footer">
    <div class="container">
        <div class="row">


            <div class="col-lg-3 col-md-12">
                <div class="ft-logo">
                    <img src="{{ $web_setting && $web_setting->logo ? asset($web_setting->logo) : 'https://websitework.online/hcpl-new/images/logo.png' }}"
                        alt="{{ $web_setting->site_name ?? 'hcpl-new' }}" width="180">


                </div>

                <!--<p>Haryana Corporate Premier League (HCPL) is a professional T20 cricket league providing a platform for emerging talent across Haryana to showcase their skills on a grand stage.

</p>-->

                <div class="social-media mt-5">
                    <a href="{{ $web_setting->facebook_url ?? '#' }}" target="_blank"><i class="fa fa-facebook"
                            aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->instagram_url ?? '#' }}" target="_blank"><i class="fa fa-instagram"
                            aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->youtube_url ?? '#' }}" target="_blank"><i class="fa fa-youtube-play"
                            aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->twitter_url ?? '#' }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-bottom: 2px;">
                          <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                        </svg>
                    </a>
                </div>

            </div>


            <div class="col-lg-3 col-md-4 wdth50">

                <div class="ft-inner pd90 ft-border">
                    <h6>Quick Links</h6>
                    <ul class="ft50">

                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('team') }}">Our Teams</a></li>
                        <li><a href="{{ route('sponsors') }}">Sponsors</a></li>
                        <li><a href="{{ route('contact') }}">Contct Us</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms And Conditions </a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>



                    </ul>



                </div>
            </div>

            <div class="col-lg-3 col-md-4 wdth50">

                <div class="ft-inner pd90 ft-border">
                    <h6>Registration</h6>
                    <ul class="ft50">

                        <li><a href="{{ route('player-registration') }}">Player Registration</a></li>
                        <li><a href="{{ route('owner-registration') }}">Owner Registration</a></li>
                        <li><a href="{{ route('sponsor-registration') }}">Sponsor Registration</a></li>


                    </ul>



                </div>
            </div>




            <div class="col-lg-3 col-md-4 ">
                <div class="ft-inner">
                    <h6>GET IN TOUCH</h6>
                    <strong class="text-white">ARK NextGen Sports Pvt. Ltd.</strong>

                    <ul class="ft-address">
                        <li><i class="fa fa-map-marker"
                                aria-hidden="true"></i><span>{{ $web_setting->address ?? '165, New Railway Road, Bhim Nagar, Gurugram, Haryana-122001' }}</span>
                        </li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><span> <a
                                    href="tel:{{ $web_setting->phone ?? '+919211335612' }}">+91-{{ $web_setting->phone ?? '+91 9211335612' }}</a></span>
                        </li>


                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><a
                                    href="mailto:{{ $web_setting->email ?? 'info@hcplt20.com' }}">{{ $web_setting->email ?? 'info@hcplt20.com' }}</a></span>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="copy-right">
                    <div class="row">
                        <div class="col-md-6"> 
                            <p>© {{ date('Y') }} All Rights Reserved by {{ $web_setting->site_name ?? 'Haryana Corporate Premier League' }}</p>
                        </div>
                        <div class="col-lg-5 col-md-4"> 
                            <div class="social">
                                <ul>
                                    <div class="ft-social">
                                        <a href="{{ $web_setting->facebook_url ?? '#' }}" target="_blank" aria-label="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        <a href="{{ $web_setting->instagram_url ?? '#' }}" target="_blank" aria-label="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                        <a href="{{ $web_setting->twitter_url ?? '#' }}" target="_blank" aria-label="twitterx">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" style="margin-bottom: 2px;">
                                              <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ $web_setting->youtube_url ?? '#' }}" target="_blank" aria-label="youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                                    </div> 
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <div class="digital">
                                <a href="http://thedigitalally.in/" target="_blank"><img src="{{ asset('frontend/images/digitalally.webp') }}" alt="digitalally" class="w-100"></a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>


    </div>

    @include('frontend.pages.login');
    @if(request()->routeIs('home'))
        @include('frontend.pages.popup')
    @endif

    <!-- Sticky Floating Action Buttons -->
    <style>
        .floating-action-group {
            position: fixed;
            bottom: 30px;
            right: 30px;
            z-index: 99999;
            display: flex;
            flex-direction: column;
            align-items: center; /* Centers the WhatsApp circle over the pill button */
            gap: 12px;
        }

        .floating-register-btn {
            background: #0a1c3e;
            color: #ffffff;
            padding: 14px 28px;
            font-weight: 800;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-radius: 50px;
            border: 2px solid #ffffff;
            box-shadow: 0 10px 30px rgba(10, 28, 62, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-family: 'DM Sans', sans-serif;
            white-space: nowrap;
            position: relative;
        }
        .floating-register-btn:hover {
            background: #ff6600;
            color: #ffffff;
            border-color: #ff6600;
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 15px 35px rgba(255, 102, 0, 0.35);
        }
        .floating-register-btn .btn-icon {
            font-size: 1.2rem;
        }
        .floating-register-btn::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: inherit;
            border-radius: inherit;
            z-index: -1;
            opacity: 0.4;
            animation: floatPulse 2s infinite;
        }
        @keyframes floatPulse {
            0% {
                transform: scale(1);
                opacity: 0.4;
            }
            100% {
                transform: scale(1.25);
                opacity: 0;
            }
        }

        /* Floating WhatsApp Button */
        .floating-whatsapp-btn {
            background: #25D366;
            color: #ffffff;
            width: 56px;
            height: 56px;
            border-radius: 50%;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none !important;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            font-size: 2rem;
            border: 2px solid #ffffff;
        }
        .floating-whatsapp-btn:hover {
            transform: translateY(-3px) scale(1.08);
            background: #128C7E;
            color: #ffffff;
            box-shadow: 0 15px 30px rgba(18, 140, 126, 0.4);
        }

        @media (max-width: 767px) {
            .floating-action-group {
                bottom: 20px;
                right: 20px;
                gap: 8px;
            }
            .floating-register-btn {
                padding: 12px 22px;
                font-size: 0.8rem;
            }
            .floating-whatsapp-btn {
                width: 48px;
                height: 48px;
                font-size: 1.6rem;
            }
        }
    </style>

    <div class="floating-action-group">
        <!-- Floating WhatsApp Button -->
        <a href="https://wa.me/919211335613?text=Hello%21%20I%27m%20interested%20in%20joining%20Haryana%20Corporate%20Premier%20League%20%28HCPL%29.%20Please%20share%20more%20details%20about%20player%20registration%20and%20league%20schedules." target="_blank" class="floating-whatsapp-btn">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
        </a>

        <!-- Floating Register Now Button -->
        <a href="{{ route('player-registration') }}" class="floating-register-btn">
            <span class="btn-icon">🏏</span> Register Now
        </a>
    </div>

    <!-- Commented out old widgets -->
    <!--
<a href="https://api.whatsapp.com/send/?phone=+919818898917" target="_blank" class="whatsapp"><img src="images/whatsapp-icon.svg" alt="whatsapp" class="w-100"></a>
        <div class="fixedbtn sgfrfi" data-bs-toggle="modal" data-bs-target="#enquiry"><span class="btnrt">Enquire Now</span></div> -->

    <script src="{{ asset('frontend') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/js/wow.min.js"></script>
    <script src="{{ asset('frontend') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend') }}/js/jquery.fancybox.min.js"></script>
    <script src="{{ asset('frontend') }}/js/custom.js"></script>
    <script>
        function isNumberKey(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode;
            if (charCode < 48 || charCode > 57) {
                return false;
            }
            return true;
        }



        $("#name").on("input", function() {
            this.value = this.value.replace(/[^a-zA-Z\s]/g, ""); // Letters and spaces only
        });
    </script>








    </body>

    </html>
