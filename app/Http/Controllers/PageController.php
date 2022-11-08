<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Ctr_cuenta;
use App\Models\Crm_socios;

class PageController extends Controller
{
    public function getWelcome()
    {
        $typeUser = Auth::user()->rol;

        $socio = Crm_socios::where('user_id', Auth::id())->first();

        return view('dashboard', compact('typeUser', 'socio'));
    }

    public function getCuenta($id)
    {
        $cuenta = Ctr_cuenta::with('mv')
                            ->find($id);
        return view('socio.cuenta', compact('cuenta'));
    }
}
