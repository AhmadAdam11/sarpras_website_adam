<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with('user', 'barang')->latest()->get();
        return view('admin.peminjamans.index', compact('peminjamans'));
    }

    public function updateStatus($id, $status)
    {
        $peminjaman = Peminjaman::with('barang')->findOrFail($id);

        if ($status === 'disetujui') {
            // Cek apakah stok cukup
            if ($peminjaman->jumlah > $peminjaman->barang->stok) {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
            }

            // Kurangi stok barang
            $peminjaman->barang->stok -= $peminjaman->jumlah;
            $peminjaman->barang->save();
        }

        // Update status peminjaman
        $peminjaman->status = $status;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah.');
    }
}
