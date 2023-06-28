<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link @yield('dashboard', 'collapsed')" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    
    <li class="nav-heading">Lamaran</li>
      <li class="nav-item">
        <a class="nav-link @yield('jobApplication', 'collapsed')" href="{{ route('jobApplication') }}">
          <i class="bi bi-card-list"></i>
          <span>Lamaran</span>
        </a>
      </li><!-- End Rundown Page Nav -->
    </li>
    
    <li class="nav-heading">Profile</li>
    <li class="nav-item">
      <a class="nav-link @yield('cv', 'collapsed')" href="{{ route('user-cv') }}">
        <i class="bi bi-question-circle"></i>
        <span>CV</span>
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link @yield('profile', 'collapsed')" href="{{ route('profile.edit') }}">
          <i class="bi bi-ui-checks-grid"></i>
          <span>Profile</span>
        </a>
      </li>
    </li>

    <li class="nav-heading">Presensi</li>
      <li class="nav-item">
        <a class="nav-link @yield('profile', 'collapsed')" href="{{ route('presensi') }}">
          <i class="bi bi-ui-checks-grid"></i>
          <span>Presensi</span>
        </a>
      </li>
    </li>
     
    
   
  </ul>
</aside>