<?php $__env->startSection('content'); ?>
    <div class="inner-page">

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
                                    <label for="email">Company</label>
                                    <input value="<?php echo e($data->company); ?>" id="company" type="text" class="form-control" name="company"  />
                                </div>

                                <div class="form-group">
                                    <label for="email">Facebook</label>
                                    <input value="<?php echo e($data->facebook); ?>" id="facebook" type="text" class="form-control" name="facebook"  />
                                </div>

                                <div class="form-group">
                                    <label for="email">Twitter</label>
                                    <input value="<?php echo e($data->twitter); ?>" id="twitter" type="text" class="form-control" name="twitter" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Instagram</label>
                                    <input value="<?php echo e($data->instagram); ?>" id="instagram" type="text" class="form-control" name="instagram" >
                                </div>

                                <div class="form-group">
                                    <label for="email">Linkedin</label>
                                    <input value="<?php echo e($data->linkedin); ?>" id="linkedin" type="text" class="form-control" name="linkedin" >

                                </div>
                                <div class="form-group">
                                    <label for="email">About</label>
                                    <textarea name="about" class="form-control"><?php echo e($data->about); ?></textarea>

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