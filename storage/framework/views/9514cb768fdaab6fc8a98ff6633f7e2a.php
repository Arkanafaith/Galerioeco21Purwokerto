<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $__env->yieldContent('description', 'Galeri Eco 21 - Oleh-oleh khas Banyumas asli dan terpercaya dari UMKM lokal. Nikmati getuk goreng, keripik tempe, mendoan, dan oleh-oleh legendaris lainnya.'); ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo e(request()->url()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas Terpercaya'); ?></title>
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo $__env->yieldContent('og:title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas'); ?>">
    <meta property="og:description" content="<?php echo $__env->yieldContent('og:description', 'Oleh-oleh khas Banyumas asli dari UMKM lokal terpercaya. Getuk goreng, keripik tempe, mendoan, dan lainnya.'); ?>">
    <meta property="og:image" content="<?php echo e(asset('images/icon/eco21 teks.png')); ?>">
    <meta property="og:url" content="<?php echo e(request()->url()); ?>">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $__env->yieldContent('twitter:title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas'); ?>">
    <meta name="twitter:description" content="<?php echo $__env->yieldContent('twitter:description', 'Oleh-oleh khas Banyumas asli. Getuk, keripik tempe, mendoan dari UMKM lokal.'); ?>">
    <meta name="twitter:image" content="<?php echo e(asset('images/icon/eco21 teks.png')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pdp-redesign.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/pdp-reviews.css')); ?>">
</head>
<body>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script src="<?php echo e(asset('js/script.js')); ?>"></script>
</body>
</html><?php /**PATH C:\laragon\www\eco21\galerioleh-oleheco21-main\resources\views/layouts/app.blade.php ENDPATH**/ ?>