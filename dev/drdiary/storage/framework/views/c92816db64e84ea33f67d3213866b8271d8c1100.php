<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('assets.css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('extra-css'); ?>
</head>
<body class="fixed-left">
<div id="wrapper">
    <?php if(auth()->guard()->guest()): ?>

    <?php else: ?>
        <?php echo $__env->make('assets.secondary-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('doctor')): ?>
            <?php echo $__env->make('assets.sidebar.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        <?php if (\Illuminate\Support\Facades\Blade::check('assistant')): ?>
            <?php echo $__env->make('assets.sidebar.assistant', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>

        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php echo $__env->make('assets.js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('extra-js'); ?>
</body>
</html>