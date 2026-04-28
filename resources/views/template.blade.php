<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kutamasya.id</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/animate.css">
    
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/owl.carousel.min.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/magnific-popup.css">

    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/aos.css">

    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/ionicons.min.css">

    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/flaticon.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/icomoon.css">
    <link rel="stylesheet" href="https://themewagon.github.io/direngine/css/style.css">
    <style>
      /* Efek Transparan / Kaca (Glassmorphism) untuk Dropdown */
      .ftco-navbar-light .navbar-nav .nav-item .dropdown-menu {
        background-color: rgba(255, 255, 255, 0.73) !important;
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.5) !important;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        min-width: auto;
        padding: 0.25rem 0;
      }
      .ftco-navbar-light .navbar-nav .nav-item .dropdown-menu .dropdown-item {
        color: #333333 !important;
        font-weight: 500;
        font-size: 14px;
        transition: all 0.3s ease;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.4rem 1.2rem;
        gap: 15px;
      }
      .ftco-navbar-light .navbar-nav .nav-item .dropdown-menu .dropdown-item:hover {
        background-color: rgb(87, 201, 209) !important;
        color: #fffff !important;
      }

      /* Logika untuk Nested Dropdown (Submenu) */
      .dropdown-submenu {
        position: relative;
      }
      .dropdown-submenu > .dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
        margin-left: 0;
        display: none !important;
      }
      .dropdown-submenu:hover > .dropdown-menu {
        display: block !important;
      }

      /* Custom Menu Tengah (Rapet) */
      .center-nav .nav-link {
        padding-left: 12px !important;
        padding-right: 12px !important;
      }

      /* Teks Menu Putih Jelas sebelum di-scroll (Hanya Desktop) */
      @media (min-width: 992px) {
        .ftco-navbar-light:not(.scrolled) .navbar-nav > .nav-item > .nav-link {
          color: #ffffff !important;
          opacity: 1 !important;
          font-weight: 500;
        }
      }

      /* Navbar Transparan di Semua Layar (Desktop & Mobile) sebelum di-scroll */
      .ftco-navbar-light:not(.scrolled) {
        background: transparent !important;
        position: absolute !important;
        top: 0;
        left: 0;
        right: 0;
        z-index: 99;
      }

      /* Perbaikan Navbar Hitam di Mobile (di bawah 992px) */
      @media (max-width: 991.98px) {

        /* Berikan background putih transparan/kaca untuk isi menu saat dibuka */
        .ftco-navbar-light .navbar-collapse {
          background: rgba(255, 255, 255, 0.95) !important;
          border-radius: 10px;
          padding: 15px;
          margin-top: 10px;
          box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        /* Ubah warna teks menu di HP jadi gelap agar terbaca di background putih */
        .ftco-navbar-light .navbar-nav > .nav-item > .nav-link {
          color: #333333 !important;
        }
        /* Warna aktif di menu HP */
        .ftco-navbar-light .navbar-nav > .nav-item.active > .nav-link {
          color: rgb(87, 201, 209) !important;
        }
      }
    </style>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="#" style="padding: 5px 0;">
        <img src="{{ asset('asset/images/Logo-kutamasya.jpg') }}" alt="Kutamasya Logo" style="height: 50px; width: auto; border-radius: 5px;">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> 
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <!-- Menu Utama di Tengah -->
        <ul class="navbar-nav mx-auto center-nav">
          <li class="nav-item {{ request()->is('/') ? 'active' : '' }}"><a href="{{ url('/') }}" class="nav-link">Beranda</a></li>          
          <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}"><a href="{{ route('about') }}" class="nav-link">Tentang Kami</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdownPaketWisata" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paket Wisata Banyuwangi</a>
            
            <div class="dropdown-menu" aria-labelledby="dropdownPaketWisata">
              <a class="dropdown-item" href="#"><span>Open Trip Banyuwangi</span> <i class="ion-ios-arrow-forward"></i></a>
              <a class="dropdown-item" href="#"><span>One Day Trip Banyuwangi</span> <i class="ion-ios-arrow-forward"></i></a>
              <a class="dropdown-item" href="#"><span>2 Day 1 Night Banyuwangi</span> <i class="ion-ios-arrow-forward"></i></a>
              <a class="dropdown-item" href="#"><span>3 Day 2 Night Banyuwangi</span> <i class="ion-ios-arrow-forward"></i></a>
            </div>
          </li>
          <!-- <li class="nav-item"><a href="tour.html" class="nav-link">Destinasi</a></li> -->
          <li class="nav-item {{ request()->routeIs('recommendation') ? 'active' : '' }}"><a href="{{ route('recommendation') }}" class="nav-link">Rekomendasi</a></li>
          <li class="nav-item {{ request()->routeIs('article') ? 'active' : '' }}"><a href="{{ route('article') }}" class="nav-link">Artikel</a></li>
          <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Kontak</a></li>
        </ul>

        <!-- Tombol Auth di Kanan -->
        <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
            @auth
              @if(Auth::user()->role === 'admin')
                <li class="nav-item cta"><a href="{{ route('admin.dashboard') }}" class="nav-link"><span>Admin Panel</span></a></li>
              @else
                <li class="nav-item cta"><a href="{{ url('/dashboard') }}" class="nav-link"><span>Dashboard</span></a></li>
              @endif
            @else
              <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
              @if (Route::has('register'))
                <li class="nav-item cta"><a href="{{ route('register') }}" class="nav-link"><span>Sign Up</span></a></li>
              @endif
            @endauth
          @else
            <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            <li class="nav-item cta"><a href="/register" class="nav-link"><span>Sign Up</span></a></li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    @yield('content')
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 d-flex align-items-center">
                <img src="{{ asset('asset/images/Logo-kutamasya.jpg') }}" alt="Kutamasya Logo" style="height: 40px; width: auto; margin-right: 10px; border-radius: 5px;">
                <span style="color: #fff; font-weight: 700; font-size: 24px;">Kutamasya.id</span>
              </h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Service</a></li>
                <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Become a partner</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="https://themewagon.github.io/direngine/js/jquery.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/popper.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/bootstrap.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.easing.1.3.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.waypoints.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.stellar.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/owl.carousel.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.magnific-popup.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/aos.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.animateNumber.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/bootstrap-datepicker.js"></script>
  <script src="https://themewagon.github.io/direngine/js/jquery.timepicker.min.js"></script>
  <script src="https://themewagon.github.io/direngine/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="https://themewagon.github.io/direngine/js/google-map.js"></script>
  <script src="https://themewagon.github.io/direngine/js/main.js"></script>
    
  </body>
</html>
