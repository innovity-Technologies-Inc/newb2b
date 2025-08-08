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
                                        <h3>Purchase History</h3>
                                    </div>
                                    <div class="card-body">
                                        <?php if(isset($invoice_lists) && !empty($invoice_lists)): ?>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Invoice Id</th>
                                                        <th>Delivery Note</th>
                                                        <th>Date</th>
                                                        <th>Total Amount</th>
                                                        <th>Discount</th>
                                                        <th>Paid Amount</th>
                                                        <th>Due Amount</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__currentLoopData = $invoice_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($item['invoice_id']); ?></td>
                                                        <td><?php echo e($item['delivery_note']); ?></td>
                                                        <td><?php echo e($item['final_date']); ?></td>
                                                        <td>$<?php echo e($item['total_amount']); ?></td>
                                                        <td>$<?php echo e($item['discount']); ?></td>
                                                        <td>$<?php echo e($item['paid_amount']); ?></td>
                                                        <td>$<?php echo e($item['due_amount']); ?></td>
                                                        <td>
                                                                <a href="<?php echo e(route('invoice_details', $item['invoice_id'])); ?>" class="btn btn-fill-out btn-sm">View</a>
                                                        </td>
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

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\purchase_history.blade.php ENDPATH**/ ?>