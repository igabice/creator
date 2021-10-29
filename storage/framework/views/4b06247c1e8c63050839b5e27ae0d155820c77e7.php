<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Update <b>
                            <?php if($data->type == 'course'): ?>
                                        Course
                                        <?php else: ?>
                                        Product
                                        
                                        <?php endif; ?></b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                            <li class="breadcrumb-item active">edit</li>
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
                <form class="form-horizontal" method="POST" action="<?php echo e(url('/products-update')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input value="<?php echo e($data->id); ?>" id="id" type="hidden" name="id">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 offset-lg-2">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input value="<?php echo e($data->name); ?>" id="name" type="text" class="form-control <?php if($errors->has('name')): ?> is-invalid <?php endif; ?>" name="name" required autocomplete="name" autofocus>

                                                <?php if($errors->has('name')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Link</label>
                                                <input value="<?php echo e($data->link); ?>" id="link" type="text" class="form-control <?php if($errors->has('link')): ?> is-invalid <?php endif; ?>" name="link" required autocomplete="link" autofocus>

                                                <?php if($errors->has('link')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('link')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>


                                            <div class="form-group label-floating  ">
                                                <label class="control-label">Image 1</label>
                                                <input class="form-control" name="image" id="image"  type="file" />
                                            </div>




















                                        <?php if($data->type == 'course'): ?>
                                        <input value="<?php echo e($data->price); ?>" type="hidden" name="price">
                                        <input value="<?php echo e($data->commission); ?>" type="hidden" name="commission">
                                        <?php else: ?>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input value="<?php echo e($data->price ?? 0); ?>" id="price" type="text" class="form-control <?php if($errors->has('price')): ?> is-invalid <?php endif; ?>" name="price" autocomplete="price" autofocus>
                                                <?php if($errors->has('price')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('price')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Commission</label>
                                                <input value="<?php echo e($data->commission ?? 0); ?>" id="commission" type="text" class="form-control <?php if($errors->has('commission')): ?> is-invalid <?php endif; ?>" name="commission" autocomplete="commission" autofocus>
                                                <?php if($errors->has('commission')): ?>
                                                    <span class="text-danger">
                                                        <strong><?php echo e($errors->first('commission')); ?></strong>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            
                                            <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/products/edit.blade.php ENDPATH**/ ?>