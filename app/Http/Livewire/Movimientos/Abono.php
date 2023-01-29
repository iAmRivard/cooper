<?php

namespace App\Http\Livewire\Movimientos;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Livewire\Component;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;
use App\Models\Crc_tipos_de_movimiento;

class Abono extends Component
{
    use AuthorizesRequests;

    public $open = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta_select, $monto, $descripcion, $tipo, $cuenta_abonada, $cuenta_place_holder;

    protected $rules = [
        'cuenta_select' => 'required',
        'monto'         => 'required',
        'descripcion'   => 'required',
        'tipo'          => 'required',
    ];

    public function UpdatedCuentaSelect($value)
    {
        $this->cuenta_place_holder  =   Ctr_cuenta::with('socio')->find($value);
    }

    public function render()
    {
        $tiposMovimiento = Crc_tipos_de_movimiento::where('naturaleza', '=', '1')
                                                ->get();

        $this->cuentas  =    Ctr_cuenta::with('socio')
                        ->when($this->buscar_cuenta, function ($query) {
                            return $query->where('no_cuenta', 'like', '%' . $this->buscar_cuenta . '%')
                                ->orWhereHas('socio', function ($q) {
                                    $q->where('nombres', 'like', '%' . $this->buscar_cuenta . '%')
                                        ->orWhere('codigo_empleado', 'like', '%' . $this->buscar_cuenta . '%')
                                        ->orWhere('dui', 'like', '%' . $this->buscar_cuenta . '%');
                                });
                        })
                        ->orderBy('created_at', 'desc')
                        ->get();


        return view('livewire.movimientos.abono', compact('tiposMovimiento'));
    }

    public function abonar()
    {
        $this->validate();

        $this->cuenta_abonada = Ctr_cuenta::find($this->cuenta_select);

        $abono = Ctr_cuenta_det::create([
            'tipo_movimiento_id'    => $this->tipo,
            'concepto'              => $this->descripcion,
            'monto'                 => $this->monto,
            'naturaleza'            => 1,
            'ctr_cuentas_id'        => $this->cuenta_select,
            'saldo_fecha'           => $this->cuenta_abonada->saldo_actual + $this->monto
        ]);

        $this->cuenta_abonada->saldo_actual = $this->cuenta_abonada->saldo_actual + $this->monto;
        $this->cuenta_abonada->save();

        $this->emit('exito', 'Abono procesado exitosamente');

        $this->emitTo('cuentas.cuentas','render');

        $socioId = $this->cuenta_abonada->crm_socio_id;

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion',
            'cuenta_select',
            'cuentas'
        ]);

        return redirect()->route('cuenta.abono', $abono);
    }

}
