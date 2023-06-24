@extends('layout.user')

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
                  <h5 class="card-title">Welcome back, {{ $user->name }}!</h5>
                </div>
              </div>
            </div><!-- End Welcoming -->

            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Lamaran</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-richtext"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{ $countlamaran }}</h6>
                      <span class="text-muted small pt-2 ps-1">Lamaran</span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Lamaran Card -->

            @if (auth()->user()->unreadNotifications)
            <li class="d-flex justify-content-end mx-1 my-2">
                <a href="{{route('read-notif')}}" class="btn btn-success btn-sm">Mark All as Read</a>
            </li>
            @endif

            @foreach (auth()->user()->unreadNotifications as $notification)
            <a href="#" class="text-success"><li class="p-1 text-success"> {{$notification->data['data']}}</li></a>
            @endforeach
            @foreach (auth()->user()->readNotifications as $notification)
            <a href="#" class="text-secondary"><li class="p-1 text-secondary"> {{$notification->data['data']}}</li></a>
            @endforeach


      </div>
    </section>
  </main>

@endsection