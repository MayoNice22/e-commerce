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
            <div class="row mt-2">
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center d-flex justify-content-center">
                                <div class="text-center col-10 ml-6">
                                    <h1>Administration</h1>
                                </div>
                                <div class="text-center ml--7">
                                    <a href="#createForm" class="btn btn-success" data-toggle="modal"><i
                                            class="fas fa-plus"></i> Create Employee</a>
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
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $p)
                                        <tr id="tr_{{ $p->id }}">
                                            <td class="align-middle">{{ $loop->iteration }}</td>
                                            <td class="align-middle">{{ $p->name }}</td>
                                            <td class="align-middle">{{ $p->email }}</td>
                                            @if ($p->banned_till == null)
                                                <td class="align-middle">Active</td>
                                            @else
                                                <td class="align-middle">Suspended until :
                                                    {{ date('j F Y', strtotime($p->banned_till)) }}</td>
                                            @endif
                                            <td class="align-middle">
                                                @if ($p->banned_till == null)
                                                    <a href="{{ url('suspendUser/' . $p->id) }}" class="btn btn-danger"><i
                                                            class="fa fa-ban"></i></a>
                                                @endif

                                                @if ($p->banned_till != null)
                                                    <a href="{{ url('unban/' . $p->id) }}" class="btn btn-success"><i
                                                            class="fas fa-key"></i></a>
                                                @endif
                                                <a href="#refreshPassword" class="btn btn-info"
                                                    onclick="getDataFirst({{ $p->id }});" data-toggle="modal"><i
                                                        class="fas fa-refresh"></i></a>
                                            </td>
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
    <div class="modal fade" id="createForm" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Create Employee</h4>
                </div>
                <div class="modal-body" id="modalCreateForm">
                    <form action="{{ route('user.store') }}" method="POST">
                        <div class="form-group">
                            @csrf
                            <label>Employee Name</label>
                            <input type="text" class="form-control" name="name">
                            <small class="form-text text-muted">Input your employee name</small><br>
                            <label>Employee Email</label>
                            <input type="email" class="form-control" name="email">
                            <small class="form-text text-muted">Input your employee email</small>
                            <label>Employee Password</label>
                            <input type="password" class="form-control" name="password">
                            <small class="form-text text-muted">Input your employee password</small>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Save Changes</button>
                </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="refreshPassword" tabindex="-1" role="basic" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Refresh Password</h4>
                </div>
                <div class="modal-body" id="modalEdit">

                </div>
                <div class="modal-footer">
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
                url: '{{ route('user.getEditFormOnly') }}',
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
        $('body').on('keyup','#password,#confirm_password',function(){
            let pass1 = $('#password').val();
            let pass2 = $('#confirm_password').val();
            if(pass1 != pass2){
                $('#txtWarning').html('Password doesnt match!');
                $('#btnSubmit').attr('disabled',true);
                
            }else{
                $('#txtWarning').html('');
                $('#btnSubmit').attr('disabled',false);

            }
        });
    </script>
@endsection
