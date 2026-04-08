<?php $__env->startSection('title','Create Product'); ?>

<?php $__env->startSection('content'); ?>
    <h3>Create Product</h3>
    <form method="POST" action="<?php echo e(route('admin.products.store')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div style="margin-bottom:10px">
            <label>Name</label><br>
            <input name="name" required style="width:100%;padding:8px" value="<?php echo e(old('name')); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Price</label><br>
            <input name="price" required type="number" step="0.01" style="width:100%;padding:8px" value="<?php echo e(old('price')); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Description</label><br>
            <textarea name="description" style="width:100%;padding:8px"><?php echo e(old('description')); ?></textarea>
        </div>
        <div style="margin-bottom:10px">
            <label>Tokopedia Link (optional)</label><br>
            <input name="tokopedia_link" type="url" style="width:100%;padding:8px" placeholder="https://tokopedia.com/..." value="<?php echo e(old('tokopedia_link')); ?>">
        </div>
        <div style="margin-bottom:10px">
            <label>Image (optional)</label><br>
            <input type="file" name="image" accept="image/*">
        </div>
        <div style="margin-bottom:10px">
            <label><input type="checkbox" name="is_best" value="1" <?php echo e(old('is_best', request('best')) ? 'checked' : ''); ?>> Mark as Best Product</label>
        </div>
        <button class="btn" type="submit">Save</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eco21\galerioleh-oleheco21-main\resources\views/admin/products/create.blade.php ENDPATH**/ ?>