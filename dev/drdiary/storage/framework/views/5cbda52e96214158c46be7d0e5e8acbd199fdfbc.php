<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?> Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <style>
        .text-center > h1,h2,h3,h4,p{
            color: #fff;
        }

    </style>
    <?php $doctor = \App\User::first(); ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="text-center">
                    <img  src="<?php echo e(\App\User::first() ? \App\User::first()->image : 'http://cdn.24.co.za/files/Cms/General/d/2809/34cbd0492a23476887812102f40f21d7.jpg'); ?>"  class="__img-fluid" alt="">
                </div>
            </div>
            <div class="col-md-8 " style="padding-top: 56px;">
                <div class="_text-center home_desc">
                    <h1><?php echo e($doctor ? $doctor->name : "Demo"); ?></h1>
                    <p class="home_degree">
                        <?php echo nl2br(e($doctor ? $doctor->info : "Demo")); ?>

                    </p>
                </div>
            </div>
           <!--<div class="col-md-12" style="padding-top: 85px;">
               <div class="card-box">
                   <div class="panel-heading">
                       <h4 class="text-center"><strong>About Me</strong></h4>
                   </div>
                   <div class="card-content" style="padding-top: 25px;">
                       <center>
                           <?php echo nl2br(e(\App\Model\About::first() ? \App\Model\About::first()->about : "Demo About")); ?>

                       </center>
                   </div>

               </div>
           </div>!-->


        </div>
        <div style="padding: 100px"></div>
    </div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>