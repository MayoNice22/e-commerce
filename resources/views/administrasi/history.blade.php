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
                        <div class="scroller m-4" data-rail-visible="1" data-rail-color="yellow"
                            data-handle-color="#a1b2bd">
                            <!-- Projects table -->
                            <table id="table-user" class="table table-hover table-condensed text-center">
                                <thead>
                                    <tr>
                                        <th style="width:10%">No.</th>
                                        <th style="width:10%">Name</th>
                                        <th style="width:35%">Transaction Date</th>
                                        <th style="width:20%">Total</th>
                                        <th style="width:30%">Status</th>
                                        <th>Accepted by</th>
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
                                                <td>No Item</td>
                                            @else
                                                <td data-th="Kode" class="align-middle">{{ $loop->iteration }}</td>
                                                <td data-th="Nama" class="align-middle">{{ $t->pembeli->name }}</td>
                                                <td data-th="Waktu" class="align-middle">{{ date('j F Y', strtotime($t->transaction_date)) }}
                                                </td>
                                                <td data-th="Total" class="align-middle">Rp. {{ number_format($t->total) }}</td>
                                                @if ($t->status == 0)
                                                    <td data-th="Status" class="text-yellow align-middle">Waiting</td>
                                                @elseif( $t->status == 1)
                                                    <td data-th="Status" class="text-green align-middle">Accepted</td>
                                                @elseif( $t->status == 2)
                                                    <td data-th="Status" class="text-danger align-middle">Canceled</td>
                                                @endif

                                                @if ($t->kasir_id == null)
                                                    <td class="align-middle">Still on waiting list</td>
                                                @else
                                                    <td class="align-middle">{{ $t->pegawai->name }}</td>
                                                @endif
                                                <td class="actions align-middle">
                                                    <a href="{{ route('transaction.show', $t->id) }}"
                                                        class="btn btn-info btn-sm" data-id="{{ $t->id }}"><i
                                                            class="fab fa-microsoft"></i></a>
                                                    @if ($t->status == 0)
                                                        <a href="{{ url('accept', $t->id) }}"
                                                            class="btn btn-success btn-sm"><i
                                                                class="fas fa-check"></i></a>
                                                        <a href="{{ url('reject', $t->id) }}"
                                                            class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
                                                    @endif
                                                    @if (Auth::user()->role == 'Penguasa')
                                                        <form style="display:inline;" method="POST"
                                                            action="{{ route('transaction.destroy', $t->id) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                                                                onclick="if(!confirm('Apakah mau dihapus?')) {return false;}">
                                                        </form>
                                                    @endif
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-user').DataTable();
        });
    </script>
@endsection
