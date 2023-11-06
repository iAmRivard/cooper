<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Ctr_cuenta_det;
use App\Models\CreditoDet;
use App\Models\Ctr_cuenta;

use Barryvdh\DomPDF\Facade\Pdf;

use Carbon\Carbon;

class PDFController extends Controller
{
    public function abono(Ctr_cuenta_det $abono)
    {
        $data = [
            'title' => 'Abono a cuenta',
            'abono' => $abono,
        ];

        $pdfNombre = $abono->id . ".pdf";

        return Pdf::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true
        ])->loadView('PDF.abono', $data)->download($pdfNombre);
    }

    public function retiro(Ctr_cuenta_det $retiro)
    {
        $data = [
            'title' => 'Retiro de Cuenta',
            'retiro' => $retiro,
        ];

        $pdfNombre = $retiro->id . ".pdf";

        return Pdf::setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled'       => true
        ])->loadView('PDF.retiro', $data)->download($pdfNombre);
    }

    public function abonoCredito(CreditoDet $abonoCred)
    {
        $data = [
            'title'     => 'Retiro de Cuenta',
            'retiro'    => $abonoCred,
        ];

        $pdfNombre = $abonoCred->id . ".pdf";

        $pdf = Pdf::loadView('PDF.abonoCredito', $data);
        return $pdf->download($pdfNombre);
    }

    public function cuenta(Ctr_cuenta $cuenta)
    {

        //TODO de funcionalidad, Enviar parametros de fechas y realizar el reporte en base a los parametros
        $data = [
            'title' => 'Reporte de cuenta',
            'cuenta' => $cuenta,
        ];

        // $pdf = Pdf::loadView('PDF.cuenta', $data);
        // return $pdf->download('reporte.pdf');

        // return $pdf->stream();
    }

    public function reImpresion($id)
    {

        $transaccion = Ctr_cuenta_det::find($id);

        $title = $transaccion->naturaleza == 1 ? 'Reimpresión de abono' : 'Reimpresión de retiro';

        $data = [
            'title' => $title,
            'transaccion' => $transaccion,
        ];

        $pdf = Pdf::loadView('PDF.re-impresion', $data);
        return $pdf->download('reporte.pdf');

        // return $pdf->stream();

    }

    public function quincena($socio_id)
    {
        $data = [
            'socio' => DB::table('crm_socios')->find($socio_id),
            'creditos' => [],
            'abonos' => [],
            'fecha' => date("d-m-Y")
        ];

        $pdf = Pdf::loadView('PDF.reporte-quincenal', $data);
        return $pdf->stream();

        $movimientos_credito = DB::table('creditos')
            ->join('credito_dets', 'creditos.id', '=', 'credito_dets.credito_id')
            // ->select('')
            ->where('creditos.socio_id', '=', $socio_id)
            ->where('credito_dets.created_at', '>=', now()->subDays(15))
            ->get();

        if (count($movimientos_credito)) {
            $data["creditos"] = $movimientos_credito;
        }

        $movimientos_cuenta = DB::table('ctr_cuentas')
            ->join('ctr_cuenta_dets', 'ctr_cuentas.id', '=', 'ctr_cuenta_dets.tipo_movimiento_id')
            ->where('ctr_cuentas.crm_socio_id', $socio_id)
            ->where('ctr_cuenta_dets.created_at', '>=', now()->subDays(15))
            ->get();

        if (count($movimientos_cuenta)) {
            $data["abonos"] = $movimientos_cuenta;
        }

        dd($data);

        $pdf = Pdf::loadView('PDF.reporte-quincenal', $data);
        return $pdf->stream();
    }

    public function descargaTablaAmortizacionCuenta(Request $request)
    {
    }

    /**
     * Genera el reporte de abonos a creditos
     *
     * @param Request $request
     */
    public function movimientosCreditos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'start_date'    =>  'required',
            'end_date'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $movimeitos = CreditoDet::with('credito', 'socio')
            ->whereBetween(
                'created_at',
                [
                    Carbon::parse($request->start_date),
                    Carbon::parse($request->end_date)
                ]
            )->get();

        $data = [
            'title'     => 'Retiro de Cuenta',
            'retiros'    => $movimeitos,
        ];


        $pdf = Pdf::loadView('PDF.detalle-creditos', $data);
        return $pdf->download(now('m') . '.pdf');
    }
}
