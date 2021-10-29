<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Legool, Law" />
    <meta name="keywords" content="Legool, Law" />
    <link
            rel="shortcut icon"
            href="/static/img/logo_icon.svg"
            type="image/x-icon"
    />
    <link rel="apple-touch-icon" href="/static/img/logo_icon.svg" />
    <title>Legool</title>
    <link
            href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&amp;display=swap"
            rel="stylesheet"
    />
    <link rel="stylesheet" href="/static/font/ionicons/css/ionicons.min.css" />
    <link rel="stylesheet" href="/static/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/static/swiper/swiper-bundle.min.css" />
    <link rel="stylesheet" href="/static/css/main.min.css" />
</head>
<body>
<div class="wrapper container-fluid">
    <div class="auth row justify-content-center align-items-top">
        <div
                class="auth-banner col-12 col-md-5 col-xl-6 d-none d-md-block"
        ></div>
        <div class="auth-form col-12 col-md-7 col-xl-6 h-100 px-3 py-5">
            <div class="col-12 col-lg-10 col-xl-9 mx-auto">
                <div class="logo text-center">
                    <img src="/static/img/logo.svg" alt="Legool" loading="lazy" />
                </div>
                <h3 class="title my-4 f-w--7 font-primary text-center">Login</h3>
                @if (session('status'))
                    <div class="alert alert-success m-t-30" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

{{--                <form class="form-horizontal m-t-30" action="{{ route('password.email') }}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="useremail">Email Address</label>--}}
{{--                        <input type="email"id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
{{--                        @if($errors->has('email'))--}}
{{--                            <span class="text-danger">--}}
{{--                                            <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                        </span>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="form-group row m-t-20 mb-0">--}}
{{--                        <div class="col-12 text-right">--}}
{{--                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Send Password Reset Link</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group mt-2 mb-0 row">--}}
{{--                        <div class="col-12 mt-4">--}}
{{--                            <a href="{{ url('/') }}">Go back home</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <form class="form-horizontal" method="post" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mb-4">
                        <label class="f-w--5" for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required placeholder="Enter Email address"/>
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-block btn-primary f-w--7 py-3 font-primary" type="submit">
                            Send Password Reset Link
                        </button>
                    </div>

                    <div class="form-group text-center mt-5">
                        <p class="form-text text-muted f-w--5">
                            Don't have an account?<a
                                    class="link ml-2 font-primary"
                                    href="/register"
                            >Sign Up</a
                            >
                        </p>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="/static/js/jquery-3.5.1.slim.min.js"></script>
<script src="/static/js/popper.min.js"></script>
<script src="/static/js/bootstrap.min.js"></script>
<script src="/static/swiper/swiper-bundle.min.js"></script>
<script src="/static/js/main.min.js"></script>