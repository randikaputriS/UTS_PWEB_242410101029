<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

// Halaman Login
Route::get('/', [PageController::class, 'login'])->name('login'); #metode login
Route::post('/login', [PageController::class, 'loginPost'])->name('login.post'); #login post (ngirim)

// Halaman setelah login (menggunakan GET dengan query parameter username)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');

// Logout
Route::get('/logout', [PageController::class, 'logout'])->name('logout');