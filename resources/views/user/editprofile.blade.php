@extends('layout.user')

@section('title')
  <title>Profile | DPKKA - Universitas Airlangga</title>
@endsection

@section('Profile', '')

@section('main')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
           
            <img src=" {{ asset('laravel/storage/app/'.Auth::user()->photo) }} " alt="Profile" class="rounded-circle">
            <h2>{{ Auth::user()->name }}</h2>
          
           
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
             
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Edit CV</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">About</h5>
                <p class="small fst-italic">{{ Auth::user()->about }}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Tingkat Pendidikan</div>
                  <div class="col-lg-9 col-md-8">S1</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jurusan</div>
                  <div class="col-lg-9 col-md-8">Sistem Informasi</div>
                </div>

                

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}">
                  @csrf
                  @method('patch')
                  <div class="row mb-3">
                    <input type="text" name="id" id="id" hidden value="{{ Auth::user()->id }}">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="{{ asset('laravel/storage/app/'.Auth::user()->photo) }} || assets/img/profile-img.jpg" alt="Profile" class="img-preview">
                      <div class="pt-2">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="photo" onchange="previewImage()" hidden>
                        <a href="#" id="upload_image" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" id="delete_profile" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px">{{ Auth::user()->about }}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="address" value="{{ Auth::user()->address }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pendidikan" class="col-md-4 col-lg-3 col-form-label">Tingkat Pendidikan</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" id="pendidikan" name="education">
                        <option selected>Pilih salah satu</option>
                        <option value="SMA/SMK">SMA/SMK</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                      </select>
                     
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="provinsi" class="col-md-4 col-lg-3 col-form-label">Provinsi</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" id="province" name="province">
                        <option id="province" selected>Pilih salah satu</option>
                       
                        
                      </select>
                     
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="jurusan" class="col-md-4 col-lg-3 col-form-label">Jurusan</label>
                    <div class="col-md-8 col-lg-9">
                      
                      <select class="form-select" aria-label="Default select example" id="jurusan" name="major">
                        <option selected>Pilih salah satu</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Akutansi">Akutansi</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Mesin">S2</option>
                        <option value="Teknik Robotika">Teknik Robotika</option>
                      </select>
                    </div>
                  </div>

                

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram" value="{{ Auth::user()->instagram }}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="Linkedin" value="{{ Auth::user()->linkedin }}">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form enctype="multipart/form-data" method="post" action="{{ route('profile.cv') }}">
                  @csrf
                  @method('put')
                  <div class="mb-3">
                    <input type="text" name="id" id="id" hidden value="{{ Auth::user()->id }}">
                   
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="cv">
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form><!-- End settings Form -->

              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="post" action="{{ route('password.update') }}">
                  @csrf
                  @method('put')
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="current_password" type="password" class="form-control" id="currentPassword">
                      @error('current_password', 'updatePassword')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
           
                    
                  
                   
                  <div class="row mb-3">
                    <label for="password" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control" id="password">
                      @error('password', 'updatePassword')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
                      @error('password_confirmation', 'updatePassword')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
<script>
  $(document).ready(function (e) {
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json`)
    .then(res => res.json())
    .then(data => {
      console.log(data);
      let provinces = data.map(province => {
        return `<option value="${province.id}">${province.name}</option>`
      })
      console.log($('#province'))
      $('#province').append(provinces)
    })
  });
</script>


@endsection
