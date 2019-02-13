<?php $__env->startSection('title'); ?>
    Medical History
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Medical History of - <?php echo e($patient->name); ?></h4>
                <div class="row">
                    <div class="col-md-4">
                        <img width="250px"
                             src="<?php echo e($patient->iamge != null ? $patient->iamge : "/dashboard/images/image_placeholder.jpg"); ?>"
                             alt="">

                    </div>
                    <div class="col-md-8">
                        <dl class="dl-horizontal">
                            <dt>Name</dt>
                            <dd><?php echo e($patient->name); ?></dd>
                            <dt>Gender</dt>
                            <dd>
                                <?php if($patient->gender ==1): ?>
                                    Male
                                <?php elseif($patient->gender ==2): ?>
                                    Fe-Male
                                <?php else: ?>
                                    Other
                                <?php endif; ?>
                            <dt>Age</dt>
                            <dd><?php echo e($patient->age()); ?></dd>
                        </dl>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <h4>Prescriptions <a style="font-size: 15px;"
                                             href="<?php echo e(url('/take-patient-to-prescription-page/'.$patient->id)); ?>"
                                             class="pull-right"> <i class="ti ti-ink-pen"></i> Write new
                                prescription</a></h4>
                        <ul class="list-group">
                            <?php $__currentLoopData = $patient->prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pres): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item"><a href="<?php echo e(url('/print-prescription/'.$pres->id)); ?>"
                                                               class="btn btn-default pull-right"><i
                                                class="fa fa-eye"></i> View</a> <?php echo e($pres->created_at->format('d-M-Y')); ?>

                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h4>Medical document (Image) <a style="font-size: 15px;"
                                                        href="<?php echo e(url('/patient-medical-file/'.$patient->id)); ?>"
                                                        class="pull-right"> <i class="fa fa-plus"></i> Add Medical file</a>
                        </h4>
                        <?php $__currentLoopData = $patient->medicalFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(url($file->path)); ?>" target="_blank" class="swipebox" title="My Caption">
                                <img src="<?php echo e(url($file->path)); ?>" class="img-thumbnail" width="220px" alt="image">
                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>