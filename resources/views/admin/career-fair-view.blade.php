@extends('layout.admin')

@section('title')
  <title>View Career Fair | DPKKA - Universitas Airlangga</title>
@endsection

@section('career-fair', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Career Fair</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('career') }}">Career Fair</a></li>
          <li class="breadcrumb-item active">View Career Fair</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $careerfair->title }}</h5>
          <div class="text-center">
            <img class="img-fluid mb-3" src="{{ asset('laravel/storage/app/'. $careerfair->img) }}" alt="...">
          </div>
          <div class="card-text">
            <p>{!! $careerfair->description !!}</p>
          </div>
          <div class="text-center">
            <a href="{{ route('career') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection