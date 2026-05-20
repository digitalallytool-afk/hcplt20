<div class="footer">
    <div class="container">
        <div class="row">


            <div class="col-lg-3 col-md-12">
                <div class="ft-logo">
                    <img src="{{ $web_setting && $web_setting->logo ? asset($web_setting->logo) : 'https://websitework.online/hcpl-new/images/logo.png' }}" alt="{{ $web_setting->site_name ?? 'hcpl-new' }}" width="100">


                </div>

                <!--<p>Haryana Cricket Premier League (HCPL) is a professional T20 cricket league providing a platform for emerging talent across Haryana to showcase their skills on a grand stage.

</p>-->

                <div class="social-media mt-5">
                    <a href="{{ $web_setting->facebook_url ?? '#' }}"
                        target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->instagram_url ?? '#' }}"
                        target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->youtube_url ?? '#' }}" target="_blank"><i
                            class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="{{ $web_setting->twitter_url ?? '#' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                </div>

            </div>


            <div class="col-lg-3 col-md-4 wdth50">

                <div class="ft-inner pd90 ft-border">
                    <h6>Quick Links</h6>
                    <ul class="ft50">

                        <li><a href="{{ route('about') }}">About Us</a></li>
                        <li><a href="{{ route('team') }}">Our Teams</a></li>
                        <li><a href="{{ route('contact') }}">Contct Us</a></li>
                        <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms And Conditions </a></li>



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
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>{{ $web_setting->address ?? '165, New Railway Road, Bhim Nagar, Gurugram, Haryana-122001' }}</span></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><span> <a
                                    href="tel:{{ $web_setting->phone ?? '+919211335612' }}">{{ $web_setting->phone ?? '+91 9211335612' }}</a></span></li>


                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><a
                                    href="mailto:{{ $web_setting->email ?? 'info@hcplt20.com' }}">{{ $web_setting->email ?? 'info@hcplt20.com' }}</a></span></li>

                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="copy-right">

                    <div class="row">
                        <div class="col-md-12 text-center mt-4">
                            <p>© 2026 {{ $web_setting->site_name ?? 'HCPL — Haryana Cricket Premier League' }}. All rights reserved. </p>
                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>

    @include('login.blade.php');
    @if(request()->routeIs('home'))
        @include('popup.blade.php')
    @endif
    <!--
  
<a href="https://api.whatsapp.com/send/?phone=+919818898917" target="_blank" class="whatsapp"><img src="images/whatsapp-icon.svg" alt="whatsapp" class="w-100"></a>
        <div class="fixedbtn sgfrfi" data-bs-toggle="modal" data-bs-target="#enquiry"><span class="btnrt">Enquire Now</span></div> -->

    <script src="<?php echo $home_url; ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $home_url; ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo $home_url; ?>js/wow.min.js"></script>
    <script src="<?php echo $home_url; ?>js/slick.min.js"></script>
    <script src="<?php echo $home_url; ?>js/jquery.fancybox.min.js"></script>
    <script src="<?php echo $home_url; ?>js/custom.js"></script>
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
