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
                <h3>Register your account
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
                                <input type="hidden" name="ref_id" value="<?php echo e($_GET['ref']); ?>">
                            <?php endif; ?>

                                <input type="hidden" name="register" value="yes">












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
                                    <label for="role"> Account Type</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value="M">Marketer</option>
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

</html><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/register.blade.php ENDPATH**/ ?>