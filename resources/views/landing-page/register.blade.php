@extends('layout.front')
@section('title', 'Register')
@section('container')
    
  <!-- ======= Big Clients Section ======= -->
  <section id="clients" class="clients bg-white mt-5">
    <div class="container" data-aos="fade-up">
      <header class="section-header">
        <p>Sponsors</p>
      </header>
      <div class="clients-slider2 swiper">
        <div class="swiper-wrapper align-items-center" >
          @foreach ($partners as $sponsor)
        <div class="swiper-slide d-flex align-items-center justify-content-center"><a href="{{ route('user-singlepartner', $sponsor->id) }}" target="_blank"><img src="{{ $sponsor->img }}" class="img-fluid" alt=""></a></div>
        {{-- <div class="swiper-slide d-flex align-items-center justify-content-center"><img src="assets/img/dummy.png" class="img-fluid" alt=""></div>
         --}}
        @endforeach
        </div>
      </div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>
    </div>
  </section>
  <!-- End Big Clients Section -->
  <div class="container">
    <!-- Jobseeker Employer Tabs -->
  <div class="card">
    <div class="card-body">
      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Jobseeker</button>
        </li>
        <li class="nav-item flex-fill" role="presentation">
          <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Employer</button>
        </li>
      </ul>
      <div class="tab-content pt-4" id="borderedTabJustifiedContent">
        <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
          <h3>
            <strong>Alur Pelaksanaan Airlangga Online Career Fair</strong>
          </h3>
          <ol>
            <li>
              Silakan login melalui website DPKKA atau klik <a href="https://dpkka.unair.ac.id/site/login" target="_blank">Login disini</a> 
            </li>
            <li>
              Lengkapi CV dan data diri anda yang ada pada website DPKKA
            </li>
            <li>
              Temukan lowongan kerja pada menu "Informasi Karir -> Lowongan", kemudian klik "LAMAR" pada lowongan yang kamu inginkan/sesuai dengan kondisi kamu
            </li>
            <li>
              Jika anda belum memiliki akun untuk login, ikuti langkah dibawah ini
            </li>
          </ol>
          <!-- Default Accordion -->
          <div class="accordion accordion-flush">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                  <strong>Bagaimana mendapatkan member DPKKA? </strong>
                </button>
              </h2>
              <div id="faq-content-1" class="accordion-collapse" data-bs-parent="#faqlist1">
                <div class="accordion-body">
                  <ol>
                    <li>
                      Mendaftar pada menu "Daftar Sekarang" di website DPKKA atau klik <a href="#">Daftar</a> 
                    </li>
                    <li>
                      Silahkan Anda mengisi form registrasi, dengan memilih tipe keanggotaan sebagai “Member Jobseeker Lifetime Alumni” atau “Member Jobseeker Lifetime Non Alumni”
                    </li>
                    <li>
                      Jika NIM Anda belum terdaftar silahkan mengisi form berikut bit.ly/RegistrasiNIMAlumni.
                    </li>
                    <li>
                      Setelah melakukan registrasi, web akan menampilkan halaman data diri Anda. Lengkapi data diri Anda yang nantinya digunakan sebagai CV Anda
                    </li>
                    <li>
                      Anda akan mendapatkan pesan melalui email yang sudah didaftarkan (cek spam bila tidak ada di kontak masuk)
                    </li>
                    <li>
                      Selamat registrasi Anda telah berhasil.
                    </li>
                  </ol>
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="tab-pane fade" id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
          <h3>
            <strong>Pendaftaran Perusahaan Peserta AOCF</strong>
          </h3>
          <p>Untuk memperoleh informasi tentang pendaftaran Airlangga Online Career Fair Universitas Airlangga dapat menghubungi :</p>
          <ul>
            <li>
              AE DPKKA :
              <p>
                - 085746813431 (ROSA)
                <br>
                - 088235565721 (DWI)
              </p>
            </li>
            <li>
              E-mail DPKKA :
              <br>
              <a href="mailto:admin@dpkka.unair.ac.id" target="_blank">admin@dpkka.unair.ac.id</a>
            </li>
          </ul>
        </div>
      </div>
      
      </div>
    </div>
  </div>
  <!-- End Jobseeker Employer Tabs -->

  </div>
  

  <!-- ======= Clients Section ======= -->
  <section id="clients" class="clients">
  
    <div class="container" data-aos="fade-up">
  
      <header class="section-header">
        <p>Partisipan AOCF</p>
      </header>
  
      <div class="clients-slider swiper">
        <div class="swiper-wrapper align-items-center mb-5">
          @foreach ($participant as $partici)
          <div class="swiper-slide"><a href="{{ route('user-singlepartner', $partici->id) }}" target="_blank"><img src="{{ $partici->img }}" class="img-fluid" alt=""></a></div>
        
         @endforeach
          
          
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  
  </section>
  <!-- End Clients Section -->
@endsection