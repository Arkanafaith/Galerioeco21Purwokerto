@php
use App\Helpers\ContentHelper;
$googleMapsLink = ContentHelper::get('social_google_maps_link', 'https://maps.app.goo.gl/oCyAwKJt9XZQbJaHA');
@endphp

<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <h3>Butuh Bantuan? Kami Siap Membantu.</h3>
                <p style="margin-bottom: 15px;">Hubungi kami untuk mendapatkan informasi lengkap tentang produk kami.</p>
                <ul class="contact-list">
                    <li><span>📞</span> +62 811-2648-830</li>
                    <li><span>✉️</span> galerieco21purwokerto@gmail.com</li>
                    <li><span>📍</span> Jl. Mayjend. Sutoyo No.27, Sawangan, Kab. Banyumas</li>
                </ul>
            </div>
            
            <div>
                <h3>Pages</h3>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="#tentang">Tentang Kami</a></li>
                    <li><a href="#keunggulan">Keunggulan Kami</a></li>
                </ul>
            </div>
            
            <div>
                <h3>Produk</h3>
                <ul>
                    <li><a href="#produk">Top 3 Produk</a></li>
                    <li><a href="#produk">Produk</a></li>
                    <li><a href="#testimoni">Testimoni</a></li>
                </ul>
            </div>
            
            <div>
                <h3>Maps</h3>
                <div class="footer-map">
                    <a href="{{ $googleMapsLink }}" target="_blank" rel="noopener noreferrer" style="display: block; position: relative;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.759663315466!2d109.22896!3d-7.413877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6552d4e8c8e8e1%3A0x8e8e8e8e8e8e8e8e!2sGaleri%20Eco%2021!5e0!3m2!1sen!2sid!4v1629000000000" width="100%" height="150" style="border:0; border-radius: 8px; pointer-events: none;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            © 2026 Galeri Eco 21. All rights reserved.
        </div>
    </div>
</footer>