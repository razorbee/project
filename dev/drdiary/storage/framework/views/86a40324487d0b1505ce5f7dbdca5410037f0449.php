
<!-- Top Bar Start -->
<div class="topbar">

    <!-- LOGO -->
    <div class="topbar-left">
        <div class="text-center">
            <a href="<?php echo e(url('/')); ?>" class="logo"><b class="icon-c-logo">Dr</b><span>Doctor's Diary</span></a>
            <!-- Image Logo here -->
            <!--<a href="index.html" class="logo">-->
            <!--<i class="icon-c-logo"> <img src="assets/images/logo_sm.png" height="42"/> </i>-->
            <!--<span><img src="assets/images/logo_light.png" height="20"/></span>-->
            <!--</a>-->
        </div>

    </div>



    <!-- Button mobile view to collapse sidebar menu -->
    <nav class="navbar-custom">


        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect"  href="<?php echo e(url('/appointment-today')); ?>" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <i class="dripicons-bell noti-icon"></i>
                    <span class="badge badge-pink noti-icon-badge">
                        <?php
                            $visited = count(\App\Model\PatientAppointment::where('status',1)->where('date',\Carbon\Carbon::today())->get());
                            $total =count(\App\Model\PatientAppointment::where('date',\Carbon\Carbon::today())->get());
                        ?>
                       <?php echo e($visited); ?> / <?php echo e($total); ?>

                    </span>
                </a>

            </li>




            <li class="list-inline-item dropdown notification-list">
                <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="page-starter.html#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="<?php echo e(url(auth()->user()->image != '' | null ? auth()->user()->image : '/dashboard/images/image_placeholder.jpg')); ?>" alt="user" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">

                    <!-- item-->
                    <a href="<?php echo e(url('/profile')); ?>" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-account-circle"></i> <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="<?php echo e(url('/edit-profile')); ?>" class="dropdown-item notify-item">
                        <i class="zmdi zmdi-settings"></i> <span>Settings</span>
                    </a>


                    <!-- item-->
                    <a href="<?php echo e(route('logout')); ?>"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                       class="dropdown-item notify-item">
                        <i class="zmdi zmdi-power"></i> <span>Logout</span>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    </a>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-light waves-effect">
                    <i class="dripicons-menu"></i>
                </button>
            </li>

           <div class="top-bar-breadcrumb">
                <?php echo $__env->yieldContent('breadcrumb'); ?>
           </div>

        </ul>

    </nav>

</div>
<!-- Top Bar End -->