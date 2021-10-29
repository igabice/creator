@extends('layouts.main')

@section('content')
    <div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Edit Product</h3>
                        <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Edit Product</span>
                    </div>
                </div>
            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 contact-box">
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
                            <form class="form-horizontal" method="POST" action="{{ url('/products-update') }}" enctype="multipart/form-data">

                                <input value="{{$data->id}}" type="hidden" name="id">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input value="{{$data->name}}" id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" required >
                                                    @if($errors->has('name'))
                                                        <span class="text-danger">
                                                                    <strong>{{ $errors->first('name') }}</strong>
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
                                                    <label for="price">Commission (%)</label>
                                                    <input value="{{$data->commission ?? 0}}" id="commission" type="text" class="form-control @if($errors->has('commission')) is-invalid @endif" name="commission" >
                                                    @if($errors->has('commission'))
                                                        <span class="text-danger">
                                                                        <strong>{{ $errors->first('commission') }}</strong>
                                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">7dc Commission (%)</label>
                                                    <input value="{{$data->d_commission ?? 0}}" id="d_commission" type="text" class="form-control @if($errors->has('d_commission')) is-invalid @endif" name="d_commission" >
                                                    @if($errors->has('d_commission'))
                                                        <span class="text-danger">
                                                                        <strong>{{ $errors->first('d_commission') }}</strong>
                                                                    </span>
                                                    @endif
                                                </div>





                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">Image 1</label>
                                                    <input class="form-control" name="image" id="image"  type="file" />
                                                    <a href="{{$data->image}}" data-lightbox="roadtrip" data-title="Gallery">
                                                        view image</a>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="form-group row m-t-20">

                                            <div class="col-sm-6 text-left">
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