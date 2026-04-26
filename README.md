# Cafe's Kalcer — Sistem Pengelolaan Menu

**UTS Pemrograman Web Genap 2025/2026**
Nama  : Randika Putri Sonata
NIM   : 242410101029
Kelas : B

## Deskripsi
Aplikasi web sistem pengelolaan menu untuk restoran bernama Cafe's Kalcer.
Dibangun menggunakan Laravel 13 dengan Blade templating engine dan Bootstrap 5.

## Fitur
- Login dengan username bebas
- Dashboard dengan statistik menu dan info admin
- Pengelolaan menu dengan tampilan card grid dan filter kategori
- Profile admin

## Teknologi
- Laravel 13
- Bootstrap 5
- Bootstrap Icons
- Google Fonts (Poppins)

## Struktur File
routes/web.php
app/Http/Controllers/PageController.php
resources/views/layouts/app.blade.php
resources/views/components/navbar.blade.php
resources/views/components/footer.blade.php
resources/views/partials/page-header.blade.php
resources/views/login.blade.php
resources/views/dashboard.blade.php
resources/views/pengelolaan.blade.php
resources/views/profile.blade.php
## Cara Menjalankan
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```
Buka browser ke [http://127.0.0.1:8000]

## Screenshot
<img width="1919" height="963" alt="image" src="https://github.com/user-attachments/assets/22f99e41-b13e-4b3f-b02a-9e66587b64c4" />
<img width="1919" height="967" alt="image" src="https://github.com/user-attachments/assets/6702f439-f48d-4e03-a260-4c68cabe7d39" />
<img width="1919" height="969" alt="image" src="https://github.com/user-attachments/assets/dc760962-64fe-4160-9a6f-c277c215e51f" />
<img width="1919" height="971" alt="image" src="https://github.com/user-attachments/assets/7b7e0d1a-3483-461d-8943-ce5572e990ec" />


