<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>7DC | Login </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/static/img/favicon.png" rel="icon">
    <link href="/static/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/static/vendor/icofont/icofont.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/static/css/style.css" rel="stylesheet">


</head>

<body>

<div class="container d-flex flex-column ">



    <nav class="navbar navbar-expand-md navbar-dark bg-dark">

        <a class="navbar-brand" style="color: gold" href="#">7DC</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link " href="/register">Register</a>
                </li>
            </ul>
        </div>
    </nav>

</div>

<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>Welcome to the 7DC platform</h2>
                <h3>Register your account
                </h3>
            </div>
            
            <div class="row">
                        <div class="col-md-12">
                            @if($errors->all())
                                @foreach ($errors->all() as $error)
                                    <p class="text text-center text-danger"> {{$error}} </p>
                                @endforeach
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{session('success')}}</strong>
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>{{session('error')}}</strong>
                                </div>
                            @endif

                                <form class="mphp-email-form" method="POST" action="/signup">
                                    @csrf
                                    <div class="form-group">
                                        <label for="last_name">Surname</label>
                                        <input value="{{old('last_name')}}" id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" required autocomplete="last_name" autofocus>

                                        @if($errors->has('last_name'))
                                            <span class="text-danger">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="name">First Name</label>
                                        <input value="{{old('name')}}" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                        @if($errors->has('name'))
                                            <span class="text-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                        @endif
                                    </div>

                                    @if(isset($_GET['ref']))
                                        <input type="hidden" name="referred_by_1" value="{{$_GET['ref']}}">
                                    @else
                                        <input type="hidden" name="referred_by_1" value="36">
                                    @endif

                                    <input type="hidden" name="register" value="yes">

                                    <div class="form-group">
                                        <label for="phone">Whatsapp Number</label>
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
                                        <label for="email">Username</label>
                                        <input value="{{old('username')}}" id="email" type="text" class="form-control @error('username') is-invalid @enderror" pattern="[a-zA-Z0-9]+" name="username" required>
                                        @if($errors->has('username'))
                                            <span class="text-danger">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="role"> Account Type</label>
                                        <select name="role" id="role" required class="form-control">
                                            <option value="M">Affiliate</option>
                                            <option value="C">Creator</option>
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
                                        <label for="password1">Confirm Password</label>
                                        <input value="{{old('password1')}}" id="password1" type="password" class="form-control @error('password1') is-invalid @enderror" name="password1" required autocomplete="password1" autofocus>


                                        @if($errors->has('password1'))
                                            <span class="text-danger">
                                                    <strong>{{ $errors->first('password1') }}</strong>
                                                    </span>
                                        @endif
                                    </div>




                                    <div class="form-group mb-3">
                                        <button class="btn btn-block btn-success f-w--7 py-3 font-primary" type="submit">Create Account</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    
            <div class="row">

                <div class="col-lg-6 offset-lg-3 mt-5 mt-lg-0 d-flex align-items-stretch">

                    



                </div>

            </div>

        </div>
    </section>


</main>

<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>The 7D Affiliates Limited (7D Group) (c) {{date('Y')}}</span></strong>. All Rights Reserved
        </div>
        <div class="social-links text-center">
            <a href="https://www.twitter.com/affiliatedng" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="https://www.facebook.com/affiliatedng" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="https://www.instagram.com/affiliatedng" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="https://www.linkedin.com/affiliatedng" class="google-plus"><i class="icofont-linkedin"></i></a>

            {{--

            <a href="https://www.tiktok.com/affiliatedng" class="google-plus"><i class="fa fa-tiktok"></i></a>
            --}}
        </div>
        <div class="credits">

            {{--        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>--}}
        </div>
    </div>
</footer><!-- End #footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="/static/vendor/jquery/jquery.min.js"></script>
<script src="/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/static/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/static/vendor/php-email-form/validate.js"></script>
<script src="/static/vendor/jquery-countdown/jquery.countdown.min.js"></script>

<!-- Template Main JS File -->
<script src="/static/js/main.js"></script>

</body>

</html>