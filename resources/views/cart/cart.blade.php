@extends('layouts.main')

@section('content')
    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Cart Page</h3>
                    <a href=/"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Cart page</span>

                </div>
            </div>

        </div>
    </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        @if(count($data) > 0)
                            @foreach($data as $object)
                                <div class="col-lg-6 col-sm-6">
                                    <div class="cart-items text-center">
                                        <h3>₦{{ $object->price}}</h3>
                                        <img src="/{{$object->image ?? 'asset/images/noimage.jpeg'}}" alt="product-img" class="img-fluid">
                                        <h4>{{ $object->name}}</h4>
                                        <a href='/cart-delete/{{$object->product_id}}'><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>



                            @endforeach
                        @else
                            <div class="col-lg-6 col-sm-6">
                                <div class="cart-items text-center">
                                    <h3></h3>
                                    <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                    <h4>You cart is empty</h4>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-1"></div>

                <div class="col-lg-5 contact-box">
                    <div class="checkout-box">
                        <div class="row">
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Items</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>{{count($data)}}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Total</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>₦{{number_format($sum, 2, '.', ',')}}</h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                                <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                                <input type="hidden" name="amount" value="{{$sum * 100}}"> {{-- required in kobo --}}
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'cart']) }}" >
                                <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                {{ csrf_field() }}
                                <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                    <span class="f-s--xs">Make Payment </span>
                                </button>


                            </form>
                        </div>
                    </div>
{{--                    <form>--}}
{{--                        <div class="form-group">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-lg-8">--}}
{{--                                    <input type="text" class="form-control" placeholder="Coupon Code">--}}
{{--                                </div>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <button type="submit" class="coupon-btn btn btn-primary">Apply</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </section>


    <section id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h3>Related</h3>
                </div>
            </div>
            <div class="row product-pa">
                <div class="col-lg-12">
                    <div class="product-main">
                        @foreach($products as $product)
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N{{$product->price}}</h3>
                                <img src="{{$product->price ?? 'asset/images/product1.png'}}" alt="product-img" class="img-fluid">
                                <h4>{{$product->name}}</h4>
                                <a href="/cart/{{$product->id}}" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        @endforeach

                        {{--
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N240</h3>
                                <div class="sale">
                                    <span>Sale</span>
                                </div>
                                <img src="asset/images/product2.png" alt="product-img" class="img-fluid">
                                <h4>D-Link Webcam</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N135</h3>
                                <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                <h4>Ober headset</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N99</h3>
                                <div class="sale">
                                    <span>Sale</span>
                                </div>
                                <img src="asset/images/product3.png" alt="product-img" class="img-fluid">
                                <h4>Wired Earphone</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N240</h3>
                                <img src="asset/images/product2.png" alt="product-img" class="img-fluid">
                                <h4>D-Link Webcam</h4>
                                <a href="#" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </section>


    </div>
@endsection