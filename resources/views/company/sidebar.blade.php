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
        <a class="nav-link @yield('jobApplication', 'collapsed')" href="{{ route('company-job-application') }}">
          <i class="bi bi-card-list"></i>
          <span>Lamaran</span>
        </a>
      </li><!-- End Rundown Page Nav -->
      
    </li>
    @can('company')
    <li class="nav-heading">Jobs</li>
      <li class="nav-item">
        <a class="nav-link @yield('jobs', 'collapsed')" href="{{ route('company-job') }}">
          <i class="bi bi-ui-checks-grid"></i>
          <span>Jobs</span>
        </a>
      </li>
    </li>
    @endcan

    {{-- <li class="nav-heading">Profile</li>
      <li class="nav-item">
        <a class="nav-link @yield('profile', 'collapsed')" href="{{ route('profile.edit') }}">
          <i class="bi bi-ui-checks-grid"></i>
          <span>Profile</span>
        </a>
      </li>
    </li> --}}
     
    
   
  </ul>
</aside>