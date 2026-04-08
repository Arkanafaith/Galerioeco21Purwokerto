@extends('admin.layout')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="settings-container">
    <div class="settings-header">
        <h2>⚙️ Pengaturan Akun</h2>
        <p class="breadcrumb">Kelola username dan password admin</p>
    </div>

    <div class="settings-card">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="settings-form">
            @csrf
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="{{ Auth::user()->name }}" required minlength="3" maxlength="50" placeholder="Masukkan username baru">
                <small class="form-hint">Username digunakan untuk login ke halaman admin</small>
            </div>

            <div class="form-group">
                <label for="current_password">Password Saat Ini</label>
                <input type="password" id="current_password" name="current_password" required placeholder="Masukkan password saat ini">
                <small class="form-hint">Masukkan password saat ini untuk verifikasi</small>
            </div>

            <div class="form-group">
                <label for="new_password">Password Baru</label>
                <input type="password" id="new_password" name="new_password" required minlength="4" placeholder="Masukkan password baru">
                <small class="form-hint">Minimal 4 karakter</small>
            </div>

            <div class="form-group">
                <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" required minlength="4" placeholder="Konfirmasi password baru">
            </div>

            @if($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-actions">
                <button type="submit" class="btn-save">
                    💾 Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <div class="settings-info">
        <h3>ℹ️ Informasi</h3>
        <ul>
            <li>Password default adalah: <strong>eco21</strong></li>
            <li>Username default adalah: <strong>admin</strong></li>
            <li>Setelah mengubah pengaturan, Anda akan tetap menggunakan kredensial baru untuk login</li>
        </ul>
    </div>
</div>

<style>
    .settings-container {
        max-width: 700px;
    }

    .settings-header {
        margin-bottom: 28px;
    }

    .settings-header h2 {
        font-size: 28px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 6px;
    }

    .settings-card {
        background: white;
        border-radius: 16px;
        padding: 32px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
        margin-bottom: 24px;
    }

    .settings-form {
        display: flex;
        flex-direction: column;
        gap: 22px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
    }

    .form-group input {
        padding: 14px 18px;
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .form-group input:focus {
        outline: none;
        border-color: #fbbf24;
        background: white;
        box-shadow: 0 0 0 4px rgba(251, 191, 36, 0.15);
    }

    .form-hint {
        font-size: 12px;
        color: #9ca3af;
    }

    .error-message {
        padding: 16px 20px;
        background: #fef2f2;
        border: 2px solid #fecaca;
        border-radius: 12px;
        color: #dc2626;
    }

    .error-message ul {
        margin: 0;
        padding-left: 20px;
    }

    .error-message li {
        margin-bottom: 4px;
    }

    .form-actions {
        margin-top: 10px;
    }

    .btn-save {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 32px;
        background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
        color: #1f2937;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 14px rgba(251, 191, 36, 0.3);
    }

    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(251, 191, 36, 0.4);
    }

    .settings-info {
        background: #f0f9ff;
        border: 2px solid #bae6fd;
        border-radius: 12px;
        padding: 20px 24px;
    }

    .settings-info h3 {
        font-size: 16px;
        font-weight: 600;
        color: #0369a1;
        margin-bottom: 12px;
    }

    .settings-info ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .settings-info li {
        font-size: 14px;
        color: #075985;
        margin-bottom: 8px;
        padding-left: 20px;
        position: relative;
    }

    .settings-info li::before {
        content: '•';
        position: absolute;
        left: 0;
        color: #0ea5e9;
        font-weight: bold;
    }

    .settings-info li:last-child {
        margin-bottom: 0;
    }
</style>
@endsection

