@extends('layout.front')
@section('title', 'Event')

@section('container')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">

    <ol>
      <li><a href="{{ route('user-landing') }}">Home</a></li>
      <li>Events</li>
    </ol>
    <h2>Events</h2>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= Event Section ======= -->
<section class="light">
	<div class="container">
		@if (count($events) > 0)
		@foreach ($events as $event)
		<article class="postcard light blue">
			<a class="postcard__img_link">
				<img class="postcard__img rounded"  src="{{ asset('laravel/storage/app/'.$event->img) }}" alt="" />
			</a>
			<div class="postcard__text t-dark" >
				<h1 class="postcard__title blue"><a href="{{ route('user-event-detail', $event->id) }}">{{ $event->title }}</a> </h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i> {{ $event->time }}
					</time>
				</div>
				<div class="postcard__bar"></div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="fas fa-tag ml-2"></i> Webinar </li>
					<li class="tag__item"><i class="fas fa-map-marker-alt ml-2"></i>{{ $event->location }}</li>
					
				</ul>
        <a class="btn btn-primary d-flex align-self-start mt-3 text-white" href="{{ route('user-event-detail', $event->id) }}" role="button">Details</a>
			</div>
		</article>
		@endforeach
		
		<div class="partner-pagination">
			<ul class="d-flex justify-content-center">
			 
				{{ $events->links() }}
			</ul>
		</div>
		@else
        <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="{{ asset('assets/img/comingsoonnnn.png') }}" class="img-fluid" alt=""></div>
		@endif
	</div>
</section>
<!-- ======= Event Section ======= -->

    
@endsection