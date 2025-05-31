<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode; //ESTA LIBRERIA ES PARA LA FIRMA ELECTRONICA 

class PdfController extends Controller
{
    /* SOLO VISTA
    public function generatePdf()
{
    return view('pdf.template');
}
public function generatePdf085MG()
    {
         $qr = QrCode::size(100)->generate('https://tusitio.com/verificar/085MG');
           $datos = [
              'qr' => $qr,
              'numero_informe' => 'FE085MG/250405-01',
              'orden_servicio' => '25-1347',
              'fecha_evaluacion' => '5-ABRIL-25',
              'recepcion' => '6-ABRIL-25',
              'fecha_informe' => '11-ABRIL-25',
            ];
         return view('pdf.template085MG', $datos);
    }
*/

public function generatePdf085G()
{
    $pdf = Pdf::loadView('pdf.template085G');
    return $pdf->download('plantilla085G.pdf');
}

 public function generatePdf085MG(Request $request)
{
    $qr = \QrCode::size(100)->generate('https://tusitio.com/verificar/085MG');

    $datos = [
        'qr' => $qr,
        'numero_informe' => 'FE085MG/250405-01',
        'orden_servicio' => '25-1347',
        'fecha_evaluacion' => '5-ABRIL-25',
        'recepcion' => '6-ABRIL-25',
        'fecha_informe' => '11-ABRIL-25',
        'mostrar_boton' => true // bandera para mostrar botón solo en navegador
    ];

    if ($request->has('descargar')) {
        $pdf = \PDF::loadView('pdf.template085MG', array_merge($datos, ['modo' => 'pdf']));
        return $pdf->download('plantilla085MG.pdf');
    }
    return view('pdf.template085MG', array_merge($datos, ['modo' => 'web']));
}




}