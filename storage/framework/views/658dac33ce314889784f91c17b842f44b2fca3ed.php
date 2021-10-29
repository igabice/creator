<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo e($user->name); ?> <?php echo e($user->middle_name); ?> <?php echo e($user->last_name); ?> <small> (<?php echo e($user->getRole()); ?>) </small></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <table class="table table-bordered" width="100%">

                                            <tr>
                                                <td>Images:</td>
                                                <td>
                                                    <?php if($user->image != null): ?>
                                                        <a href="<?php echo e($user->image); ?>" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td><th> <?php echo e($user->email); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td><th> <?php echo e($user->phone); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Address:</td><th> <?php echo e($user->address); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Wallet Balance:</td><th> <?php echo e($user->getWallet()); ?></th>
                                            </tr>

                                            <?php if(!is_null($user->date_created)): ?>
                                                <tr>
                                                    <td>Created Date:</td><th> <?php echo e($user->date_created); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                        </table>
                </div>

            <div class="col-md-7">
                <div class="col">
                    <h3>Campaigns</h3>










                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            
                            <th> Product </th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Date Added </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><a href="/products/<?php echo e($object->product_id); ?>"><?php echo e($object->name); ?></a> </td>
                                <td><?php echo e($object->price); ?> </td>
                                <td><?php echo e($object->commission); ?> </td>
                                <td><?php echo e($object->created_at); ?> </td>
                                









                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

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
        //     $.LoadingOverlay("show");
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/users/marketerview.blade.php ENDPATH**/ ?>