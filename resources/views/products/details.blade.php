@extends('layouts.main')

@section('content')
@section('script')

    <script>
        $(document).ready(function(){

            var app = @json($videos);

            $('#actionPayout').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');

                $("#main-c")
                    .html('<input type="hidden" name="id" value="'+ app[i].id +'">' +
                            '<label>Title</label><br>'+
                        '<input type="text" style="color: black" name="title" placeholder="Title" class="form-control" value="'+ app[i].title +'"><br>' +
                        '<label>Description</label><br>'+
                        '<input type="text" style="color: black" name="description" placeholder="Description" class="form-control" value="'+ app[i].description +'"><br>' +
                        '<input type="file" name="file" >' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });



            $('#make-campaign').on('shown.bs.modal', function (e) {

                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>Name:</td><th>{{ $data->name}}</th></tr>'+
                        '<tr><td>Price:</td><th>{{$data->price}}</th></tr>\n' +
                        '<tr><td>Commission:</td><th>{{$data->commission}}</th></tr>\n' +
                        '<input type="hidden" name="product_id" value="{{$data->id }}">' +
                        '<input type="hidden" name="user_id" value="{{$user != null ? $user->id : ''}}">' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });

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
                        <a href=/"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Course Detail</span>

                    </div>
                </div>

            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="cart-items text-center">
                            <h3>₦{{ $data->price}}</h3>
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

                                    {{--                                <div class="col-lg-12 checkout-item">--}}
                                    {{--                                    <div class="row">--}}
                                    {{--                                        <div class="col-4 col-lg-4 col-sm-4">--}}
                                    {{--                                            <h3>Total</h3>--}}
                                    {{--                                        </div>--}}
                                    {{--                                        <div class="col-4 col-lg-4 col-sm-4 text-right">--}}
                                    {{--                                            <h4>₦{{number_format($sum, 2, '.', ',')}}</h4>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}

                                    @if($own == null)
                                    <form method="POST" action="{{ route('buyCourse') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                                        @if($user != null)
                                            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                                            <input type="hidden" name="orderID" value="{{$user->email.\Illuminate\Support\Facades\Date::now()}}">
                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['user_id' => $user->id, 'type' => 'cart']) }}" >
                                        @else
                                            <label for="email">Confirmation Email</label>
                                            <input type="email" required name="email" placeholder="Email">
                                            <input type="hidden" name="orderID" value="{{random_int(12,234).\Illuminate\Support\Facades\Date::now()}}">
                                            <input type="hidden" name="metadata" value="{{ json_encode($array = ['type' => 'course']) }}" >
                                        @endif
                                        <input type="hidden" name="amount" value="{{$data->price +10}}">
                                        <input type="hidden" name="product_id" value="{{$data->id}}">
                                            @if(isset(request()->ref))
                                            <input type="hidden" name="ref_id" value="{{request()->ref}}">
                                            @else
                                                <input type="hidden" name="ref_id" value="7">
                                            @endif

                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}

                                        {{ csrf_field() }}
                                        <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                            <span class="f-s--xs">Make Payment </span>
                                        </button>
                                    </form>
                                        @endif
                                </div>
                                <br>
                                @if($user != null)
                                    @if($user->affiliate != 1 && $refferal < 1)


                                        <a class="btn btn-sm btn-outline-warning" href="/campaign" data-toggle="modal" data-target="#make-campaign" title="Sell this product">
                                            Sell product
                                        </a>
                                    @endif
                                @endif




{{--                                <a class="btn btn-sm btn-outline-warning" href="/campaign" data-toggle="modal" data-target="#make-campaign" title="Sell this course">--}}
{{--                                    Sell this course--}}
{{--                                </a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-5 contact-box">
                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    @if($user != null)
                                        @if($user->role == 'A')
                                        <h4>Add Video</h4>
                                        <form class="form-horizontal" method="POST" action="/video-add" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                            <div class="form-group">
                                                                <input value="{{old('title')}}" placeholder="Title" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" required autocomplete="title" autofocus>

                                                                @if($errors->has('title'))
                                                                    <span class="text-danger">
                                                                        <strong>{{ $errors->first('title') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>

                                                            <input name="course_id" value="{{$data->id}}"  type="hidden" />

                                                            <div class="form-group label-floating  ">
                                                                <label class="control-label">Video File</label>
                                                            <!--<input value="{{old('file')}}" id="file" type="text" class="form-control @if($errors->has('file')) is-invalid @endif" name="file" required >-->
                                                                <input class="form-control" name="file" id="image"  type="file" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input value="{{old('description')}}" placeholder="Description" id="description" type="text" class="form-control" name="description" >
                                                            </div>
                                                            <input type="hidden" name="status" value="closed">
                                                            <button class="btn btn-primary btn-sm" type="submit">SUBMIT</button>

                                                        </div>
                                                <br>
                                            </div>

                                        </form>

                                            <h4>Course Videos</h4>
                                            <table class="table table-bordered table-striped">
                                                @foreach($videos as $video)
                                                    <tr><th>
                                                            @if($own != null || auth()->user()->role == 'A')

                                                                @if($video->status == 'yes')
                                                                    <a href="{{$data->file}}" data-lightbox="roadtrip" data-title="Gallery">
                                                                        @else
                                                                            <a  href="#" >
                                                                                @endif



                                                                                {{$loop->index +1}}.   {{$video->title  }}
                                                                            </a>
                                                                            @if(auth()->user()->role == 'A')
                                                                                <a class="btn btn-outline-success btn-sm" data-index="{{$loop->iteration -1}}"
                                                                                   data-toggle="modal" data-target="#actionPayout"> Edit</a>
                                                                @endif
                                                            @endif
                                                        </th>
                                                    </tr>
                                                @endforeach


                                            </table>
                                        @endif
                                    @endif


                                </div>
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
                                <h5 class="modal-title mt-0" id="myModalLabel">Sell this product?</h5>
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