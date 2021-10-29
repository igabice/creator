<?php $__env->startSection('content'); ?>

    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Create New User</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form class="form-horizontal" method="POST" action="<?php echo e(url('/users')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="form-group label-floating  ">
                                    <label class="control-label">Image </label>
                                    <input class="form-control" name="image" id="image"  type="file" />
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Surname</label>
                                    <input value="<?php echo e(old('last_name')); ?>" id="last_name" type="text" class="form-control <?php if ($errors->has('last_name')) :
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
                                    <input value="<?php echo e(old('name')); ?>" id="name" type="text" class="form-control <?php if ($errors->has('name')) :
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
                                    <input value="<?php echo e(old('middle_name')); ?>" id="middle_name" type="text" class="form-control <?php if ($errors->has('middle_name')) :
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
                                    <input value="<?php echo e(old('phone')); ?>" id="phone" type="text" class="form-control <?php if ($errors->has('phone')) :
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
                                    <input value="<?php echo e(old('email')); ?>" id="email" type="email" class="form-control <?php if ($errors->has('email')) :
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
                                        <option value="M">Marketer</option>
                                        <option value="C">Creator</option>
                                        <option value="A">Admin</option>
                                    </select>
                                    <?php if($errors->has('role')): ?>
                                        <span class="text-danger">
                                            <strong><?php echo e($errors->first('role')); ?></strong>
                                        </span>
                                    <?php endif; ?>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input value="<?php echo e(old('password')); ?>" id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="password" autofocus>


                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <label for="password1">Password</label>
                                    <input value="<?php echo e(old('password1')); ?>" id="password1" type="password" class="form-control <?php if ($errors->has('password1')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password1'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password1" required autocomplete="password1" autofocus>


                                    <?php if($errors->has('password1')): ?>
                                        <span class="text-danger">
                                                    <strong><?php echo e($errors->first('password1')); ?></strong>
                                                    </span>
                                    <?php endif; ?>
                                </div>









                                <div class="form-group row m-t-20">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Create User</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(".select2").select2();
        $('select[name="role_level"]').on('change', function(){
            $('select[name="store_id"]').html('');
            var level=$(this).val();
            if(level=="")return;
            $.LoadingOverlay("show");
            $.ajax({
                type: "GET",
                url: "/getstores/"+level
            }).done(function(data){

                if(data.length<1){
                    alert("There is no unit in the selected location");
                    $('select[name="store_id"]').html('');
                    var ss="<option value=''></option>";
                    $('select[name="store_id"]').append(ss);

                    $.LoadingOverlay("hide");
                    return;
                }

                var ss="<option value=''></option>";
                $('select[name="store_id"]').append(ss);
                $.each(data, function(i, item){
                    var ss="<option value='"+item.id+"'>"+item.name+"</option>";
                    $('select[name="store_id"]').append(ss);
                });

                $.LoadingOverlay("hide");

            });
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/users/create.blade.php ENDPATH**/ ?>