<?php $__env->startSection('content'); ?>

<div class="page-title-box">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <h4 class="page-title">Update Password</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo e(url('/profile')); ?>">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <br>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="profile_picture">Profile Picture<span class="text text-danger">*</span></label>
                        <div class="col-sm-9">
                            <input type="file" accept="image/x-png, image/jpg, image/jpeg" class="form-control <?php if ($errors->has('profile_picture')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('profile_picture'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"" name="profile_picture">
                            <?php if($errors->has('profile_picture')): ?>
                            <span class="invalid-feedback">
                                <strong><?php echo e($errors->first('profile_picture')); ?></strong>
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/users/profile.blade.php ENDPATH**/ ?>