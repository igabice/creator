<?php $__env->startSection('content'); ?>
    <div class="inner-page">

        <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 heading">
                        <h3>Courses Page</h3>
                        <div class="col-lg-2">
                            <?php if(auth()->user() != null): ?>
                                <?php if(auth()->user()->role == 'A'  || auth()->user()->verified == '1'): ?>

                                    <a href="/create-product" class="coupon-btn btn btn-primary"><i style="color: white">Add Product</i></a>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
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
                    </div>
                </div>
            </div>
        </section>





        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php if(count($data) > 0): ?>
                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="cart-items text-center">
                                            <img src="<?php echo e($object->image ?? 'asset/images/noimage.jpeg'); ?>" alt="product-img" class="img-fluid">
                                            <a href="/products/<?php echo e($object->id); ?>" class="product-btn" style="color: white"><h4 style="color: white"><?php echo e($object->name); ?></h4></a>
                                            <h5 style="color: orange">₦<?php echo e($object->price); ?> <small style="color: grey; text-decoration: line-through">₦<?php echo e($object->former_price); ?></small></h5>




                                            <?php if(auth()->user() != null): ?>

                                                <?php if(auth()->user()->role == 'A'): ?>
                                                    <a href="/products/<?php echo e($object->id); ?>/edit" class="product-btn" style="color: orangered">EDIT</a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="cart-items text-center">
                                        <h3></h3>
                                        <img src="asset/images/product1.png" alt="product-img" class="img-fluid">

                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/products/products.blade.php ENDPATH**/ ?>