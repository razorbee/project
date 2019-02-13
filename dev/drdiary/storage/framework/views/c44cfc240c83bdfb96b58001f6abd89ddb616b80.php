<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light container">
        <a class="navbar-brand mobile" href="#">Dr.Assistant</a>
        <button class="navbar-toggler" type="button">
            <span class="fa fa-bars"></span>
        </button>
        <?php if(config('app.has_installed') == 1): ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('/') ? 'active' :''); ?>" href="<?php echo e(url('/')); ?>"> <i class="fa fa-home fa-lg"></i> &nbsp; <?php echo trans('nav.home'); ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('appointment') ? 'active' : ''); ?>" href="<?php echo e(url('/appointment')); ?>"> <i class="fa fa-calendar"></i> &nbsp; <?php echo trans('nav.appointment'); ?></a>
                </li>
            </ul>
            <?php if(auth()->guard()->guest()): ?>
            <ul class="navbar-nav">
                <?php if(count(\App\User::all()) == 0): ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('register') ? 'active' :''); ?>" href="<?php echo e(route('register')); ?>"><i class="fa fa-user-plus fa-lg"></i> &nbsp; <?php echo trans('nav.register'); ?></a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(Request::is('login') ? 'active' :''); ?>" href="<?php echo e(route('login')); ?>"><i class="fa fa-sign-in fa-lg"> </i> &nbsp; <?php echo trans('nav.login'); ?></a>
                </li>
            </ul>
            <?php else: ?>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/home')); ?>"><i class="fa fa-dashboard"></i> &nbsp; <?php echo trans('nav.dashboard'); ?></a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </nav>
</div>
