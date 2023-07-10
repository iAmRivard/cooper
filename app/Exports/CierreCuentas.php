<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use App\Models\ViewPresentacionCierreCuentas;

class CierreCuentas implements FromView, ShouldAutoSize
{
    public function __construct(public string $annio, public string $mes)
    {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        DB::statement("SET SESSION sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");

        $cierre = ViewPresentacionCierreCuentas::where('anio', $this->annio)
            ->where('mes', $this->mes)
            ->get();

        return view('reports.cierre-cuentas', ['cierres' =>  $cierre]);
    }
}
