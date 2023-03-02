@extends('layout.front')
@section('title', 'About')

@section('container')
  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li>About</li>
      </ol>
      <h2>About</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Big Clients Section ======= -->
  <section id="clients" class="clients bg-white">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Sponsors</p>
      </header>
      <div class="clients-slider2 swiper">
        <div class="swiper-wrapper align-items-center"  >
          @if (count($partners) > 0)
            
          @foreach ($partners as $sponsor)
          <div class="swiper-slide d-flex align-items-center justify-content-center"><a href="{{ route('user-singlepartner', $sponsor->id) }}" target="_blank"><img src="{{ asset('laravel/storage/app/'.$sponsor->img) }}" class="img-fluid" alt=""></a></div>
          {{-- <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="assets/img/dummy.png" class="img-fluid" alt=""></div>
           --}}
          @endforeach
          @else
          <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="{{ asset('assets/img/dummy.png') }}" class="img-fluid" alt=""></div>
          <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="{{ asset('assets/img/dummy.png') }}" class="img-fluid" alt=""></div>
          @endif
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>
  <!-- End Big Clients Section -->

    <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Airlangga Online Career Fair</p>
      </header>

      <div class="row justify-content-center">
        <div class="col-lg-10" data-aos="zoom-out" data-aos-delay="200">
          <img src="{{ asset('laravel/storage/app/'.$aocf->img) }}" class="img-fluid" alt="">
        </div>
      </div>

      <div class="row gx-0">
        <div class="col-lg-12 d-flex align-items-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content">
            {!! $aocf->description !!}
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- End About Section -->

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
  
    <div class="container" data-aos="fade-up">
  
      <header class="section-header">
        <p>Partisipan AOCF</p>
      </header>
  
      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center justify-content-center mb-5">
          @if (count($participant) > 0)
          @foreach ($participant as $partici)
          <div class="swiper-slide"><a href="{{ route('user-singlepartner', $partici->id) }}" target="_blank"><img src="{{ asset('laravel/storage/app/'.$partici->img) }}" class="img-fluid" alt=""></a></div>
          @endforeach
          @else
          <div class="swiper-slide"><a href="#"><img src="{{ asset('assets/img/dummy.png') }}" class="img-fluid" alt=""></a></div>
          @endif
          
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  
  </section>
  <!-- End Clients Section -->
@endsection