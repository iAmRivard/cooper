<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ctr_cuenta_det;
use App\Models\Ctr_cuenta;

use PDF;


class PDFController extends Controller
{
    public function abono(Ctr_cuenta_det $abono)
    {
        $data = [
            'title' => 'Abono a cuenta',
            'abono' => $abono,
        ];

        $pdf = Pdf::loadView('PDF.abono', $data);
        return $pdf->stream();

        // return $pdf->download('comprobante.pdf');
    }

    public function retiro(Ctr_cuenta_det $retiro)
    {
        // var_dump($retiro);
        $data = [
            'title' => 'Retiro de Cuenta',
            'retiro' => $retiro,
        ];
        // var_dump($data);

        $pdf = Pdf::loadView('PDF.retiro', $data);
        return $pdf->download('comprobante.pdf');
    }

    public function cuenta(Ctr_cuenta $cuenta)
    {

        //TODO de funcionalidad, Enviar parametros de fechas y realizar el reporte en base a los parametros
        $data = [
            'title' => 'Reporte de cuenta',
            'cuenta' => $cuenta,
        ];

        $pdf = Pdf::loadView('PDF.cuenta', $data);
        return $pdf->download('reporte.pdf');

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
}
