<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'barang_id',
        'waktu',
        'tanggal_pinjam',
        'rencana_kembali',
        'status',
        'jumlah',
    ];

 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang()
    {
        return $this->belongsTo(barang::class);
    }

    public function pengembalian()
    {
    return $this->hasOne(\App\Models\Pengembalian::class);
    }

}
