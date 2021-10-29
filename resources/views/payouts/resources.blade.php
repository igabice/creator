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
                    <h2>Marketing Resources <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Marketing Resources</li>
                    </ol>
                </div>
                <div class="col-sm-6">
{{--                    <a href="/create-product" class="btn btn-primary waves-effect waves-light">--}}
{{--                        <i class="fas fa-user-plus mr-2"></i> Add Products--}}
{{--                    </a>--}}
                    {{--<a href="{{route('user_edit',0)}}" class="btn btn-primary waves-effect waves-light new-user"><i class="ion ion-md-add-circle"></i> <span>Add Tv Hosts</span></a>--}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <tbody>

                <tr>
                    <td>
{{--                        <a href="/users/{{$object->user_id}}">{{ $object->getUser()}}</a> --}}
                      <div class="row">
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                        <div class="col-md-3">
                            <iframe width="100%" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

                            </iframe>
                        </div>
                    </div>
                    </td>
                </tr>

            </tbody>
        </table>

{{--        <a class="btn btn-outline-success btn-sm" data-index="{{$loop->iteration -1}}"--}}
{{--           data-toggle="modal" data-target="#actionPayout"> <i class="fa fa-eye" ></i></a>--}}
    </div>
</div>

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



<script>

    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,

        });

        {{--var app = @json($data);--}}

        {{--$('#actionPayout').on('shown.bs.modal', function (e) {--}}
        {{--    var i = $(e.relatedTarget).data('index');--}}
        {{--    console.log(i);--}}
        {{--    $("#main-content")--}}
        {{--        .html('<table class="table table-bordered table-striped"><tr><td>First Name:</td><th>'+ app[i].name  +'</th></tr>'+--}}
        {{--            '<tr><td>Last Name:</td><th>'+ app[i].last_name +'</th></tr>\n' +--}}
        {{--            '<tr><td>Amount:</td><th>'+ app[i].amount  +'</th></tr>\n' +--}}
        {{--            '<input type="hidden" name="pid" value="'+ app[i].pid +'">' +--}}
        {{--            '<input type="hidden" name="verified" value="1">' +--}}
        {{--            '<input type="hidden" name="approved_by" value="{{Auth::user()->id}}">' +--}}
        {{--            '<input type="hidden" name="user_id" value="'+ app[i].user_id +'">' +--}}
        {{--            '\n' +--}}
        {{--            '                            </table>');--}}
        {{--    //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');--}}
        {{--});--}}


    });
</script>
<!-- /content area -->
@endsection
