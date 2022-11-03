<?php

namespace App\Http\Livewire\Cuentas;

use Livewire\Component;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta;
use App\Models\Crc_tipos_cuenta;
use App\Models\Ctr_cuenta_det;

class CreateCuenta extends Component
{
    public $open = false;

    public $selec_socio, $plazo, $cuenta, $monto_plazo, $cantidad_cuotas, $othersCamp = false;

    public $socios = [];

    public $buscar_socio = '';

    protected $rules = [
        'selec_socio' => 'required',
        'cuenta' => 'required'
    ];

    public function render()
    {
        $tipos_cuentas = Crc_tipos_cuenta::all();
        return view('livewire.cuentas.create-cuenta', compact('tipos_cuentas'));
    }

    public function updatedCuenta($value)
    {
        $das = json_decode($value);
        if($das->plazo == 1)
        {
            $this->othersCamp = true;
        }
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
        $tipo_cuenta = json_decode($this->cuenta);
        $socio_selected = Crm_socios::find($this->selec_socio);
        $toDay = getDate();

        $nueva_cuenta   =   new Ctr_cuenta();
        $nueva_cuenta->no_cuenta = strval($toDay["year"] . $toDay["mon"] .  $socio_selected->id . $tipo_cuenta->id);
        $nueva_cuenta->crm_socio_id = $this->selec_socio;
        $nueva_cuenta->crc_topo_cuenta_id = $tipo_cuenta->id;
        $nueva_cuenta->saldo_actual = 0;
        $nueva_cuenta->estado   =   true;
        if($this->othersCamp) {
            $nueva_cuenta->monto_plazo  = $this->monto_plazo;
            $nueva_cuenta->cantidad_quincenas =   $this->cantidad_cuotas;
            $nueva_cuenta->quincena_actual =   0;
            $nueva_cuenta->saldo_actual = $this->monto_plazo;
        }
        $nueva_cuenta->save();
    
        // GENERANDO PRIMER MOVIMIENTO CUANDO ES A PLAZO.
        if($this->othersCamp) {
        $abono = Ctr_cuenta_det::create([
            'tipo_movimiento_id'    => 1,
            'concepto'              => 'ABONO POR APERTURA DE DEPOSITO A PLAZI',
            'monto'                 => $this->monto_plazo,
            'naturaleza'            => 1,
            'ctr_cuentas_id'        => $nueva_cuenta->id,
            'saldo_fecha'           => $this->monto_plazo
        ]);

        $abono->save();
        }
        $this->emitTo('cuentas.cuentas','render');

        $this->emit('exito', 'La cuenta fue creado con exito');

        $this->reset([
            'open',
            'selec_socio',
            'cuenta'
        ]);

    }
}
