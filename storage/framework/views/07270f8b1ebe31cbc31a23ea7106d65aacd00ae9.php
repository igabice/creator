<?php $__env->startSection('content'); ?>

<style>
.lbl_desable{color:#c2c2c7de;}
</style>
<!-- Content area -->
<div class="row align-items-center">

    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-5">
                    <h2>User <b>Management</b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                         <li class="breadcrumb-item"><a href="#">User Management</a></li>

                    </ol>
                </div>
                <div class="col-sm-7">
                   
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <form class="form-horizontal" method="POST" action="<?php echo e(url('/users-update')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <input value="<?php echo e($data->id); ?>" type="hidden" name="id" />

                            <div class="form-group label-floating  ">
                                <label class="control-label">Image </label>
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

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

</script>
<style>
    .select2-container .select2-selection--single{height: 35px;}
    .select2-container--default .select2-selection--single .select2-selection__rendered{line-height: 35px;}
</style>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/users/edit.blade.php ENDPATH**/ ?>