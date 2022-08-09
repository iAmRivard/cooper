<?php

namespace App\Http\Livewire\Creditos;

use Livewire\Component;

use App\Models\TipoMovimientoCredito;
use App\Models\CreditoDet;
use App\Models\Credito;

class Abono extends Component
{
    public $open = false;

    public $buscar_cuenta = '';

    public $cuentas = [];

    public $cuenta_select, $monto, $descripcion, $tipo, $cuenta_abonada;

    protected $rules = [
        'cuenta_select' => 'required',
        'monto' => 'required',
        'descripcion' => 'required',
        'tipo' => 'required',
    ];

    public function render()
    {
        $tiposMovimiento = TipoMovimientoCredito::where('naturaleza', '=', '1')
                                                ->get();

        return view('livewire.creditos.abono', compact('tiposMovimiento'));
    }
    public function buscar()
    {
        $this->cuentas = Credito::where('id', 'like', '%' . $this->buscar_cuenta . '%')
                                    ->get();
    }

    public function abonar()
    {
        $this->validate();

        $abono = CreditoDet::create([
            'credito_id' => $this->cuenta_select,
            'socio_id' => $this->cuenta_select->socio->id,
            'tipo_movimiento_credito_id' => $this->monto,
            'monto' => $this->monto,
            'descripcion' => $this->descripcion
        ]);


        $this->cuenta_abonada = Credito::find($this->cuenta_select);

        $this->cuenta_abonada->monto = $this->cuenta_abonada->monto - $this->monto;

        $this->cuenta_abonada->save();

        $this->emit('exito', 'Abono procesado exitosamente');

        $this->reset([
            'open',
            'tipo',
            'monto',
            'descripcion'
        ]);
    }
}
