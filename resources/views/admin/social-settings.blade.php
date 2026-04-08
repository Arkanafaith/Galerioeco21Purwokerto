@extends('admin.layout')

@section('title', 'Media Sosial')

@section('content')
<div class="simple-header">
    <div>
        <h1>Pengaturan Sosial Media</h1>
        <p class="subtitle">Edit link yang muncul di homepage</p>
    </div>
    <a href="{{ route('admin.dashboard') }}">← Dashboard</a>
</div>

@if (session('success'))
<div class="simple-alert success">
    <span>✅</span> {{ session('success') }}
</div>
@endif

<form action="{{ route('admin.settings.social.update') }}" method="POST" class="simple-form">
    @csrf @method('PUT')

    <div class="link-group">
        <div class="link-row">
            <label>TikTok</label>
            <input type="url" name="social_tiktok_link" placeholder="tiktok.com/@username" 
                   value="{{ old('social_tiktok_link', $tiktok ?? '') }}" />
            @error('social_tiktok_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>WhatsApp</label>
            <input type="url" name="social_whatsapp_link" placeholder="wa.me/628xxxxxx" 
                   value="{{ old('social_whatsapp_link', $whatsapp ?? '') }}" />
            @error('social_whatsapp_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>Tokopedia</label>
            <input type="url" name="social_tokopedia_link" placeholder="tokopedia.com/shopname" 
                   value="{{ old('social_tokopedia_link', $tokopedia ?? '') }}" />
            @error('social_tokopedia_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>Instagram</label>
            <input type="url" name="social_instagram_link" placeholder="instagram.com/username" 
                   value="{{ old('social_instagram_link', $instagram ?? '') }}" />
            @error('social_instagram_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>LinkedIn</label>
            <input type="url" name="social_linkedin_link" placeholder="linkedin.com/company/name" 
                   value="{{ old('social_linkedin_link', $linkedin ?? '') }}" />
            @error('social_linkedin_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>Shopee</label>
            <input type="url" name="social_shopee_link" placeholder="shopee.co.id/shopname" 
                   value="{{ old('social_shopee_link', $shopee ?? '') }}" />
            @error('social_shopee_link')<span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="link-row">
            <label>Google Maps</label>
            <input type="url" name="social_google_maps_link" placeholder="maps.app.goo.gl/xxxxx" 
                   value="{{ old('social_google_maps_link', $googleMaps ?? '') }}" />
            @error('social_google_maps_link')<span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-buttons">
        <button type="submit">Simpan Semua</button>
        <a href="{{ route('admin.dashboard') }}">Batal</a>
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


@endsection

