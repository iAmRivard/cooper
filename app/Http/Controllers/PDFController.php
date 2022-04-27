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
        return $pdf->stream();
    }
}
