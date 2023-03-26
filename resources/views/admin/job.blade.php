@extends('layout.admin')

@section('title')
  <title>Job | DPKKA - Universitas Airlangga</title>
@endsection

@section('job', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Jobs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Job</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>{{ session('status') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              @endif
              <a href="{{ route('job-new') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true"><i class="bi bi-plus-lg"></i> New Job</a>

              <!-- Table with stripped rows -->
              <table class="table datatable display nowrap" id="tabel">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Perusahaan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jobs as $job)
                  <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td class="align-middle">{{ $job->title }}</td>
                    <td class="align-middle">{{ $job->Jobsin->company }}</td>
                    <td class="align-middle">{{ $job->category }}</td>
                   
                    <td class="align-middle">                       
                      <a href="{{ route('job-view',$job->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="View"><i class="bi bi-eye"></i></a>
                      <a href="{{ route('job-edit',$job->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" title="Edit"><i class="bi bi-pencil-square"></i></a>
                      <!-- Delete Modal -->
                      <a type="button" class="btn btn-danger btn-sm" id="delete-modal" data-value="{{$job->id}}" data-bs-toggle="modal"  data-bs-target="#deleteFormModal"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

              <!-- Delete Modal -->
              <div class="modal fade" id="deleteFormModal" tabindex="-1" >
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Job</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                      Are you sure you want to delete this Job?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('job-delete') }}" method="POST">
                        <input type="text" id="id" name="id" hidden>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" role="button" aria-pressed="true">Delete</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
             <!-- End Delete Modal-->
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
@endsection