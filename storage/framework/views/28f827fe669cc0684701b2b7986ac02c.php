<div class="col-xl-3 col-sm-6 col-lg-4 <?php echo e(@$key); ?>">
    <div class="wsus__product_item">
        <span class="wsus__new"><?php echo e(productType($product->product_type)); ?></span>
        <?php if(checkDiscount($product)): ?>
            <span class="wsus__minus">-<?php echo e(calculateDiscountPercent($product->price, $product->offer_price)); ?>%</span>
        <?php endif; ?>
        <a class="wsus__pro_link" href="<?php echo e(route('product-detail', $product->slug)); ?>">
            <img src="<?php echo e(asset($product->thumb_image)); ?>" alt="product" class="img-fluid w-100 img_1" />
            <img src="
            <?php if(isset($product->productImageGalleries[0]->image)): ?>
                <?php echo e(asset($product->productImageGalleries[0]->image)); ?>

            <?php else: ?>
                <?php echo e(asset($product->thumb_image)); ?>

            <?php endif; ?>
            " alt="product" class="img-fluid w-100 img_2" />
        </a>
        <ul class="wsus__single_pro_icon">
            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="show_product_modal" data-id="<?php echo e($product->id); ?>"><i class="far fa-eye"></i></a></li>
            <li><a href="" class="add_to_wishlist" data-id="<?php echo e($product->id); ?>"><i class="far fa-heart"></i></a></li>
            
        </ul>
        <div class="wsus__product_details">
            <a class="wsus__category" href="#"><?php echo e($product->category->name); ?> </a>

            <p class="wsus__pro_rating">


                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= $product->reviews_avg_rating): ?>
                    <i class="fas fa-star"></i>
                    <?php else: ?>
                    <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>

                <span>(<?php echo e($product->reviews_count); ?> review)</span>
            </p>
            <a class="wsus__pro_name" href="<?php echo e(route('product-detail', $product->slug)); ?>"><?php echo e(limitText($product->name, 52)); ?></a>
            <?php if(checkDiscount($product)): ?>
                <p class="wsus__price"><?php echo e($settings->currency_icon); ?><?php echo e($product->offer_price); ?> <del><?php echo e($settings->currency_icon); ?><?php echo e($product->price); ?></del></p>
            <?php else: ?>
                <p class="wsus__price"><?php echo e($settings->currency_icon); ?><?php echo e($product->price); ?></p>
            <?php endif; ?>
            <form class="shopping-cart-form">
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <?php $__currentLoopData = $product->variants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($variant->status != 0): ?>
                    <select class="d-none" name="variants_items[]">
                        <?php $__currentLoopData = $variant->productVariantItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variantItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($variantItem->status != 0): ?>
                                <option value="<?php echo e($variantItem->id); ?>" <?php echo e($variantItem->is_default == 1 ? 'selected' : ''); ?>><?php echo e($variantItem->name); ?> ($<?php echo e($variantItem->price); ?>)</option>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <input class="" name="qty" type="hidden" min="1" max="100" value="1" />
                <button class="add_cart" type="submit">add to cart</button>
            </form>
        </div>
    </div>
</div>
<?php /**PATH D:\Upload\Multi+vendor+ecommerce+source+code\Multi vendor ecommerce source code\resources\views/components/product-card.blade.php ENDPATH**/ ?>