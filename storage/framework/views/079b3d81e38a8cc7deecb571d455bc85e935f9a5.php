<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5 Template, eSports, Gaming, Bootstrap4, Responsive" />
    <meta name="description" content="Gamix - eSports & Gaming HTML Template" />
    <title>7DC - Login</title>
    <!--font-awesome icons link-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/font-awesome.min.css')); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/venobox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/lightbox.min.css')); ?>">
    <!--main style file-->
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/responsive.css')); ?>">
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
                            <h3>Login</h3>

                            <?php if($errors->has('email')): ?>
                                <div class="alert alert-danger  alert-dismissible fade show" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                    <button
                                            type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php endif; ?>

                            <?php if(session()->has('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong><?php echo e(session()->get('success')); ?> </strong>
                                </div>
                            <?php endif; ?>
                            <?php if($errors->has('password')): ?>
                                <div
                                        class="alert alert-danger alert-dismissible fade show"
                                        role="alert"
                                >
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                    <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <form autocomplete="off" method="post" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
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
<script src="<?php echo e(asset('asset/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/venobox.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/lightbox.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('asset/js/custom.js')); ?>"></script>
</body>



</html>
<?php /**PATH /Users/mac/webProjects/creator/resources/views/auth/login.blade.php ENDPATH**/ ?>