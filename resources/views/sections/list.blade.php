@extends('layouts.app')

@section('content')

@section('css')
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
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
                    <h2>Laws <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laws</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <a href="/create-laws" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-user-plus mr-2"></i> Add Laws
                    </a>
                    {{--<a href="{{route('user_edit',0 class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add Tv Hosts</span></a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Citation</th>
                    <th>Enactment</th>
                    @if(Auth::user()->role == 'admin')<th>State</th>@endif
                    <th>Date Published</th>
                    <th>Sub Sections</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $object)
                    <tr>
                        <td>{{ $object->long_title}} </td>
                        <td>{{ $object->citation}} </td>
                        <td>{{ $object->enactment}} </td>
                        @if(Auth::user()->role == 'admin')<td>{{$object->getState()}}</td>@endif
                        <td>{{ $object->date_published}} </td>
                        <td>{{$object->getSubSections()}}</td>

                        <td>
                            <form  action='/Laws/{{$object->id}}' method="POST">
                                @method('DELETE')
                                {{csrf_field()}}
                                {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('laws.edit', $object->id) }}"> Edit  </a>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('laws.show', $object->id) }}"> View</a>
                            </form></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

{{--<div id="upload-cro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog">--}}
        {{--<form action="{{url('/cro-upload' method="post" enctype="multipart/form-data">--}}
            {{--@csrf--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title mt-0" id="myModalLabel">Upload CRO File</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<div class="form-group">--}}
                        {{--<label>--}}
                            {{--Upload a CSV file in the order of Middle name, First name, Surname, Phone number, Email Address, Service Centre, Meter Book, Feeder Name, DSS Name, DSS Rating, Department, Account Type, TeamLead Email, BHM Email <span><br/><small>Possible account types are </small><span>--}}
                        {{--</label>--}}
                        {{--<input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>--}}
                    {{--<button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>--}}
                {{--</div>--}}
            {{--</div><!-- /.modal-content -->--}}
        {{--</form>--}}
    {{--</div><!-- /.modal-dialog -->--}}
{{--</div>--}}
<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,
            {{--ajax: {--}}
               {{--// url: "{{route('load_user_data',--}}
                {{--type: "POST",--}}
                {{--data:{ _token: "{{csrf_token(},--}}
            {{--},--}}
            // columns: [
            //     {data: 'first_name'},
            //     {data: 'middle_name'},
            //     {data: 'last_name'},
            //     {data: 'email'},
            //     {data: 'phone'},
            //     {data: 'department_name', name:'departments.name'},
            //     {data: 'account_name', name:'account_types.name'},
            //     {data: 'role_name', name:'account_types.name'},
            //     {data: 'store_name', name:'stores.name'},
            //     {data: 'status_name',name:'status.name'},
            //     {data: 'action', orderable: false, searchable: false}
            // ]
        });

        // $('#dataTable').on('click', '.btn-delete[data-remote]', function (e)
        // {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var url = $(this).data('remote');
        //     // confirm then
        //     if (confirm('Are you sure you want to delete this?')) {
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             dataType: 'json',
        //             data: {method: '_DELETE', submit: true}
        //         }).always(function (data) {
        //             $('#dataTable').DataTable().draw(false);
        //         });
        //     } else
        //         alert("You have cancelled!");
        // });

    });
</script>
<!-- /content area -->
@endsection
