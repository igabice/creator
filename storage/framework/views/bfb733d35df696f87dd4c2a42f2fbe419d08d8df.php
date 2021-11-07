<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href='asset/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    
<?php $__env->stopSection(); ?>


<div class="inner-page">

    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 heading">
                    <?php if( auth()->user() == null): ?>
                        <h3>Profile</h3>
                    <?php elseif($user->id == auth()->user()->id): ?>
                        <h3>Dashboard</h3>
                    <?php else: ?>
                        <h3>Profile</h3>
                    <?php endif; ?>

                </div>
            </div>


        </div>
    </section>

        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-5">
                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">

                                        <div class="col-12 col-lg-12 col-sm-12">
                                            <?php if(session()->has('success')): ?>
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <strong>Well done!</strong> <?php echo e(session()->get('success')); ?>

                                                </div>
                                            <?php endif; ?>
                                            <div class="game-item text-center">
                                                <div class="game-img">
                                                    <img src="<?php echo e($user->image); ?>" alt="game-img" class="img-fluid">
                                                    <div class="lightbox-overlay">
                                                        <a href="<?php echo e($user->image); ?>" data-lightbox="roadtrip" data-title="Gallery"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <br>
                                            <h3>Full Name</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <br>
                                            <h4>
                                                <?php echo e($user->name); ?> <?php echo e($user->middle_name); ?> <?php echo e($user->last_name); ?>

                                                <?php if($user->image != null): ?>
                                                    <a href="<?php echo e($user->image); ?>" data-lightbox="roadtrip" data-title="Gallery">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>

                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Email</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                <?php echo e($user->email); ?>

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Phone</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                <?php echo e($user->phone); ?>

                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> ID Card</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">
                                            <h4>
                                                <?php if($user->id_card): ?>
                                                        <a href="<?php echo e($user->id_card); ?>" data-lightbox="roadtrip" data-title="Gallery">
                                                            click to view document</a>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">
                                        <div class="col-4 col-lg-4 col-sm-4">
                                            <h3> Social Links</h3>
                                        </div>
                                        <div class="col-8 col-lg-8 col-sm-8">

                                            <div class="footer-social">
                                                <?php if($user->facebook): ?>  <a href="<?php echo e($user->facebook); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
                                                <?php if($user->twitter): ?>  <a href="<?php echo e($user->twitter); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
                                                <?php if($user->instagram): ?>  <a href="<?php echo e($user->instagram); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
                                                <?php if($user->linkedin): ?>  <a href="<?php echo e($user->linkedin); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(auth()->user() != null): ?>
                                    <?php if($user->id == auth()->user()->id || auth()->user()->role == 'A'): ?>
                                    <a class="main-btn btn-c-white" href="<?php echo e(route('users.edit', $user->id)); ?>">
                                        <span class="f-s--xs">Edit Profile </span>
                                    </a>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </div>
                            <br><br>
                            <?php if($user->verified == 0 && auth()->user()->role == 'A'): ?>
                                <a class="btn btn-sm btn-outline-success" href="/approve/<?php echo e($user->id); ?>" title="verify user?">
                                    Click to verify this user
                                </a>
                            <?php endif; ?>
                            &nbsp;
                            <?php if($user->is_kyc == 0 && auth()->user()->role == 'A'): ?>
                                <a class="btn btn-sm btn-outline-warning" href="/approve-kyc/<?php echo e($user->id); ?>" title="verify KYC?">
                                    Click to approve KYC details
                                </a>

                            <?php endif; ?>
                        </div>

                        <div class="row">
                           


                        </div>

                        <div class="checkout-box">
                            <div class="row">
                                <div class="col-lg-12 checkout-item">
                                    <div class="row">

                                       <?php if($user->verified != 1): ?>
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h2 style="color: lightgrey">Become a creator</h2>
                                                <br>
                                                <p style="color: lightgrey">May a payment of N36,000 Yearly fees and you can start selling your own courses</p>
                                                <br>
                                                <form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                    <?php if(auth()->user()): ?>
                                                        <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                                                    <?php else: ?>
                                                        <label for="email">Confirmation Email</label>
                                                        <input type="email" required name="email" placeholder="Email">
                                                    <?php endif; ?>
                                                    <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                                                    <input type="hidden" name="amount" value="36000"> 
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="currency" value="NGN">
                                                    <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'creator'])); ?>" >
                                                    <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                                    <?php echo e(csrf_field()); ?>

                                                    <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                                        <span class="f-s--xs">Pay Now </span>
                                                    </button>
                                                </form>
                                            </div>
                                        <?php endif; ?>

                                           <?php if($user->affiliate != 1): ?>
                                        <div class="col-12 col-lg-12 col-sm-12">

                                            Become a 7D Affiliate


                                            <h2 style="color: lightgrey">Become a 7D Affiliate</h2>
                                            <br>
                                            <p style="color: lightgrey"> Want to start earning from selling courses and other products? Register as an Affiliate.
                                                Learn and Earn while at it.</p>
                                            <br>
                                            <form method="GET" action="<?php echo e(route('callbackAff')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                <?php if(auth()->user()): ?>
                                                    <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                                                <?php else: ?>
                                                    <label for="email">Confirmation Email</label>
                                                    <input type="email" required name="email" placeholder="Email">
                                                <?php endif; ?>
                                                <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                                                <input type="hidden" name="amount" value="20000"> 
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="currency" value="NGN">
                                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'creator'])); ?>" >
                                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                                                <?php echo e(csrf_field()); ?>

                                                <button class="main-btn btn-c-white" type="submit" value="Checkout">
                                                    <span class="f-s--xs">Register (FREE) </span>
                                                </button>
                                            </form>
                                        </div>
                                               <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-lg-7 ">
                        <?php if(auth()->user() == null): ?>
                            <div class="contact-box">

                                <div class="checkout-box">
                                    <div class="row">

                                        <div class="col-lg-12 checkout-item">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h3> About Creator</h3>
                                                </div>
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h4>
                                                        <?php echo e($user->about); ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php elseif($user->id == auth()->user()->id || auth()->user()->role == 'A'): ?>
                        <div class="contact-box">

                            <div class="checkout-box">
                                <div class="row">

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h3> About Creator</h3>
                                            </div>
                                            <div class="col-12 col-lg-12 col-sm-12">
                                                <h4>
                                                    <?php echo e($user->about); ?>

                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Total Sales</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    0
                                                </h4>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Sales Worth</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦ 0
                                                </h4>
                                            </div>
                                        </div>
                                    </div>












                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Available Balance</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦<?php echo e($user->getWallet()); ?>

                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">
                                            <div class="col-8 col-lg-8 col-sm-8">
                                                <h3> Total Earnings</h3>
                                            </div>
                                            <div class="col-4 col-lg-4 col-sm-4 text-right">
                                                <h4>
                                                    ₦<?php echo e($totalEarnings); ?>

                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="main-btn btn-c-white" href="/my-payouts">
                                        <span class="f-s--xs">My Payouts </span>
                                    </a>


                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <div class="contact-box">

                                <div class="checkout-box">
                                    <div class="row">

                                        <div class="col-lg-12 checkout-item">
                                            <div class="row">
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h3> About Creator</h3>
                                                </div>
                                                <div class="col-12 col-lg-12 col-sm-12">
                                                    <h4>
                                                        <?php echo e($user->about); ?>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if($user->affiliate == 1 && ($user->id == auth()->user()->id || auth()->user()->role == 'A')): ?>
                        <div class="contact-box">

                            <div class="checkout-box">
                                <div class="row">

                                    <div class="col-lg-12 checkout-item">
                                        <div class="row">

                                                <h3 style="color: lightgrey">Sales in Ongoing Month (<?php echo e(count($campaigns)); ?>)</h3>

                        

                                                <table id="dataTable" class="table   dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                    <tbody>
                                                    <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            
                                                            <td><a style="color:#fff;" href="/products/<?php echo e($object->product_id); ?>"><?php echo e($object->name); ?> - <?php echo e($object->price); ?></a>
                                                                <button class="btn btnn" title="click to copy"
                                                                        data-clipboard-text="<?php echo e(url('/')); ?>/refer-product/<?php echo e($object->id); ?>/?ref=<?php echo e($object->user_id); ?>">
                                                                    <i class="fa fa-book" style="color: orangered"> copy link</i>
                                                                </button>
                                                            <br>
                                                                <div class="row">
                                                                    <div class="col-6 col-lg-6 col-sm-6">
                                                                        <h4> commission: <?php echo e($object->commission); ?></h4>
                                                                    </div>
                                                                    <div class="col-6 col-lg-6 col-sm-6 text-right">
                                                                        <h4>
                                                                            <small><?php echo e($object->created_at); ?></small>
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>


                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                            <?php endif; ?>
</div>

</div>
</div>
</section>


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/dashboard/index.blade.php ENDPATH**/ ?>