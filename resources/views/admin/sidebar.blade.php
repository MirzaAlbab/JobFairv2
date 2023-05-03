<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link @yield('dashboard', 'collapsed')" href="{{ route('dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <!-- End Dashboard Nav -->
     
      <li class="nav-heading">Jobfair</li>
      <li class="nav-item">
        <a class="nav-link @yield('career-fair', 'collapsed')" href="{{ route('career') }}">
          <i class="bi bi-ui-checks-grid"></i>
          <span>Career Fair</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('jobs', 'collapsed')" href="{{ route('job') }}">
          <i class="bi bi-briefcase"></i>
          <span>Job</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('jobs', 'collapsed')" href="{{ route('job') }}">
          <i class="bi bi-people"></i>
          <span>Job Application</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('jobs', 'collapsed')" href="{{ route('job') }}">
          <i class="bi-clipboard-check"></i>
          <span>Presence</span>
        </a>
      </li>
      <!-- End Job Fair Nav -->
      

      <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link @yield('partner', 'collapsed')" href="{{ route('partner') }}">
          <i class="bi bi-building"></i>
          <span>Partner</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('event', 'collapsed')" href="{{ route('event') }}">
          <i class="bi bi bi-calendar3"></i>
          <span>Event</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('gallery', 'collapsed')" href="{{ route('gallery') }}">
          <i class="bi bi-images"></i>
          <span>Gallery</span>
        </a>
      </li>
      <!-- End Page Nav -->

      <li class="nav-heading">Landing Page</li>
      <li class="nav-item">
        <a class="nav-link @yield('rundown', 'collapsed')" href="{{ route('rundown') }}">
          <i class="bi bi-card-list"></i>
          <span>Rundown</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link @yield('faq', 'collapsed')" href="{{ route('faq') }}">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li>
      <!-- End Landing Page Nav -->
        
      <li class="nav-heading">Administrator</li>
        <li class="nav-item">
          <a class="nav-link @yield('user', 'collapsed')" href="{{ route('user') }}">
            <i class="bi bi-person"></i>
            <span>User</span>
          </a>
        </li>
        <!-- End User Page Nav -->
    
    </ul>
  </aside>