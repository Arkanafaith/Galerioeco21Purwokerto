<?php $__env->startSection('title', '<?php echo e($product->name); ?> - Harga Rp<?php echo e(number_format($product->price,0,\',\',\'.\')); ?> | Galeri Eco 21'); ?>
<?php $__env->startSection('description', 'Beli <?php echo e($product->name); ?> asli dari Galeri Eco 21, oleh-oleh khas Banyumas. Harga Rp<?php echo e(number_format($product->price,0,\',\',\'.\')); ?>. Pesan sekarang via WhatsApp atau Tokopedia.'); ?>
<?php $__env->startSection('og:title', '<?php echo e($product->name); ?> - Oleh-oleh Khas Banyumas | Galeri Eco 21'); ?>
<?php $__env->startSection('og:description', '<?php echo e(Str::limit(strip_tags($product->description ?? \"Oleh-oleh khas Banyumas asli dan terpercaya.\"), 150)); ?> Harga Rp<?php echo e(number_format($product->price,0,\',\',\'.\')); ?>. Pesan sekarang!'); ?>
<?php $__env->startSection('twitter:title', '<?php echo e($product->name); ?> | Galeri Eco 21'); ?>
<?php $__env->startSection('twitter:description', '<?php echo e($product->name); ?> Rp<?php echo e(number_format($product->price,0,\',\',\'.\')); ?> - Oleh-oleh khas Banyumas asli'); ?>

<?php $__env->startSection('content'); ?>
<div class="product-page-container">
    <!-- Back Button -->
    <a href="<?php echo e(url()->previous()); ?>" class="back-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Kembali
    </a>

    <!-- Main Product Section -->
    <div class="product-showcase">
        <!-- Product Image -->
        <div class="product-visual">
            <div class="image-frame">
                <?php
                    $imgUrl = $product->image ? asset($product->image) : 'https://placehold.co/600x700/CD853F/white?text='.urlencode($product->name);
                ?>
                <img src="<?php echo e($imgUrl); ?>" alt="<?php echo e($product->name); ?>" class="main-product-image">
                <div class="image-accent"></div>
            </div>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <!-- Breadcrumb -->
            <nav class="breadcrumb-nav">
                <a href="/">Beranda</a>
                <span class="separator">›</span>
                <a href="/#produk">Produk</a>
                <span class="separator">›</span>
                <span class="current"><?php echo e($product->name); ?></span>
            </nav>

            <!-- Category Tag -->
            <span class="category-tag">Produk Unggulan</span>

            <!-- Title -->
            <h1 class="product-name"><?php echo e($product->name); ?></h1>

            <!-- Price Display -->
            <div class="price-display">
                <span class="price-amount">Rp<?php echo e(number_format($product->price,0,',','.')); ?></span>
                <span class="price-note">Langsung dari produsen ✓</span>
            </div>

            <!-- Description -->
            <?php if($product->description): ?>
                <div class="product-description">
                    <h3>Tentang Produk</h3>
                    <p id="productDescriptionText" class="is-collapsed"><?php echo e($product->description); ?></p>
                    <button type="button" id="toggleDescriptionBtn" class="description-toggle-btn" aria-expanded="false">
                        Lihat selengkapnya
                    </button>
                </div>
            <?php endif; ?>

            <!-- Features List -->
            <div class="features-list">
                <h3>Mengapa Memilih Kami</h3>
                <ul>
                    <li>
                        <span class="check-icon">✓</span>
                        Dibuat oleh UMKM lokal Banyumas terpercaya
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Bahan berkualitas tinggi dan alami
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Cita rasa autentik yang lezat
                    </li>
                    <li>
                        <span class="check-icon">✓</span>
                        Dikemas dengan rapi dan higienis
                    </li>
                </ul>
            </div>

            <!-- Quantity & Cart -->
            <div class="purchase-section">
                <div class="quantity-control">
                    <span class="qty-label">Jumlah</span>
                    <div class="qty-wrapper">
                        <button class="qty-btn" onclick="updateQty(-1)">−</button>
                        <input type="number" id="quantity" value="1" readonly>
                        <button class="qty-btn" onclick="updateQty(1)">+</button>
                    </div>
                </div>
                <div class="total-display">
                    <span class="total-label">Total</span>
                    <span class="total-amount">Rp<span id="totalPrice"><?php echo e(number_format($product->price,0,',','.')); ?></span></span>
                </div>
            </div>

            <!-- CTA Buttons -->
            <?php
                $waNumber = env('WHATSAPP_NUMBER', '6281234567890');
                $waMessage = 'Halo, saya ingin membeli:' . "\n\n" . '*Produk:* ' . $product->name . "\n" . '*Jumlah:* 1 pcs' . "\n" . '*Harga:* Rp' . number_format($product->price, 0, ',', '.') . "\n\n" . 'Mohon konfirmasi ketersediaan. Terima kasih!';
                $waHref = 'https://wa.me/' . $waNumber . '?text=' . rawurlencode($waMessage);
                $tokopediaHref = $product->tokopedia_link ?: env('TOKOPEDIA_LINK','https://www.tokopedia.com/search?q=') . urlencode($product->name);
                $shopeeHref = $product->shopee_link ?: 'https://shopee.co.id/search?keyword=' . urlencode($product->name);
            ?>
            <div class="cta-buttons">
                <a href="<?php echo e($waHref); ?>" id="waLink" target="_blank" class="btn-primary-action wa-btn">
                    <img class="btn-icon" src="<?php echo e(asset('images/icon/whatsapp.png')); ?>" alt="WhatsApp">
                    Pesan via WhatsApp
                </a>
                <a href="<?php echo e($tokopediaHref); ?>" target="_blank" class="btn-secondary-action tokped-btn">
                    <img class="btn-icon" src="<?php echo e(asset('images/icon/tokopedia.png')); ?>" alt="Tokopedia">
                    Beli di Tokopedia
                </a>
                <a href="<?php echo e($shopeeHref); ?>" target="_blank" class="btn-secondary-action shopee-btn">
                    <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 6h-2c0-2.21-1.79-4-4-4s-4 1.79-4 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-8 0c0-1.1.9-2 2-2s2 .9 2 2h-4zm6 14H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h8v12z"/></svg>
                    Beli di Shopee
                </a>
            </div>
        </div>
    </div>

    <!-- Reviews Section -->
    <section class="reviews-area">
        <div class="section-header">
            <h2>Ulasan Pelanggan</h2>
            <p class="review-count"><?php echo e($product->review_count); ?> ulasan</p>
        </div>

        <?php if(session('success')): ?>
            <div class="notification success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Reviews List -->
        <?php if($product->reviews->count() > 0): ?>
            <div class="reviews-grid">
                <?php $__currentLoopData = $product->reviews->sortByDesc('created_at'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="review-card">
                        <div class="review-head">
                            <div class="reviewer-info">
                                <span class="reviewer-name"><?php echo e($review->name); ?></span>
                                <span class="review-date"><?php echo e($review->created_at->format('d M Y')); ?></span>
                            </div>
                            <div class="review-stars">
                                <?php for($i = 1; $i <= 5; $i++): ?>
                                    <span class="star <?php echo e($i <= $review->rating ? 'active' : ''); ?>">★</span>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <p class="review-text"><?php echo e($review->comment); ?></p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>
            <div class="no-reviews">
                <p>Belum ada ulasan untuk produk ini.</p>
                <span Jadilah yang pertama memberikan ulasan!</span>
            </div>
        <?php endif; ?>

        <!-- Review Form -->
        <div class="review-form-area">
            <h3>Berikan Ulasan Anda</h3>
            <form action="<?php echo e(route('review.store', $product)); ?>" method="POST" class="review-form">
                <?php echo csrf_field(); ?>

                <?php if($errors->any()): ?>
                    <div class="notification error">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <div class="form-grid">
                    <div class="form-field">
                        <label for="name">Nama</label>
                        <input type="text" id="name" name="name" value="<?php echo e(old('name')); ?>" required placeholder="Nama Anda">
                    </div>
                    <div class="form-field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo e(old('email')); ?>" required placeholder="Email Anda">
                    </div>
                </div>

                <div class="form-field">
                    <label>Rating</label>
                    <div class="star-rating-input">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <input type="radio" id="rating<?php echo e($i); ?>" name="rating" value="<?php echo e($i); ?>" <?php echo e(old('rating') == $i ? 'checked' : ''); ?>>
                            <label for="rating<?php echo e($i); ?>" class="star-btn">★</label>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="form-field">
                    <label for="comment">Ulasan</label>
                    <textarea id="comment" name="comment" rows="5" required placeholder="Tulis pengalaman Anda..."><?php echo e(old('comment')); ?></textarea>
                </div>

                <button type="submit" class="submit-btn">Kirim Ulasan</button>
            </form>
        </div>
    </section>

    <!-- Related Products -->
    <section class="related-products-area">
        <h2 class="section-title">Produk Lainnya</h2>
        <div class="products-row">
            <?php
                $relatedProducts = \App\Models\Product::where('id', '!=', $product->id)
                    ->take(4)
                    ->get();
            ?>
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('product.show', $related->id)); ?>" class="product-mini-card">
                    <div class="mini-image-wrap">
                        <?php
                            $relatedImg = $related->image ? asset($related->image) : 'https://placehold.co/300x300/CD853F/white?text='.urlencode($related->name);
                        ?>
                        <img src="<?php echo e($relatedImg); ?>" alt="<?php echo e($related->name); ?>">
                    </div>
                    <div class="mini-details">
                        <h4><?php echo e($related->name); ?></h4>
                        <span class="mini-price">Rp<?php echo e(number_format($related->price,0,',','.')); ?></span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>
</div>

<script>
    const productPrice = <?php echo e($product->price); ?>;
    const productName = "<?php echo e($product->name); ?>";
    const waNumber = "<?php echo e(env('WHATSAPP_NUMBER','6281234567890')); ?>";

    function updateQty(change) {
        const qtyInput = document.getElementById('quantity');
        let qty = parseInt(qtyInput.value) + change;
        if (qty < 1) qty = 1;
        if (qty > 99) qty = 99;
        qtyInput.value = qty;
        
        const total = qty * productPrice;
        document.getElementById('totalPrice').textContent = total.toLocaleString('id-ID');
        updateWhatsAppLink(qty);
    }

    function updateWhatsAppLink(qty) {
        const total = qty * productPrice;
        const message = `Halo, saya ingin membeli:\n\n*Produk:* ${productName}\n*Jumlah:* ${qty} pcs\n*Harga:* Rp${total.toLocaleString('id-ID')}\n\nMohon konfirmasi ketersediaan. Terima kasih!`;
        
        document.getElementById('waLink').href = `https://wa.me/${waNumber}?text=${encodeURIComponent(message)}`;
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateWhatsAppLink(1);

        const descriptionEl = document.getElementById('productDescriptionText');
        const toggleBtn = document.getElementById('toggleDescriptionBtn');
        if (!descriptionEl || !toggleBtn) return;

        const collapsedClass = 'is-collapsed';
        const expandedClass = 'is-expanded';

        function updateToggleLabel() {
            const expanded = descriptionEl.classList.contains(expandedClass);
            toggleBtn.textContent = expanded ? 'Sembunyikan' : 'Lihat selengkapnya';
            toggleBtn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
        }

        // Hide toggle for short descriptions
        requestAnimationFrame(function () {
            if (descriptionEl.scrollHeight <= descriptionEl.clientHeight + 4) {
                toggleBtn.style.display = 'none';
            }
        });

        toggleBtn.addEventListener('click', function () {
            const isExpanded = descriptionEl.classList.contains(expandedClass);
            if (isExpanded) {
                descriptionEl.classList.remove(expandedClass);
                descriptionEl.classList.add(collapsedClass);
            } else {
                descriptionEl.classList.remove(collapsedClass);
                descriptionEl.classList.add(expandedClass);
            }
            updateToggleLabel();
        });

        updateToggleLabel();
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Downloads\ecoo21-main\ecoo21-main\resources\views/product.blade.php ENDPATH**/ ?>