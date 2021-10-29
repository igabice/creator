<?php $__env->startSection('content'); ?>
    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Cart Page</h3>
                    <a href=/"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Cart page</span>

                </div>
            </div>

        </div>
    </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <?php if(count($data) > 0): ?>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6 col-sm-6">
                                    <div class="cart-items text-center">
                                        <h3>₦<?php echo e($object->price); ?></h3>
                                        <img src="/<?php echo e($object->image ?? 'asset/images/noimage.jpeg'); ?>" alt="product-img" class="img-fluid">
                                        <h4><?php echo e($object->name); ?></h4>
                                        <a href='/cart-delete/<?php echo e($object->product_id); ?>'><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </div>
                                </div>



                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="col-lg-6 col-sm-6">
                                <div class="cart-items text-center">
                                    <h3></h3>
                                    <img src="asset/images/product1.png" alt="product-img" class="img-fluid">
                                    <h4>You cart is empty</h4>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
                <div class="col-lg-1"></div>

                <div class="col-lg-5 contact-box">
                    <div class="checkout-box">
                        <div class="row">
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Items</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4><?php echo e(count($data)); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 checkout-item">
                                <div class="row">
                                    <div class="col-8 col-lg-8 col-sm-8">
                                        <h3>Total</h3>
                                    </div>
                                    <div class="col-4 col-lg-4 col-sm-4 text-right">
                                        <h4>₦<?php echo e(number_format($sum, 2, '.', ',')); ?></h4>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                                <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                                <input type="hidden" name="amount" value="<?php echo e($sum * 100); ?>"> 
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="currency" value="NGN">
                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'cart'])); ?>" >
                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                <?php echo e(csrf_field()); ?>

                                <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                    <span class="f-s--xs">Make Payment </span>
                                </button>


                            </form>
                        </div>
                    </div>












                </div>
            </div>
        </div>
    </section>


    <section id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 heading">
                    <h3>Related</h3>
                </div>
            </div>
            <div class="row product-pa">
                <div class="col-lg-12">
                    <div class="product-main">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 text-center">
                            <div class="product-item">
                                <h3>N<?php echo e($product->price); ?></h3>
                                <img src="<?php echo e($product->price ?? 'asset/images/product1.png'); ?>" alt="product-img" class="img-fluid">
                                <h4><?php echo e($product->name); ?></h4>
                                <a href="/cart/<?php echo e($product->id); ?>" class="product-btn">Add to Cart</a>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/cart/cart.blade.php ENDPATH**/ ?>