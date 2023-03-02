@extends('layout.admin')

@section('title')
  <title>View Job | DPKKA - Universitas Airlangga</title>
@endsection

@section('job', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Partner</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('job') }}">Partner</a></li>
          <li class="breadcrumb-item active">View Job</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $job->position }}</h5>
          {{-- <div class="text-center">
            <img class="img-fluid mb-3" src="{{ asset('laravel/storage/app/'. $job->img) }}" alt="...">
          </div> --}}
          <div class="card-text">
            <p>{!! $job->level !!}</p>
            <p>{!! $job->kategori !!}</p>
            <p>Rp. {!! $job->gaji !!} Juta</p>
            <p>{!! $job->requirement !!}</p>
            <p>{!! $job->deskripsi !!}</p>
            <p>{!! $job->penempatan !!}</p>
            <p>{!! $job->Jobsin->company !!}</p>
          </div>

          <div class="text-center">
            <a href="{{ route('job') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection