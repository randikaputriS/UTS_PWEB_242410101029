@extends('layouts.app')

@section('title', 'Dashboard')

@section('isi konten')
<style>
    .hero-box {
        background: linear-gradient(135deg, #2C1A0E, #6B3F1F);
        border-radius: 14px;
        padding: 40px 48px;
        color: #FAF7F2;
        position: relative;
        overflow: hidden;
        margin-bottom: 24px;
    }
    .hero-box::after {
        content: '☕';
        position: absolute;
        right: 40px; top: 50%;
        transform: translateY(-50%);
        font-size: 100px;
        opacity: 0.08;
    }
    .hero-box .label {
        font-size: 11px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: #C4915A;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .hero-box h2 {
        font-family: 'Playfair Display', serif;
        font-size: 34px;
        color: #FAF7F2;
        margin: 0 0 10px;
    }
    .hero-box h2 span { color: #C4915A; }
    .hero-box p { font-size: 14px; color: rgba(250,247,242,0.55); margin: 0; max-width: 460px; }
    .hero-box .aksi { margin-top: 24px; display: flex; gap: 10px; }
    .btn-coklat {
        background: #C4915A;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 9px 20px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }
    .btn-coklat:hover { background: #a87a48; color: #fff; }
    .btn-ghost {
        background: rgba(255,255,255,0.08);
        color: rgba(250,247,242,0.8);
        border: 1px solid rgba(255,255,255,0.15);
        border-radius: 8px;
        padding: 9px 20px;
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
    }
    .btn-ghost:hover { background: rgba(255,255,255,0.14); color: #FAF7F2; }

    .stat-box {
        background: #fff;
        border: 1.5px solid #E8D5B7;
        border-radius: 12px;
        padding: 18px 20px;
        display: flex;
        align-items: center;
        gap: 14px;
    }
    .stat-box .ikon {
        width: 42px; height: 42px;
        background: #FAF7F2;
        border-radius: 10px;
        display: flex; align-items: center; justify-content: center;
        font-size: 20px;
    }
    .stat-box .angka { font-size: 26px; font-weight: 700; color: #2C1A0E; line-height: 1; }
    .stat-box .keterangan { font-size: 12px; color: #9C8672; margin-top: 2px; }
</style>
@endsection

@section('content') {{-- konten utama halaman--}}

@include('partials.page-header', ['pageTitle' => 'Dashboard', 'pageSubtitle' => "Selamat datang kembali di sistem pengelolaan Cafe's Kalcer"])

<div class="hero-box">
    <div class="label">Selamat Datang</div>
    <h2>Halo, <span>{{ $username }}</span>! </h2>
    <p>Kelola menu Cafe's Kalcer dari sini. Cek ketersediaan menu, lihat statistik, dan update data dengan mudah.</p>
    <div class="aksi">
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn-coklat">Lihat Menu</a>
        <a href="{{ route('profile', ['username' => $username]) }}" class="btn-ghost">Profil Saya</a>
    </div>
</div>

<div class="row g-3 mb-4">
    @foreach($stats as $stat) {{-- ngerender array yg di controller --}}
    <div class="col-6 col-lg-3">
        <div class="stat-box">
            <div class="ikon">{{ $stat['icon'] }}</div>
            <div>
                <div class="angka">{{ $stat['value'] }}</div>
                <div class="keterangan">{{ $stat['label'] }}</div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="row g-3">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header py-3 px-4">Aktivitas Terakhir</div>
            <div class="card-body px-4 py-2">
                <div style="display:flex; justify-content:space-between; padding: 12px 0; border-bottom: 1px solid #FAF7F2; font-size:14px;">
                    <span>Menu baru ditambahkan</span>
                    <small style="color:#9C8672;">2 jam lalu</small>
                </div>
                <div style="display:flex; justify-content:space-between; padding: 12px 0; border-bottom: 1px solid #FAF7F2; font-size:14px;">
                    <span>Harga menu diperbarui</span>
                    <small style="color:#9C8672;">5 jam lalu</small>
                </div>
                <div style="display:flex; justify-content:space-between; padding: 12px 0; border-bottom: 1px solid #FAF7F2; font-size:14px;">
                    <span>Menu dinyatakan habis</span>
                    <small style="color:#9C8672;">Kemarin</small>
                </div>
                <div style="display:flex; justify-content:space-between; padding: 12px 0; font-size:14px;">
                    <span>Status menu diperbarui</span>
                    <small style="color:#9C8672;">Kemarin</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card h-100">
            <div class="card-header py-3 px-4">Info Admin</div>
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center py-4">
                <div style="font-size: 52px; margin-bottom: 10px;">👤</div>
                <div style="font-family:'Playfair Display',serif; font-size:18px; font-weight:700; color:#2C1A0E;">{{ $username }}</div>
                <div style="font-size:12px; color:#9C8672; margin-top:4px;">Admin Restoran</div>
                <a href="{{ route('profile', ['username' => $username]) }}" style="margin-top:14px; font-size:13px; color:#C4915A; text-decoration:none; font-weight:500;">
                    Lihat profil →
                </a>
            </div>
        </div>
    </div>
</div>

@endsection