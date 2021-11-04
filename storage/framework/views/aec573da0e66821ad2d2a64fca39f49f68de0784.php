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
                    <h2><b> Welcome to </b> AffiliateDNg</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                 <div class="col-sm-6">
                    <a href="https://wa.me/+2348038574070"  target="_blank" class="btn btn-success ">
                        <i class="fas fa-chat"></i> TECH SUPPORT
                    </a>
                    <a href="https://wa.me/+2348170940000"  target="_blank" class="btn btn-warning">
                        <i class="fas fa-calendar-plus "></i> MEMBER SUPPORT
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
                                <i class="fa fa-users" style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Affiliates </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> <?php echo e($marketers); ?></h2>

                        </div>
                    </div>
                </div>
            </div>



















            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: black">
                                <i class="fa fa-shopping-cart " style="color: white"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: black"> Products</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> <?php echo e($products); ?></h2>
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
                            <h5 style="color: black"> Referral <br> Bonus</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> N<?php echo e($wallet->referral_bonus); ?></h2>

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
                      <br>

                        <a href="https://flutterwave.com/pay/7dyearly" class="btn btn-sm btn-block btn-warning">ACCESS YOUR MEMBERSHIP HERE (ONE YEAR)</a>

                   
                </div>
            </div>

        <?php endif; ?>




        <center>
            <iframe width="760" height="415" src="https://youtu.be/QOk65-c8_F0" title="YouTube video player"
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>

            </iframe>
        </center>
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




    });
</script>
<!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/7dc/resources/views/dashboard/admin.blade.php ENDPATH**/ ?>