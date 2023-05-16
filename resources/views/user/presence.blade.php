@extends('layout.user')

@section('title')
  <title>Presensi | DPKKA - Universitas Airlangga</title>
@endsection

@section('Presensi', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Presensi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Presensi</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Presensi</h5>
              
              @if($status->isEmpty())
              <div id="reader"></div>
              @else
              <p>Anda sudah melakukan presensi pada {{ $status[0]->created_at->format('H:i:s') }} WIB</p>
              @endif

            </div>
          </div>
        </div>
      </div>
    </section>
     <!-- Success HTML -->
     <div id="mysuccessModal" class="modal fade align-content-center">
      <div class="modal-dialog modal-confirm">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="icon-box">
              <i class="bi bi-check-circle" style="font-size: 5rem; color: green; text-align:center; "  ></i>
            </div>
            
          </div>
          <div class="modal-body text-center">
            <h4>Berhasil!</h4>	
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">OK</button>
            
           
          </div>
        </div>
      </div>
    </div>     
    
    <!-- Fail HTML -->
    <div id="myfailModal" class="modal fade align-content-center">
      <div class="modal-dialog modal-confirm">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="icon-box">
              <i class="bi bi-x-circle" style="font-size: 5rem; color: red; text-align:center; "  ></i>
            </div>
            
          </div>
          <div class="modal-body text-center">
            <h4>Gagal!</h4>
            <p>Halaman akan refresh otomatis setelah 3 detik.</p>
            <p>Silahkan scan ulang</p>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">OK</button>
          
          </div>
        </div>
      </div>
    </div>    
  </main>
  <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
@endsection