<?php $__env->startSection('title','Dashboard'); ?>

<?php $__env->startSection('content'); ?>
<?php
    // Get total visitors
    try {
        $totalVisitors = \App\Models\SiteVisitCount::getTotalVisits();
        $todayVisitors = \App\Models\SiteVisitCount::getTodayVisits();
    } catch (\Exception $e) {
        $totalVisitors = 0;
        $todayVisitors = 0;
    }
    
    // Get average rating from all reviews
    try {
        $allReviews = \App\Models\Review::all();
        $avgRating = $allReviews->count() > 0 ? round($allReviews->avg('rating'), 1) : 0;
        $totalReviews = $allReviews->count();
    } catch (\Exception $e) {
        $avgRating = 0;
        $totalReviews = 0;
    }
    
    // Get recent products
    $recentProducts = \App\Models\Product::latest()->take(5)->get();
    
    // Get greeting based on time
    $hour = now()->hour;
    if ($hour < 12) {
        $greeting = 'Selamat Pagi';
    } elseif ($hour < 15) {
        $greeting = 'Selamat Siang';
    } elseif ($hour < 18) {
        $greeting = 'Selamat Sore';
    } else {
        $greeting = 'Selamat Malam';
    }
?>

<div class="dashboard-header">
    <div>
        <h2><?php echo e($greeting); ?> 👋</h2>
        <p class="breadcrumb">Ini adalah ringkasan aktivitas toko hari ini</p>
    </div>
    <div style="display: flex; gap: 1rem;">
        <a href="<?php echo e(route('admin.products.create')); ?>" class="btn-primary-admin">
            <span>+</span> Tambah Produk
        </a>
        <a href="<?php echo e(route('admin.content.index')); ?>" class="btn-primary-admin" style="background: #10b981;">
            <span>✏️</span> Kelola Konten
        </a>
    </div>
</div>

<!-- Stats Cards Row -->
<div class="dashboard-grid">
    <div class="stat-card-admin" style="border-left: 4px solid #f59e0b;">
        <div class="stat-icon" style="font-size: 28px;">📦</div>
        <div class="stat-content">
            <h3>Total Produk</h3>
            <p class="stat-number"><?php echo e(\App\Models\Product::count()); ?></p>
        </div>
    </div>

    <div class="stat-card-admin" style="border-left: 4px solid #8b5cf6;">
        <div class="stat-icon" style="font-size: 28px;">👁️</div>
        <div class="stat-content">
            <h3>Pengunjung Hari Ini</h3>
            <p class="stat-number"><?php echo e(number_format($todayVisitors)); ?></p>
        </div>
    </div>

    <div class="stat-card-admin" style="border-left: 4px solid #10b981;">
        <div class="stat-icon" style="font-size: 28px;">👥</div>
        <div class="stat-content">
            <h3>Total Pengunjung</h3>
            <p class="stat-number"><?php echo e(number_format($totalVisitors)); ?></p>
        </div>
    </div>

    <div class="stat-card-admin" style="border-left: 4px solid #f59e0b;">
        <div class="stat-icon" style="font-size: 28px;">⭐</div>
        <div class="stat-content">
            <h3>Rating Rata-rata</h3>
            <p class="stat-number" style="display: flex; align-items: baseline; gap: 6px;">
                <?php echo e($avgRating); ?>

                <span style="font-size: 14px; font-weight: 400; color: #6b7280;">/ 5.0</span>
            </p>
            <p style="font-size: 12px; color: #9ca3af; margin: 0;"><?php echo e($totalReviews); ?> ulasan</p>
        </div>
    </div>
</div>

<!-- Quick Actions & Recent Products -->
<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- Quick Actions -->
    <div style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); border: 1px solid #e5e7eb;">
        <h3 style="font-size: 16px; font-weight: 600; color: #1f2937; margin-bottom: 20px;">⚡ Aksi Cepat</h3>
        <div style="display: flex; flex-direction: column; gap: 12px;">
            <a href="<?php echo e(route('admin.products.create')); ?>" style="display: flex; align-items: center; gap: 12px; padding: 14px; background: #fef3c7; border-radius: 10px; text-decoration: none; color: #92400e; transition: all 0.2s;">
                <span style="font-size: 20px;">🆕</span>
                <div>
                    <p style="font-weight: 600; margin: 0; font-size: 14px;">Tambah Produk Baru</p>
                    <p style="margin: 0; font-size: 12px; opacity: 0.8;">Tambahkan produk terbaru</p>
                </div>
            </a>
            <a href="<?php echo e(route('admin.products.index')); ?>" style="display: flex; align-items: center; gap: 12px; padding: 14px; background: #dbeafe; border-radius: 10px; text-decoration: none; color: #1e40af; transition: all 0.2s;">
                <span style="font-size: 20px;">📝</span>
                <div>
                    <p style="font-weight: 600; margin: 0; font-size: 14px;">Kelola Produk</p>
                    <p style="margin: 0; font-size: 12px; opacity: 0.8;">Edit atau hapus produk</p>
                </div>
            </a>
            <a href="<?php echo e(route('admin.content.index')); ?>" style="display: flex; align-items: center; gap: 12px; padding: 14px; background: #d1fae5; border-radius: 10px; text-decoration: none; color: #065f46; transition: all 0.2s;">
                <span style="font-size: 20px;">🎨</span>
                <div>
                    <p style="font-weight: 600; margin: 0; font-size: 14px;">Kelola Konten Website</p>
                    <p style="margin: 0; font-size: 12px; opacity: 0.8;">Ubah teks dan gambar</p>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Products -->
    <div style="background: white; border-radius: 12px; padding: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); border: 1px solid #e5e7eb;">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 16px; font-weight: 600; color: #1f2937;">📦 Produk Terbaru</h3>
            <a href="<?php echo e(route('admin.products.index')); ?>" style="font-size: 13px; color: #6b7280; text-decoration: none;">Lihat semua →</a>
        </div>
        <div style="display: flex; flex-direction: column; gap: 12px;">
            <?php $__empty_1 = true; $__currentLoopData = $recentProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>" style="display: flex; align-items: center; gap: 12px; padding: 10px; background: #f9fafb; border-radius: 8px; text-decoration: none; color: inherit; transition: all 0.2s;">
                <div style="width: 40px; height: 40px; border-radius: 8px; overflow: hidden; background: #e5e7eb; flex-shrink: 0;">
                    <?php if($product->image): ?>
                    <img src="<?php echo e(asset($product->image)); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                    <?php else: ?>
                    <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 18px;">📷</div>
                    <?php endif; ?>
                </div>
                <div style="flex: 1; min-width: 0;">
                    <p style="font-weight: 600; margin: 0; font-size: 14px; color: #1f2937; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?php echo e($product->name); ?></p>
                    <p style="margin: 0; font-size: 12px; color: #6b7280;">Rp<?php echo e(number_format($product->price,0,',','.')); ?></p>
                </div>
                <?php if($product->is_best): ?>
                <span style="background: #fef3c7; color: #92400e; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 600;">TERBAIK</span>
                <?php endif; ?>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p style="text-align: center; color: #9ca3af; padding: 20px;">Belum ada produk</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Bottom Info -->
<div style="margin-top: 24px; background: linear-gradient(135deg, #1f2937 0%, #374151 100%); border-radius: 12px; padding: 24px; color: white;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 16px;">
        <div>
            <h3 style="font-size: 18px; font-weight: 600; margin: 0 0 4px 0;">🏪 Galeri Eco 21</h3>
            <p style="margin: 0; font-size: 13px; opacity: 0.8;">Pusat oleh-oleh khas Banyumas</p>
        </div>
        <div style="display: flex; gap: 24px; font-size: 13px; opacity: 0.9;">
            <span>📍 Jl. Mayjend Sutoyo No.27, Sokanegara</span>
            <span>📧 eco21@example.com</span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eco21\galerioleh-oleheco21-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>