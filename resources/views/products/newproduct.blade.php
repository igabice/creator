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
                        <h3>Add Product</h3>
                    </div>
                </div>


            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-9 contact-box">
                        <div class="checkout-box">
                            <form class="form-horizontal" method="POST" action="{{ url('/products') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input value="{{old('name')}}" placeholder="Name" id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" required autocomplete="name" autofocus>

                                                            @if($errors->has('name'))
                                                                <span class="text-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                            @endif
                                                        </div>


                                                        @if(request()->type == 'course')

                                                            <input name="type" value="{{request()->type}}"  type="hidden" />
                                                            <input name="price" value="0"  type="hidden" />
{{--                                                            <input name="commission" value="0"  type="hidden" />--}}
                                                            <input name="link" value="0"  type="hidden" />

{{--                                                            <div class="form-group">--}}
{{--                                                                <label for="name">Link</label>--}}
{{--                                                                <input value="{{old('link')}}" placeholder="Link" id="link" type="text" class="form-control @if($errors->has('link')) is-invalid @endif" name="link" required autocomplete="link" autofocus>--}}

{{--                                                                @if($errors->has('link'))--}}
{{--                                                                    <span class="text-danger">--}}
{{--                                                                        <strong>{{ $errors->first('link') }}</strong>--}}
{{--                                                                    </span>--}}
{{--                                                                @endif--}}
{{--                                                            </div>--}}
                                                        @elseif(request()->type == 'strategy')
                                                            <input name="type" value="{{request()->type}}"  type="hidden" />
                                                            <input name="price" value="0"  type="hidden" />
                                                            <input name="commission" value="0"  type="hidden" />

                                                            <div class="form-group label-floating  ">
                                                                <label class="control-label">File</label>
                                                                <input class="form-control" name="link" id="image"  type="file" />
                                                            </div>
                                                        @else
                                                            <div class="form-group">
                                                                <label for="name">Link</label>
                                                                <input value="{{old('link')}}" id="link" type="text" class="form-control @if($errors->has('link')) is-invalid @endif" name="link" required autocomplete="link" autofocus>

                                                                @if($errors->has('link'))
                                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('link') }}</strong>
                                                    </span>
                                                                @endif
                                                            </div>

                                                            <input name="type" value="product"  type="hidden" />


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
                                                        @endif


                                                        <div class="form-group label-floating  ">
                                                            <label class="control-label">Image 1</label>
                                                            <input class="form-control" name="image" id="image"  type="file" />
                                                        </div>

                                                        <div class="form-group label-floating  ">
                                                            <label class="control-label">Trailer Video</label>
                                                            <input class="form-control" name="trailer" id="image"  type="file" />
                                                        </div>
                                                        <div class="form-group label-floating  ">
                                                            <label class="control-label">Description</label>

                                                            <textarea class="form-control" placeholder="Description" name="description">{{old('description')}}</textarea>
                                                        </div>

                                                        <input value="{{auth()->user()->id}}" name="user_id" type="hidden">
                                                        <input value="course" name="type" type="hidden">
                                                        @if(auth()->user()->role == 'A')
                                                          <input value="1" name="verified" type="hidden">
                                                        @endif

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