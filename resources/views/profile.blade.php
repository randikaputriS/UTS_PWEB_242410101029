@extends('layouts.app')

@section('title', 'Profile')

@section('tambahan-style')
<style>
    .profile-hero {
        background: linear-gradient(135deg, #2C1A0E, #6B3F1F);
        border-radius: 14px;
        padding: 32px 36px;
        color: #FAF7F2;
        display: flex;
        align-items: center;
        gap: 24px;
        margin-bottom: 20px;
    }
    .profile-hero .foto {
        width: 68px; height: 68px;
        background: rgba(196,145,90,0.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 28px;
        border: 2px solid rgba(196,145,90,0.4);
        flex-shrink: 0;
    }
    .profile-hero h3 {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        color: #FAF7F2;
        margin: 0 0 6px;
    }
    .profile-hero .role {
        background: rgba(196,145,90,0.2);
        border: 1px solid rgba(196,145,90,0.35);
        color: #C4915A;
        border-radius: 99px;
        padding: 3px 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-block;
    }
    .info-baris {
        display: flex;
        padding: 13px 0;
        border-bottom: 1px solid #FAF7F2;
        font-size: 14px;
    }
    .info-baris:last-child { border-bottom: none; }
    .info-baris .label { width: 120px; color: #9C8672; font-size: 13px; flex-shrink: 0; }
    .info-baris .value { font-weight: 500; color: #2C1A0E; }
</style>
@endsection

@section('content')

@include('partials.page-header', ['pageTitle' => 'Profile Saya', 'pageSubtitle' => 'Informasi akun dan hak akses'])

<div class="profile-hero">
    <div class="foto">
    <img src="https://i.pinimg.com/736x/c8/8c/21/c88c21f53b77d2415c93e41354f522ed.jpg" style="width:100%; height:100%; object-fit:cover; border-radius:50%;">
</div>
    <div>
        <h3>{{ $profileData['nama'] }}</h3>
        <span class="role">{{ $profileData['role'] }}</span>
        <div style="margin-top:8px; font-size:12px; color:rgba(250,247,242,0.45);">
            Joined {{ $profileData['joined'] }}
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header py-3 px-4">Informasi Akun</div>
            <div class="card-body px-4 py-2">
                <div class="info-baris">
                    <span class="label">Username</span>
                    <span class="value">{{ $profileData['nama'] }}</span>
                </div>
                <div class="info-baris">
                    <span class="label">Role</span>
                    <span class="value">{{ $profileData['role'] }}</span>
                </div>
                <div class="info-baris">
                    <span class="label">Email</span>
                    <span class="value">{{ $profileData['email'] }}</span>
                </div>
                <div class="info-baris">
                    <span class="label">Telepon</span>
                    <span class="value">{{ $profileData['telepon'] }}</span>
                </div>
                <div class="info-baris">
                    <span class="label">Alamat</span>
                    <span class="value">{{ $profileData['alamat'] }}</span>
                </div>
                <div class="info-baris">
                    <span class="label">Joined</span>
                    <span class="value">{{ $profileData['joined'] }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header py-3 px-4">Hak Akses</div>
            <div class="card-body px-4 py-3">
                <div style="display:flex; flex-wrap:wrap; gap:8px;">
                    <span style="background:#FAF7F2; border:1px solid #E8D5B7; color:#6B3F1F; border-radius:8px; padding:5px 12px; font-size:12px;">Lihat Menu</span>
                    <span style="background:#FAF7F2; border:1px solid #E8D5B7; color:#6B3F1F; border-radius:8px; padding:5px 12px; font-size:12px;">Tambah Menu</span>
                    <span style="background:#FAF7F2; border:1px solid #E8D5B7; color:#6B3F1F; border-radius:8px; padding:5px 12px; font-size:12px;">Edit Menu</span>
                    <span style="background:#FAF7F2; border:1px solid #E8D5B7; color:#6B3F1F; border-radius:8px; padding:5px 12px; font-size:12px;">Hapus Menu</span>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-body px-4 py-3 text-center">
                <a href="{{ route('dashboard', ['username' => $profileData['nama']]) }}"
                   style="background:#2C1A0E; color:#E8D5B7; border-radius:8px; padding:9px 22px; font-size:13px; font-weight:600; text-decoration:none; display:inline-block;">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

@endsection