<?php

namespace App\Http\Livewire\Reporte;

use Livewire\Component;

use Illuminate\Support\Facades\DB;

use App\Models\ViewPresentacionCierreCuentas as Cierre;

class CierreCuentas extends Component
{
    public $data, $quincena, $month, $year;

    protected $rules = [
        'year'  => 'required',
        'month'  => 'required',
        'quincena'  => 'required'
    ];

    protected $messages = [
        'year.required' => 'Debe ingresar un año',
        'month.required' => 'Debe ingresar un mes',
        'quincena.required' => 'Debe seleccionar una quincena',
    ];

    public function render()
    {
        return view('livewire.reporte.cierre-cuentas');
    }

    public function search()
    {
        $this->validate();

        $query = Cierre::where('quincena', '=', $this->quincena)
                    ->where('anio','=',$this->year)
                    ->where('mes','=',$this->month)
                    ->get();

        if(count($query) > 0) {
            $this->data = $query;
        } else {
            session()->flash('message', 'No se encontro información, realice una nueva busqueda');
        }

        $this->reset([
            'year',
            'month',
            'quincena',
        ]);
    }
}
