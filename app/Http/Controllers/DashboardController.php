<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Barang;
use App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\LogAktivitas;

class DashboardController extends Controller
{
public function index()
{
    $jumlahUser = User::count();
    $jumlahBarang = Barang::count();
    $jumlahPeminjaman = Peminjaman::count();

    $logAktivitas = LogAktivitas::orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();

    return view('dashboard', compact(
        'jumlahUser',
        'jumlahBarang',
        'jumlahPeminjaman',
        'logAktivitas'
    ));
}

}
