@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Request Payouts</b></h2>
                        <ol class="breadcrumb mb-0">
                         </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <br>
        <div class="card-group col-md-10 offset-md-1">
            <!-- Card -->

            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Pending  </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> {{ $pending != null ?  $pending->amount : '0.0'}}</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: black">
                        <i class="fa fa-wallet" style="color: white"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Wallet</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> N{{$wallet->balance}}</h2>
                            <a href="#" style="color: white"><h6>view </h6></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: black">
                        <i class="fa fa-wallet" style="color: white"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Referral Bonus</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> N{{$wallet->referral_bonus}}</h2>
                            <a href="#" style="color: white"><h6>view </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">
            <div class="row">

                    <div class="col-md-6">
                        @if($user->id_verified == 0)
                        <p style="color:red">*Profile completion and Identity Verification should be met before withdrawal can commence*</p>
                        @endif
                        <form class="form-horizontal" method="POST" action="{{ url('/request-payouts') }}" enctype="multipart/form-data">
                            @csrf
                            <input value="{{$user->id}}" id="user_id" type="hidden" name="user_id">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
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
                                </div>

                            </div>
                        </form>
                        <p> approved payouts wil be made to:<br> <b> {{$user->account_name}} {{$user->account_number}} ({{$user->bank}})</b> </p>

                    </div>
                    <div class="col-md-6">
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

    <script>
        $(".select2").select2();


    </script>

    <!-- /content area -->
@endsection
