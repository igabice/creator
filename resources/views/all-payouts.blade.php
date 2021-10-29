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

            $('#dataTable').DataTable({
                serverSide: false,
                processing: false,
                responsive: true,
                lengthChange: true,


            });

            var app = @json($data);

            $('#actionPayout').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');
                console.log(i);
                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>First Name:</td><th>'+ app[i].name  +'</th></tr>'+
                        '<tr><td>Last Name:</td><th>'+ app[i].last_name +'</th></tr>\n' +
                        '<tr><td>Amount:</td><th>'+ app[i].amount  +'</th></tr>\n' +
                        '<input type="hidden" name="pid" value="'+ app[i].pid +'">' +
                        '<input type="hidden" name="verified" value="1">' +
                        '<input type="hidden" name="approved_by" value="{{Auth::user()->id}}">' +
                        '<input type="hidden" name="user_id" value="'+ app[i].user_id +'">' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });


        });
    </script>

    @endsection


    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Payouts</h3>
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
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Account</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $object)
                            <tr>
                                <td><a href="/users/{{$object->user_id}}">{{ $object->getUser()}}</a> </td>
                                <td>
                                    @if($object->verified == 0)
                                        {{ $object->amount}}
                                    @else
                                        {{ $object->amount - ($object->amount*0.01)}}
                                    @endif
                                </td>
                                <td>
                                    @if($object->verified == 0)
                                        <p style="background-color: orange; width: 60px; color: white; padding: 5px; border-radius: 10px" ><small>Pending</small></p>
                                    @else
                                        <p style="background-color: darkgreen; width: 60px; color: white; padding: 5px; border-radius: 10px" ><small>Paid</small></p>
                                    @endif
                                </td>
                                <td>{{ $object->getAccount()}} </td>
                                <td>{{ $object->updated_at}} </td>
                                <td>
                                    @if($object->verified == 0)
                                        <a class="btn btn-outline-success btn-sm" data-index="{{$loop->iteration -1}}"
                                           data-toggle="modal" data-target="#actionPayout"> <i class="fa fa-eye" > </i></a>
                                    @endif
                                </td>
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