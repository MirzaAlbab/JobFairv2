@extends('layout.admin')

@section('title')
  <title>View Partner | DPKKA - Universitas Airlangga</title>
@endsection

@section('partner', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Partner</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('partner') }}">Partner</a></li>
          <li class="breadcrumb-item active">View Partner</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $partner->company }}</h5>
          <div class="text-center">
            <img class="img-fluid mb-3" src="{{ asset('laravel/storage/app/'. $partner->img) }}" alt="...">
          </div>
          <div class="card-text">
            <p>{!! $partner->description !!}</p>
          </div>

          <div class="text-center">
            <a href="{{ route('partner') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection