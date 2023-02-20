<?php

namespace App\Exports;

use App\Models\CobroCuotasQuincenales;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class CobroCuotasExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('reports.cobro-cuotas', [
            'cuotas'    =>  CobroCuotasQuincenales::all()
        ]);
    }
}
