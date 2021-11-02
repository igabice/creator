<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5 Template, eSports, Gaming, Bootstrap4, Responsive" />
    <meta name="description" content="Gamix - eSports & Gaming HTML Template" />
    <title>7DC - Reset Password</title>
    <!--font-awesome icons link-->
    <link rel="stylesheet" href="{{ asset('asset/css/font-awesome.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/lightbox.min.css') }}">
    <!--main style file-->
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/responsive.css') }}">
</head>

<body id="darkmode">

<!-- preloader part start -->
<div class="loader_screen preloader" id="preloader">
    <div class="loader loader-box">
        <svg viewBox="0 0 80 80">
            <rect x="8" y="8" width="64" height="64"></rect>
        </svg>
    </div>
</div>
<!-- preloader part start -->

<!-- Login start -->
<div class="login-12">
    <div class="container">
        <div class="col-md-12 pad-0">
            <div class="row login-box-12">
                <div class="col-lg-7 col-sm-12 col-pad-0 align-self-center">
                    <div class="login-inner-form">
                        <div class="details">
                            <h3>Reset your password</h3>

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

                            <form autocomplete="off" method="post" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email"id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </form>
                            <p><a href="/"> Go to Home</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 col-pad-0 bg-img align-self-center none-992">
                    <a href="/" class="logoss">
                        7DC<span>.</span>
                    </a>
                    <p>Login to access a whole lot of features</p>
                    <ul class="social-list clearfix">
                        <li><a href="https://www.facebook.com/7dcng"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/7dcng"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/7dcng"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login end -->

<!-- Optional JavaScript -->
<script src="{{ asset('asset/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('asset/js/slick.min.js') }}"></script>
<script src="{{ asset('asset/js/venobox.min.js') }}"></script>
<script src="{{ asset('asset/js/lightbox.min.js') }}"></script>
<script src="{{ asset('asset/js/counterup.min.js') }}"></script>
<script src="{{ asset('asset/js/waypoints.min.js') }}"></script>
<script src="{{ asset('asset/js/custom.js') }}"></script>
</body>



</html>
