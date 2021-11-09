<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="HTML5 Template, eSports, Gaming, Bootstrap4, Responsive" />
    <meta name="description" content="Gamix - eSports & Gaming HTML Template" />
    <title>7DC - Register</title>
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
                            <h3>Sign up</h3>

                            <?php if(session('success')): ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong><?php echo e(session('success')); ?></strong>
                                </div>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong><?php echo e(session('error')); ?></strong>
                                </div>
                            <?php endif; ?>

                            <form class="mphp-email-form" method="POST" action="/signup">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input value="<?php echo e(old('last_name')); ?>" id="last_name" placeholder="Surname" type="text" class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="last_name" required autocomplete="last_name" autofocus>

                                    <?php if($errors->has('last_name')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-4">
                                    <input value="<?php echo e(old('name')); ?>" id="name" type="text" placeholder="First Name" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" required autocomplete="name" autofocus>

                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>

                                <?php if(isset($_GET['ref'])): ?>
                                    <input type="hidden" name="referred_by_1" value="<?php echo e($_GET['ref']); ?>">
                                <?php else: ?>
                                    <input type="hidden" name="referred_by_1" value="36">
                                <?php endif; ?>

                                <input type="hidden" name="register" value="yes">

                                <div class="form-group">
                                    <input value="<?php echo e(old('phone')); ?>" id="phone" placeholder="Whatsapp Number" type="number" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="phone" required autocomplete="phone" autofocus>
                                    <?php if($errors->has('phone')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('phone')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <input value="<?php echo e(old('email')); ?>" id="email" type="email" placeholder="Email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" required autocomplete="email" autofocus>


                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger">
                                            <strong><?php echo e($errors->first('email')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo e(old('username')); ?>" id="Username" placeholder="Username" type="text" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="username" required>
                                    <?php if($errors->has('username')): ?>
                                        <span class="text-danger">
                                            <strong><?php echo e($errors->first('username')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <input type="hidden" name="role" value="C">

                                <hr>

                                <div class="form-group">
                                    <input value="<?php echo e(old('password')); ?>" placeholder="Password" id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="password" autofocus>


                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input value="<?php echo e(old('password1')); ?>" placeholder="Confirm Password" id="password1" type="password" class="form-control <?php if ($errors->has('password1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password1" required autocomplete="password1" autofocus>


                                    <?php if($errors->has('password1')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('password1')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="checkbox clearfix">
                                    <div class="form-check checkbox-theme">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberMe" required>
                                        <label class="form-check-label" for="rememberMe">
                                            Accept terms
                                        </label>
                                    </div>
                                    <a href="/terms">view terms</a>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn-md btn-theme btn-block">Create Account</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-pad-0 bg-img align-self-center none-992">
                    <a href="/" class="logoss">
                        7DC<span>.</span>
                    </a>

                    <p>Sign up to access a whole lot of features</p>
                    <p>Already have an account?<a href="/login"> Login</a></p>
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
<?php /**PATH /Users/mac/webProjects/creator/resources/views/auth/register.blade.php ENDPATH**/ ?>