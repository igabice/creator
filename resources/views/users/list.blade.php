@extends('layouts.app')

@section('content')

@section('css')
    <link href='plugins/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src='plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='plugins/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.buttons.min.js'></script>
    <script src='plugins/datatables/buttons.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.responsive.min.js'></script>
    <script src='plugins/datatables/responsive.bootstrap4.min.js'></script>
    
    
    <!--<script src="plugins/datatables/buttons.bootstrap4.min.js"></script>-->
    <script src="plugins/datatables/jszip.min.js"></script>
    <script src="plugins/datatables/pdfmake.min.js"></script>
    <script src="plugins/datatables/vfs_fonts.js"></script>
    <script src="plugins/datatables/buttons.html5.min.js"></script>
    <script src="plugins/datatables/buttons.print.min.js"></script>
    <script src="plugins/datatables/buttons.colVis.min.js"></script>
@endsection


@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <strong>Well done!</strong> {{ session()->get('success') }}
</div>
@endif
<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>{{$user->title}} <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <div class="col-sm-6">
{{--                    <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#upload-user">--}}
{{--                        <i class="fas fa-user-plus mr-2"></i> Upload User Manifest--}}
{{--                    </a>--}}
                    @if($user->role == 'A')
                    <a href="/create-user" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-user-plus mr-2"></i> Create User
                    </a>
                    @endif
                    {{-- <a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add User</span></a> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">

    <div class="card-body">

        @if( auth()->user()->role == 'A')
        Verified: <i class="fa fa-check-circle" style="color: green"></i>

            Not verified: <i class="fa fa-ban" style="color: red"></i>
        @endif


        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <th></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $user)
                    <tr>
                        <td>{{$user->name}}

                            @if($user->verified == 1)
                                <i class="fa fa-check-circle" style="color: green"></i>
                                @else
                                <i class="fa fa-ban" style="color: red"></i>
                           @endif
                        </td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>@if($user->verified == 1)
                        yes
                        @else
                        no
                        @endif
                        </td>
                        <td>
                            <form  action='/mills/{{$user->id}}' method="POST">
                                @method('DELETE')
                                {{csrf_field()}}
                                {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                @if(auth()->user()->role == 'A' || auth()->user()->id == $user->id)
                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('users.edit', $user->id) }}"> Edit  </a>
                                @endif

                                <a class="btn btn-outline-success btn-sm" href="{{ route('users.show', $user->id) }}"> View</a>

                            </form></td>
                    </tr>
                    @endforeach
            </tbody>

        </table>
    </div>
</div>

<div id="upload-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{url('/users-upload')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload User File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a CSV file in the order of First name, Middle name, Surname, Phone number, Email Address, Location, Department,  and Account Type <span><br/><small>Possible account types are </small><span>
                        </label>
                        <input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>

<script>
$(function () {
    var table = $('#dataTable').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false,
        dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],
    });
    
    yadcf.init(table, [
                {column_number : 4, filter_default_label: "VERIFIED", filter_match_mode: "exact"},
            ]);




});
</script>
<!-- /content area -->
@endsection
