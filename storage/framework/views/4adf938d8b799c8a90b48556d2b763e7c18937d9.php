<?php $__env->startSection('content'); ?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Update User Information </h4>
        </div>
    </div>
</div>

<?php
$data = Auth::user();
?>

<div >
    <div class="col-12">
        <h4>KYC Form</h4>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/id-card')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <!--<div class="form-group row">-->
                    <!--    <label class="col-sm-3 col-form-label" for="profile_picture">Profile Picture<span class="text text-danger">*</span></label>-->
                    <!--    <div class="col-sm-9">-->
                    <!--        <input type="file" accept="image/x-png, image/jpg, image/jpeg" class="form-control <?php if ($errors->has('profile_picture')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile_picture'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="profile_picture">-->
                    <!--        <?php if($errors->has('profile_picture')): ?>-->
                    <!--            <span class="invalid-feedback">-->
                    <!--            <strong><?php echo e($errors->first('profile_picture')); ?></strong>-->
                    <!--        </span>-->
                    <!--        <?php endif; ?>-->
                    <!--    </div>-->
                    <!--</div>-->

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

                    <div class="form-group label-floating  ">
                        <label class="control-label">Profile Image </label>
                        <input class="form-control" name="image" id="image"  type="file" />
                        <?php if($data->image != null): ?>
                            <a href="<?php echo e($data->image); ?>" data-fancybox="gallery">
                                view image
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input value="<?php echo e($data->username); ?>" id="username" type="text" class="form-control <?php if ($errors->has('username')) :
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
                        <label for="last_name">Surname</label>
                        <input value="<?php echo e($data->last_name); ?>" id="last_name" type="text" class="form-control <?php if ($errors->has('last_name')) :
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
                        <label for="name">First Name</label>
                        <input value="<?php echo e($data->name); ?>" id="name" type="text" class="form-control <?php if ($errors->has('name')) :
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
                        <label for="middle_name">Middle Name</label>
                        <input value="<?php echo e($data->middle_name); ?>" id="middle_name" type="text" class="form-control <?php if ($errors->has('middle_name')) :
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
                        <label for="phone">Phone Number</label>
                        <input value="<?php echo e($data->phone); ?>" id="phone" type="text" class="form-control <?php if ($errors->has('phone')) :
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
                        <label for="email">Next of Kin Full Name</label>
                        <input value="<?php echo e($data->nok_name); ?>" id="nok_name" type="text" class="form-control <?php if ($errors->has('nok_name')) :
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
                        <label for="email">Next of Kin Email </label>
                        <input value="<?php echo e($data->nok_email); ?>" id="nok_email" type="text" class="form-control <?php if ($errors->has('nok_email')) :
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
                        <label for="nok_phone">Next of Kin Phone Number</label>
                        <input value="<?php echo e($data->nok_phone); ?>" id="nok_phone" type="text" class="form-control <?php if ($errors->has('nok_phone')) :
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
                        <label for="nok_relationship">Relationship</label>
                        <input value="<?php echo e($data->nok_relationship); ?>" id="nok_relationship" type="text" class="form-control <?php if ($errors->has('nok_relationship')) :
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
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <hr>
    
    <div class="col-12">
        
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/profile')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <!--<div class="form-group row">-->
                    <!--    <label class="col-sm-3 col-form-label" for="profile_picture">Profile Picture<span class="text text-danger">*</span></label>-->
                    <!--    <div class="col-sm-9">-->
                    <!--        <input type="file" accept="image/x-png, image/jpg, image/jpeg" class="form-control <?php if ($errors->has('profile_picture')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile_picture'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="profile_picture">-->
                    <!--        <?php if($errors->has('profile_picture')): ?>-->
                    <!--            <span class="invalid-feedback">-->
                    <!--            <strong><?php echo e($errors->first('profile_picture')); ?></strong>-->
                    <!--        </span>-->
                    <!--        <?php endif; ?>-->
                    <!--    </div>-->
                    <!--</div>-->

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="current_password">Current Password<span class="text text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input id="current_password" type="password" class="form-control <?php if ($errors->has('current_password')) :
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
                        <label class="col-sm-3 col-form-label" for="new_password">New Password</label>
                        <div class="col-sm-9">
                            <input id="new_password" type="password" class="form-control <?php if ($errors->has('new_password')) :
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
                        <label class="col-sm-3 col-form-label" for="new_password_confirmation">Confirm New Password</label>
                        <div class="col-sm-9">
                            <input id="new_password_confirmation" type="password" class="form-control <?php if ($errors->has('new_password_confirmation')) :
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
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">Update Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    </div>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/users/profile.blade.php ENDPATH**/ ?>