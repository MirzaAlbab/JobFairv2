@extends('layout.user')

@section('title')
  <title>Job Application | DPKKA - Universitas Airlangga</title>
@endsection

@section('jobApplication', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Job Application</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Job Application</li>
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
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Job</th>
                    <th scope="col">Company</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jobs as $job)
                  <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td class="align-middle">{{ $job->job->title }}</td>
                    <td class="align-middle">{{ $job->company->company }}</td>
                    <td class="align-middle"><span class="badge rounded-pill bg-primary">{{ $job->status }}</span></td>
                   
                    
                     
                    </td>
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