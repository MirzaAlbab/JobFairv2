@extends('layout.company')

@section('title')
  <title>View Notification | DPKKA - Universitas Airlangga</title>
@endsection

@section('notification', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Partner</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('company-job-notification') }}">Notification</a></li>
          <li class="breadcrumb-item active">View Notification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $notif->title }}</h5>
         
          <div class="card-text">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col"></th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                 
                  
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Pesan</th>
                  <td>{{ $notif->message }}</td>

                </tr>
                <tr>
                  <th scope="row">Status</th>                
                  <td>{{ $notif->status }}</td>
                </tr>
                <tr>
                  <th scope="row">Penerima</th>                
                  <td>{{ $notif->user }}</td>
                </tr>
              </tbody>
            </table>
            
          </div>

          <div class="text-center">
            <a href="{{ route('company-job-notification') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection