<?php $__env->startSection('content'); ?>
    <div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
        <section id="inner-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h3>Edit Product</h3>
                        <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Edit Product</span>
                    </div>
                </div>
            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 contact-box">
                        <div class="checkout-box">
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
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('/products-update')); ?>" enctype="multipart/form-data">

                                <input value="<?php echo e($data->id); ?>" type="hidden" name="id">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input value="<?php echo e($data->name); ?>" id="name" type="text" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" name="name" required >
                                                    <?php if($errors->has('name')): ?>
                                                        <span class="text-danger">
                                                                    <strong><?php echo e($errors->first('name')); ?></strong>
                                                                </span>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input value="<?php echo e($data->price ?? 0); ?>" id="price" type="text" class="form-control <?php if($errors->has('price')): ?> is-invalid <?php endif; ?>" name="price" >
                                                    <?php if($errors->has('price')): ?>
                                                        <span class="text-danger">
                                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Commission (%)</label>
                                                    <input value="<?php echo e($data->commission ?? 0); ?>" id="commission" type="text" class="form-control <?php if($errors->has('commission')): ?> is-invalid <?php endif; ?>" name="commission" >
                                                    <?php if($errors->has('commission')): ?>
                                                        <span class="text-danger">
                                                                        <strong><?php echo e($errors->first('commission')); ?></strong>
                                                                    </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">7dc Commission (%)</label>
                                                    <input value="<?php echo e($data->d_commission ?? 0); ?>" id="d_commission" type="text" class="form-control <?php if($errors->has('d_commission')): ?> is-invalid <?php endif; ?>" name="d_commission" >
                                                    <?php if($errors->has('d_commission')): ?>
                                                        <span class="text-danger">
                                                                        <strong><?php echo e($errors->first('d_commission')); ?></strong>
                                                                    </span>
                                                    <?php endif; ?>
                                                </div>





                                                <div class="form-group label-floating  ">
                                                    <label class="control-label">Image 1</label>
                                                    <input class="form-control" name="image" id="image"  type="file" />
                                                    <a href="<?php echo e($data->image); ?>" data-lightbox="roadtrip" data-title="Gallery">
                                                        view image</a>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="form-group row m-t-20">

                                            <div class="col-sm-6 text-left">
                                                <button class="btn coupon-btn btn-primary " type="submit">SUBMIT</button>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </div>
        </section>



    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/products/editproduct.blade.php ENDPATH**/ ?>