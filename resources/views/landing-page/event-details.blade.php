@extends('layout.front')
@section('title','Details')
@section('container')
<main id="main">

  <!-- ======= Breadcrumbs ======= -->
  <section class="breadcrumbs">
    <div class="container">

      <ol>
        <li><a href="{{ route('user-landing') }}">Home</a></li>
        <li><a href="{{ route('user-events') }}">Events</a></li>
        <li>Event Details</li>
      </ol>
      <h2>Event Details</h2>

    </div>
  </section>
  <!-- End Breadcrumbs -->

  <!-- ======= Event Details Section ======= -->
  <section id="event-details" class="event-details">
    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-8">
          <div class="event-details-slider swiper">
            <div class="swiper-wrapper align-items-center">

              <div class="swiper-slide">
                <img src="{{ asset('storage/'.$event->img) }}" alt="">
              </div>

            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="event-info">
            <h3>Event information</h3>
            <ul>
              <li><strong>Kategori</strong>: Webinar</li>
              <li><strong>Judul</strong>: {{ $event->title }}</li>
              <li><strong>Waktu</strong>: {{ $event->time }}</li>
              <li><a class="getstarted" href="{{ $event->link }}">Daftar</a></li>
            </ul>
          </div>
          <div class="event-description">
            <h2>Event description</h2>
            {!! $event->description !!}   
          </div>
        </div>

      </div>

    </div>
  </section>
  <!-- Event Details Section -->

</main><!-- End #main -->
@endsection
