@props(['username' => 'Tamu'])

<div class="sidebar">
    <div class="brand">
        <h5>Cafe's Kalcer</h5>
        <small>Sistem Pengelolaan</small>
    </div>

    <div style="margin-top: 12px;">
        <div class="nav-section">Menu</div>
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="bi bi-grid me-2"></i>Dashboard
        </a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}">
            <i class="bi bi-journal-text me-2"></i>Pengelolaan Menu
        </a>

        <div class="nav-section" style="margin-top: 10px;">Akun</div>
        <a href="{{ route('profile', ['username' => $username]) }}"
           class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
            <i class="bi bi-person me-2"></i>Profile
        </a>
    </div>

    <div style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.08); padding: 8px 0;">
        <a href="{{ route('logout') }}" class="nav-link" style="color: #e07474;">
            <i class="bi bi-box-arrow-left me-2"></i>Keluar
        </a>
    </div>
</div>