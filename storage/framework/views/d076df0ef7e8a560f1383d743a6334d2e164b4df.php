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
    
    
    <!--<script src="plugins/datatables/buttons.bootstrap4.min.js"></script>-->
    <script src="plugins/datatables/jszip.min.js"></script>
    <script src="plugins/datatables/pdfmake.min.js"></script>
    <script src="plugins/datatables/vfs_fonts.js"></script>
    <script src="plugins/datatables/buttons.html5.min.js"></script>
    <script src="plugins/datatables/buttons.print.min.js"></script>
    <script src="plugins/datatables/buttons.colVis.min.js"></script>
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
                    <h2><?php echo e($user->title); ?> <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
                <div class="col-sm-6">



                    <?php if($user->role == 'A'): ?>
                    <a href="/create-user" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-user-plus mr-2"></i> Create User
                    </a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">










































































    <div class="card-body">

        <?php if( auth()->user()->role == 'A'): ?>
        Verified: <i class="fa fa-check-circle" style="color: green"></i>

            Not verified: <i class="fa fa-ban" style="color: red"></i>
        <?php endif; ?>


        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <th></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?>


                            <?php if($user->verified == 1): ?>
                                <i class="fa fa-check-circle" style="color: green"></i>
                                <?php else: ?>
                                <i class="fa fa-ban" style="color: red"></i>
                           <?php endif; ?>
                        </td>
                        <td><?php echo e($user->last_name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <td><?php if($user->verified == 1): ?>
                        yes
                        <?php else: ?>
                        no
                        <?php endif; ?>
                        </td>
                        <td>
                            <form  action='/mills/<?php echo e($user->id); ?>' method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo e(csrf_field()); ?>

                                
                                <?php if(auth()->user()->role == 'A' || auth()->user()->id == $user->id): ?>
                                    <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>"> Edit  </a>
                                <?php endif; ?>

                                <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>"> View</a>

                            </form></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>
</div>
<div id="upload-user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(url('/users-upload')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload User File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a CSV file in the order of First name, Middle name, Surname, Phone number, Email Address, Location, Department,  and Account Type <span><br/><small>Possible account types are </small><span>
                        </label>
                        <input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>

<div id="upload-cro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(url('/cro-upload')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload CRO File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a CSV file in the order of Middle name, First name, Surname, Phone number, Email Address, Service Centre, Meter Book, Feeder Name, DSS Name, DSS Rating, Department, Account Type, TeamLead Email, BHM Email <span><br/><small>Possible account types are </small><span>
                        </label>
                        <input type="file" class="filestyle" name="manifest" data-buttonname="btn-secondary" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div>
<script>
$(function () {
    var table = $('#dataTable').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false,
        dom: 'Bfrtip',
                buttons: [
                    'csv', 'excel'
                ],
        
        
        
        
        
        
        
        
        
        
        
        
        
    });
    
    yadcf.init(table, [
                {column_number : 4, filter_default_label: "VERIFIED", filter_match_mode: "exact"},
            ]);




});
</script>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/users/list.blade.php ENDPATH**/ ?>