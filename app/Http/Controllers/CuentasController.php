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
        $cuenta =   Ctr_cuenta::with("socio", "tipoCuenta")->findOrFail($id);

        $movimientos    =   Ctr_cuenta_det::where('ctr_cuentas_id', '=', $id)
            ->orderBy('id', 'desc')
            ->paginate(10);

        if ($cuenta->tipoCuenta->plazo == true) {
            $tabla = AhorroHelper::calcularTablaAmortizacion(
                tipoCUenta: $cuenta->tipoCuenta,
                plazo: $cuenta->cantidad_quincenas,
                dia: Carbon::parse($cuenta->created_at ?? getdate() ),
                monto:  $cuenta->tipoCUenta->aplica_monto == true ? $cuenta->monto_plazo :  $cuenta->pago_quincenal,
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

        $cuenta = Ctr_cuenta::find($id);

        $cuenta->no_cuenta = $request->no_cuenta;
        $cuenta->fecha_inicio = $request->fecha_inicio;
    
        // Convertir quincenas a meses. Asumimos que cada 2 quincenas es 1 mes.
        $meses = 0;
        if($cuenta->crc_topo_cuenta_id == 4 || $cuenta->crc_topo_cuenta_id == 3){//SI ES NAVIDEÑO O PROGRAMADO
            $meses = intdiv($cuenta->cantidad_quincenas, 2);
        }else{
            $meses = intdiv($cuenta->cantidad_quincenas, 1);
        }
        
        
        
    
        // Crear un objeto DateTime a partir de la fecha de inicio
        $fechaFin = new \DateTime($request->fecha_inicio);
        // Añadir los meses calculados a la fecha de inicio
        $fechaFin->modify("+$meses month");
    
        // Guardar la nueva fecha de fin en la base de datos
        $cuenta->fecha_fin = $fechaFin->format('Y-m-d');
    
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
