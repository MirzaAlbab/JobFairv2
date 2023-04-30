@extends('layout.company')

@section('title')
  <title>New Job | DPKKA - Universitas Airlangga</title>
@endsection

@section('jobs', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Jobs</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('company-job') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Job</a></li>
          <li class="breadcrumb-item active">New Job</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">New Job</h5>
          <!-- General Form Elements -->
          <form action="{{ route('company-job-store') }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
           
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jenis Pekerjaan</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="type">
                  <option value="">Pilih salah satu</option>
                  <option value="tech">Technology</option>
                  <option value="finance">Finance</option>
                </select>
                @error('type')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Pendidikan</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="education">
                  <option value="">Pilih salah satu</option>
                  <option value="SMA/SMK">SMA/SMK</option>
                  <option value="D3/D4">D3/D4</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
                @error('education')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="city" class="col-sm-2 col-form-label">Penempatan Pekerjaan</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="city" id="city" value="{{ old('city') }}">
                @error('city')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="start_date" class="col-sm-2 col-form-label">Tanggal Mulai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}">
                @error('start_date')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label for="end_date" class="col-sm-2 col-form-label">Tanggal Selesai</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @error('end_date')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control" id="editor" name="description">{{ old('description') }}</textarea>
                  @error('description')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>  
              </div>
            </div>

            
            <input type="hidden" name="partner_id" value="{{ Auth::user()->address }}">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Kategori Pekerjaan</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="category">
                  <option value="">Pilih salah satu</option>
                  <option value="full-time">full-time</option>
                  <option value="part-time">part-time</option>
                  <option value="intern">internship</option>
                </select>
                @error('category')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Rentang Gaji</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" name="salary">
                  <option value="">Pilih salah satu</option>
                  <option value="2-3">2-3 Juta</option>
                  <option value="3-5">3-5 Juta</option>
                  <option value="6-8">6-8 Juta</option>
                  <option value="8-10">8-10 Juta</option>
                </select>
                @error('salary')
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
                        <a href="{{ route('rundown') }}" class="btn btn-danger" role="button" aria-pressed="true">Discard</a>
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