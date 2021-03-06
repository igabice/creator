<!-- jQuery 3.3.1 -->
<script src="<?php echo e(asset('vendor/adminlte')); ?>/bower_components/jquery/dist/jquery.min.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo e(asset('vendor/adminlte')); ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('vendor/adminlte')); ?>/plugins/pace/pace.min.js"></script>
<script src="<?php echo e(asset('vendor/adminlte')); ?>/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<script src="<?php echo e(asset('vendor/adminlte')); ?>/dist/js/adminlte.js"></script>

<!-- page script -->
<script type="text/javascript">
    // To make Pace works on Ajax calls
    $(document).ajaxStart(function() { Pace.restart(); });

    // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    
    var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
    location.hash && activeTab && activeTab.tab('show');
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        location.hash = e.target.hash.replace("#tab_", "#");
    });
</script><?php /**PATH /home/affilia1/7dc/resources/views/vendor/backpack/base/inc/scripts.blade.php ENDPATH**/ ?>