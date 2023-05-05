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

              @if($cv->cv == null || $cv->cv == '')
                <p class="card-text">You haven't uploaded your CV yet.</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Upload CV</a>
              @else
              
            
            {{-- update cv --}}
           
            
              <iframe id="pdf-js-viewer"
              src="{{ asset('storage/'.$cv->cv) }}"
              width="800px"
              height="600px"
              style="border: none;"
            />
            </iframe>
            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <a href="{{ route('profile.edit') }}" class="btn btn-primary me-md-2" type="button">Update CV</a>
             
            </div>
            @endif
             
           
              
            </div>
          </div>
        </div>
      </div>
    </section>
      
    
      
  </main>
  
@endsection