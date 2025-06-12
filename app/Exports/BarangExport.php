<?php

namespace App\Exports;

use App\Models\barang;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BarangExport implements FromCollection, WithHeadings, WithMapping
{

    public function collection()
    {
        return barang::with('kategori')->get();
    }

    public function map($barang): array
    {
        return [
            $barang->id,
            $barang->name,
            $barang->gambar,
            $barang->kategori ? $barang->kategori->nama : '-',
            $barang->stok,
            $barang->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return ['ID', 'Nama Barang', 'Gambar', 'Kategori', 'Stok', 'Tanggal Dibuat'];
    }
}
