<div class="footer">
    <div class="container">
        <div class="row">


            <div class="col-lg-3 col-md-12">
                <div class="ft-logo">
                    <img src="https://websitework.online/hcpl-new/images/logo.png" alt="hcpl-new" width="100">


                </div>

                <!--<p>Haryana Cricket Premier League (HCPL) is a professional T20 cricket league providing a platform for emerging talent across Haryana to showcase their skills on a grand stage.

</p>-->

                <div class="social-media mt-5">
                    <a href="https://www.facebook.com/people/HCPL-Haryana-Cricket-Premier-League/61589184445646/?mibextid=wwXIfr&rdid=C3HHftvzTWyAgCvu&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F14YQSKQWu3n%2F%3Fmibextid%3DwwXIfr"
                        target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a href="https://www.instagram.com/hcplt20?igsh=MWY3dWlpbGIydGU5dw%3D%3D&utm_source=qr"
                        target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="https://youtube.com/@haryanacricketpremierleague?si=q2E4UIT90McMbaVL" target="_blank"><i
                            class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    <a href="https://x.com/home" target="_blank"><a href="https://twitter.com/" target="_blank">
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>
                </div>

            </div>


            <div class="col-lg-3 col-md-4 wdth50">

                <div class="ft-inner pd90 ft-border">
                    <h6>Quick Links</h6>
                    <ul class="ft50">

                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="teams.php">Our Teams</a></li>
                        <li><a href="contact-us.php">Contct Us</a></li>
                        <li><a href="privacy.php">Privacy Policy</a></li>
                        <li><a href="terms-and-conditions.php">Terms And Conditions </a></li>



                    </ul>



                </div>
            </div>

            <div class="col-lg-3 col-md-4 wdth50">

                <div class="ft-inner pd90 ft-border">
                    <h6>Registration</h6>
                    <ul class="ft50">

                        <li><a href="#">Player Registration</a></li>
                        <li><a href="#">Owner Registration</a></li>
                        <li><a href="#">Sponsor Registration</a></li>


                    </ul>



                </div>
            </div>




            <div class="col-lg-3 col-md-4 ">
                <div class="ft-inner">
                    <h6>GET IN TOUCH</h6>
                    <strong class="text-white">ARK NextGen Sports Pvt. Ltd.</strong>

                    <ul class="ft-address">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i><span>165, New Railway Road, Bhim Nagar,
                                Gurugram, Haryana-122001</span></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i><span> <a
                                    href="tel:+91-+91 9211335612">+91-+91 9211335612</a></span></li>


                        <li><i class="fa fa-envelope-o" aria-hidden="true"></i><span><a
                                    href="mailto:info@hcplt20.com">info@hcplt20.com</a></span></p>

                    </ul>
                </div>
            </div>

            <div class="col-md-12">
                <div class="copy-right">

                    <div class="row">
                        <div class="col-md-12 text-center mt-4">
                            <p>© 2026 HCPL — Haryana Cricket Premier League. All rights reserved. </p>
                        </div>


                        <!--<div class="col-md-12 col-lg-3">
              <div class="social-media " >
              <a href="#" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="javascript:void(0)" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
               <a href="#" target="_blank"><img src="https://websitework.online/duron/upvc/images/twitterx.svg" alt="twitterx" width="17"></a>
           </div>
            </div>-->
                        <!--<div class="col-lg-1 ">
<div class="digital">
     <a href="http://thedigitalally.in/" target="_blank"><img src="images/digitalally.webp" alt="the digital ally logo" class="w-100"></a>
    </div>
            
          
         </div>-->
                    </div>
                </div>

            </div>
        </div>


    </div>

    @include('frontend.pages.login');
    @include('frontend.pages.popup');

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
