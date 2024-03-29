<?php

namespace App\Http\Livewire\Movimientos;

use Livewire\Component;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;
use App\Models\Crc_tipos_de_movimiento;

class Retiros extends Component
{
    public $open = false;

    public $error = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta_select, $monto, $descripcion, $tipo, $cuenta_retirada, $cuenta_place_holder;

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
        $tiposMovimiento = Crc_tipos_de_movimiento::where('naturaleza', '=', '0')
            ->get();

        return view('livewire.movimientos.retiros', compact('tiposMovimiento'));
    }

    public function retirar()
    {
        $this->validate();

        $this->cuenta_retirada = Ctr_cuenta::find($this->cuenta_select);

        if ($this->monto <= $this->cuenta_retirada->saldo_actual) {
            $retiro = Ctr_cuenta_det::create([
                'tipo_movimiento_id'    => $this->tipo,
                'concepto'              => $this->descripcion,
                'monto'                 => ($this->monto * -1),
                'naturaleza'            => 0,
                'ctr_cuentas_id'        => $this->cuenta_select,
                'saldo_fecha'           => $this->cuenta_retirada->saldo_actual + ($this->monto * -1)
            ]);

            $this->cuenta_retirada->saldo_actual = $this->cuenta_retirada->saldo_actual + ($this->monto * -1);

            $this->cuenta_retirada->save();

            $this->reset([
                'open',
                'tipo',
                'monto',
                'descripcion',
                'cuentas'
            ]);

            $this->emit('exito', 'Retiro procesado exitosamente');

            $this->emitTo('cuentas.cuentas', 'render');

            return redirect()->route('cuenta.retiro', $retiro);
        } else {
            $this->error = true;
        }
    }

    public function searchAccount($value)
    {
        return Ctr_cuenta::with('socio', 'tipoCuenta')
            ->when($value, function ($query) use ($value) {
                return $query->where('no_cuenta', 'like', '%' . $value . '%')
                    ->orWhereHas('socio', function ($q) use ($value) {
                        $q->where('nombres', 'like', '%' . $value . '%')
                            ->orWhere('codigo_empleado', 'like', '%' . $value . '%')
                            ->orWhere('dui', 'like', '%' . $value . '%');
                    });
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->jsonSerialize();
    }
}
