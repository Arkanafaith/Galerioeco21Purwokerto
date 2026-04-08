<nav class="navbar">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('images/toko/logo_galeri_eco21.png') }}" alt="Galeri Eco 21" class="navbar-logo">
            <img src="{{ asset('images/icon/eco21 teks.png') }}" alt="Eco 21" class="navbar-text-logo">
        </a>
        
        <ul class="navbar-menu">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#testimoni">Testimoni</a></li>
            <li><a href="#kontak">Kontak</a></li>
        </ul>
        
        <a href="{{ route('admin.login') }}" class="btn-login">Log In</a>
    </div>
</nav>
