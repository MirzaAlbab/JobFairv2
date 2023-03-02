@extends('layout.admin')

@section('title')
  <title>View Gallery | DPKKA - Universitas Airlangga</title>
@endsection

@section('rundown', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Gallery</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('gallery') }}">Gallery</a></li>
          <li class="breadcrumb-item active">View Gallery</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $gallery->title }}</h5>
          <img  src="{{ src="{{ asset('laravel/storage/app/'. $gallery->img) }} }}" class="img-fluid mb-3" alt="...">
          <div class="text-center">
            <a href="{{ route('gallery') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection