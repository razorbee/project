<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>

    <!-- Import Css -->
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/css/icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/css/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('/dashboard/css/dashboard.css')); ?>">
</head>


<body class="account-pages">

<div class="close-layer" id="closeLayer"></div>

<?php echo $__env->make('assets.primary-header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

<?php echo $__env->yieldContent('content'); ?>


<script>
    var resizefunc = [];
</script>
<script src="<?php echo e(url('/dashboard/js/jquery.min.js')); ?>"></script>
<!-- Bootstrap plugins -->
<script src="<?php echo e(url('/dashboard/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('/dashboard/js/bootstrap.min.js')); ?>"></script>
<script>
    var mobile_menu_open = 0;

    $(document).ready(function () {
        $("#closeLayer").hide();
        $(".navbar-toggler").on('click', function () {
            if (mobile_menu_open == 0) {
                mobile_menu_open = 1;
                $("#navbarSupportedContent").addClass('show');
                $("#closeLayer").show();
                $(".navbar").css('margin-right','172px');
            } else {
                mobile_menu_open = 0;
                $("#navbarSupportedContent").removeClass('show');
                $("#closeLayer").hide();
                $(".navbar").css('margin-right','0px');
            }
        });

        $("#closeLayer").on('click', function () {
            mobile_menu_open = 0;
            $("#navbarSupportedContent").removeClass('show');
            $("#closeLayer").hide();
            $(".navbar").css('margin-right','0px');

        });
    });
</script>
<?php echo $__env->yieldContent('extra-js'); ?>
</body>
</html>