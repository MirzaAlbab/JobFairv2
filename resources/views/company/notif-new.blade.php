@extends('layout.company')

@section('title')
  <title>New Notification | DPKKA - Universitas Airlangga</title>
@endsection

@section('notification', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Notification</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('company-job-notification') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Notification</a></li>
          <li class="breadcrumb-item active">New Notification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Notification</h5>
          <!-- General Form Elements -->
          <form action="{{ route('company-notification-store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">Judul Notifikasi</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
           
            <div class="row mb-3">
              <label for="message" class="col-sm-2 col-form-label">Pesan</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control" id="editor" name="message">{{ old('message') }}</textarea>
                  @error('message')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>  
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Penerima Notifikasi</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="user">
                  <option value="">Pilih salah satu</option>
                  <option value="Proceed">Proceed Application</option>
                </select>
                @error('user')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            

            <div class="row mb-3">
              <div class="col-sm-2">
                <!-- Vertically centered Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelFormModal">
                  Cancel
                </button>
                <div class="modal fade" id="cancelFormModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Discard Changes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        Are you sure you want to discard all your changes?
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ route('company-job-notification') }}" class="btn btn-danger" role="button" aria-pressed="true">Discard</a>
                      </div>
                    </div>
                  </div>
                </div><!-- End Vertically centered Modal-->
              </div>

              <div class="col-sm-10 text-end">
                <button type="reset" class="btn btn-secondary">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form><!-- End General Form Elements -->
        </div>
      </div>
    </section>
  </main>   
@endsection