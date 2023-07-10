<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Exports\CierreCuentas;
use App\Exports\CobroCuotasExport;
use App\Exports\CobroCuotasQuincenalesConsolidadoExport;
use App\Exports\CobroCuotasQuincenalesPlanillaExport;

use Maatwebsite\Excel\Facades\Excel;

use App\Models\ViewPresentacionCierreCuentas;
use Illuminate\Support\Facades\Lang;

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

    public function cobroCuotasQuincenalesPlanilla()
    {
        return Excel::download(new CobroCuotasQuincenalesPlanillaExport, 'cobro_cuotas_quincenales_planilla.xlsx');
    }

    public function cierreCuentas(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $date = explode('-', $request->date);

        return Excel::download(new CierreCuentas($date[0], Lang::get("meses.{$date[1]}")), 'cierre_cuentas.xlsx');
    }
}
