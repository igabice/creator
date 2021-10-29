<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2> <b> Request Payouts</b></h2>
                        <ol class="breadcrumb mb-0">
                         </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-group">
            <!-- Card -->

            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg " style="background-color: white">
                                <i class="fa fa-users" style="color: #1b9c71"></i>
                            </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Pending  </h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> <?php echo e($pending != null ?  $pending->amount : '0.0'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: white">
                        <i class="fa fa-wallet" style="color: #1b9c71"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Wallet</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> N<?php echo e($wallet->balance); ?></h2>
                            <a href="#" style="color: white"><h6>view </h6></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body dark-bg">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                    <span class="btn btn-circle btn-lg " style="background-color: white">
                        <i class="fa fa-wallet" style="color: #1b9c71"></i>
                    </span>
                        </div>
                        <div>
                            <h5 style="color: white"> Referral Bonus</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: white"> N<?php echo e($wallet->referral_bonus); ?></h2>
                            <a href="#" style="color: white"><h6>view </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-body">
            <div class="row">

                    <div class="col-md-6">
                        <form class="form-horizontal" method="POST" action="<?php echo e(url('/request-payouts')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input value="<?php echo e($user->id); ?>" id="user_id" type="hidden" name="user_id">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label for="amount">Amount</label>
                                                        <input  id="amount" type="number" class="form-control <?php if($errors->has('amount')): ?>is-invalid <?php endif; ?>"
                                                                max="<?php echo e($wallet->balance); ?>" min="1000" name="amount" required >

                                                        <?php if($errors->has('amount')): ?>
                                                            <span class="text-danger">
                                                        <strong><?php echo e($errors->first('amount')); ?></strong>
                                                    </span>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input id="password" type="password"
                                                               class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>" name="password">
                                                        <?php if($errors->has('password')): ?>
                                                            <span class="text-danger">
                                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                                    </span>
                                                        <?php endif; ?>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row m-t-20">

                                                <div class="col-sm-6 text-left ">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p> approved payouts wil be made to:<br> <b> <?php echo e($user->account_name); ?> <?php echo e($user->account_number); ?> (<?php echo e($user->bank); ?>)</b> </p>

                    </div>
                    <div class="col-md-6">
                        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                
                                <th>Amount</th>
                                <th>Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $payouts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    
                                    <td><?php echo e($object->amount); ?> </td>
                                    <td><?php echo e($object->created_at); ?> </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>

    <script>
        $(".select2").select2();


    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/users/payouts.blade.php ENDPATH**/ ?>