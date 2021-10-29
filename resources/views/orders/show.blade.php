@extends('backpack::layout')

@section('header')
    <section class="content-header">
        <h1>
            Meter Model<small> Detail</small>
        </h1>
    </section>
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    {{--<a class="btn btn-success" id="new_level" ><span class="fa fa-plus-circle"></span> Add Class</a>--}}
                </div>
                <div class="box-body">
                    <table width="100%" class="table table-striped" style=" text-transform: capitalize;">
                        <tr><th >Name:</th> <th  >{{ $data->name }}</th></tr>
                        <tr><th></th><td>
                            <form  action='/meter-model/{{$data->id}}' method="POST">
                                @method('DELETE')
                                {{csrf_field()}}
                                <div  class=" ">
                                    <button type="submit " class="btn btn-danger">Delete</button>
                                </div>
                            </form></td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('after_styles')
    <!-- DATA TABLES -->

    <link href="{{ asset('vendor/adminlte/') }}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/') }}/responsive.bootstrap.scss" />
    <link href="{{ asset('css/') }}/responsive.dataTables.scss" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/backpack/crud/css/list.css') }}">

    <!-- CRUD LIST CONTENT - crud_list_styles stack -->
    @stack('crud_list_styles')
@endsection

@section('after_scripts')
    <!-- DATA TABLES SCRIPT -->
    <script  src="{{ asset('vendor/adminlte/bower_components/datatables.net/js/jquery.dataTables.js') }}" ></script>
    <script src="{{ asset('vendor/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}" ></script>
    {{-- <script rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" ></script>
     <script rel="stylesheet" href="{{ asset('vendor/adminlte/') }}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" ></script>
   --}}
    {{--<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>--}}
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap.js') }}"></script>

    <script src="{{ asset('vendor/backpack/crud/js/crud.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/form.js') }}"></script>
    <script src="{{ asset('vendor/backpack/crud/js/list.js') }}"></script>
    <script>
        $(function () {
            var optionss = {
                'paging': true,
                'responsive': true,
                'lengthChange': false,
                'searching': true,
                'ordering': true,
                'info': true,
                'autoWidth': true
            };
            $('#example1').DataTable(optionss);
        })
    </script>

    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    {{--@stack('crud_list_scripts')--}}
@endsection
