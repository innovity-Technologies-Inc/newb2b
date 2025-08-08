<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="main_content">
        <?php ($selected_warehouse = \Illuminate\Support\Facades\Cache::get('warehouse')); ?>

        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <div class="product-image">
                            <div class="product_img_box">
                                <img id="product_img" src='<?php echo e($product->image); ?>' data-zoom-image="<?php echo e($product->image); ?>" alt="<?php echo e($product->product_name); ?>">
                                <a href="#" class="product_img_zoom" title="Zoom">
                                    <span class="linearicons-zoom-in"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="pr_detail">
                            <div class="product_description">
                                <h4 class="product_title text-capitalize"><a href="#"><?php echo e($product->product_name); ?></a></h4>
                            </div>
                            <?php if(isset($product->price)): ?>
                            <h4 style="color: #2E307C; font-weight: bold">$<?php echo e($product->price); ?></h4>
                            <?php endif; ?>
                            <ul class="product-meta">
                                <form id="category-<?php echo e($product->category_id); ?>" action="<?php echo e(route('productsByCategory')); ?>" method="get">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($product->category_id); ?>" name="id">
                                    <li>Category: <a href="#"
                                                     onclick="event.preventDefault(); document.getElementById('category-<?php echo e($product->category_id); ?>').submit();">
                                            <?php echo e($product->category_name); ?></a></li>
                                </form>

                                <li>Unit: <a href="#"><?php echo e($product->unit); ?></a> </li>

                                <?php if(isset($product->stock_qty)): ?>
                                    <li>Total Stock: <a href="#"><?php echo e($product->stock_qty); ?></a> </li>
                                <?php endif; ?>
                                <?php ($tokenExpire = session()->get('second_layer_token_expire_at')); ?>
                                <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                                    <?php if(isset($product->warehouse_stock_qty)): ?>
                                        <li>Warehouse Stock: </li>
                                        <li>
                                            <table class="table table-bordered">
                                        <tr>
                                            <th>Warehouse Name</th>
                                            <th>Stock Quantity</th>
                                        </tr>
                                        <?php $__currentLoopData = $product->warehouse_stock_qty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($warehouse['warehouse_name']); ?></td>
                                                <td><?php echo e($warehouse['qty']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </table>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>

                            </ul>
                            <hr>
                            <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                            <form method="post" action="<?php echo e(route('add_to_cart')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" value="<?php echo e($product->product_id); ?>" name="product_id">


                                <div class="cart_extra">
                                <div class="cart-product-quantity">
                                    <div class="quantity">
                                        <input type="button" value="-" class="minus">
                                        <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label class="form-label" style="text-align: left">Warehouse: </label>
                                    <select class="form-control" name="warehouse_data">
                                        <option value="">Select Warehouse</option>
                                        <?php $__currentLoopData = $product->warehouse_stock_qty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($warehouse['warehouse_id']); ?>!<?php echo e($warehouse['batch_id']); ?>" <?php if($warehouse['warehouse_id'] == $selected_warehouse): ?> selected <?php endif; ?>><?php echo e($warehouse['warehouse_name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3 ">
                                    <button
                                        class="btn btn-fill-out btn-block text-uppercase rounded-0"
                                       type="submit">
                                        Add to Cart
                                    </button>
                                </div>
                            </form>
                                <?php else: ?>
                            <p class="text-danger my-1">Log in now to unlock product stocks, prices, and the ability to purchase or add items to your cart.
                                <a class="" href="<?php echo e(route('login')); ?>" style="color: #1bad4b"> Click here to Login</a>
                            </p>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab">
                                <div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                                    <p><?php echo e($product->product_details); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="large_divider clearfix"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="heading_s1">
                            <h3>Releted Products</h3>
                        </div>
                        <div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                            <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['product_name']); ?>" height="220" width="260">
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <form id="product-<?php echo e($item['product_id']); ?>" action="<?php echo e(route('product_details')); ?>" method="get">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($item['product_id']); ?>" name="product_id">
                                        <h6 class="product_title text-capitalize"><a href="#" onclick="event.preventDefault(); document.getElementById('product-<?php echo e($item['product_id']); ?>').submit();">
                                                <?php echo e($item['product_name']); ?></a></h6>
                                        </form>
                                        <?php if(isset($product->price)): ?>
                                        <div class="product_price">
                                            <span class="price">$<?php echo e($product->price); ?></span>
                                        </div>
                                        <?php endif; ?>

                                        <form id="category-<?php echo e($item['category_id']); ?>" action="<?php echo e(route('productsByCategory')); ?>" method="get">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($item['category_id']); ?>" name="id">
                                            <h6>
                                                <b>Category:</b>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('category-<?php echo e($item['category_id']); ?>').submit();"><?php echo e($item['category_name']); ?></a>
                                            </h6>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\product_details.blade.php ENDPATH**/ ?>