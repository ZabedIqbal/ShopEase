<section id="wsus__large_banner">
    <div class="container">
        <div class="row">
            <div class="cl-xl-12">
                <?php if($homepage_secion_banner_four->banner_one->status == 1): ?>

                <a href="<?php echo e($homepage_secion_banner_four->banner_one->banner_url); ?>">
                    <img class="img-gluid" src="<?php echo e(asset($homepage_secion_banner_four->banner_one->banner_image)); ?>" alt="">
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\Upload\Multi+vendor+ecommerce+source+code\Multi vendor ecommerce source code\resources\views/frontend/home/sections/large-banner.blade.php ENDPATH**/ ?>