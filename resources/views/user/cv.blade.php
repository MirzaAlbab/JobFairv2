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
              
              {{-- <iframe id="pdf-js-viewer"
              src="{{ asset('assets/vendor/pdf/viewer/web/viewer.html?file=../../../../../storage/'.$cv->cv) }}"
              width="800px"
              height="600px"
              style="border: none;"
            /> --}}
              {{-- <iframe id="pdf-js-viewer"
              src="{{ asset('assets/vendor/pdf/viewer/web/viewer.html?file=http%3A%2F%2Fcareer_fair.test%2Fstorage%2Fpublic%2Fuploads%2Fcv%2FdE2l02Sl8jPjrbDf0lVKYJ84wobGZ5jucnM1ta2g.pdf') }}"
              width="800px"
              height="600px"
              style="border: none;"
            /> --}}
            <iframe id="pdf-js-viewer" src="{{ asset('assets/vendor/pdf/viewer/web/viewer.html?file=http%3A%2F%2Fcareer_fair.test%2Fstorage%2Fpublic%2Fuploads%2Fcv%2FdE2l02Sl8jPjrbDf0lVKYJ84wobGZ5jucnM1ta2g.pdf') }}" title="webviewer" frameborder="0" width="500" height="600"></iframe>
            http://career_fair.test/public/storage/public/uploads/cv/dE2l02Sl8jPjrbDf0lVKYJ84wobGZ5jucnM1ta2g.pdf
           
              
            </div>
          </div>
        </div>
      </div>
    </section>
      
    
      
  </main>
  
@endsection