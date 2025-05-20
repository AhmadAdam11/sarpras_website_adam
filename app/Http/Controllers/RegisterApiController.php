<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterApiController extends Controller
{
    // Fungsi untuk Register User via API
    public function register(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'name' => 'required|string|unique:users,name',
            'password' => 'required|min:6',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        // Buat token untuk user
        $token = $user->createToken('user-token')->plainTextToken;

        // Kembalikan response berupa user dan token
        return response()->json([
            'message' => 'User berhasil dibuat!',
            'user' => $user,
            'token' => $token,
        ], 201);
    }
}
