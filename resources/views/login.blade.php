<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Cafe Kalcer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body {
            background: #2C1A0E;
            min-height: 100vh;
            display: flex;
        }
        .kiri {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
        }
        .kiri h1 {
            font-family: 'Poppins', serif;
            color: #E8D5B7;
            font-size: 42px;
            line-height: 1.2;
        }
        .kiri h1 span { color: #C4915A; }
        .kiri p { color: rgba(250,247,242,0.45); font-size: 14px; margin-top: 12px; max-width: 340px; }

        .kanan {
            width: 420px;
            background: #FAF7F2;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
        }
        .form-box { width: 100%; }
        .form-box h2 {
            font-family: 'Playfair Display', serif;
            color: #2C1A0E;
            font-size: 26px;
            margin-bottom: 6px;
        }
        .form-box p { color: #9C8672; font-size: 13px; margin-bottom: 28px; }
        .form-label { font-size: 13px; font-weight: 500; color: #6B3F1F; }
        .form-control {
            border: 1.5px solid #E8D5B7;
            border-radius: 8px;
            font-size: 14px;
            padding: 10px 12px;
        }
        .form-control:focus {
            border-color: #C4915A;
            box-shadow: 0 0 0 3px rgba(196,145,90,0.15);
        }
        .btn-login {
            background: #2C1A0E;
            color: #E8D5B7;
            border: none;
            border-radius: 8px;
            padding: 11px;
            font-size: 14px;
            font-weight: 600;
            width: 100%;
        }
        .btn-login:hover { background: #6B3F1F; color: #E8D5B7; }
        .info-box {
            margin-top: 16px;
            background: #fff;
            border: 1px solid #E8D5B7;
            border-radius: 8px;
            padding: 10px 14px;
            font-size: 12px;
            color: #9C8672;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="kiri">
        <div style="font-size: 60px; margin-bottom: 20px;"></div>
        <h1>Selamat Datang<br>di <span>Cafe's Kalcer</span></h1>
        <p>Sistem pengelolaan menu restoran.</p>
    </div>

    <div class="kanan">
        <div class="form-box">
            <h2>Login</h2>
            <p>Masukkan Username dan Password</p>

            @if(session('error'))
            <div style="background: #fdf0f0; border: 1px solid #f5c6c6; border-radius: 8px; padding: 10px 14px; font-size: 13px; color: #a94442; margin-bottom: 16px;">
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="contoh: budi123" value="{{ old('username') }}">
                </div>
                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••">
                </div>
                <button type="submit" class="btn-login">Login →</button>
            </form>

            <div class="info-box">Gunakan username dan password apapun untuk masuk</div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>