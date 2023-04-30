@extends('layout.admin')

@section('title')
  <title>Career Fair | DPKKA - Universitas Airlangga</title>
@endsection

@section('career-fair', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Career Fair</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Career Fair</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
         <img src="{{ 'data:image/jpeg;base64,'.$img }}" alt="">
         <a href="data:image/png;base64, {!! base64_encode($img) !!} " download>Downloads</a>
         
        </div>
      </div>
    </section>
  </main>
@endsection