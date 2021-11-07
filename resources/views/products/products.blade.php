@extends('layouts.main')

@section('content')
    <div class="inner-page">

        <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h3>Courses Page</h3>
                        <div class="col-lg-2">
                            @if(auth()->user() != null)
                                @if(auth()->user()->role == 'A'  || auth()->user()->verified == '1')

                                    <a href="/create-product" class="coupon-btn btn btn-primary"><i style="color: white">Add Product</i></a>
                                @endif
                            @endif

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{session('success')}}</strong>
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>{{session('error')}}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            @if(count($data) > 0)
                                @foreach($data as $object)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="cart-items text-center">
                                            <img src="{{$object->image ?? 'asset/images/noimage.jpeg'}}" alt="product-img" class="img-fluid">
                                            <a href="/products/{{$object->id}}" class="product-btn" style="color: white"><h4 style="color: white">{{ $object->name}}</h4></a>
                                            <h5 style="color: orange">₦{{ $object->price}} <small style="color: grey; text-decoration: line-through">₦{{ $object->former_price}}</small></h5>

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
                            @else
                                <div class="col-lg-6 col-sm-6">
                                    <div class="cart-items text-center">
                                        <h3></h3>
                                        <img src="asset/images/product1.png" alt="product-img" class="img-fluid">

                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>
@endsection