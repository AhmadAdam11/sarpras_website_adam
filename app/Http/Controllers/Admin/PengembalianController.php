<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with('peminjaman.barang')->latest()->get();
        return view('Admin.pengembalian.index', compact('pengembalians'));
    }

    public function update(Request $request, $id)
    {
        $pengembalian = Pengembalian::findOrFail($id);

        // Cegah edit jika sudah selesai
        if ($pengembalian->selesai) {
            return redirect()->back()->with('success', 'Data sudah dikunci dan tidak dapat diubah.');
        }

        $request->validate([
            'kondisi_setelah' => 'required|in:baru,baik,rusak',
            'denda' => 'required|numeric|min:0',
        ]);

        $pengembalian->kondisi_setelah = $request->kondisi_setelah;
        $pengembalian->denda = $request->denda;
        $pengembalian->selesai = true;
        $pengembalian->save();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil diperbarui dan dikunci.');
    }
}
