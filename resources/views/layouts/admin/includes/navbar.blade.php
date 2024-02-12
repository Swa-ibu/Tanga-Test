<div class="header">
      <div class="header-left active">
        <a href="index.html" class="logo logo-normal">
          <img src="{{ asset('admin/assets/img/logo.png') }}" alt="{{ config('app.name') }}">
        </a>
        <a href="index.html" class="logo logo-white">
          <img src="{{ asset('admin/assets/img/logo-white.png') }}" alt="{{ config('app.name') }}">
        </a>
        <a href="index.html" class="logo-small">
          <img src="{{ asset('admin/assets/img/logo-small.png') }}" alt="{{ config('app.name') }}">
        </a>
        <a id="toggle_btn" href="javascript:void(0);">
          <i data-feather="chevrons-left" class="feather-16"></i>
        </a>
      </div>
      <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
          <span></span>
          <span></span>
          <span></span>
        </span>
      </a>
      <ul class="nav user-menu">
        <li class="nav-item nav-searchinputs">
          <div class="top-nav-search">
            <a href="javascript:void(0);" class="responsive-search">
              <i class="fa fa-search"></i>
            </a>
            <form action="#">
              <div class="searchinputs">
                <input type="text" placeholder="Search">
                <div class="search-addon">
                  <span>
                    <i data-feather="search" class="feather-14"></i>
                  </span>
                </div>
              </div>
            </form>
          </div>
        </li>
        {{-- <li class="nav-item dropdown has-arrow flag-nav nav-item-box">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button">
            <i data-feather="globe"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a href="javascript:void(0);" class="dropdown-item active">
              <img src="{{ asset('admin/assets/img/flags/us.png') }}" alt="{{ config('app.name') }}" height="16"> English </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="{{ asset('admin/assets/img/flags/fr.png') }}" alt="{{ config('app.name') }}" height="16"> French </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="{{ asset('admin/assets/img/flags/es.png') }}" alt="{{ config('app.name') }}" height="16"> Spanish </a>
            <a href="javascript:void(0);" class="dropdown-item">
              <img src="{{ asset('admin/assets/img/flags/de.png') }}" alt="{{ config('app.name') }}" height="16"> German </a>
          </div>
        </li> --}}
        <li class="nav-item nav-item-box">
          <a href="javascript:void(0);" id="btnFullscreen">
            <i data-feather="maximize"></i>
          </a>
        </li>
        <li class="nav-item nav-item-box">
          <a href="#">
            <i data-feather="mail"></i>
            <span class="badge rounded-pill">0</span>
          </a>
        </li>
        <li class="nav-item dropdown nav-item-box">
          <a href="javascript:void(0);" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
            <i data-feather="bell"></i>
            <span class="badge rounded-pill">0</span>
          </a>
          {{-- Notifications code here --}}
        </li>
        <li class="nav-item nav-item-box">
          @if (Auth::user()->role_id == 1)
                <a href="{{ route('admin.user-profile') }}">
          @elseif (Auth::user()->role_id == 1)
                <a href="{{ route('teacher.user-profile') }}">
          @else
                <a href="{{ route('student.user-profile') }}">
          @endif
            <i data-feather="settings"></i>
          </a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
          <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
            <span class="user-info">
              <span class="user-letter">
                @if (Auth::user()->featured_image == 'default.png')
                <img src="{{ asset('admin/assets/img/icons/default.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid">
            @else
                <img src="{{ Storage::disk('public')->url('user/'.Auth::user()->featured_image) }}" alt="{{ Auth::user()->name }}" class="img-fluid">
            @endif
              </span>
              <span class="user-detail">
                <span class="user-name">{{ Str::title(Auth::user()->name) }}</span>
                <span class="user-role">{{ Str::ucfirst(Auth::user()->roles->name) }}</span>
              </span>
            </span>
          </a>
          <div class="dropdown-menu menu-drop-user">
            <div class="profilename">
              <div class="profileset">
                <span class="user-img">
                    @if (Auth::user()->featured_image == 'default.png')
                    <img src="{{ asset('admin/assets/img/icons/default.png') }}" alt="{{ Auth::user()->name }}" class="img-fluid">
                @else
                    <img src="{{ Storage::disk('public')->url('user/'.Auth::user()->featured_image) }}" alt="{{ Auth::user()->name }}" class="img-fluid">
                @endif
                  <span class="status online"></span>
                </span>
                <div class="profilesets">
                  <h6>{{ Str::title(Auth::user()->name) }}</h6>
                  <h5>{{ Str::ucfirst(Auth::user()->roles->name) }}</h5>
                </div>
              </div>
              <hr class="m-0">
                @if (Auth::user()->role_id == 1)
                    <a class="dropdown-item" href="{{ route('admin.user-profile') }}"><i class="me-2" data-feather="user"></i> My Profile </a>
                @elseif (Auth::user()->role_id == 2)
                    <a class="dropdown-item" href="{{ route('teacher.user-profile') }}"><i class="me-2" data-feather="user"></i> My Profile </a>
                @else
                    <a class="dropdown-item" href="{{ route('student.user-profile') }}"><i class="me-2" data-feather="user"></i> My Profile </a>
                @endif
              <a class="dropdown-item" href="{{ route('welcome') }}"><i class="me-2" data-feather="settings"></i>Website <i class="ms-2" data-feather="external-link"></i></a>
              <hr class="m-0">
              <a class="dropdown-item logout pb-0" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <img src="{{ asset('admin/assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Logout </a>
            </div>
          </div>
        </li>
      </ul>
      <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-ellipsis-v"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            @if (Auth::user()->role_id == 1)
                <a class="dropdown-item" href="{{ route('admin.user-profile') }}">My Profile</a>
            @elseif (Auth::user()->role_id == 2)
                <a class="dropdown-item" href="{{ route() }}">My Profile</a>
            @else
                <a class="dropdown-item" href="{{ route('student.user-profile') }}">My Profile</a>
            @endif
          {{-- <a class="dropdown-item" href="generalsettings.html">Settings</a> --}}

          <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <!-- Logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>

        </div>
      </div>
    </div>
