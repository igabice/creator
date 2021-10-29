<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>7DC | Reset Password </title>
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
                <h3 class="text-center m-b-20">{{ trans('backpack::base.reset_password') }}</h3>
                <div class="nav-steps-wrapper">
                    <ul class="nav nav-tabs nav-steps">
                        <li><a class="disabled text-muted"><strong>{{ trans('backpack::base.step') }} 1.</strong> {{ trans('backpack::base.confirm_email') }}</a></li>
                        <li class="active"><a><strong>{{ trans('backpack::base.step') }} 2.</strong> {{ trans('backpack::base.choose_new_password') }}</a></li>
                    </ul>
                </div>
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

                        <form class="mphp-email-form" role="form" method="POST" action="{{ route('backpack.auth.password.reset') }}">
                            {!! csrf_field() !!}

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('backpack::base.email_address') }}</label>

                                <div>
                                    <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('backpack::base.new_password') }}</label>

                                <div>
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="control-label">{{ trans('backpack::base.confirm_new_password') }}</label>
                                <div>
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <button type="submit" class="btn btn-block btn-primary">
                                        {{ trans('backpack::base.change_password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="clearfix"></div>
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