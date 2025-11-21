<?php

use Pest\Support\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransaksiController;

// Halaman login (hanya untuk tamu/guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Area setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('/menabung', [TransaksiController::class, 'menabung'])->name('menabung');
    Route::get('/tarik-tabungan', [TransaksiController::class, 'tarikTabungan'])->name('tarik-tabungan');
    
    // Root diarahkan ke dashboard
    Route::redirect('/', '/dashboard');
});