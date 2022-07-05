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
                                    <h1 class="mb-0">Transaction History</h1>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table id="cart" class="table table-hover table-condensed text-center">
                                <thead>
                                    <tr>
                                        <th style="width:50%">Product</th>
                                        <th style="width:10%">Price</th>
                                        <th style="width:5%">Discount</th>
                                        <th style="width:10%">Discounted Price</th>
                                        <th style="width:5%">Quantity</th>
                                        <th style="width:20%">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody style="line-height: 55px">
                                    <?php $ts = $transaction->products; ?>
                                    @foreach ($ts as $dp)
                                        <tr>
                                            <td data-th="Product">
                                                <div class="row">
                                                    <div class="col-sm-3 hidden-xs"><img
                                                            src="{{ asset('images/' . $dp->image) }}" alt="..."
                                                            class="img-responsive" style="width: 70px; height:70px;" />
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <h4 style="line-height: 55px;">{{ $dp->nama }}</h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td data-th="Price">Rp. {{ number_format($dp->harga) }}</td>
                                            <td data-th="Discount">
                                                Rp. {{ number_format($dp->harga * $dp->disc) }}
                                            </td>
                                            <td data-th="Discount" class="text-center">
                                                Rp. {{ number_format($dp->pivot->subtotal) }}</td>

                                            <td data-th="Quantity">
                                                {{ $dp->pivot->quantity }}
                                            </td>

                                            <td data-th="Subtotal" class="text-center">
                                                Rp. {{ number_format($dp->pivot->subtotal * $dp->pivot->quantity) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td class="d-flex justify-content-start"><a href="{{ url('/history') }}"
                                                class="btn btn-warning "><i class="fa fa-angle-left"></i>
                                                Back</a></td>
                                        @if ($transaction->status == 0)
                                            <td data-th="Status"  colspan="3"><h1>Status : <span class="text-yellow" >Waiting</span> </h1></td>
                                        @elseif( $transaction->status == 1)
                                            <td data-th="Status" colspan="3"><h1>Status : <span class="text-green" >Accepted</span></h1></td>
                                        @elseif( $transaction->status == 2)
                                            <td data-th="Status"  colspan="3"><h1>Status : <span class="text-danger" >Canceled</span></h1></td>
                                        @endif
                                        <td class="hidden-xs"></td>


                                        <td class="hidden-xs text-center d-flex justify-content-end"><strong>
                                                <h4 class='text-success mt-2'>Total Price: Rp.
                                                    {{ number_format($transaction->total) }}</h4>
                                            </strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
