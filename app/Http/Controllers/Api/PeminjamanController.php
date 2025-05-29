<?php
namespace App\Http\Controllers\Api;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Sanctum\PersonalAccessToken;

class PeminjamanController extends Controller
{

   public function index()
{
    // Ambil semua data peminjaman, termasuk relasi barang jika ada
    $peminjaman = \App\Models\Peminjaman::with('barang')->orderBy('created_at', 'desc')->get();

    return response()->json([
        'message' => 'Daftar semua peminjaman berhasil diambil',
        'data' => $peminjaman
    ]);
}

    public function store(Request $request)
{
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
        'jumlah' => 'required|integer|min:1',
    ]);

  
    $validated['user_id'] = $user->id;
    $validated['status'] = 'pending';

    $peminjaman = Peminjaman::create($validated);

    return response()->json([
        'message' => 'Peminjaman berhasil diajukan',
        'data' => $peminjaman
    ]);
}

//buat cek postman
public function userPeminjaman(Request $request)
{
    $user = $request->user();

    $peminjamans = Peminjaman::with('barang')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return response()->json([
        'message' => 'Riwayat peminjaman berhasil diambil',
        'data' => $peminjamans
    ]);
}


}
