@extends('layout.admin')

@section('title')
  <title>Dashboard | DPKKA - Universitas Airlangga</title>
@endsection

@section('dashboard', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Welcoming -->
            <div class="col-12">
              <div class="card">
                <div class="card-body pb-0">
                  <h5 class="card-title">Welcome back, {{ Auth::user()->name }}!</h5>
                </div>
              </div>
            </div><!-- End Welcoming -->

            <!-- Perusahaan Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Perusahaan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-richtext"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $countpartner }}</h6>
                      <span class="text-muted small pt-2 ps-1">perusahaan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Perusahaan Card -->

            <!-- Webinar Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                  <h5 class="card-title">Webinar</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-headset"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $counterevent }}</h6>
                      <span class="text-muted small pt-2 ps-1">webinar</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Webinar Card -->

            <!-- Peserta Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Peserta</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="peserta">{{ $countuser }}</h6>
                      <span class="text-muted small pt-2 ps-1">peserta</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Peserta Card -->
            
            <!-- Job Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Pekerjaan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-briefcase"></i>
                    </div>
                    <div class="ps-3">
                      <h6 id="Job">{{ $countjob }}</h6>
                      <span class="text-muted small pt-2 ps-1">Pekerjaan</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Job Card -->
      </div>
    </section>
  </main>

  
@endsection