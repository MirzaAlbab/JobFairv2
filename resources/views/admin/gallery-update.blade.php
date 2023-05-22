@extends('layout.admin')

@section('title')
    <title>Update Gallery | DPKKA - Universitas Airlangga</title>
@endsection

@section('gallery', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Gallery</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('gallery') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Gallery</a></li>
          <li class="breadcrumb-item active">Update Gallery</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Gallery</h5>
          <!-- General Form Elements -->
          <form action="{{ route('gallery-update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul', $gallery->title) }}" required>
                @error('judul')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label mt-3">Gallery Image</label>
              <div class="col-sm-10">
                @if ($gallery->img)
                  <img src="{{ asset('storage/'. $gallery->img) }}" class="img-preview img-fluid mb-3 col-sm-5">
                @else
                  <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
              </div>
            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active" @if ($gallery->status == 'active') checked @endif>
                  <label class="form-check-label" for="gridRadios1">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive" @if ($gallery->status == 'inactive') checked @endif>
                  <label class="form-check-label" for="gridRadios2">
                    Inactive
                  </label>
                </div>
              </div>
            </fieldset>

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
                        <a href="{{ route('gallery') }}" class="btn btn-danger" role="button" aria-pressed="true">Discard</a>
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