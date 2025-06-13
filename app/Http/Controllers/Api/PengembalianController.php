<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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

        $selisihHari = Carbon::parse($rencanaKembali)->diffInDays($tanggalKembali, false);
        $denda = $selisihHari < 0 ? 0 : $selisihHari * 10000;

        DB::beginTransaction();

        try {
            DB::statement("CALL proses_pengembalian(?, ?)", [
                $request->peminjaman_id,
                $tanggalKembali
            ]);

            $pengembalian = Pengembalian::create([
                'peminjaman_id' => $request->peminjaman_id,
                'tanggal_kembali' => $tanggalKembali,
                'denda' => $denda,
                'catatan' => $request->catatan
            ]);

            DB::commit();

            return response()->json([
                'message' => 'Barang berhasil dikembalikan.',
                'data' => $pengembalian
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Gagal memproses pengembalian.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
