<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return User::all(); // atau filter jika hanya user tertentu
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->created_at->format('Y-m-d H:i:s'),
        ];
    }

    public function headings(): array
    {
        return ['ID', 'Nama User', 'Tanggal Dibuat'];
    }
}
