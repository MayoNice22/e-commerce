@extends('layouts.app', ['class' => 'bg-default'])

@section('content')

    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-warning" role="alert">
                    {{ session('failed') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="pb-5 container">

                <a href="#" data-target="#modalProducts" data-toggle="modal"
                    onclick="getDetailData({{ $product[0]->id }});">
                    <img class="mySlides w3-animate-fading"
                        src="https://www.evetech.co.za/repository/ProductImages/ASUS-Zephyrus-G14-Slider-Banner-980px-v1.jpg"
                        style="width:100%; max-height:400px"></a>

                <a href="#" data-target="#modalProducts" data-toggle="modal"
                    onclick="getDetailData({{ $product[1]->id }});">
                    <img class="mySlides w3-animate-fading"
                        src="https://vstecsindo.net/wp-content/uploads/2020/06/1564988802_os_slide_banner.jpg"
                        style="width:100%; max-height:400px"></a>

                <a href="#" data-target="#modalProducts" data-toggle="modal"
                    onclick="getDetailData({{ $product[11]->id }});">
                    <img class="mySlides w3-animate-fading" src="https://cis.id/contents/uploads/sliders/Banner-slide-4.png"
                        style="width:100%; max-height:400px"></a>

                <a href="#" data-target="#modalProducts" data-toggle="modal"
                    onclick="getDetailData({{ $product[12]->id }});">
                    <img class="mySlides w3-animate-fading"
                        src="https://lenovojakarta.com/wp-content/uploads/2016/12/LENOVO-YOGA-BANNER.jpg"
                        style="width:100%; max-height:400px"></a>

                <a href="#" data-target="#modalProducts" data-toggle="modal"
                    onclick="getDetailData({{ $product[15]->id }});">
                    <img class="mySlides w3-animate-fading"
                        src="https://pro.rexus.id/wp-content/uploads/sites/11/2021/08/1-1500x605.jpg"
                        style="width:100%; max-height:400px"></a>

                <!-- <button class="fas fa-arrow-left .w3-display-left" style='background:white' onclick="plusDivs(-1)"></button>
                                            <button class="fas fa-arrow-right " style='background:transparent' onclick="plusDivs(1)"></button> -->
            </div>

            <!-- <h1 class="text-white text-center">Card1</h1>
                                            <div class="header-body text-center row d-flex   justify-content-center ">
                                                @foreach ($product as $p)
                                                    @if ($p->disc > 0)
                                                        <div class="zoom mySlides">
                                                            <div class="px-md-4 py-4 ">
                                                                <div class="card card-stats mb-4 mb-xl-0">
                                                                    <div class="card-body ">
                                                                        <div class="row">
                                                                            <div class="col">                                   
                                                                                   
                                                                                
                                                                            </div>
                                                                        </div>
                                                                        <p class="mt-3 mb-0 text-muted text-sm">
                                                                            <a href="#" data-target="#modalProducts" data-toggle="modal"
                                                                                onclick="getDetailData({{ $p->id }});"><img
                                                                                    src="{{ asset('images/' . $p->image) }}" alt="Laptop" width="200px"
                                                                                    height="200px">
                                                                                    {{ $p->nama }}
                                                                                    @if (!Auth::user())
                                                                                    <span class="h4 font-weight-bold mb-0"><s>Rp.
                                                                                            {{ preg_replace('/(?!^)\S/', 'X', $p->harga) }}</s><span
                                                                                            class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i
                                                                                                class="fas fa-percent"
                                                                                                aria-hidden="true"></i></span><br></span>
                                                                                    <span class="h2 font-weight-bold mb-0 text-warning">Rp.
                                                                                        {{ preg_replace('/(?!^)\S/', 'X', $p->harga) }}</span>
                                                                                    
                                                @else
                                                                                    <span class="h4 font-weight-bold mb-0"><s>Rp.
                                                                                            {{ number_format($p->harga) }}</s><span
                                                                                            class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i
                                                                                                class="fas fa-percent"
                                                                                                aria-hidden="true"></i></span><br></span>
                                                                                    <span class="h2 font-weight-bold mb-0 text-warning">Rp.
                                                                                        {{ number_format($p->harga - $p->harga * $p->disc) }}</span>
                                                                                @endif</a><br>
                                                                                    <button  onclick="plusDivs(-1)">LEft</button>
                                                                                    <button  onclick="plusDivs(1)">RIght</button>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div> -->

            <h1 class="text-white text-center pt-4" data-aos="fade-down">Limited Price</h1>
            <div class="header-body text-center row d-flex justify-content-center">
                @foreach ($product as $p)
                    @if ($p->disc > 0)
                        <div class="zoom" data-aos="fade-up">
                            <div class="px-md-4 py-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body ">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                    {{ $p->nama }}</h5>
                                                @if (!Auth::user())
                                                    <span class="h4 font-weight-bold mb-0"><s>Rp.
                                                            {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga) }}</s><span
                                                            class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i
                                                                class="fas fa-percent"
                                                                aria-hidden="true"></i></span><br></span>
                                                    <span class="h2 font-weight-bold mb-0 text-warning">Rp.
                                                        {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga - $p->harga * $p->disc) }}</span>

                                                @else
                                                    <span class="h4 font-weight-bold mb-0"><s>Rp.
                                                            {{ number_format($p->harga) }}</s><span
                                                            class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i
                                                                class="fas fa-percent"
                                                                aria-hidden="true"></i></span><br></span>
                                                    <span class="h2 font-weight-bold mb-0 text-warning">Rp.
                                                        {{ number_format($p->harga - $p->harga * $p->disc) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <a href="#" data-target="#modalProducts" data-toggle="modal"
                                                onclick="getDetailData({{ $p->id }});"><img
                                                    src="{{ asset('images/' . $p->image) }}" alt="Laptop" width="200px"
                                                    height="200px"></a><br>
                                            <?php $session = session('bandingkan'); ?>
                                            @if (isset($session[$p->id]))
                                                <span class="text-success mr-2"></i><a
                                                        href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                                        class="btn btn-info col mt-1">Compare</a></span>
                                            @else
                                                <span class="text-success mr-2"></i><a
                                                        href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                                        class="btn btn-outline-info col mt-1">Compare</a></span>
                                            @endif
                                            <span class="text-success mr-2"></i><a
                                                    href="{{ url('add-to-cart/' . $p->id) }}"
                                                    class="btn btn-warning col mt-1">Add to Cart</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div>
                <h1 class="text-white text-center pt-6 pb-4" data-aos="fade-down">All Products</h1>
                <div class="row ml-5">
                    <select name="sel_category" id="sel_category" class="form-control col-6" style="border-radius: 5px;margin-left:0.75rem"
                        data-aos="fade-down">
                        <option value="all" selected>All Category</option>
                        @foreach ($category as $c)
                            <option value="{{ $c->id }}">{{ $c->nama }}</option>
                        @endforeach
                    </select>
                    <div class="hidden-xs" style="padding-right:11.5rem;">

                    </div>
                    <input type="text" name="search" id="search" class="form-control col-3" placeholder="Search.." data-aos="fade-down">
                </div>
            </div>
            <div class="text-center row d-flex justify-content-center py-4" id="body_card" style="min-height: 60vh">
                @foreach ($product as $p)
                    @if ($p->disc == 0)
                        <div class="zoom" data-aos="fade-up">
                            <div class="px-md-4 py-4">
                                <div class="card card-stats mb-4 mb-xl-0">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0">
                                                    {{ $p->nama }}</h5>
                                                @if (!Auth::user())
                                                    <span class="h2 font-weight-bold mb-0"> Rp.
                                                        {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga) }}</span>
                                                @else
                                                    <span class="h2 font-weight-bold mb-0"> Rp.
                                                        {{ number_format($p->harga) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-muted text-sm">
                                            <a href="#" data-target="#modalProducts" data-toggle="modal"
                                                onclick="getDetailData({{ $p->id }});"><img
                                                    src="{{ asset('images/' . $p->image) }}" alt="Laptop" width="200px"
                                                    height="200px"></a><br>

                                            @if (isset($session[$p->id]))
                                                <span class="text-success mr-2"></i><a
                                                        href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                                        class="btn btn-info col mt-1">Compare</a></span>
                                            @else
                                                <span class="text-success mr-2"></i><a
                                                        href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                                        class="btn btn-outline-info col mt-1">Compare</a></span>
                                            @endif
                                            <span class="text-success mr-2"></i><a
                                                    href="{{ url('add-to-cart/' . $p->id) }}"
                                                    class="btn btn-warning col mt-1">Add to Cart</a></span>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    </div>
    <div class="container mt--10 pb-5"></div>
@endsection
@section('modal')
    {{-- SHOW PRODUCT --}}
    <div class="modal fade" id="modalProducts" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body" id="modalProductsContent">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

@endsection
@section('script')
    <script>
        function getDetailData(idProduct) {
            $.ajax({
                type: 'POST',
                url: '{{ route('product.showAjax') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'idProduct': idProduct
                },
                success: function(data) {
                    $('#modalProductsContent').html(data.msg);
                    // alert(data.msg);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        }
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {
                myIndex = 1
            }
            x[myIndex - 1].style.display = "block";
            setTimeout(carousel, 5000);
        }

        $('#sel_category').change(function() {
            var id_category = $(this).val();
            var id_search = $('#search').val();
            if(id_search==""){
                id_search = "all";
            }
            $.ajax({
                type: 'get',
                url: '{{ url('filter') }}' + "/" + id_category+"/"+id_search,
                success: function(data) {
                    $('#body_card').html(data.msg);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });

        $('#search').keyup(function() {
            var id_search = $(this).val();
            if(id_search==''){
                id_search='all';
            }
            var id_category = $('#sel_category').val();
            $.ajax({
                type: 'get',
                url: '{{ url('search') }}'+"/"+id_search+"/"+id_category,
                success: function(data) {
                    $('#body_card').html(data.msg);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        });
    </script>
@endsection
@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js">

    </script>

@endsection
