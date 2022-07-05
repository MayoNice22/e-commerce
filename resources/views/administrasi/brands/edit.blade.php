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
                                    <h1 class="mb-0">Edit Brand</h1>
                                </div>
                            </div>
                        </div>
                        <div class="scroller m-4" data-rail-visible="1" data-rail-color="yellow"
                            data-handle-color="#a1b2bd">
                            <form action="{{ route('brand.update',['brand'=>encrypt($brand->id)]) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label for="inputNama3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="nama" id="inputNama3"
                                            placeholder="Name" value="{{ $brand->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputImage" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-4">
                                        <input type="file" class="form-control" name="image" id="inputImage"
                                            accept="image/*" oninput="UpdatePreview()"><br>
                                            <img src="{{ asset('images/'.$brand->image) }}" id="frame" width="180px" height="180px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="{{ url('admin/brand') }}" class="btn btn-danger">Close</a>
                                    </div>
                                </div>
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
