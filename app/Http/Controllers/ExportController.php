<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\CobroCuotasExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function cobroCuotasQuincenal()
    {
        return Excel::download(new CobroCuotasExport, 'cobro_cuotas.xlsx');
    }
}
