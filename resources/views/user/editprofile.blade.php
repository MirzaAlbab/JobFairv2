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
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
           @if(Auth::user()->photo)
            <img src=" {{ asset('storage/'.Auth::user()->photo) }} " alt="Profile" class="rounded-circle">
            @else
            <img src=" {{ asset('assets/img/profile-img.jpg') }} " alt="Profile" class="rounded-circle">
            @endif
            <h2>{{ Auth::user()->name }}</h2>
          
           
            <div class="social-links mt-2">
              <a href="{{ Auth::user()->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="{{ Auth::user()->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
             
              @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Update failed</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              {{-- detect errps with message bag --}}

              @if ($errors->hasBag('updatePassword'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Change password failed</strong>
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
                <h5 class="card-title">Deskripsi Diri</h5>
                <p class="small fst-italic">{{ Auth::user()->about }}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                </div>
                
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">No. Telepon</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->phone }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                </div>

                @if(Auth::user()->city != 'Lainnya')
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Kota</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->city }}</div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                </div>
                @endif

                @if(Auth::user()->education != 'Lainnya' && Auth::user()->faculty != 'Lainnya' && Auth::user()->major != 'Lainnya')
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Pendidikan</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->education }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Fakultas</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->Faculty->name }}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jurusan</div>
                  <div class="col-lg-9 col-md-8">{{ Auth::user()->Major->name }}</div>
                 
                </div>
                @endif

                

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form enctype="multipart/form-data" method="post" action="{{ route('profile.update') }}">
                  @csrf
                  @method('patch')
                  <div class="row mb-3">
                    <input type="text" name="id" id="id" hidden value="{{ Auth::user()->id }}">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto Profil</label>
                    <div class="col-md-8 col-lg-9">
                      @if(Auth::user()->photo)
                      <img src="{{ asset('storage/'.Auth::user()->photo) }}" alt="Profile" class="img-preview">
                      @else
                      <img src="{{ asset('assets/img/profile-img.jpg') }}" alt="Profile" class="img-preview">
                      @endif
                      <div class="pt-2">
                        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="photo" onchange="previewImage()" hidden>
                        <a href="#" id="upload_image" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                        <a href="#" class="btn btn-danger btn-sm" id="delete_profile" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="name" type="text" class="form-control" id="fullName" value="{{ Auth::user()->name }}" required>
                      @error('name')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Deskripsi Diri</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="about" class="form-control" id="about" style="height: 100px" required>{{ Auth::user()->about }}</textarea>
                      @error('about')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                 

                  <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-lg-3 col-form-label">No. Telepon</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="phone" value="{{ Auth::user()->phone }}" required>
                      @error('phone')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                 

                  
                  <div class="row mb-3">
                    <label for="province" class="col-md-4 col-lg-3 col-form-label">Provinsi</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" id="province" name="province" required>
                        <option id="province" value="" selected>Pilih salah satu</option>
                      </select>
                      @error('province')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                     
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="city" class="col-md-4 col-lg-3 col-form-label">Kota/Kab</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" id="city" name="city" disabled required>
                       
                        <option id="city"></option>
                      </select>
                      @error('city')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                     
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="address" type="text" class="form-control" id="address" value="{{ Auth::user()->address }}" required>
                      @error('address')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="pendidikan" class="col-md-4 col-lg-3 col-form-label">Tingkat Pendidikan</label>
                    <div class="col-md-8 col-lg-9">
                      <select class="form-select" aria-label="Default select example" id="pendidikan" name="education" required>
                        <option value="" selected>Pilih salah satu</option>
                        <option value="SMA/SMK" {{ Auth::user()->education == "SMA/SMK" ? 'selected' :'' }}>SMA/SMK</option>
                        <option value="D3"{{ Auth::user()->education == "D3" ? 'selected' :'' }}>D3</option>
                        <option value="D4"{{ Auth::user()->education == "D4" ? 'selected' :'' }}>D4</option>
                        <option value="S1"{{ Auth::user()->education == "S1" ? 'selected' :'' }}>S1</option>
                        <option value="S2"{{ Auth::user()->education == "S2" ? 'selected' :'' }}>S2</option>
                        <option value="S3"{{ Auth::user()->education == "S3" ? 'selected' :'' }}>S3</option>
                      </select>
                      @error('education')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="faculty" class="col-md-4 col-lg-3 col-form-label">Fakultas</label>
                    <div class="col-md-8 col-lg-9">
                      
                      <select class="form-select" aria-label="Default select example" id="faculty" name="faculty" required>
                        <option selected value="">Pilih salah satu</option>
                       @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                      </select>
                      @error('faculty')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="major" class="col-md-4 col-lg-3 col-form-label">Jurusan</label>
                    <div class="col-md-8 col-lg-9">
                      
                      <select class="form-select" aria-label="Default select example" id="major" name="major" disabled required>
                      
                        <option id="major"></option>
                       
                      </select>
                      @error('major')
                      <p class="text-danger">{{ $message }}</p>
                      @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::user()->email }}" required>
                    </div>
                    @error('email')
                      <p class="text-danger">{{ $message }}</p>
                    @enderror
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
                   
                    <input class="form-control form-control-sm" id="formFileSm" type="file" name="cv" required>
                    @error('cv')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
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
      let provinces = data.map(province => {
        return `<option value="${province.id}">${province.name}</option>`
      })
      console.log(provinces)
      $('#province').append(provinces)
    })
  });
  // make script to fetch city after province selected
  $('#province').change(function (e) {
    let province_id = $(this).val()
    fetch(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${province_id}.json`)
    .then(res => res.json())
    .then(data => {
      
      let cities = data.map(city => {
        return `<option value="${city.name}">${city.name}</option>`
      })
      
      $('#city').removeAttr('disabled')
      $('#city').html('<option value="" selected>Pilih salah satu</option>')
      $('#city').append(cities)
    })
  });
  // make script to fetch major after faculty selected
  $('#faculty').change(function (e) {
    // take faculty id
    let faculty = $(this).val()
    // fetch with api request and parameter
    fetch(`{{ url('api/major') }}/${faculty}`)
    .then(res => res.json())
    .then(data => {
      // json decode
      data = Object.entries(data.major);
      // map data to html

      console.log(data)
      let majors = data.map(major => {
        return `<option value="${major[0]}">${major[1]}</option>`
      })
      
      console.log(majors)
      
      
      $('#major').removeAttr('disabled')
      $('#major').html('<option value="" selected>Pilih salah satu</option>')
      $('#major').append(majors)
    })
  });
</script>


@endsection
