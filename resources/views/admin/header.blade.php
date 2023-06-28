<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('user-landing') }}" class="logo d-flex align-items-center">
      <img src="{{ asset('assets/img/DPKKA-logo.png') }}" alt="">
      <span class="d-none d-lg-block">ACF</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
    
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown">
        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          @if (Auth::user()->unreadNotifications->count() > 0)
          <span class="badge bg-primary badge-number">{{ Auth::user()->unreadNotifications->count() }}</span> </a
        ><!-- End Notification Icon -->
        @endif

        <ul
          class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications"
        >
          <li class="dropdown-header">
            {{ Auth::user()->unreadNotifications->count() }} new notifications
            @if (Auth::user()->unreadNotifications->count() > 0)
            <a href="{{route('read-notif')}}"
              ><span class="badge rounded-pill bg-primary p-2 ms-2"
                >Mark as read</span
              ></a
            >
            @endif
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          
          @foreach (auth()->user()->unreadNotifications as $notification)
          
          <li class="notification-item">
            <i class="bi bi-info-circle text-primary"></i>
            <div>
              <h4>{{$notification->data['title']}}</h4>
              <p>{!!$notification->data['data']!!}</p>
              <p>{{$notification->created_at->diffForHumans()}}</p>
            </div>
          </li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          @endforeach

          <li class="dropdown-footer">
            <a type="button" id="notif-modal" data-value="{{auth()->user()->readNotifications}}" data-bs-toggle="modal"  data-bs-target="#notificationModal">Show all notifications</a>
            
          </li>
        </ul>
        <!-- End Notification Dropdown Items -->
      </li>
      <!-- End Notification Nav -->
       
         
      

     
      @can('admin')
       <li class="nav-item dropdown" data-bs-toggle="tooltip" data-bs-placement="left" title="Maintenance">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-tools"></i>
            </a
            ><!-- End Maintenance Icon -->

            <ul
              class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications"
            >
              <li class="notification-item">
    
                  <label class="switch">
                      <input type="checkbox" id="maintenanceSwitch" class="align-self-start">
                      <span class="slider"></span>
                    </label> 
                    <span class="align-self-end pt-3">Maintenance</span>
                            
                  </li>
                  
                </ul>
                <!-- End Maintenance Dropdown Items -->
              </li>
              <!-- End Maintenance Nav -->
        @endcan
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          @if(Auth::user()->photo)
          <img src=" {{ asset('storage/'.Auth::user()->photo) }} " alt="Profile" class="rounded-circle">
          @else
          <img src=" {{ asset('assets/img/profile-img.jpg') }} " alt="Profile" class="rounded-circle">
          @endif
          <span class="dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
        </a><!-- End Profile Name Icon -->
       

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li>
            <a href="{{ route('user-landing') }}" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-house"></i>
              <span>Home</span>
            </a>
          </li>
          <hr class="dropdown-divider" />
          <li>
            <a href="{{ route('user-about') }}" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-info-square"></i>
              <span>About</span>
            </a>
          </li>
          <hr class="dropdown-divider" />
          <li>
            <a href="{{ route('user-partners') }}" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-building"></i>
              <span>Jobs</span>
            </a>
          </li>
          <hr class="dropdown-divider" />
          <li>
            <a href="{{ route('user-events') }}" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-calendar3"></i>
              <span>Events</span>
            </a>
          </li>
          <hr class="dropdown-divider" />
          <li>
            <a href="{{ route('user-gallery') }}" class="dropdown-item d-flex align-items-center">
              <i class="bi bi-images"></i>
              <span>Gallery</span>
            </a>
          </li>
          <hr class="dropdown-divider" />
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
<!-- Notif Modal -->
<div class="modal fade" id="notificationModal" tabindex="-1" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">All Notification</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        
        <ul
        class="dropdown-menu-end dropdown-menu-arrow notifications"
      >
        
        @foreach (auth()->user()->unreadNotifications as $notification)
        
        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>{{$notification->data['title']}}</h4>
            <p>{!!$notification->data['data']!!}</p>
            <p>{{$notification->created_at->diffForHumans()}}</p>
          </div>
        </li>
        
          <hr class="dropdown-divider" />
        
        @endforeach
        @foreach (auth()->user()->readNotifications as $notification)
        
        <li class="notification-item">
          <i class="bi bi-info-circle text-secondary"></i>
          <div>
            <h4>{{$notification->data['title']}}</h4>
            <p>{!!$notification->data['data']!!}</p>
            <p>{{$notification->created_at->diffForHumans()}}</p>
          </div>
        </li>
        
          <hr class="dropdown-divider" />
        
        @endforeach
      </ul>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<!-- End Delete Modal-->