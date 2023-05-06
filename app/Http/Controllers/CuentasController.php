<?php

namespace App\Http\Controllers;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function verCuenta($id)
    {
        $cuenta =   Ctr_cuenta::find($id);

        $movimientos    =   Ctr_cuenta_det::where('ctr_cuentas_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('cuentas.ver-cuenta', compact('movimientos', 'cuenta'));
    }

    public function changeState($id)
    {
        $cuenta = Ctr_cuenta::find($id);
        $cuenta->estado  =   $cuenta->estado == 1 ? 0 : 1;
        $cuenta->save();

        return back();
    }

    public function changeNumber(Request $request, $id)
    {
        $validated = $request->validate([
            'no_cuenta' => 'required|unique:ctr_cuentas',
        ]);

        $cuenta = Ctr_cuenta::find($id);

        $cuenta->no_cuenta  =   $request->no_cuenta;
        $cuenta->save();

        return back();
    }

    public function updateDiscount(Request $request, $id)
    {
        $validated = $request->validate([
            'pago_quincenal' => 'required',
        ]);

        $cuenta =   Ctr_cuenta::find($id);

        $cuenta->pago_quincenal =   $request->pago_quincenal;
        $cuenta->save();

        return back();
    }
}
