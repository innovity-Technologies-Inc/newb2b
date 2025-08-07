
<?php
    $warehouse_id = \Illuminate\Support\Facades\Cache::get('warehouse');
    $warehouse_location = \Illuminate\Support\Facades\Cache::get('warehouse_name');
    $tokenExpire = session()->get('second_layer_token_expire_at');
    $cart_count = session()->get('cart_items_count');
?>

<!-- START HEADER -->
<header class="header_wrap">

    <div class="middle-header dark_skin">
        <div class="container">
            <div class="nav_block">
                <a class="navbar-brand" href="#">
                    <img class="logo_light" src="<?php echo e(asset('frontend/assets/images/logo_light.png')); ?>" alt="logo"
                         style="height: 60px; width: 120px">
                    <img class="logo_dark" src="<?php echo e(asset('frontend/assets/images/logo_dark.png')); ?>" alt="logo"
                         style="height: 60px; width: 120px">

                </a>
                <div class="product_search_form radius_input search_form_btn">
                    <form action="<?php echo e(route('productsByCategory')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="custom_select">
                                    <select class="first_null not_chosen" name="id">
                                        <option value="">All Category</option>
                                        <?php $__currentLoopData = $categoryTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($parent['id']); ?>"><?php echo e($parent['name']); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <input class="form-control" placeholder="Search Product..." required="" type="text"
                                   name="product_name">
                            <button type="submit" class="search_btn3">Search</button>
                        </div>
                    </form>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">
                    <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                        <li style="color: #1bad4b; font-weight: bold">
                            <i class="linearicons-map-marker"></i>
                        <span>
                                <?php echo e($warehouse_location ?? 'Not Selected'); ?>

                        </span>
                        </li>
                        <li >
                            <button class="nav-link nav-icon" data-bs-target="#warehouse_selection" data-bs-toggle="modal">
                                <i style="color: #1bad4b; " class="ti-pencil-alt"></i>
                            </button>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-icon dropdown-toggle" data-bs-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <i class="linearicons-user"></i>
                        </a>

                        <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route('user.dashboard')); ?>">Dashboard</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('purchase_history')); ?>">Purchase History</a></li>

                                <li>
                                    <form id="log-out" action="<?php echo e(route('user.logout')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <a class="dropdown-item" href="#"
                                           onclick="event.preventDefault(); document.getElementById('log-out').submit()">Logout</a>
                                    </form>
                                </li>
                            </ul>
                        <?php else: ?>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo e(route('registration')); ?>">Registration</a></li>
                                <li><a class="dropdown-item" href="<?php echo e(route('login')); ?>">Login</a></li>
                            </ul>
                    <?php endif; ?>



                    <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                    <li class="">
                            <a class="nav-link nav-icon" href="<?php echo e(route('cart')); ?>">
                                <i class="linearicons-bag2"></i>

                                <?php if($cart_count > 0): ?>
                                    <span class="cart_count">
                    <?php echo e($cart_count); ?>

                </span>
                                <?php endif; ?>
                            </a>
                        </li>

                    <?php endif; ?>


                </ul>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase border-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                    <div class="categories_wrap">
                        <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent"
                                aria-expanded="false" class="categories_btn categories_menu">
                            <span>Categories </span><i class="linearicons-menu"></i>
                        </button>

                        <div id="navCatContent" class="navbar nav collapse">
                            <ul>
                                <?php $__currentLoopData = $categoryTree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="dropdown dropdown-mega-menu">
                                        <form action="<?php echo e(route('productsByCategory')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" value="<?php echo e($parent['id']); ?>" name="id">
                                            <button class="dropdown-item nav-link dropdown-toggler">
                                                <span><?php echo e($parent['name']); ?></span></button>
                                        </form>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-12">
                                                    <ul class="d-lg-flex">
                                                        <?php if(!empty($parent['children'])): ?>
                                                            <?php $__currentLoopData = $parent['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="mega-menu-col col-lg-4">
                                                                    <ul>

                                                                        <li class="dropdown-header">
                                                                            <form
                                                                                action="<?php echo e(route('productsByCategory')); ?>">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden"
                                                                                       value="<?php echo e($subCategory['id']); ?>"
                                                                                       name="id">
                                                                                <button class="dropdown-header"
                                                                                        style="all: unset; cursor: pointer;"><?php echo e($subCategory['name']); ?></button>
                                                                            </form>
                                                                        </li>
                                                                        <?php if(!empty($subCategory['children'])): ?>
                                                                            <?php $__currentLoopData = $subCategory['children']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li>
                                                                                    <form
                                                                                        action="<?php echo e(route('productsByCategory')); ?>">
                                                                                        <?php echo csrf_field(); ?>
                                                                                        <input type="hidden"
                                                                                               value="<?php echo e($child['id']); ?>"
                                                                                               name="id">
                                                                                        <button
                                                                                            class="dropdown-item nav-link nav_item"><?php echo e($child['name']); ?></button>
                                                                                    </form>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php endif; ?>

                                                                    </ul>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>

                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSidetoggle" aria-expanded="false">
                            <span class="ion-android-menu"></span>
                        </button>
                        <div class="pr_search_icon">
                            <a href="javascript:" class="nav-link pr_search_trigger"><i
                                    class="linearicons-magnifier"></i></a>
                        </div>
                        <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                            <ul class="navbar-nav">
                                <li>
                                    <a class="nav-link nav-item <?php if(Route::currentRouteNamed('homepage')): ?> active <?php endif; ?> "
                                       href="<?php echo e(route('homepage')); ?>">Home</a>
                                </li>

                                <li class="dropdown">
                                    <a class="dropdown-toggle nav-link text-light <?php if(Route::currentRouteNamed('vision-mission-values') || Route::currentRouteNamed('about-us') ): ?> active <?php endif; ?>"
                                       href="#" data-bs-toggle="dropdown">What We Are</a>
                                    <div class="dropdown-menu">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item nav-link nav_item <?php if(Route::currentRouteNamed('about-us')): ?> active <?php endif; ?>"
                                                   href="<?php echo e(route('about-us')); ?>">About Us</a></li>
                                            <li>
                                                <a class="dropdown-item nav-link nav_item <?php if(Route::currentRouteNamed('vision-mission-values')): ?> active <?php endif; ?>"
                                                   href="<?php echo e(route('vision-mission-values')); ?>">Vision, Mission &
                                                    Values</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li>
                                    <a class="nav-link nav-item <?php if(Route::currentRouteNamed('products')): ?> active <?php endif; ?>" href="<?php echo e(route('products')); ?>">Products</a>
                                </li>

                                <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>
                                    <li>
                                        <a class="nav-link nav-item <?php if(Route::currentRouteNamed('user.dashboard')): ?> active <?php endif; ?>" href="<?php echo e(route('user.dashboard')); ?>">User Dashboard</a>
                                    </li>
                                <?php endif; ?>

                                <li>
                                    <a class="nav-link nav-item " href="<?php echo e(route('contact')); ?>">Contact</a>
                                </li>
                                <li>
                                    <a class="nav-link nav-item" href="<?php echo e(asset('brochure/brochure.pdf')); ?>" target="_blank" download="Product Brochure.pdf">Product Brochure</a>
                                </li>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- END HEADER -->


<div class="modal fade subscribe_popup" id="warehouse_selection" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="ion-ios-close-empty"></i></span>
                </button>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="popup_content">
                            <div class="popup-text">
                                <div class="heading_s3 text-center">
                                    <h4>Choose Warehouse</h4>

                                </div>
                            </div>
                            <form method="post" class="rounded_input" action="<?php echo e(route('warehouse_store')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group mb-3">
                                    <select name="warehouse" id="warehouse"
                                            size="5" style="width: 100%"
                                            class="px-3 py-2 text-base border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Skip Selection</option>
                                        <?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire)): ?>

                                                <?php $__currentLoopData = $warehouse_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item['id']); ?>!<?php echo e($item['name']); ?>" <?php if($item['id'] == $warehouse_id): ?> selected <?php endif; ?>>
                                                        <?php echo e($item['name']); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>


                                </div>
                                <div class="form-group mb-3">
                                    <button class="btn btn-fill-out btn-block text-uppercase btn-radius" title="Save" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(session()->has('second_layer_token') && $tokenExpire && now()->lessThan($tokenExpire) && !\Illuminate\Support\Facades\Cache::has('warehouse') && !\Illuminate\Support\Facades\Cache::has('warehouse_skip')): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Bootstrap 5 way to open modal
            var warehouseModal = new bootstrap.Modal(document.getElementById('warehouse_selection'));
            warehouseModal.show();
        });
    </script>
<?php endif; ?>

<?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views/frontend/structures/header.blade.php ENDPATH**/ ?>