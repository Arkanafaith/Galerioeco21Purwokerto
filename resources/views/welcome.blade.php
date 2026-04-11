@extends('layouts.app')

@php
use App\Helpers\ContentHelper;
$products = \App\Models\Product::all();
@endphp

@section('title', 'Beranda')

@section('content')

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>{!! nl2br(ContentHelper::get('hero_title', 'Oleh-oleh <span class="highlight">Khas Banyumas</span> Asli!')) !!}</h1>
            <p>{{ ContentHelper::get('hero_subtitle', 'Nikmati kelezatan khas Banyumas, langsung dari UMKM lokal kepercayaan Anda') }}</p>
            
            <a href="#produk" class="btn-primary">
                {{ ContentHelper::get('hero_cta_label', 'Order Sekarang') }}
                <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
            
            <div class="hero-stats">
                <div class="hero-avatars">
            <img src="{{ asset('images/icon/woman1_thumb.jpg') }}" alt="Pelanggan puas 1" width="36" height="36" loading="lazy" decoding="async">
            <img src="{{ asset('images/icon/woman2_thumb.jpg') }}" alt="Pelanggan puas 2" width="36" height="36" loading="lazy" decoding="async">
            <img src="{{ asset('images/icon/men_thumb.jpg') }}" alt="Pelanggan puas 3" width="36" height="36" loading="lazy" decoding="async">
        </div>
                <span>{{ ContentHelper::get('hero_stock_text', '10k+ Pelanggan Mempercayai') }}</span>
            </div>
        </div>
        
        <div class="hero-image">
            <div class="image-card hero-card">
                <img src="{{ ContentHelper::getImage('hero_image', asset('images/toko/foto_depan_toko.jpg')) }}" alt="Toko Galeri Eco 21">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-card">
                <div class="label">{{ ContentHelper::get('stats_card1_label', 'Berdiri') }}</div>
                <div class="value">{{ ContentHelper::get('stats_year', '2021') }}</div>
                <div class="unit">{{ ContentHelper::get('stats_card1_unit', 'Tahun') }}</div>
            </div>
            
            <div class="stat-card">
                <div class="label">{{ ContentHelper::get('stats_card2_label', 'Total Pelanggan') }}</div>
                <div class="value">{{ ContentHelper::get('stats_customers', '100k+') }}</div>
                <div class="unit">{{ ContentHelper::get('stats_card2_unit', 'Produk') }}</div>
            </div>
            
            <div class="stat-card">
                <div class="label">{{ ContentHelper::get('stats_card3_label', 'Produksi') }}</div>
                <div class="value">{{ ContentHelper::get('stats_card3_value', 'Harian') }}</div>
                <div class="unit">{{ ContentHelper::get('stats_card3_unit', 'Oleh-oleh') }}</div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about" id="tentang">
    <div class="container">
        <div class="about-content">
            <h2>{{ ContentHelper::get('about_title', 'Tentang') }} <span class="highlight">{{ ContentHelper::get('about_title_highlight', 'Kami') }}</span></h2>
            <p class="subtitle">{{ ContentHelper::get('about_subtitle', 'Selamat Datang di Galeri Eco 21') }}</p>
            
            <p>{{ ContentHelper::get('about_description', 'Galeri Eco21 adalah pusat oleh-oleh khas Purwokerto/Banyumas yang berlokasi di Jl. Mayjend Sutoyo No.27, Sokanegara. Tempat ini menyediakan berbagai jenis makanan khas, seperti getuk, gethuk goreng, mendoan, carang-carang, makanan khas, dan mendoan, menjadikannya destinasi belanja lengkap dan modern bagi wisatawan.') }}</p>
            
            <div class="features">
                <div class="feature-card">
                    <div class="feature-icon green">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3>{{ ContentHelper::get('about_feature_1_title', 'Dikurasi Dengan Hati') }}</h3>
                        <p>{{ ContentHelper::get('about_feature_1_desc', 'Hanya produk dengan standar rasa dan kebersihan terbaik yang masuk ke rak kami.') }}</p>
                    </div>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon yellow">
                        <svg width="24" height="24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3>{{ ContentHelper::get('about_feature_2_title', 'Pemberdayaan Lokal') }}</h3>
                        <p>{{ ContentHelper::get('about_feature_2_desc', 'Mendukung ekonomi warga dengan reseller langsung dari produsen pertama.') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
            <div class="about-images">
            <div class="image-card">
                <img src="{{ ContentHelper::getImage('about_image_1', asset('images/toko/foto1.jpg')) }}" alt="Produk 1">
            </div>
            <div class="image-card second">
                <img src="{{ ContentHelper::getImage('about_image_2', asset('images/toko/foto2.jpg')) }}" alt="Produk 2">
            </div>
        </div>
    </div>
</section>


<!-- Products Showcase Section -->
<section class="products-showcase">
    <div class="container showcase-container">
        <div class="showcase-image">
            <div class="image-card">
                <img src="{{ ContentHelper::getImage('showcase_image', asset('images/toko/foto4.jpg')) }}" alt="Galeri Eco 21">
            </div>
        </div>
        
        <div class="showcase-content">
            <h2 class="showcase-title">{{ ContentHelper::get('showcase_title_part1', 'Temukan') }} <span class="highlight-yellow">{{ ContentHelper::get('showcase_title_highlight', 'Keunggulan') }}</span><br>{{ ContentHelper::get('showcase_title_part2', 'Produk Kami') }}</h2>
            
            <div class="accordion-container">
                <div class="accordion-item">
                    <div class="accordion-header active">
                        <div class="accordion-title">{{ ContentHelper::get('advantage_1_title', 'Buatan Lokal!') }}</div>
                        <button class="accordion-toggle open">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="accordion-body open">
                        <p>{{ ContentHelper::get('advantage_1_desc', 'Diproduksi oleh UMKM lokal Banyumas dengan bahan berkualitas dan cita rasa autentik yang terpercaya.') }}</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="accordion-title">{{ ContentHelper::get('advantage_2_title', 'Harga Terjangkau') }}</div>
                        <button class="accordion-toggle">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="accordion-body">
                        <p>{{ ContentHelper::get('advantage_2_desc', 'Harga bersahabat untuk semua kalangan dengan kualitas terjamin.') }}</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="accordion-title">{{ ContentHelper::get('advantage_3_title', 'Lengkap & Terpercaya') }}</div>
                        <button class="accordion-toggle">
                            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v14m7-7H5"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="accordion-body">
                        <p>{{ ContentHelper::get('advantage_3_desc', 'Koleksi produk terlengkap dan telah dipercaya oleh ribuan pelanggan.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Best Products Section -->
<section class="best-products" id="produk">
    <div class="container">
        <span class="section-badge">The Best Product</span>
        <h2 class="section-title">3 Produk<br>Terbaik Kami</h2>
        
        <div class="products-grid">
            @foreach($topProducts as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card">
                    <div class="image-card product-card-image">
                        @if($product->image)
                            <img src="/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                        @else
                            <img src="https://placehold.co/400x300/CD853F/white?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="product-image">
                        @endif
                    </div>
                    <div class="product-info">
                        <div class="product-category">Makanan Tradisional</div>
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="product-rating">
                            <span class="stars">★★★★★</span>
                        </div>
                        <div class="product-price">Rp{{ number_format($product->price,0,',','.') }}</div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- All Products Section -->
<section class="all-products">
    <div class="container">
        <span class="section-badge">PRODUCTS</span>
        <h2 class="section-title">Buah tangan khas Banyumas</h2>
        
        <div class="products-grid-4" id="allProductsGrid">
            @forelse($products as $product)
                <a href="{{ route('product.show', $product->id) }}" class="product-card-small all-product-item">
                    @if($product->image)
                        <img src="/{{ $product->image }}" alt="{{ $product->name }}" class="product-image">
                    @else
                        <img src="https://placehold.co/300x250/FFD700/333?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="product-image">
                    @endif
                    <div class="product-info">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="product-rating">
                            <span class="stars">★★★★★</span>
                        </div>
                        <div class="product-price">Rp{{ number_format($product->price,0,',','.') }}</div>
                    </div>
                </a>
            @empty
                <div>Tidak ada produk tersedia.</div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="pagination" id="allProductsPagination" aria-label="Pagination Produk"></div>
    </div>
</section>

<script>
(function () {
    function initAllProductsPagination() {
        var grid = document.getElementById('allProductsGrid');
        var pager = document.getElementById('allProductsPagination');
        if (!grid || !pager) return;

        var items = Array.prototype.slice.call(grid.querySelectorAll('.all-product-item'));
        if (!items.length) {
            pager.style.display = 'none';
            return;
        }

        function getColumns() {
            try {
                var cols = getComputedStyle(grid).gridTemplateColumns;
                if (!cols || cols === 'none') return 4;
                return cols.split(' ').filter(Boolean).length || 4;
            } catch (e) {
                return 4;
            }
        }

        var currentPage = 1;
        var columns = getColumns();
        var perPage = Math.max(1, columns * 2); // 2 rows
        var totalPages = Math.max(1, Math.ceil(items.length / perPage));

        function clampPage(p) {
            return Math.min(totalPages, Math.max(1, p));
        }

        function showPage(page) {
            currentPage = clampPage(page);
            var start = (currentPage - 1) * perPage;
            var end = start + perPage;

            items.forEach(function (el, idx) {
                el.style.display = (idx >= start && idx < end) ? '' : 'none';
            });

            renderPager();
        }

        function createLink(label, onClick, isDisabled) {
            var a = document.createElement('a');
            a.href = '#';
            a.textContent = label;
            if (isDisabled) {
                a.style.pointerEvents = 'none';
                a.style.opacity = '0.5';
            } else {
                a.addEventListener('click', function (e) {
                    e.preventDefault();
                    onClick();
                });
            }
            return a;
        }

        function createActive(label) {
            var s = document.createElement('span');
            s.className = 'active';
            s.textContent = label;
            return s;
        }

        function renderPager() {
            totalPages = Math.max(1, Math.ceil(items.length / perPage));
            currentPage = clampPage(currentPage);

            pager.innerHTML = '';

            if (totalPages <= 1) {
                pager.style.display = 'none';
                return;
            }
            pager.style.display = '';

            pager.appendChild(createLink('←', function () { showPage(currentPage - 1); }, currentPage === 1));

            // windowed page numbers (max 5)
            var maxButtons = 5;
            var half = Math.floor(maxButtons / 2);
            var start = Math.max(1, currentPage - half);
            var end = Math.min(totalPages, start + maxButtons - 1);
            start = Math.max(1, end - maxButtons + 1);

            if (start > 1) {
                pager.appendChild(createLink('1', function () { showPage(1); }, false));
                if (start > 2) {
                    var dots = document.createElement('span');
                    dots.textContent = '…';
                    pager.appendChild(dots);
                }
            }

            for (var p = start; p <= end; p++) {
                if (p === currentPage) pager.appendChild(createActive(String(p)));
                else pager.appendChild(createLink(String(p), (function (pp) { return function () { showPage(pp); }; })(p), false));
            }

            if (end < totalPages) {
                if (end < totalPages - 1) {
                    var dots2 = document.createElement('span');
                    dots2.textContent = '…';
                    pager.appendChild(dots2);
                }
                pager.appendChild(createLink(String(totalPages), function () { showPage(totalPages); }, false));
            }

            pager.appendChild(createLink('→', function () { showPage(currentPage + 1); }, currentPage === totalPages));
        }

        function recalc() {
            columns = getColumns();
            perPage = Math.max(1, columns * 2);
            totalPages = Math.max(1, Math.ceil(items.length / perPage));
            showPage(currentPage);
        }

        // init
        showPage(1);
        window.addEventListener('resize', function () {
            // debounce resize a bit
            clearTimeout(recalc._t);
            recalc._t = setTimeout(recalc, 150);
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initAllProductsPagination);
    } else {
        initAllProductsPagination();
    }
})();
</script>

<!-- Testimonial Section -->
<section class="testimonial-section" id="testimoni">
    <div class="container">
        <div class="testimonial-grid">
            <!-- Form Ulasan -->
            <div class="testimonial-form-card">
                <h2>Tulis Ulasan Kamu</h2>
                <p>Pendapatmu sangat berarti bagi kami.</p>
                
                <form action="#" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="form-group">
                            <label>Ulasan</label>
                            <textarea name="review" placeholder="Masukkan Ulasan Anda" required></textarea>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label>(Opsional) Produk yang dibeli</label>
                            <select name="product" style="width: 100%; padding: 12px 16px; border: 2px solid #e5e7eb; border-radius: 12px; font-size: 14px; font-family: inherit; background: white;">
                                <option value="">-- Pilih Produk --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->name }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Penilaian Anda</label>
                            <div class="star-rating">
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                                <span>★</span>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn-submit">Kirim Ulasan</button>
                </form>
            </div>
            
            <!-- Image Display -->
            <div class="testimonial-image">
                <img src="{{ asset('images/toko/foto6.png') }}" alt="Display Produk">
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="kontak">
    <div class="container">
        <div class="cta-overlay">
            <h2>Cari oleh-oleh yang berkesan?</h2>
            <p>Kami punya pilihan istimewa untuk dibawa pulang.</p>
            
            <div class="cta-buttons">
                <a href="https://wa.me/628112648830?text=Halo%20Galeri%20Eco%2021" target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
                    <img class="btn-icon" src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp">
                    WhatsApp
                </a>
                <a href="{{ ContentHelper::get('social_shopee_link', 'https://shopee.co.id') }}" target="_blank" rel="noopener noreferrer" class="btn-shopee">
                    <svg class="btn-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 6h-2c0-2.21-1.79-4-4-4s-4 1.79-4 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-8 0c0-1.1.9-2 2-2s2 .9 2 2h-4zm6 14H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h8v12z"/></svg>
                    Shopee
                </a>
                <a href="https://www.tokopedia.com/tokoeco21" target="_blank" rel="noopener noreferrer" class="btn-tokopedia">
                    <img class="btn-icon" src="{{ asset('images/icon/tokopedia.png') }}" alt="Tokopedia">
                    Tokopedia
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Social Follow Section -->
<section class="social-follow-section" id="follow">
    <div class="container">
        <div class="follow-content">
            <div class="follow-text">
                <h2>{!! nl2br(e(ContentHelper::get('follow_section_heading', 'Ikuti Eco 21 dan dapatkan update produk terbaru.'))) !!}</h2>
                <div class="follow-icons">
                    <a href="{{ ContentHelper::get('social_tiktok_link', 'https://www.tiktok.com') }}" target="_blank" class="follow-icon follow-icon-tiktok" title="TikTok">
                        <img src="{{ asset('images/icon/tiktok.png') }}" alt="TikTok">
                    </a>
                    <a href="{{ ContentHelper::get('social_whatsapp_link', 'https://wa.me/6281234567890') }}" target="_blank" class="follow-icon follow-icon-whatsapp" title="WhatsApp">
                        <img src="{{ asset('images/icon/whatsapp.png') }}" alt="WhatsApp">
                    </a>
                    <a href="{{ ContentHelper::get('social_tokopedia_link', 'https://www.tokopedia.com') }}" target="_blank" class="follow-icon follow-icon-tokopedia" title="Tokopedia">
                        <img src="{{ asset('images/icon/tokopedia.png') }}" alt="Tokopedia">
                    </a>
                    <a href="{{ ContentHelper::get('social_instagram_link', 'https://www.instagram.com') }}" target="_blank" class="follow-icon follow-icon-instagram" title="Instagram">
                        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.015-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1 1 12.324 0 6.162 6.162 0 0 1-12.324 0zM12 16a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm4.965-10.322a1.44 1.44 0 1 1 2.881.001 1.44 1.44 0 0 1-2.881-.001z"/></svg>
                    </a>
                    <a href="{{ ContentHelper::get('social_linkedin_link', 'https://www.linkedin.com') }}" target="_blank" class="follow-icon follow-icon-linkedin" title="LinkedIn">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                    </a>
                    <a href="{{ ContentHelper::get('social_shopee_link', 'https://shopee.co.id') }}" target="_blank" class="follow-icon follow-icon-shopee" title="Shopee">
                        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 6h-2c0-2.21-1.79-4-4-4s-4 1.79-4 4H6c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-8 0c0-1.1.9-2 2-2s2 .9 2 2h-4zm6 14H6V8h2v2c0 .55.45 1 1 1s1-.45 1-1V8h8v12z"/></svg>
                    </a>
                </div>
            </div>
            <div class="follow-image">
                <div class="image-card follow-card">
                    <img src="{{ ContentHelper::getImage('social_follow_image', asset('images/toko/foto_depan_toko.jpg')) }}" alt="Foto Depan Toko Galeri Eco 21">
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

<!-- AI Chatbot -->
<div class="ai-chatbot-toggle" onclick="toggleChatbot()">
    <svg viewBox="0 0 24 24">
        <path d="M9 2a1 1 0 0 0 0 2h.2a3.8 3.8 0 0 0-2.9 3.7V8H6a4 4 0 0 0-4 4v5a4 4 0 0 0 4 4h12a4 4 0 0 0 4-4v-5a4 4 0 0 0-4-4h-.3v-.3A3.8 3.8 0 0 0 14.8 4H15a1 1 0 1 0 0-2H9Zm1 4h4a1.8 1.8 0 0 1 1.8 1.7V8H8.2v-.3A1.8 1.8 0 0 1 10 6Zm-4 4h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2Zm3 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Zm6 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3Z"/>
    </svg>
</div>

<div class="ai-chatbot-container" id="chatbotContainer">
    <div class="chatbot-header">
        <div class="chatbot-avatar">🤖</div>
        <div class="chatbot-title">
            <h3>Asisten Galeri Eco 21</h3>
            <p>Pusat Oleh-oleh Khas Banyumas</p>
        </div>
        <button class="chatbot-close" onclick="toggleChatbot()">✕</button>
    </div>
    <div class="chatbot-messages" id="chatbotMessages">
    </div>
</div>

<script>
function toggleChatbot() {
    var container = document.getElementById('chatbotContainer');
    var messagesDiv = document.getElementById('chatbotMessages');
    container.classList.toggle('active');
    if (container.classList.contains('active')) {
        if (messagesDiv.innerHTML.trim() === '') {
            messagesDiv.innerHTML = getInitialGreeting();
        }
    }
}

function getInitialGreeting() {
    return '<div class="message bot">' +
        '<div class="message-avatar">🤖</div>' +
        '<div class="message-content">' +
        '<strong>Halo! 👋</strong>' +
        '<p>Selamat datang di <strong>Galeri Eco 21</strong>! Saya asisten virtual yang siap membantu Anda.</p>' +
        '<p>Silakan pilih topik di bawah ini:</p>' +
        '<div class="quick-replies">' +
        '<button class="quick-reply" onclick="sendQuickReply(\'produk\')">📦 Produk Kami</button>' +
        '<button class="quick-reply" onclick="sendQuickReply(\'banyumas\')">🏘️ Khas Banyumas</button>' +
        '<button class="quick-reply" onclick="sendQuickReply(\'pemesanan\')">🛒 Cara Pesan</button>' +
        '<button class="quick-reply" onclick="sendQuickReply(\'lokasi\')">📍 Lokasi Toko</button>' +
        '<button class="quick-reply" onclick="sendQuickReply(\'bestseller\')" >⭐ Produk Terlaris</button>' +
        '<button class="quick-reply" onclick="sendQuickReply(\'kontak\')">📞 Hubungi Kami</button>' +
        '</div></div></div>';
}

function sendQuickReply(type) {
    var userMessageText = '';
    switch(type) {
        case 'produk': userMessageText = 'Apa saja produk yang tersedia?'; break;
        case 'banyumas': userMessageText = 'Apa saja produk khas Banyumas?'; break;
        case 'pemesanan': userMessageText = 'Bagaimana cara memesan?'; break;
        case 'lokasi': userMessageText = 'Di mana lokasi tokonya?'; break;
        case 'bestseller': userMessageText = 'Produk apa yang paling laris?'; break;
        case 'kontak': userMessageText = 'Bagaimana cara menghubungi?'; break;
    }
    addMessage(userMessageText, 'user');
    setTimeout(function() { getBotResponse(type); }, 500);
}

function addMessage(text, sender) {
    var messagesDiv = document.getElementById('chatbotMessages');
    var messageDiv = document.createElement('div');
    messageDiv.className = 'message ' + sender;
    var avatar = sender === 'bot' ? '🤖' : '👤';
    messageDiv.innerHTML = '<div class="message-avatar">' + avatar + '</div><div class="message-content">' + text + '</div>';
    messagesDiv.appendChild(messageDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

function showGreetingWithDelay() {
    setTimeout(function() {
        var messagesDiv = document.getElementById('chatbotMessages');
        // Append the quick replies below the answer instead of replacing
        var quickRepliesHTML = '<div class="quick-replies" style="margin-top: 15px;">' +
            '<p style="margin-bottom:10px;font-size:13px;color:#666;">Pilih topik lain:</p>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'produk\')">📦 Produk Kami</button>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'banyumas\')">🏘️ Khas Banyumas</button>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'pemesanan\')">🛒 Cara Pesan</button>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'lokasi\')">📍 Lokasi Toko</button>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'bestseller\')">⭐ Produk Terlaris</button>' +
            '<button class="quick-reply" onclick="sendQuickReply(\'kontak\')">📞 Hubungi Kami</button>' +
            '</div>';
        
        // Append to the last bot message instead of replacing
        var lastBotMessage = messagesDiv.lastElementChild;
        if (lastBotMessage && lastBotMessage.classList.contains('bot')) {
            lastBotMessage.innerHTML += quickRepliesHTML;
        }
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    }, 1500);
}

function getBotResponse(type) {
    var response = '';
    switch(type) {
        case 'produk':
            response = '<strong>Produk Kami 🛍️</strong><p>Galeri Eco 21 menyediakan berbagai oleh-oleh khas Banyumas:</p><ul><li><strong>Getuk Goreng</strong> - Singkong gurih nan legit</li><li><strong>Keripik Tempe</strong> - Tempe tipis renyah</li><li><strong>Mendoan</strong> - Tempe bacem goreng khas</li><li><strong>Klanting</strong> - Singkong mini kenyal</li><li><strong>Sale</strong> - Pisang kering</li><li><strong>Nopia</strong> - Kue tradisional</li><li><strong>Keripik Dage</strong> - Singkong fermentasi renyah</li><li><strong>Getuk</strong> - Singkong rebus dengan topping</li></ul><p>Klik tombol di bawah untuk info lebih lanjut! 😊</p>';
            break;
        case 'banyumas':
            response = '<strong>Produk Khas Banyumas 🏘️</strong><p>Kami menyajikan produk autentik dari Banyumas:</p><ul><li><strong>Getuk & Getuk Goreng</strong> - Singkong legit</li><li><strong>Keripik Dage</strong> - Singkong fermented</li><li><strong>Mendoan</strong> - Tempe bacem Banyumas</li><li><strong>Sale</strong> - Pisang kering Madura</li><li><strong>Nopia</strong> - Kue tradisional</li><li><strong>Carang-carang</strong> - Singkong santan</li></ul><p>Semua dari <strong>UMKM lokal terpercaya</strong>! ✅</p>';
            break;
        case 'pemesanan':
            response = '<strong>Cara Memesan 🛒</strong><p>Anda bisa membeli dengan mudah:</p><ol><li>Pilih produk yang diinginkan</li><li>Klik tombol "Beli via WhatsApp"</li><li>Chat kami dengan jumlah pesanan</li><li>Kami akan konfirmasi pesanan Anda</li><li>Lakukan pembayaran</li><li>Pesanan akan kami proses</li></ol><p>Atau bisa juga beli via <strong>Tokopedia</strong>! 🏪</p>';
            break;
        case 'lokasi':
            response = '<strong>Lokasi Toko 📍</strong><p><strong>Galeri Eco 21</strong></p><p>Jl. Mayjend Sutoyo No.27, Sokanegara</p><p>PURWOKERTO - BANYUMAS</p><p>JAWA TENGAH</p><hr><ul style="list-style: none; padding: 0;"><li>📍 Dekat dengan pusat kota Purwokerto</li><li>🕐 JAM BUKA: 08.00 - 21.00 WIB</li><li>📞 Hubungi: 0812-3456-7890</li></ul>';
            break;
        case 'bestseller':
            response = '<strong>Produk Best Seller ⭐</strong><p>Produk favorit pelanggan kami:</p><ol><li>🥇 <strong>Getuk Goreng</strong> - Paling laris!</li><li>🥈 <strong>Keripik Tempe</strong> - Renyah dan gurih</li><li>🥉 <strong>Mendoan</strong> - Khas Banyumas</li><li>🏅 <strong>Klanting</strong> - Kenyal legit</li><li>🏅 <strong>Sale</strong> - Manis renyah</li></ol><p>Silakan dicoba! 😊</p>';
            break;
        case 'kontak':
            response = '<strong>Kontak Kami 📱</strong><p>Hubungi kami melalui:</p><ul><li>📱 <strong>WhatsApp:</strong> 0812-3456-7890</li><li>📸 <strong>Instagram:</strong> @galerieco21</li><li>📘 <strong>Facebook:</strong> Galeri Eco 21</li><li>🏪 <strong>Tokopedia:</strong> Galeri Eco 21</li></ul><p>Kami siap melayani Anda! 😊</p>';
            break;
        default:
            response = '<strong>Mohon Maaf 😔</strong><p>Saya tidak memahami pertanyaan Anda.</p><p>Silakan pilih topik di bawah ini:</p>';
    }
    addMessage(response, 'bot');
    showGreetingWithDelay();
}
</script>
