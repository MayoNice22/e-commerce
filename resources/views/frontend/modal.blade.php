<div class="portlet">
    <div class="portlet-title text-center">
        <h1><b>{{ $dataProduct->nama }}</b></h1>
    </div>
    <div class="portlet-body">
        <div>
            <div class="col-md-12">
                <div class="thumbnail">
                    <div class="caption">
                        <div>
                            <img color='#808080' src="{{ asset('images/' . $dataProduct->image) }}"
                                alt="{{ $dataProduct->nama }}" style="width:50%; display:block; margin:0 auto;">
                        </div>
                        <div class="text-center pb-4">
                            <small>
                                {{ $dataProduct->deskripsi }}
                            </small>
                        </div>
                        @foreach ($dataProduct->spec as $spec)
                            <table class="table" margin-right: 100px;>
                                <tr class="text-center">
                                    <th class="px-md-4">Specs</th>
                                    <th class="px-md-8">Detail</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Processor</th>
                                    <td >{{ $spec->prosesor }}</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Graphics</th>
                                    <td>{{ $spec->grafis }}</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Storage</th>
                                    <td>{{ $spec->storage }}</td>
                                </tr>
                                <tr class="text-center">
                                    <th>RAM</th>
                                    <td>{{ $spec->ram }} GB</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Battery</th>
                                    <td>{{ $spec->baterai }}</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Weight</th>
                                    <td>{{ $spec->berat }} Kg</td>
                                </tr>
                                <tr class="text-center">
                                    <th>Screen Size</th>
                                    <td>{{ $spec->layar }} Inch</td>
                                </tr>
                            </table>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
