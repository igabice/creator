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

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Products <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
{{--                <div class="col-sm-6">--}}
{{--                    <a href="/create-product" class="btn btn-primary waves-effect waves-light">--}}
{{--                        <i class="fas fa-user-plus mr-2"></i> Add Products--}}
{{--                    </a>--}}
{{--                    --}}{{--<a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add Tv Hosts</span></a>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th>Image</th>--}}
{{--                <th>Name</th>--}}
{{--                <th>Price</th>--}}
{{--                <th>Commission</th>--}}
{{--                <th>Owner</th>--}}
{{--                <th>Last Updated</th>--}}
{{--                <th>Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
            <tbody>
            @foreach($data as $object)


                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="/products/{{$object->id}}" class="text-center">
                            <img src="/{{$object->image ?? 'images/noimage.jpeg'}}"
                                 alt="Bootstrap shopping cart table example"
                                 title="Bootstrap shopping cart table example"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <h5 class="shop-thumb__title">
                                {{$object->name}}
                            </h5>
                            <div class="shop-thumb__price">
                                {{ $object->price}}
                            </div>
                            <div class="pt-15 b-t text-right">
                                <div class="row align-items-center">
                                    <div class="col-12">
                                        <a href="/cart/{{$object->id}}"
                                           class="btn btn-success btn-icon btn-icon-right btn-sm">
                                            <i class="fa fa-plus"></i> Add to Cart </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


{{--                <tr>--}}
{{--                    {{$loop->index+1}}--}}
{{--                    <td>{{ $object->image}} </td>--}}
{{--                    <td>{{ $object->name}} </td>--}}
{{--                    <td>{{ $object->price}} </td>--}}
{{--                    <td>{{ $object->commission}} </td>--}}
{{--                    <td>{{ $object->getUser()}} </td>--}}
{{--                    <td>{{ $object->updated_at}} </td>--}}
{{--                    --}}{{--<td> {{ $object->created_at}} </td>--}}
{{--                    <td>--}}
{{--                        <form  action='/products/{{$object->id}}' method="POST">--}}
{{--                            @method('DELETE')--}}
{{--                            {{csrf_field()}}--}}
{{--                            --}}{{--<button type="submit" class="btn btn-danger"> X </button>--}}
{{--                        </form>--}}
{{--                        <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $object->id) }}"> Edit  </a>--}}
{{--                        <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $object->id) }}"> View</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
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
