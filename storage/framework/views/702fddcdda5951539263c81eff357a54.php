<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <div class="main_content">
        <div class="section">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card p-3">
                            <div class="heading_s1">
                                <h4>Billing Details</h4>
                            </div>
                            <p class="text-danger">To change your billing details please update your profile from
                                User Dashboard. <a class="link" style="color: #1bad4b" href="<?php echo e(route('user.profile')); ?>">Click here to Edit Details</a></p>
                            <?php
                                $customer_name = session()->get('customer_name');
                                $email_address = session()->get('email');
                                $address = session()->get('address');
                                $address2 = session()->get('address2');
                            ?>
                            <div class="form-group mb-3">
                                <label class="form-label">Customer Name</label>
                                <input type="text" class="form-control" disabled value="<?php echo e($customer_name); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="text" class="form-control" disabled value="<?php echo e($email_address); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address</label>
                                <input class="form-control" type="text" disabled value="<?php echo e($address); ?>">
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label">Address2</label>
                                <input type="text" disabled class="form-control" value="<?php echo e($address2); ?>">
                            </div>
                        </div>
                        </div>

                    <div class="col-md-6">
                        <div class="order_review">
                            <div class="heading_s1">
                                <h4>Your Orders</h4>
                            </div>
                            <div class="table-responsive order_table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($item['product_name']); ?> <span class="product-qty">x <?php echo e($item['quantity']); ?></span></td>
                                            <td><?php echo e($item['price'] * $item['quantity']); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SubTotal</th>
                                        <td class="product-subtotal"><?php echo e($sub_total); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>-<?php echo e($discount); ?></td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td class="product-subtotal"><?php echo e($grand_total); ?></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="medium_divider"></div>
                        <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                        <div class="medium_divider"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card p-4">
                            <div class="heading_s1">
                                <h4>Payment</h4>
                            </div>
                            <form action="<?php echo e(route('place_order')); ?>" method="post" enctype="multipart/form-data">
                               <?php echo csrf_field(); ?>

                                <input type="hidden" value="<?php echo e($cart_ids); ?>" name="cart_id">
                                <input type="hidden" value="<?php echo e($grand_total); ?>" name="grand_total">

                                <div class="row">
                                    <div class="form-group mb-3 col-xl-12">
                                        <label class="form-label">Payment Method</label>
                                        <select class="form-control" name="payment_type">
                                            <option value="">Choose Payment Method</option>
                                            <?php $__currentLoopData = $filteredMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($method['HeadCode']); ?>"><?php echo e($method['HeadName']); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Type</label>
                                        <select class="form-control" id="payment_type_select">
                                            <option value="full">Full Payment</option>
                                            <option value="partial">Partial Payment</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Paid Amount</label>
                                        <input type="text" readonly class="form-control" name="paid_amount" value="<?php echo e($grand_total); ?>" id="paid_amount_input">
                                    </div>



                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Reference</label>
                                        <input type="text" class="form-control" name="payment_ref" placeholder="Enter Payment Reference">
                                    </div>

                                    <div class="form-group mb-3 col-xl-6">
                                        <label class="form-label">Payment Reference Doc</label>
                                        <input type="file" class="form-control" name="payment_ref_doc">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-fill-out btn-block col-lg-4">Place Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const grandTotal = parseFloat(<?php echo json_encode(str_replace(',', '', $grand_total)); ?>);
            const paymentTypeSelect = document.getElementById('payment_type_select');
            const paidAmountInput = document.getElementById('paid_amount_input');
            const form = document.querySelector('form');

            // Set full payment by default
            paidAmountInput.value = grandTotal.toFixed(2);
            paidAmountInput.readOnly = true;

            paymentTypeSelect.addEventListener('change', function () {
                const type = this.value;
                if (type === 'full') {
                    paidAmountInput.value = grandTotal.toFixed(2);
                    paidAmountInput.readOnly = true;
                } else if (type === 'partial') {
                    paidAmountInput.value = '';
                    paidAmountInput.readOnly = false;
                    paidAmountInput.focus();
                }
            });

            paidAmountInput.addEventListener('input', function () {
                let value = parseFloat(this.value);
                if (!isNaN(value) && value > grandTotal) {
                    alert("Paid amount can't be greater than the grand total!");
                    this.value = grandTotal.toFixed(2);
                }
            });

            form.addEventListener('submit', function (e) {
                const type = paymentTypeSelect.value;
                const value = parseFloat(paidAmountInput.value);

                if (type === 'partial') {
                    if (isNaN(value) || value <= 0) {
                        alert("Please enter a valid paid amount.");
                        e.preventDefault();
                    } else if (value > grandTotal) {
                        alert("Paid amount cannot exceed the grand total.");
                        e.preventDefault();
                    }
                }
            });
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\checkout_form.blade.php ENDPATH**/ ?>