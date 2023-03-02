@extends('layout.admin')

@section('title')
  <title>View Rundown | DPKKA - Universitas Airlangga</title>
@endsection

@section('rundown', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Rundown</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('rundown') }}">Rundown</a></li>
          <li class="breadcrumb-item active">View Rundown</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="accordion-item m-3">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                {{ $rundown->time }}
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">{!! $rundown->event !!}</div>
            </div>
          </div>
          <div class="text-center">
            <a href="{{ route('rundown') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection