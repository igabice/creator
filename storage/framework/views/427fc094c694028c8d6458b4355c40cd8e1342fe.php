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
                    <h2><b> Welcome to </b> AffiliateNg</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">
                                <?php if($user->role == 'C'): ?>
                                    Creator
                                <?php elseif($user->role == 'M'): ?>
                                    Affiliate
                                <?php else: ?>
                                    Admin
                                <?php endif; ?>
                                Dashboard</a></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <a href="/create-product" class="btn btn-primary waves-effect waves-light">
                        <i class="fas fa-shopping-basket mr-2"></i> Add Products
                    </a>
                    
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
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-shopping-cart" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Products </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> <?php echo e(count($products)); ?></h2>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Campaigns </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> <?php echo e(count($campaigns)); ?></h2>

                        </div>
                    </div>
                </div>
            </div>

















            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: black">
                        <i class="fa fa-wallet" style="color: white"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Wallet</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> N<?php echo e($wallet->balance); ?></h2>
                            <a href="#" style="color: black"><h6> </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-9 cta-contents">
                <h4 class="cta-title"> <i class=" btnn btn btn-primary" title="click to copy" data-clipboard-text="<?php echo e(request()->root()); ?>/register?ref=<?php echo e($user->id); ?>">click to copy referral link:  <?php echo e(request()->root()); ?>/register?ref=<?php echo e($user->id); ?></i></h4>
            </div>
        </div>
        <center>
            <div class="embed-responsive embed-responsive-16by9 col-md-6 ">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mYHSw_Tr3Bc" allowfullscreen></iframe>
            </div>
            <!--QOk65-c8_F0-->
        </center>
        <?php if($user->verified == 0): ?>
            <div class="alert alert-primary">
                <div class="row">
                    <div class="col-md-9 cta-contents">
                        <h4 class="cta-title">Become a verified 7D Affiliate!</h4>
                        <div class="cta-desc">
                            <p>Get Verified today to:</p>
                            <ul>
                                <li>gain access to a range of marketing tutorials and resources that'll boost your sales. </li>
                                <li>Get ₦5,000 referral bonus for every new user that registers using your referral link.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 cta-button">
                        <br>

                        <form method="POST" action="<?php echo e(route('pay')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                            <input type="hidden" name="email" value="<?php echo e($user->email); ?>"> 
                            <input type="hidden" name="orderID" value="<?php echo e($user->email.\Illuminate\Support\Facades\Date::now()); ?>">
                            <input type="hidden" name="amount" value="1000000"> 
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="currency" value="NGN">
                            <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['user_id' => $user->id, 'type' => 'verification'])); ?>" >
                            <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 

                            <?php echo e(csrf_field()); ?>

                            <button class="btn btn-lg btn-block btn-primary" type="submit" value="Pay Now!">
                                <span class="f-s--xs">Go for it! </span><i class="fa fa-check-circle"></i>
                            </button>


                        </form>

                    </div>
                </div>
            </div>


        <?php endif; ?>






































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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/dashboard/creator.blade.php ENDPATH**/ ?>