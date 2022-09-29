<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

use App\Models\TipoCredito;
use App\Models\Crm_socios;
use App\Models\CrtPlanPago;
use App\Models\Credito;
use App\Models\CrcPeriodo;

class CrearCredito extends Component
{
    public $open = false;

    public $selec_socio, $tipo_cuenta, $monto, $porcentaje, $cuotaFija, $periodo;

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

        $nuevo_credito = Credito::create([
            'socio_id' => $this->selec_socio,
            'tipo_credito_id' => $this->tipo_cuenta,
            'monto' => $this->monto,
            'saldo_actual' => $this->monto,
            'porcentaje_interes' => $this->porcentaje,
            'estado' => 1
        ]);

        $periodo = new CrcPeriodo();
        $periodo->valor = $this->periodo;
        if($this->periodo > 1) {
            $periodo->descripcion = $this->periodo. " Meses";
        } else {
            $periodo->descripcion = $this->periodo. " Mese";
        }
        $periodo->estado = 1;
        $periodo->user_id = Auth::id();
        $periodo->save();

        $plan_pago = CrtPlanPago::create([
            'credito_id' => $nuevo_credito->id,
            'user_id' => Auth::id(),
            'pediodo_id' => $periodo->id,
            'socio_id' => $this->selec_socio,
            'monto' => $this->monto,
            'cuota_fija' => $this->cuotaFija,
            'interes_acumulado' => 0,
            'refinanciamiento' => 0,
            'vigente' => 1,
            'estado' => 1
        ]);

        //$plan_pago_det = CrtPlanPagoDet::create([ ])

        $this->emitTo('creditos.index','render');

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
