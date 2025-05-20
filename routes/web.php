<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\KategoriController;

Route::get('/login', fn () => view('login'));
Route::post('/login', [AdminController::class, 'login'])->name('login');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/register', [RegisterUserController::class, 'index'])->name('register.index');

    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang/create', [BarangController::class, 'create']);
    Route::put('/barang/{id}/update', [BarangController::class, 'update']);
    Route::delete('/barang/{id}/delete', [BarangController::class, 'delete']);
    
    Route::resource('kategori', KategoriController::class);


});




Route::get('/users', [RegisterUserController::class, 'index'])->name('users.index');
Route::post('/users', [RegisterUserController::class, 'store'])->name('users.store');
Route::put('/users/{id}', [RegisterUserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [RegisterUserController::class, 'destroy'])->name('users.destroy');

