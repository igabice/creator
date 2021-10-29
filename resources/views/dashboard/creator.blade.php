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
                    <h2><b> Welcome to </b> AffiliateNg</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">
                                @if($user->role == 'C')
                                    Creator
                                @elseif($user->role == 'M')
                                    Affiliate
                                @else
                                    Admin
                                @endif
                                Dashboard</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <a href="/create-product" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-shopping-basket mr-2"></i> Add Products
                    </a>
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
         <div class="col-sm-6">
                    <a href="https://wa.me/+2348038574070"  target="_blank" class="btn btn-success ">
                        <i class="fas fa-chat"></i> TECH SUPPORT
                    </a>
                    <a href="https://wa.me/+2348170940000"  target="_blank" class="btn btn-warning">
                        <i class="fas fa-calendar-plus "></i> MEMBER SUPPORT
                    </a>
                </div>
        <div class="card-group">
            
            <!-- Card -->
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-shopping-cart" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Products </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> {{count($products)}}</h2>
{{--                            <a href="#" style="color: white"><h6>view all</h6></a>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Campaigns </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> {{count($campaigns)}}</h2>
{{--                            <a href="#" style="color: white"><h6>view all</h6></a>--}}
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="card">--}}
{{--                <div class="card-body dark-bg">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <div class="m-r-10">--}}
{{--                            <span class="btn btn-circle btn-lg " style="background-color: black">--}}
{{--                                <i class="fa fa-shopping-cart " style="color: white"></i>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <h5 style="color: white"> Products</h5>--}}
{{--                        </div>--}}
{{--                        <div class="ml-auto">--}}
{{--                            <h2 class="m-b-0 font-light" style="color: white"> {{count($products)}}</h2>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
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
                            <a href="#" style="color: black"><h6> </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9 cta-contents">
                <h4 class="cta-title"> <i class=" btnn btn btn-primary" title="click to copy" data-clipboard-text="{{request()->root()}}/register?ref={{$user->id}}">click to copy referral link:  {{request()->root()}}/register?ref={{$user->id}}</i></h4>
            </div>
        </div>
        <center>
            <div class="embed-responsive embed-responsive-16by9 col-md-6 ">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mYHSw_Tr3Bc" allowfullscreen></iframe>
            </div>
            <!--QOk65-c8_F0-->
        </center>
        @if($user->verified == 0)
            <div class="alert alert-primary">
                <div class="row">
                    <div class="col-md-9 cta-contents">
                        <h4 class="cta-title">Become a verified 7D Affiliate!</h4>
                        <div class="cta-desc">
                            <p>Get Verified today to:</p>
                            <ul>
                                <li>gain access to a range of marketing tutorials and resources that'll boost your sales. </li>
                                <li>Get ₦5,000 referral bonus for every new user that registers using your referral link.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <br>

                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                            <input type="hidden" name="amount" value="1000000"> {{-- required in kobo --}}
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'verification']) }}" >
                            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                            {{ csrf_field() }}
                            <button class="btn btn-lg btn-block btn-primary" type="submit" value="Pay Now!">
                                <span class="f-s--xs">Go for it! </span><i class="fa fa-check-circle"></i>
                            </button>


                        </form>

                    </div>
                </div>
            </div>


        @endif



{{--        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                --}}{{--                <th>Image</th>--}}
{{--                <th>Name</th>--}}
{{--                <th>Price</th>--}}
{{--                <th>Commission</th>--}}
{{--                <th>Owner</th>--}}
{{--                <th>Last Updated</th>--}}
{{--                <th>Action</th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            @foreach($products as $object)--}}
{{--                <tr>--}}
{{--                    --}}{{--                    <td>{{ $object->image}} </td>--}}
{{--                    <td>{{ $object->name}} </td>--}}
{{--                    <td>{{ $object->price}} </td>--}}
{{--                    <td>{{ $object->commission}} </td>--}}
{{--                    <td>{{ $object->getUser()}} </td>--}}
{{--                    <td>{{ $object->updated_at}} </td>--}}
{{--                    --}}{{--<td> {{ $object->created_at}} </td>--}}
{{--                    <td>--}}
{{--                        <form  action='/products/{{$object->id}}' method="POST">--}}
{{--                            @method('DELETE')--}}
{{--                            {{csrf_field()}}--}}
{{--                            --}}{{--<button type="submit" class="btn btn-danger"> X </button>--}}
{{--                        </form>--}}
{{--                        <a class="btn btn-outline-primary btn-sm" href="{{ route('products.edit', $object->id) }}"> Edit  </a>--}}
{{--                        <a class="btn btn-outline-success btn-sm" href="{{ route('products.show', $object->id) }}"> View</a>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            @endforeach--}}
{{--            </tbody>--}}
{{--        </table>--}}
    </div>
</div>

{{--<div id="upload-cro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
{{--<div class="modal-dialog">--}}
{{--<form action="{{url('/cro-upload')}}" method="post" enctype="multipart/form-data">--}}
{{--@csrf--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title mt-0" id="myModalLabel">Upload CRO File</h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--<div class="form-group">--}}
{{--<label>--}}
{{--Upload a CSV file in the order of Middle name, First name, Surname, Phone number, Email Address, Service Centre, Meter Book, Feeder Name, DSS Name, DSS Rating, Department, Account Type, TeamLead Email, BHM Email <span><br/><small>Possible account types are </small><span>--}}
{{--</label>--}}
{{--<input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>--}}
{{--<button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>--}}
{{--</div>--}}
{{--</div><!-- /.modal-content -->--}}
{{--</form>--}}
{{--</div><!-- /.modal-dialog -->--}}
{{--</div>--}}
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
            // columns: [
            //     {data: 'first_name'},
            //     {data: 'middle_name'},
            //     {data: 'last_name'},
            //     {data: 'email'},
            //     {data: 'phone'},
            //     {data: 'department_name', name:'departments.name'},
            //     {data: 'account_name', name:'account_types.name'},
            //     {data: 'role_name', name:'account_types.name'},
            //     {data: 'store_name', name:'stores.name'},
            //     {data: 'status_name',name:'status.name'},
            //     {data: 'action', orderable: false, searchable: false}
            // ]
        });

        // $('#dataTable').on('click', '.btn-delete[data-remote]', function (e)
        // {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var url = $(this).data('remote');
        //     // confirm then
        //     if (confirm('Are you sure you want to delete this?')) {
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             dataType: 'json',
        //             data: {method: '_DELETE', submit: true}
        //         }).always(function (data) {
        //             $('#dataTable').DataTable().draw(false);
        //         });
        //     } else
        //         alert("You have cancelled!");
        // });

    });
</script>
<!-- /content area -->
@endsection
