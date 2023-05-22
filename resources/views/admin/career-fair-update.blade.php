@extends('layout.admin')

@section('title')
  <title>Update Career Fair | DPKKA - Universitas Airlangga</title>
@endsection

@section('career-fair', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Career Fair</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('career') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Career Fair</a></li>
          <li class="breadcrumb-item active">Update Career Fair</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Career Fair</h5>          
          
          <!-- General Form Elements -->
          <form action="{{ route('career-fair-update', $careerfair->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <label for="judul" class="col-sm-2 col-form-label">Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $careerfair->title) }}" required>
                @error('judul')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="deskripsi" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control" id="editor" name="deskripsi" required>{!! old('deskripsi', $careerfair->description) !!}</textarea>
                  @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>  
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="inputStartDate" class="col-sm-2 col-form-label">Start Date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('tglmulai') is-invalid @enderror" id="start_date" name="tglmulai" value="{{ old('tglmulai', $careerfair->start_date) }}" required>
                @error('tglmulai')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEndDate" class="col-sm-2 col-form-label">End Date</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('tglselesai') is-invalid @enderror" id="end_date" name="tglselesai" value="{{ old('tglselesai', $careerfair->end_date) }}" required>
                @error('tglselesai')
                  {{ $message }}
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label mt-3">Upload Poster</label>
              <div class="col-sm-10">
              @if ($careerfair->img)
                <img src="{{ asset('storage/'. $careerfair->img) }}" class="img-preview img-fluid mb-3 col-sm-5">
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
                  <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active" @if ($careerfair->status == 'active') checked @endif>
                  <label class="form-check-label" for="gridRadios1">Active</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive" @if ($careerfair->status == 'inactive') checked @endif>
                  <label class="form-check-label" for="gridRadios2">Inactive</label>
                </div>
              </div>
            </fieldset>
    
            <div class="row mb-3">
              <div class="col-sm-2">
                <!-- Vertically centered Modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Cancel</button>
                <div class="modal fade" id="cancelFormModal" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Discard Changes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">Are you sure you want to discard all your changes?</div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a href="{{ route('career') }}" class="btn btn-danger" role="button" aria-pressed="true">Discard</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Vertically centered Modal-->
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