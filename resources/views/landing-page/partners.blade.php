@extends('layout.front')
@section('title', 'Partners')
@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li>Partners</li>
      </ol>
      <h2>Partners</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Company Section ======= -->
  <section id="partner" class="partner">
    <div class="container" data-aos="fade-up">
      <div class="row">
        @foreach ($partners as $partner)
        <div class="col-md-4">
          <article class="entry">
            <div class=" text-center">
              <img src="{{ asset('laravel/storage/app/'.$partner->img) }}" alt="" class=" entry-img img-fluid">
            </div>

            <h2 class="entry-title">
              <a href="{{ route('user-singlepartner', $partner->id) }}">{{ $partner->company }}</a>
            </h2>

            <div class="entry-meta">
              <ul>
               
                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>{{ $partner->updated_at->diffForHumans() }}</time></li>
              </ul>
            </div>

            <div class="entry-content">
              <p>
                {!! $partner->description !!}
              </p>
              <div class="read-more">
                <a href="{{ route('user-singlepartner', $partner->id) }}">Read More</a>
              </div>
            </div>

          </article>
          
          <!-- End company entry -->
          
          
        </div><!-- End company entries list -->
        @endforeach
        
        <div class="partner-pagination">
          <ul class="d-flex justify-content-center">
           
            {{ $partners->links() }}
          </ul>
        </div>
      </div>

    </div>
  </section>
  <!-- End Company Section -->

</main>
<!-- End #main -->
@endsection