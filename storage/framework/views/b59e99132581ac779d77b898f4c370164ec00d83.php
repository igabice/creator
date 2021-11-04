

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex logo-back">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="<?php echo e(route('home')); ?>" class="logo logo-light">

                        <span class="logo-sm ">
                        
                         <img src="<?php echo e(asset('images/logo-sm1.png')); ?>" alt="" height="35">
                    </span>
                    <span class="logo-lg">

                         <img src="<?php echo e(asset('images/aff.png')); ?>" alt="" height="60" width="200">
                    </span>
                </a>
            </div>


            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

            
                
                    
                        
                    
                
            
        </div>

        <div class="d-flex main-side-menu">
            <!-- App Search-->
            <div class="dropdown d-inline-block d-lg-none ml-2">
                <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="mdi mdi-magnify"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
                     aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <ul class="navbar-right d-flex list-inline float-right mb-0">

                <!-- language-->
                <li class="dropdown notification-list d-none d-md-block">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" style="color: white" >
                        Welcome, <?php echo e(auth()->user()->username ?? auth()->user()->name); ?> (<?php echo e(auth()->user()->email); ?>) <span class="mdi mdi-chevron-down"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right language-switch">
                        <a class="dropdown-item" href="<?php echo e(url('/profile')); ?>"><i class="mdi mdi-account-circle m-r-5"></i> Update Profile</a>
                        <a class="dropdown-item text-danger"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>
                    </div>
                </li>

            </ul>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <!--<img class="rounded-circle header-profile-user" width="128px" height="128px" src="<?php echo e(auth()->user()->getProfilePicture() ?? asset('assets/images/users/user-4.jpg')); ?>"-->
                    <!--     alt="">-->
                    <?php echo e(auth()->user()->name != null ? auth()->user()->name[0] : ''); ?> <?php echo e(auth()->user()->last_name != null ? auth()->user()->last_name[0] : ''); ?>

                </button>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- item-->
                    <!-- <a class="dropdown-item" href="<?php echo e(url('/profile')); ?>"><i class="mdi mdi-account-circle m-r-5"></i> Update Profile</a> -->

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger"  onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="mdi mdi-power text-danger"></i> Logout</a>
                </div>
            </div>


        </div>
    </div>
</header>
<?php /**PATH /home/affilia1/7dc/resources/views/inc/navbar.blade.php ENDPATH**/ ?>