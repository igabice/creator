<?php $__env->startSection('content'); ?>
    <div class="inner-page">


    <?php
    $data = Auth::user();
    ?>




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Add Product</h3>
                    <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Add Product</span>
                </div>
            </div>
        </div>
    </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-7 contact-box">
                        <div class="checkout-box">
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('/products')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                               <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input value="<?php echo e(old('name')); ?>" placeholder="Name" id="name" type="text" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" name="name" required autocomplete="name" autofocus>

                                                            <?php if($errors->has('name')): ?>
                                                                <span class="text-danger">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                            <?php endif; ?>
                                                        </div>


                                                        <?php if(request()->type == 'course'): ?>

                                                            <input name="type" value="<?php echo e(request()->type); ?>"  type="hidden" />
                                                            <input name="price" value="0"  type="hidden" />
                                                            <input name="commission" value="0"  type="hidden" />

                                                            <div class="form-group">
                                                                <label for="name">Link</label>
                                                                <input value="<?php echo e(old('link')); ?>" placeholder="Link" id="link" type="text" class="form-control <?php if($errors->has('link')): ?> is-invalid <?php endif; ?>" name="link" required autocomplete="link" autofocus>

                                                                <?php if($errors->has('link')): ?>
                                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('link')); ?></strong>
                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php elseif(request()->type == 'strategy'): ?>
                                                            <input name="type" value="<?php echo e(request()->type); ?>"  type="hidden" />
                                                            <input name="price" value="0"  type="hidden" />
                                                            <input name="commission" value="0"  type="hidden" />

                                                            <div class="form-group label-floating  ">
                                                                <label class="control-label">File</label>
                                                                <input class="form-control" name="link" id="image"  type="file" />
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="form-group">
                                                                <label for="name">Link</label>
                                                                <input value="<?php echo e(old('link')); ?>" id="link" type="text" class="form-control <?php if($errors->has('link')): ?> is-invalid <?php endif; ?>" name="link" required autocomplete="link" autofocus>

                                                                <?php if($errors->has('link')): ?>
                                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('link')); ?></strong>
                                                    </span>
                                                                <?php endif; ?>
                                                            </div>

                                                            <input name="type" value="product"  type="hidden" />


                                                            <div class="form-group">
                                                                <label for="price">Price</label>
                                                                <input value="<?php echo e(old('price') ?? 0); ?>" placeholder="Price" id="price" type="text" class="form-control <?php if($errors->has('price')): ?> is-invalid <?php endif; ?>" name="price">
                                                                <?php if($errors->has('price')): ?>
                                                                    <span class="text-danger">
                                                            <strong><?php echo e($errors->first('price')); ?></strong>
                                                        </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Commission (%)</label>
                                                                <input value="<?php echo e(old('commission') ?? 0); ?>" placeholder="Commission" id="commission" type="text" class="form-control <?php if($errors->has('commission')): ?> is-invalid <?php endif; ?>" name="commission">
                                                                <?php if($errors->has('commission')): ?>
                                                                    <span class="text-danger">
                                                                        <strong><?php echo e($errors->first('commission')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">7dc Commission (%)</label>
                                                                <input value="<?php echo e(old('d_commission') ?? 0); ?>" placeholder="7DC commission"  type="text" class="form-control <?php if($errors->has('d_commission')): ?> is-invalid <?php endif; ?>" name="d_commission">
                                                                <?php if($errors->has('d_commission')): ?>
                                                                    <span class="text-danger">
                                                                        <strong><?php echo e($errors->first('d_commission')); ?></strong>
                                                                    </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>


                                                        <div class="form-group label-floating  ">
                                                            <label class="control-label">Image 1</label>
                                                            <input class="form-control" name="image" id="image"  type="file" />
                                                        </div>



                                                        <input value="<?php echo e(auth()->user()->id); ?>" name="user_id" type="hidden">


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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/products/newproduct.blade.php ENDPATH**/ ?>