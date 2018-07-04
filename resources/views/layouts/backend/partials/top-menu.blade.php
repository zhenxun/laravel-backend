{{-- <div class="container">
  <div class="row">
      <div class="col splash"></div>
  </div>

</div> --}}

<nav class="navbar navbar-expand-lg backend-top-navbar">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        <img src="{{ asset('images/logo.png') }}" width="50" height="50" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="backend-top-navbar-menubars_icon">
          <i class="fa fa-bars"></i>
        </span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto backend-top-navbar-child">
          <li class="nav-item dropdown my-2 mr-3">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ isset(Auth::user()->name)?  Auth::user()->name:'Guest' }}
            </a>
            <div class="dropdown-menu backend-top-navbar-dropdown" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">
                <i class="fa fa-user-circle"></i> &nbsp;
                {{ trans('nav.profile') }}
              </a>
              <a class="dropdown-item" href="{{ route('admin.settings.index') }}">
                  <i class="fa fa-cog"></i> &nbsp;
                  {{ trans('nav.setting') }}
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('admin.logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                <i class="fa fa-sign-out"></i> &nbsp;
                {{ trans('nav.logout') }}
              </a>
            </div>
          </li>
          <li class="nav-item mr-3">
            <img src="{{ asset('images/guest.png') }}" alt="..." class="rounded-circle">
          </li>
        </ul>
    </div>
</nav>
