@extends('layout.front')
@section('title', 'Teams')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{ route('user-landing') }}">Home</a></li>
      <li>Teams</li>
    </ol>
    <h2>Teams</h2>

  </div>
</section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Team</h2>
          <p>Our hard working team</p>
        </header>

        <div class="row gy-4 justify-content-center">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/prof-ellly.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href="https://www.linkedin.com/in/elly-munadziroh-179285135/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Prof. Dr. Elly Munadziroh, drg., M.S.</h4>
                <span>Product Owner</span>
                
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <div class="member-img">
                <img src="assets/img/pak-endi.jpg" class="img-fluid" alt="">
                <div class="social">
                  
                  <a href="https://www.linkedin.com/in/lastiko-endi-r/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Lastiko Endi Rahmantyo</h4>
                <span>Product Owner</span>
                
              </div>
            </div>
          </div>

          

        </div>

      </div>

    </section><!-- End Team Section -->

    
@endsection