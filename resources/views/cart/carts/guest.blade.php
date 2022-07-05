@extends('layouts.app',['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container-fluid col-md-12">
            <div class="row mt-2 justify-content-center">
                <div class="col-xl-10 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <h1 class="mb-0">Cart</h1>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr class="text-center">
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Subtotal</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @if (session('cart'))
                                        <?php $total = 0; ?>
                                        @foreach (session('cart') as $id => $details)
                                            <?php $total += $details['price'] * $details['quantity']; ?>
                                            <tr data-id="{{ $id }}">
                                                <td data-th="Product">
                                                    <div class="row">
                                                        <div class="col-sm-3 hidden-xs"><img src="{{ $details['photo'] }}"
                                                                alt="..." class="img-responsive"
                                                                style="width: 120px; height:120px" />
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h3 class="mt-5">{{ $details['name'] }}</h3>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td data-th="Price">
                                                    @if ($details['disc'] > 0)
                                                    <small><s>Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($details['harga']) }}</s> -{{ $details['disc']*100 }}% </small>
                                                    <h4>Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($details['price']) }}</h4>
                                                    @else
                                                    <h4>Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($details['price']) }}</h4>
                                                    @endif
                                                </td>
                                                <td data-th="Quantity" style="width: 5%">
                                                    {{-- <input type="number" class="form-control text-center" value="1"> --}}
                                                    <h4>{{ $details['quantity'] }}</h4>
                                                </td>
                                                <td data-th="Subtotal" class="text-center">
                                                    <h4>Rp. {{ \App\Http\Controllers\ProductController::harga_xxx($details['price'] * $details['quantity']) }}
                                                    </h4>
                                                </td>
                                                <td class="actions" data-th="">

                                                    <a href="{{ url('removeFromCart/' . $details['id']) }}"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
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
                                            <td class="d-flex justify-content-start"><a href="{{ url('/') }}" class="btn btn-warning"><i
                                                        class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                            <td colspan="2" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center">
                                                <h3><strong>Total Rp.
                                                        {{ \App\Http\Controllers\ProductController::harga_xxx($total) }} </strong></h3>
                                            </td>
                                            <td class="d-flex justify-content-end"><a href="{{ route('checkOut') }}"
                                                    class="btn btn-warning ">Checkout <i
                                                        class="fa fa-angle-right"></i></a></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="d-flex justify-content-start"><a href="{{ url('/') }}" class="btn btn-warning"><i
                                                        class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                            <td colspan="2" class="hidden-xs"></td>
                                            <td class="hidden-xs text-center">
                                                <h3><strong>Total Rp.
                                                        0 </strong></h3>
                                            </td>
                                            <td class="d-flex justify-content-end"><a href="{{ route('checkOut') }}"
                                                    class="btn btn-warning ">Checkout <i
                                                        class="fa fa-angle-right"></i></a></td>
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
