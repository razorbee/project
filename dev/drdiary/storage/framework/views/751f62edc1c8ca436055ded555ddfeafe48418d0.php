<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="">
                    <a href="<?php echo e(url('/home')); ?>" class="waves-effect"><i class="ti-home"></i> <span> <?php echo trans('menus.dash'); ?> </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wheelchair"></i> <span> <?php echo trans('menus.patient.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-patient')); ?>"><?php echo trans('menus.patient.new_patient_menu'); ?></a></li>
                        <li><a href="<?php echo e(url('/all-patient')); ?>"><?php echo trans('menus.patient.all_patient_menu'); ?></a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-notepad"></i> <span> <?php echo trans('menus.prescription.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-prescription')); ?>"><?php echo trans('menus.prescription.new_prescription_menu'); ?></a></li>
                        <li><a href="<?php echo e(url('/all-prescription')); ?>"><?php echo trans('menus.prescription.all_prescription_menu'); ?></a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar"></i> <span> <?php echo trans('menus.appointment.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-appointment')); ?>">New Appointment</a></li>
                        <li><a href="<?php echo e(url('/all-appointment')); ?>">All Appointment</a></li>
                        <li><a href="<?php echo e(url('/appointment-today')); ?>">Appointment Today</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-user"></i> <span> <?php echo trans('menus.assistant.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-assistant')); ?>">New Assistant</a></li>
                        <li><a href="<?php echo e(url('/all-assistant')); ?>">All Assistant</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo e(Request::is('edit-template/*')  ? 'active' : ''); ?> <?php echo e(Request::is('view-template/*')  ? 'active' : ''); ?>"><i class="ti-layout"></i> <span> <?php echo trans('menus.template.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-template')); ?>">New Template</a></li>
                        <li><a href="<?php echo e(url('/all-template')); ?>">All Template</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo e(Request::is('edit-drug/*') ? 'active' :''); ?>"><i class="icon icon-pill-small"></i> <span> <?php echo trans('menus.drug.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-drug')); ?>">Add new drug</a></li>
                        <li><a href="<?php echo e(url('/all-drug')); ?>">All Drug</a></li>
                    </ul>
                </li>

                <?php $date_today = \Carbon\Carbon::today()->addDay(1)->toDateString();?>

                <li class="has_sub">
                    <a href="javascript:void(0);"
                       class="waves-effect <?php echo e(Request::is('/schedule-report/schedule=*/start=*/end=*') ? 'active' : ''); ?>">
                        <i class="ti-pie-chart"></i> <span> <?php echo trans('menus.report.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/drug-report/drug=0/start=2017-06-05/end='.$date_today)); ?>">Drug Report</a></li>
                        <li><a href="<?php echo e(url('/template-report/template=0/start=2017-06-05/end='.$date_today)); ?>">Template Report</a></li>
                        <li><a href="<?php echo e(url('/schedule-report/schedule=0/start=2017-06-05/end='.$date_today)); ?>">Schedule Report</a></li>
                    </ul>
                </li>



                <li class="text-muted menu-title">Settings</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> <?php echo trans('menus.setting.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/all-schedule')); ?>">Schedule Setting</a></li>
                        <li><a href="<?php echo e(url('/prescription-setting')); ?>">Prescription Setting</a></li>
                        <li><a href="<?php echo e(url('/app-setting')); ?>">App Setting</a></li>
                        <li><a href="<?php echo e(url('/profile')); ?>">Profile</a></li>
                    </ul>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->