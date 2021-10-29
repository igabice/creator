@extends('layouts.main')

@section('content')
    <div class="inner-page">


    <?php
    $data = Auth::user();
    ?>




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Profile</h3>
                </div>
            </div>
        </div>
    </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 contact-box">
                        <div class="checkout-box">
                            <h3>KYC Form</h3>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/id-card') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
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


                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="current_password">Profile Image <span class="text text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                                @endif
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <input value="{{$data->username}}" placeholder="Username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" >

                                            @if($errors->has('username'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">

                                            <input value="{{$data->last_name}}" placeholder="Surname" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>

                                            @if($errors->has('last_name'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('last_name') }}</strong>
                                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <input value="{{$data->name}}" placeholder="First Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                            @if($errors->has('name'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input value="{{$data->middle_name}}" placeholder="Middle Name" id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name"  autocomplete="middle_name" autofocus>

                                            @if($errors->has('middle_name'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('middle_name') }}</strong>
                                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input value="{{$data->phone}}" placeholder="Phone Number" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone" autofocus>

                                            @if($errors->has('phone'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                                </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <input value="{{$data->nok_name}}" placeholder="Next of Kin Full Name" id="nok_name" type="text" class="form-control @error('nok_name') is-invalid @enderror" name="nok_name"  >


                                            @if($errors->has('nok_name'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_name') }}</strong>
                                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input value="{{$data->nok_email}}" placeholder="Next of Kin Email" id="nok_email" type="text" class="form-control @error('nok_email') is-invalid @enderror" name="nok_email" required >


                                            @if($errors->has('nok_email'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_email') }}</strong>
                                                                </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <input value="{{$data->nok_phone}}" id="nok_phone" placeholder="Next of Kin Phone Number" type="text" class="form-control @error('nok_phone') is-invalid @enderror" name="nok_phone" required >


                                            @if($errors->has('nok_phone'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_phone') }}</strong>
                                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <input value="{{$data->nok_relationship}}" placeholder="Relationship" id="nok_relationship" type="text" class="form-control @error('nok_relationship') is-invalid @enderror" name="nok_relationship" required >


                                            @if($errors->has('nok_relationship'))
                                                <span class="text-danger">
                                                                <strong>{{ $errors->first('nok_relationship') }}</strong>
                                                                </span>
                                            @endif
                                        </div>





                                        <div class="form-group row float-right">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 contact-box">
                        <div class="checkout-box">
                            <h3>Update Password</h3>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('/profile') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="current_password" placeholder="Current Password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                                @if ($errors->has('current_password'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('current_password') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="new_password" type="password" placeholder="New Password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                                                @if ($errors->has('new_password'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="new_password_confirmation" type="password" placeholder="Confirm New Password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                                                @if ($errors->has('new_password_confirmation'))
                                                    <span class="invalid-feedback">
                                            <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                                        </span>
                                                @endif
                                            </div>


                                        </div>

                                        <div class="form-group row float-right">
                                            <div class="col-lg-12">
                                                <button type="submit" class="coupon-btn btn btn-primary">Update Password</button>
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