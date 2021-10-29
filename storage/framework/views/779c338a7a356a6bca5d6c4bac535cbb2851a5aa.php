<?php if(config('backpack.base.show_powered_by')): ?>
    <div class="pull-right hidden-xs">
      <?php echo e(trans('backpack::base.powered_by')); ?> <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for Laravel</a>
    </div>
<?php endif; ?>
<?php if(config('backpack.base.developer_link') && config('backpack.base.developer_name')): ?>
    <?php echo e(trans('backpack::base.handcrafted_by')); ?> <a target="_blank" href="<?php echo e(config('backpack.base.developer_link')); ?>"><?php echo e(config('backpack.base.developer_name')); ?></a>.
<?php endif; ?>
<?php /**PATH /home/affilia1/affiliatedng/resources/views/vendor/backpack/base/inc/footer.blade.php ENDPATH**/ ?>