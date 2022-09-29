<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;
use App\Models\Crc_tipos_cuenta;

class CreateCuenta extends Component
{
    public $open = false;

    public $selec_socio, $tipo_cuenta;

    public $socios = [];

    public $buscar_socio = '';

    protected $rules = [
        'selec_socio' => 'required',
        'tipo_cuenta' => 'required'
    ];

    public function render()
    {
        $tipos_cuentas = Crc_tipos_cuenta::all();
        return view('livewire.cuentas.create-cuenta', compact('tipos_cuentas'));
    }

    public function buscar()
    {
        $this->socios = Crm_socios::where('nombres', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('apellidos', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('dui', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('id', 'like', '%' . $this->buscar_socio . '%')
                                ->get();
    }

    public function crear()
    {

        $socio_selected = Crm_socios::find($this->selec_socio);
        $tipo_cuenta_selected = Crc_tipos_cuenta::find($this->tipo_cuenta);
        $toDay = getDate();

        $nueva_cuenta = Ctr_cuenta::create([
            'no_cuenta' => strval($toDay["year"] . $toDay["mon"] .  $socio_selected->id . $tipo_cuenta_selected->id),
            'crm_socio_id' => $this->selec_socio,
            'crc_topo_cuenta_id' => $this->tipo_cuenta,
            'saldo_actual' => 0,
            'estado' => true,
        ]);

        $this->emitTo('cuentas.cuentas','render');

        $this->emit('exito', 'La cuenta fue creado con exito');

        $this->reset([
            'open',
            'selec_socio',
            'tipo_cuenta'
        ]);

    }
}
