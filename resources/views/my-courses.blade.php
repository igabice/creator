@extends('layouts.main')

@section('content')

@section('css')
    <link href='asset/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
@endsection

@section('script')

    <script src='asset/datatables/jquery.dataTables.min.js'></script>
    <script src='asset/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='asset/datatables/dataTables.buttons.min.js'></script>
    <script src='asset/datatables/buttons.bootstrap4.min.js'></script>
    <script src='asset/datatables/dataTables.responsive.min.js'></script>
    <script src='asset/datatables/responsive.bootstrap4.min.js'></script>


    <!--<script src="asset/datatables/buttons.bootstrap4.min.js"></script>-->
    <script src="asset/datatables/jszip.min.js"></script>
    <script src="asset/datatables/pdfmake.min.js"></script>
    <script src="asset/datatables/vfs_fonts.js"></script>
    <script src="asset/datatables/buttons.html5.min.js"></script>
    <script src="asset/datatables/buttons.print.min.js"></script>
    <script src="asset/datatables/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function(){

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

    @endsection


    <div class="inner-page">




        <section id="inner-banner">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 heading">
                        <h3>My Courses</h3>
                    </div>
                </div>


            </div>
        </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="color: white">
                    <div class="col-lg-3 col-sm-12" style="color: white">

                        @if( auth()->user()->verified == 1 || auth()->user()->role == 'A')
                            Verified: <i class="fa fa-check-circle" style="color: green"></i>

                            Not verified: <i class="fa fa-ban" style="color: red"></i>


                            <a href="/create-product" class="coupon-btn btn btn-primary"><i style="color: white">Add Product</i></a>
                            <br>
                            <br>
                        @endif
                    </div>


                            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Commission</th>
                                    <th>7DC Commission</th>
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
                                        <td>{{$user->price}}</td>
                                        <td>{{$user->commission}}</td>
                                        <td>{{$user->d_commission}}</td>
                                        <td>@if($user->verified == 1)
                                                yes
                                            @else
                                                no
                                            @endif
                                        </td>
                                        <td>
                                            <form  action='/products/{{$user->id}}' method="POST">
                                                @method('DELETE')
                                                {{csrf_field()}}
                                                {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                                @if(auth()->user()->role == 'A' || auth()->user()->id == $user->id)
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $user->id) }}"> Edit  </a>
                                                @endif

                                                <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $user->id) }}"> View</a>

                                            </form></td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>


                </div>

            </div>
        </div>
    </section>




    </div>




@endsection