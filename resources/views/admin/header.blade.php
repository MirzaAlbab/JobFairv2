<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/DPKKA-logo.png') }}" alt="">
      <span class="d-none d-lg-block">ACF</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
        </a><!-- End Profile Name Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li>
              <a class="dropdown-item d-flex align-items-center" 
                 href="{{ route('profile.edit') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Profile</span>
              </a>
           
          </li>
          <li>
            <form action="{{ route('logout') }}" method="post">
              @csrf
              <button class="dropdown-item d-flex align-items-center" type="submit">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </button>
            </form>
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->

</header>