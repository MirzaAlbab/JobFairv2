<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link @yield('dashboard', 'collapsed')" href="{{ route('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

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
    
    <li class="nav-heading">Lamaran</li>
      <li class="nav-item">
        <a class="nav-link @yield('jobApplication', 'collapsed')" href="{{ route('company-job-application') }}">
          <i class="bi bi-card-list"></i>
          <span>Lamaran</span>
        </a>
      </li><!-- End Rundown Page Nav -->
    
    </li>

    <li class="nav-heading">Notification</li>
      <li class="nav-item">
        <a class="nav-link @yield('notification', 'collapsed')" href="{{ route('company-job-notification') }}">
          <i class="bi bi-card-list"></i>
          <span>Notification</span>
        </a>
      </li><!-- End Rundown Page Nav -->
    
    </li>

    <li class="nav-heading">QR Code</li>
      <li class="nav-item">
        <a class="nav-link @yield('qr', 'collapsed')" href="{{ route('companyqrcode', Auth::user()->address) }}">
          <i class="bi bi-qr-code"></i>
          <span>QR Code</span>
        </a>
      </li>
    </li>
    <li class="nav-heading">Password</li>
      <li class="nav-item">
        <a class="nav-link @yield('ChangePassword', 'collapsed')" href="{{ route('companypassword') }}">
          <i class="bi bi-key"></i>
          <span>Password</span>
        </a>
      </li>
    </li>
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