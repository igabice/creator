@extends('layouts.main')

@section('content')
    <div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Update Details</h3>
                    </div>
                </div>
            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8 contact-box">
                        <div class="checkout-box">
                            <form class="form-horizontal" method="POST" action="{{ url('/users-update') }}" enctype="multipart/form-data">
                                @csrf


                                <input value="{{$data->id}}" type="hidden" name="id" />

                                <div class="form-group label-floating  ">
                                    <label class="control-label">Image </label>
                                    <input class="form-control" name="image" id="image"  type="file" />
                                    @if($data->image != null)
                                        <a href="{{$data->image}}" data-lightbox="roadtrip" data-title="Gallery">
                                            view image
                                        </a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input value="{{$data->username}}" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" required>

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

                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input value="{{$data->email}}" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>


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
                                        <option value="M" @if($data->role == 'M') selected @endif>Marketer</option>
                                        <option value="C"@if($data->role == 'C') selected @endif>Creator</option>
                                        <option value="A" @if($data->role == 'A') selected @endif>Admin</option>
                                    </select>
                                    @if($errors->has('role'))
                                        <span class="text-danger">
                            <strong>{{ $errors->first('role') }}</strong>
                        </span>
                                    @endif
                                </div>
                                <hr>

                                <div class="form-group row m-t-20">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Submit</button>
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