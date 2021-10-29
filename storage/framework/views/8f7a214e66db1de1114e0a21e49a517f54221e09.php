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
                    <h3>Profile</h3>
                    <a href="index.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a><span> - Profile</span>
                </div>
            </div>
        </div>
    </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 contact-box">
                        <div class="checkout-box">
                            <h3>KYC Form</h3>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/id-card')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="current_password">Identity Card<span class="text text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control <?php if ($errors->has('id_card')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('id_card'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="id_card">
                                                <?php if($errors->has('id_card')): ?>
                                                    <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('id_card')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>


                                        <?php if($data->id_card != null): ?>
                                            <a href="<?php echo e($data->id_card); ?>" data-fancybox="gallery">
                                                view image
                                            </a>
                                        <?php endif; ?>

                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="role">ID Type</label>
                                            <div class="col-sm-9">
                                                <select name="id_type" id="role" required class="form-control">
                                                    <option value=""></option>
                                                    <option value="National ID Card">National ID Card</option>
                                                    <option value="PVC">PVC</option>
                                                    <option value="International Passport">International Passport</option>
                                                </select>
                                                <?php if($errors->has('id_type')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('id_type')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>


                                        <input value="<?php echo e($data->id); ?>" type="hidden" name="id" />


                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="current_password">Profile Image <span class="text text-danger">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control <?php if ($errors->has('image')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('image'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="image">
                                                <?php if($errors->has('image')): ?>
                                                    <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('image')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>

                                        </div>


                                        <div class="form-group">
                                            <input value="<?php echo e($data->username); ?>" placeholder="Username" id="username" type="text" class="form-control <?php if ($errors->has('username')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="username" >

                                            <?php if($errors->has('username')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('username')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">

                                            <input value="<?php echo e($data->last_name); ?>" placeholder="Surname" id="last_name" type="text" class="form-control <?php if ($errors->has('last_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('last_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="last_name" required autocomplete="last_name" autofocus>

                                            <?php if($errors->has('last_name')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('last_name')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <input value="<?php echo e($data->name); ?>" placeholder="First Name" id="name" type="text" class="form-control <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="name" required autocomplete="name" autofocus>

                                            <?php if($errors->has('name')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input value="<?php echo e($data->middle_name); ?>" placeholder="Middle Name" id="middle_name" type="text" class="form-control <?php if ($errors->has('middle_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('middle_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="middle_name"  autocomplete="middle_name" autofocus>

                                            <?php if($errors->has('middle_name')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('middle_name')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input value="<?php echo e($data->phone); ?>" placeholder="Phone Number" id="phone" type="text" class="form-control <?php if ($errors->has('phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="phone" required autocomplete="phone" autofocus>

                                            <?php if($errors->has('phone')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('phone')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>


                                        <div class="form-group">
                                            <input value="<?php echo e($data->nok_name); ?>" placeholder="Next of Kin Full Name" id="nok_name" type="text" class="form-control <?php if ($errors->has('nok_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nok_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nok_name"  >


                                            <?php if($errors->has('nok_name')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('nok_name')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input value="<?php echo e($data->nok_email); ?>" placeholder="Next of Kin Email" id="nok_email" type="text" class="form-control <?php if ($errors->has('nok_email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nok_email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nok_email" required >


                                            <?php if($errors->has('nok_email')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('nok_email')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>


                                        <div class="form-group">
                                            <input value="<?php echo e($data->nok_phone); ?>" id="nok_phone" placeholder="Next of Kin Phone Number" type="text" class="form-control <?php if ($errors->has('nok_phone')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nok_phone'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nok_phone" required >


                                            <?php if($errors->has('nok_phone')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('nok_phone')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <input value="<?php echo e($data->nok_relationship); ?>" placeholder="Relationship" id="nok_relationship" type="text" class="form-control <?php if ($errors->has('nok_relationship')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nok_relationship'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nok_relationship" required >


                                            <?php if($errors->has('nok_relationship')): ?>
                                                <span class="text-danger">
                                                                <strong><?php echo e($errors->first('nok_relationship')); ?></strong>
                                                                </span>
                                            <?php endif; ?>
                                        </div>





                                        <div class="form-group row float-right">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 contact-box">
                        <div class="checkout-box">
                            <h3>Update Password</h3>
                            <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/profile')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <br>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="current_password" placeholder="Current Password" type="password" class="form-control <?php if ($errors->has('current_password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('current_password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="current_password" required>
                                                <?php if($errors->has('current_password')): ?>
                                                    <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('current_password')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="new_password" type="password" placeholder="New Password" class="form-control <?php if ($errors->has('new_password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="new_password">
                                                <?php if($errors->has('new_password')): ?>
                                                    <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('new_password')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">

                                            <div class="col-sm-12">
                                                <input id="new_password_confirmation" type="password" placeholder="Confirm New Password" class="form-control <?php if ($errors->has('new_password_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('new_password_confirmation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="new_password_confirmation">
                                                <?php if($errors->has('new_password_confirmation')): ?>
                                                    <span class="invalid-feedback">
                                            <strong><?php echo e($errors->first('new_password_confirmation')); ?></strong>
                                        </span>
                                                <?php endif; ?>
                                            </div>


                                        </div>

                                        <div class="form-group row float-right">
                                            <div class="col-lg-12">
                                                <button type="submit" class="coupon-btn btn btn-primary">Update Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>



    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/profile/profile.blade.php ENDPATH**/ ?>