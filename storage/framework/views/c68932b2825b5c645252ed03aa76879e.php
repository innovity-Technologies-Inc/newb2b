<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <?php echo $__env->make('frontend.structures.dashboard_sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <div class="col-lg-9 col-md-8">
                        <div class="tab-content dashboard_content">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Dashboard</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php
                                        $name = session()->get('customer_name')
                                        ?>
                                        <p>Welcome <span style="color: #2e307c; font-weight: bold">Mr. <?php echo e($name); ?></span> to Deshishad.
                                        Now you can manage your profile, check you purchase history, track order from here.</p>
                                    </div>
                                </div>
                                <div class="row my-3">
                                    <div class="col-xl-4 col-md-4">
                                        <div class="card" style="border-radius: 12px">
                                            <div class="card-body">
                                                <div class="row align-items-center" style="justify-content: center">
                                                    <div class="col-xl-3">
                                                        <img src="<?php echo e(asset('frontend/assets/images/theme/icons/discount.png')); ?>" height="40" width="40">
                                                    </div>
                                                    <div class="col-xl-9">
                                                        <?php
                                                            $commission = session()->get('commission');
                                                            $commission_type = session()->get('commission_type')
                                                        ?>
                                                        <h5 style="color: #2e307c">
                                                            <?php if($commission_type == '1'): ?>
                                                                <?php echo e($commission); ?>%
                                                            <?php elseif($commission_type == '2'): ?>
                                                                Flat <?php echo e($commission); ?>

                                                            <?php endif; ?></h5>
                                                        <p>Your Commission</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    

                                    

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\user_dashboard.blade.php ENDPATH**/ ?>