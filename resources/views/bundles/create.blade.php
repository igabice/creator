@extends('layouts.main')

@section('content')

@section('script')
    <script src="/js/tinymce/tinymce.min.js"></script>
    {{--<script src="{{ asset('js/ .min.js') }}"></script>--}}


    <script>
        // $(".select2").select2();

        tinymce.init({
            selector : "textarea",
            height : "480",
            plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
            toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        });

    </script>

    <!-- /content area  | link image jbimages -->
@endsection
    <div class="inner-page">

        <section id="inner-banner">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 heading">
                        <h3>New Bundle</h3>
                    </div>
                </div>


            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 contact-box">
                        <div class="checkout-box">
                            <form class="form-horizontal" method="POST" action="{{ url('/bundles') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                               <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Bundle Name</label>
                                                            <input value="{{old('title')}}" id="title" type="text" class="form-control @if($errors->has('title')) is-invalid @endif" name="title" required autofocus>

                                                            @if($errors->has('title'))
                                                                <span class="text-danger">
                                                                    <strong>{{ $errors->first('title') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input value="{{old('price') ?? 0}}" placeholder="Price" id="price" type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price">
                                                                @if($errors->has('price'))
                                                                    <span class="text-danger">
                                                                        <strong>{{ $errors->first('price') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="former_price">Previous Price</label>
                                                                <input value="{{old('former_price') ?? 0}}" placeholder="Price" id="former_price" type="text" class="form-control @if($errors->has('former_price')) is-invalid @endif" name="former_price">
                                                                @if($errors->has('former_price'))
                                                                    <span class="text-danger">
                                                                        <strong>{{ $errors->first('former_price') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Commission </label>
                                                                <input value="{{old('commission') ?? 0}}" placeholder="Commission" id="commission" type="text" class="form-control @if($errors->has('commission')) is-invalid @endif" name="commission">
                                                                @if($errors->has('commission'))
                                                                    <span class="text-danger">
                                                                        <strong>{{ $errors->first('commission') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">7dc Commission </label>
                                                                <input value="{{old('d_commission') ?? 0}}" placeholder="7DC commission"  type="text" class="form-control @if($errors->has('d_commission')) is-invalid @endif" name="d_commission">
                                                                @if($errors->has('d_commission'))
                                                                    <span class="text-danger">
                                                                        <strong>{{ $errors->first('d_commission') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>




                                                        <div class="form-group label-floating  ">
                                                            <label class="control-label">Description</label>
                                                            <textarea class="form-control" placeholder="Description" name="description">{{old('description')}}</textarea>
                                                        </div>


                                                    </div>


                                                   <div class="col-md-6">
                                                       <div class="col-md-12">
                                                           <div class="form-group label-floating  ">
                                                               <label class="control-label">Image </label>
                                                               <input class="form-control" name="image" id="image"  type="file" />
                                                           </div>

                                                           <div class="form-group">
                                                               <label for="role">Product 1</label>
                                                               <select name="product_1" required class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                               <select name="product_3"  class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                               <select name="product_4"  class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                               <select name="product_5"  class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                               <select name="product_6"  class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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
                                                               <select name="product_7"  class="form-control">
                                                                   <option value=""></option>
                                                                   @foreach($products as $product)
                                                                       <option value="{{$product->id}}">{{$product->name}}</option>
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




                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </section>



    </div>

@endsection