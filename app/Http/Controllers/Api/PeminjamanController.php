<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Laravel\Sanctum\PersonalAccessToken;

class PeminjamanController extends Controller
{
    // Untuk menampilkan semua peminjaman (admin/global)
    public function index()
    {
        $peminjaman = Peminjaman::with('barang')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'Daftar semua peminjaman berhasil diambil',
            'data' => $peminjaman
        ]);
    }

    // Untuk menyimpan peminjaman oleh user (via token)
    public function store(Request $request)
    {
        $tokenString = $request->bearerToken();

        if (!$tokenString) {
            return response()->json(['error' => 'Unauthorized, token missing'], 401);
        }

        $token = PersonalAccessToken::findToken($tokenString);

        if (!$token) {
            return response()->json(['error' => 'Unauthorized, token invalid'], 401);
        }

        $user = $token->tokenable;

        if (!$user) {
            return response()->json(['error' => 'Unauthorized, user not found'], 401);
        }

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

    public function userPeminjaman(Request $request)
    {
        $user = $request->user();

        $peminjamans = Peminjaman::with(['barang', 'pengembalian'])
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $data = $peminjamans->map(function ($item) {
            return [
                'id' => $item->id,
                'tanggal_pinjam' => $item->tanggal_pinjam,
                'rencana_kembali' => $item->rencana_kembali,
                'jumlah' => $item->jumlah,
                'status' => $item->status,
                'barang' => [
                    'name' => $item->barang->name,
                    'gambar' => $item->barang->gambar,
                ],
                'denda' => $item->pengembalian->denda ?? 0,
            ];
        });

        return response()->json([
            'message' => 'Riwayat peminjaman berhasil diambil',
            'data' => $data
        ]);
    }
}
