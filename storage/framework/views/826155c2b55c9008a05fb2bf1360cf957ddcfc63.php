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
                <form class="form-horizontal" method="post" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-4">
                        <label class="f-w--5" for="email">Email</label>
                        <input
                                class="form-control"
                                id="email"
                                type="email"
                                name="email"
                                required
                                placeholder="Enter Email address"
                        />

                    </div>
                    <div class="form-group mb-4">
                        <label class="f-w--5" for="password">Password</label>
                        <div class="input-group rounded">
                            <div class="input-group-append w-100">
                                <input
                                        class="form-control"
                                        id="password"
                                        type="password"
                                        placeholder="Enter your Password"
                                        name="password"
                                        required
                                /><span
                                        class="input-group-text bg-transparent border-0 rounded-0 p-0 pr-2 show-password"
                                >
                      <button
                              class="btn btn-sm btn-light bg-transparent border-0"
                              type="button"
                      >
                        <span class="icon f-s--sm">show</span>
                      </button></span
                                >
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group mb-4">
                      <div class="custom-control custom-checkbox">
                        <input
                          class="custom-control-input"
                          id="remember"
                          type="checkbox"
                          name="re-password"
                        />
                        <label class="custom-control-label" for="remember"
                          >Remember Me</label
                        >
                      </div>
                    </div> -->
                    <div class="form-group mb-3">
                        <button
                                class="btn btn-block btn-primary f-w--7 py-3 font-primary"
                                type="submit"
                        >
                            Login
                        </button>
                    </div>
                    <!-- <div class="text-center my-4 f-s--sm f-w--5 text-muted">OR</div>
                    <div class="form-group mb-3">
                      <a
                        class="social-google d-flex justify-content-center align-items-center shadow-sm d-block py-3 rounded f-w--5"
                        href="#"
                        ><img
                          class="mr-3"
                          src="/static/img/google_icon.svg"
                          alt="g"
                        /><span>Login with Google</span></a
                      >
                    </div> -->
                    <div class="form-group text-center mt-5">
                        <p class="form-text text-muted f-w--5">
                            Don't have an account?<a
                                    class="link ml-2 font-primary"
                                    href="/register"
                            >Sign Up</a
                            >
                        </p>
                    </div>
                    <div class="form-group text-center mt-3">
                        <p class="form-text text-muted f-w--5">
                            Can't remember your password?<a
                                    class="link ml-2 font-primary"
                                    href="password/reset"
                            >Recover account</a
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

<?php /**PATH /Users/mac/webProjects/legool-app/resources/views/auth/login.blade.php ENDPATH**/ ?>