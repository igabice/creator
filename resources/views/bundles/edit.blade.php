@extends('layouts.main')

@section('content')
    <div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Edit Bundle</h3>
                    </div>
                </div>
            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 contact-box">
                        <div class="checkout-box">
                            @if($errors->all())
                                @foreach ($errors->all() as $error)
                                    <p class="text text-center text-danger"> {{$error}} </p>
                                @endforeach
                            @endif

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
                            <form class="form-horizontal" method="POST" action="{{ url('/bundles-update') }}" enctype="multipart/form-data">

                                <input value="{{$data->id}}" type="hidden" name="id">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input value="{{$data->title}}" id="name" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" required >
                                                    @if($errors->has('title'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input value="{{$data->price ?? 0}}" id="price" type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price" >
                                                    @if($errors->has('price'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('price') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="former_price">Previous Price</label>
                                                    <input value="{{$data->former_price ?? 0}}" id="former_price" type="text" class="form-control @if($errors->has('former_price')) is-invalid @endif" name="former_price" >
                                                    @if($errors->has('former_price'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('former_price') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Commission </label>
                                                    <input value="{{$data->commission ?? 0}}" id="commission" type="text" class="form-control @if($errors->has('commission')) is-invalid @endif" name="commission" >
                                                    @if($errors->has('commission'))
                                                        <span class="text-danger">
                                                                        <strong>{{ $errors->first('commission') }}</strong>
                                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">7dc Commission </label>
                                                    <input value="{{$data->d_commission ?? 0}}" id="d_commission" type="text" class="form-control @if($errors->has('d_commission')) is-invalid @endif" name="d_commission" >
                                                    @if($errors->has('d_commission'))
                                                        <span class="text-danger">
                                                                        <strong>{{ $errors->first('d_commission') }}</strong>
                                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Description</label>
                                                    <textarea class="form-control" placeholder="Description" name="description">{{$data->description ?? 0}}</textarea>
                                                    @if($errors->has('description'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                               {{--
                                                @if(auth()->user()->role == 'A')
                                                    <div class="form-group">
                                                        <label for="verified">Verify</label>
                                                        <select name="verified" id="verified" required class="form-control">
                                                                <option value="1"
                                                                @if($data->verified == 1)
                                                                    selected
                                                                @endif
                                                                >Yes</option>
                                                                <option value="0"
                                                                @if($data->verified == 0)
                                                                    selected
                                                                @endif
                                                                >No</option>

                                                        </select>
                                                        @error('verified')
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('verified') }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                @endif
                                                --}}

                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group label-floating  ">
                                                <label class="control-label">Image 1</label>
                                                <input class="form-control" name="image" id="image"  type="file" />
                                                <a href="{{$data->image}}" data-lightbox="roadtrip" data-title="Gallery">
                                                    view image</a>
                                            </div>

                                            <div class="form-group">
                                                <label for="role">Product 1</label>
                                                <select name="product_1" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                        @if($product->id == $data->product_1)
                                                            selected
                                                         @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_1'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_1') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 2</label>
                                                <select name="product_2" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_2)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_2'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_2') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 3</label>
                                                <select name="product_3" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_3)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_3'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_3') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 4</label>
                                                <select name="product_4" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_4)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_4'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_4') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 5</label>
                                                <select name="product_5" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_5)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_5'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_5') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 6</label>
                                                <select name="product_6" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_6)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_6'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_6') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Product 7</label>
                                                <select name="product_7" required class="form-control">
                                                    <option value=""></option>
                                                    @foreach($products as $product)
                                                        <option value="{{$product->id}}"
                                                                @if($product->id == $data->product_7)
                                                                selected
                                                                @endif
                                                        >{{$product->name}}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('product_7'))
                                                    <span class="text-danger">
                                                            <strong>{{ $errors->first('product_7') }}</strong>
                                                        </span>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="form-group row m-t-20">

                                            <div class="col-sm-6 col-md-12 text-left">
                                                <button class="btn coupon-btn btn-primary " type="submit">SUBMIT</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>



    </div>

@endsection