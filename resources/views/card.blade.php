@foreach ($product as $p)
    <div class="zoom" data-aos="fade-up">
        <div class="px-md-4 py-4" id="body_card">
            <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">
                                {{ $p->nama }}</h5>
                            @if (!Auth::user())
                                @if($p->disc > 0)
                                <span class="h4 font-weight-bold mb-0"><s>Rp.
                                        {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga) }}</s><span
                                        class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i class="fas fa-percent"
                                            aria-hidden="true"></i></span><br></span>
                                <span class="h2 font-weight-bold mb-0 text-warning">Rp.
                                    {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga - $p->harga * $p->disc) }}</span>
                                @else
                                <span class="h2 font-weight-bold mb-0">Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($p->harga) }}</span>

                                @endif

                            @else
                                @if($p->disc > 0)
                                <span class="h4 font-weight-bold mb-0"><s>Rp.
                                        {{ number_format($p->harga) }}</s><span
                                        class="text-danger">&nbsp;-{{ $p->disc * 100 }}<i class="fas fa-percent"
                                            aria-hidden="true"></i></span><br></span>
                                <span class="h2 font-weight-bold mb-0 text-warning">Rp. {{ number_format($p->harga - $p->harga * $p->disc) }}</span>
                                @else
                                
                                <span class="h2 font-weight-bold mb-0">Rp. {{ number_format($p->harga)}}</span>
                                @endif
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
                            <span class="text-success mr-2"></i><a href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                    class="btn btn-info col mt-1">Compare</a></span>
                        @else
                            <span class="text-success mr-2"></i><a href="{{ url('add-to-bandingkan/' . $p->id) }}"
                                    class="btn btn-outline-info col mt-1">Compare</a></span>
                        @endif
                        <span class="text-success mr-2"></i><a href="{{ url('add-to-cart/' . $p->id) }}"
                                class="btn btn-warning col mt-1">Add to Cart</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endforeach
