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
                    <h2>Orders <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    {{-- <a href="/create-products" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-user-plus mr-2"></i> Add Withdrawal
                    </a> --}}
                    {{--<a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add Tv Hosts</span></a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-group">
            <!-- Card -->
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> This Month </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> {{$monthData}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Today </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> {{$todayData}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> This Week</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> {{$weekData}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: white">
                        <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Previous Month</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> {{$prevMonthData}}</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Cost</th>
                <th>Buyer</th>
                {{-- <th>Seller</th> --}}
                <th>Delivery Info</th>
                <th>Ordered On</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $object)
                    <td>{{ $object->getProduct()->name}} </td>
                    <td>{{ $object->quantity }}</td>
                    <td>{{ $object->quantity * $object->getProduct()->price }}</td>
                    <td>{{ $object->getBuyer()->name}} {{ $object->getBuyer()->last_name}}</td>
                    {{-- <td>{{ $object->getSeller()}} </td> --}}
                    <td>{{ $object->delivery_address}} </td>
                    <td>{{ $object->created_at}} </td>
                    {{--<td> {{ $object->created_at}} </td>--}}
                    <td>
                        <form  action='/orders/{{$object->id}}' method="POST">
                            @method('DELETE')
                            {{csrf_field()}}
                            {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                            {{-- <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $object->id) }}"> Edit  </a>
                            <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $object->id) }}"> View</a> --}}
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



    });
</script>
<!-- /content area -->
@endsection
