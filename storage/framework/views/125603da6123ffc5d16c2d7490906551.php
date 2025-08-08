<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">


        <!-- START LOGIN SECTION -->
        <div class="login_register_wrap section">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="login_wrap row">
                            <div class="padding_eight_all bg-white col-xl-12 col-md-12">
                                <div class="heading_s1">
                                    <h3>Create an Account</h3>
                                </div>
                                <?php if(session('error_message')): ?>
                                    <p class="text-danger">
                                        ❌ <?php echo e(session('error_message')); ?>

                                    </p>
                                <?php endif; ?>


                                <form method="post" action="<?php echo e(route('registration.store')); ?>"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Full Name<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="customer_name" value="<?php echo e(old('customer_name')); ?>"
                                                   placeholder="Enter Your Full Name">
                                            <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Email Address<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="email" value="<?php echo e(old('email')); ?>"
                                                   placeholder="Enter Your Email">
                                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Mobile<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input type="text" class="form-control" name="mobile" value="<?php echo e(old('mobile')); ?>"
                                                   placeholder="Enter Your Phone Number">
                                            <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Fax</label>
                                            <input type="text" class="form-control" name="fax" value="<?php echo e(old('fax')); ?>"
                                                   placeholder="Enter Your Fax Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>"
                                                   placeholder="Enter Your Address">
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <label class="form-label">Address 2</label>
                                            <input type="text" class="form-control" name="address2" value="<?php echo e(old('address2')); ?>"
                                                   placeholder="Enter Your Address">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" value="<?php echo e(old('city')); ?>"
                                                   placeholder="Enter Your City">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">State</label>
                                            <input type="text" class="form-control" name="state" value="<?php echo e(old('state')); ?>"
                                                   placeholder="Enter Your State">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Zip</label>
                                            <input type="text" class="form-control" name="zip" value="<?php echo e(old('zip')); ?>"
                                                   placeholder="Enter Your Zip Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" name="country" value="<?php echo e(old('country')); ?>"
                                                   placeholder="Enter Your Country">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Sales Permit Number</label>
                                            <input type="text" class="form-control" name="sales_permit_number" value="<?php echo e(old('sales_permit_number')); ?>"
                                                   placeholder="Enter Your Sales Permit Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Sales Permit Document</label>
                                            <input type="file" class="form-control" name="sales_permit" value="<?php echo e(old('sales_permit')); ?>"
                                                   placeholder="Enter Your Sales Permit Number">
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Password<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input class="form-control" type="password" name="password"
                                                   placeholder="Password" id="passwordInput">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group mb-3 col-xl-6 col-md-6">
                                            <label class="form-label">Confirm Password<span
                                                    class="text-danger"><sup>*</sup></span></label>
                                            <input class="form-control" type="password" name="password_confirmation"
                                                   placeholder="Confirm Password" id="confirmPasswordInput">
                                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <small class="text-danger"><?php echo e($message); ?></small>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                            <label class="form-check-label" for="showPasswordCheck">Show
                                                Password</label>
                                        </div>


                                        <div class="login_footer form-group mb-3 col-xl-12 col-md-12">
                                            <div class="chek-form">
                                                <div class="custome-checkbox">
                                                    <input class="form-check-input" type="checkbox" name="checkbox"
                                                           id="exampleCheckbox2" value="">
                                                    <label class="form-check-label" for="exampleCheckbox2"><span>I agree to terms &amp; Policy.</span></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3 col-xl-12 col-md-12">
                                            <button type="submit" class="btn btn-fill-out btn-block" name="register">
                                                Register
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="form-note text-center">Already have an account? <a
                                        href="<?php echo e(route('login')); ?>">Log in</a></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\authentication\registration.blade.php ENDPATH**/ ?>