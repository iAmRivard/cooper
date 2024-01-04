<?php

namespace App\Http\Controllers;

use App\Helpers\AhorroHelper;
use Illuminate\Http\Request;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta_det;
use App\Models\Ctr_cuenta;

use App\Models\Credito;

class ReporteInteresPlazosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Crm_socios $socio)
    {
        $cuentas = Ctr_cuenta::whereHas('tipoCuenta', function ($query) {
            $query->where('plazo', 1)
                  ->where('aplica_monto', 1);
        })->get();
    
        foreach ($cuentas as &$cuenta) {
            // Calcula la proyección de las próximas tres cuotas
            $cuenta->proyeccion_cuotas = AhorroHelper::calcularProyeccionCuotas(
                $cuenta->tipoCuenta,
                $cuenta->cantidad_quincenas,
                $cuenta->quincena_actual,
                $cuenta->monto_plazo // Asumiendo que este es el monto a utilizar
            );
        }
    
        return view('reports.reporte-interes-plazo', compact('cuentas'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('socios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crm_socios $socio)
    {
        $socio_cuentas = [];
        $socio_creditos = [];

        $socio_cuentas = Ctr_cuenta::where('crm_socio_id', $socio->id)
            ->get();

        $socio_creditos = Credito::where('socio_id', $socio->id)
            ->get();

        return view('socios.index', compact('socio', 'socio_cuentas', 'socio_creditos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
