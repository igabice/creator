@extends('layouts.app')

@section('content')

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>NEW <b> State </b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">State </a></li>
                        <li class="breadcrumb-item active">Create</li>
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
                <form class="form-horizontal" method="POST" action="{{ url('/states') }}">
                    @csrf
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="name"> Name</label>
                                                <input value="{{old('name')}}" id="name" type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" required autocomplete="name">

                                                @if($errors->has('name'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="admin_id">Admin</label>
                                                <select name="admin_id" id="admin_id" required class="form-control select2">
                                                    <option value=""></option>
                                                    @foreach ($users as $object)
                                                        <option value="{{$object->id}}">{{ $object->name }}  {{ $object->last_name }}</option>
                                                    @endforeach
                                                </select>
                                                @if($errors->has('admin_id'))
                                                    <span class="text-danger">
                                                    <strong>{{ $errors->first('admin_id') }}</strong>
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
