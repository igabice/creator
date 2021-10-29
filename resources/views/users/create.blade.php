@extends('layouts.app')

@section('content')

    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Create New User</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" method="POST" action="{{ url('/users') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group label-floating  ">
                                    <label class="control-label">Image </label>
                                    <input class="form-control" name="image" id="image"  type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input value="{{old('username')}}" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus>

                                    @if($errors->has('username'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Surname</label>
                                    <input value="{{old('last_name')}}" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>

                                    @if($errors->has('last_name'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input value="{{old('name')}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input value="{{old('middle_name')}}" id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"  autocomplete="middle_name" autofocus>

                                    @if($errors->has('middle_name'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('middle_name') }}</strong>
                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input value="{{old('phone')}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>

                                    @if($errors->has('phone'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input value="{{old('email')}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>


                                    @if($errors->has('email'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="role">Select Account Type</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value=""></option>
                                        <option value="M">Marketer</option>
                                        <option value="C">Creator</option>
                                        <option value="A">Admin</option>
                                    </select>
                                    @if($errors->has('role'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="{{old('password')}}" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="password" autofocus>


                                    @if($errors->has('password'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input value="{{old('password1')}}" id="password1" type="password" class="form-control @error('password1') is-invalid @enderror" name="password1" required autocomplete="password1" autofocus>


                                    @if($errors->has('password1'))
                                        <span class="text-danger">
                                                    <strong>{{ $errors->first('password1') }}</strong>
                                                    </span>
                                    @endif
                                </div>


{{--                                <div class="form-group">--}}
{{--                                    <div class="custom-control custom-checkbox">--}}
{{--                                        <input type="checkbox" class="custom-control-input" name="ad" id="ad" >--}}
{{--                                        <label class="custom-control-label" for="ad"> Make user an admin </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

                                <div class="form-group row m-t-20">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Create User</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(".select2").select2();
        $('select[name="role_level"]').on('change', function(){
            $('select[name="store_id"]').html('');
            var level=$(this).val();
            if(level=="")return;
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "/getstores/"+level
            }).done(function(data){

                if(data.length<1){
                    alert("There is no unit in the selected location");
                    $('select[name="store_id"]').html('');
                    var ss="<option value=''></option>";
                    $('select[name="store_id"]').append(ss);

                    $.LoadingOverlay("hide");
                    return;
                }

                var ss="<option value=''></option>";
                $('select[name="store_id"]').append(ss);
                $.each(data, function(i, item){
                    var ss="<option value='"+item.id+"'>"+item.name+"</option>";
                    $('select[name="store_id"]').append(ss);
                });

                $.LoadingOverlay("hide");

            });
        });

    </script>
@endsection
