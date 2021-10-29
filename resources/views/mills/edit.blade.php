@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b> Mills </b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mills </a></li>
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
                    <form class="form-horizontal" method="POST" action="{{ url('/mills-update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="other_names"> Name</label>
                                                        <input value="{{$data->name}}" id="other_names" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" required autocomplete="name" autofocus>

                                                    @if($errors->has('name'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">Image </label>
                                                    <input class="form-control" name="image" id="image"  type="file" />
                                                    <br>
                                                    @if($data->image != null)
                                                        <a href="{{$data->image}}" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    @endif
                                                </div>
                                                <input value="{{$data->id}}" id="id" type="hidden" class="hidden" name="id" >
                                                <div class="form-group">
                                                    <label for="processes">Product Processed</label>
                                                    <select name="processes" id="processes" required class="form-control select2">
                                                        <option value="oil">Palm Oil</option>
                                                        <option value="kernel">Palm Kernel Oil</option>
                                                        <option value="both">Both (Palm Kernel Oil & Paalm Oil)</option>
                                                    </select>
                                                    @if($errors->has('processes'))
                                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('processes') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <label for="capacity">Capacity</label>
                                                    <select name="capacity" id="capacity" required class="form-control select2">
                                                        <option value=""></option>
                                                        <option value="10">10 tonnes</option>
                                                        <option value="15">15 tonnes</option>
                                                        <option value="20">20 tonnes</option>
                                                        <option value="25">25 tonnes</option>
                                                        <option value="30">30 tonnes</option>
                                                        <option value="40">40 tonnes</option>
                                                        <option value="50">50 tonnes</option>
                                                        <option value="60">60 tonnes</option>
                                                    </select>
                                                    @if($errors->has('capacity'))
                                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('capacity') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">

                                                    <label for="description">Description</label>
                                                    <input value="{{$data->description}}" id="description" type="description" class="form-control @if($errors->has('description')) is-invalid @endif" name="description"  autocomplete="description" autofocus>

                                                    @if($errors->has('description'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="middles">Address</label>
                                                    <input value="{{$data->street}}" id="street" type="text" class="form-control @if($errors->has('street')) is-invalid @endif" name="street"  autocomplete="street" autofocus>

                                                    @if($errors->has('street'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('street') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="form-group">
                                                    <label for="lga">Local Governmentt Area</label>
                                                    <input value="{{$data->lga}}" id="lga" type="text" class="form-control @if($errors->has('lga')) is-invalid @endif" name="lga" required autocomplete="lga" autofocus>

                                                    @if($errors->has('lga'))
                                                        <span class="text-danger">
                                                        <strong>{{ $errors->first('lga') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>


                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input value="{{$data->state}}" id="state" type="text" class="form-control @if($errors->has('state')) is-invalid @endif" name="state"  autocomplete="state" autofocus>

                                                    @if($errors->has('state'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('state') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row m-t-20">
                                            <div class="col-sm-6">

                                            </div>
                                            <div class="col-sm-6 text-right">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
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
        //     $.LoadingOverlay("show");
        //     $.ajax({
        //         type: "GET",
        //         url: "/getstores/"+level
        //     }).done(function(data){
        //
        //         if(data.length<1){
        //             alert("There is no capacity in the selected location");
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
