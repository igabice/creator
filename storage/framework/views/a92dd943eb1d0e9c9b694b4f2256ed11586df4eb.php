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
                    <h2><b> Welcome to </b> 7DC</h2>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">7D Affiliate Dashboard</a></li>
                    </ol>
                </div>
                 <div class="col-sm-6">
                    <a href="https://wa.me/+2348038574070"  target="_blank" class="btn btn-success ">
                        <img style="max-height:30px" src="/uploads/whatsapp.png" alt="Whatsapp"> TECH SUPPORT
                    </a>
                    <a href="https://wa.me/+2348170940000"  target="_blank" class="btn btn-warning">
                        <img style="max-height:30px" src="/uploads/whatsapp.png" alt="Whatsapp"> MEMBER SUPPORT
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card" style="background-color: #000;">
    <div class="card-body" style="background-color: #000;">
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
                            <h2 class="m-b-0 font-light" style="color: black"> ₦<?php echo e($wallet != null ? $wallet->balance : '0.0'); ?></h2>

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
                            <h5 style="color: black"> Referral Bonus</h5>
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light" style="color: black"> ₦<?php echo e($wallet != null ? $wallet->referral_bonus : '0.0'); ?></h2>
                            <a href="#" style="color: black"><h6> </h6></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9 cta-contents">
                <h4 class="cta-title">
                    <i class=" btnn btn btn-warning" title="click to copy" data-clipboard-text="<?php echo e(request()->root()); ?>/register?ref=<?php echo e($user->id); ?>">click to copy referral link:  <?php echo e(request()->root()); ?>/register?ref=<?php echo e($user->id); ?></i>
                </h4>
                
            </div>
        </div>

        <center>
            <div class="row">
                            <div class="embed-responsive embed-responsive-16by9 col-md-6 ">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/mYHSw_Tr3Bc" allowfullscreen></iframe>
            </div>
            <div style="max-height:500px" class="col-md-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                          <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img style="max-height:500px" src="/images/richest.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/affirmations.png" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/hashtags.png" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                              <img style="max-height:500px" src="/images/independence.jpg" alt="Fourth slide">
                            </div>
                          </div>
                          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
            </div>
            </div>
        </center>

        <?php if($user->verified == 0 || $user->verified == 1): ?>
        
                              
            <div class="alert ">
                
                    <div class="col-md-12 cta-contents" style="color: black; ">
                            
                              <div style="background-color: white; border-radius: 20px; padding: 20px" class="row">
                                  
                                      
                                    
                                        <div class="cta-desc col-md-6" style="text-align: left">
                                            <center>
                                            <h3 class="cta-title" style="color: #d79711">THANK YOU for joining this community.</h3>
                                              <h4 class="cta-title" style="color: black">You are now a FULL FLEDGED 7Digits AFFILIATE! </h4>
                                              <h5 class="cta-title" style="color: black; font-weight: bold">Now, it's time for YOU to TAKE the NEXT STEP <br>
                                                  Towards making up to N5 million naira monthly! Yeah!
                                              </h5>
                                           </center>
                                              <h5 class="cta-title" style="color: black; font-weight: bold">Join THE N5 MILLION NAIRA OCTOBER CHALLENGE <br>
            
                                                  EARN N5 Million Naira this October on <b>AfiliatedNg</b> <br/>
                                                  Win  cool bonuses and other membership benefits!
                                              </h5>
                                              <h4 class="cta-title" style="color: #d79711">HOW TO JOIN;</h4>
                                                  <h5>
                                                  1. Commit to the challenge with a token of N10, 500<br>
                                                  Get N12,000 Membership bonus credited on your ewallet, immediately<br>
                                                      <br>
                                                  2. Follow the daily IG Live... Time will be communicated when you commit<br>
                                                      <br>
                                                  3. You'll be added to our motivated WhatsApp community of high flyers. 
                                                  where you have access to multiple "back-to-back" values from Our CEO, Dr OluAyoola<br>
                                                      <br>
                                                  4. Do the N5M Challenge activities<br>
                                                      <br>
                                                  5. Get results.<br>
                                                  </h5>
                                                  <br>
                                                <a href="https://flutterwave.com/pay/7dyearly" class="btn btn-sm btn-block btn-warning">ACCESS YOUR MEMBERSHIP HERE (ONE YEAR)</a>

                                          </div>
                                  
                                  
                                  <div class="col-md-6">
                                    <h3 class="cta-title" style="color: #d79711">ENJOY THE FOLLOWING BENEFITS AS A 7D AFFILIATE</h3><br>
                                    <div class="row">
                                            <h6>1.  LEARN 28+ HIGH-INCOME SKILLS<br>
                                                Each skill can earn you more than 1 million naira monthly!<br>
                                                Some can earn you up to 5 million naira in a month!<br><br>

                                                2. WIN FREE Gadgets, House Appliances, Cool rides etc.<br>
                                                How does  iPhone 12 Pro Max, Samsung S21 Ultra, LG LED TV, Washing Machine, Smart Fridge, Lexus, Benz etc. sound to you?<br>
                                                Never have to worry about any of these little things.<br><br>

                                                3. FREE Bi-Annual Trips to Dubai, Mauritius, Maldives etc.<br>
                                                How does that sound....?  YES, for FREE! All expenses PAID!<br><br>
                                                
                                                4. FREE Health Insurance Package<br>
                                                Never ever have to worry about paying medical bills! Ever<br><br>

                                                5. A Family-like Community.<br>
                                                A family you can always rely on 24/7.... YOU ARE NEVER ALONE!<br><br>

                                                6. 24/7 Telegram Support group<br>
                                                NO MORE STRUGGLE! We are here for you always!<br><br>

                                                7. Mentorship Access with OluAyoola7D<br>
                                                THE ICING on the CAKE! Lol<br>

                                               <br></h6><br>
                                        
                                        
                                    </div>
                                </div>
        
                                  </div>


                                  
                                


                        </div>
                    
                </div>
        <?php endif; ?>












        <br>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/affilia1/affiliatedng/resources/views/dashboard/marketer.blade.php ENDPATH**/ ?>