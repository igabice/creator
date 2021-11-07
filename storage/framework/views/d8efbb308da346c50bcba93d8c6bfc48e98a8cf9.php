<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top" id="navber">
    <div class="container">

        <img src="<?php echo e(asset('asset/images/logo/7dcplain.png')); ?>" style="max-height: 100px" />
        <div class="menu-main" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto menu-item">

                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/"><i>Home</i></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/courses"><i>Courses</i></a>
                </li>
                <li >
                    <a class="nav-link nl-m-top account-icon" href="/bundles"><i>Bundles</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/creators"><i>Creators</i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="#"><i>Blog</i></a>
                </li>
                <?php if(auth()->user() != null): ?>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/account"><i>Dashboard</i></a>
                </li>
                <?php if(auth()->user()->verified == 1): ?>
                <li class="nav-item">
                    <a class="nav-link nl-m-top account-icon" href="/my-courses"><i>My Courses</i></a>
                </li>
                    <?php endif; ?>
                    

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="/login"><i>Login</i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nl-m-top account-icon" href="/register"><i>SignUp</i></a>
                    </li>

                <?php endif; ?>











                <li class="nav-item">
                    <a class="nav-link menu-icon"><i class="fa fa-bars" aria-hidden="true"></i> </a>
                </li>


            </ul>
        </div>
    </div>





            <div class="custom-menubar">
                <ul class="nav-link-block">

                    <li >
                        <a class="menu-link" href="/"><i>Home</i></a>
                    </li>

                    <li >
                        <a class="menu-link" href="/courses"><i>Courses</i></a>
                    </li>
                    <li >
                        <a class="menu-link" href="/bundles"><i>Bundles</i></a>
                    </li>
                    <li >
                        <a class="menu-link" href="/creators"><i>Creators</i></a>
                    </li>
                    <li >
                        <a class="menu-link" href="#"><i>Blog</i></a>
                    </li>

                    <?php if(auth()->user() != null): ?>
                        <li >
                            <a class="menu-link" href="/account"><i>Dashboard</i></a>
                        </li>

                        <?php if(auth()->user()->verified == 1): ?>
                            <li class="nav-item">
                                <a class="menu-link" href="/my-courses"><i>My Courses</i></a>
                            </li>
                        <?php endif; ?>
                       

                    <?php else: ?>
                        <li >
                            <a class="menu-link" href="/login"><i>Login</i></a>
                        </li>
                        <li >
                            <a class="menu-link" href="/register"><i>SignUp</i></a>
                        </li>

                    <?php endif; ?>

                    <?php if(auth()->user() != null): ?>
                    <?php if(auth()->user()->role == 'A'): ?>
                    <li>
                        <a href="/users?type=Affliliates" class="menu-link">Affiliates</a>
                    </li>
                    <li>
                        <a href="/users?type=Creators" class="menu-link">Creators</a>
                    </li>
                    <li>
                        <a href="/users?type=all" class="menu-link">All Users</a>
                    </li>
                    <li>
                        <a href="/courses" class="menu-link">Manage Courses</a>
                    </li>
                    <li>
                        <a class="menu-link" href="/all-payouts" >Manage Payouts</a>
                        
                    </li>
                    <li>
                        <a class="menu-link" href="/payments" >Payment Logs</a>
                        
                    </li>

                        <?php endif; ?>
                    <?php endif; ?>
                    <?php if(auth()->user() != null): ?>
                        <li >
                            <form action="/logout" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="submit" style="color: goldenrod; margin-left: 10px; background-color: black" class="nav-link nl-m-top btn-outline-warning btn-sm" href="/logout" value="Logout">
                            </form>
                        </li>
                    <?php endif; ?>
                </ul>


                <ul class="responsive-nav">
                    <?php if(auth()->user() != null): ?>
                        <li >
                            <form action="/logout" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="submit" style="color: goldenrod; margin-left: 10px; background-color: black" class="nav-link nl-m-top btn-outline-warning btn-sm" href="/logout" value="Logout">
                            </form>
                        </li>
                        <?php endif; ?>
                </ul>




















                <div class="menu-close">
                    <a class="hide-menu-btn"><i class="fa fa-times" aria-hidden="true"></i></a>
                </div>
            </div>


</nav>

<?php /**PATH /Users/mac/webProjects/creator/resources/views/inc/header.blade.php ENDPATH**/ ?>