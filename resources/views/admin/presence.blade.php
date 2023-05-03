@extends('layout.admin')

@section('title')
  <title>Presence | DPKKA - Universitas Airlangga</title>
@endsection

@section('Presence', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Presence</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Presence</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
             

              <!-- Table with stripped rows -->
              <table class="table datatable" id="tabel">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">User</th>
                    <th scope="col">Time</th>
                   
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($presence as $ps)
                  <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td class="align-middle">{{ $ps->user->name }}</td>  
                    <td class="align-middle">{{ $ps->created_at->format('H:i:s') }}</td>
                   
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection