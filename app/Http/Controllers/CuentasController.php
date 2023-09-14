<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\AhorroHelper;

use App\Models\Ctr_cuenta;
use App\Models\Ctr_cuenta_det;

use Carbon\Carbon;

class CuentasController extends Controller
{
    public function verCuenta($id)
    {
        $cuenta =   Ctr_cuenta::find($id);

        $movimientos    =   Ctr_cuenta_det::where('ctr_cuentas_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($cuenta->tipoCuenta->plazo == true) {
            $tabla = AhorroHelper::calcularTablaAmortizacion(
                tipoCUenta: $cuenta->tipoCuenta,
                plazo: $cuenta->cantidad_quincenas,
                dia: Carbon::parse($cuenta->created_at),
                monto: $cuenta->monto_plazo,
            );
        }

        return view('cuentas.ver-cuenta', [
            'movimientos'   => $movimientos,
            'cuenta'    =>  $cuenta,
            'tablaAmor' =>  $tabla ?? null
        ]);
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
