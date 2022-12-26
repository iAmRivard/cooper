<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenales;
use Maatwebsite\Excel\Concerns\FromCollection;

class CobroCuotasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CobroCuotasQuincenales::all();
    }
}
