<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ctr_cuenta_det;

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
        return $pdf->download('comprobante.pdf');
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
}
