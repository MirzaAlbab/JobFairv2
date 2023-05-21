@extends('layout.front')
@section('title', 'Gallery')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{ route('user-landing') }}">Home</a></li>
      <li>Gallery</li>
    </ol>
    <h2>Gallery</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Portfolio Section ======= -->
<section id="gallery" class="gallery">

  <div class="container" data-aos="fade-up">

    @if (count($gallery) > 0)
    <div class="row gy-4 gallery-container" data-aos="fade-up" data-aos-delay="200">
      @foreach ($gallery as $galle)
      <div class="col-lg-4 col-md-6 gallery-item filter-app">
        <div class="gallery-wrap">
          <img src="{{ asset('laravel/storage/app/'.$galle->img) }}" class="img-fluid" alt="">
          <div class="gallery-info">
            <div class="gallery-links">
              <a href="{{ asset('laravel/storage/app/'.$galle->img) }}" data-gallery="portfolioGallery" class="portfokio-lightbox"><i class="bi bi-plus"></i></a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
      {{ $gallery->links() }}
      
    </div>
    @else
    <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="{{ asset('assets/img/dummy.png') }}" class="img-fluid" alt=""></div>
    @endif

  </div>

</section><!-- End Portfolio Section -->

    
@endsection