<?php $__env->startSection('content'); ?>



    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


    <div class="main_content">
        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="login_wrap row">
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <img src="<?php echo e(asset('frontend/assets/images/login.jpg')); ?>" alt="login">
                            </div>
                            <div class="padding_eight_all bg-white col-xl-6 col-md-6">
                                <div class="heading_s1">
                                    <h3>Login</h3>
                                </div>
                                <?php $__errorArgs = ['fcm_token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="badge bg-danger mb-3" style="font-size: 16px">

                                    <?php echo e($message); ?>


                                </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <form action="<?php echo e(route('login.store')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group mb-3">
                                        <input type="text" required class="form-control" name="username"
                                               placeholder="Your Username">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-control" required type="password" name="password"
                                               placeholder="Password" id="loginPasswordInput">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                        <label class="form-check-label" for="showPasswordCheck">Show Password</label>
                                    </div>

                                    <input type="hidden" name="fcm_token" id="fcm_token">

                                    <div class="login_footer form-group mb-3">
                                        

                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in
                                        </button>
                                    </div>
                                </form>
                                <div class="form-note text-center">Don't Have an Account? <a
                                        href="<?php echo e(route('registration')); ?>">Sign up now</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END LOGIN SECTION -->
    </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views/frontend/authentication/login.blade.php ENDPATH**/ ?>