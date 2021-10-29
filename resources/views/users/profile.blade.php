@extends('layouts.app')

@section('content')

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Update User Information </h4>
        </div>
    </div>
</div>

<?php
$data = Auth::user();
?>

<div class="login-12">
    <div class="container">
        <div class="col-md-12 pad-0">
            <div class=" login-box-12">

                <div class="col-lg-7 col-sm-12 col-pad-0 align-self-center">
                    <div class="login-inner-form">
                        <div class="details">
                            <h3>Login</h3>

                            @if($errors->has('email'))
                                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                    <button
                                            type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            @endif

                            @if(session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{ session()->get('success') }} </strong>
                                </div>
                            @endif
                            @if($errors->has('password'))
                                <div
                                        class="alert alert-danger alert-dismissible fade show"
                                        role="alert"
                                >
                                    <strong>{{ $errors->first('password') }}</strong>
                                    <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form autocomplete="off" method="post" action="{{  route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="input-text" placeholder="Phone number or Email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="input-text" placeholder="Password">
                                </div>
                                <div class="checkbox clearfix">
                                    <div class="form-check checkbox-theme">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                        <label class="form-check-label" for="rememberMe">
                                            Remember me
                                        </label>
                                    </div>
                                    <a href="password/reset">Forgot Password</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block">Login Now</button>
                                </div>
                            </form>
                            <p>Don't have an account?<a href="/register"> Sign Up</a></p>
                        </div>
                    </div>
                </div>



                <div class="col-12">
                    <h4>KYC Form</h4>
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/id-card') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <br>
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-sm-3 col-form-label" for="profile_picture">Profile Picture<span class="text text-danger">*</span></label>-->
                                <!--    <div class="col-sm-9">-->
                                <!--        <input type="file" accept="image/x-png, image/jpg, image/jpeg" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture">-->
                                <!--        @if ($errors->has('profile_picture'))-->
                                <!--            <span class="invalid-feedback">-->
                                <!--            <strong>{{ $errors->first('profile_picture') }}</strong>-->
                                <!--        </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="current_password">Identity Card<span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('id_card') is-invalid @enderror" name="id_card">
                                        @if ($errors->has('id_card'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('id_card') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>


                                @if($data->id_card != null)
                                <a href="{{$data->id_card}}" data-fancybox="gallery">
                                    view image
                                </a>
                                @endif

                                <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="role">ID Type</label>
                                                <div class="col-sm-9">
                                                  <select name="id_type" id="role" required class="form-control">
                                                    <option value=""></option>
                                                    <option value="National ID Card">National ID Card</option>
                                                    <option value="PVC">PVC</option>
                                                    <option value="International Passport">International Passport</option>
                                                </select>
                                                @if($errors->has('id_type'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('id_type') }}</strong>
                                                    </span>
                                                @endif
                                                </div>

                                            </div>


                                <input value="{{$data->id}}" type="hidden" name="id" />

                                <div class="form-group label-floating  ">
                                    <label class="control-label">Profile Image </label>
                                    <input class="form-control" name="image" id="image"  type="file" />
                                    @if($data->image != null)
                                        <a href="{{$data->image}}" data-fancybox="gallery">
                                            view image
                                        </a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input value="{{$data->username}}" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" >

                                    @if($errors->has('username'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Surname</label>
                                    <input value="{{$data->last_name}}" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>

                                    @if($errors->has('last_name'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="name">First Name</label>
                                    <input value="{{$data->name}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                    @if($errors->has('name'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="middle_name">Middle Name</label>
                                    <input value="{{$data->middle_name}}" id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"  autocomplete="middle_name" autofocus>

                                    @if($errors->has('middle_name'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input value="{{$data->phone}}" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>

                                    @if($errors->has('phone'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                    @endif
                                </div>

            {{--                    <div class="form-group">--}}
            {{--                        <label for="email">Email Address</label>--}}
            {{--                        <input value="{{$data->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>--}}


            {{--                        @if($errors->has('email'))--}}
            {{--                            <span class="text-danger">--}}
            {{--                                                    <strong>{{ $errors->first('email') }}</strong>--}}
            {{--                                                    </span>--}}
            {{--                        @endif--}}
            {{--                    </div>--}}

                                <div class="form-group">
                                    <label for="email">Next of Kin Full Name</label>
                                    <input value="{{$data->nok_name}}" id="nok_name" type="text" class="form-control @error('nok_name') is-invalid @enderror" name="nok_name"  >


                                    @if($errors->has('nok_name'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_name') }}</strong>
                                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="email">Next of Kin Email </label>
                                    <input value="{{$data->nok_email}}" id="nok_email" type="text" class="form-control @error('nok_email') is-invalid @enderror" name="nok_email" required >


                                    @if($errors->has('nok_email'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_email') }}</strong>
                                                                </span>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="nok_phone">Next of Kin Phone Number</label>
                                    <input value="{{$data->nok_phone}}" id="nok_phone" type="text" class="form-control @error('nok_phone') is-invalid @enderror" name="nok_phone" required >


                                    @if($errors->has('nok_phone'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_phone') }}</strong>
                                                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nok_relationship">Relationship</label>
                                    <input value="{{$data->nok_relationship}}" id="nok_relationship" type="text" class="form-control @error('nok_relationship') is-invalid @enderror" name="nok_relationship" required >


                                    @if($errors->has('nok_relationship'))
                                        <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_relationship') }}</strong>
                                                                </span>
                                    @endif
                                </div>

                                {{--
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="current_password">Proof of Next of Kin <span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('nok_image') is-invalid @enderror" name="nok_image">
                                        @if ($errors->has('nok_image'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('nok_image') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>
                                @if($data->nok_image != null)
                                    <a href="{{$data->nok_image}}" data-fancybox="gallery">
                                        view image
                                    </a>
                                @endif
                                --}}



                                <div class="form-group row float-right">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="col-12">

                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/profile') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <br>
                                <!--<div class="form-group row">-->
                                <!--    <label class="col-sm-3 col-form-label" for="profile_picture">Profile Picture<span class="text text-danger">*</span></label>-->
                                <!--    <div class="col-sm-9">-->
                                <!--        <input type="file" accept="image/x-png, image/jpg, image/jpeg" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture">-->
                                <!--        @if ($errors->has('profile_picture'))-->
                                <!--            <span class="invalid-feedback">-->
                                <!--            <strong>{{ $errors->first('profile_picture') }}</strong>-->
                                <!--        </span>-->
                                <!--        @endif-->
                                <!--    </div>-->
                                <!--</div>-->

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="current_password">Current Password<span class="text text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                        @if ($errors->has('current_password'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="new_password">New Password</label>
                                    <div class="col-sm-9">
                                        <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                        @if ($errors->has('new_password'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="new_password_confirmation">Confirm New Password</label>
                                    <div class="col-sm-9">
                                        <input id="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                                        @if ($errors->has('new_password_confirmation'))
                                            <span class="invalid-feedback">
                                            <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    {{--@error('new_password_confirmation')--}}
                                    {{--<span class="text-danger">--}}
                                    {{--<strong>{{ $message }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@enderror--}}
                                </div>

                                <div class="form-group row float-right">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>

     </div>

 </div>




@endsection

@section('script')

@endsection
