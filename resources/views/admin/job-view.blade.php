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
          <h5 class="card-title text-center">{{ $job->title }}</h5>
          {{-- <div class="text-center">
            <img class="img-fluid mb-3" src="{{ asset('laravel/storage/app/'. $job->img) }}" alt="...">
          </div> --}}
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
                  <th scope="row">Pendidikan</th>
                  <td>{!! $job->education !!}</td>

                </tr>
                <tr>
                  <th scope="row">Kategori</th>                
                  <td>{!! $job->category !!}</td>
                </tr>
                <tr>
                  <th scope="row">Gaji</th>                
                  <td>Rp. {!! $job->salary !!} Juta</td>
                </tr>
                <tr>
                  <th scope="row">Deskripsi</th>                
                  <td>{!! $job->description !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Mulai</th>                
                  <td>{!! $job->start_date !!}</td>
                </tr>
                <tr>
                  <th scope="row">Tanggal Selesai</th>                
                  <td>{!! $job->end_date !!}</td>
                </tr>
                <tr>
                  <th scope="row">Perusahaan</th>                
                  <td>{!! $job->Jobsin->company !!}</td>
                </tr>
                <tr>
                  <th scope="row">Kota</th>                
                  <td>{!! $job->city !!}</td>
                </tr>
              </tbody>
            </table>
            
          </div>

          <div class="text-center">
            <a href="{{ route('job') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection