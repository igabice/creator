<!DOCTYPE html>
<html lang="en">
    <head>
        <title>7DC </title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo-sm1.png')); ?>">
        
        <!-- Icons Css -->
        <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo e(asset('assets/css/app.min.css')); ?>" id="app-style" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/main-style.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/jquery.fancybox.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('css/jquery.dataTables.yadcf.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
   	 	<link href="<?php echo e(asset('assets/css/bootstrap-datetimepicker.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/metismenu.min.css')); ?>" rel="stylesheet" type="text/css">

        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="<?php echo e(asset('plugins/toastr/dist/build/toastr.min.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        
        <?php echo $__env->yieldContent('css'); ?>
        <?php echo $__env->yieldContent('other_css'); ?>
        <style>

            /* Style all font awesome icons */


            /* Add a hover effect if you want */
            .fa:hover {
                color: gold;
            }

            /* Set a specific color for each brand */

            /* Facebook */
            .fa-facebook {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-twitter {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-instagram {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-tumblr {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }
            .fa-linkedin-in {
                background: black;
                color: white;
                padding:10px;
                font-size: 20px;
                width: 30px;
                text-align: center;
                text-decoration: none;
            }


        </style>
    </head>

    <body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">

   <div class="topbar">

        <?php echo $__env->make('inc.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <?php echo $__env->make('inc.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
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
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <span class="d-sm-inline-block" style="color: white"> Copyright (c) <?php echo e(date('Y')); ?>  The 7D Affiliates Limited (7D Group)

                            <a href="https://www.twitter.com/7dc" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/7dc" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="https://www.instagram.com/7dc" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="https://www.linkedin.com/7dc" class="google-plus"><i class="fa fa-linkedin-in"></i></a>
                <a href="https://www.tiktok.com/7dc" class="google-plus"><i class="fa fa-tumblr"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </footer>

        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        <script src="<?php echo e(asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/metismenu/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/simplebar/simplebar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/libs/node-waves/waves.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/assets/libs/moment/min/moment.min.js')); ?>"></script>
        <!-- PLUGINS-->
         <script src="<?php echo e(asset('assets/js/bootstrap-datetimepicker.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/metisMenu.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/jquery.slimscroll.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.fancybox.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/jquery.dataTables.yadcf.js')); ?>"></script>

        <script src="<?php echo e(asset('plugins/select2/js/select2.min.js')); ?>"></script>
        

        <!-- Peity chart-->
        <script src="<?php echo e(asset('assets/libs/peity/jquery.peity.min.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/clipboard.min.js')); ?>"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>


        <script>
            $(".select2").select2();
           // $(".dataTable").select2();

            $('.date').datepicker({
                format: "dd-mm-yyyy",
                // viewMode: "months",
                // minViewMode: "months",
                toggleActive: true,
                autoclose:!0,
                todayHighlight:!0
            });
            $('#time').datetimepicker({
                format: 'hh:mm'
            });

            new ClipboardJS('.btnn');

            $('.btnn').click(function () {
                Toastify({
                    text: "text copied.",
                    duration: 3000,
                    close: true,
                    gravity: "top", // `top` or `bottom`
                    position: "left", // `left`, `center` or `right`
                    backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    onClick: function(){} // Callback after click
                }).showToast();
            });



            // $('.referId').click(function () {
            //     Toastify({
            //         text: "text copied",
            //         duration: 1000,
            //         close: true,
            //         gravity: "top", // `top` or `bottom`
            //         position: "center", // `left`, `center` or `right`
            //         backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            //         stopOnFocus: true, // Prevents dismissing of toast on hover
            //         onClick: function(){
            //            new ClipboardJS('.referId');
            //         } // Callback after click
            //     }).showToast();
            // });
        </script>
        <?php echo $__env->yieldContent('script'); ?>
        <?php echo $__env->yieldContent('other_script'); ?>
    </div>
</body>

</html>
<?php /**PATH /home/affilia1/7dc/resources/views/layouts/app.blade.php ENDPATH**/ ?>