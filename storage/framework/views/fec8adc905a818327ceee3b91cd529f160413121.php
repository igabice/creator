<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu side">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a  href="/home" class="waves-effect">
                        <i class="fa fa-peace"></i>
                        <span> DASHBOARD </span>
                    </a>
                </li>
                <li>
                    <a  href="/laws" class="waves-effect">
                        <i class="fa fa-journal-whills"></i>
                        <span>LAWS </span>
                    </a>
                </li>
                <li>
                    <a  href="/articles" class="waves-effect">
                        <i class="fa fa-blog"></i>
                        <span>BLOG POSTS </span>
                    </a>
                </li>
                <li>
                    <a  href="/users" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>USERS </span>
                    </a>
                </li>
                <li>
                    <a  href="/states" class="waves-effect">
                        <i class="fa fa-map-marker"></i>
                        <span>STATES </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo e(route('logout')); ?>" class="waves-effect"onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="mdi mdi-power"></i>
                        <span><?php echo e(strtoupper(__('Logout'))); ?></span>
                    </a>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                        <?php echo csrf_field(); ?>
                    </form>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

<?php /**PATH /Users/mac/webProjects/legool-app/resources/views/inc/sidebar.blade.php ENDPATH**/ ?>