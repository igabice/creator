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
                    <h2>Laws <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Laws</li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <a href="/create-laws" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-user-plus mr-2"></i> Add Laws
                    </a>




                    
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
                    <th>Title</th>

                    <th>Downloadable</th>
                    <th>Enactment</th>
                    <?php if(Auth::user()->role == 'admin'): ?><th>State</th><?php endif; ?>
                    <th>Date Published</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($object->title); ?> </td>
                        <td><?php echo e($object->status); ?> <?php if($object->status == 'paid'): ?><?php echo e(', N'.$object->price); ?> <?php endif; ?> </td>
                        <td><?php echo e($object->enactment); ?> </td>
                        <?php if(Auth::user()->role == 'admin'): ?><td><?php echo e($object->getState()); ?></td><?php endif; ?>
                        <td><?php echo e($object->date_published); ?> </td>


                        <td>
                            <form  action='/Laws/<?php echo e($object->id); ?>' method="POST">
                                <?php echo method_field('DELETE'); ?>
                                <?php echo e(csrf_field()); ?>

                                
                                <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('laws.edit', $object->id)); ?>"> Edit  </a>
                                <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('laws.show', $object->id)); ?>"> View</a>
                            </form></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>
</div>
<div id="upload-law" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(url('/upload-laws')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upload Laws File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Upload a  file in the order of Title, Long Title, Citation, Enactment and Date Published
                        </label>
                        <a href="/law-upload-file.xls" class="btn btn-success waves-effect waves-light">Download Format File</a>
                        <br>
                        <br>
                        <input type="file" class="filestyle" name="upload_file" data-buttonname="btn-secondary" required>
                        <?php if(Auth::user()->role == 'state-admin'): ?>
                            <input name="state_id" type="hidden" value="<?php echo e(Auth::user()->state); ?>">
                        <?php elseif(Auth::user()->role == 'admin'): ?>
                                <div class="form-group">
                                    <label for="role_level">State</label>
                                    <select name="state_id" id="state_id" required class="form-control">
                                        <option value=""></option>
                                        <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($object->id); ?>"><?php echo e($object->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                         <?php endif; ?>
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
        $('#dataTable').DataTable({
            serverSide: false,
            processing: false,
            responsive: false,
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/legool-app/resources/views/laws/list.blade.php ENDPATH**/ ?>