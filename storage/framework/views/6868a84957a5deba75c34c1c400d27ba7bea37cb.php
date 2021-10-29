<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link href='plugins/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src='plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='plugins/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.buttons.min.js'></script>
    <script src='plugins/datatables/buttons.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.responsive.min.js'></script>
    <script src='plugins/datatables/responsive.bootstrap4.min.js'></script>
<?php $__env->stopSection(); ?>

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Courses <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                    </ol>
                </div>
                <?php if(auth()->user()->role == 'A'): ?>
                <div class="col-sm-6">
                    <a href="/create-product?type=course" class="btn btn-primary waves-effect waves-light">
                         Add Course
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

            <div class="row">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-30">
                    <div class="card rounded bg-white h-100 text-center" style="padding: 30px 20px">
                        <a href="<?php echo e($object->link); ?>" class="text-center">
                            <img src="<?php echo e($object->image ?? 'images/noimage.jpeg'); ?>"
                                 alt="<?php echo e($object->name); ?>"
                                 title="<?php echo e($object->name); ?>"
                                 class="img-fluid rounded">
                        </a>
                        <div class="iCard-content p-1 pt-15 pb-15">
                            <h5 class="shop-thumb__title">
                                <?php echo e($object->name); ?>

                                
                                <?php if(auth()->user()->role == 'A'): ?>
                                <a class="btn btn-sm btn-warning" href="/products/<?php echo e($object->id); ?>/edit">edit</a>
                                <?php endif; ?>
                            </h5>
                            
                        </div>
                    </div>
                </div>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
    
    </div>
</div>


<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,
            
        });

    });
</script>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/products/courses.blade.php ENDPATH**/ ?>