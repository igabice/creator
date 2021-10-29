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
                                                <td>Image:</td>
                                                <td>
                                                    <?php if($user->image != null): ?>
                                                        <a href="<?php echo e($user->image); ?>" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>ID Card:</td>
                                                <th> <?php if(auth()->user()->id_card): ?>
                                                        <a href="<?php echo e(auth()->user()->id_card); ?>" ><h4>click to view document</h4></a>
                                                    <?php endif; ?>
                                                </th>
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
                                            <tr>
                                                <td>Bank:</td><th> <?php echo e($user->bank); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Account Name:</td><th> <?php echo e($user->account_name); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Account Number:</td><th> <?php echo e($user->account_number); ?></th>
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
                    <h4>Products</h4>
                    <div class="col-sm-6">
                      </div>





                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            
                            <th>Name</th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><?php echo e($object->name); ?> </td>
                                <td><?php echo e($object->price); ?> </td>
                                <td><?php echo e($object->commission); ?> </td>
                                <td>
                                    <a class="btn btn-outline-warning btn-sm" data-index="<?php echo e($loop->iteration -1); ?>"  data-toggle="modal" data-target="#make-campaign"> add campaign  </a>
                                <?php if(Auth::user()->role == 'M'): ?>
                                        <?php endif; ?>

                                    <?php if(Auth::user()->id == $user->id): ?>
                                            <form  action='/products/<?php echo e($object->id); ?>' method="POST">
                                                <?php echo method_field('DELETE'); ?>
                                                <?php echo e(csrf_field()); ?>

                                                
                                            </form>
                                            <a class="btn btn-outline-primary btn-sm" href="make-campaign <?php echo e(route('products.edit', $object->id)); ?>"> Edit  </a>
                                            <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('products.show', $object->id)); ?>"> View</a>
                                        <?php endif; ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>

            </div>
            </div>

    </div>

        <div id="make-campaign" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?php echo e(url('/campaign')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Create campaign for this product?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" id="main-content">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </div><!-- /.modal-content -->
                </form>
            </div><!-- /.modal-dialog -->
        </div>
    </div>

    <script>
       // $(".select2").select2();

       // $(document).ready(function() {

            var app = <?php echo json_encode($data, 15, 512) ?>;

            $('#make-campaign').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');
                console.log(i);
                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>Name:</td><th>'+ app[i].name  +'</th></tr>'+
                        '<tr><td>Price:</td><th>'+ app[i].price  +'</th></tr>\n' +
                        '<tr><td>Commission:</td><th>'+ app[i].commission +'</th></tr>\n' +
                        '<input type="hidden" name="product_id" value="'+ app[i].id +'">' +
                        '<input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">' +
                        '\n' +
                        '                            </table>');
                    //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });

       // })


        // function func(data) {
        //     $('#make-campaign').on('shown.bs.modal', function (e) {
        //     var i = $(e.relatedTarget).data('index');
        //     console.log(i);
        //     $("#main-content").html('<div class="box3">' + data[0].name + '<br>' + '</div>');
        // })
        // }

    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/users/viewcreator.blade.php ENDPATH**/ ?>