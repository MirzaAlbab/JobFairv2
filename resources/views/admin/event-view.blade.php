@extends('layout.admin')

@section('title')
  <title>View Event | DPKKA - Universitas Airlangga</title>
@endsection

@section('event', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Event</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('event') }}">Event</a></li>
          <li class="breadcrumb-item active">View Event</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="container">
            <div class="row gy-4 m-3">
              <div class="col-lg-6">
                <div class="">
                  <div class=" align-items-center">
                    <div class="">
                      <img class="img-fluid" src="{{ asset('storage/'. $event->img) }}" alt="">
                    </div>
                  </div>
                </div>
              </div>
      
              <div class="col-lg-6">
                <div class="event-info">
                  <h3>Event information</h3>
                  <ul>
                    <li><strong>Name</strong>: {{ $event->title }}</li>
                    <li><strong>Event date</strong>: {{ $event->time }}</li>
                    <li><strong>Meeting URL</strong>: <a href="{{ $event->link }}">{{ $event->link }}</a></li>
                  </ul>
                </div>

                <div class="event-description">
                  <h2>Event description</h2>
                  {!! $event->description !!}
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <a href="{{ route('event') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection