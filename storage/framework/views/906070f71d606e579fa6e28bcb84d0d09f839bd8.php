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

            $('#dataTable').DataTable({
                serverSide: false,
                processing: false,
                responsive: true,
                lengthChange: true,


            });

            var app = <?php echo json_encode($data, 15, 512) ?>;

            $('#actionPayout').on('shown.bs.modal', function (e) {
                var i = $(e.relatedTarget).data('index');
                console.log(i);
                $("#main-content")
                    .html('<table class="table table-bordered table-striped"><tr><td>First Name:</td><th>'+ app[i].name  +'</th></tr>'+
                        '<tr><td>Last Name:</td><th>'+ app[i].last_name +'</th></tr>\n' +
                        '<tr><td>Amount:</td><th>'+ app[i].amount  +'</th></tr>\n' +
                        '<input type="hidden" name="pid" value="'+ app[i].pid +'">' +
                        '<input type="hidden" name="verified" value="1">' +
                        '<input type="hidden" name="approved_by" value="<?php echo e(Auth::user()->id); ?>">' +
                        '<input type="hidden" name="user_id" value="'+ app[i].user_id +'">' +
                        '\n' +
                        '                            </table>');
                //.html('<div class="box3">' + app[i].name + '<br>' + '</div>');
            });


        });
    </script>

    <?php $__env->stopSection(); ?>


    <div class="inner-page">




    <!-- INNER_PAGE_BANNER AREA START -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h3>Payouts</h3>
                </div>
            </div>

        </div>
    </section>


    <section id="cart-view">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <table id="dataTable" class="table  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Account</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><a href="/users/<?php echo e($object->user_id); ?>"><?php echo e($object->getUser()); ?></a> </td>
                                <td>
                                    <?php if($object->verified == 0): ?>
                                        <?php echo e($object->amount); ?>

                                    <?php else: ?>
                                        <?php echo e($object->amount - ($object->amount*0.01)); ?>

                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($object->verified == 0): ?>
                                        <p style="background-color: orange; width: 60px; color: white; padding: 5px; border-radius: 10px" ><small>Pending</small></p>
                                    <?php else: ?>
                                        <p style="background-color: darkgreen; width: 60px; color: white; padding: 5px; border-radius: 10px" ><small>Paid</small></p>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($object->getAccount()); ?> </td>
                                <td><?php echo e($object->updated_at); ?> </td>
                                <td>
                                    <?php if($object->verified == 0): ?>
                                        <a class="btn btn-outline-success btn-sm" data-index="<?php echo e($loop->iteration -1); ?>"
                                           data-toggle="modal" data-target="#actionPayout"> <i class="fa fa-eye" > </i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </section>



        <div id="actionPayout" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?php echo e(url('/approve-payout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Approve Payout?</h5>
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




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/all-payouts.blade.php ENDPATH**/ ?>