@extends('layouts.main')

@section('content')
@section('script')

    <script>
        $(document).ready(function(){


        });
    </script>

@endsection
    <div class="inner-page">

        <?php
        $user = auth()->user();
        ?>


        <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Course Detail</h3>

                    </div>
                </div>

            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="cart-items text-center">

                            <img src="{{$data->image ?? 'asset/images/noimage.jpeg'}}" alt="product-img" class="img-fluid">
                            <h4>{{ $data->name}}</h4>
{{--
  <a href='/cart-delete/{{$data->product_id}}'><i class="fa fa-times" aria-hidden="true"></i></a>--}}
                            <div class="checkout-box">
                                <div class="row">
                                    @if(session()->has('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Well done!</strong> {{ session()->get('success') }}
                                        </div>
                                    @endif
                                    <div class="col-lg-12 checkout-item">


                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>Title</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4>{{$data->name}}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>Price</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4>{{$data->price}}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>Commission</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4>{{$data->commission}}</h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-4 col-lg-4 col-sm-4">
                                                <h3>7DC Commission</h3>
                                            </div>
                                            <div class="col-8 col-lg-8 col-sm-8 text-right">
                                                <h4>{{$data->d_commission}}</h4>
                                            </div>
                                        </div>
                                    </div>


                                    @if($own == null)
                                    <form method="POST" action="{{ route('buyBundle') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        @if($user)
                                            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                                        @else
                                            <label for="email">Confirmation Email</label>
                                            <input type="email" required name="email" placeholder="Email">
                                        @endif
                                        <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                                        <input type="hidden" name="amount" value="{{$data->price +10}}">
                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                            @if(isset(request()->ref))
                                            <input type="hidden" name="ref_id" value="{{request()->ref}}">
                                            @else
                                                <input type="hidden" name="ref_id" value="7">
                                            @endif

                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'cart']) }}" >
                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                        {{ csrf_field() }}
                                        <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                            <span class="f-s--xs">Buy Bundle </span>
                                        </button>
                                    </form>
                                        @endif
                                </div>
                                <br>
                                {{$user->affiliate}}
                                @if($user->affiliate != 1 && $refferal < 1)


{{--                                    <a class="btn btn-sm btn-outline-warning" href="/campaign" data-toggle="modal" data-target="#make-campaign" title="Sell this course">--}}
{{--                                        Sell this bundle--}}
{{--                                    </a>--}}
                                    @endif

{{--                                <a class="btn btn-sm btn-outline-warning" href="/campaign" data-toggle="modal" data-target="#make-campaign" title="Sell this course">--}}
{{--                                    Sell this bundle--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 contact-box">
                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">


                                    <h4>Courses</h4>
                                    <div class="row">

                                        @foreach($products as $object)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="cart-items text-center">
                                                    <h3>₦{{ $object->price}}</h3>
                                                    <img src="{{$object->image ?? 'asset/images/noimage.jpeg'}}" alt="product-img" class="img-fluid">
                                                    <a href="/products/{{$object->id}}" class="product-btn" style="color: white"><h4>{{ $object->name}}</h4></a>
                                                    {{--                                            <a href='/product-delete/{{$object->product_id}}' ><i class="fa fa-times"  title="Delete" aria-hidden="true"></i></a>--}}

                                                    {{--                                            <a href="/cart/{{$object->id}}" class="product-btn">Add to Cart</a>--}}
                                                    @if(auth()->user() != null)

                                                        @if(auth()->user()->role == 'A')
                                                            <a href="/products/{{$object->id}}/edit" class="product-btn" style="color: orangered">EDIT</a>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </section>


{{--        <section id="product">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12 heading">--}}
{{--                        <h3>Related</h3>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row product-pa">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="product-main">--}}
{{--                            @foreach($products as $product)--}}
{{--                                <div class="col-lg-3 text-center">--}}
{{--                                    <div class="product-item">--}}
{{--                                        <h3>N{{$product->price}}</h3>--}}
{{--                                        <img src="{{$product->price ?? 'asset/images/product1.png'}}" alt="product-img" class="img-fluid">--}}
{{--                                        <h4>{{$product->name}}</h4>--}}
{{--                                        <a href="/cart/{{$product->id}}" class="product-btn">Add to Cart</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}

{{--                            --}}{{----}}
{{--                            <div class="col-lg-3 text-center">--}}
{{--                                <div class="product-item">--}}
{{--                                    <h3>N240</h3>--}}
{{--                                    <div class="sale">--}}
{{--                                        <span>Sale</span>--}}
{{--                                    </div>--}}
{{--                                    <img src="asset/images/product2.png" alt="product-img" class="img-fluid">--}}
{{--                                    <h4>D-Link Webcam</h4>--}}
{{--                                    <a href="#" class="product-btn">Add to Cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3 text-center">--}}
{{--                                <div class="product-item">--}}
{{--                                    <h3>N135</h3>--}}
{{--                                    <img src="asset/images/product1.png" alt="product-img" class="img-fluid">--}}
{{--                                    <h4>Ober headset</h4>--}}
{{--                                    <a href="#" class="product-btn">Add to Cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3 text-center">--}}
{{--                                <div class="product-item">--}}
{{--                                    <h3>N99</h3>--}}
{{--                                    <div class="sale">--}}
{{--                                        <span>Sale</span>--}}
{{--                                    </div>--}}
{{--                                    <img src="asset/images/product3.png" alt="product-img" class="img-fluid">--}}
{{--                                    <h4>Wired Earphone</h4>--}}
{{--                                    <a href="#" class="product-btn">Add to Cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3 text-center">--}}
{{--                                <div class="product-item">--}}
{{--                                    <h3>N240</h3>--}}
{{--                                    <img src="asset/images/product2.png" alt="product-img" class="img-fluid">--}}
{{--                                    <h4>D-Link Webcam</h4>--}}
{{--                                    <a href="#" class="product-btn">Add to Cart</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
            <div id="make-campaign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{url('/campaign')}}" method="post">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Create campaign for this product?</h5>
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

            <div id="actionPayout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{url('/video-edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myModalLabel">Edit Video</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body" id="main-c">

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