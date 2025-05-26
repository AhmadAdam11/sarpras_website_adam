<?php
namespace App\Http\Controllers\Api;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class PeminjamanController extends Controller
{
    public function store(Request $request)
{
    // Ambil token dari header Authorization Bearer
    $tokenString = $request->bearerToken();

    if (!$tokenString) {
        return response()->json(['error' => 'Unauthorized, token missing'], 401);
    }

    // Cari token di DB
    $token = PersonalAccessToken::findToken($tokenString);

    if (!$token) {
        return response()->json(['error' => 'Unauthorized, token invalid'], 401);
    }

    // Ambil user dari token
    $user = $token->tokenable;

    if (!$user) {
        return response()->json(['error' => 'Unauthorized, user not found'], 401);
    }

    // Validasi input request
    $validated = $request->validate([
        'barang_id' => 'required|exists:barangs,id',
        'waktu' => 'required|string',
        'tanggal_pinjam' => 'required|date',
        'rencana_kembali' => 'required|date',
    ]);

    // Tambahkan user_id dan status
    $validated['user_id'] = $user->id;
    $validated['status'] = 'pending'; // ✅ agar tidak null

    // Simpan ke DB
    $peminjaman = Peminjaman::create($validated);

    return response()->json([
        'message' => 'Peminjaman berhasil diajukan',
        'data' => $peminjaman
    ]);
}

}
