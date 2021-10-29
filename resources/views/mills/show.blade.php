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
                        <h2> <b> Mills </b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mills </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="/create-products?Mills_id={{$data->id}}" class="btn btn-primary waves-effect waves-light">
                            <i class="fas fa-shopping-cart mr-2"></i> Add Product
                        </a> --}}
                        {{-- <a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add User</span></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <table class="table table-bordered table-striped">

                                            <tr>
                                                <td>Image:</td>
                                                <td>
                                                    @if($data->image)
                                                        <a href="{{$data->image}}" data-fancybox="gallery">
                                                            <img src="{{$data->image}}" alt="" height="250">

                                                            view image
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td> Name:</td><th> {{$data->name  }}</th>
                                            </tr>
                                            <tr>
                                                <td>Owner:</td>
                                                <th> @if($data->user_id)
                                                    <a href="/Millsers/{{$data->user_id}}" >{{$data->getUser()  }}</a>
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Street:</td><th> {{$data->street  }}</th>
                                            </tr>
                                            <tr>
                                                <td> Local Govt Area:</td><th> {{$data->lga  }}</th>
                                            </tr>
                                            <tr>
                                                <td>City:</td><th> {{$data->city  }}</th>
                                            </tr>


                                            <tr>
                                                <td>State:</td><th> {{$data->state  }}</th>
                                            </tr>
                                            <tr>
                                                <td> Capacity:</td><th> {{$data->capacity }}</th>
                                            </tr>
                                            <tr>
                                                <td>Processes:</td><th> {{$data->processes }}</th>
                                            </tr>
                                            <tr>
                                                <td>Description:</td><th> {{$data->description }}</th>
                                            </tr>
                                            @if(!is_null($data->date_created))
                                                <tr>
                                                    <td>Created Date:</td><th> {{$data->date_created  }}</th>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>

                                </div>


                </div>
            </div>
        </div>

        <script>
            $(function () {

                $('#dataTable').DataTable({lengthChange: false,});



            });
        </script>
        <!-- /content area -->
        @endsection

