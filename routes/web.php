<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;

// Login & Logout
Route::get('/login', fn () => view('login'));
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Hanya untuk yang sudah login (auth middleware)
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User Register (via admin)
    Route::get('/register', [RegisterUserController::class, 'index'])->name('register.index');

    // Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang/create', [BarangController::class, 'create']);
    Route::put('/barang/{id}/update', [BarangController::class, 'update']);
    Route::delete('/barang/{id}/delete', [BarangController::class, 'delete']);

    // Kategori
    Route::resource('kategori', KategoriController::class);

    // Data Pengguna
    Route::get('/users', [RegisterUserController::class, 'index'])->name('users.index');
    Route::post('/users', [RegisterUserController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [RegisterUserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [RegisterUserController::class, 'destroy'])->name('users.destroy');

    // Peminjaman
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('peminjamans', [PeminjamanController::class, 'index'])->name('peminjamans.index');
        Route::post('peminjamans/{id}/status/{status}', [PeminjamanController::class, 'updateStatus'])->name('peminjamans.updateStatus');
    });

    // Pengembalian
    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
    Route::put('/pengembalian/{id}', [PengembalianController::class, 'update'])->name('pengembalian.update');
});
