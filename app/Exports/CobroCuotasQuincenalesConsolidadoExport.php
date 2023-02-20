<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenalesConsolidado;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CobroCuotasQuincenalesConsolidadoExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.cobro-cuota-quincenales-consolidado', [
            'cuotas'    =>  CobroCuotasQuincenalesConsolidado::all()
        ]);
    }
}
