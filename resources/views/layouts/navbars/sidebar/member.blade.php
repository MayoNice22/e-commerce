<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ url('/') }}" style='border-bottom:1px solid #d9d9d9;'>
            <h2 class="text-black bg-gradient-primary" style="padding-left:10px; padding-right:10px; border-radius:20px; "><i class="fas fa-store-alt"></i> BUKALAPTOP</h2>
        </a>
        
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav mt--2">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*/*')?'active':'' }}" href="{{ url('') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Home') }}
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a  id="bandingkanDropdown" class="nav-link nav-link-icon dropdown-toggle " href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-exchange text-primary" aria-hidden="true"></i> Compare
                        <span class="badge badge-pill badge-warning ml-2">@if (session('bandingkan')){{ sizeof(session('bandingkan')) }}@else 0 @endif</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $total = 0;
                        $nomer = 0; ?>
                        @if (session('bandingkan'))
                            @foreach (session('bandingkan') as $key => $details)
                                @if ($nomer <= 2)
                                    <div class="row cart-detail mb-4 mt-2">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            @if(isset($details['photo']))
                                            <img src="{{ $details['photo'] }}" width="50" height="50" style="margin-left: 20px">
                                            @endif
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            @if(isset($details['name']))
                                            <p>{{ $details['name'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                <a href="{{ url('bandingkan') }}" class="btn btn-primary ml-3">Compare</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                @if(!Request::is('*bandingkan*'))
                                <a href="{{ url('add-to-bandingkan','hapus') }}" class="btn btn-danger">Reset</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link nav-link-icon dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart text-primary"></i> Cart 
                        <span class="badge badge-pill badge-warning ml-2">@if (session('cart')){{ sizeof(session('cart')) }}@else 0 @endif</span>
                    </a>
                    
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $total = 0;
                        $nomer = 0; ?>
                        @if (session('cart'))
                            @foreach (session('cart') as $key => $details)
                                <?php $total = $details['price'] * $details['quantity']; ?>
                                @if ($nomer <= 2)
                                    <div class="row cart-detail mb-4 mt-2">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ $details['photo'] }}" width="50" height="50" style="margin-left: 20px">
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-info">Rp. {{ number_format($details['price']) }}</span>
                                            @if(!Auth::user()) 
                                            <span class="count"> Quantity: {{ \App\Http\Controllers\ProductController::harga_xxx($details['price']) }}
                                            </span>
                                            @else
                                            <span class="count"> Quantity: {{ $details['quantity'] }}</span>
                                            
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                <a href="{{ url('cart') }}" class="btn btn-primary">View all</a>
                            </div>
                        </div>
                    </div>                 
                </li> 
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('*history*')?'active':'' }}" href="{{ url('history') }}">
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
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
                        <i class="fas fa-cog"></i> Setting
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>