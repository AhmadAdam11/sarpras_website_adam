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
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->status = $status;
        $peminjaman->save();

        return redirect()->back()->with('success', 'Status peminjaman berhasil diubah.');
    }
}
