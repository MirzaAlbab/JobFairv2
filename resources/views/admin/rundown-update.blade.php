@extends('layout.admin')

@section('title')
  <title>Update Rundown | DPKKA - Universitas Airlangga</title>
@endsection

@section('rundown', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Rundown</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('rundown') }}" data-bs-toggle="modal" data-bs-target="#cancelFormModal">Rundown</a></li>
          <li class="breadcrumb-item active">Update Rundown</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Rundown</h5>
          <!-- General Form Elements -->
          <form action="{{ route('rundown-update', $rundown->id) }}" method="POST">
            @csrf
            <div class="row mb-3">
              <label for="start_date" class="col-sm-2 col-form-label">Time</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('hari_tanggal') is_invalid @enderror" id="start_date" value="{{ old('hari_tanggal', $rundown->time) }}" name="hari_tanggal" required>
                @error('hari_tanggal')
                  <p class="text-danger">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDescription" class="col-sm-2 col-form-label">Event</label>
              <div class="col-sm-10">
                <div>
                  <textarea class="form-control" id="editor" name="rincian" required>{!! old('rincian', $rundown->event) !!}</textarea>
                  @error('rincian')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>  
              </div>
            </div>

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">AOCF Period</label>
              <div class="col-sm-10">
                <select class="form-select search-select" aria-label="Default select example" name="periode" required>
                  <option value=""></option>
                  @foreach ($careers as $car)
                    <option value="{{ $car->id }}" {{$car->id == $rundown->careerfair_id  ? 'selected' : ''}}>{{ $car->title }}</option>
                  @endforeach
                  @error('periode')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </select>
              </div>
            </div>

            <fieldset class="row mb-3">
              <legend class="col-form-label col-sm-2 pt-0">Status</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios1" value="active" @if ($rundown->status == 'active') checked @endif>
                  <label class="form-check-label" for="gridRadios1">
                    Active
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="status" id="gridRadios2" value="inactive" @if ($rundown->status == 'inactive') checked @endif>
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