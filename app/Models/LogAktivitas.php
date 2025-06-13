<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';

    // Jika kamu ingin bisa mass-assignment:
    protected $fillable = [
        'user_id',
        'aksi',
        'barang_id',
        'peminjaman_id',
        'tanggal',
        'keterangan',
    ];
}
