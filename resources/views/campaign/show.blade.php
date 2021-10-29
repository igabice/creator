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
    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Products</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="/create-orders?product_id={{$data->id}}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-shopping-cart mr-2"></i> Add Order
                        </a> --}}
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#make-order">
                            <i class="fas fa-user-plus mr-2"></i> Make Order
                        </a>
                        {{-- <a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add User</span></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-5">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <td>Images:</td>
                                                <td>
                                                    @if($data->image != null)
                                                        <a href="{{$data->image}}" data-fancybox="gallery">
                                                            <img src="{{$data->image}}" alt="" height="250">

                                                            view image
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Name:</td><th> {{$data->name  }}</th>
                                            </tr>
{{--                                            <tr>--}}
{{--                                                <td>Quantity:</td><th> {{$data->quantity }}</th>--}}
{{--                                            </tr>--}}
                                            <tr><td>Available Quantity:</td><th> {{$data->quantity - $data->quantity_sold }}</th></tr>
{{--                                            <tr>--}}
{{--                                                <td>Unit:</td><th> {{$data->unit }}</th>--}}
{{--                                            </tr>--}}
                                            <tr>
                                                <td>Price:</td><th> {{$data->price  }}</th>
                                            </tr>
                                            <tr><td>Delivery Fee:</td><th> {{$data->delivery_fee == 0 ? 'Free' : $data->delivery_fee }}</th></tr>

                                        </table>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Orders</h4>
                                        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Buyer</th>
                                                <th>Quantity</th>
                                                <th>Cost</th>
                                                <th>Delivery Info</th>
                                                <th>Created</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($orders as $object)
                                                <tr>
                                                    <td>{{ $object->getBuyer()->name}} {{ $object->getBuyer()->last_name}}</td>
                                                    <td>{{ $object->quantity }}</td>
                                                    <td>{{ $object->quantity * $data->price }}</td>
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


                </div>
            </div>
        </div>

        <div id="make-order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{url('/orders')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Make an Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-striped">
                                <tr><td>Name:</td><th> {{$data->name  }}</th></tr>
                                <tr><td>Available Quantity:</td><th> {{$data->quantity - $data->quantity_sold }}</th></tr>
                                <tr><td>Unit:</td><th> {{$data->unit }}</th></tr>
                                <tr><td>Price:</td><th> {{$data->price  }}</th></tr>
                                <tr><td>Delivery Fee:</td><th> {{$data->delivery_fee == 0 ? 'Free' : $data->delivery_fee }}</th></tr>

                            </table>
                            <div class="form-group  ">
                                <label for="title">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" max="{{$data->quantity - $data->quantity_sold}}">
                            </div>
                            <div class="form-group">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type" id="payment_type" required class="form-control select2">
                                    <option value="Litres">Bank Transfer</option>
                                    <option value="Bottles">Card Payment</option>
                                </select>
                            </div>
                            <div  class="form-group">
                                <label for="delivery_address">Delivery Information</label><br>
                                <textarea name="delivery_address" id="delivery_address" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="product_id" value="{{$data->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
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

                });



            });
        </script>
    </div>
@endsection
