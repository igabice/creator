<?php $__env->startSection('content'); ?>

<?php $__env->startSection('css'); ?>
    <link href='asset/datatables/dataTables.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/buttons.bootstrap4.min.css' rel="stylesheet" type="text/css" />
    <link href='asset/datatables/responsive.bootstrap4.min.css' rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src='asset/datatables/jquery.dataTables.min.js'></script>
    <script src='asset/datatables/dataTables.bootstrap4.min.js'></script>
    <script src='asset/datatables/dataTables.buttons.min.js'></script>
    <script src='asset/datatables/buttons.bootstrap4.min.js'></script>
    <script src='asset/datatables/dataTables.responsive.min.js'></script>
    <script src='asset/datatables/responsive.bootstrap4.min.js'></script>


    <!--<script src="asset/datatables/buttons.bootstrap4.min.js"></script>-->
    <script src="asset/datatables/jszip.min.js"></script>
    <script src="asset/datatables/pdfmake.min.js"></script>
    <script src="asset/datatables/vfs_fonts.js"></script>
    <script src="asset/datatables/buttons.html5.min.js"></script>
    <script src="asset/datatables/buttons.print.min.js"></script>
    <script src="asset/datatables/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function(){

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


    <?php $__env->stopSection(); ?>


    <div class="inner-page">

        <section id="inner-banner">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 heading">
                        <?php if(isset(request()->type)): ?>
                        <h3><?php echo e(request()->type); ?></h3>
                        <?php else: ?>
                        <h3>All Users</h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" style="color: white">
                    <div class="col-lg-6">
                        <?php if(session()->has('success')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>Well done!</strong> <?php echo e(session()->get('success')); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                      <?php if( auth()->user()->role == 'A'): ?>
                                Verified: <i class="fa fa-check-circle" style="color: green"></i>

                                Not verified: <i class="fa fa-ban" style="color: red"></i>
                            <?php endif; ?>


                            <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <?php if(isset(request()->type)): ?>
                                        <?php if(request()->type == 'Creators'): ?>
                                        <th>Earnings</th>
                                        <?php else: ?>
                                            <th>Earnings</th>
                                            <th>Balance</th>
                                            <?php endif; ?>
                                    <?php else: ?>

                                    <?php endif; ?>
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

                                        <?php if(isset(request()->type)): ?>
                                            <?php if(request()->type == 'Creators'): ?>
                                                <td><?php echo e($user->revenue); ?></td>
                                            <?php else: ?>
                                                <td><?php echo e($user->referral_bonus); ?></td>
                                                <td><?php echo e($user->balance); ?></td>
                                            <?php endif; ?>
                                        <?php else: ?>

                                        <?php endif; ?>
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

                                                <?php if($user->verified == 0 && auth()->user()->role == 'A'): ?>
                                                    <a class="btn btn-sm btn-outline-warning" href="/approve/<?php echo e($user->id); ?>" title="verify user?">
                                                        verify?
                                                    </a>
                                                <?php endif; ?>
                                            </form></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>

                            </table>


                </div>

            </div>
        </div>
    </section>




    </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/all-users.blade.php ENDPATH**/ ?>