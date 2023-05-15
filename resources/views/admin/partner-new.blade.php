@extends('layout.admin')

@section('title')
  <title>New Partner | DPKKA - Universitas Airlangga</title>
@endsection

@section('partner', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Partner</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('partner') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Partner</a></li>
          <li class="breadcrumb-item active">New Partner</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Partner</h5>
          <!-- General Form Elements -->
          <form action="{{ route('partner-store') }}" method="POST" enctype="multipart/form-data" id="formnew">
            @csrf
            <div class="row mb-3">
              <label for="nama" class="col-sm-2 col-form-label">Partner Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}">
                @error('nama')
                  <div class="invalid-feedback">
                  {{ $message }}
                  </div>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control" id="editor" name="deskripsi">{{ old('deskripsi') }}</textarea>
                  @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>
            </div>

            
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">AOCF Period</label>
              <div class="col-sm-10">
                <select class="form-select search-select" aria-label="Default select example" name="periode">
                  <option value=""></option>
                  @foreach ($careers as $car)
                    <option value="{{ $car->id }}">{{ $car->title }}</option>
                  @endforeach
                </select>
                @error('periode')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            
            <div class="row mb-3">
              <label for="image" class="col-sm-2 col-form-label mt-3">Partner Image</label>
              <div class="col-sm-10">
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                @error('image')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Partner Type</label>
              <div class="col-sm-10">
                <select class="form-select search-select" aria-label="Default select example" aria-placeholder="Open this select menu" name="jenis">
                  <option value="" selected>Select an option</option>
                  <option value="1">Platinum</option>
                  <option value="2">Gold</option>
                  <option value="3">Silver</option>
                  <option value="4">Bronze</option>
                  <option value="5">Participant</option>
                </select>
                @error('jenis')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check" >
                  <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Active
                  </label>
                </div>
                <div class="form-check" >
                  <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive">
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
                        <a href="{{ route('partner') }}" class="btn btn-danger" role="button" aria-pressed="true">Discard</a>
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