<?php
use App\Helpers\ContentHelper;
?>

<?php $__env->startSection('title', 'Edit Konten'); ?>

<?php $__env->startSection('content'); ?>
<div class="edit-header">
    <h1>Edit Konten: <?php echo e($siteContent->key); ?></h1>
    <a href="<?php echo e(route('admin.content.index')); ?>" class="btn btn-secondary">← Kembali</a>
</div>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

<div class="form-container">
    <form action="<?php echo e(route('admin.content.update', $siteContent)); ?>" method="POST">



        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-group">
            <label>Key</label>
            <input type="text" name="key" value="<?php echo e($siteContent->key); ?>" disabled class="form-control">
            <small>Keterangan: <?php echo e($siteContent->section); ?> - <?php echo e(ucfirst($siteContent->content_type)); ?></small>
        </div>

        <?php if($siteContent->content_type === 'image'): ?>
            <div class="form-group">
                <label>Gambar Saat Ini</label>
                <?php if($siteContent->image_path && file_exists(public_path($siteContent->image_path))): ?>
                    <div class="current-image">
                        <img src="<?php echo e(asset($siteContent->image_path)); ?>" alt="<?php echo e($siteContent->key); ?>" style="max-width: 300px; max-height: 300px;">
                    </div>
                <?php else: ?>
                    <p class="text-muted">Tidak ada gambar saat ini</p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="image">Upload Gambar Baru</label>
                <input type="file" id="image" name="image" class="form-control" accept="image/*">
                <small>Format: JPG, PNG. Ukuran maksimal: 2MB</small>
            </div>
        <?php else: ?>
            <div class="form-group">
                <label for="content">Konten</label>
                <?php if($siteContent->content_type === 'textarea'): ?>
                    <textarea id="content" name="content" class="form-control" rows="6"><?php echo e($siteContent->content); ?></textarea>
                <?php else: ?>
                    <input type="text" id="content" name="content" value="<?php echo e($siteContent->content); ?>" class="form-control">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="<?php echo e(route('admin.content.index')); ?>" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<style>
    .edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .form-container {
        background-color: #fff;
        padding: 2rem;
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #333;
    }

    .form-control {
        width: 100%;
        padding: 0.5rem 0.75rem;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        font-family: inherit;
        font-size: 1rem;
    }

    .form-control:focus {
        outline: none;
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-control:disabled {
        background-color: #e9ecef;
        color: #6c757d;
    }

    .current-image {
        margin: 1rem 0;
        text-align: center;
    }

    .current-image img {
        border: 1px solid #dee2e6;
        border-radius: 0.25rem;
        padding: 0.5rem;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
    }

    .btn {
        padding: 0.5rem 1.5rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #545b62;
    }

    .alert {
        padding: 0.75rem 1.25rem;
        margin-bottom: 1.5rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .alert-danger ul {
        margin: 0;
        padding-left: 1.5rem;
    }

    .alert-danger li {
        margin-bottom: 0.5rem;
    }

    .text-muted {
        color: #6c757d;
    }

    small {
        display: block;
        margin-top: 0.25rem;
        color: #6c757d;
        font-size: 0.875rem;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eco21\galerioleh-oleheco21-main\resources\views/admin/content/edit.blade.php ENDPATH**/ ?>