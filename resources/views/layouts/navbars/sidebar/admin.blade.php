<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ url('/') }}" style='border-bottom:1px solid #d9d9d9;'>
            <h2 class="text-black bg-gradient-primary"
                style="padding-left:10px; padding-right:10px; border-radius:20px; "><i class="fas fa-store-alt"></i>
                BUKALAPTOP</h2>
        </a>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav mt--2">
                @if(auth()->user()->role == 'Penguasa')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*/administrasi*') ? 'active' : '' }}" href="{{ url('/administrasi') }}">
                        <i class="fas fa-user-cog text-primary"></i> {{ __('Administration') }}
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*/product*') ? 'active' : '' }}" href="{{ url('/admin/product') }}">
                        <i class="fas fa-box text-primary"></i> {{ __('Product') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*/brand*') ? 'active' : '' }}" href="{{ url('/admin/brand') }}">
                        <i class="fas fa-copyright text-primary"></i> {{ __('Brand') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*/category*') ? 'active' : '' }}" href="{{ url('/admin/category') }}">
                        <i class="fas fa-laptop text-primary"></i> {{ __('Categories') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*history*')?'active':'' }}" href="{{ url('admin/history') }}">
                        <i class="fas fa-history text-primary"></i> {{ __('History') }}
                    </a>
                </li>
            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">My Profile</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                        <i class="ni ni-single-02"></i> Profile
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="fas fa-cog"></i> Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
