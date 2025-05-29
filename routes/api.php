<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\Api\PeminjamanController;
use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\API\PengembalianController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::post('login', [AdminController::class, 'login']);
Route::middleware([EnsureFrontendRequestsAreStateful::class])->post('/logout', [AdminController::class, 'logout']);

Route::get('/barang', [BarangApiController::class, 'index']);


Route::post('/register', [RegisterUserController::class, 'register']);
Route::post('login', [UserLoginController::class, 'login']);


// 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/peminjaman', [PeminjamanController::class, 'store']); // Mengajukan peminjaman
});
Route::get('/peminjaman', [PeminjamanController::class, 'index']); // Melihat daftar peminjaman

Route::middleware('auth:sanctum')->get('/peminjamanku', [PeminjamanController::class, 'userPeminjaman']);

Route::middleware('auth:sanctum')->post('/pengembalian', [PengembalianController::class, 'store']);
