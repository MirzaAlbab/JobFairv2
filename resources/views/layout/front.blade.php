<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>@yield('title')</title>
  
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/DPKKA-logo.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  
  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/front/style.css') }}" rel="stylesheet">

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top bg-light">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/dpkka.png') }}" alt="">
        <span>AOCF</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ (request()->is('landingpage')) ? 'active' : '' }}"  href="{{ route('user-landing') }}">Home</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('about')) ? 'active' : '' }}" href="{{ route('user-about') }}">About</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('partners')) ? 'active' : '' }}" href="{{ route('user-partners') }}">Partners</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('events')) ? 'active' : '' }}" href="{{ route('user-events') }}">Events</a></li>
          <li><a class="nav-link scrollto {{ (request()->is('galleryy')) ? 'active' : '' }}" href="{{ route('user-gallery') }}">Gallery</a></li>
         
             @if (Auth::check())
             <li><a class="nav-link scrollto {{ (request()->is('galleryy')) ? 'active' : '' }}" href="{{ route('login') }}">My Dashboard</a></li>
             <div class="dropdown">
              <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::User()->name }}
              </a>
            
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                <li><form action="{{ route('logout') }}" method="post">
                  @csrf
                  <button class="dropdown-item d-flex align-items-center" type="submit">
                    <span>Logout</span>
                  </button>
                </form></li>
               
             
              </ul>
            </div>

              @else
             

               <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
             
             @endif
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  @yield('container')

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row gy-4 justify-content-center">

          <div class="col-lg-3">
            <img class="img-fluid logo d-flex align-items-center" src="{{ asset('assets/img/DPKKA_T.png') }}" alt="">
          </div>
          
          <div class="col-lg-5 col-md-12 footer-info text-center">
            <h5>Direktorat Pengembangan Karir, Inkubasi Kewirausahaan, dan Alumni (DPKKA)</h5>
            <div class="social-links mt-3">
              <a href="https://twitter.com/dpkka_unair" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="https://www.facebook.com/ppkk.unair/" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/dpkka_unair/" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="https://www.linkedin.com/company/ppkkha" class="linkedin"><i class="bi bi-linkedin"></i></a>
              <a href="https://www.youtube.com/channel/UCCK1gd6ZMWf0C0N62h7JSFw" class="youtube"><i class="bi bi-youtube"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              Airlangga Convention Center, <br>
              Jalan Dr. Ir. Soekarno<br>
              Surabaya 60115 <br><br>
              <strong>Phone:</strong> (+62)85746813431<br>
              <strong>Fax:</strong> (031) 59 555 81<br>
              <strong>Email:</strong> admin@dpkka.unair.ac.id<br>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>FlexStart</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Scroll Top -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  
  
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
  
  <!-- Main JS File -->
  <script src="{{ asset('assets/js/front/main.js') }}"></script>

  {{-- <script>
    onload = function() {
      $(document).ready(function(){
        $.ajax({
          url: '/counter/{{ $aocf->id }}',
          type: 'GET',
          success: function(data){
            
            $("#peserta").attr("data-purecounter-end", data.user);
            $("#peserta").text(data.user)
          }
        });
      });
    }

    $('#counter').on('click', function() {
      setTimeout(() => {
        fetch('/counter/{{ $aocf->id }}')
        .then(response => response.json())
        .then(data => {
          $("#peserta").attr("data-purecounter-end", data.user);
          $("#peserta").text(data.user)
        })
      }, 2000);
    });
  </script> --}}

</body>

</html>