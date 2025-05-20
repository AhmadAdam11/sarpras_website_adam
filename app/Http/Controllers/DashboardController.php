<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use App\Models\Peminjaman;
use App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahUser = User::count();
        $jumlahBarang = Barang::count();
        // $jumlahPeminjam = Peminjaman::count();

        return view('dashboard', compact('jumlahUser', 'jumlahBarang'));
    }

}
