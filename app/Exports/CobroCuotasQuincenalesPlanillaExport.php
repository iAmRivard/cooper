<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenalesPlanilla;
use Maatwebsite\Excel\Concerns\FromCollection;

class CobroCuotasQuincenalesPlanillaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CobroCuotasQuincenalesPlanilla::all();
    }
}
