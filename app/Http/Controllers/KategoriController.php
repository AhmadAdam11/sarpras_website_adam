<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori
        return view('kategori.index', compact('kategoris'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('kategori.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request)
    {
        // Validasi input kategori
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Menggunakan only untuk memastikan hanya field yang dibutuhkan yang disertakan
        Kategori::create($request->only('nama'));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    // Mengupdate kategori
    public function update(Request $request, Kategori $kategori)
    {
        // Validasi input kategori
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        // Menggunakan only untuk memastikan hanya field yang dibutuhkan yang disertakan
        $kategori->update($request->only('nama'));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    // Menghapus kategori
    public function destroy(Kategori $kategori)
    {
        // Cek apakah kategori masih digunakan oleh barang
        if ($kategori->barangs()->count() > 0) {
            return redirect()->route('kategori.index')->with('error', 'Kategori ini tidak bisa dihapus karena masih ada barang yang menggunakannya.');
        }

        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
