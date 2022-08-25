<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Crm_socios;
use App\Models\Ctr_cuenta_det;
use App\Models\Ctr_cuenta;

use App\Models\Credito;

class SociosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Crm_socios $socio)
    {
        // return view('socios.index', compact(['socio' => $socio, 'socio_cuentas' => $socio_cuentas]));
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

        // dd($socio_creditos);

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
