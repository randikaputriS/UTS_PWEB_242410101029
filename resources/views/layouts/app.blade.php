<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Cafe Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: #FAF7F2; }

        .sidebar {
            width: 220px;
            min-height: 100vh;
            background: #2C1A0E;
            position: fixed;
            top: 0; left: 0;
            display: flex;
            flex-direction: column;
        }
        .sidebar .brand {
            padding: 24px 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar .brand h5 {
            font-family: 'Poppins', serif;
            color: #E8D5B7;
            margin: 0;
            font-size: 17px;
        }
        .sidebar .brand small { color: #9C8672; font-size: 11px; }

        .sidebar .nav-link {
            color: rgba(255,255,255,0.5);
            padding: 9px 20px;
            font-size: 13px;
            font-weight: 500;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link:hover { color: #E8D5B7; background: rgba(255,255,255,0.04); }
        .sidebar .nav-link.active {
            color: #E8D5B7;
            background: rgba(196,145,90,0.12);
            border-left: 3px solid #C4915A;
        }
        .sidebar .nav-link i { width: 18px; }
        .sidebar .nav-section {
            padding: 16px 20px 5px;
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #9C8672;
        }

        .main-wrap {
            margin-left: 220px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background: #fff;
            border-bottom: 1px solid #E8D5B7;
            padding: 12px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .topbar span { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: #9C8672; }
        .topbar .user-pill {
            background: #FAF7F2;
            border: 1px solid #E8D5B7;
            border-radius: 99px;
            padding: 5px 14px;
            font-size: 12px;
            color: #6B3F1F;
            font-weight: 500;
        }
        .topbar .user-pill .dot {
            display: inline-block;
            width: 7px; height: 7px;
            background: #6ab04c;
            border-radius: 50%;
            margin-right: 5px;
        }

        .page-content { padding: 28px 32px; flex: 1; }

        .card {
            border: 1.5px solid #E8D5B7;
            border-radius: 12px;
            background: #fff;
        }
        .card-header {
            background: #fff;
            border-bottom: 1px solid #E8D5B7;
            font-weight: 600;
            font-size: 14px;
            border-radius: 12px 12px 0 0 !important;
        }
    </style>
    @yield('isi konten')
</head>
<body>

<x-navbar :username="$username ?? 'Tamu'" />

<div class="main-wrap">
    <div class="topbar">
        <span>@yield('title')</span>
        <div class="user-pill">
            <span class="dot"></span>{{ $username ?? 'Tamu' }}
        </div>
    </div>

    <div class="page-content">
        @yield('content')
    </div>
</div>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>