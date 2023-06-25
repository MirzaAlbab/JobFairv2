@extends('layout.company')

@section('title')
  <title>Job Notification | DPKKA - Universitas Airlangga</title>
@endsection

@section('notification', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Notification</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('company-area') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Notification
          </li>
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
              <a href="{{ route('company-notification-new') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true"><i class="bi bi-plus-lg"></i> New Notification</a>

              <!-- Table with stripped rows -->
              <table class="table datatable display nowrap">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penerima</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($notif as $not)
                  <tr>
                    <th scope="row">{{ $loop->iteration }} </th>
                    <td class="align-middle">{{ $not->title }}</td>
                    <td class="align-middle">{{ $not->user }}</td>
                    <td class="align-middle">{{ $not->status }}</td>
                   
                    <td class="align-middle">                       
                      <a href="{{ route('company-notification-view',$not->id) }}" class="btn btn-primary btn-sm" role="button" aria-pressed="true" title="View"><i class="bi bi-eye"></i></a>
                      <a href="{{ route('company-notification-edit',$not->id) }}" class="btn btn-warning btn-sm" role="button" aria-pressed="true" title="Edit"><i class="bi bi-pencil-square"></i></a>
                      <!-- Send Modal -->
                      @if ($not->status == 'scheduled')
                      <a type="button" class="btn btn-info btn-sm" id="delete-modal" data-value="{{$not->id}}" data-bs-toggle="modal"  data-bs-target="#deleteFormModal"><i class="bi bi-send"></i></a>
                      @endif
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
                      <h5 class="modal-title">Send Notification</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                      Are you sure you want to sent this Notification?
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <form action="{{ route('company-notification-send') }}" method="POST">
                        <input type="text" id="id" name="id" hidden>
                        @csrf
                        <button type="submit" class="btn btn-info" role="button" aria-pressed="true">Send</button>
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