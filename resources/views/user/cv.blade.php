@extends('layout.user')

@section('title')
  <title>View CV | DPKKA - Universitas Airlangga</title>
@endsection

@section('View CV', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>View CV</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">View CV</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">CV</h5>

              @if($cv == null || $cv == '')
                <p class="card-text">You haven't uploaded your CV yet.</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Upload CV</a>
              @else

              <div class="row">
                <div class="col-md-12">
                  
                  <a class="btn btn-primary" href="/assets/vendor/pdfjs/web/viewer.html?file={{ $cv }}">Lihat CV</a>
                </div>

              </div>
             
              <iframe id="pdf-js-viewer"
               src="{{ $cvcoba }}" frameborder="0" width="600" height="500"></iframe>
              @endif
  
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  
  
@endsection