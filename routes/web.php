<?php

use Pest\Support\View;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
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
    Route::get('/user-siswa/create', [UserSiswaController::class, 'create'])->name('user-siswa.create');
    Route::post('/user-siswa/store', [UserSiswaController::class, 'store'])->name('user-siswa.store');
    Route::get('/user-siswa/edit/{id}', [UserSiswaController::class, 'edit'])->name('user-siswa.edit');
    Route::put('/user-siswa/update/{id}', [UserSiswaController::class, 'update'])->name('user-siswa.update');
    Route::post('/user-siswa/naik-kelas/{id}', [UserSiswaController::class, 'naik_kelas'])->name('user-siswa.naik-kelas');
    
    // Manajemen Akun Wali
    Route::get('/user-wali', [UserWaliKelasController::class, 'index'])->name('user-wali.index');
    Route::get('/user-wali/create', [UserWaliKelasController::class, 'create'])->name('user-wali.create');
    Route::post('/user-wali/store', [UserWaliKelasController::class, 'store'])->name('user-wali.store');
    Route::get('/user-wali/edit/{id}', [UserWaliKelasController::class, 'edit'])->name('user-wali.edit');
    Route::put('/user-wali/update/{id}', [UserWaliKelasController::class, 'update'])->name('user-wali.update');
    
    // Majement Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('/transaksi/create/{id}', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('/transaksi/history/{id}', [UserSiswaController::class, 'student_history'])->name('user-siswa.history');

    // SISWA ROUTES
    Route::get('transaksi-history', [UserSiswaController::class, 'history'])->name('transaksi.history');
    Route::get('transaksi-report', [UserSiswaController::class, 'report'])->name('transaksi.report');
    Route::get('/transaksi/report/download', [UserSiswaController::class, 'downloadReport'])
        ->name('transaksi.report.download');


    // Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
