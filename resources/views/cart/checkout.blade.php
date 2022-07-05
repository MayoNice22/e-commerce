@extends('layouts.app',['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container-fluid">
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
            <div class="row mt-2 justify-content-center">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <h1 class="mb-0">Check Out</h1>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th scope="col">Product</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col" colspan="2">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (session('cart'))
                                        <?php $total = 0; ?>
                                        @foreach (session('cart') as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity']; ?>
                                            <tr>
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}"
                                                                alt="..." class="img-responsive"
                                                                style="width: 50px; height:50px" />
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h3 class="mt-2">{{ $details['name'] }}</h3>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">
                                                    <h4>Rp. {{ number_format($details['price']) }}</h4>
                                                </td>
                                                <td data-th="Quantity">
                                                    {{-- <input type="number" class="form-control text-center" value="1"> --}}
                                                    <h4>{{ $details['quantity'] }}</h4>
                                                </td>
                                                <td data-th="Subtotal" class="text-center" colspan="2">
                                                    <h4>Rp. {{ number_format($details['price'] * $details['quantity']) }}
                                                    </h4>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <h3 class="mt-2">No item</h3>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">
                                                <h4>No item</h4>
                                            </td>
                                            <td data-th="Quantity">
                                                {{-- <input type="number" class="form-control text-center" value="1"> --}}
                                                <h4>No item</h4>
                                            </td>
                                            <td data-th="Subtotal" class="text-center">
                                                <h4>No item</h4>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if (session('cart'))
                                        <tr>
                                            <td class="d-flex justify-content-start"><a href="{{ url('/cart') }}"
                                                    class="btn btn-warning"><i class="fa fa-angle-left"></i> Back to
                                                    Cart</a></td>
                                            <td colspan="2" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center">
                                                <h3 class="d-flex justify-content-end"><strong>Total Rp.
                                                        {{ number_format($total) }} </strong></h3>
                                            </td>
                                            <td class="d-flex justify-content-end"><a
                                                    href="{{ route('submitCheckout') }}" class="btn btn-warning">Finish
                                                    <i class="fa fa-angle-right"></i></a></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="d-flex justify-content-start"><a href="{{ url('/cart') }}"
                                                    class="btn btn-warning"><i class="fa fa-angle-left"></i> Back to
                                                    Cart</a></td>
                                            <td colspan="2" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center">
                                                <h3><strong>Total Rp.
                                                        0 </strong></h3>
                                            </td>
                                            <td class="d-flex justify-content-end"><a
                                                    href="{{ route('submitCheckout') }}"
                                                    class="btn btn-warning ">Finish <i class="fa fa-angle-right"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
