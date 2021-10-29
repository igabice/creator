@extends('layouts.app')

@section('content')

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Payment Details</b></h2>
                        <ol class="breadcrumb mb-0">
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
                <form class="form-horizontal" method="POST" action="{{ url('/account-update') }}" enctype="multipart/form-data">
                    @csrf
                    <input value="{{$data->id}}" id="id" type="hidden" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 offset-lg-2">
                                            <div class="form-group">
                                                <label for="bank">Bank</label>
                                                <input value="{{$data->bank}}" id="bank" type="text" class="form-control @if($errors->has('bank')) is-invalid @endif" name="bank" required autocomplete="bank" autofocus>

                                                @if($errors->has('bank'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('bank') }}</strong>
                                                    </span>
                                                @endif
                                            </div>


                                            <div class="form-group">
                                                <label for="account_name">Account Name</label>
                                                <input value="{{$data->account_name}}" id="account_name" type="text" class="form-control @if($errors->has('account_name')) is-invalid @endif" name="account_name" autocomplete="account_name" autofocus>
                                                @if($errors->has('account_name'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('account_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input value="{{$data->account_number}}" id="account_number" type="text" class="form-control @if($errors->has('account_number')) is-invalid @endif" name="account_number" autocomplete="account_number" autofocus>
                                                @if($errors->has('account_number'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('account_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
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
