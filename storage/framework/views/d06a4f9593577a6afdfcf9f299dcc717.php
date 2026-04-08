<?php $__env->startSection('title','Edit Product'); ?>

<?php $__env->startSection('content'); ?>
    <h3>Edit Product</h3>
    <form method="POST" action="<?php echo e(route('admin.products.update', $product)); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
        <div style="margin-bottom:10px">
            <label>Name</label><br>
            <input name="name" required style="width:100%;padding:8px" value="<?php echo e(old('name', $product->name)); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Price</label><br>
            <input name="price" required type="number" step="0.01" style="width:100%;padding:8px" value="<?php echo e(old('price', $product->price)); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Description</label><br>
            <textarea name="description" style="width:100%;padding:8px"><?php echo e(old('description', $product->description)); ?></textarea>
        </div>
        <div style="margin-bottom:10px">
            <label>Tokopedia Link (optional)</label><br>
            <input name="tokopedia_link" type="url" style="width:100%;padding:8px" placeholder="https://tokopedia.com/..." value="<?php echo e(old('tokopedia_link', $product->tokopedia_link)); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Shopee Link (optional)</label><br>
            <input name="shopee_link" type="url" style="width:100%;padding:8px" placeholder="https://shopee.co.id/..." value="<?php echo e(old('shopee_link', $product->shopee_link)); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Image (optional)</label><br>
            <?php if($product->image): ?>
                <div style="margin-bottom:8px"><img src="/<?php echo e($product->image); ?>" alt="" style="max-width:160px;border-radius:6px"></div>
            <?php endif; ?>
            <input type="file" name="image" accept="image/*">
        </div>
        <div style="margin-bottom:10px">
            <label><input type="checkbox" name="is_best" value="1" <?php echo e(old('is_best', $product->is_best) ? 'checked' : ''); ?>> Mark as Best Product</label>
        </div>
        <button class="btn" type="submit">Update</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main - Copy\ecoo21-main\resources\views/admin/products/edit.blade.php ENDPATH**/ ?>