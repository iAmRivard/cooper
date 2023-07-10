<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenalesPlanilla;

use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CobroCuotasQuincenalesPlanillaExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        return view('reports.cobro-cuotas-quincenales-planilla', [
            'cuotas'    =>  CobroCuotasQuincenalesPlanilla::all()
        ]);
    }
}
