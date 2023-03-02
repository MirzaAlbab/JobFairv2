@extends('layout.admin')

@section('title')
  <title>View FAQ | DPKKA - Universitas Airlangga</title>
@endsection

@section('faq', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>FAQ</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('faq') }}">FAQ</a></li>
          <li class="breadcrumb-item active">View FAQ</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <div class="accordion-item m-3">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                {{ $faq->question }}
              </button>
            </h2>
            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
              <div class="accordion-body">
                {!! $faq->answer !!}
              </div>
            </div>
          </div>
          <div class="text-center">
            <a href="{{ route('faq') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection