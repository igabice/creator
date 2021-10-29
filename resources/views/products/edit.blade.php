@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b>
                            @if($data->type == 'course')
                                        Course
                            @if($data->type == 'strategy')
                                        Strategy
                                        @else
                                        Product
                                        
                                        @endif</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                            <li class="breadcrumb-item active">edit</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                <form class="form-horizontal" method="POST" action="{{ url('/products-update') }}" enctype="multipart/form-data">
                    @csrf
                    <input value="{{$data->id}}" id="id" type="hidden" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 offset-lg-2">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input value="{{$data->name}}" id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" required autocomplete="name" autofocus>

                                                @if($errors->has('name'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            @if($data->type == 'strategy')
                                            
                                            <div class="form-group label-floating  ">
                                                <label class="control-label">File</label>
                                                <input class="form-control" name="link" id="link"  type="file" />
                                            </div>
                                            @else
                                            <div class="form-group">
                                                <label for="name">Link</label>
                                                <input value="{{$data->link}}" id="link" type="text" class="form-control @if($errors->has('link')) is-invalid @endif" name="link" required autocomplete="link" autofocus>

                                                @if($errors->has('link'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('link') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        @endif    
                                        

                                            <div class="form-group label-floating  ">
                                                <label class="control-label">Image 1</label>
                                                <input class="form-control" name="image" id="image"  type="file" />
                                            </div>

{{--                                            @if(Auth::user()->role == 'A')--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="user_id">Creator</label>--}}
{{--                                                    <select name="user_id" id="user_id" required class="form-control select2">--}}
{{--                                                        <option value=""></option>--}}
{{--                                                        @foreach($creators as $creator)--}}
{{--                                                            <option value="{{$creator->id}}">{{$creator->name}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                    @if($errors->has('user_id'))--}}
{{--                                                        <span class="text-danger">--}}
{{--                                                <strong>{{ $errors->first('user_id') }}</strong>--}}
{{--                                                </span>--}}
{{--                                                    @endif--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <input value="$user->id" type="hidden">--}}
{{--                                            @endif--}}

                                        @if($data->type == 'course' || $data->type == 'strategy')
                                        <input value="{{$data->price}}" type="hidden" name="price">
                                        <input value="{{$data->commission}}" type="hidden" name="commission">
                                        @else
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input value="{{$data->price ?? 0}}" id="price" type="text" class="form-control @if($errors->has('price')) is-invalid @endif" name="price" autocomplete="price" autofocus>
                                                @if($errors->has('price'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('price') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Commission</label>
                                                <input value="{{$data->commission ?? 0}}" id="commission" type="text" class="form-control @if($errors->has('commission')) is-invalid @endif" name="commission" autocomplete="commission" autofocus>
                                                @if($errors->has('commission'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('commission') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row m-t-20">

                                        <div class="col-sm-6 text-left offset-lg-2">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
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

    <script>
        $(".select2").select2();
        // $('select[name="role_level"]').on('change', function(){
        //     $('select[name="store_id"]').html('');
        //     var level=$(this).val();
        //     if(level=="")return;
        //     $.LoadingOverlay("products");
        //     $.ajax({
        //         type: "GET",
        //         url: "/getstores/"+level
        //     }).done(function(data){
        //
        //         if(data.length<1){
        //             alert("There is no unit in the selected location");
        //             $('select[name="store_id"]').html('');
        //             var ss="<option value=''></option>";
        //             $('select[name="store_id"]').append(ss);
        //
        //             $.LoadingOverlay("hide");
        //             return;
        //         }
        //
        //         var ss="<option value=''></option>";
        //         $('select[name="store_id"]').append(ss);
        //         $.each(data, function(i, item){
        //             var ss="<option value='"+item.id+"'>"+item.name+"</option>";
        //             $('select[name="store_id"]').append(ss);
        //         });
        //
        //         $.LoadingOverlay("hide");
        //
        //     });
        // });

    </script>

    <!-- /content area -->
@endsection
