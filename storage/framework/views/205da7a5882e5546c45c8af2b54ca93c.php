<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <?php if(!empty($subtitle)): ?>
                    <h1 class="text-capitalize"><?php echo e($subtitle); ?></h1>
                    <?php elseif(!empty($title)): ?>
                        <h1 class="text-capitalize"><?php echo e($title); ?></h1>
                    <?php endif; ?>

                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('homepage')); ?>">Home</a></li>
                    <?php if(!empty($title)): ?>
                    <li class="breadcrumb-item active text-capitalize"><?php echo e($title); ?></li>
                    <?php endif; ?>
                    <?php if(!empty($subtitle)): ?>
                        <li class="breadcrumb-item active text-capitalize"><?php echo e($subtitle); ?></li>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
    </div>
    <!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<?php /**PATH D:\Project\Web\b2b_ecommerce\resources\views\frontend\structures\breadcrumb.blade.php ENDPATH**/ ?>