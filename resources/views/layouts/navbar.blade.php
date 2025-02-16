
<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo" href="{{url('/home')}}" style="padding-left: 30px;">
            <!-- <img src="{{asset('admin/images/logo.svg')}}" alt="logo" /> -->
            <h2 class="text-primary"> DIUJMS</h2>
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/home')}}" style="padding-left: 8px;">
            <!-- <img src="{{asset('admin/images/logo-mini.svg')}}" alt="logo" /> -->
            <h5 class="text-primary"> DIUJMS</h5>
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
                <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                        <i class="input-group-text border-0 mdi mdi-magnify"></i>
                    </div>
                    <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
                </div>
            </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="nav-profile-text">
                    <p class="mb-1 text-black">
                        @if(auth()->check())
                            {{ auth()->user()->first_name }}
                        @endif
                    </p>
                </div>
                <div class="nav-profile-img">
                        <!-- <img src="{{asset('admin/images/faces/face1.jpg')}}" alt="image"> -->
                        <span class="availability-status online"></span>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="{{url('/user-profile')}}">
                    <i class="mdi mdi-cached me-2 text-success"></i> User Profile </a>
                    <div class="dropdown-divider"></div>
                    <!-- <a class="dropdown-item" href="{{url('/change-password')}}">
                    <i class="mdi mdi-cached me-2 text-success"></i> Change Password </a> -->
                    <div class="dropdown-divider"></div>
                    <!-- Logout Button -->
                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                        {{ __('Logout') }}
                    </a>
                    <!-- Logout Form (Hidden) -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>
