@extends('layouts.app',['class' => 'bg-default'])

@section('content')
    <div class="header bg-gradient-primary py-7 py-lg-8">
        <div class="container-fluid">
            <div class="row mt-2 justify-content-center">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col text-center">
                                    <h1>Compare Laptop</h1>
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered text-center">
                            @if (session('bandingkan'))
                                <thead class="thead-light">
                                    <tr style="font-size: 28px">
                                        <th scope="col" style="width: 40%">
                                            <h3>{{ $product[0]->nama }}</h4>
                                        </th>
                                        <th scope="col" style="width: 20%">
                                            <h3>Specifications</h3>
                                        </th>
                                        <th scope="col" style="width: 40%">
                                            <h3>{{ $product[1]->nama }}</h3>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="align-middle"><img src="{{ asset('images/'.$product[0]->image) }}" alt="" width="40%"></td>
                                        <td class="font-weight-bold align-middle" >Design</td>
                                        <td class="align-middle"><img src="{{ asset('images/'.$product[1]->image) }}" alt="" width="40%"></td>
                                    </tr>
                                    <tr>
                                        <td style='background-color:#bfbfbf;'><img src="{{ asset('images/'.$product[0]->brands->image) }}" alt="logo_brand" width="50px" height="30px">&nbsp;{{ $product[0]->brands->nama }}</td>
                                        <td style='background-color:#bfbfbf;' class="font-weight-bold align-middle">Brand</td>
                                        <td style='background-color:#bfbfbf;'><img src="{{ asset('images/'.$product[1]->brands->image) }}" alt="logo_brand" width="50px" height="30px">&nbsp;{{ $product[1]->brands->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " : $product[0]->spec[0]->prosesor }}</td>
                                        <td class="font-weight-bold">Processor</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " : $product[1]->spec[0]->prosesor }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " : $product[0]->spec[0]->grafis }}</td>
                                        <td class="font-weight-bold">Graphics</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " : $product[1]->spec[0]->grafis }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " : $product[0]->spec[0]->storage }}</td>
                                        <td class="font-weight-bold">Storage</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " : $product[1]->spec[0]->storage }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " :$product[0]->spec[0]->ram. " GB" }} </td>
                                        <td class="font-weight-bold">RAM</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " :$product[1]->spec[0]->ram. " GB" }} </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " :$product[0]->spec[0]->baterai }}</td>
                                        <td class="font-weight-bold">Battery</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " :$product[1]->spec[0]->baterai }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{$product[0]->spec->isEmpty() ? " " :$product[0]->spec[0]->berat. " kg" }} </td>
                                        <td class="font-weight-bold">Weight</td>
                                        <td>{{$product[1]->spec->isEmpty() ? " " :$product[1]->spec[0]->berat. " kg" }} </td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->spec->isEmpty() ? " " :$product[0]->spec[0]->layar. " inch" }} </td>
                                        <td class="font-weight-bold">Screen Size</td>
                                        <td>{{ $product[1]->spec->isEmpty() ? " " :$product[1]->spec[0]->layar. " inch" }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $product[0]->tahun_rilis }}</td>
                                        <td class="font-weight-bold">Release</td>
                                        <td>{{ $product[1]->tahun_rilis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Rp.{{ number_format($product[0]->harga) }}</td>
                                        <td class="font-weight-bold">Price</td>
                                        <td>Rp.{{ number_format($product[1]->harga) }}</td>
                                    </tr>
                                </tbody>
                            @endif
                            <tfoot>
                                <tr>
                                    <td colspan="3">
                                        <a href="{{ url('add-to-bandingkan', 'hapus-back') }}" class="btn btn-danger fa fa-refresh"> Reset</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container mt--10 pb-5"></div>
@endsection
