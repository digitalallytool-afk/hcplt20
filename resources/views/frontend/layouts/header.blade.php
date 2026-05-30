     <!doctype html>
     <html lang="en">

     <head>
         <title>@yield('title', $web_setting->site_name ?? 'Haryana Cricket Premier League (HCPL)')</title>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width; initial-scale=1.0" />
         <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no" />
         <meta name="format-detection" content="telephone=no" />
         <link
             href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Golos+Text:wght@400..900&display=swap">
         <link rel="icon" href="{{ asset('frontend') }}/images/febicon.png">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/animate.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/style.css">
         <!--<link rel="stylesheet" type="text/css" href="<php echo $home_url;?>hcpl-new/css/custom.css">-->
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/slick.min.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/all.min.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/font-awesome.min.css">
         <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/jquery.fancybox.css">
         <link
             href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Golos+Text:wght@400..900&display=swap"
             rel="stylesheet">
         <link rel="stylesheet"
             href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
         <style>
             /* Hover color change for Header & Footer */
             .navbar-expand-lg .navbar-nav li a:hover,
             .navbar-expand-lg .navbar-nav li .dropdown-menu li a:hover,
             .footer a:hover,
             .footer .ft50 li a:hover,
             .footer .ft-address li a:hover {
                 color: #f4c242 !important;
                 transition: color 0.3s ease;
             }
             .social-media a:hover i {
                 color: #f4c242 !important;
                 transition: color 0.3s ease;
             }
             .social-media a:hover svg {
                 fill: #f4c242 !important;
                 transition: fill 0.3s ease;
             }

             /* Prevent nested dropdowns from showing on main dropdown hover */
             .navbar-expand-lg .navbar-nav li:hover .dropdown-menu .dropdown-menu {
                 opacity: 0;
                 visibility: hidden;
                 display: none !important;
                 left: 100%;
                 top: 0;
                 margin-top: -10px;
             }
             /* Show nested dropdown on its own hover */
             .navbar-expand-lg .navbar-nav li .dropdown-menu li.dropend:hover > .dropdown-menu,
             .navbar-expand-lg .navbar-nav li .dropdown-menu li.dropend > .dropdown-menu.show {
                 opacity: 1;
                 visibility: visible;
                 display: block !important;
             }
             /* Mobile adjustments */
             @media (max-width: 991px) {
                 .navbar-expand-lg .navbar-nav li:hover .dropdown-menu .dropdown-menu,
                 .navbar-expand-lg .navbar-nav li .dropdown-menu li.dropend:hover > .dropdown-menu,
                 .navbar-expand-lg .navbar-nav li .dropdown-menu li.dropend > .dropdown-menu.show {
                     left: 0;
                     top: 0;
                     position: relative;
                     padding-left: 15px;
                     margin-top: 5px;
                     box-shadow: none;
                 }
             }
         </style>
     </head>

     <nav class="navbar navbar-expand-lg">
         <div class="container">

             <a class="navbar-brand" href="{{ route('home') }}">

                 <img src="{{ $web_setting && $web_setting->logo ? asset($web_setting->logo) : asset('frontend/images/logo.png') }}"
                     alt="{{ $web_setting->site_name ?? 'hcpl' }}">


             </a>



             <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                 data-bs-target="#navbarSupporteduronontent" aria-controls="navbarSupporteduronontent"
                 aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>

             <div class="navbar-collapse collapse main-nav" id="navbarSupporteduronontent">
                 <ul class="nav navbar-nav">
                     <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home </a></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us </a> </li>



                     <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown"
                             aria-expanded="false"> Registration <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                         <ul class="dropdown-menu">
                             <li class="nav-item dropdown dropend">
                                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                     Player Registration 
                                     <i class="fa fa-angle-right d-none d-lg-inline-block ms-2" aria-hidden="true"></i>
                                     <i class="fa fa-angle-down d-lg-none ms-2" aria-hidden="true"></i>
                                 </a>
                                 <ul class="dropdown-menu">
                                     <li><a href="{{ route('player-registration') }}" class="nav-link">Mens Registration</a></li>
                                     <li><a href="{{ route('player-registration') }}" class="nav-link">Womens Registration</a></li>
                                 </ul>
                             </li>
                             <li class="nav-item"><a href="{{ route('owner-registration') }}" class="nav-link">Owner
                                     Registration</a></li>
                             <li class="nav-item"><a href="{{ route('sponsor-registration') }}"
                                     class="nav-link">Sponsor Registration</a></li>



                         </ul>
                     </li>

                     <li class="nav-item"> <a class="nav-link" href="{{ route('team') }}">Teams</a></li>

                     <li class="nav-item"><a class="nav-link" href="javascript:void(0)" data-bs-toggle="dropdown"
                             aria-expanded="false"> Media <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                         <ul class="dropdown-menu">
                             <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
                             <li class="nav-item"><a href="{{ route('video') }}" class="nav-link">Videos</a></li>




                         </ul>
                     </li>

                     <li class="nav-item" style="margin-right:0"><a class="nav-link "
                             href="{{ route('contact') }}">Contact Us </a></li>



                 </ul>
                 <div class="d-flex marge-btn">
                     @if(auth()->check() && auth()->user()->role === 'player')
                         <a href="{{ route('player.dashboard') }}" class="btn btn-outline">Dashboard</a>
                     @else
                         <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#login" class="btn btn-outline">Login</a>
                         <a href="{{ route('player-registration') }}" class="btn btn-gold">Register</a>
                     @endif
                 </div>

             </div>




     </nav>
