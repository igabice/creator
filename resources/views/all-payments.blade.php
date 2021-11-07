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
        });
    </script>

    @endsection


    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 heading">
                        <h3>Payments</h3>
                    </div>
                </div>
            </div>
        </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <table id="dataTable" class="table  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Item</th>
                            <th>Amount</th>
                            <th>Reference</th>
                            <th>Type</th>
                            <th>Channel</th>
                            <th>Response</th>
                            <th>Date</th>
{{--                            <th>Action</th>--}}
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($payment as $object)
                            <tr>
                                <td>
                                    <a href="/users/{{$object->user_id}}">{{ $object->name}} {{$object->last_name}}</a>
                                </td>
                                @if($object->payment_type == 'bundle')
                                <td>
                                    <a href="/bundles/{{$object->item}}">view item</a>
                                </td>
                                @else
                                    <td>
                                    <a href="/products/{{$object->item}}">view item</a>
                                </td>
                                @endif

                                <td>
                                    {{ $object->amount}}
                                </td>
                                <td>
                                    {{$object->reference}}
                                </td>
                                <td>
                                    {{$object->payment_type}}
                                </td>
                                <td>
                                    {{$object->channel}}
                                </td>
                                <td>{{ $object->gateway_response}} </td>
                                <td>{{ $object->updated_at}} </td>
{{--                                <td>--}}
{{--                                    @if($object->verified == 0)--}}
{{--                                        <a class="btn btn-outline-success btn-sm" data-index="{{$loop->iteration -1}}"--}}
{{--                                           data-toggle="modal" data-target="#actionPayout"> <i class="fa fa-eye" > </i></a>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </section>



        <div id="actionPayout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="{{url('/approve-payout')}}" method="post">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Approve Payout?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" id="main-content">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>

    </div>




@endsection