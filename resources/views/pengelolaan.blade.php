@extends('layouts.app')

@section('title', 'Pengelolaan Menu')

@section('isi konten')
<style>
    .filter-bar { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:20px; align-items:center; }
    .filter-btn {
        background: #fff;
        border: 1.5px solid #E8D5B7;
        color: #6B3F1F;
        border-radius: 99px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.15s;
    }
    .filter-btn:hover, .filter-btn.active {
        background: #2C1A0E;
        border-color: #2C1A0E;
        color: #E8D5B7;
    }

    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
        gap: 14px;
    }
    .menu-card {
        background: #fff;
        border: 1.5px solid #E8D5B7;
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.18s, box-shadow 0.18s;
    }
    .menu-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(44,26,14,0.1);
    }
    .menu-card .gambar-wrap {
        height: 145px;
        overflow: hidden;
        background: #FAF7F2;
        position: relative;
    }
    .menu-card .gambar-wrap img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }
    .menu-card:hover .gambar-wrap img { transform: scale(1.05); }
    .menu-card .gambar-wrap .overlay-habis {
        position: absolute; inset: 0;
        background: rgba(44,26,14,0.5);
        display: flex; align-items: center; justify-content: center;
    }
    .menu-card .gambar-wrap .overlay-habis span {
        background: #d9534f;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.08em;
        padding: 4px 12px;
        border-radius: 99px;
    }
    .menu-card .isi { padding: 12px 14px; }
    .menu-card .isi .kategori {
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: #C4915A;
        font-weight: 600;
        margin-bottom: 4px;
    }
    .menu-card .isi .nama {
        font-size: 14px;
        font-weight: 600;
        color: #2C1A0E;
        margin-bottom: 8px;
    }
    .menu-card .isi .bawah {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #FAF7F2;
        padding-top: 8px;
    }
    .menu-card .isi .harga { font-size: 13px; font-weight: 700; color: #2C1A0E; }
    .badge-tersedia { background: #edf7ed; color: #2d6a2d; border-radius: 99px; padding: 3px 10px; font-size: 11px; font-weight: 600; }
    .badge-habis { background: #fdf0f0; color: #a94442; border-radius: 99px; padding: 3px 10px; font-size: 11px; font-weight: 600; }
</style>
@endsection

@section('content')

@include('partials.page-header', ['pageTitle' => 'Pengelolaan Menu', 'pageSubtitle' => "Daftar semua menu yang tersedia di Cafe's Kalcer"])

<div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:16px;">
    <div style="background:#fff; border:1px solid #E8D5B7; border-radius:10px; padding:10px 16px; font-size:13px; color:#6B3F1F; font-weight:500;">
        Total <strong>{{ count($menuList) }}</strong> menu
    </div>
    <div style="background:#edf7ed; border:1px solid #c3e6c3; border-radius:10px; padding:10px 16px; font-size:13px; color:#2d6a2d; font-weight:500;">
        <strong>{{ collect($menuList)->where('status','Tersedia')->count() }}</strong> tersedia
    </div>
    <div style="background:#fdf0f0; border:1px solid #f5c6c6; border-radius:10px; padding:10px 16px; font-size:13px; color:#a94442; font-weight:500;">
        <strong>{{ collect($menuList)->where('status','Habis')->count() }}</strong> habis
    </div>
</div>

<div class="filter-bar">
    <span style="font-size:12px; color:#9C8672;">Filter:</span>
    <button class="filter-btn active" onclick="filterMenu('semua', this)">Semua</button>
    <button class="filter-btn" onclick="filterMenu('Makanan Berat', this)">Makanan Berat</button>
    <button class="filter-btn" onclick="filterMenu('Makanan Ringan', this)">Makanan Ringan</button>
    <button class="filter-btn" onclick="filterMenu('Minuman', this)">Minuman</button>
    <button class="filter-btn" onclick="filterMenu('Snack', this)">Snack</button>
    <button class="filter-btn" onclick="filterMenu('Dessert', this)">Dessert</button>
</div>

<div class="menu-grid" id="menuGrid">
    @foreach($menuList as $menu)
    <div class="menu-card" data-kategori="{{ $menu['kategori'] }}">
        <div class="gambar-wrap">
            <img src="{{ $menu['gambar'] }}" alt="{{ $menu['nama'] }}"
                 onerror="this.src='https://via.placeholder.com/300x145/FAF7F2/C4915A?text=No+Image'">
            @if($menu['status'] === 'Habis')
            <div class="overlay-habis"><span>Habis</span></div>
            @endif
        </div>
        <div class="isi">
            <div class="kategori">{{ $menu['kategori'] }}</div>
            <div class="nama">{{ $menu['nama'] }}</div>
            <div class="bawah">
                <span class="harga">Rp {{ number_format($menu['harga'], 0, ',', '.') }}</span>
                @if($menu['status'] === 'Tersedia')
                    <span class="badge-tersedia">Tersedia</span>
                @else
                    <span class="badge-habis">Habis</span>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection

@section('scripts')
<script>
    function filterMenu(kategori, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        document.querySelectorAll('.menu-card').forEach(card => {
            if (kategori === 'semua' || card.dataset.kategori === kategori) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    }
</script>
@endsection