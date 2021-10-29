<?php $__env->startComponent('mail::message'); ?>
    
    Dear <?php echo e($data->surname); ?> <?php echo e($data->name); ?>, your account has been created successfully!

    Welcome to 7DC.

    <p>Visit <a href="https://www.affiliatedng.com/login"> https://wwww.affiliatedng.com </a>  to login to your account.</p>

    
    <?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($line); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if(isset($actionText)): ?>
        <?php
        switch ($level) {
            case 'success':
            case 'error':
                $color = $level;
                break;
            default:
                $color = 'primary';
        }
        ?>
        <?php $__env->startComponent('mail::button', ['url' => $actionUrl, 'color' => $color]); ?>
            <?php echo e($actionText); ?>

        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>

    
    <?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($line); ?>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    
    <?php if(! empty($salutation)): ?>
        <?php echo e($salutation); ?>

    <?php else: ?>
        
        To Your 7D Success,
        Dr Ayo OluAyoola

    <?php endif; ?>

    
    <?php if(isset($actionText)): ?>
        <?php $__env->slot('subcopy'); ?>Fan
        <?php echo app('translator')->getFromJson(
            "If you’re having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
            'into your web browser: [:actionURL](:actionURL)',
            [
                'actionText' => $actionText,
                'actionURL' => $actionUrl,
            ]
        ); ?>
        <?php $__env->endSlot(); ?>
    <?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home/affilia1/affiliatedng/resources/views/mail/newuser.blade.php ENDPATH**/ ?>