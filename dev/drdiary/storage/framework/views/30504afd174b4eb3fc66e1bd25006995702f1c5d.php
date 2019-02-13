<?php $__env->startSection('title'); ?>
    <?php echo e(config('app.name')); ?> - Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="clearfix"></div>
    <div class="wrapper-page">
        <div class="card-box form-zoom-in-up <?php echo e($errors->has('email') || $errors->has('password') ? 'form-shake' : ''); ?>">
            <!--<div class="panel-heading">
                <h4 class="text-center"> Login to <strong>Doctor's diary</strong></h4>
            </div>-->

            <div class="p-20">
            <h4 class="text-center red"> Login to <strong>Doctor's diary</strong></h4>
            <br/>
                <form class="form-horizontal m-t-20" action="<?php echo e(route('login')); ?>" method="POST">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group-custom">
                        <input type="email" id="user-name" name="email" value="<?php echo e(old('email')); ?>" required="required"/>
                        <label class="control-label" for="user-name">Email Address</label><i class="bar"></i>
                        <?php if($errors->has('email')): ?>
                            <span class="help-block">
                                <strong class="text-danger"><?php echo e($errors->first('email')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group-custom">
                        <input type="password" id="user-password" name="password" value="<?php echo e(old('password')); ?>"
                               required="required"/>
                        <label class="control-label" for="user-password">Password</label><i class="bar"></i>
                        <?php if($errors->has('password')): ?>
                            <span class="help-block">
                                <strong class="text-danger"><?php echo e($errors->first('password')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>


                    <div class="form-group ">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox"
                                       name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>/>
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group text-center m-t-40">
                        <div class="col-12">
                            <button class="btn btn-success btn-block text-uppercase waves-effect waves-light"
                                    type="submit">Log In
                            </button>
                        </div>
                    </div>


                    <div class="form-group m-t-30 m-b-0">
                        <div class="col-12">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-dark"><i class="fa fa-lock m-r-5"></i>
                                Forgot
                                your password?</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        
            
                
                            
                

            
        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
    <script>
        $(document).ready(function (e) {
            $("#user-name").bind('change keyup',function (e) {
                console.log('Change');
                $(".help-block").hide();
            });

            $("#user-password").on('change keyup',function (e) {
                $(".help-block").hide();
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>