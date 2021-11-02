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
                        <h3>All Users</h3>
                    </div>
                </div>
            </div>
        </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="color: white">
                    <div class="col-lg-6">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Well done!</strong> {{ session()->get('success') }}
                            </div>
                        @endif
                    </div>

                      @if( auth()->user()->role == 'A')
                                Verified: <i class="fa fa-check-circle" style="color: green"></i>

                                Not verified: <i class="fa fa-ban" style="color: red"></i>
                            @endif


                            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email Address</th>
                                    <th>Phone No.</th>
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
                                        <td>{{$user->last_name}}
                                        </td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>@if($user->verified == 1)
                                                yes
                                            @else
                                                no
                                            @endif
                                        </td>
                                        <td>
                                            <form  action='/mills/{{$user->id}}' method="POST">
                                                @method('DELETE')
                                                {{csrf_field()}}
                                                {{--<button type="submit" class="btn btn-danger"> X </button>--}}
                                                @if(auth()->user()->role == 'A' || auth()->user()->id == $user->id)
                                                    <a class="btn btn-outline-primary btn-sm" href="{{ route('users.edit', $user->id) }}"> Edit  </a>
                                                @endif

                                                <a class="btn btn-outline-success btn-sm" href="{{ route('users.show', $user->id) }}"> View</a>

                                                @if($user->verified == 0 && auth()->user()->role == 'A')
                                                    <a class="btn btn-sm btn-outline-warning" href="/approve/{{$user->id}}" title="verify user?">
                                                        verify?
                                                    </a>
                                                @endif
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