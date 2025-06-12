<?php

namespace App\Http\Controllers\Excel;

use App\Http\Controllers\Controller;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;

class UserExportController extends Controller
{
    public function export()
    {
        return Excel::download(new UserExport, 'data-user.xlsx');
    }
}
