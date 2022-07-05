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
                                    <h1 class="mb-0">Edit Product</h1>
                                </div>
                            </div>
                        </div>
                        <div class="scroller m-4" data-rail-visible="1" data-rail-color="yellow"
                            data-handle-color="#a1b2bd">
                            <form action="{{ route('product.update',['product'=>encrypt($product->id)]) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @if($product->spec->isEmpty())
                                <div class="form-group row">
                                    <label for="inputNama3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" id="inputNama3"
                                            placeholder="Name" value="{{ $product->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi"
                                            placeholder="Description" rows="4" style="resize: none">{{ $product->deskripsi }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputHarga" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="harga" id="inputHarga"
                                            placeholder="Price" value="{{ $product->harga }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" class="form-control" name="disc" id="inputDiscount"
                                            placeholder="Discount (0 : No Discount)" min="0" max="100" value="{{ $product->disc*100 }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTahunRilis" class="col-sm-2 col-form-label">Release Year</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" class="form-control" name="tahun_rilis" id="inputTahunRilis"
                                            placeholder="Year" value="{{ $product->tahun_rilis }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-8">
                                        <select name="sel_category" id="inputCategory" class="form-control">
                                            <option disabled>--Choose Category--</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->id }}" @if( $c->id == $product->categories_id) selected @endif>{{ $c->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-8">
                                        <select name="sel_brand" id="inputBrand" class="form-control">
                                            <option disabled>--Choose Brand--</option>
                                            @foreach ($brand as $s)
                                                <option value="{{ $s->id }}" @if( $s->id == $product->brands_id) selected @endif>{{ $s->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="image" id="inputImage"
                                            accept="image/*" oninput="UpdatePreview()"><br>
                                            <img src="{{ asset('images/'.$product->image) }}" id="frame" width="180px" height="180px" class="visibility:hidden;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ url('admin/product') }}" class="btn btn-danger">Close</a>
                                    </div>
                                </div>
                                @else
                                <div class="form-group row">
                                    <label for="inputNama3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama" id="inputNama3"
                                            placeholder="Name" value="{{ $product->nama }}">
                                    </div>
                                    <label for="inputProcessor" class="col-sm-2 col-form-label">Processor</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="prosessor" id="inputProcessor"
                                            placeholder="Processor" value="{{ $product->spec[0]->prosesor }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDeskripsi" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-4">
                                        <textarea class="form-control" name="deskripsi" id="inputDeskripsi"
                                            placeholder="Description" rows="4" style="resize: none">{{ $product->deskripsi }}</textarea>
                                    </div>
                                    <label for="inputGPU" class="col-sm-2 col-form-label">Graphics Card</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="grafis" id="inputGPU"
                                            placeholder="Graphics Card" value="{{ $product->spec[0]->grafis }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputHarga" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" name="harga" id="inputHarga"
                                            placeholder="Price" value="{{ $product->harga }}">
                                    </div>
                                    <label for="inputStorage" class="col-sm-2 col-form-label">Storage</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="storage" id="inputStorage"
                                            placeholder="Storage" value="{{ $product->spec[0]->storage }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputDiscount" class="col-sm-2 col-form-label">Discount</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" class="form-control" name="disc" id="inputDiscount"
                                            placeholder="Discount (0 : No Discount)" min="0" max="100" value="{{ $product->disc*100 }}">
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <label for="inputRAM" class="col-sm-2 col-form-label">RAM</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" class="form-control" name="ram" id="inputRAM"
                                            placeholder="GB" min="0" value="{{ $product->spec[0]->ram }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputTahunRilis" class="col-sm-2 col-form-label">Release Year</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" class="form-control" name="tahun_rilis" id="inputTahunRilis"
                                            placeholder="Year" value="{{ $product->tahun_rilis }}">
                                    </div>
                                    <div class="col-sm-3"></div>
                                    <label for="inputBattery" class="col-sm-2 col-form-label">Battery</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="baterai" id="inputBattery"
                                            placeholder="Battery (in WH)" min="0" value="{{ $product->spec[0]->baterai }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputCategory" class="col-sm-2 col-form-label">Category</label>
                                    <div class="col-sm-4">
                                        <select name="sel_category" id="inputCategory" class="form-control">
                                            <option disabled>--Choose Category--</option>
                                            @foreach ($category as $c)
                                                <option value="{{ $c->id }}" @if( $c->id == $product->categories_id) selected @endif>{{ $c->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="inputWeight" class="col-sm-2 col-form-label">Weight</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" step="0.1" class="form-control" name="berat" id="inputWeight"
                                            placeholder="Kg" min="0" value="{{ $product->spec[0]->berat }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputBrand" class="col-sm-2 col-form-label">Brand</label>
                                    <div class="col-sm-4">
                                        <select name="sel_brand" id="inputBrand" class="form-control">
                                            <option disabled>--Choose Brand--</option>
                                            @foreach ($brand as $s)
                                                <option value="{{ $s->id }}" @if( $s->id == $product->brands_id) selected @endif>{{ $s->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="inputScreen" class="col-sm-2 col-form-label">Screen Size</label>
                                    <div class="col-sm-1 pr-1">
                                        <input type="number" step="0.1" class="form-control" name="layar" id="Screen"
                                            placeholder="inch" min="0" value="{{ $product->spec[0]->layar }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image" id="inputImage"
                                            accept="image/*" oninput="UpdatePreview()"><br>
                                            <img src="{{ asset('images/'.$product->image) }}" id="frame" width="180px" height="180px" class="visibility:hidden;">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ url('admin/product') }}" class="btn btn-danger">Close</a>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function UpdatePreview() {
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        };
    </script>
@endsection
