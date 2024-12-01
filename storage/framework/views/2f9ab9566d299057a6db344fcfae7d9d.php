<?php
    $popularCategories = json_decode($popularCategory->value, true);
    // dd($popularCategories)
?>
<section id="wsus__monthly_top" class="wsus__monthly_top_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <?php if($homepage_secion_banner_one->banner_one->status == 1): ?>
                <div class="wsus__monthly_top_banner">
                    <a href="<?php echo e($homepage_secion_banner_one->banner_one->banner_url); ?>">
                        <img class="img-fluid" src="<?php echo e(asset($homepage_secion_banner_one->banner_one->banner_image)); ?>" alt="">
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header for_md">
                    <h3>Popular Categories</h3>
                    <div class="monthly_top_filter">

                        <?php
                            $products = [];
                        ?>
                        <?php $__currentLoopData = $popularCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $popularCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $lastKey = [];

                            foreach($popularCategory as $key => $category){
                                if($category === null ){
                                    break;
                                }
                                $lastKey = [$key => $category];
                            }

                            if(array_keys($lastKey)[0] === 'category'){
                                $category = \App\Models\Category::find($lastKey['category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();
                            }elseif(array_keys($lastKey)[0] === 'sub_category'){
                                $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('sub_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

                            }else {
                                $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                                $products[] = \App\Models\Product::withAvg('reviews', 'rating')
                                ->with(['variants', 'category', 'productImageGalleries'])
                                ->where('child_category_id', $category->id)->orderBy('id', 'DESC')->take(12)->get();

                            }

                        ?>
                        <button class="<?php echo e($loop->index === 0 ? 'auto_click active' : ''); ?>" data-filter=".category-<?php echo e($loop->index); ?>"><?php echo e($category->name); ?></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="row grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-2 col-6 col-sm-6 col-md-4 col-lg-3  category-<?php echo e($key); ?>">
                                <a class="wsus__hot_deals__single" href="<?php echo e(route('product-detail', $item->slug)); ?>">
                                    <div class="wsus__hot_deals__single_img">
                                        <img src="<?php echo e(asset($item->thumb_image)); ?>" alt="bag" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__hot_deals__single_text">
                                        <h5><?php echo limitText($item->name, ); ?></h5>
                                        <p class="wsus__rating">
                                            <?php for($i = 1; $i <= 5; $i++): ?>
                                                <?php if($i <= $item->reviews_avg_rating): ?>
                                                <i class="fas fa-star"></i>
                                                <?php else: ?>
                                                <i class="far fa-star"></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>

                                        </p>
                                        <?php if(checkDiscount($item)): ?>
                                            <p class="wsus__tk"><?php echo e($settings->currency_icon); ?><?php echo e($item->offer_price); ?> <del><?php echo e($settings->currency_icon); ?><?php echo e($item->price); ?></del></p>
                                        <?php else: ?>
                                            <p class="wsus__tk"><?php echo e($settings->currency_icon); ?><?php echo e($item->price); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH D:\Upload\Multi+vendor+ecommerce+source+code\Multi vendor ecommerce source code\resources\views/frontend/home/sections/top-category-product.blade.php ENDPATH**/ ?>