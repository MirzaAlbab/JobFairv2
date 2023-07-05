@extends('layout.company')

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
          <li class="breadcrumb-item"><a href="{{ route('company-area') }}">Home</a></li>
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
             
             <div class="dropdown position-absolute top-0 end-0 export">
              <button class="btn btn-primary dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Export
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">Export CSV</a></li>
                <li><a href="#">Export Excel</a></li>
                <li><a href="#">Export PDF</a></li>
              </ul>
            </div>

              <!-- Table with stripped rows -->
              <table class="table display nowrap" id="tabel">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Job</th>
                   
                    <th scope="col">Action</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                 
                  @foreach ($jobapps as $job)
                  <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td class="align-middle">{{ $job->user->name }}</td>  
                    <td class="align-middle">{{ $job->job->title }}</td>
                   
                   
                    <td class="align-middle">                       
                      <a type="button" class="btn btn-primary btn-sm" id="view-modal" data-value="{{$job->user}}" data-bs-toggle="modal"  data-bs-target="#viewuserModal" title="View CV"><i class="bi bi-eye"></i></a>
                      <a href="{{ route('company-downloadcv',$job->user->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" title="Download CV"><i class="bi bi-download"></i></a>
                    </td>
                   
                    @if ($job->status == 'sent')
                    <td class="align-middle">
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle shadow-none" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          {{ $job->status }}
                        </button>
                        <ul class="dropdown-menu">
                          <form action="{{ route('company-proceed',$job->id) }}" method="POST">
                            @csrf
                            <li><button class="dropdown-item" type="submit">Proceed</button></li>
                          </form>
                        </ul>
                      </div>
                    </td>
                    @else
                      <td class="align-middle"><span class="badge rounded-pill bg-warning">{{ $job->status }}</span></td>  
                    
                    @endif
                   
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->
               <!-- Delete Modal -->
               <div class="modal fade" id="viewuserModal" tabindex="-1" >
                <div class="modal-dialog modal-lg modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">View CV</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                      <div class="row">
                        <iframe id="pdf-js-viewer"
                        src="" frameborder="0" width="800" height="500"></iframe>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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