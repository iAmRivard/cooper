<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use App\Models\TipoCredito;
use App\Models\Crm_socios;
use App\Models\Credito;

class CrearCredito extends Component
{
    public $open = false;

    public $selec_socio, $tipo_cuenta, $monto, $porcentaje;

    public $socios = [];

    public $buscar_socio = '';

    protected $rules = [
        'selec_socio' => 'required',
        'tipo_cuenta' => 'required'
    ];

    public function render()
    {
        $tipos_creditos = TipoCredito::all();

        return view('livewire.creditos.crear-credito', compact('tipos_creditos'));
    }

    public function buscar()
    {
        $this->socios = Crm_socios::where('nombres', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('apellidos', 'like', '%' . $this->buscar_socio . '%')
                                ->orWhere('dui', 'like', '%' . $this->buscar_socio . '%')
                                ->get();
    }

    public function crear()
    {

        $socio_selected = Crm_socios::find($this->selec_socio);
        $tipo_cuenta_selected = TipoCredito::find($this->tipo_cuenta);
        $toDay = getDate();

        $nuevo_credito = Credito::create([
            'no_cuenta' => strval($toDay["year"] . $toDay["mon"] .  $socio_selected->id . $tipo_cuenta_selected->id),
            'crm_socio_id' => $this->selec_socio,
            'tipo_credito_id' => $this->tipo_cuenta,
            'monto' => $this->monto,
            'saldo_actual' => $this->monto,
            'porcentaje_interes' => $this->porcentaje,
        ]);


        $this->emit('exito', 'La cuenta fue creado con exito');

        $this->reset([
            'open',
            'selec_socio',
            'tipo_cuenta',
            'monto',
            'porcentaje'
        ]);

    }
}
