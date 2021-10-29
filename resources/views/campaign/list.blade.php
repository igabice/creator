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
                    <h2>Campaigns <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Campaigns</li>
                    </ol>
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
{{--                <th>Image</th>--}}
                <th>Product Name</th>
                <th>Price</th>
                <th>Commission</th>
                <th>Referral Link</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $object)
                <tr>
{{--                    <td>{{ $object->image}} </td>--}}
                    <td>{{ $object->name}} </td>
                    <td>{{ $object->price}} </td>
                    <td>{{ $object->commission}} </td>

                    <td>
                        <button class="btn btnn" title="click to copy"
                                data-clipboard-text="{{ url('/')}}/refer-product/{{$object->id}}/?ref={{$object->user_id}}">
                            {{ url('/')}}/refer-product/{{$object->id}}/?ref={{$object->user_id}}
                        </button>
                        <button class="btn btnn" title="click to copy"
                                data-clipboard-text="{{ url('/')}}/refer-product/{{$object->id}}/?ref={{$object->user_id}}">
                            <i class="fa fa-book"></i>
                        </button>
                    </td>
                    {{--<td> {{ $object->created_at}} </td>--}}
                    <td>
                        <form  action='/products/{{$object->id}}' method="POST">
                            @method('DELETE')
                            {{csrf_field()}}
                            {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                        </form>

                        <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $object->id) }}"> View</a>
                    </td>
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
               {{--// url: "{{route('load_user_data')}}",--}}
                {{--type: "POST",--}}
                {{--data:{ _token: "{{csrf_token()}}"},--}}
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



        function clicked() {

            this.className = 'copied';
            var td = this;
            setTimeout(function() {
                td.className = '';
            }, 1000)
            // -------      up to here      -------
        }

    });
</script>
<!-- /content area -->
@endsection
