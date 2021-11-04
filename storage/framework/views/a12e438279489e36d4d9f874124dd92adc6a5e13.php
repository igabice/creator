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

<!-- Content area -->
<div class="row align-items-center">
    <div class="col-12">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>My Cart <b></b></h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">My Cart</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body col-md-10 offset-lg-1">

        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

            <tbody>
            <?php if(count($data) > 0): ?>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <img src="/<?php echo e($object->image ?? 'images/noimage.jpeg'); ?>" style="max-height: 100px"
                             alt="Bootstrap shopping cart table example"
                             title="Bootstrap shopping cart table example"
                             class="img-fluid rounded">
                    </td>
                    <td colspan="3">
                        <h4><?php echo e($object->name); ?></h4>
                        <?php echo e($object->description); ?>

                    </td>
                    <td>
                        <?php echo e($object->price); ?>

                    </td>
                    <td>
                        <a class="btn btn-danger text-left" href='/cart-delete/<?php echo e($object->product_id); ?>'>
                            <i class="fa fa-trash" style="color: #ffffff"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="5"><h3>TOTAL: ₦<?php echo e(number_format($sum, 2, '.', ',')); ?></h3> </td>

                <td>

                    <form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                        <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                        <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                        <input type="hidden" name="amount" value="<?php echo e($sum * 100); ?>"> 
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="currency" value="NGN">
                        <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'cart'])); ?>" >
                        <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                        <?php echo e(csrf_field()); ?>

                        <button class="btn btn-lg btn-success btn-block" type="submit" value="Checkout">
                            <span class="f-s--xs">Checkout </span><i class="fa fa-check-circle"></i>
                        </button>


                    </form>


                </td>
            </tr>
                <?php else: ?>
                <h1>You cart is empty</h1>
                <?php endif; ?>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/7dc/resources/views/cart/list.blade.php ENDPATH**/ ?>