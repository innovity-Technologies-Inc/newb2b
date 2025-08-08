<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('frontend.structures.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <div class="main_content">
        <!-- START SECTION SHOP -->
        <div class="section">
            <div class="container">

                <div class="row">
                    <div class="col-lg-9">
                        <div class="row align-items-center mb-4 pb-1">
                            <div class="col-12">
                                <form action="<?php echo e(route('productsByCategory')); ?>" method="get">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($product_data['category_id']); ?>" name="id">
                                    <div class="product_header px-3">
                                        <div class="product_header_left">

                                            <div class="custom_select">
                                                <select class="form-control form-control-sm" name="sort">
                                                    <option value="">Choose One</option>
                                                    <option value="oldest">Sort by Oldest</option>
                                                    <option value="latest">Sort by Latest</option>
                                                    <?php if($is_price == true): ?>
                                                        <option value="price-asc">Sort by price: low to high</option>
                                                        <option value="price-desc">Sort by price: high to low</option>
                                                    <?php endif; ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="product_header_right">
                                            <button class="btn btn-fill-out rounded-2 text-uppercase" type="submit">
                                                <i class="fa fa-sort" aria-hidden="true"></i>
                                                Sort
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <?php if($product_data['final_products']->isNotEmpty()): ?>

                            <div class="row shop_container px-3">
                                <?php $__currentLoopData = $product_data['final_products']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4 col-6">
                                        <div class="product">
                                            <div class="product_img">
                                                <form id="product-<?php echo e($item['id']); ?>" action="<?php echo e(route('product_details')); ?>"
                                                      method="get">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" value="<?php echo e($item['product_id']); ?>"
                                                           name="product_id">
                                                    <a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('product-<?php echo e($item['product_id']); ?>').submit();">
                                                        <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['product_name']); ?>"
                                                             height="220" width="260">
                                                    </a>
                                                </form>
                                                <?php
                                                    $tokenExpire = session('second_layer_token_expire_at');
                                                ?>
                                                <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                                                    <div class="product_action_box">
                                                        <ul class="list_none pr_action_btn">
                                                            <li class="add-to-cart"><a href="#" data-bs-toggle="modal"
                                                                                       data-bs-target="#productModal-<?php echo e($item['id']); ?>"><i
                                                                        class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="modal fade subscribe_popup" id="productModal-<?php echo e($item['id']); ?>" tabindex="-1"
                                                     role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered"
                                                         role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true"><i
                                                                            class="ion-ios-close-empty"></i></span>
                                                                </button>
                                                                <div class="row g-0">
                                                                    <div class="col-sm-5">
                                                                        <div class="background_bg h-100"
                                                                             data-img-src="<?php echo e($item['image']); ?>"></div>
                                                                    </div>
                                                                    <div class="col-sm-7">
                                                                        <div class="popup_content">
                                                                            <div class="popup-text">
                                                                                <div class="heading_s4">
                                                                                    <h2 style="color: rgb(46, 48, 124);">Add to Cart</h2>
                                                                                </div>
                                                                            </div>
                                                                            <h3 class=""><?php echo e($item['product_name']); ?></h3>
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <th>Warehouse Name</th>
                                                                                    <th>Stock Quantity</th>
                                                                                </tr>
                                                                                <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                                                                                    <?php if(isset($item['warehouse_stock_qty'])): ?>
                                                                                    <?php $__currentLoopData = $item['warehouse_stock_qty']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse_qty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <tr>
                                                                                            <td><?php echo e($warehouse_qty['warehouse_name']); ?></td>
                                                                                            <td><?php echo e($warehouse_qty['qty']); ?></td>
                                                                                        </tr>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php endif; ?>
                                                                                <?php endif; ?>
                                                                            </table>

                                                                            <form method="post" action="<?php echo e(route('add_to_cart')); ?>">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" value="<?php echo e($item['product_id']); ?>" name="product_id">

                                                                                <div class="form-group mb-3">
                                                                                    <div class="cart-product-quantity">
                                                                                        <div class="quantity">
                                                                                            <label class="form-label">Quantity: </label>
                                                                                        </div>
                                                                                        <div class="quantity">
                                                                                            <input type="button" value="-" class="minus">
                                                                                            <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                                                                            <input type="button" value="+" class="plus">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <label class="form-label" style="text-align: left">Warehouse: </label>
                                                                                        <select class="form-control" name="warehouse_data">
                                                                                            <option value="">Select Warehouse</option>
                                                                                            <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                                                                                                <?php if(isset($item['warehouse_stock_qty'])): ?>
                                                                                                    <?php ($selected_warehouse = \Illuminate\Support\Facades\Cache::get('warehouse')); ?>

                                                                                                <?php $__currentLoopData = $item['warehouse_stock_qty']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                        <option value="<?php echo e($warehouse['warehouse_id']); ?>!<?php echo e($warehouse['batch_id']); ?>" <?php if($warehouse['warehouse_id'] == $selected_warehouse): ?> selected <?php endif; ?>><?php echo e($warehouse['warehouse_name']); ?></option>
                                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php endif; ?>
                                                                                            <?php endif; ?>

                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <button
                                                                                        class="btn btn-fill-out btn-block text-uppercase rounded-0"
                                                                                        type="submit">
                                                                                        Add to Cart
                                                                                    </button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="product_info">
                                                <form id="product-<?php echo e($item['product_id']); ?>"
                                                      action="<?php echo e(route('product_details')); ?>" method="get">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" value="<?php echo e($item['product_id']); ?>"
                                                           name="product_id">
                                                    <h6 class="product_title text-capitalize">
                                                        <a href="#"
                                                           onclick="event.preventDefault(); document.getElementById('product-<?php echo e($item['product_id']); ?>').submit();">
                                                            <?php echo e($item['product_name']); ?></a>
                                                    </h6>
                                                </form>
                                                <form id="category-<?php echo e($item['category_id']); ?>"
                                                      action="<?php echo e(route('productsByCategory')); ?>" method="get">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" value="<?php echo e($item['category_id']); ?>" name="id">
                                                    <h6>
                                                        <b>Category:</b>
                                                        <a href="#"
                                                           onclick="event.preventDefault(); document.getElementById('category-<?php echo e($item['category_id']); ?>').submit();"><?php echo e($item['category_name']); ?></a>
                                                    </h6>
                                                </form>
                                                <?php if($is_price == true): ?>
                                                    <div class="product_price">
                                                        <span class="price"><?php echo e($item['price']); ?>$</span>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        <?php else: ?>
                            <h2 class="content_title text-center mb-4">No Products Found</h2>
                        <?php endif; ?>
                        <form action="<?php echo e(route('productsByCategory')); ?>" method="get">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination mt-3 justify-content-center pagination_style1">
                                        <input type="hidden" name="id" value="<?php echo e($formData->id); ?>">
                                        <input type="hidden" name="limit" value="<?php echo e($formData->limit); ?>">
                                        <input type="hidden" name="search_keyword"
                                               value="<?php echo e($formData->search_keyword); ?>">
                                        <input type="hidden" name="min_price" value="<?php echo e($formData->min_price); ?>">
                                        <input type="hidden" name="max_price" value="<?php echo e($formData->max_price); ?>">
                                        <input type="hidden" id="page" name="page">
                                        <?php if(isset($pages)&& ($pages>0)): ?>
                                            <?php $__currentLoopData = range(1, $pages); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="page-item <?php if($item == $formData->page): ?> <?php endif; ?> active">
                                                    <button class="page-link"
                                                            onclick="document.getElementById('page').value=<?php echo e($item); ?>;">
                                                        <?php echo e($item); ?></button>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
                        <div class="sidebar">
                            <div class="widget">
                                <form action="<?php echo e(route('productsByCategory')); ?>" method="get">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" value="<?php echo e($product_data['category_id']); ?>" name="id">
                                    <h5 class="widget_title">Search & Filter</h5>
                                    <input class="form-control mb-4" placeholder="Input Products Name"
                                           name="search_keyword">
                                    <?php if($is_price == true): ?>
                                        <div class="filter_price">
                                            <div id="price_filter" data-min="0" data-max="2000" data-min-value="0"
                                                 data-max-value="2000" data-price-sign="$"></div>
                                            <div class="price_range">
                                                <span>Price: <span id="flt_price"></span></span>
                                                <input type="hidden" id="min_price" name="min_price">
                                                <input type="hidden" id="max_price" name="max_price">
                                            </div>
                                            <input type="hidden" name="limit" value="<?php echo e($formData->limit); ?>">

                                        </div>
                                    <?php endif; ?>
                                    <button class="btn btn-fill-out rounded-2 text-uppercase mt-3" type="submit">
                                        <i class="fa fa-filter" aria-hidden="true"></i>
                                        Filter
                                    </button>
                                </form>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Categories</h5>
                                <ul class="widget_categories">
                                    <?php $__currentLoopData = $categoryTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <form id="parent_category-<?php echo e($parent['id']); ?>"
                                                  action="<?php echo e(route('productsByCategory')); ?>">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" value="<?php echo e($parent['id']); ?>" name="id">
                                                <a href="#"
                                                   onclick="event.preventDefault(); document.getElementById('parent_category-<?php echo e($parent['id']); ?>').submit()">
                                                    <span class="categories_name"><?php echo e($parent['name']); ?></span>
                                                </a>
                                            </form>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END SECTION SHOP -->
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.structures.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\productsByCategory.blade.php ENDPATH**/ ?>