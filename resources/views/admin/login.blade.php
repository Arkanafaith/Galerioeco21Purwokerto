<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Galeri Eco 21</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        html, body {
            margin:0;
            padding:0;
            height:100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #facc15 0%, #f59e0b 100%);
        }
        .login-page {
            display:flex;
            height:100%;
            align-items:center;
            justify-content:center;
            padding:40px 30px;
            box-sizing:border-box;
        }
        .center-box {
            display:flex;
            width:calc(100% - 60px);
            max-width:860px;
            background:#fff;
            border-radius:30px;
            overflow:hidden;
            margin:40px 30px;
            animation: appear 0.8s ease-out;
        }

        @keyframes appear {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }
        @keyframes shake {
            0%,100% { transform: translateX(0); }
            20%,60% { transform: translateX(-5px); }
            40%,80% { transform: translateX(5px); }
        }
        .image-side {
            flex:1;
            padding:12px;
            background:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .image-side img {
            width:100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            object-position: center;
            border-radius:26px;
            display:block;
        }
        .form-side {
            flex:1;
            padding:40px 30px;
            display:flex;
            align-items:center;
            justify-content:center;
        }
        .form-container {
            width:100%;
            max-width:360px;
            background:#fff;
            /* no extra border radius since parent box handles corners */
        }
        .form-container h1 {
            font-size:24px;
            margin-bottom:24px;
            text-align:center;
            color:#1f2937;
        }
        .form-group {margin-bottom:18px;}
        .form-group label {
            display:block;
            font-size:13px;
            margin-bottom:6px;
            color:#374151;
        }
        .form-group input {
            width:100%;
            padding:10px 12px;
            border:1px solid #d1d5db;
            border-radius:8px;
            font-size:14px;
        }
        .btn-login {
            width:100%;
            padding:12px;
            background:linear-gradient(135deg,#facc15,#f59e0b);
            border:none;
            border-radius:8px;
            color:#333;
            font-weight:600;
            cursor:pointer;
            margin-top:12px;
        }
        .btn-login:hover {opacity:0.95; transform: translateY(-2px); transition: all 0.3s;}
        .btn-back {
            display: inline-block;
            padding: 8px 16px;
            background: #e5e7eb;
            color: #1f2937;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
            margin-bottom: 16px;
        }
        .btn-back:hover {background: #d1d5db;}
        .login-error {background:#fee;border:1px solid #fca5a5;color:#c00;padding:10px;border-radius:6px;margin-bottom:16px;animation: shake 0.3s ease-in-out;}
    </style>
</head>
<body>
    <div class="login-page">
        <div class="center-box">
            <div class="image-side">
                <img src="{{ asset('images/toko/foto_depan_toko.jpg') }}" alt="Foto Depan Toko" />
            </div>
            <div class="form-side">
                <div class="form-container">
                    <a href="{{ url('/') }}" class="btn-back">← Kembali</a>
                    <h1>Login Admin</h1>
                    <form method="POST" action="{{ route('admin.login.post') }}">
                        @csrf
                        @if($errors->any())
                            <div class="login-error">{{ $errors->first() }}</div>
                        @endif
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn-login">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
