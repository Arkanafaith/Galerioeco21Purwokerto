<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin - <?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
            padding: 0;
            color: #1f2937;
            display: flex;
        }

        .sidebar {
            width: 260px;
            background: #1f2937;
            color: #fff;
            padding: 24px 0;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.1);
        }

        .sidebar-brand {
            padding: 0 20px 24px;
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 20px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            padding: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
        }

        .sidebar-menu a:hover {
            background: rgba(255,255,255,0.05);
            color: #fff;
            border-left-color: #fbbf24;
        }

        .sidebar-menu a.active {
            background: rgba(251,191,36,0.1);
            color: #fbbf24;
            border-left-color: #fbbf24;
        }

        .sidebar-menu a span {
            font-size: 18px;
        }

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: opacity 0.3s ease;
        }

        .admin-wrap {
            max-width: 100%;
            margin: 0;
            background: transparent;
            border-radius: 0;
            box-shadow: none;
            overflow: visible;
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            color: #1f2937;
        }

        .topbar h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .topbar form button {
            background: #fbbf24;
            color: #1f2937;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s;
        }

        .topbar form button:hover {
            background: #f59e0b;
        }

        .admin-content {
            padding: 30px;
            background: #f3f4f6;
            flex: 1;
        }

        .success-message {
            padding: 16px 20px;
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 12px;
            margin-bottom: 25px;
            color: white;
            font-weight: 500;
            box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Dashboard Styling */
        .dashboard-header {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 12px;
        }

        .dashboard-header h2 {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0;
        }

        .breadcrumb {
            color: #6b7280;
            font-size: 13px;
            margin-top: 4px;
        }

        .btn-primary-admin {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fbbf24;
            color: #1f2937;
            padding: 10px 24px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.2s;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary-admin:hover {
            background: #f59e0b;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card-admin {
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
            display: flex;
            align-items: center;
            gap: 16px;
            transition: transform 0.2s;
            border: 1px solid #e5e7eb;
        }

        .stat-card-admin:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .stat-icon {
            font-size: 32px;
            min-width: 48px;
            text-align: center;
        }

        .stat-content h3 {
            font-size: 13px;
            color: #6b7280;
            font-weight: 600;
            margin-bottom: 4px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .dashboard-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px 22px;
            background: #ffffff;
            border-radius: 12px;
            text-decoration: none;
            color: #1f2937;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            transition: transform 0.2s, box-shadow 0.2s;
            border: 1px solid #e5e7eb;
        }

        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .action-btn span {
            font-size: 48px;
            min-width: 70px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .action-btn h4 {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin: 0 0 5px 0;
        }

        .action-btn p {
            margin: 0;
            color: #9ca3af;
            font-size: 14px;
        }

        .action-btn.logout {
            border: 2px solid #fca5a5;
        }

        .action-btn.logout:hover {
            border-color: #ef4444;
            background: #fef2f2;
        }

        /* Form Styling */
        input[type="text"], 
        input[type="email"], 
        input[type="password"],
        input[type="number"], 
        input[type="file"],
        textarea, 
        select {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
            background: white;
        }

        input[type="text"]:focus, 
        input[type="email"]:focus, 
        input[type="password"]:focus,
        input[type="number"]:focus, 
        input[type="file"]:focus,
        textarea:focus, 
        select:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .btn {
            display: inline-block;
            padding: 12px 28px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 15px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Admin pagination (Laravel links()) - keep small & tidy */
        .admin-content nav[role="navigation"] {
            margin-top: 14px;
        }

        .admin-content nav[role="navigation"] .flex {
            gap: 8px;
        }

        .admin-content nav[role="navigation"] a,
        .admin-content nav[role="navigation"] span {
            font-size: 13px !important;
            line-height: 1.2 !important;
        }

        /* Buttons/links */
        .admin-content nav[role="navigation"] a {
            padding: 6px 10px !important;
            border-radius: 8px !important;
            text-decoration: none !important;
            white-space: nowrap;
        }

        /* Page number pills (if present) */
        .admin-content nav[role="navigation"] [aria-current="page"] span {
            padding: 6px 10px !important;
            border-radius: 8px !important;
        }

        /* Prevent oversized pagination SVGs */
        .admin-content nav[role="navigation"] svg {
            width: 16px !important;
            height: 16px !important;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <div class="sidebar-brand">🏪 Eco 21</div>
        <ul class="sidebar-menu">
            <li>
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="<?php if(Route::currentRouteName() == 'admin.dashboard'): ?> active <?php endif; ?>">
                    <span>📊</span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.products.index')); ?>" class="<?php if(request()->is('admin/products*')): ?> active <?php endif; ?>">
                    <span>📦</span>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.reviews.index')); ?>" class="<?php if(request()->is('admin/reviews*')): ?> active <?php endif; ?>">
                    <span>⭐</span>
                    <span>Ulasan</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.content.index')); ?>" class="<?php if(request()->is('admin/content*')): ?> active <?php endif; ?>">
                    <span>📝</span>
                    <span>Kelola Konten</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.settings.social')); ?>" class="<?php if(request()->is('admin/settings/social*')): ?> active <?php endif; ?>">
                    <span>🌐</span>
                    <span>Media Sosial</span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(route('admin.settings')); ?>" class="<?php if(request()->is('admin/settings') && !request()->is('admin/settings/social*')): ?> active <?php endif; ?>">
                    <span>⚙️</span>
                    <span>Pengaturan</span>
                </a>
            </li>
        </ul>
    </aside>

    <div class="main-content">
        <div class="admin-wrap">
            <div class="topbar">
                <h2>🏪 Galeri Eco 21 Admin</h2>
                <div>
                    <?php if(auth()->guard()->check()): ?>
                        <form method="POST" action="<?php echo e(route('admin.logout')); ?>" style="display:inline">
                            <?php echo csrf_field(); ?>
                            <button type="submit">Logout</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>

            <div class="admin-content">
                <?php if(session('success')): ?>
                    <div class="success-message">✓ <?php echo e(session('success')); ?></div>
                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>
<script>
            // fade main content when navigating sidebar links
            document.querySelectorAll('.sidebar-menu a').forEach(link=>{
                link.addEventListener('click',function(e){
                    // allow default then fade
                    document.querySelector('.main-content').style.opacity = '0';
                    setTimeout(()=>{ document.querySelector('.main-content').style.opacity='1'; },300);
                });
            });
        </script>
    </body>
</html>
<?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main\ecoo21-main\resources\views/admin/layout.blade.php ENDPATH**/ ?>