<nav class="navbar">
    <div class="container">
        <a href="<?php echo e(url('/')); ?>" class="navbar-brand">
            <img src="<?php echo e(asset('images/toko/logo_galeri_eco21.png')); ?>" alt="Galeri Eco 21" class="navbar-logo">
            <img src="<?php echo e(asset('images/icon/eco21 teks.png')); ?>" alt="Eco 21" class="navbar-text-logo">
        </a>
        
        <ul class="navbar-menu">
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
        
        <a href="<?php echo e(route('admin.login')); ?>" class="btn-login">Log In</a>
    </div>
</nav>
<?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main\ecoo21-main\resources\views/partials/navbar.blade.php ENDPATH**/ ?>