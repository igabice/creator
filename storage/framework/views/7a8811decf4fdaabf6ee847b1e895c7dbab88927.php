<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <strong>Well done!</strong> <?php echo e(session()->get('success')); ?>

    </div>
<?php endif; ?>
<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b> Welcome to </b> Grabbs</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="card-group">
            <!-- Card -->
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> This Month </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> 788</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Today </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> 788</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> This Week</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> 788</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: white">
                        <i class="fa fa-shopping-cart " style="color: #1b9c71"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Previous Month</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> 788</h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br>
        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price/Unit</th>
                    
                    <th>Farm</th>
                    <th>Owner</th>
                    <th>Last Updated</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td><?php echo e($object->image); ?> </td>
                        <td><?php echo e($object->name); ?> </td>
                        <td><?php echo e($object->quantity); ?></td>
                        <td><?php echo e($object->price); ?> </td>
                        
                        <td><?php echo e($object->getFarm()->name); ?> </td>
                        <td><?php echo e($object->getUser()); ?> </td>
                        <td><?php echo e($object->updated_at); ?> </td>
                        
                        <td>
                            <form  action='/products/<?php echo e($object->id); ?>' method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo e(csrf_field()); ?>

                                
                                <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('products.edit', $object->id)); ?>"> Edit  </a>
                                <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('products.show', $object->id)); ?>"> View</a>
                            </form></td>
                    </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>


























<script>
    $(function () {
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: true,
            lengthChange: false,
            
            
            
            
            
            // columns: [
            //     {data: 'first_name'},
            //     {data: 'middle_name'},
            //     {data: 'last_name'},
            //     {data: 'email'},
            //     {data: 'phone'},
            //     {data: 'department_name', name:'departments.name'},
            //     {data: 'account_name', name:'account_types.name'},
            //     {data: 'role_name', name:'account_types.name'},
            //     {data: 'store_name', name:'stores.name'},
            //     {data: 'status_name',name:'status.name'},
            //     {data: 'action', orderable: false, searchable: false}
            // ]
        });

        // $('#dataTable').on('click', '.btn-delete[data-remote]', function (e)
        // {
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     var url = $(this).data('remote');
        //     // confirm then
        //     if (confirm('Are you sure you want to delete this?')) {
        //         $.ajax({
        //             url: url,
        //             type: 'DELETE',
        //             dataType: 'json',
        //             data: {method: '_DELETE', submit: true}
        //         }).always(function (data) {
        //             $('#dataTable').DataTable().draw(false);
        //         });
        //     } else
        //         alert("You have cancelled!");
        // });

    });
</script>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/home.blade.php ENDPATH**/ ?>