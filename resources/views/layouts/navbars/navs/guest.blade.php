<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark" style="background-color:#1f004d;" >
    <div class="container px-4">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h2 class="text-black" style="background: white; padding-left:10px; padding-right:10px; border-radius:20px; "><i class="fas fa-store-alt"></i> BukaLaptop</h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
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
                            data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link nav-link-icon dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-shopping-cart"></i> Cart 
                        <span class="badge badge-pill badge-white">@if (session('cart')){{ sizeof(session('cart')) }}@else 0 @endif</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php $total = 0;
                        $nomer = 0; ?>
                        @if (session('cart'))
                            @foreach (session('cart') as $key => $details)
                                <?php $total = $details['price'] * $details['quantity']; ?>
                                @if ($nomer <= 2)
                                    <div class="row cart-detail py-2">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ $details['photo'] }}" width="50" height="50" style="margin-left: 20px">
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['name'] }}</p>
                                            <span class="price text-info">Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($details['price']) }}</span><br> <span class="count"> Quantity: {{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                        <div class="row d-flex justify-content-center px-4">
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                <a href="{{ url('cart') }}" class="btn btn-primary">View all</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                <a href="{{ url('add-to-cart','hapus') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="bandingkanDropdown" class="nav-link nav-link-icon dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-exchange" aria-hidden="true"></i> Compare
                        <span class="badge badge-pill badge-white">@if (session('bandingkan')){{ sizeof(session('bandingkan')) }}@else 0 @endif</span>
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
                        <div class="row d-flex justify-content-center px-4">
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                <a href="{{ url('bandingkan') }}" class="btn btn-primary">Compare</a>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-6 text-center checkout">
                                <a href="{{ url('add-to-bandingkan','hapus') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-icon" href="{{ route('login') }}">
                        <i class="ni ni-key-25"></i>
                        <span class="nav-link-inner--text" >{{ __('Login') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
