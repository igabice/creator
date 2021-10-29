<?php $__env->startSection('content'); ?>

    <!-- Content area -->
    <div class="row align-items-center">
        <div class="col-12">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2><?php echo e($user->name); ?> <?php echo e($user->middle_name); ?> <?php echo e($user->last_name); ?> <small> (<?php echo e($user->getRole()); ?>) </small></h2>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">User </a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <?php if($user->id_verified == 0 && auth()->user()->role == 'A'): ?>
                        <a class="btn btn-lg btn-primary" href="/approve/<?php echo e($user->id); ?>" title="verify user?">
                            Click to verify this user <i class="fa fa-check-circle" ></i>
                        </a>

                    <?php endif; ?>
                    
                    <?php if($user->is_kyc == 0 && auth()->user()->role == 'A'): ?>
                        <a class="btn btn-lg btn-primary" href="/approve-kyc/<?php echo e($user->id); ?>" title="verify KYC?">
                            Click to approve KYC details <i class="fa fa-check-circle" ></i>
                        </a>

                    <?php endif; ?>
                    
            
<br>
                    <table class="table table-bordered" width="100%">

                                            <tr>
                                                <td>Images:</td>
                                                <td>
                                                    <?php if($user->image != null): ?>
                                                        <a href="<?php echo e($user->image); ?>" data-fancybox="gallery">
                                                            view image
                                                        </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Email:</td><th> <?php echo e($user->email); ?></th>
                                            </tr>
                                            <tr>
                                                <td>ID Card:</td>
                                                <th> <?php if(auth()->user()->id_card): ?>
                                                        <a href="<?php echo e(auth()->user()->id_card); ?>" >click to view document</a>
                                                    <?php endif; ?>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td>Phone:</td><th> <?php echo e($user->phone); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Address:</td><th> <?php echo e($user->address); ?></th>
                                            </tr>
                                            <tr>
                                                <td>Wallet Balance:</td><th> <?php echo e($user->getWallet()); ?></th>
                                            </tr>

                                            <?php if(!is_null($user->date_created)): ?>
                                                <tr>
                                                    <td>Created Date:</td><th> <?php echo e($user->date_created); ?></th>
                                                </tr>
                                            <?php endif; ?>
                                            <?php if(Auth::user()->role == 'A'): ?>
                                                <tr>
                                                    <td colspan="2">
                                                        <h4>Topup Wallet</h4>
                                                        <form class="form-horizontal" method="POST" action="<?php echo e(url('/topup-wallet')); ?>" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <input value="<?php echo e($user->id); ?>" id="user_id" type="hidden" name="user_id">

                                                            <div class=" text-left ">
                                                                <div class="form-group">
                                                                    <label for="amount">Amount</label>
                                                                    <input  id="amount" type="number" class="form-control <?php if($errors->has('amount')): ?>is-invalid <?php endif; ?>"
                                                                     name="amount" required >

                                                                    <?php if($errors->has('amount')): ?>
                                                                        <span class="text-danger">
                                                        <strong><?php echo e($errors->first('amount')); ?></strong>
                                                    </span>
                                                                    <?php endif; ?>
                                                                    
                                                                    <div class="form-group row">
                                                                        <label class="col-sm-3 col-form-label" for="role">Type</label>
                                                                        <div class="col-sm-9">
                                                                          <select name="type" id="type" required class="form-control">
                                                                            <option value="credit">Credit</option>
                                                                            <option value="debit">Debit</option>
                                                                        </select>
                                                                        <?php if($errors->has('id_type')): ?>
                                                                            <span class="text-danger">
                                                                                <strong><?php echo e($errors->first('id_type')); ?></strong>
                                                                            </span>
                                                                        <?php endif; ?>  
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </div>
                                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">SUBMIT</button>
                                                            </div>
                                                        </form>

                                                    </td>
                                                </tr>
                                                
                                            <?php endif; ?>
                                        </table>
                                        
                                    <ul>
                                        <?php if($ref1): ?>
                                        <a href = '/users/<?php echo e($ref1->id); ?>'>
                                            <li>
                                            <?php echo e($ref1->name); ?> <?php echo e($ref1->middle_name); ?> <?php echo e($ref1->last_name); ?>

                                        </li>
                                        </a>
                                        
                                        <?php endif; ?>
                                        <?php if($ref2 ): ?>
                                        <a href = '/users/<?php echo e($ref2->id); ?>'>
                                            <li>
                                            <?php echo e($ref2->name); ?> <?php echo e($ref2->middle_name); ?> <?php echo e($ref2->last_name); ?>

                                        </li>
                                        </a>
                                        
                                        <?php endif; ?>
                                        <?php if($ref3): ?>
                                        <a href = '/users/<?php echo e($ref3->id); ?>'>
                                            <li>
                                            <?php echo e($ref3->name); ?> <?php echo e($ref3->middle_name); ?> <?php echo e($ref3->last_name); ?>

                                        </li>
                                        </a>
                                        
                                        <?php endif; ?>
                                    </ul>
                                    
                </div>

            <div class="col-md-7">
                <div class="col">
                    <h3>Campaigns</h3>
                    <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            
                            <th> Product </th>
                            <th>Price</th>
                            <th>Commission</th>
                            <th>Date Added </th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $object): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                
                                <td><a href="/products/<?php echo e($object->product_id); ?>"><?php echo e($object->name); ?></a> </td>
                                <td><?php echo e($object->price); ?> </td>
                                <td><?php echo e($object->commission); ?> </td>
                                <td><?php echo e($object->created_at); ?> </td>

                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    
                    <h4>Referrals</h4>
        <table id="dataTable2" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Phone No.</th>
                    <!--<th>Action</th>-->
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $referrals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($user->name); ?>


                            <?php if($user->verified == 1): ?>
                                <i class="fa fa-check-circle" style="color: green"></i> <small> team member</small>
                                <?php else: ?>
                                <i class="fa fa-ban" style="color: red"></i><small> prospect</small>
                           <?php endif; ?>
                        </td>
                        <td><?php echo e($user->last_name); ?></td>
                        <td><?php echo e($user->email); ?></td>
                        <td><?php echo e($user->phone); ?></td>
                        <!--<td>-->
                        <!--    <form  action='/mills/<?php echo e($user->id); ?>' method="POST">-->
                        <!--        <?php echo method_field('DELETE'); ?>-->
                        <!--        <?php echo e(csrf_field()); ?>-->
                        <!--        -->
                        <!--        <?php if(auth()->user()->role == 'A' || auth()->user()->id == $user->id): ?>-->
                        <!--            <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('users.edit', $user->id)); ?>"> Edit  </a>-->
                        <!--        <?php endif; ?>-->

                        <!--        <a class="btn btn-outline-success btn-sm" href="<?php echo e(route('users.show', $user->id)); ?>"> View</a>-->

                        <!--    </form></td>-->
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>

                </div>
                
            

            </div>
            </div>

    </div>
    </div>

    <script>
        $(".select2").select2();
        
         $('#dataTable').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false
    });
     $('#dataTable1').DataTable({
        serverSide: false,
        processing: true,
        responsive: true,
        lengthChange: false
        
    });

    </script>

    <!-- /content area -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mac/webProjects/creator/resources/views/users/marketerview.blade.php ENDPATH**/ ?>