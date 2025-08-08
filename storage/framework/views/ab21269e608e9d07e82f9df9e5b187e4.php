<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <?php echo $__env->make('frontend.structures.dashboard_sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="col-lg-9 col-md-8">
                        <div>

                            
                            <div>
                                <form method="post" action="<?php echo e(route('user.profile.update')); ?>"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h3>Account Details</h3>
                                    </div>
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Full Name</label>
                                                    <input type="text" class="form-control" name="customer_name" value="<?php echo e($profile->customer_name); ?>"
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
                                                    <label class="form-label">Email Address</label>
                                                    <input type="text" class="form-control" name="email_address" value="<?php echo e($profile->customer_email); ?>"
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
                                                    <label class="form-label">Mobile</label>
                                                    <input type="text" class="form-control" name="contact" value="<?php echo e($profile->contact); ?>"
                                                           placeholder="Enter Your Mobile Number">
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
                                                    <label class="form-label">Phone</label>
                                                    <input type="text" class="form-control" name="phone" value="<?php echo e($profile->phone); ?>"
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
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Fax</label>
                                                    <input type="text" class="form-control" name="fax" value="<?php echo e($profile->fax); ?>"
                                                           placeholder="Enter Your Fax Number">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo e($profile->customer_address); ?>"
                                                           placeholder="Enter Your Address">
                                                </div>
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Address 2</label>
                                                    <input type="text" class="form-control" name="address2" value="<?php echo e($profile->address2); ?>"
                                                           placeholder="Enter Your Address">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="<?php echo e($profile->city); ?>"
                                                           placeholder="Enter Your City">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">State</label>
                                                    <input type="text" class="form-control" name="state" value="<?php echo e($profile->state); ?>"
                                                           placeholder="Enter Your State">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Zip</label>
                                                    <input type="text" class="form-control" name="zip" value="<?php echo e($profile->zip); ?>"
                                                           placeholder="Enter Your Zip Number">
                                                </div>
                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" name="country" value="<?php echo e($profile->country); ?>"
                                                           placeholder="Enter Your Country">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Sales Permit Document</label>
                                                    <input type="file" class="form-control" name="sales_permit" value="<?php echo e($profile->sales_permit); ?>">
                                                </div>

                                                <div class="form-group mb-3 col-xl-4 col-md-4">
                                                    <a href="<?php echo e($profile->sales_permit); ?>" class="btn btn-success" target="_blank">View File</a>
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Sales Permit Number</label>
                                                    <input type="text" class="form-control" name="sales_permit_number" value="<?php echo e($profile->sales_permit_number); ?>"
                                                           placeholder="Enter Your Sales Permit Number">
                                                </div>




                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">
                                                        Save
                                                    </button>
                                                </div>
                                            </div>

                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\manage_profile.blade.php ENDPATH**/ ?>