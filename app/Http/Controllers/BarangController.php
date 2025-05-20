<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
     public function index()
    {
        $data = Barang::with('kategori')->get();  // Ambil semua barang beserta kategori
        $kategoris = Kategori::all();             // Ambil semua kategori untuk dropdown
        return view('barang.barang', compact('data', 'kategoris'));
    }
public function create(Request $request)
{
    $request->validate([
        'name' => 'required',
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        'kategori_id' => 'required',
        'stok' => 'required|integer',
    ]);

    $path = $request->file('gambar')->store('barang', 'public');

    $barang = Barang::create([
        'name' => $request->name,
        'gambar' => '/storage/' . $path,
        'kategori_id' => $request->kategori_id,
        'stok' => $request->stok,
    ]);

    return response()->json(['data' => $barang->load('kategori')]);
}

public function update(Request $request, $id)
{
    $barang = Barang::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'kategori_id' => 'required',
        'stok' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    if ($request->hasFile('gambar')) {
        $path = $request->file('gambar')->store('barang', 'public');
        $barang->gambar = '/storage/' . $path;
    }

    $barang->name = $request->name;
    $barang->kategori_id = $request->kategori_id;
    $barang->stok = $request->stok;
    $barang->save();

    return response()->json(['data' => $barang->load('kategori')]);
}

public function delete($id)
{
    $barang = Barang::findOrFail($id);
    $barang->delete();
    return response()->json(['message' => 'Barang dihapus']);
}

}
