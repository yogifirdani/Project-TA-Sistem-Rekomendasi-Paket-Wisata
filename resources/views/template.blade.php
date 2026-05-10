<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Kutamasya.id</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://themewagon.github.io">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush&display=swap" rel="stylesheet">

    <!-- Critical CSS (Load immediately) -->
    <link rel="stylesheet" href="{{ asset('asset/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    
    <!-- Non-Critical CSS (Deferred loading) -->
    <link rel="preload" href="{{ asset('asset/css/open-iconic-bootstrap.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/animate.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/owl.carousel.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/owl.theme.default.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/magnific-popup.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/aos.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/ionicons.min.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/bootstrap-datepicker.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/jquery.timepicker.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/flaticon.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link rel="preload" href="{{ asset('asset/css/icomoon.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
    
    <noscript>
        <link rel="stylesheet" href="{{ asset('asset/css/open-iconic-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/aos.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/jquery.timepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('asset/css/icomoon.css') }}">
    </noscript>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

      /* Global CTA (Register) Button Styling */
      .navbar-nav .nav-item.cta .nav-link:hover {
        background: transparent !important;
      }
      .navbar-nav .nav-item.cta .nav-link:hover span {
        background: rgb(87, 201, 209) !important;
        border-color: rgb(87, 201, 209) !important;
        color: #fff !important;
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
        .ftco-navbar-light .navbar-nav > .nav-item.active > .nav-link {
          color: rgb(87, 201, 209) !important;
        }
      }

      .ftco_navbar {
        z-index: 9999 !important;
      }

      /* Fix conflict between Tailwind and Bootstrap collapse */
      .navbar-collapse.collapse {
        display: none;
      }
      .navbar-collapse.collapse.show {
        display: block;
      }
      @media (min-width: 992px) {
        .navbar-expand-lg .navbar-collapse.collapse {
          display: flex !important;
          visibility: visible !important;
        }
      }
      .dropdown-toggle::after {
        display: none !important;
      }
    </style>
  </head>
  <body>
    
    @include('partials.navbar')
    
    @yield('content')
	

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2 d-flex align-items-center">
                <img src="{{ asset('asset/images/Logo-kutamasya.webp') }}" alt="Kutamasya Logo" style="height: 40px; width: auto; margin-right: 10px; border-radius: 5px;">
                <span style="color: #fff; font-weight: 700; font-size: 24px;">Kutamasya.id</span>
              </h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-tiktok"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-youtube"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Layanan Kami</h2>
              <ul class="list-unstyled">
                <li><a href="{{ route('paket-wisata') }}?tipe=open-trip-banyuwangi" class="py-2 d-block">Open Trip Banyuwangi</a></li>
                <li><a href="{{ route('paket-wisata') }}?tipe=one-day-trip-banyuwangi" class="py-2 d-block">One Day Trip</a></li>
                <li><a href="{{ route('paket-wisata') }}?tipe=private-trip" class="py-2 d-block">Private Trip</a></li>
                <li><a href="{{ route('paket-wisata') }}?tipe=paket-kawah-ijen" class="py-2 d-block">Paket Kawah Ijen</a></li>
                <li><a href="{{ route('paket-wisata') }}?tipe=paket-menjangan" class="py-2 d-block">Paket Menjangan</a></li>
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
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl.Raya Watukebo Kec. Blimbingsari Kab. Banyuwangi</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">kutamasya@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="{{ url('/') }}">Kutamasya.id</a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/jquery-migrate-3.0.1.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/popper.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/bootstrap.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.easing.1.3.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.waypoints.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.stellar.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/owl.carousel.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.magnific-popup.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/aos.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.animateNumber.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/bootstrap-datepicker.js') }}" defer></script>
  <script src="{{ asset('asset/js/jquery.timepicker.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/scrollax.min.js') }}" defer></script>
  <script src="{{ asset('asset/js/main.js') }}" defer></script>
  
  <!-- instant.page to make everything feel faster -->
  <script src="//instant.page/5.2.0" type="module" integrity="sha384-JnE3Wv9Q9G8PPdaJpInS96p58S8B53O4a2zI5bWfRz+4hHnC65vE4S1XvVlD6QZ3" crossorigin="anonymous"></script>
    
  </body>
</html>
