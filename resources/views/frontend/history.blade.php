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
                                    <h1 class="mb-0">History</h1>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table id="nota" class="table table-hover table-condensed text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No.</th>
                                        <th style="width:50%">Transaction Date</th>
                                        <th style="width:30%">Total</th>
                                        <th style="width:30%">Status</th>
                                        <th style="widht:10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trans as $t)
                                        <tr>
                                            @if ($trans->isEmpty())
                                                <td>No Item</td>
                                                <td>No Item</td>
                                                <td>No Item</td>
                                                <td>No Item</td>
                                            @else
                                                <td data-th="Kode">{{ $loop->iteration }}</td>
                                                <td data-th="Waktu">{{ date('j F Y', strtotime($t->transaction_date)) }}
                                                </td>
                                                <td data-th="Total">Rp. {{ number_format($t->total) }}</td>
                                                @if ($t->status == 0)
                                                    <td data-th="Status" class="text-yellow">Waiting</td>
                                                @elseif( $t->status == 1)
                                                    <td data-th="Status" class="text-green">Accepted</td>
                                                @elseif( $t->status == 2)
                                                    <td data-th="Status" class="text-danger">Canceled</td>
                                                @endif
                                                <td class="actions">
                                                    <a href="{{ route('transaction.show', $t->id) }}"
                                                        class="btn btn-info btn-sm update-cart"
                                                        data-id="{{ $t->id }}">View</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
