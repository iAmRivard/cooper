<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\CobroCuotasExport;
use App\Exports\CobroCuotasQuincenalesConsolidadoExport;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function getExport()
    {
        return view('export');
    }

    public function cobroCuotasQuincenal()
    {
        return Excel::download(new CobroCuotasExport, 'cobro_cuotas.xlsx');
    }

    public function cobroCuotasQuincelanConsolidado()
    {
        return Excel::download(new CobroCuotasQuincenalesConsolidadoExport, 'cobro_cuotas_consolidado.xlsx');
    }
}
