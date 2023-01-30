<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenalesConsolidado;
use Maatwebsite\Excel\Concerns\FromCollection;

class CobroCuotasQuincenalesConsolidadoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CobroCuotasQuincenalesConsolidado::all();
    }
}
