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
                            
                            <div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3><?php echo e($subtitle); ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if(isset($invoice_details) && !empty($invoice_details)): ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Description</th>
                                                        <th>Unit Price</th>
                                                        <th>Quantity</th>
                                                        <th>Discount</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $invoice_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($item['product_name'] ?? 'Not Found'); ?></td>
                                                        <td><?php echo e($item['description']); ?></td>
                                                        <td>$<?php echo e($item['rate']); ?></td>
                                                        <td><?php echo e($item['quantity']); ?></td>
                                                        <td><?php echo e($item['discount']); ?></td>
                                                        <td>$<?php echo e($item['total_price']); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <?php else: ?>
                                            <h4> No History Found</h4>
                                        <?php endif; ?>
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

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\invoice_details.blade.php ENDPATH**/ ?>