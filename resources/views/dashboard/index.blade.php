@extends('layouts.main')

@section('content')
@section('css')
    <link href='asset/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
@endsection

@section('script')
    {{--
    @if()
     @elseif($user->id == auth()->user()->id)
     @end
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
    <script>function display_ct6() {
            var x = new Date()
            var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
            hours = x.getHours( ) % 12;
            hours = hours ? hours : 12;
            var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear();
            x1 = x1 + " - " +  hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
            document.getElementById('ct6').innerHTML = x1;
            display_c6();
        }
        function display_c6(){
            var refresh=1000; // Refresh rate in milli seconds
            mytime=setTimeout('display_ct6()',refresh)
        }
        display_c6()
    </script>
@endsection


<div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 heading">
                    @if( auth()->user() == null)
                        <h3>Profile</h3>
                    @elseif($user->id == auth()->user()->id)
                        <h3>Dashboard</h3>
                    @else
                        <h3>Profile</h3>
                    @endif

                </div>
            </div>

            <?php

            $wallet = $user->myWallet()

            ?>


        </div>
    </section>

        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5">
                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">

                                        <div class="col-12 col-lg-12 col-sm-12">
                                            @if(session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>Well done!</strong> {{ session()->get('success') }}
                                                </div>
                                            @endif
                                            <div class="game-item text-center">
                                                <div class="game-img">
                                                    <img src="{{$user->image}}" alt="game-img" class="img-fluid">
                                                    <div class="lightbox-overlay">
                                                        <a href="{{$user->image}}" data-lightbox="roadtrip" data-title="Gallery"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <br>
                                            <h3>Full Name</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <br>
                                            <h4>
                                                {{$user->name  }} {{$user->middle_name  }} {{$user->last_name  }}
                                                @if($user->image != null)
                                                    <a href="{{$user->image}}" data-lightbox="roadtrip" data-title="Gallery">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>

                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Email</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                {{$user->email  }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Phone</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                {{$user->phone  }}
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> ID Card</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                @if($user->id_card)
                                                        <a href="{{$user->id_card}}" data-lightbox="roadtrip" data-title="Gallery">
                                                            click to view document</a>
                                                @endif
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Social Links</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">

                                            <div class="footer-social">
                                                @if($user->facebook)  <a href="{{$user->facebook}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>@endif
                                                @if($user->twitter)  <a href="{{$user->twitter}}"><i class="fa fa-twitter" aria-hidden="true"></i></a>@endif
                                                @if($user->instagram)  <a href="{{$user->instagram}}"><i class="fa fa-instagram" aria-hidden="true"></i></a>@endif
                                                @if($user->linkedin)  <a href="{{$user->linkedin}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a>@endif


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(auth()->user() != null)
                                    @if($user->id == auth()->user()->id || auth()->user()->role == 'A')
                                    <a class="main-btn btn-c-white" href="{{ route('users.edit', $user->id) }}">
                                        <span class="f-s--xs">Edit Profile </span>
                                    </a>
                                    @endif
                                @endif

                            </div>
                            <br><br>
                            @if($user->verified == 0 && auth()->user()->role == 'A')
                                <a class="btn btn-sm btn-outline-success" href="/approve/{{$user->id}}" title="verify user?">
                                    Click to verify this user
                                </a>
                            @endif
                            &nbsp;
                            @if($user->is_kyc == 0 && auth()->user()->role == 'A')
                                <a class="btn btn-sm btn-outline-warning" href="/approve-kyc/{{$user->id}}" title="verify KYC?">
                                    Click to approve KYC details
                                </a>

                            @endif
                        </div>

                        <div class="row">
                           {{--
                            @if(count($data) > 0)
                                <h4>My Courses</h4>
                                @foreach($data as $object)
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="cart-items text-center">
                                            <h3>₦{{ $object->price}}</h3>
                                            <img src="/{{$object->image ?? 'asset/images/noimage.jpeg'}}" alt="product-img" class="img-fluid">
                                            <h4>{{ $object->name}}</h4>
                                        </div>
                                    </div>
                                @endforeach
                            @else

                            @endif
                            --}}


                        </div>

                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">

                                       @if($user->verified != 1)
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h2 style="color: lightgrey">Become a creator</h2>
                                                <br>
                                                <p style="color: lightgrey">Make a payment of N36,000 Yearly fees and you can start selling your own courses</p>
                                                <br>
                                                <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                    @if(auth()->user())
                                                        <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                                                    @else
                                                        <label for="email">Confirmation Email</label>
                                                        <input type="email" required name="email" placeholder="Email">
                                                    @endif
                                                    <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                                                    <input type="hidden" name="amount" value="36000"> {{-- required in kobo --}}
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'creator']) }}" >
                                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                                    {{ csrf_field() }}
                                                    <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                                        <span class="f-s--xs">Pay Now </span>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif

                                           @if($user->affiliate != 1)
                                        <div class="col-12 col-lg-12 col-sm-12">

                                            Become a 7D Affiliate


                                            <h2 style="color: lightgrey">Become a 7D Affiliate</h2>
                                            <br>
                                            <p style="color: lightgrey"> Want to start earning from selling courses and other products? Register as an Affiliate.
                                                Learn and Earn while at it.</p>
                                            <br>
                                            @if(auth()->user()->role == 'A')
{{--                                                    <form method="POST" action="{{ route('pay-affiliate') }}" accept-charset="UTF-8" class="form-horizontal" role="form">--}}
                                                    <form method="GET" action="{{ route('callbackAff') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                        <input type="hidden" name="user_id" value="{{$user->id}}">

                                                        {{ csrf_field() }}
                                                        <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                                            <span class="f-s--xs">Approve Affiliate </span>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form method="POST" action="{{ route('pay-affiliate') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                        {{--                                            <form method="GET" action="{{ route('callbackAff') }}" accept-charset="UTF-8" class="form-horizontal" role="form">--}}
                                                        @if(auth()->user())
                                                            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                                                        @else
                                                            <label for="email">Confirmation Email</label>
                                                            <input type="email" required name="email" placeholder="Email">
                                                        @endif
                                                        <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                                                        <input type="hidden" name="amount" value="10500"> {{-- required in kobo --}}
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="currency" value="NGN">
                                                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'creator']) }}" >
                                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                                        {{ csrf_field() }}
                                                        <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                                            <span class="f-s--xs">Register (10,500) </span>
                                                        </button>
                                                    </form>
                                                @endif
                                        </div>
                                               @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 ">
                        @if(auth()->user() == null)
                            @if($user->verified == '1')
                            <div class="contact-box">

                                <div class="checkout-box">
                                    <div class="row">

                                        <div class="col-lg-12 checkout-item">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h3> About Creator</h3>
                                                </div>
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h4>
                                                        {{$user->about}}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif

                        @elseif($user->id == auth()->user()->id || auth()->user()->role == 'A')
                        <div class="contact-box">

                            <div class="checkout-box">
                                <div class="row">

                                    @if($user->verified == '1')
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h3> About Creator</h3>
                                            </div>
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h4>
                                                    {{$user->about}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>


                                    @endif
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Total Sales</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    {{$wallet->sales}}
{{--                                                    {{$totalEarnings == null ? 0 : $totalEarnings[0]->id_count}}--}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Sales Worth</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦{{ $wallet->worth  }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div class="col-lg-12 checkout-item">--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-8 col-lg-8 col-sm-8">--}}
{{--                                                <h3> Total Commission</h3>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-4 col-lg-4 col-sm-4 text-right">--}}
{{--                                                <h4>--}}
{{--                                                    ₦{{$user->myWallet()->referral_bonus  }}--}}
{{--                                                </h4>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Available Balance</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦{{$wallet->balance  }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Total Earnings</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦{{ $wallet->referral_bonus }}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-6 col-lg-6 col-sm-6">
                                                <a class="main-btn btn-c-white" href="/my-payouts">
                                                    <span class="f-s--xs">My Payouts </span>
                                                </a>
                                            </div>
                                            <div class="col-6 col-lg-6 col-sm-6 text-right">
                                                <span id='ct6' style="color: lightgrey"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>


                                </div>
                            </div>
                        </div>
                        @else
                            <div class="contact-box">

                                <div class="checkout-box">
                                    <div class="row">

                                        <div class="col-lg-12 checkout-item">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h3> About Creator</h3>
                                                </div>
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h4>
                                                        {{$user->about}}
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($user->affiliate == 1 && ($user->id == auth()->user()->id || auth()->user()->role == 'A'))
                        <div class="contact-box">

                            <div class="checkout-box">
                                <div class="row">

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">

                                                <h3 style="color: lightgrey">Sales in Ongoing Month ({{count($campaigns)}})</h3>

                        {{--                                            <i class=" btnn btn btn-warning" title="click to copy" data-clipboard-text="{{request()->root()}}/register?ref={{$user->id}}">click to copy referral link:  {{request()->root()}}/register?ref={{$user->id}}</i>--}}

                                                <table id="dataTable" class="table   dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <tbody>

                                                    @foreach($campaigns as $object)
                                                        <tr>
                                                            {{--                    <td>{{ $object->image}} </td>--}}
                                                            <td><a style="color:#fff;" href="/products/{{$object->product_id}}">{{ $object->name}} - {{ $object->price}}</a>
                                                                <button class="btn btnn" title="click to copy"
                                                                        data-clipboard-text="{{ url('/')}}/refer-product/{{$object->id}}/?ref={{$user->id}}">
                                                                    <i class="fa fa-book" style="color: orangered"> copy link</i>
                                                                </button>
                                                            <br>
                                                                <div class="row">
                                                                    <div class="col-6 col-lg-6 col-sm-6">
                                                                        <h4> commission: {{ $object->commission}}</h4>
                                                                    </div>
                                                                    <div class="col-6 col-lg-6 col-sm-6 text-right">
                                                                        <h4>
                                                                            <small>{{ $object->created_at}}</small>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    @foreach($bundles_campaigns as $object)
                                                        <tr>
                                                            {{--                    <td>{{ $object->image}} </td>--}}
                                                            <td><a style="color:#fff;" href="/products/{{$object->product_id}}">{{ $object->title}} - {{ $object->price}}</a>
                                                                <button class="btn btnn" title="click to copy"
                                                                        data-clipboard-text="{{ url('/')}}/refer-bundle/{{$object->id}}/?ref={{$user->id}}">
                                                                    <i class="fa fa-book" style="color: orangered"> copy link</i>
                                                                </button>
                                                            <br>
                                                                <div class="row">
                                                                    <div class="col-6 col-lg-6 col-sm-6">
                                                                        <h4> commission: {{ $object->commission}}</h4>
                                                                    </div>
                                                                    <div class="col-6 col-lg-6 col-sm-6 text-right">
                                                                        <h4>
                                                                            <small>{{ $object->created_at}}</small>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            @endif
</div>

</div>
</div>
</section>


</div>

@endsection