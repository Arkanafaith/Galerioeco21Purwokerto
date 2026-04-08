<?php $__env->startSection('title', 'Media Sosial'); ?>

<?php $__env->startSection('content'); ?>
<div class="simple-header">
    <div>
        <h1>Pengaturan Sosial Media</h1>
        <p class="subtitle">Edit link yang muncul di homepage</p>
    </div>
    <a href="<?php echo e(route('admin.dashboard')); ?>">← Dashboard</a>
</div>

<?php if(session('success')): ?>
<div class="simple-alert success">
    <span>✅</span> <?php echo e(session('success')); ?>

</div>
<?php endif; ?>

<form action="<?php echo e(route('admin.settings.social.update')); ?>" method="POST" class="simple-form">
    <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

    <div class="link-group">
        <div class="link-row">
            <label>TikTok</label>
            <input type="url" name="social_tiktok_link" placeholder="tiktok.com/@username" 
                   value="<?php echo e(old('social_tiktok_link', $tiktok ?? '')); ?>" />
            <?php $__errorArgs = ['social_tiktok_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="link-row">
            <label>WhatsApp</label>
            <input type="url" name="social_whatsapp_link" placeholder="wa.me/628xxxxxx" 
                   value="<?php echo e(old('social_whatsapp_link', $whatsapp ?? '')); ?>" />
            <?php $__errorArgs = ['social_whatsapp_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="link-row">
            <label>Tokopedia</label>
            <input type="url" name="social_tokopedia_link" placeholder="tokopedia.com/shopname" 
                   value="<?php echo e(old('social_tokopedia_link', $tokopedia ?? '')); ?>" />
            <?php $__errorArgs = ['social_tokopedia_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="link-row">
            <label>Instagram</label>
            <input type="url" name="social_instagram_link" placeholder="instagram.com/username" 
                   value="<?php echo e(old('social_instagram_link', $instagram ?? '')); ?>" />
            <?php $__errorArgs = ['social_instagram_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="link-row">
            <label>LinkedIn</label>
            <input type="url" name="social_linkedin_link" placeholder="linkedin.com/company/name" 
                   value="<?php echo e(old('social_linkedin_link', $linkedin ?? '')); ?>" />
            <?php $__errorArgs = ['social_linkedin_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <div class="link-row">
            <label>Shopee</label>
            <input type="url" name="social_shopee_link" placeholder="shopee.co.id/shopname" 
                   value="<?php echo e(old('social_shopee_link', $shopee ?? '')); ?>" />
            <?php $__errorArgs = ['social_shopee_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="error"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
    </div>

    <div class="form-buttons">
        <button type="submit">Simpan Semua</button>
        <a href="<?php echo e(route('admin.dashboard')); ?>">Batal</a>
    </div>
</form>

<style>
.simple-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e2e8f0;
}

.simple-header h1 { margin: 0; font-size: 28px; font-weight: 600; }
.subtitle { color: #64748b; margin: 5px 0 0 0; font-size: 15px; }

.simple-form {
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    border: 1px solid #e2e8f0;
}

.link-group { margin-bottom: 25px; }

.link-row {
    display: flex;
    gap: 15px;
    align-items: center;
    padding: 18px 0;
    border-bottom: 1px solid #f1f5f9;
}

.link-row:last-child { border-bottom: none; padding-bottom: 0; }

.link-row label {
    min-width: 120px;
    font-weight: 600;
    color: #334155;
    font-size: 15px;
}

.link-row input {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 15px;
    transition: border-color 0.2s, box-shadow 0.2s;
}

.link-row input:focus {
    outline: none;
    border-color: #3b82f6;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.08);
}

.error {
    display: block;
    color: #ef4444;
    font-size: 13px;
    margin-top: 5px;
}

.simple-alert {
    padding: 15px 20px;
    margin-bottom: 25px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
    font-weight: 500;
}

.simple-alert.success {
    background: linear-gradient(120deg, #d1fae5 0%, #a7f3d0 100%);
    color: #166534;
    border: 1px solid #86efac;
}

.form-buttons {
    display: flex;
    gap: 15px;
    padding-top: 25px;
    border-top: 2px solid #f1f5f9;
}

.form-buttons button {
    background: #3b82f6;
    color: white;
    padding: 12px 28px;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.2s;
}

.form-buttons button:hover {
    background: #2563eb;
}

.form-buttons a {
    padding: 12px 20px;
    color: #64748b;
    text-decoration: none;
    font-weight: 500;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    transition: all 0.2s;
}

.form-buttons a:hover {
    background: #f8fafc;
    border-color: #cbd5e1;
}

/* Responsive */
@media (max-width: 768px) {
    .simple-header { flex-direction: column; align-items: flex-start; gap: 15px; }
    .link-row { flex-direction: column; align-items: flex-start; gap: 8px; padding: 20px 0; }
    .form-buttons { flex-direction: column; }
}
</style>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\eco21\galerioleh-oleheco21-main\resources\views/admin/social-settings.blade.php ENDPATH**/ ?>