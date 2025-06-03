<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    
    protected $table = 'pengembalian';


    protected $fillable = [
        'peminjaman_id',
        'tanggal_kembali',
        'denda',
        'catatan',
        'kondisi_setelah',
        'selesai', 
    ];

    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class);
    }
}
