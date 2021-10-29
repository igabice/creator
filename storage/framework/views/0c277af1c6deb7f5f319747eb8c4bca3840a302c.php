<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu side">

    <div data-simplebar class="h-100">

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
                    <a  href="/cart" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i>
                        <span>MY CART </span>
                    </a>
                </li>
                <li>
                    <a  href="/marketers" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>MARKETERS </span>
                    </a>
                </li>
                <?php if(Auth::user()->verified == 1): ?>
                <li>
                    <a  href="/marketing-resources" class="waves-effect">
                        <i class="fa fa-star"></i>
                        <span>MARKETING RESOURCES </span>
                    </a>
                </li>
                <?php endif; ?>
                <li>
                    <a  href="/creators" class="waves-effect">
                        <i class="fa fa-users"></i>
                        <span>CREATORS</span>
                    </a>
                </li>
                <li>
                    <a  href="/products" class="waves-effect">
                        <i class="fa fa-shopping-cart"></i>
                        <span>PRODUCTS </span>
                    </a>
                </li>
                <li>
                    <a  href="/my-payments-details" class="waves-effect">
                        <i class="fa fa-wallet"></i>
                        <span> MY PAYMENTS DETAILS</span>
                    </a>
                </li>
                <li>
                    <a  href="/my-payouts" class="waves-effect">
                        <i class="fa fa-wallet"></i>
                        <span>  REQUEST PAYOUTS</span>
                    </a>
                </li>
                <li>
                    <a  href="/all-payouts" class="waves-effect">
                        <i class="fa fa-wallet"></i>
                        <span>  ALL PAYOUTS</span>
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

<?php /**PATH /Users/mac/webProjects/affiliateng/resources/views/inc/sidebar.blade.php ENDPATH**/ ?>