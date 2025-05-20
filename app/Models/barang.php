<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class barang extends Model
{

    protected $fillable = ['name', 'gambar', 'kategori_id', 'stok'];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
