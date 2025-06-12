<?php

use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\API\BarangApiController;
use App\Http\Controllers\API\PeminjamanController;
use App\Http\Controllers\API\PengembalianController;

// ===================== AUTH ADMIN =====================
Route::post('login', [AdminController::class, 'login']);
Route::middleware([EnsureFrontendRequestsAreStateful::class])->post('/logout', [AdminController::class, 'logout']);

// ===================== BARANG =====================
Route::get('/barang', [BarangApiController::class, 'index']);

// ===================== USER REGISTER & LOGIN =====================
Route::post('/register', [RegisterUserController::class, 'register']);
Route::post('login', [UserLoginController::class, 'login']);

// ===================== PEMINJAMAN =====================
Route::get('/peminjaman', [PeminjamanController::class, 'index']); // Semua data peminjaman (admin/global)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/peminjaman', [PeminjamanController::class, 'store']); // Ajukan peminjaman
    Route::get('/peminjamanku', [PeminjamanController::class, 'userPeminjaman']); // Peminjaman milik user
});

// ===================== PENGEMBALIAN =====================
Route::middleware('auth:sanctum')->post('/pengembalian', [PengembalianController::class, 'store']);
