<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\BarangApiController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\Auth\UserLoginController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

Route::post('login', [AdminController::class, 'login']);
Route::middleware([EnsureFrontendRequestsAreStateful::class])->post('/logout', [AdminController::class, 'logout']);

Route::get('/barang', [BarangApiController::class, 'index']);


Route::post('/register', [RegisterUserController::class, 'register']);
Route::post('login', [UserLoginController::class, 'login']);


