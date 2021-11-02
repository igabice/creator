@extends('layouts.main')

@section('content')
@section('css')
    <link href='asset/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{--
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
    --}}
@endsection


<div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 heading">
                    <h3>My Payouts</h3>
                </div>
            </div>


        </div>
    </section>

    <section id="cart-view">
        <div class="container">
            <div class="row">

                <div class="col-lg-6">
                    <div class="checkout-box">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Well done!</strong> {{ session()->get('success') }}
                            </div>
                        @endif
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissable">
                                    {!! session('error') !!}
                                </div>
                            @endif

                        @if($user->id_verified == 1)
                            <div class="row">
                                <p style="color:red">*Profile completion and Identity Verification should be met before withdrawal can commence*

                                </p>
                                <br>

                            </div>

                            <a class="main-btn btn-c-white" href="/users/{{$user->id}}/edit">
                                <span class="f-s--xs">Edit Profile </span>
                            </a>

                        @else
                            <form class="form-horizontal" method="POST" action="{{ url('/request-payouts') }}" enctype="multipart/form-data">
                                @csrf
                                <input value="{{$user->id}}" id="user_id" type="hidden" name="user_id">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <label for="amount">Amount</label>
                                                    <input  id="amount" type="number" class="form-control @if($errors->has('amount'))is-invalid @endif"
                                                            max="200000" min="24000" name="amount" required >

                                                    @if($errors->has('amount'))
                                                        <span class="text-danger">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input id="password" type="password"
                                                           class="form-control @if($errors->has('password')) is-invalid @endif" name="password">
                                                    @if($errors->has('password'))
                                                        <span class="text-danger">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group row m-t-20">

                                            <div class="col-sm-6 text-left ">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </form>
                            <p> approved payouts wil be made to:<br> <b> {{$user->account_name}} {{$user->account_number}} ({{$user->bank}})</b> </p>
                        @endif



                    </div>


                </div>

                <div class="col-lg-1"></div>

                <div class="col-lg-5 ">
                    <div class="contact-box">
                        <div class="checkout-box">
                            <div class="row">

                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h3> Pending Payout</h3>
                                        </div>
                                        <div class="col-4 col-lg-4 col-sm-4 text-right">
                                            <h4>
                                                {{ $pending != null ?  $pending->amount : '0.0'}}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h3> Available Balance</h3>
                                        </div>
                                        <div class="col-4 col-lg-4 col-sm-4 text-right">
                                            <h4>
                                                ₦{{$user->getWallet()  }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>

                                <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        {{--                <th>Image</th>--}}
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($payouts as $object)
                                        <tr>
                                            {{--                    <td>{{ $object->image}} </td>--}}
                                            <td>{{ $object->amount}} </td>
                                            <td>{{ $object->created_at}} </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>


</div>

@endsection
