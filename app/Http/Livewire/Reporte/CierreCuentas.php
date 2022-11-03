<?php

namespace App\Http\Livewire\Reporte;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\ViewPresentacionCierreCuentas as Cierre;

class CierreCuentas extends Component
{
    public $option, $search, $data, $quincena,$month,$year;

    public function render()
    {
        return view('livewire.reporte.cierre-cuentas');
    }

    public function search()
    {
        $this->data = Cierre::where('quincena', '=', $this->quincena)
        ->where('mes','=',$this->month)
        ->where('anio','=',$this->year)
                        ->get();
    }
}
