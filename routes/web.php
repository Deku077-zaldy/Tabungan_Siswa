<?php

use Pest\Support\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Http\Controllers\UserSiswaController;
use App\Http\Controllers\UserWaliKelasController;

// Halaman login (hanya untuk tamu/guest)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Area setelah login
Route::middleware('auth')->group(function () {
    // Root diarahkan ke dashboard
    Route::redirect('/', '/dashboard');
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard.index');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');

    // Menajemen Akun Siswa
    Route::get('/user-siswa', [UserSiswaController::class, 'index'])->name('user-siswa.index');

    // Manajemen Akun Wali
    Route::get('/user-wali', [UserWaliKelasController::class, 'index'])->name('user-wali.index');
    Route::get('/user-wali/create', [UserWaliKelasController::class, 'create'])->name('user-wali.create');
    Route::post('/user-wali/store', [UserWaliKelasController::class, 'store'])->name('user-wali.store');
    Route::get('/user-wali/edit/{id}', [UserWaliKelasController::class, 'edit'])->name('user-wali.edit');
    Route::put('/user-wali/update/{id}', [UserWaliKelasController::class, 'update'])->name('user-wali.update');

    // Manajemen Transaksi Masuk
    Route::get('/transaksi-masuk', [TransaksiMasukController::class, 'index'])->name('transaksi-masuk.index');

    // Majement Transaksi Keluar
    Route::get('/transaksi-keluar', [TransaksiKeluarController::class, 'index'])->name('transaksi-keluar.index');

    // SISWA ROUTES
    Route::get('transaksi-history', [UserSiswaController::class, 'history'])->name('transaksi.history');
    Route::get('transaksi-report', [UserSiswaController::class, 'report'])->name('transaksi.report');
    Route::get('/transaksi/report/download', [UserSiswaController::class, 'downloadReport'])
        ->name('transaksi.report.download');


    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
