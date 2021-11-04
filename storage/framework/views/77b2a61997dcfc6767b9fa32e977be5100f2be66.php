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
                            <?php if($errors->all()): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p class="text text-center text-danger"> <?php echo e($error); ?> </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

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
                        </div>
                    </div>
                    
            <div class="row">

                <div class="col-lg-6 offset-lg-3 mt-5 mt-lg-0 d-flex align-items-stretch">
                    
                    

                        <form class="mphp-email-form" method="POST" action="/signup">
                            <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="last_name">Surname</label>
                                    <input value="<?php echo e(old('last_name')); ?>" id="last_name" type="text" class="form-control <?php if ($errors->has('last_name')) :
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
                                    <label for="name">First Name</label>
                                    <input value="<?php echo e(old('name')); ?>" id="name" type="text" class="form-control <?php if ($errors->has('name')) :
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
                                    <label for="phone">Whatsapp Number</label>
                                    <input value="<?php echo e(old('phone')); ?>" id="phone" type="text" class="form-control <?php if ($errors->has('phone')) :
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
                                    <label for="email">Email Address</label>
                                    <input value="<?php echo e(old('email')); ?>" id="email" type="email" class="form-control <?php if ($errors->has('email')) :
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
                                    <label for="email">Username</label>
                                    <input value="<?php echo e(old('username')); ?>" id="email" type="text" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" pattern="[a-zA-Z0-9]+" name="username" required>
                                    <?php if($errors->has('username')): ?>
                                        <span class="text-danger">
                                            <strong><?php echo e($errors->first('username')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label for="role"> Account Type</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value="M">Affiliate</option>
                                        <option value="C">Creator</option>
                                    </select>
                                    <?php if($errors->has('role')): ?>
                                        <span class="text-danger">
                                            <strong><?php echo e($errors->first('role')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="<?php echo e(old('password')); ?>" id="password" type="password" class="form-control <?php if ($errors->has('password')) :
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
                                    <label for="password1">Confirm Password</label>
                                    <input value="<?php echo e(old('password1')); ?>" id="password1" type="password" class="form-control <?php if ($errors->has('password1')) :
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




                            <div class="form-group mb-3">
                                <button class="btn btn-block btn-success f-w--7 py-3 font-primary" type="submit">Create Account</button>
                            </div>
                        </form>

                </div>

            </div>

        </div>
    </section>


</main>

<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>The 7D Affiliates Limited (7D Group) (c) <?php echo e(date('Y')); ?></span></strong>. All Rights Reserved
        </div>
        <div class="social-links text-center">
            <a href="https://www.twitter.com/7dc" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="https://www.facebook.com/7dc" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="https://www.instagram.com/7dc" class="instagram"><i class="icofont-instagram"></i></a>
            <a href="https://www.linkedin.com/7dc" class="google-plus"><i class="icofont-linkedin"></i></a>

            
        </div>
        <div class="credits">

            
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

</html><?php /**PATH /Users/mac/webProjects/creator/resources/views/register.blade.php ENDPATH**/ ?>