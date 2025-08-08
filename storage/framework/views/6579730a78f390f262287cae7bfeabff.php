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
                                <form method="post" action="<?php echo e(route('user.password_update')); ?>"
                                      enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                <div class="card mb-2">
                                    <div class="card-header">
                                        <h3>Change Password</h3>
                                    </div>
                                    <div class="card-body">

                                            <div class="row">
                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">Old Password</label>
                                                    <input type="password" class="form-control" name="old_password"
                                                           placeholder="Enter Your Old Password" id="oldPasswordInput">
                                                </div>

                                                <div class="form-group mb-3 col-xl-12 col-md-12">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" name="new_password"
                                                           placeholder="Enter Your New Password" id="newPasswordInput">
                                                </div>

                                                <div class="form-group mb-3">
                                                    <input class="form-check-input" type="checkbox" id="showPasswordCheck">
                                                    <label class="form-check-label" for="showPasswordCheck">Show Password</label>
                                                </div>

                                                <div class="form-group mb-3 col-xl-6 col-md-6">
                                                    <button type="submit" class="btn btn-fill-out btn-block">
                                                        Change Password
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

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\change_password.blade.php ENDPATH**/ ?>