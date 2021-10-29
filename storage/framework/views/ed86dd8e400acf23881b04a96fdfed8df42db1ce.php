<?php $__env->startSection('content'); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

    <style>
        .copied:after {
            content: "copied";
            background-color: red;
            padding: 5px;
            display: block;
            position: absolute;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/clipboard.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Products</b></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Products </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        



                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">

                                            <a href="<?php echo e($data->image); ?>" data-fancybox="gallery">
                                                <img src="/<?php echo e($object->image ?? 'images/noimage.jpeg'); ?>" alt="" height="300">

                                            </a>

                                    </div>
                                    <div class="col-md-5">
                                        <table class="table table-bordered table-striped">

                                            <tr>
                                                <td>Name:</td><th> <?php echo e($data->name); ?></th>
                                            </tr>

                                            <tr><td>Available Quantity:</td><th> <?php echo e($data->quantity - $data->quantity_sold); ?></th></tr>

                                            <tr>
                                                <td>Price:</td><th> <?php echo e($data->price); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Commission:</td><th> <?php echo e($data->commission); ?></th>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <center>
                                                        <a href="/cart/<?php echo e($data->id); ?>"
                                                           class="btn btn-warning btn-icon btn-icon-right btn-lg">
                                                            <i class="fa fa-plus"></i> Add to Cart </a>
                                                    </center>
                                                </td>
                                            </tr>

                                        </table>
                                    </div>










































                                </div>


                </div>
            </div>
        </div>

        <div id="make-order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="<?php echo e(url('/orders')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel">Make an Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-striped">
                                <tr><td>Name:</td><th> <?php echo e($data->name); ?></th></tr>
                                <tr><td>Available Quantity:</td><th> <?php echo e($data->quantity - $data->quantity_sold); ?></th></tr>
                                <tr><td>Unit:</td><th> <?php echo e($data->unit); ?></th></tr>
                                <tr><td>Price:</td><th> <?php echo e($data->price); ?></th></tr>
                                <tr><td>Delivery Fee:</td><th> <?php echo e($data->delivery_fee == 0 ? 'Free' : $data->delivery_fee); ?></th></tr>

                            </table>
                            <div class="form-group  ">
                                <label for="title">Quantity</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" max="<?php echo e($data->quantity - $data->quantity_sold); ?>">
                            </div>
                            <div class="form-group">
                                <label for="payment_type">Payment Type</label>
                                <select name="payment_type" id="payment_type" required class="form-control select2">
                                    <option value="Litres">Bank Transfer</option>
                                    <option value="Bottles">Card Payment</option>
                                </select>
                            </div>
                            <div  class="form-group">
                                <label for="delivery_address">Delivery Information</label><br>
                                <textarea name="delivery_address" id="delivery_address" class="form-control"></textarea>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
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
                    responsive: true,
                    lengthChange: false,
                    
                       
                        
                        
                    

                });

                new ClipboardJS('.btn');

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
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/products/show.blade.php ENDPATH**/ ?>