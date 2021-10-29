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

<main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>7DC</h2>
                <h3>Reset Your Password
                </h3>
            </div>
            <div class="row">

                <div class="col-lg-6 offset-lg-3 mt-5 mt-lg-0 d-flex align-items-stretch">

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



                    @if (session('status'))
                        <div class="alert alert-success m-t-30" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($errors->all())

                        @foreach ($errors->all() as $error)
                            <p class="text text-center text-danger center"> {{$error}} </p>
                        @endforeach
                    @endif

                </div>
                <div class="col-lg-6 offset-lg-3 mt-5 mt-lg-0 d-flex align-items-stretch">


                        <div class="col-lg-12">
                            <form class="mphp-email-form" method="post" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="f-w--5" for="email">Email</label>
                                    {{--                        <input class="form-control" id="email" type="email" name="email" required placeholder="Enter Email address"/>--}}
                                    <input type="email"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                </div>

                                <div class="form-group mb-3">
                                    <button class="btn btn-block btn-primary f-w--7 py-3 font-primary" type="submit">
                                        Send Password Reset Link
                                    </button>
                                </div>

                                <div class="form-group text-center mt-5">
                                    <a
                                            class="link ml-2 font-primary"
                                            href="{{ url('/') }}">Go back home</a>

                                </div>

                            </form>
                        </div>


                </div>

            </div>

        </div>
    </section>


</main>

<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>7DC (c) {{date('Y')}}</span></strong>. All Rights Reserved
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