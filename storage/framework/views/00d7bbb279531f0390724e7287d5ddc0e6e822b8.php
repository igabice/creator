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
                        <h3>Update Details</h3>
                    </div>
                </div>
            </div>
        </section>


        <section id="cart-view">
            <div class="container">
                <div class="row">


                    <div class="col-lg-8 contact-box">
                        <div class="checkout-box">
                            <form class="form-horizontal" method="POST" action="<?php echo e(url('/users-update')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>


                                <input value="<?php echo e($data->id); ?>" type="hidden" name="id" />

                                <div class="form-group label-floating  ">
                                    <label class="control-label">Image </label>
                                    <input class="form-control" name="image" id="image"  type="file" />
                                    <?php if($data->image != null): ?>
                                        <a href="<?php echo e($data->image); ?>" data-lightbox="roadtrip" data-title="Gallery">
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
endif; ?>" name="username" required>

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
                                    <label for="email">Email Address</label>
                                    <input value="<?php echo e($data->email); ?>" id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" required autocomplete="email" autofocus>


                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label for="role">Select Account Type</label>
                                    <select name="role" id="role" required class="form-control">
                                        <option value=""></option>
                                        <option value="M" <?php if($data->role == 'M'): ?> selected <?php endif; ?>>Marketer</option>
                                        <option value="C"<?php if($data->role == 'C'): ?> selected <?php endif; ?>>Creator</option>
                                        <option value="A" <?php if($data->role == 'A'): ?> selected <?php endif; ?>>Admin</option>
                                    </select>
                                    <?php if($errors->has('role')): ?>
                                        <span class="text-danger">
                            <strong><?php echo e($errors->first('role')); ?></strong>
                        </span>
                                    <?php endif; ?>
                                </div>
                                <hr>

                                <div class="form-group row m-t-20">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Submit</button>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/users/edit.blade.php ENDPATH**/ ?>