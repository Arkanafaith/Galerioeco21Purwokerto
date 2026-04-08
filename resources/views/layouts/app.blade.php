<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('description', 'Galeri Eco 21 - Oleh-oleh khas Banyumas asli dan terpercaya dari UMKM lokal. Nikmati getuk goreng, keripik tempe, mendoan, dan oleh-oleh legendaris lainnya.')">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ request()->url() }}">
    <title>@yield('title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas Terpercaya')</title>
    
    <!-- Open Graph -->
    <meta property="og:title" content="@yield('og:title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas')">
    <meta property="og:description" content="@yield('og:description', 'Oleh-oleh khas Banyumas asli dari UMKM lokal terpercaya. Getuk goreng, keripik tempe, mendoan, dan lainnya.')">
    <meta property="og:image" content="{{ asset('images/icon/eco21 teks.png') }}">
    <meta property="og:url" content="{{ request()->url() }}">
    <meta property="og:type" content="website">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter:title', 'Galeri Eco 21 - Oleh-oleh Khas Banyumas')">
    <meta name="twitter:description" content="@yield('twitter:description', 'Oleh-oleh khas Banyumas asli. Getuk, keripik tempe, mendoan dari UMKM lokal.')">
    <meta name="twitter:image" content="{{ asset('images/icon/eco21 teks.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pdp-redesign.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pdp-reviews.css') }}">
</head>
<body>
    @include('partials.navbar')
    
    <main>
        @yield('content')
    </main>
    
    @include('partials.footer')
    
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>