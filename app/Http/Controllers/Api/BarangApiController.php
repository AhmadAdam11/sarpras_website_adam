<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;

class BarangApiController extends Controller
{
    public function index()
    {
        $barang = Barang::with('kategori')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data barang berhasil diambil',
            'data' => $barang->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'gambar' => $item->gambar,
                    'kategori_id' => $item->kategori_id,
                    'kategori_nama' => $item->kategori->nama ?? '',
                    'stok' => $item->stok,
                ];
            }),
        ]);
    }
}
