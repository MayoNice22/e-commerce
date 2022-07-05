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
                            <div class="row align-items-center d-flex justify-content-center">
                                <div class="text-center col-10 ml-6">
                                    <h1>Master Category</h1>
                                </div>
                                <div class="text-center ml--7">
                                    <a href="#createModal" data-toggle="modal" class="btn btn-success"><i
                                            class="fas fa-plus"></i> Create Category</a>
                                </div>
                            </div>
                        </div>
                        <div class="scroller m-4" data-rail-visible="1" data-rail-color="yellow"
                            data-handle-color="#a1b2bd">
                            <table class="table text-center" id="table-user">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $p)
                                        <tr id="tr_{{ $p->id }}">
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="editable align-middle" id="td_nama_{{ $p->id }}">
                                                {{ $p->nama }}</td>
                                            <td class="align-middle"><a href="#editModals" data-toggle="modal"
                                                    onclick="getDataFirst({{ $p->id }});" class="btn btn-danger "><i
                                                        class="fas fa-pen"></i> Edit</a>
                                                <form action="{{ route('category.destroy', $p->id) }}" method="POST"
                                                    style="display: inline">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a class="btn btn-info"
                                                        onclick="if(confirm('Are you sure to delete this record?')) deleteDataRemoveTR({{ $p->id }})"><i
                                                            class="fa fa-trash"></i> Delete</a>
                                            </td>
                                            </form>

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

@section('modal')
    <div class="modal fade" id="createModal" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create Category</h4>
                </div>
                <div class="modal-body" id="modalCreateForm">
                    <form action="{{ route('category.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Nama Category</label>
                            <input type="text" class="form-control" name="nama">
                            <small class="form-text text-muted">Input category name</small><br>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Save Changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- EDIT Category --}}
    <div class="modal fade" id="editModals" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body" id="modalEdit">

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#table-user').DataTable();
        });

        function getDataFirst(id) {
            $.ajax({
                type: 'GET',
                url: '{{ route('category.getEditFormOnly') }}',
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#modalEdit').html(data.msg);
                },
                error: function(xhr) {
                    console.log(xhr);
                }
            });
        }

        function deleteDataRemoveTR(id) {
            $.ajax({
                type: 'POST',
                url: '{{ route('category.deleteData') }}',
                data: {
                    '_token': '<?php echo csrf_token(); ?>',
                    'id': id
                },
                success: function(data) {
                    if (data.status == 'ok') {
                        alert(data.msg);
                        $('#tr_' + id).remove();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        }

        $(".editable").editable({
            closeOnEnter: true,
            callback: function(data) {
                if (data.content) {
                    var id_data = data.$el[0].id
                    var field = id_data.split('_')[1]
                    var id = id_data.split('_')[2]

                    $.post('{{ route('category.saveDataField') }}', {
                            _token: "<?php echo csrf_token(); ?>",
                            id: id,
                            field: field,
                            value: data.content
                        },
                        function(data) {
                            if (data.status == 'oke') {
                                $('#tr_' + id_data).remove();
                            }
                            alert(data.msg);
                        });
                }
            }
        });
    </script>
@endsection
