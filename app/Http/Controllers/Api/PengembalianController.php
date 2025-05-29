<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required|exists:peminjamans,id',
            'tanggal_kembali' => 'required|date',
            'catatan' => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->peminjaman_id);

        $tanggalKembali = Carbon::parse($request->tanggal_kembali)->toDateString();
        $rencanaKembali = $peminjaman->rencana_kembali;

        // Hitung denda jika terlambat
        $selisihHari = Carbon::parse($rencanaKembali)->diffInDays($tanggalKembali, false);
        $denda = $selisihHari < 0 ? 0 : $selisihHari * 10000;

        // Simpan pengembalian
        $pengembalian = Pengembalian::create([
            'peminjaman_id' => $peminjaman->id,
            'tanggal_kembali' => $tanggalKembali,
            'denda' => $denda,
            'catatan' => $request->catatan
        ]);

        $peminjaman->status = 'dikembalikan';
        $peminjaman->save();

        return response()->json([
            'message' => 'Barang berhasil dikembalikan.',
            'data' => $pengembalian
        ]);
    }
}
