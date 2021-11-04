<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link href='plugins/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='plugins/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src='plugins/datatables/jquery.dataTables.min.js'></script>
    <script src='plugins/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.buttons.min.js'></script>
    <script src='plugins/datatables/buttons.bootstrap4.min.js'></script>
    <script src='plugins/datatables/dataTables.responsive.min.js'></script>
    <script src='plugins/datatables/responsive.bootstrap4.min.js'></script>

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
                    <h2>Campaigns <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Campaigns</li>
                    </ol>
                </div>
                
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">

        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
            <tr>

                <th>Product Name</th>
                <th>Price</th>
                <th>Commission</th>
                <th>Referral Link</th>
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
                        <button class="btn btnn" title="click to copy"
                                data-clipboard-text="<?php echo e(url('/')); ?>/refer-product/<?php echo e($object->id); ?>/?ref=<?php echo e($object->user_id); ?>">
                            <?php echo e(url('/')); ?>/refer-product/<?php echo e($object->id); ?>/?ref=<?php echo e($object->user_id); ?>

                        </button>
                        <button class="btn btnn" title="click to copy"
                                data-clipboard-text="<?php echo e(url('/')); ?>/refer-product/<?php echo e($object->id); ?>/?ref=<?php echo e($object->user_id); ?>">
                            <i class="fa fa-book"></i>
                        </button>
                    </td>
                    
                    <td>
                        <form  action='/products/<?php echo e($object->id); ?>' method="POST">
                            <?php echo method_field('DELETE'); ?>
                            <?php echo e(csrf_field()); ?>

                            
                        </form>

                        <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('products.show', $object->id)); ?>"> View</a>
                    </td>
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



        function clicked() {

            this.className = 'copied';
            var td = this;
            setTimeout(function() {
                td.className = '';
            }, 1000)
            // -------      up to here      -------
        }

    });
</script>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/7dc/resources/views/campaign/list.blade.php ENDPATH**/ ?>