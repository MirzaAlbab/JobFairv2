@extends('layout.company')

@section('title')
  <title>Company | DPKKA - Universitas Airlangga</title>
@endsection

@section('ChangePassword', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Password</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('company-area') }}">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Password</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      @if (session('status'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('status') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="row mb-3">
          <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
          <div class="col-md-8 col-lg-9">
            <input name="current_password" type="password" class="form-control" id="currentPassword" required>
            @error('current_password', 'updatePassword')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
 
          
        
         
        <div class="row mb-3">
          <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
          <div class="col-md-8 col-lg-9">
            <input name="password" type="password" class="form-control" id="password" required>
            @error('password', 'updatePassword')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
          <div class="col-md-8 col-lg-9">
            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" required>
            @error('password_confirmation', 'updatePassword')
            <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary">Change Password</button>
        </div>
      </form>
    </section>
  </main>
@endsection