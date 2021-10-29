<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <?php echo $__env->make('backpack::inc.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition <?php echo e(config('backpack.base.skin')); ?> fixed">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper no-margin no-padding">

        <!-- Content Header (Page header) -->
         <?php echo $__env->yieldContent('header'); ?>

        <!-- Main content -->
        <section class="content">

          <?php echo $__env->yieldContent('content'); ?>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer m-l-0 text-sm">
        <?php echo $__env->make('backpack::inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      </footer>
    </div>
    <!-- ./wrapper -->


    <?php echo $__env->yieldContent('before_scripts'); ?>
    <?php echo $__env->yieldPushContent('before_scripts'); ?>

    <?php echo $__env->make('backpack::inc.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('backpack::inc.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldContent('after_scripts'); ?>
    <?php echo $__env->yieldPushContent('after_scripts'); ?>

    <!-- JavaScripts -->
    
</body>
</html>
<?php /**PATH /home/affilia1/affiliatedng/resources/views/vendor/backpack/base/layout_guest.blade.php ENDPATH**/ ?>