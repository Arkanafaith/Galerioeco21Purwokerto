<?php $__env->startSection('title','Products'); ?>

<?php $__env->startSection('content'); ?>
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:12px">
        <div>
            <a href="<?php echo e(route('admin.products.index')); ?>" class="btn" style="background:<?php echo e(empty($filterBest) ? '#3b82f6' : '#e5e7eb'); ?>;color:<?php echo e(empty($filterBest) ? 'white' : '#1f2937'); ?>">All Products</a>
            <a href="<?php echo e(route('admin.products.index', ['best'=>1])); ?>" class="btn" style="background:<?php echo e($filterBest ? '#3b82f6' : '#e5e7eb'); ?>;color:<?php echo e($filterBest ? 'white' : '#1f2937'); ?>">Best Products</a>
        </div>
        <a href="<?php echo e(route('admin.products.create', $filterBest ? ['best'=>1] : [])); ?>" class="btn">Add Product</a>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:18px;margin-top:16px">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div style="background:white;border-radius:10px;padding:12px;box-shadow:0 6px 18px rgba(0,0,0,0.06);display:flex;flex-direction:column">
                <div style="height:140px;display:flex;align-items:center;justify-content:center;background:#f8f8f8;border-radius:8px;overflow:hidden">
                    <?php if($product->image): ?>
                        <img src="/<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" style="max-width:100%;max-height:100%">
                    <?php else: ?>
                        <div style="font-weight:700;color:#444">No Image</div>
                    <?php endif; ?>
                </div>
                <div style="flex:1;padding-top:10px">
                    <div style="font-weight:700"><?php echo e($product->name); ?></div>
                    <div style="color:#666;margin-top:6px">Rp<?php echo e(number_format($product->price,0,',','.')); ?></div>
                </div>
                <div style="display:flex;gap:8px;justify-content:flex-end;margin-top:12px">
                    <a href="<?php echo e(route('admin.products.edit', $product)); ?>" class="btn" style="background:#3b82f6">Edit</a>
                    <form action="<?php echo e(route('admin.products.destroy', $product)); ?>" method="POST" onsubmit="return confirm('Hapus produk ini?');"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button class="btn" style="background:#ef4444">Delete</button></form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div>No products yet.</div>
        <?php endif; ?>
    </div>

    <div style="margin-top:16px"><?php echo e($products->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main - Copy\ecoo21-main\resources\views/admin/products/index.blade.php ENDPATH**/ ?>