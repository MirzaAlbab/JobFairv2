@extends('layout.admin')

@section('title')
  <title>View User | DPKKA - Universitas Airlangga</title>
@endsection

@section('user', '')

@section('main')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>User</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item"><a href="{{ route('user') }}">User</a></li>
          <li class="breadcrumb-item active">View User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View User</h5>
          <!-- General Form Elements -->
          <form action="#" method="">
            @csrf
            <div class="row mb-3">
              <label for="inputText" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
              </div>
            </div>

            <div class="row mb-3">
              <label for="user_role" class="col-sm-2 col-form-label">User Role</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="user_role" name="role" value="{{ $user->role }}" disabled>
              </div>
            </div>

            <div class="row mb-3">
              <label for="user_role" class="col-sm-2 col-form-label">Status</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="status" name="role" value="{{ $user->status }}" disabled>
              </div>
            </div>
          </form><!-- End General Form Elements -->

          <div class="text-center">
            <a href="{{ route('user') }}" class="btn btn-primary" role="button" aria-pressed="true">Back</a>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection