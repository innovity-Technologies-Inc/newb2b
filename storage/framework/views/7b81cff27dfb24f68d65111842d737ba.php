<div class="col-lg-3 col-md-4">
    <div class="dashboard_menu">
        <ul class="nav nav-tabs flex-column">
            <li class="nav-item mx-auto">
                <img class="my-2" height="100" width="100"  src="<?php echo e(asset('frontend/assets/images/theme/icons/man.png')); ?>">
                <?php
                $name = session()->get('customer_name');
                ?>
                <p>Mr. <?php echo e($name); ?></p>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if(Route::currentRouteNamed('user.dashboard')): ?> active <?php endif; ?>" href="<?php echo e(route('user.dashboard')); ?>" ><i class="ti-layout-grid2"></i>Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('purchase_history')); ?>" ><i class="ti-shopping-cart-full"></i>Purchase History</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"  data-bs-target="#warehouse_selection" data-bs-toggle="modal"><i class="ti-map-alt"></i>Change Warehouse</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if(Route::currentRouteNamed('user.profile')): ?> active <?php endif; ?>" href="<?php echo e(route('user.profile')); ?>"><i class="ti-id-badge"></i>Manage Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if(Route::currentRouteNamed('user.change_password')): ?> active <?php endif; ?>" href="<?php echo e(route('user.change_password')); ?>"><i class="ti-id-badge"></i>Change Password</a>
            </li>

            <li class="nav-item">
                <form id="log-out" action="<?php echo e(route('user.logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault(); document.getElementById('log-out').submit()"><i class="ti-lock"></i> Logout</a>
                </form>
            </li>
            <li class="nav-item">
                <form id="user-delete" action="<?php echo e(route('user.delete')); ?>">
                    <a class="nav-link deleteProfile" href="#" onclick="event.preventDefault(); document.getElementByID('user-delete').submit()"><i class="ti-trash"></i>Delete Profile</a>
                </form>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\structures\dashboard_sidebar.blade.php ENDPATH**/ ?>