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
                    <h2>Notification <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Notification</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <a href="/create-post" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-send mr-2"></i> Send Notification
                    </a>
{{--                    <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#upload-law">--}}
{{--                        <i class="fas fa-upload mr-2"></i> Upload Notification--}}
{{--                    </a>--}}

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
                    <th>Created By</th>
                    <th>Date Published</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $object)
                    <tr>
                        <td>{{ $object->title}}</td>
                        <td>{{ $object->getUser()}}</td>
                        <td>{{ $object->created_at}} </td>
{{--                        <td>{{$object->getSubSections()}}</td>--}}

                        <td>
                            <form  action='/posts/{{$object->id}}' method="POST">
                                @method('DELETE')
                                {{csrf_field()}}
                                 <a class="btn btn-outline-success btn-sm" href="{{ route('posts.show', $object->id) }}"> View</a>
                            </form></td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

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
