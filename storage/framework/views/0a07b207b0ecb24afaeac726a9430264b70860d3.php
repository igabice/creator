<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Payment Details</b></h2>
                        <ol class="breadcrumb mb-0">
                         </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                <form class="form-horizontal" method="POST" action="<?php echo e(url('/account-update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input value="<?php echo e($data->id); ?>" id="id" type="hidden" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 offset-lg-2">
                                            <div class="form-group">
                                                <label for="bank">Bank</label>
                                                <input value="<?php echo e($data->bank); ?>" id="bank" type="text" class="form-control <?php if($errors->has('bank')): ?> is-invalid <?php endif; ?>" name="bank" required autocomplete="bank" autofocus>

                                                <?php if($errors->has('bank')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('bank')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>


                                            <div class="form-group">
                                                <label for="account_name">Account Name</label>
                                                <input value="<?php echo e($data->account_name); ?>" id="account_name" type="text" class="form-control <?php if($errors->has('account_name')): ?> is-invalid <?php endif; ?>" name="account_name" autocomplete="account_name" autofocus>
                                                <?php if($errors->has('account_name')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('account_name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="account_number">Account Number</label>
                                                <input value="<?php echo e($data->account_number); ?>" id="account_number" type="text" class="form-control <?php if($errors->has('account_number')): ?> is-invalid <?php endif; ?>" name="account_number" autocomplete="account_number" autofocus>
                                                <?php if($errors->has('account_number')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('account_number')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row m-t-20">

                                        <div class="col-sm-6 text-left offset-lg-2">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".select2").select2();
        // $('select[name="role_level"]').on('change', function(){
        //     $('select[name="store_id"]').html('');
        //     var level=$(this).val();
        //     if(level=="")return;
        //     $.LoadingOverlay("products");
        //     $.ajax({
        //         type: "GET",
        //         url: "/getstores/"+level
        //     }).done(function(data){
        //
        //         if(data.length<1){
        //             alert("There is no unit in the selected location");
        //             $('select[name="store_id"]').html('');
        //             var ss="<option value=''></option>";
        //             $('select[name="store_id"]').append(ss);
        //
        //             $.LoadingOverlay("hide");
        //             return;
        //         }
        //
        //         var ss="<option value=''></option>";
        //         $('select[name="store_id"]').append(ss);
        //         $.each(data, function(i, item){
        //             var ss="<option value='"+item.id+"'>"+item.name+"</option>";
        //             $('select[name="store_id"]').append(ss);
        //         });
        //
        //         $.LoadingOverlay("hide");
        //
        //     });
        // });

    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/7dc/resources/views/users/account_details.blade.php ENDPATH**/ ?>