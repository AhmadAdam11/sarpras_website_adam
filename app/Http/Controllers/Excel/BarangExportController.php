<?php
namespace App\Http\Controllers\Excel;

use App\Exports\BarangExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class BarangExportController extends Controller
{
    public function export()
    {
        return Excel::download(new BarangExport, 'data-barang.xlsx');
    }
}
