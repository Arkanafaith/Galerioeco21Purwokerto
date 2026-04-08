<?php $__env->startSection('title', 'Kelola Konten Website'); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-header">
    <h1>📝 Kelola Konten Website (Edit Only)</h1>
</div>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('error')); ?>

    </div>
<?php endif; ?>

<?php if(count($contents) === 0): ?>
    <div class="alert alert-warning">Belum ada konten untuk diedit.</div>
<?php else: ?>
    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(isset($contents[$section]) && count($contents[$section]) > 0): ?>
            <div class="content-section">
                <h2><?php echo e(ucfirst(str_replace('_', ' ', $section))); ?></h2>
                
                <div class="content-list">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Key</th>
                                <th>Type</th>
                                <th>Preview</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contents[$section]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <strong><?php echo e($content->key); ?></strong>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?php echo e($content->content_type); ?>">
                                            <?php echo e(ucfirst($content->content_type)); ?>

                                        </span>
                                    </td>
                                    <td>
                                        <?php if($content->content_type === 'image'): ?>
                                            <?php if($content->image_path): ?>
                                                <img src="<?php echo e(asset($content->image_path)); ?>" alt="<?php echo e($content->key); ?>" style="max-height: 50px; max-width: 100px;">
                                            <?php else: ?>
                                                <span class="text-muted">Tidak ada gambar</span>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php echo e(Str::limit($content->content, 50)); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('admin.content.edit', $content)); ?>" class="btn btn-sm btn-warning">✏️ Edit</a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<style>
    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .content-section {
        margin-bottom: 3rem;
    }

    .content-section h2 {
        border-bottom: 2px solid #007bff;
        padding-bottom: 0.5rem;
        margin-bottom: 1.5rem;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }

    .table tbody tr:hover {
        background-color: #f9f9f9;
    }

    .badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 0.25rem;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .badge-text {
        background-color: #e7f3ff;
        color: #004085;
    }

    .badge-textarea {
        background-color: #fff3cd;
        color: #856404;
    }

    .badge-image {
        background-color: #d1e7dd;
        color: #0f5132;
    }

    .badge-number {
        background-color: #e2e3e5;
        color: #383d41;
    }

    .btn {
        padding: 0.5rem 1rem;
        border: none;
        border-radius: 0.25rem;
        cursor: pointer;
        text-decoration: none;
        display: inline-block;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }

    .alert {
        padding: 0.75rem 1.25rem;
        margin-bottom: 1.5rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-info {
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    .text-muted {
        color: #6c757d;
    }
</style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main\ecoo21-main\resources\views/admin/content/index.blade.php ENDPATH**/ ?>