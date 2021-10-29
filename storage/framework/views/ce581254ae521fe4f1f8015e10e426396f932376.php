<!DOCTYPE html>
<html lang="en">
    <head>
        <title>LEGOOL </title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo-sm.png')); ?>">
        <link rel="shortcut icon" href="<?php echo e(asset('assets/images/logo-sm.png')); ?>">
        
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
        <link href="<?php echo e(asset('assets/css/icons.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(asset('plugins/toastr/dist/build/toastr.min.css')); ?>" rel="stylesheet">
        <script src="<?php echo e(asset('assets/libs/jquery/jquery.min.js')); ?>"></script>
        
        <?php echo $__env->yieldContent('css'); ?>
        <?php echo $__env->yieldContent('other_css'); ?>
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
                        <span class="d-sm-inline-block"> Copyright (c) <?php echo e(date('Y')); ?>  Legool</span>
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

        <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.6/dist/loadingoverlay.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg==" crossorigin="anonymous"></script>
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
        </script>
        <?php echo $__env->yieldContent('script'); ?>
        <?php echo $__env->yieldContent('other_script'); ?>
    </div>
</body>

</html>
<?php /**PATH /Users/mac/webProjects/legool-app/resources/views/layouts/app.blade.php ENDPATH**/ ?>