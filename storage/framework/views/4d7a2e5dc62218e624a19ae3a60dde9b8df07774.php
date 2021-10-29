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
                <h2>Welcome to the 7DC platform</h2>
                <h3>Login to access your account
                </h3>
            </div>
            <div class="row">

                <div class="col-lg-6 offset-lg-3 mt-5 mt-lg-0 d-flex align-items-stretch">
                    <?php if($errors->has('email')): ?>
                        <div
                                class="alert alert-danger  alert-dismissible fade show"
                                role="alert"
                        >
                            <strong><?php echo e($errors->first('email')); ?></strong>
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


                    <form class="mphp-email-form" method="post" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group mb-4">
                            <label class="f-w--5" for="email">Email</label>
                            <input class="form-control" id="email" type="email" name="email" required placeholder="Enter Email address"/>
                        </div>
                        <div class="form-group mb-4">
                            <label class="f-w--5" for="password">Password</label>
                            <div class="input-group rounded">
                                <div class="input-group-append w-100">
                                    <input class="form-control" id="password" type="password" placeholder="Enter your Password" name="password" required/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <button class="btn btn-block btn-success f-w--7 py-3 font-primary" type="submit">Login</button>
                        </div>

                        <div class="form-group text-center">
                            <p class="form-text ">Don't have an account?<a class="link ml-2 font-primary" href="/register">Sign Up</a>
                            </p>
                        </div>
                        <div class="form-group text-center mt-3">
                            <p class="form-text ">
                                Can't remember your password?
                                <a class="link ml-2 font-primary" href="password/reset">Recover account</a>
                            </p>
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
            &copy; Copyright <strong><span>7DC (c) <?php echo e(date('Y')); ?></span></strong>. All Rights Reserved
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

</html><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/auth/login.blade.php ENDPATH**/ ?>